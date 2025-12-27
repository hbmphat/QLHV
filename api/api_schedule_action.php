<?php
session_start();
require_once '../connect/db_connect.php';
require_once 'api_system_log.php';

if (!isset($_SESSION['user_id'])) { header("Location: 0_login.php"); exit(); }

$rooms = $conn->query("SELECT * FROM rooms ORDER BY room_name ASC")->fetchAll(PDO::FETCH_ASSOC);
$teachers = $conn->query("SELECT id, full_name FROM teachers WHERE status IN ('dang_day','thu_viec') ORDER BY full_name ASC")->fetchAll(PDO::FETCH_ASSOC);
$shifts = $conn->query("SELECT * FROM shifts ORDER BY start_time ASC")->fetchAll(PDO::FETCH_ASSOC);
//chỉ lấy lớp đang hoạt động
$sqlClasses = "
    SELECT c.id, c.class_name, c.student_count,
           r.id as room_id, r.room_name,
           t.id as teacher_id, t.code_name, t.full_name,
           s.id as shift_id, s.days
    FROM classes c
    JOIN shifts s ON c.shift_id = s.id
    JOIN rooms r ON c.room_id = r.id
    JOIN teachers t ON c.teacher_id = t.id
    WHERE c.status = 1
";
$classes = $conn->query($sqlClasses)->fetchAll(PDO::FETCH_ASSOC);

$scheduleData = [];

foreach ($classes as $c) {
    $daysArr = [];
    
    //logic bóc tách thứ
    if (strpos($c['days'], '2') !== false) $daysArr[] = 2;
    if (strpos($c['days'], '3') !== false) $daysArr[] = 3;
    if (strpos($c['days'], '4') !== false) $daysArr[] = 4;
    if (strpos($c['days'], '5') !== false) $daysArr[] = 5;
    if (strpos($c['days'], '6') !== false) $daysArr[] = 6;
    if (strpos($c['days'], '7') !== false || strpos($c['days'], 'T7') !== false) $daysArr[] = 7;
    if (strpos($c['days'], 'CN') !== false) $daysArr[] = 8; // quy ước CN là 8

    foreach ($daysArr as $d) {
        $scheduleData[$c['shift_id']][$d][] = $c;
    }
}
?>