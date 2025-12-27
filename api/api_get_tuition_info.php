<?php
require_once '../connect/db_connect.php';

$studentId = $_GET['student_id'] ?? 0;
$classId = $_GET['class_id'] ?? 0;

if (!$studentId || !$classId) { 
    echo json_encode(['error' => 'Thiếu thông tin']); 
    exit; 
}

try {
    $sqlClass = "
        SELECT c.level_id, s.days 
        FROM classes c 
        JOIN shifts s ON c.shift_id = s.id 
        WHERE c.id = ?
    ";
    $stmtClass = $conn->prepare($sqlClass);
    $stmtClass->execute([$classId]);
    $classInfo = $stmtClass->fetch(PDO::FETCH_ASSOC);

    if (!$classInfo) {
        echo json_encode(['error' => 'Không tìm thấy thông tin lớp']);
        exit;
    }

    $levelId = $classInfo['level_id'];
    $days = $classInfo['days'];

    //xác định buổi học -> tách chuỗi
    
    $sessionsNeeded = 3;

    $parts = explode('-', $days);
    $count = count($parts);
    if ($count >= 2 && $count <= 7) {
        $sessionsNeeded = $count;
    }

    //lấy học phí khớp với level và số buổi học
    $sqlPkg = "SELECT * FROM tuition_packages 
               WHERE level_id = ? 
               AND sessions_per_week = ? 
               ORDER BY week_duration ASC";
    
    $stmtPkg = $conn->prepare($sqlPkg);
    $stmtPkg->execute([$levelId, $sessionsNeeded]);
    $packages = $stmtPkg->fetchAll(PDO::FETCH_ASSOC);

    //nếu không tìm thấy gói nào đúng số buổi, thử lấy tất cả gói của level đó (Fallback)
    if (empty($packages)) {
        $stmtPkgAll = $conn->prepare("SELECT * FROM tuition_packages WHERE level_id = ? ORDER BY week_duration ASC");
        $stmtPkgAll->execute([$levelId]);
        $packages = $stmtPkgAll->fetchAll(PDO::FETCH_ASSOC);
    }

    //thông tin khuyến mãi của học viên
    $student = $conn->query("
        SELECT p.discount_percent, p.name as promo_name 
        FROM students s 
        LEFT JOIN promotions p ON s.promotion_id = p.id 
        WHERE s.id = $studentId
    ")->fetch(PDO::FETCH_ASSOC);

    $promo = [
        'percent' => $student['discount_percent'] ?? 0,
        'name' => $student['promo_name'] ?? 'Không có'
    ];

    echo json_encode(['packages' => $packages, 'promo' => $promo]);

} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>