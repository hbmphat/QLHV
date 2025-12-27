let chatInterval = null;
let isChatOpen = false;
let lastMsgCount = 0;

document.addEventListener("DOMContentLoaded", () => {
    
    const marker = document.querySelector(".nav-marker");
    const navLinks = document.querySelectorAll(".nav-menu .nav-item");
    const menu = document.querySelector(".nav-menu");

    function setMarkerPosition(element, withAnimation = true) {
        if (!element || !marker) return;

        const targetTop = element.offsetTop;
        const targetHeight = element.offsetHeight;

        if (withAnimation) {
            marker.classList.add('animatable');
        } else {
            marker.classList.remove('animatable');
        }

        marker.style.transform = `translateY(${targetTop}px)`;
        marker.style.height = `${targetHeight}px`;
        marker.classList.add("visible");
    }

    const currentPathName = window.location.pathname.split("/").pop();
    const cleanPath = (currentPathName === '' || currentPathName === 'index.php') ? '1_dashboad.php' : currentPathName;
    let activeLink = null;

    navLinks.forEach(link => {
        if (link.getAttribute('href') === cleanPath) {
            activeLink = link;
            link.classList.add('active');
        }
    });

    if (activeLink) {
        const prevTop = sessionStorage.getItem('nav_prev_top');
        const prevHeight = sessionStorage.getItem('nav_prev_height');

        if (prevTop !== null) {

            marker.classList.remove('animatable');
            marker.style.transform = `translateY(${prevTop}px)`;
            marker.style.height = `${prevHeight}px`;
            marker.classList.add("visible");

            requestAnimationFrame(() => {
                void marker.offsetWidth; 
                
                setMarkerPosition(activeLink, true);
            });
        } else {
            setMarkerPosition(activeLink, false);
        }
    }

    navLinks.forEach(link => {
        link.addEventListener("click", function(e) {
            const top = this.offsetTop;
            const height = this.offsetHeight;
            
            sessionStorage.setItem('nav_prev_top', top);
            sessionStorage.setItem('nav_prev_height', height);
            
        });
    });

    navLinks.forEach(link => {
        link.addEventListener("mouseenter", () => setMarkerPosition(link, true));
    });

    if(menu) {
        menu.addEventListener("mouseleave", () => {
            if (activeLink) setMarkerPosition(activeLink, true);
        });
    }

    const mainContent = document.getElementById("main-content");
    if(mainContent) setTimeout(() => mainContent.classList.add('loaded'), 50);
});

    const btnSettings = document.getElementById('btn-settings');
    const submenuSettings = document.getElementById('submenu-settings');
    if (btnSettings && submenuSettings) {
        btnSettings.addEventListener('click', () => {
            submenuSettings.classList.toggle('open');
            const arrow = btnSettings.querySelector('.arrow-icon');
            if (arrow) arrow.style.transform = submenuSettings.classList.contains('open') ? 'rotate(180deg)' : 'rotate(0deg)';
        });
    }

    const themeBtn = document.getElementById('btn-toggle-theme');
    const icon = document.getElementById('theme-icon');
    const text = document.getElementById('theme-text');

    function applyTheme(isDark) {
        if (isDark) {
            document.documentElement.classList.add('dark-mode'); 
            if (icon) icon.textContent = 'light_mode';
            if (text) text.textContent = 'Giao diện Sáng';
        } else {
            document.documentElement.classList.remove('dark-mode');
            if (icon) icon.textContent = 'dark_mode';
            if (text) text.textContent = 'Giao diện Tối';
        }
    }

    if (localStorage.getItem('theme') === 'dark') {
        applyTheme(true);
    }

    if (themeBtn) {
        themeBtn.addEventListener('click', (e) => {
            e.preventDefault();
            const isDarkNow = document.documentElement.classList.toggle('dark-mode');
            localStorage.setItem('theme', isDarkNow ? 'dark' : 'light');
            applyTheme(isDarkNow);
        });
    }

    setInterval(() => {
        if (!isChatOpen && typeof loadMessages === 'function') {
            loadMessages(true);
        }
    }, 3000);

window.openModal = function(id) {
    const modal = document.getElementById(id);
    if (modal) {
        modal.style.display = 'flex';
        setTimeout(() => modal.classList.add('show'), 10);
    }
}

