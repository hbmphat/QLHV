<?php
session_start();
require_once '../connect/db_connect.php';

header('Content-Type: application/json');

// if (!isset($_SESSION['user_id']) || ($_SESSION['user_role'] ?? '') !== 'admin') {
//     echo json_encode(['status' => 'error', 'message' => 'Bạn không có quyền thực hiện!']);
//     exit;
// }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    $password = $input['password'] ?? '';
    $admin_id = $_SESSION['user_id'];

    if (empty($password)) {
        echo json_encode(['status' => 'error', 'message' => 'Vui lòng nhập mật khẩu xác nhận!']);
        exit;
    }

    try {
        //xác thực mật khẩu Admin
        $stmt = $conn->prepare("SELECT password FROM users WHERE id = ?");
        $stmt->execute([$admin_id]);
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$admin || !password_verify($password, $admin['password'])) {
            echo json_encode(['status' => 'error', 'message' => 'Mật khẩu Admin không chính xác!']);
            exit;
        }

        //sinh key random
        //chạy vòng lặp do while để đảm bảo key ko trùng
        $new_key = "";
        do {
            $random_num = rand(100000, 999999);
            $new_key = "NV-" . $random_num;
            
            // kiểm tra xem key đã tồn tại chưa
            $check = $conn->prepare("SELECT id FROM registration_keys WHERE key_code = ?");
            $check->execute([$new_key]);
        } while ($check->rowCount() > 0);

        //lưu vào db
        $insert = $conn->prepare("INSERT INTO registration_keys (key_code, is_used) VALUES (?, 0)");
        if ($insert->execute([$new_key])) {
            echo json_encode([
                'status' => 'success', 
                'message' => 'Tạo Key thành công!', 
                'key_code' => $new_key
            ]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Lỗi Database!']);
        }

    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'Lỗi hệ thống: ' . $e->getMessage()]);
    }
}
?>