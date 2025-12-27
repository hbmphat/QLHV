<?php
session_start();
require_once '../connect/db_connect.php';
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) { echo json_encode(['status' => 'error', 'message' => 'Chưa đăng nhập']); exit; }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    $id = $input['id'] ?? 0;
    $note = $input['note'] ?? '';

    if ($id) {
        try {
            $stmt = $conn->prepare("UPDATE students SET note = ? WHERE id = ?");
            if ($stmt->execute([$note, $id])) {
                echo json_encode(['status' => 'success']);
            } else {
                echo json_encode(['status' => 'error']);
            }
        } catch (Exception $e) {
            echo json_encode(['status' => 'error']);
        }
    }
}
?>