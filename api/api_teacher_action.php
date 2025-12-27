<?php
session_start();
require_once '../connect/db_connect.php';
require_once 'api_system_log.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: 0_login.php");
    exit();
}

$fullName = $_SESSION['full_name'] ?? 'User';
$userRole = $_SESSION['user_role'] ?? 'Staff';
$initial  = mb_substr($fullName, 0, 1, "UTF-8");
$current_role = $_SESSION['user_role'] ?? 'staff';

//thêm/sửa
$msg = "";
$msgType = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    //thêm gv
    if ($action === 'add_teacher') {
        $name   = trim($_POST['full_name']);
        $dob    = $_POST['dob'] ?: '1990-01-01'; //mặc định nếu rỗng
        $gender = $_POST['gender'];
        $phone  = trim($_POST['phone']);
        $email  = trim($_POST['email']);
        $spec   = $_POST['specialty'];
        $uni    = trim($_POST['university']);
        $pc     = trim($_POST['p_c']);
        $exp    = trim($_POST['experience']);

        $avatar = 'default_avatar.png';
        if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === 0) {
            $uploadDir = "uploads/";
            if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);

            $ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
            $avatarName = 'teacher_' . time() . '_' . rand(100, 999) . '.' . $ext;

            if (move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadDir . $avatarName)) {
                $avatar = $avatarName;
            }
        }

        try {
            //insert vào db, code_name tự sinh
            $sql = "INSERT INTO teachers (full_name, dob, gender, phone, email, specialty, university, p_c, experience, avatar, status) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'thu_viec')";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$name, $dob, $gender, $phone, $email, $spec, $uni, $pc, $exp, $avatar]);

            $newId = $conn->lastInsertId();

            //hhi Log
            writeLog('teacher', $newId, 'THEM', "Thêm hồ sơ giảng viên: $name");

            $msg = "Thêm giảng viên thành công!";
            $msgType = "success";
        } catch (Exception $e) {
            $msg = "Lỗi: " . $e->getMessage();
            $msgType = "error";
        }
    }

    //cập nhật
    elseif ($action === 'edit_teacher') {
        $id     = $_POST['teacher_id'];
        $name   = trim($_POST['full_name']);
        $phone  = trim($_POST['phone']);
        $email  = trim($_POST['email']);
        $spec   = $_POST['specialty'];
        $uni    = trim($_POST['university']);
        $pc     = trim($_POST['p_c']);
        $exp    = trim($_POST['experience']);
        $status = $_POST['status'];

        $avatarQuery = "";
        $params = [$name, $phone, $email, $spec, $uni, $pc, $exp, $status];

        if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === 0) {
            $uploadDir = "uploads/";
            if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);

            $ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
            $avatarName = 'teacher_' . time() . '_' . rand(100, 999) . '.' . $ext;

            if (move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadDir . $avatarName)) {
                $avatarQuery = ", avatar = ?";
                $params[] = $avatarName;
            }
        }
        $params[] = $id;

        try {
            //lấy dữ liệu cũ để ghi log chi tiết
            $oldData = $conn->query("SELECT * FROM teachers WHERE id = $id")->fetch(PDO::FETCH_ASSOC);

            $sql = "UPDATE teachers SET full_name = ?, phone = ?, email = ?, specialty = ?, university = ?, p_c = ?, experience = ?, status = ? $avatarQuery WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute($params);

            // ghi Log
            writeLog('teacher', $id, 'SUA', "Cập nhật hồ sơ giảng viên: $name", $oldData);

            $msg = "Cập nhật thành công!";
            $msgType = "success";
        } catch (Exception $e) {
            $msg = "Lỗi: " . $e->getMessage();
            $msgType = "error";
        }
    }
}

//dvgv
$search = $_GET['search'] ?? '';
$sqlList = "SELECT * FROM teachers WHERE full_name LIKE ? OR code_name LIKE ? ORDER BY status ASC, id DESC";
$stmtList = $conn->prepare($sqlList);
$stmtList->execute(["%$search%", "%$search%"]);
$teachers = $stmtList->fetchAll(PDO::FETCH_ASSOC);
?>