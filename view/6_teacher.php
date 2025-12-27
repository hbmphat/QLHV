<?php include '../api/api_teacher_action.php'; ?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GiảngViên-EngBreak</title>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" rel="stylesheet" />
    <link rel="stylesheet" href="../style/1_dashboad.css">
    <link rel="stylesheet" href="../style/6_teacher.css">
    <script src="../javascript/1_dashboad.js" defer></script>
    <script src="../javascript/6_teacher.js" defer></script>
</head>

<body>
    <div class="app-container">
        <?php include 'sidebar.php'; ?>

        <main id="main-content">
            <div class="page-header">
                <div>
                    <h1>Quản Lý Giảng Viên</h1>
                    <p class="subtitle">Danh sách đội ngũ giáo viên của trung tâm</p>
                </div>
                <div style="display: flex; gap: 15px;">
                    <div class="filter-group">
                        <select id="filter_status" class="filter-select">
                            <option value="">-- Trạng thái --</option>
                            <option value="dang_day">Đang dạy</option>
                            <option value="thu_viec">Thử việc</option>
                            <option value="nghi_phep">Nghỉ phép</option>
                            <option value="tam_nghi">Tạm nghỉ</option>
                            <option value="nghi_viec">Đã nghỉ</option>
                        </select>
                        <select id="filter_assign" class="filter-select">
                            <option value="">-- Tình trạng lớp --</option>
                            <option value="has_class">Đã nhận lớp</option>
                            <option value="no_class">Chưa có lớp</option>
                        </select>
                    </div>
                    <form method="GET" class="search-box">
                        <span class="material-symbols-outlined" style="color:var(--text-secondary);">search</span>
                        <input type="text" name="search" placeholder="Tìm tên, mã GV..." value="<?php echo htmlspecialchars($search); ?>">
                    </form>
                    <button class="btn-header btn-print" onclick="exportTeacherList()">
                        <span class="material-symbols-outlined" style="font-size: 20px;">file_download</span> Xuất DS Giảng viên
                    </button>
                    <button class="btn btn-primary" onclick="openModal('addModalGV')">
                        <span class="material-symbols-outlined" style="font-size: 20px;">add</span> Thêm mới
                    </button>
                </div>
            </div>

            <?php if ($msg): ?>
                <div class="alert-box <?php echo $msgType == 'success' ? 'alert-success' : 'alert-error'; ?>">
                    <span class="material-symbols-outlined"><?php echo $msgType == 'success' ? 'check_circle' : 'error'; ?></span>
                    <?php echo $msg; ?>
                </div>
            <?php endif; ?>

            <div class="teacher-grid">
                <?php foreach ($teachers as $t): ?>
                    <div class="teacher-card">
                        <span class="t-status st-<?php echo $t['status']; ?>">
                            <?php
                            $stMap = [
                                'dang_day' => 'Đang dạy',
                                'thu_viec' => 'Thử việc',
                                'nghi_phep' => 'Nghỉ phép',
                                'tam_nghi' => 'Tạm nghỉ',
                                'nghi_viec' => 'Đã nghỉ'
                            ];
                            echo $stMap[$t['status']] ?? $t['status'];
                            ?>
                        </span>

                        <div class="t-header">
                            <?php
                            $nameEncoded = urlencode($t['full_name']);
                            $fallbackUrl = "https://ui-avatars.com/api/?name={$nameEncoded}&background=random&size=128&color=fff";

                            $avatarPath = "uploads/" . $t['avatar'];

                            //logc ktra file
                            if (!empty($t['avatar']) && file_exists($avatarPath)) {
                                $finalSrc = $avatarPath;
                            } else {
                                $finalSrc = $fallbackUrl;
                            }
                            ?>

                            <img
                                src="<?php echo $finalSrc; ?>"
                                class="t-avatar"
                                alt="Avatar"
                                onerror="this.onerror=null; this.src='<?php echo $fallbackUrl; ?>';">

                            <div class="t-info">
                                <h3><?php echo htmlspecialchars($t['full_name']); ?></h3>
                                <span class="t-code"><?php echo htmlspecialchars($t['code_name']); ?></span>
                            </div>
                        </div>

                        <div class="t-details">
                            <div><span class="material-symbols-outlined">school</span> <strong><?php echo htmlspecialchars($t['specialty']); ?></strong></div>
                            <div><span class="material-symbols-outlined">call</span> <?php echo htmlspecialchars($t['phone']); ?></div>
                            <div title="<?php echo htmlspecialchars($t['email']); ?>" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                <span class="material-symbols-outlined">mail</span> <?php echo htmlspecialchars($t['email']); ?>
                            </div>
                            <div style="margin-top: 5px; color: var(--text-primary); font-size: 12px;">
                                <span class="material-symbols-outlined">history_edu</span> <?php echo htmlspecialchars($t['experience']); ?> kinh nghiệm
                            </div>
                        </div>

                        <div class="t-actions">
                            <button class="btn-icon btn-edit" title="Chỉnh sửa" onclick='openEditModal(<?php echo json_encode($t); ?>)'>
                                <span class="material-symbols-outlined" style="font-size: 18px;">edit</span>
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