<?php
session_start();
require_once '../connect/db_connect.php';
require_once 'api_system_log.php'; //ghi log

header('Content-Type: application/json');

$response = [
    'status' => 'error',
    'message' => 'Yêu cầu không hợp lệ'
];
//đăng nhập
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST['action'] ?? '';
    if ($action == 'login') {
        $user_login = trim($_POST['username']);
        $pass_login = $_POST['password'];

        if (empty($user_login) || empty($pass_login)) {
            echo json_encode(['status' => 'error', 'message' => 'Vui lòng nhập đầy đủ thông tin!']);
            exit;
        }

        try {
            $stmt = $conn->prepare("SELECT * FROM users WHERE username = :user");
            $stmt->execute([':user' => $user_login]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($pass_login, $user['password'])) {
                //dăng nhập thành công
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_role'] = $user['role'];
                $_SESSION['full_name'] = $user['full_name'];
                writeLog('auth', $user['id'], 'LOGIN', 'Đăng nhập vào hệ thống');

                echo json_encode([
                    'status' => 'success', 
                    'message' => 'Đăng nhập thành công!',
                    'redirect' => '1_dashboad.php'
                ]);
            } else {
                $failedId = ($user) ? $user['id'] : 0;
                writeLog('auth', $failedId, 'LOGIN_FAIL', "Sai mật khẩu hoặc tài khoản: $user_login");

                echo json_encode(['status' => 'error', 'message' => 'Tên đăng nhập hoặc mật khẩu sai!']);
            }
        } catch (PDOException $e) {
            echo json_encode(['status' => 'error', 'message' => 'Lỗi hệ thống: ' . $e->getMessage()]);
        }
        exit;
    }

    //đăng ký
    if ($action == 'register') {
        $reg_key = trim($_POST['reg_key']);
        $fullname = trim($_POST['full_name']);
        $reg_user = trim($_POST['reg_username']);
        $reg_pass = $_POST['reg_password'];

        if (empty($reg_key) || empty($fullname) || empty($reg_user) || empty($reg_pass)) {
            echo json_encode(['status' => 'error', 'message' => 'Vui lòng điền đầy đủ thông tin!']);
            exit;
        }

        try {
            //kiểm tra Key
            $checkKey = $conn->prepare("SELECT id FROM registration_keys WHERE key_code = :key AND is_used = 0");
            $checkKey->execute([':key' => $reg_key]);

            if ($checkKey->rowCount() > 0) {
                //kiểm tra User
                $checkUser = $conn->prepare("SELECT id FROM users WHERE username = :user");
                $checkUser->execute([':user' => $reg_user]);

                if ($checkUser->rowCount() > 0) {
                    echo json_encode(['status' => 'error', 'message' => 'Tên đăng nhập đã tồn tại!']);
                } else {
                    $conn->beginTransaction();
                    $hashed_pass = password_hash($reg_pass, PASSWORD_DEFAULT);
                    
                    //thêm User
                    $insertUser = $conn->prepare("INSERT INTO users (username, password, full_name, role) VALUES (:user, :pass, :fname, 'staff')");
                    $insertUser->execute([':user' => $reg_user, ':pass' => $hashed_pass, ':fname' => $fullname]);
                    
                    //ghi log
                    $newUserId = $conn->lastInsertId();

                    // cập nhật Key đã dùng
                    $updateKey = $conn->prepare("UPDATE registration_keys SET is_used = 1 WHERE key_code = :key");
                    $updateKey->execute([':key' => $reg_key]);
                    //ghi log
                    writeLog('auth', $newUserId, 'REGISTER', "Đăng ký tài khoản mới bằng key: $reg_key");

                    $conn->commit();
                    echo json_encode(['status' => 'success', 'message' => 'Đăng ký thành công! Hãy đăng nhập.']);
                }
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Key kích hoạt không hợp lệ hoặc đã dùng!']);
            }
        } catch (PDOException $e) {
            if ($conn->inTransaction()) $conn->rollBack();
            echo json_encode(['status' => 'error', 'message' => 'Lỗi: ' . $e->getMessage()]);
        }
        exit;
    }

    //quên mật khẩu
    if ($action == 'forgot_password') {
        $username = trim($_POST['forgot_username']);
        $key = trim($_POST['forgot_key']);
        $new_pass = $_POST['new_password'];

        if (empty($username) || empty($key) || empty($new_pass)) {
            echo json_encode(['status' => 'error', 'message' => 'Vui lòng điền đầy đủ thông tin!']);
            exit;
        }

        try {
            //kiểm tra tên đăng nhập
            $stmt = $conn->prepare("SELECT id, full_name FROM users WHERE username = :user");
            $stmt->execute([':user' => $username]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$user) {
                echo json_encode(['status' => 'error', 'message' => 'Tên đăng nhập không tồn tại!']);
                exit;
            }

            //kiểm tra key
            $stmtKey = $conn->prepare("SELECT id FROM registration_keys WHERE key_code = :key AND is_used = 1");
            $stmtKey->execute([':key' => $key]);
            
            if ($stmtKey->rowCount() == 0) {
                echo json_encode(['status' => 'error', 'message' => 'Mã kích hoạt không đúng hoặc chưa được kích hoạt!']);
                exit;
            }

            //cập nhật mật khẩu mới
            $hashed_pass = password_hash($new_pass, PASSWORD_DEFAULT);
            $updateStmt = $conn->prepare("UPDATE users SET password = :pass WHERE username = :user");
            
            if ($updateStmt->execute([':pass' => $hashed_pass, ':user' => $username])) {
                
                //ghi log
                writeLog('auth', $user['id'], 'RESET_PASS', 'Khôi phục mật khẩu bằng Key cũ');

                echo json_encode(['status' => 'success', 'message' => 'Đổi mật khẩu thành công!']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Lỗi khi cập nhật mật khẩu.']);
            }

        } catch (PDOException $e) {
            echo json_encode(['status' => 'error', 'message' => 'Lỗi hệ thống: ' . $e->getMessage()]);
        }
        exit;
    }
}
    //đổi mật khẩu khi đang đăng nhập
    if ($action == 'change_password') {
        // kiểm tra xem đã đăng nhập chưa
        if (!isset($_SESSION['user_id'])) {
            echo json_encode(['status' => 'error', 'message' => 'Phiên đăng nhập hết hạn!']);
            exit;
        }

        $userId  = $_SESSION['user_id'];
        $oldPass = $_POST['old_pass'] ?? '';
        $regKey  = trim($_POST['reg_key'] ?? '');
        $newPass = $_POST['new_pass'] ?? '';

        if (empty($oldPass) || empty($regKey) || empty($newPass)) {
            echo json_encode(['status' => 'error', 'message' => 'Thiếu thông tin!']);
            exit;
        }

        try {
            //lấy thông tin user hiện tại để check pass cũ
            $stmt = $conn->prepare("SELECT password, username FROM users WHERE id = ?");
            $stmt->execute([$userId]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$user || !password_verify($oldPass, $user['password'])) {
                //ghi log bảo mật nếu nhập sai pass cũ
                writeLog('auth', $userId, 'CHANGE_PASS_FAIL', 'Nhập sai mật khẩu cũ');
                echo json_encode(['status' => 'error', 'message' => 'Mật khẩu hiện tại không đúng!']);
                exit;
            }

            //kiểm tra mã key
            $stmtKey = $conn->prepare("SELECT id FROM registration_keys WHERE key_code = ? AND is_used = 1");
            $stmtKey->execute([$regKey]);
            
            if ($stmtKey->rowCount() == 0) {
                echo json_encode(['status' => 'error', 'message' => 'Mã Key bảo mật không hợp lệ!']);
                exit;
            }

            //cập nhật pass mới
            $newHash = password_hash($newPass, PASSWORD_DEFAULT);
            $update = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
            
            if ($update->execute([$newHash, $userId])) {
                //ghi log thành công
                writeLog('auth', $userId, 'CHANGE_PASS', 'Đổi mật khẩu thành công');
                echo json_encode(['status' => 'success', 'message' => 'Đổi mật khẩu thành công!']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Lỗi hệ thống, thử lại sau.']);
            }

        } catch (PDOException $e) {
            echo json_encode(['status' => 'error', 'message' => 'Lỗi: ' . $e->getMessage()]);
        }
        exit;
    }
?>
?>