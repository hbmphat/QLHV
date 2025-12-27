document.addEventListener("DOMContentLoaded", () => {
    document.body.classList.add('loaded');
});
function switchTab(tab) {

    const formLogin = document.getElementById('form-login');
    const formRegister = document.getElementById('form-register');
    const formForgot = document.getElementById('form-forgot');

    document.querySelectorAll('[id^="msg-"]').forEach(el => el.innerHTML = '');
    formForgot.classList.remove('active');
    formForgot.style.display = 'none';
    document.getElementById('auth-toggle-box').style.display = 'flex';

    let incomingForm, outgoingForm;

    if (tab === 'login') {
        incomingForm = formLogin;
        outgoingForm = formRegister;
        document.getElementById('page-title').innerText = "Chào mừng trở lại!";
        document.getElementById('page-subtitle').innerText = "Quản lý học viên hiệu quả, dễ dàng.";
    } else {
        incomingForm = formRegister;
        outgoingForm = formLogin;
        document.getElementById('page-title').innerText = "Tạo tài khoản mới";
        document.getElementById('page-subtitle').innerText = "Nhập mã kích hoạt để bắt đầu.";
    }

    outgoingForm.classList.remove('active');
    outgoingForm.classList.add('slide-out');

    setTimeout(() => {
        outgoingForm.classList.remove('slide-out');

        incomingForm.classList.add('active');

        const firstInput = incomingForm.querySelector('input');
        if (firstInput) firstInput.focus();
    }, 200);
}

function togglePass(inputId, btn) {
    const input = document.getElementById(inputId);
    const icon = btn.querySelector('.material-symbols-outlined');
    if (input.type === 'password') {
        input.type = 'text';
        icon.textContent = 'visibility_off';
    } else {
        input.type = 'password';
        icon.textContent = 'visibility';
    }
}

function showMessage(containerId, type, text) {
    const container = document.getElementById(containerId);
    container.innerHTML = `<div style="padding: 10px; margin-bottom: 15px; border-radius: 6px; text-align: center; font-size: 14px; ${type === 'error' ? 'background:#fee2e2; color:#991b1b;' : 'background:#dcfce7; color:#166534;'}">${text}</div>`;
    setTimeout(() => container.innerHTML = '', 3000);
}

function handleLogin(e) {
    e.preventDefault();
    const form = document.getElementById('form-login');
    const btn = document.getElementById('btn-login');
    const originalText = btn.innerHTML;

    btn.innerHTML = '<span class="spinner" style="border-top-color:white;"></span> Đang xử lý...';
    btn.disabled = true;

    const formData = new FormData(form);

    fetch('../api/api_auth_action.php', {
        method: 'POST',
        body: formData
    })
        .then(res => res.json())
        .then(data => {
            if (data.status === 'success') {
                const popup = document.getElementById('successPopup');
                popup.style.display = 'flex';
                setTimeout(() => popup.classList.add('show'), 10);
                setTimeout(() => {
                    document.body.classList.add('fade-out-page');

                    setTimeout(() => {
                        window.location.href = data.redirect;
                    }, 500);

                }, 1500);
            } else {
                showMessage('msg-login', 'error', data.message);
                btn.innerHTML = originalText;
                btn.disabled = false;
            }
        })
        .catch(err => {
            showMessage('msg-login', 'error', 'Lỗi kết nối Server!');
            btn.innerHTML = originalText;
            btn.disabled = false;
        });
}

//đăng ký
function handleRegister(e) {
    e.preventDefault();
    const form = document.getElementById('form-register');
    const btn = document.getElementById('btn-register');
    const originalText = btn.innerHTML;

    btn.innerHTML = '<span class="spinner" style="border-top-color:white;"></span> Đang xử lý...';
    btn.disabled = true;

    const formData = new FormData(form);

    fetch('../api/api_auth_action.php', {
        method: 'POST',
        body: formData
    })
        .then(res => res.json())
        .then(data => {
            if (data.status === 'success') {
                showMessage('msg-register', 'success', data.message);
                form.reset();
                setTimeout(() => {
                    document.getElementById('tab-login').click();
                    switchTab('login');
                    showMessage('msg-login', 'success', 'Đăng ký thành công! Vui lòng đăng nhập.');
                }, 2000);
            } else {
                showMessage('msg-register', 'error', data.message);
            }
        })
        .catch(err => showMessage('msg-register', 'error', 'Lỗi kết nối Server!'))
        .finally(() => {
            btn.innerHTML = originalText;
            btn.disabled = false;
        });
}

// quên mk
function showForgotForm(e) {
    e.preventDefault();
    document.getElementById('form-login').classList.remove('active');
    document.getElementById('form-register').classList.remove('active');
    document.getElementById('auth-toggle-box').style.display = 'none';

    const formForgot = document.getElementById('form-forgot');
    formForgot.style.display = 'block';
    setTimeout(() => formForgot.classList.add('active'), 10);

    document.getElementById('page-title').innerText = "Quên mật khẩu?";
    document.getElementById('page-subtitle').innerText = "Khôi phục tài khoản bằng Key kích hoạt.";
}

function backToLogin(e) {
    if (e) e.preventDefault();
    const formForgot = document.getElementById('form-forgot');
    
    formForgot.classList.remove('active');
    setTimeout(() => formForgot.style.display = 'none', 300);

    document.getElementById('auth-toggle-box').style.display = 'flex';
    document.getElementById('tab-login').checked = true;
    switchTab('login');
}

function handleForgot(e) {
    e.preventDefault();
    const form = document.getElementById('form-forgot');
    const btn = document.getElementById('btn-forgot');
    const originalText = btn.innerHTML;
    btn.innerHTML = '<span class="spinner" style="border-top-color:white;"></span> Đang xử lý...';
    btn.disabled = true;

    const formData = new FormData(form);

    fetch('../api/api_auth_action.php', {
        method: 'POST',
        body: formData
    })
        .then(res => res.json())
        .then(data => {
            if (data.status === 'success') {
                showMessage('msg-forgot', 'success', data.message);
                form.reset();
                setTimeout(() => {
                    backToLogin();
                    showMessage('msg-login', 'success', 'Mật khẩu đã đổi thành công. Vui lòng đăng nhập!');
                }, 2000);
            } else {
                showMessage('msg-forgot', 'error', data.message);
            }
        })
        .catch(err => showMessage('msg-forgot', 'error', 'Lỗi kết nối Server!'))
        .finally(() => {
            btn.innerHTML = originalText;
            btn.disabled = false;
        });
}