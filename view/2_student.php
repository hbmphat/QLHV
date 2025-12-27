<?php include '../api/api_student_action.php'; ?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HọcViên-EngBreak</title>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" rel="stylesheet" />
    <link rel="stylesheet" href="../style/1_dashboad.css">
    <link rel="stylesheet" href="../style/2_student.css">
    <script src="../javascript/1_dashboad.js" defer></script>
    <script src="../javascript/2_student.js" defer></script>
</head>

<body>
    <div class="app-container">
        <?php include 'sidebar.php'; ?>
        <main id="main-content">
            <div class="page-header">
                <div>
                    <h1>Quản Lý Học Viên</h1>
                    <p class="subtitle">Hồ sơ thông tin và trạng thái học tập</p>
                </div>
                <div style="display: flex; gap: 10px;">
                    <div class="filter-group">
                        <select id="filter_class" class="filter-select">
                            <option value="">-- Tất cả Lớp --</option><?php foreach ($classList as $c) echo "<option value='$c'>$c</option>"; ?>
                        </select>
                        <select id="filter_level" class="filter-select">
                            <option value="">-- Tất cả Cấp độ --</option><?php foreach ($levelList as $l) echo "<option value='$l'>$l</option>"; ?>
                        </select>
                        <select id="filter_status" class="filter-select">
                            <option value="">-- Trạng thái --</option>
                            <option value="dang_hoc">Đang học</option>
                            <option value="bao_luu">Bảo lưu</option>
                            <option value="da_nghi">Đã nghỉ</option>
                        </select>
                    </div>
                    <div class="search-box"><span class="material-symbols-outlined" style="color:#999;">search</span><input type="text" name="search" placeholder="Tìm tên, SĐT..."></div>
                    <button class="btn-header btn-print" onclick="exportStudentList()"><span class="material-symbols-outlined">file_download</span> Xuất DS</button>
                    <button class="btn-header btn-add" onclick="openModal('addModalHV')"><span class="material-symbols-outlined">add</span> Thêm mới</button>
                </div>
            </div>

            <?php if ($msg): ?><div class="alert-box <?php echo $msgType == 'success' ? 'alert-success' : 'alert-error'; ?>"><span class="material-symbols-outlined"><?php echo $msgType == 'success' ? 'check_circle' : 'error'; ?></span><?php echo $msg; ?></div><?php endif; ?>

            <div class="student-grid">
                <?php foreach ($students as $s): ?>
                    <?php
                    $avatarPath = "uploads/" . $s['avatar'];
                    $fallbackUrl = "https://ui-avatars.com/api/?name=" . urlencode($s['full_name']) . "&background=random&color=fff&size=128";
                    $finalAvatar = (!empty($s['avatar']) && file_exists($avatarPath)) ? $avatarPath : $fallbackUrl;

                    $statusText = ($s['learning_status'] == 'dang_hoc') ? 'Đang học' : (($s['learning_status'] == 'bao_luu') ? 'Bảo lưu' : 'Đã nghỉ');
                    $endDate = !empty($s['end_study_date']) ? date('d/m/Y', strtotime($s['end_study_date'])) : 'Chưa có';
                    $isExpired = !empty($s['end_study_date']) && strtotime($s['end_study_date']) < time();

                    //hiển thị Khuyến mãi
                    $promoText = 'Không có';
                    $promoColor = '#94a3b8';
                    if (!empty($s['assigned_promo'])) {
                        $promoText = $s['assigned_promo'] . " (-{$s['discount_percent']}%)";
                        $promoColor = '#eab308';
                    }
                    ?>
                    <div class="student-card"
                        data-class="<?php echo htmlspecialchars($s['class_name'] ?? ''); ?>"
                        data-level="<?php echo htmlspecialchars($s['level_name'] ?? ''); ?>"
                        data-status="<?php echo $s['learning_status']; ?>">

                        <span class="s-status st-<?php echo $s['learning_status']; ?>"><?php echo $statusText; ?></span>

                        <div class="s-header">
                            <img src="<?php echo $finalAvatar; ?>" class="s-avatar" onerror="this.onerror=null; this.src='<?php echo $fallbackUrl; ?>';">
                            <div class="s-info">
                                <h3><?php echo htmlspecialchars($s['full_name']); ?></h3>
                                <span class="s-code"><?php echo !empty($s['dob']) ? date('Y', strtotime($s['dob'])) : ''; ?> - <?php echo $s['gender']; ?></span>
                            </div>
                        </div>

                        <div class="s-body">
                            <div class="class-info">
                                <div class="s-row" style="border:none; padding:0; margin:0;">
                                    <span class="s-label"><span class="material-symbols-outlined" style="font-size:16px;">school</span> Lớp:</span>
                                    <span class="s-val class-name"><?php echo htmlspecialchars($s['class_name'] ?? 'Chưa xếp lớp'); ?></span>
                                </div>
                            </div>
                            <div class="s-row"><span class="s-label">GVCN:</span> <span class="s-val"><?php echo htmlspecialchars($s['teacher_name'] ?? '---'); ?></span></div>
                            <div class="s-row"><span class="s-label">SĐT Phụ huynh:</span> <span class="s-val"><?php echo htmlspecialchars($s['parent_phone']); ?></span></div>

                            <div class="s-row">
                                <span class="s-label"><span class="material-symbols-outlined" style="font-size:16px; color:#eab308;">verified</span> Ưu đãi:</span>
                                <span class="s-val" style="color:<?php echo $promoColor; ?>; font-weight:700;">
                                    <?php echo htmlspecialchars($promoText); ?>
                                </span>
                            </div>
                        </div>

                        <div class="s-footer">
                            <div class="tuition-date <?php echo $isExpired ? 'td-exp' : 'td-ok'; ?>">
                                <span class="material-symbols-outlined" style="font-size:14px; vertical-align: middle;">event_busy</span>
                                Hết hạn: <?php echo $endDate; ?>
                            </div>
                            <button class="btn-icon btn-edit" onclick='openEditStudentModal(<?php echo json_encode($s, JSON_HEX_APOS | JSON_HEX_QUOT); ?>)'>
                                <span class="material-symbols-outlined" style="font-size:18px;">edit</span>
                            </button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </main>
    </div>
    <?php include 'modal.php'; ?>

</body>

</html>