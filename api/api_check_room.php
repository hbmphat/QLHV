<?php
session_start();
require_once '../connect/db_connect.php';

$shiftId = $_GET['shift_id'] ?? 0;

if (!$shiftId) {
    echo json_encode([]);
    exit;
}

try {
    //lấy all phòng
    $rooms = $conn->query("SELECT * FROM rooms ORDER BY room_name ASC")->fetchAll(PDO::FETCH_ASSOC);

    //lấy các phòng đang có lớp học
    $stmtBusy = $conn->prepare("SELECT room_id, class_name FROM classes WHERE shift_id = ? AND status = 1");
    $stmtBusy->execute([$shiftId]);
    $busyData = $stmtBusy->fetchAll(PDO::FETCH_KEY_PAIR);

    $result = [];
    foreach ($rooms as $r) {
        $isBusy = array_key_exists($r['id'], $busyData);
        $result[] = [
            'id' => $r['id'],
            'name' => $r['room_name'],
            'status' => $r['status'], //sẵn sàng, bảo trì
            'is_busy' => $isBusy,
            'class_using' => $isBusy ? $busyData[$r['id']] : null
        ];
    }

    echo json_encode($result);

} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>