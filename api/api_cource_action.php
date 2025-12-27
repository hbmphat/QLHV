<?php
session_start();
require_once '../connect/db_connect.php';
require_once 'api_system_log.php';

if (!isset($_SESSION['user_id'])) { header("Location: 0_login.php"); exit(); }

$msg = ""; $msgType = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    try {
        //ql cấp độ
        if ($action === 'add_level') {
            $name = trim($_POST['level_name']);
            $desc = trim($_POST['description']);
            $duration = trim($_POST['course_duration']);
            
            $stmt = $conn->prepare("INSERT INTO levels (level_name, description, course_duration) VALUES (?, ?, ?)");
            $stmt->execute([$name, $desc, $duration]);
            
            writeLog('level', $conn->lastInsertId(), 'THEM', "Thêm cấp độ: $name ($duration)");
            $msg = "Thêm cấp độ thành công!"; $msgType = "success";
        } 
        elseif ($action === 'edit_level') {
            $id = $_POST['level_id'];
            $name = trim($_POST['level_name']);
            $desc = trim($_POST['description']);
            $duration = trim($_POST['course_duration']);
            
            $stmt = $conn->prepare("UPDATE levels SET level_name=?, description=?, course_duration=? WHERE id=?");
            $stmt->execute([$name, $desc, $duration, $id]);
            
            writeLog('level', $id, 'SUA', "Cập nhật cấp độ: $name");
            $msg = "Cập nhật thành công!"; $msgType = "success";
        }

        //gói  hp
        elseif ($action === 'add_package') {
            $lid = $_POST['level_id']; $weeks = $_POST['weeks']; $sess = $_POST['sessions']; $fee = $_POST['fee'];
            $stmt = $conn->prepare("INSERT INTO tuition_packages (level_id, week_duration, sessions_per_week, tuition_fee) VALUES (?, ?, ?, ?)");
            $stmt->execute([$lid, $weeks, $sess, $fee]);
            writeLog('tuition', $conn->lastInsertId(), 'THEM', "Thêm gói {$weeks} tuần cho Level #$lid");
            $msg = "Thêm gói học phí thành công!"; $msgType = "success";
        }
        elseif ($action === 'edit_package') {
            $pid = $_POST['pkg_id']; $weeks = $_POST['weeks']; $sess = $_POST['sessions']; $fee = $_POST['fee'];
            $stmt = $conn->prepare("UPDATE tuition_packages SET week_duration=?, sessions_per_week=?, tuition_fee=? WHERE id=?");
            $stmt->execute([$weeks, $sess, $fee, $pid]);
            writeLog('tuition', $pid, 'SUA', "Cập nhật gói học phí #$pid");
            $msg = "Cập nhật gói thành công!"; $msgType = "success";
        }
    } catch (Exception $e) {
        $msg = "Lỗi: " . $e->getMessage(); $msgType = "error";
    }
}

$levels = $conn->query("SELECT * FROM levels ORDER BY sort_order ASC, id ASC")->fetchAll(PDO::FETCH_ASSOC);
$packages = $conn->query("SELECT * FROM tuition_packages ORDER BY week_duration ASC")->fetchAll(PDO::FETCH_ASSOC);

$data = [];
foreach($levels as $l) {
    $l['packages'] = [];
    foreach($packages as $p) {
        if($p['level_id'] == $l['id']) $l['packages'][] = $p;
    }
    $data[] = $l;
}
?>