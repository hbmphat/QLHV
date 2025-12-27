<?php
session_start();
require_once '../connect/db_connect.php';
require_once 'api_system_log.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: 0_login.php");
    exit();
}

$levels = $conn->query("SELECT * FROM levels ORDER BY sort_order ASC")->fetchAll(PDO::FETCH_ASSOC);
$shifts = $conn->query("SELECT * FROM shifts ORDER BY start_time ASC")->fetchAll(PDO::FETCH_ASSOC);
$rooms = $conn->query("SELECT * FROM rooms ORDER BY room_name ASC")->fetchAll(PDO::FETCH_ASSOC); // Lấy danh sách phòng
$teachers = $conn->query("SELECT id, full_name, code_name, gender FROM teachers WHERE status IN ('dang_day','thu_viec') ORDER BY full_name ASC")->fetchAll(PDO::FETCH_ASSOC);

//lấy dshv
$sqlStudentList = "SELECT s.id, s.full_name, s.phone, (SELECT COUNT(*) FROM enrollments e WHERE e.student_id = s.id AND e.status = 'dang_hoc') as busy_count FROM students s WHERE s.status = 1 ORDER BY busy_count ASC, s.full_name ASC";
$students = $conn->query($sqlStudentList)->fetchAll(PDO::FETCH_ASSOC);

$msg = "";
$msgType = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    //thêm/sửa lớp
    if ($action === 'add_class' || $action === 'edit_class') {
        $level_id = $_POST['level_id'];
        $shift_id = $_POST['shift_id'];
        $room_id = $_POST['room_id'];
        $teacher_id = $_POST['teacher_id'];
        $start_date = $_POST['start_date'];
        $status = $_POST['status'] ?? 1;
        try {
            $lName = $conn->query("SELECT level_name FROM levels WHERE id=$level_id")->fetchColumn();
            $sData = $conn->query("SELECT shift_name FROM shifts WHERE id=$shift_id")->fetch(PDO::FETCH_ASSOC);
            $tData = $conn->query("SELECT code_name, gender, full_name FROM teachers WHERE id=$teacher_id")->fetch(PDO::FETCH_ASSOC);
            $tPrefix = ($tData['gender'] == 'Nam') ? 'Mr.' : 'Ms.';
            $tCode = $tData['code_name'] ?? 'GV';
            $className = "$lName - {$sData['shift_name']} - $tPrefix$tCode";

            if ($action === 'add_class') {
                $stmt = $conn->prepare("INSERT INTO classes (class_name, level_id, shift_id, room_id, teacher_id, start_date, status, student_count) VALUES (?, ?, ?, ?, ?, ?, 1, 0)");
                $stmt->execute([$className, $level_id, $shift_id, $room_id, $teacher_id, $start_date]);
                writeLog('class', $conn->lastInsertId(), 'THEM', "Tạo lớp: $className");
                $msg = "Tạo lớp thành công!";
            } else {
                $id = $_POST['class_id'];
                $stmt = $conn->prepare("UPDATE classes SET class_name=?, level_id=?, shift_id=?, room_id=?, teacher_id=?, start_date=?, status=? WHERE id=?");
                $stmt->execute([$className, $level_id, $shift_id, $room_id, $teacher_id, $start_date, $status, $id]);
                writeLog('class', $id, 'SUA', "Sửa lớp: $className");
                $msg = "Cập nhật thành công!";
            }
            $msgType = "success";
        } catch (Exception $e) {
            $msg = "Lỗi: " . $e->getMessage();
            $msgType = "error";
        }
    }

    //thêm học viên vào lớp
    elseif ($action === 'add_student_to_class') {
        $classId = $_POST['asc_class_id'];
        $studentId = $_POST['asc_student_id'];
        try {
            $checkExist = $conn->prepare("SELECT id FROM enrollments WHERE class_id = ? AND student_id = ? AND status = 'dang_hoc'");
            $checkExist->execute([$classId, $studentId]);
            if ($checkExist->rowCount() > 0) {
                $msg = "Học viên đã có trong lớp!";
                $msgType = "error";
            } else {
                $checkBusy = $conn->prepare("SELECT c.class_name FROM enrollments e JOIN classes c ON e.class_id = c.id WHERE e.student_id = ? AND e.status = 'dang_hoc'");
                $checkBusy->execute([$studentId]);
                $busyClass = $checkBusy->fetch(PDO::FETCH_ASSOC);
                if ($busyClass) {
                    $msg = "Học viên đang học lớp: " . $busyClass['class_name'];
                    $msgType = "error";
                } else {
                    $stmt = $conn->prepare("INSERT INTO enrollments (student_id, class_id, registration_date, status) VALUES (?, ?, CURDATE(), 'dang_hoc')");
                    $stmt->execute([$studentId, $classId]);
                    $sName = $conn->query("SELECT full_name FROM students WHERE id=$studentId")->fetchColumn();
                    $cName = $conn->query("SELECT class_name FROM classes WHERE id=$classId")->fetchColumn();
                    writeLog('class', $classId, 'THEM_HV', "Thêm học viên $sName");
                    $msg = "Thêm học viên thành công!";
                    $msgType = "success";
                }
            }
        } catch (Exception $e) {
            $msg = "Lỗi: " . $e->getMessage();
            $msgType = "error";
        }
    }

    //thêm/sửa phòng
    elseif ($action === 'add_room' || $action === 'edit_room') {
        $rName = trim($_POST['r_name']);
        $rStatus = $_POST['r_status'];
        $rNote = trim($_POST['r_note']);

        try {
            if ($action === 'add_room') {
                $sql = "INSERT INTO rooms (room_name, status, note) VALUES (?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$rName, $rStatus, $rNote]);

                writeLog('room', $conn->lastInsertId(), 'THEM', "Thêm phòng: $rName");
                $msg = "Thêm phòng thành công!";
            } else {
                //cập nhật phòng
                $rId = $_POST['r_id'];

                $oldRoom = $conn->query("SELECT * FROM rooms WHERE id=$rId")->fetch(PDO::FETCH_ASSOC);

                $sql = "UPDATE rooms SET room_name=?, status=?, note=? WHERE id=?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$rName, $rStatus, $rNote, $rId]);

                //ghi log
                writeLog('room', $rId, 'SUA', "Cập nhật thông tin phòng: $rName", $oldRoom);

                if ($oldRoom['status'] != $rStatus) {
                    $stMap = ['san_sang' => 'Sẵn sàng', 'bao_tri' => 'Bảo trì'];
                    $oldText = $stMap[$oldRoom['status']] ?? $oldRoom['status'];
                    $newText = $stMap[$rStatus] ?? $rStatus;

                    writeLog('room', $rId, 'DOI_TRANG_THAI', "Đổi trạng thái phòng $rName: $oldText -> $newText");
                }

                $msg = "Cập nhật phòng thành công!";
            }
            $msgType = "success";
            $rooms = $conn->query("SELECT * FROM rooms ORDER BY room_name ASC")->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            $msg = "Lỗi: " . $e->getMessage();
            $msgType = "error";
        }
    }
}

//ds lớp
$sqlList = "SELECT c.*, l.level_name, r.room_name, s.shift_name, s.start_time, s.end_time, t.full_name as teacher_name FROM classes c LEFT JOIN levels l ON c.level_id = l.id LEFT JOIN rooms r ON c.room_id = r.id LEFT JOIN shifts s ON c.shift_id = s.id LEFT JOIN teachers t ON c.teacher_id = t.id ORDER BY c.status DESC, c.id DESC";
$classes = $conn->query($sqlList)->fetchAll(PDO::FETCH_ASSOC);
?>