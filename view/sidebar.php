<?php
$curPage = basename($_SERVER['PHP_SELF']);
?>
<aside class="sidebar">
    <div class="brand">
        <span class="material-symbols-outlined brand-icon">school</span>
        <h1 class="brand-text">EngBreak</h1>
    </div>

    <div class="user-info-box">
        <div class="user-avatar-circle"><?php echo strtoupper(mb_substr($_SESSION['full_name'] ?? 'U', 0, 1, "UTF-8")); ?></div>
        <div class="user-details">
            <div class="user-name" title="<?php echo htmlspecialchars($_SESSION['full_name'] ?? 'User'); ?>">
                <?php echo htmlspecialchars($_SESSION['full_name'] ?? 'User'); ?>
            </div>
            <div class="user-role">
                <?php echo ($_SESSION['user_role'] ?? 'staff') === 'admin' ? 'Quản trị viên' : 'Nhân viên'; ?>
            </div>
        </div>
    </div>

    <nav class="nav-menu">
        <div class="nav-marker"></div>

        <a class="nav-item <?php echo ($curPage == '1_dashboad.php' || $curPage == 'index.php') ? 'active' : ''; ?>" href="1_dashboad.php">
            <span class="material-symbols-outlined">dashboard</span>
            <p>Trang Chủ</p>
        </a>
        
        <a class="nav-item <?php echo ($curPage == '2_student.php') ? 'active' : ''; ?>" href="2_student.php">
            <span class="material-symbols-outlined">group</span>
            <p>Quản lý Học viên</p>
        </a>

        <a class="nav-item <?php echo ($curPage == '3_class.php') ? 'active' : ''; ?>" href="3_class.php">
            <span class="material-symbols-outlined">desk</span>
            <p>Quản lý Lớp học</p>
        </a>

        <a class="nav-item <?php echo ($curPage == '4_course.php') ? 'active' : ''; ?>" href="4_course.php">
            <span class="material-symbols-outlined">import_contacts</span>
            <p>Quản lý Khóa học</p>
        </a>

        <a class="nav-item <?php echo ($curPage == '5_payment.php') ? 'active' : ''; ?>" href="5_payment.php">
            <span class="material-symbols-outlined">payment</span>
            <p>Quản lý Thanh toán</p>
        </a>

        <a class="nav-item <?php echo ($curPage == '6_teacher.php') ? 'active' : ''; ?>" href="6_teacher.php">
            <span class="material-symbols-outlined">school</span>
            <p>Quản lý Giảng viên</p>
        </a>

        <a class="nav-item <?php echo ($curPage == '7_schedule.php') ? 'active' : ''; ?>" href="7_schedule.php">
            <span class="material-symbols-outlined">calendar_month</span>
            <p>Quản lý Lịch học</p>
        </a>

        <a class="nav-item <?php echo ($curPage == '8_notice.php') ? 'active' : ''; ?>" href="8_notice.php">
            <span class="material-symbols-outlined">attach_email</span>
            <p>Thông báo</p>
        </a>
    </nav>

    <div class="nav-group">
        <div class="nav-item" id="btn-settings" style="background: transparent;">
            <span class="material-symbols-outlined">settings</span>
            <p>Cài đặt chung</p>
            <span class="material-symbols-outlined arrow-icon">expand_more</span>
        </div>
        <div class="submenu" id="submenu-settings">
            <a href="#" class="sub-item" id="btn-toggle-theme">
                <span class="material-symbols-outlined" id="theme-icon">dark_mode</span>
                <span class="truncate" id="theme-text">Giao diện Tối</span>
            </a>
            <?php if (($_SESSION['user_role'] ?? '') === 'admin'): ?>
                <a href="#" class="sub-item" onclick="openBackupPopup(event)">
                    <span class="material-symbols-outlined" style="font-size: 20px;">cloud_download</span>
                    <span class="truncate">Backup dữ liệu</span>
                </a>
                <a href="#" class="sub-item" onclick="openGenKeyModal(event)">
                    <span class="material-symbols-outlined" style="font-size: 20px;">vpn_key</span>
                    <span class="truncate">Tạo Key NV</span>
                </a>
            <?php endif; ?>
            <a href="#" class="sub-item" onclick="openHistoryModal(event)">
                <span class="material-symbols-outlined" style="font-size: 20px;">history</span>
                <span class="truncate">Lịch sử hoạt động</span>
            </a>
            <a href="#" class="sub-item" onclick="openChangePassModal(event)">
                <span class="material-symbols-outlined" style="font-size: 20px;">lock_reset</span>
                <span class="truncate">Đổi mật khẩu</span>
            </a>
            <a class="sub-item" href="0_logout.php">
                <span class="material-symbols-outlined">logout</span>
                <span class="truncate">Đăng xuất</span>
            </a>
        </div>
    </div>
</aside>