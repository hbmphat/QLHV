<?php
session_start();
// nếu đã đăng nhập thì chuyển luôn
if (isset($_SESSION['user_id'])) {
    header("Location: 1_dashboad.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập-EngBreak</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
     <link rel="stylesheet" href="../style/0_login.css">
     <script src="../javascript/0_login.js" defer></script>
</head>
<body>

    <div class="container">
        <div class="login-wrapper">
            <div class="login-content">

                <div class="header-section">
                    <div class="brand">
                        <span class="material-symbols-outlined brand-icon">school</span>
                        <span class="brand-name">EngBreak</span>
                    </div>
                    <h1 class="welcome-title" id="page-title">Chào mừng trở lại!</h1>
                    <p class="welcome-subtitle" id="page-subtitle">Quản lý học viên hiệu quả, dễ dàng.</p>
                </div>

                <div class="auth-toggle" id="auth-toggle-box">
                    <label class="toggle-btn">
                        <input type="radio" name="auth-type" id="tab-login" onchange="switchTab('login')" checked>
                        <span>Đăng nhập</span>
                    </label>
                    <label class="toggle-btn">
                        <input type="radio" name="auth-type" id="tab-register" onchange="switchTab('register')">
                        <span>Đăng ký</span>
                    </label>
                </div>

                <form id="form-login" class="form-section active" onsubmit="handleLogin(event)">
                    <input type="hidden" name="action" value="login">
                    <div id="msg-login"></div>

                    <div class="form-group">
                        <label>Tên đăng nhập</label>
                        <div class="input-wrapper">
                            <span class="material-symbols-outlined input-icon">person</span>
                            <input type="text" name="username" placeholder="Nhập tên đăng nhập" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <div class="input-wrapper">
                            <span class="material-symbols-outlined input-icon">lock</span>
                            <input type="password" name="password" id="login_pass" placeholder="Nhập mật khẩu" required>
                            <button type="button" class="toggle-pass-btn" onclick="togglePass('login_pass', this)">
                                <span class="material-symbols-outlined">visibility</span>
                            </button>
                        </div>
                    </div>

                    <div class="forgot-link">
                        <a href="#" onclick="showForgotForm(event)">Quên mật khẩu?</a>
                    </div>

                    <button type="submit" class="btn-submit" id="btn-login">Đăng nhập</button>
                </form>

                <form id="form-register" class="form-section" onsubmit="handleRegister(event)">
                    <input type="hidden" name="action" value="register">
                    <div id="msg-register"></div>

                    <div class="form-group"><label>Mã kích hoạt (Key)</label>
                        <div class="input-wrapper"><span class="material-symbols-outlined input-icon">vpn_key</span><input type="text" name="reg_key" placeholder="Ví dụ: NV-123456" required></div>
                    </div>
                    <div class="form-group"><label>Họ và tên</label>
                        <div class="input-wrapper"><span class="material-symbols-outlined input-icon">badge</span><input type="text" name="full_name" placeholder="Nguyễn Văn A" required></div>
                    </div>
                    <div class="form-group"><label>Tên đăng nhập mới</label>
                        <div class="input-wrapper"><span class="material-symbols-outlined input-icon">person_add</span><input type="text" name="reg_username" placeholder="Chọn tên đăng nhập" required></div>
                    </div>
                    <div class="form-group"><label>Mật khẩu</label>
                        <div class="input-wrapper"><span class="material-symbols-outlined input-icon">lock</span><input type="password" name="reg_password" id="reg_pass" placeholder="Tạo mật khẩu" required><button type="button" class="toggle-pass-btn" onclick="togglePass('reg_pass', this)"><span class="material-symbols-outlined">visibility</span></button></div>
                    </div>

                    <button type="submit" class="btn-submit" id="btn-register">Đăng ký tài khoản</button>
                </form>

                <form id="form-forgot" class="form-section" onsubmit="handleForgot(event)">
                    <input type="hidden" name="action" value="forgot_password">
                    <div id="msg-forgot"></div>
                    <p style="font-size:14px; color:var(--text-secondary); margin-bottom:20px;">Nhập tên đăng nhập và mã kích hoạt (Key) bạn đã dùng để đăng ký.</p>
                    <div class="form-group"><label>Tên đăng nhập</label>
                        <div class="input-wrapper"><span class="material-symbols-outlined input-icon">person</span><input type="text" name="forgot_username" placeholder="Nhập tên đăng nhập" required></div>
                    </div>
                    <div class="form-group"><label>Mã kích hoạt (Key cũ)</label>
                        <div class="input-wrapper"><span class="material-symbols-outlined input-icon">vpn_key</span><input type="text" name="forgot_key" placeholder="Key đã dùng để đăng ký" required></div>
                    </div>
                    <div class="form-group"><label>Mật khẩu mới</label>
                        <div class="input-wrapper"><span class="material-symbols-outlined input-icon">lock_reset</span><input type="password" name="new_password" id="new_pass" placeholder="Nhập mật khẩu mới" required><button type="button" class="toggle-pass-btn" onclick="togglePass('new_pass', this)"><span class="material-symbols-outlined">visibility</span></button></div>
                    </div>
                    <button type="submit" class="btn-submit" id="btn-forgot">Đổi mật khẩu</button>
                    <div class="back-link"><a href="#" onclick="backToLogin(event)"><span class="material-symbols-outlined" style="font-size:16px">arrow_back</span> Quay lại đăng nhập</a></div>
                </form>

            </div>
        </div>
        <div class="image-wrapper">
            <div class="image-overlay"></div>
            <div class="image-content">
                <h2>English Is The Key To Success In Life</h2>
            </div>
        </div>
    </div>

    <div id="successPopup" class="success-overlay">
        <div class="success-box">
            <span class="material-symbols-outlined success-icon">check_circle</span>
            <h3 class="success-title">Thành công!</h3>
            <p class="success-desc" id="successText">Đang xử lý...</p>
        </div>
    </div>
</body>

</html>