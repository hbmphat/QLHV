<?php
session_start();
require_once '../connect/db_connect.php';

header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode([]);
    exit;
}

$action = $_GET['action'] ?? '';
$user_id = $_SESSION['user_id'];

//gửi tin nhắn
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $action === 'send') {
    $input = json_decode(file_get_contents('php://input'), true);
    $msg = trim($input['message'] ?? '');

    if (!empty($msg)) {
        try {
            $stmt = $conn->prepare("
                INSERT INTO chat_messages (user_id, message) 
                VALUES (?, ?)
            ");
            $stmt->execute([$user_id, htmlspecialchars($msg)]);

            echo json_encode(['status' => 'success']);
        } catch (Exception $e) {
            echo json_encode(['status' => 'error']);
        }
    }
    exit;
}

//lấy tin nhắn
if ($action === 'load') {
    try {
        // Lấy đầy đủ ngày giờ tạo tin nhắn
        $sql = "SELECT m.id, m.user_id, m.message, m.created_at,
                       u.full_name, u.role
                FROM chat_messages m
                JOIN users u ON m.user_id = u.id
                ORDER BY m.id DESC
                LIMIT 50";

        $stmt = $conn->query($sql);
        $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode(array_reverse($messages));

    } catch (Exception $e) {
        echo json_encode([]);
    }
    exit;
}
?>
