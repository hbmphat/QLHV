<?php
session_start();
require_once '../connect/db_connect.php';
require_once 'api_system_log.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../view/0_login.php");
    exit();
}

//lấy danh sách khuyến mãi
$promotions = $conn->query("SELECT * FROM promotions ORDER BY discount_percent DESC, name ASC")->fetchAll(PDO::FETCH_ASSOC);

$sql = "
    SELECT s.*, 
           c.class_name, 
           l.level_name, 
           t.full_name as teacher_name,
           e.end_study_date,
           p.name as assigned_promo,
           p.discount_percent
    FROM students s
    LEFT JOIN enrollments e ON s.id = e.student_id AND e.status = 'dang_hoc'
    LEFT JOIN classes c ON e.class_id = c.id
    LEFT JOIN levels l ON c.level_id = l.id
    LEFT JOIN teachers t ON c.teacher_id = t.id
    LEFT JOIN promotions p ON s.promotion_id = p.id
    ORDER BY s.learning_status ASC, s.id DESC
";
$students = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);

//lọc
$classList = $conn->query("SELECT DISTINCT class_name FROM classes WHERE status=1 ORDER BY class_name")->fetchAll(PDO::FETCH_COLUMN);
$levelList = $conn->query("SELECT level_name FROM levels ORDER BY sort_order ASC")->fetchAll(PDO::FETCH_COLUMN);

$msg = "";
$msgType = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    $name = trim($_POST['full_name']);
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    //đồng bộ sđt
    $phone_input = trim($_POST['phone']);
    $parent_phone_input = trim($_POST['parent_phone']);

    //nhập sđt phụ huynh mà ko có học viên thì sẽ tự điền 
    if (empty($phone_input) && !empty($parent_phone_input)) {
        $phone_input = $parent_phone_input;
    }
    //lưu db
    $phone = $phone_input;
    $parent_phone = $parent_phone_input;
    $address = $_POST['address'];
    $joinDate = !empty($_POST['join_date']) ? $_POST['join_date'] : date('Y-m-d');
    $status = $_POST['status'] ?? 'dang_hoc';

    $promoId = !empty($_POST['promotion_id']) ? $_POST['promotion_id'] : null;

    $avatar = 'default_student.png';
    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0) {
        $ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
        $avatar = 'std_' . time() . '.' . $ext;
        move_uploaded_file($_FILES['avatar']['tmp_name'], 'uploads/' . $avatar);
    }

    try {
        if ($action === 'add_student') {
            //trùng tên và sđt trong db
            $check = $conn->prepare("SELECT id FROM students WHERE full_name = ? AND phone = ?");
            $check->execute([$name, $phone]);
            if ($check->rowCount() > 0) {
                throw new Exception("Học viên này đã tồn tại (Trùng Tên và SĐT)!");
            }

            $stmt = $conn->prepare("INSERT INTO students (full_name, dob, gender, phone, parent_phone, address, learning_status, avatar, promotion_id, join_date) VALUES (?,?,?,?,?,?,?,?,?,?)");
            $stmt->execute([$name, $dob, $gender, $phone, $parent_phone, $address, 'dang_hoc', $avatar, $promoId, $joinDate]);

            writeLog('student', $conn->lastInsertId(), 'THEM', "Thêm học viên: $name");
            $msg = "Thêm học viên thành công!";
            
        } elseif ($action === 'edit_student') {
            $id = $_POST['student_id'];
            //nếu vừa trùng tên vừa trùng sđt
            $check = $conn->prepare("SELECT id FROM students WHERE full_name = ? AND phone = ? AND id != ?");
            $check->execute([$name, $phone, $id]);
            if ($check->rowCount() > 0) {
                throw new Exception("Thông tin trùng với học viên khác (Trùng Tên và SĐT)!");
            }

            $oldData = $conn->query("SELECT * FROM students WHERE id=$id")->fetch(PDO::FETCH_ASSOC);

            $avatarQuery = ($avatar != 'default_student.png') ? ", avatar='$avatar'" : "";

            $stmt = $conn->prepare("UPDATE students SET full_name=?, dob=?, gender=?, phone=?, parent_phone=?, address=?, learning_status=?, promotion_id=?, join_date=? $avatarQuery WHERE id=?");
            $stmt->execute([$name, $dob, $gender, $phone, $parent_phone, $address, $status, $promoId, $joinDate, $id]);

            writeLog('student', $id, 'SUA', "Cập nhật hồ sơ: $name", $oldData);
            $msg = "Cập nhật thành công!";
        }
        $msgType = 'success';
        
        // refresh lại danh sách
        $students = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        
    } catch (Exception $e) {
        $msg = "Lỗi: " . $e->getMessage();
        $msgType = 'error';
    }
}
?>