window.closeModal = function(id) {
    const modal = document.getElementById(id);
    if (modal) {
        modal.classList.remove('show');
        setTimeout(() => modal.style.display = 'none', 300);
    }
}
// backup logic
window.openBackupPopup = function(e) {
    if (e) e.preventDefault();
    openModal('backupModal');
    // reset UI
    if(document.getElementById('step-auth')) document.getElementById('step-auth').style.display = 'block';
    if(document.getElementById('step-loading')) document.getElementById('step-loading').style.display = 'none';
    if(document.getElementById('step-success')) document.getElementById('step-success').style.display = 'none';
    if(document.getElementById('step-error')) document.getElementById('step-error').style.display = 'none';
    
    const passInput = document.getElementById('adminPass');
    if(passInput) {
        passInput.value = '';
        setTimeout(() => passInput.focus(), 200);
        passInput.onkeydown = (e) => { if (e.key === 'Enter') verifyPassword(); }
    }
}
window.closeBackupPopup = function() { closeModal('backupModal'); }

window.verifyPassword = function() {
    const inp = document.getElementById('adminPass');
    if (!inp || !inp.value) return alert("Vui lòng nhập mật khẩu!");

    document.getElementById('step-auth').style.display = 'none';
    document.getElementById('step-loading').style.display = 'block';

    const formData = new FormData();
    formData.append('password', inp.value);

    fetch('../api/api_backup.php', { method: 'POST', body: formData })
        .then(res => res.json())
        .then(data => {
            document.getElementById('step-loading').style.display = 'none';
            if (data.status === 'success') {
                document.getElementById('step-success').style.display = 'block';
                const link = document.createElement('a');
                link.href = data.url;
                link.download = data.filename;
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            } else {
                document.getElementById('step-error').style.display = 'block';
            }
        })
        .catch(() => {
            document.getElementById('step-loading').style.display = 'none';
            document.getElementById('step-error').style.display = 'block';
        });
}

window.retryBackup = function() {
    document.getElementById('step-error').style.display = 'none';
    document.getElementById('step-auth').style.display = 'block';
    const inp = document.getElementById('adminPass');
    inp.value = '';
    inp.focus();
}

window.openChangePassModal = function(e) { 
    if(e) e.preventDefault(); 
    openModal('changePassModal'); 
    
    document.getElementById('cp_old_pass').value = '';
    document.getElementById('cp_reg_key').value = '';
    document.getElementById('cp_new_pass').value = '';
    document.getElementById('cp-status-msg').innerHTML = '';
}

window.closeChangePassModal = function() { 
    closeModal('changePassModal'); 
}

// login đổi mk
window.submitChangePass = function() {
    const oldPass = document.getElementById('cp_old_pass').value.trim();
    const regKey  = document.getElementById('cp_reg_key').value.trim();
    const newPass = document.getElementById('cp_new_pass').value.trim();
    const msg     = document.getElementById('cp-status-msg');
    
    if (!oldPass || !regKey || !newPass) {
        msg.innerHTML = "⚠️ Vui lòng nhập đầy đủ thông tin (*)";
        msg.style.color = "#dc3545"; // Màu đỏ
        msg.style.opacity = 1;
        return;
    }

    msg.innerHTML = '<span class="spinner" style="width:12px; height:12px; border-width:2px; display:inline-block;"></span> Đang xử lý...';
    msg.style.color = "#0d6efd";
    msg.style.opacity = 1;

    //gửi dữ liệu php
    const formData = new FormData();
    formData.append('action', 'change_password');
    formData.append('old_pass', oldPass);
    formData.append('reg_key', regKey);
    formData.append('new_pass', newPass);

    fetch('../api/api_auth_action.php', {
        method: 'POST',
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        if (data.status === 'success') {
            msg.innerHTML = "✅ " + data.message;
            msg.style.color = "#28a745";
            
            setTimeout(() => {
                msg.innerHTML = "";
                closeChangePassModal();
            }, 1500);
        } else {
            msg.innerHTML = "❌ " + data.message;
            msg.style.color = "#dc3545";
        }
    })
    .catch(err => {
        console.error(err);
        msg.innerHTML = "❌ Lỗi kết nối Server!";
        msg.style.color = "#dc3545";
    });
}

window.openGenKeyModal = function(e) { 
    if(e) e.preventDefault(); 
    openModal('genKeyModal');
    document.getElementById('gk-step-auth').style.display = 'block';
    document.getElementById('gk-step-success').style.display = 'none';
    document.getElementById('gk_admin_pass').value = '';
}
window.closeGenKeyModal = function() { closeModal('genKeyModal'); }
window.submitGenKey = function() {
    document.getElementById('gk-step-auth').style.display = 'none';
    document.getElementById('gk-step-success').style.display = 'block';
    document.getElementById('gk_result_code').innerText = "NV-" + Math.floor(Math.random() * 900000 + 100000);
}
window.resetGenKeyModal = function() {
    document.getElementById('gk-step-success').style.display = 'none';
    document.getElementById('gk-step-auth').style.display = 'block';
    document.getElementById('gk_admin_pass').value = '';
}

