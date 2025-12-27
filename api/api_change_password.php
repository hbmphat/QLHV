<?php
session_start();
require_once '../connect/db_connect.php';

header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Vui lòng đăng nhập lại!']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // nhận dữ liệu JSON từ Javascript gửi sang
    $input = json_decode(file_get_contents('php://input'), true);
    
    $old_pass = trim($input['old_pass'] ?? '');
    $reg_key  = trim($input['reg_key'] ?? '');
    $new_pass = trim($input['new_pass'] ?? '');
    $user_id  = $_SESSION['user_id'];

    // kiểm tra rỗng
    if (empty($old_pass) || empty($reg_key) || empty($new_pass)) {
        echo json_encode(['status' => 'error', 'message' => 'Vui lòng nhập đầy đủ thông tin!']);
        exit;
    }

    try {
        //lấy thông tin mật khẩu hiện tại của User
        $stmt = $conn->prepare("SELECT password FROM users WHERE id = ?");
        $stmt->execute([$user_id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            echo json_encode(['status' => 'error', 'message' => 'Tài khoản không tồn tại!']);
            exit;
        }

        //kiểm tra mật khẩu cũ (có khớp với db ko)
        if (!password_verify($old_pass, $user['password'])) {
            echo json_encode(['status' => 'error', 'message' => 'Mật khẩu cũ không chính xác!']);
            exit;
        }

        //kiểm tra key
        $stmtKey = $conn->prepare("SELECT id FROM registration_keys WHERE key_code = ? AND is_used = 1");
        $stmtKey->execute([$reg_key]);

        if ($stmtKey->rowCount() == 0) {
            echo json_encode(['status' => 'error', 'message' => 'Mã Key bảo mật không đúng!']);
            exit;
        }

        //cập nhật mk mới
        $new_hashed_pass = password_hash($new_pass, PASSWORD_DEFAULT);
        $updateStmt = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
        
        if ($updateStmt->execute([$new_hashed_pass, $user_id])) {
            echo json_encode(['status' => 'success', 'message' => 'Đổi mật khẩu thành công!']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Lỗi khi lưu vào cơ sở dữ liệu.']);
        }

    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'Lỗi hệ thống: ' . $e->getMessage()]);
    }
}
?>