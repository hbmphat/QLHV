<?php
session_start();
require_once '../connect/db_connect.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sender_id = $_SESSION['user_id'];
    $target_type = $_POST['target_type'];
    $target_detail = $_POST['target_detail'] ?? 'Tất cả';
    $subject = $_POST['subject'];
    $content = $_POST['content'];
    
    //xử lý file đính kèm
    $attachment = '';
    if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] == 0) {
        $fileName = time() . '_' . $_FILES['attachment']['name'];
        $attachment = $fileName;
    }

    try {
        $stmt = $conn->prepare("INSERT INTO email_logs (sender_id, recipient_type, recipient_detail, subject, content, attachment, status) VALUES (?, ?, ?, ?, ?, ?, 'sent')");
        $stmt->execute([$sender_id, $target_type, $target_detail, $subject, $content, $attachment]);
        
        echo json_encode(['status' => 'success', 'message' => 'Đã gửi email thành công!']);
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
}
?>