window.openHistoryModal = function(e) {
    if(e) e.preventDefault();
    openModal('historyModal');

    if(document.getElementById('his_user')) document.getElementById('his_user').value = "";
    if(document.getElementById('his_action')) document.getElementById('his_action').value = "";
    if(document.getElementById('his_date_from')) document.getElementById('his_date_from').value = "";
    if(document.getElementById('his_date_to')) document.getElementById('his_date_to').value = "";
    
    loadHistoryData();
}
window.closeHistoryModal = function() { closeModal('historyModal'); }

window.loadHistoryData = function() {
    const content = document.getElementById('history-content');
    if(!content) return;

    content.innerHTML = `<div style="text-align:center; padding-top:50px;"><div class="loader"></div><p style="color:var(--text-secondary); margin-top:10px;">Đang tải dữ liệu...</p></div>`;

    const uid = document.getElementById('his_user') ? document.getElementById('his_user').value : '';
    const action = document.getElementById('his_action') ? document.getElementById('his_action').value : '';
    const dFrom = document.getElementById('his_date_from') ? document.getElementById('his_date_from').value : '';
    const dTo = document.getElementById('his_date_to') ? document.getElementById('his_date_to').value : '';

    const params = new URLSearchParams({ uid: uid, action: action, date_from: dFrom, date_to: dTo });

    fetch('../api/api_get_history.php?' + params.toString())
        .then(res => res.text())
        .then(html => { setTimeout(() => { content.innerHTML = html; }, 300); })
        .catch(err => {
            console.error(err);
            content.innerHTML = `<p style="color:red; text-align:center; margin-top:20px;">Lỗi kết nối Server!</p>`;
        });
}

//chat logic
const chatBox = document.getElementById('chatBox');
const chatBody = document.getElementById('chatBody');
const chatInput = document.getElementById('chatMsg');
const chatBadge = document.getElementById('chatBadge');

window.toggleChat = function() {
    isChatOpen = !isChatOpen;
    if (isChatOpen) {
        if(chatBox) chatBox.style.display = 'flex';
        if(chatBadge) chatBadge.style.display = 'none';
        loadMessages();
        chatInterval = setInterval(() => loadMessages(false), 2000);
        if(chatInput) setTimeout(() => chatInput.focus(), 300);
    } else {
        if(chatBox) chatBox.style.display = 'none';
        clearInterval(chatInterval);
    }
}

window.loadMessages = function(isBackgroundCheck = false) {
    fetch('../api/api_chat.php?action=load')
        .then(res => res.json())
        .then(data => {
            if (isBackgroundCheck) {
                if (data.length > lastMsgCount) {
                    const lastMsg = data[data.length - 1];
                    if (lastMsg && typeof myUserId !== 'undefined' && lastMsg.user_id != myUserId) {
                        if(chatBadge) {
                            chatBadge.style.display = 'flex';
                            chatBadge.innerText = "!"; 
                        }
                    }
                }
                lastMsgCount = data.length;
                return;
            }

            if(!chatBody) return;
            chatBody.innerHTML = '';
            
            if (data.length === 0) {
                chatBody.innerHTML = '<div style="text-align:center; color:var(--text-secondary); font-size:12px; margin-top:20px;">Chưa có tin nhắn nào.</div>';
            } else {
                data.forEach(msg => {
                    const isMe = (typeof myUserId !== 'undefined' && msg.user_id == myUserId);
                    const msgDiv = document.createElement('div');
                    msgDiv.className = `msg ${isMe ? 'me' : 'other'}`;

                    let senderName = isMe ? 'Tôi' : msg.full_name;
                    let timeText = msg.created_at ? new Date(msg.created_at).toLocaleTimeString('vi-VN', { hour: '2-digit', minute: '2-digit' }) : '';

                    msgDiv.innerHTML = `
                        <div class="msg-meta">${senderName}</div>
                        <div class="msg-text">${msg.message}</div>
                        <div class="msg-time">${timeText}</div>
                    `;
                    chatBody.appendChild(msgDiv);
                });

                if (data.length !== lastMsgCount) {
                    chatBody.scrollTop = chatBody.scrollHeight;
                }
                lastMsgCount = data.length;
            }
        })
        .catch(err => console.error("Chat Error:", err));
}

window.sendChat = function() {
    if(!chatInput) return;
    const text = chatInput.value.trim();
    if (!text) return;

    fetch('../api/api_chat.php?action=send', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ message: text })
    })
    .then(res => res.json())
    .then(data => {
        if (data.status === 'success') {
            chatInput.value = '';
            loadMessages();
        }
    });
}

if (chatInput) {
    chatInput.addEventListener('keypress', function (e) {
        if (e.key === 'Enter') sendChat();
    });
}

window.onclick = function (ev) {
    if (ev.target.classList.contains('modal')) {
        ev.target.classList.remove('show');
        setTimeout(() => ev.target.style.display = 'none', 300);
    }
}