<?php include '../api/api_cource_action.php'; ?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>KhóaHọc-EngBreak</title>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" rel="stylesheet" />
    <link rel="stylesheet" href="../style/1_dashboad.css">
    <link rel="stylesheet" href="../style/4_course.css">
    <script src="../javascript/1_dashboad.js" defer></script>
    <script src="../javascript/4_course.js" defer></script>
</head>

<body>
    <div class="app-container">
        <?php include 'sidebar.php'; ?>
        <main id="main-content">
            <div class="page-header">
                <div>
                    <h1>Quản Lý Khóa Học</h1>
                    <p class="subtitle">Thiết lập cấp độ và các gói học phí</p>
                </div>
                <div style="display: flex; gap: 15px;">
                    <select id="filter_level" class="filter-select">
                        <option value="">-- Tất cả Khóa Học --</option>
                        <?php foreach ($levels as $l): ?>
                            <option value="<?php echo $l['id']; ?>"><?php echo $l['level_name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <form class="search-box"><span class="material-symbols-outlined" style="color:var(--text-secondary);">search</span><input type="text" name="search" placeholder="Tìm tên khóa học..."></form>
                    <button class="btn-add-level" onclick="openLevelModal(false)"><span class="material-symbols-outlined">add</span> Thêm Cấp Độ</button>
                </div>
            </div>

            <?php if ($msg): ?><div class="alert-box <?php echo $msgType == 'success' ? 'alert-success' : 'alert-error'; ?>"><span class="material-symbols-outlined"><?php echo $msgType == 'success' ? 'check_circle' : 'error'; ?></span><?php echo $msg; ?></div><?php endif; ?>

            <div class="course-grid">
    <?php foreach ($data as $item): ?>
        <div class="course-card" data-id="<?php echo $item['id']; ?>">
            <div class="co-header">
                <div class="co-title">
                    <h3><?php echo htmlspecialchars($item['level_name']); ?></h3>

                    <div style="display:flex; align-items:center; gap:5px; color:var(--text-secondary); font-size:13px; margin-bottom:5px;">
                        <span class="material-symbols-outlined" style="font-size:16px;">schedule</span>
                        <span>Thời lượng: <strong><?php echo htmlspecialchars($item['course_duration'] ?? '5-6 tháng'); ?></strong></span>
                    </div>

                    <span class="co-desc"><?php echo htmlspecialchars($item['description'] ?? 'Chưa có mô tả'); ?></span>
                </div>
                
                <button class="btn-edit-level" title="Sửa cấp độ" 
                    onclick='openLevelModal(true, <?php echo htmlspecialchars(json_encode($item), ENT_QUOTES, 'UTF-8'); ?>)'>
                    <span class="material-symbols-outlined" style="font-size:18px;">edit</span>
                </button>
            </div>

            <div class="co-body">
                <?php if (empty($item['packages'])): ?>
                    <div style="padding:20px; text-align:center; color:#999; font-size:13px;">Chưa có gói học phí nào</div>
                <?php else: ?>
                    <ul class="package-list">
                        <?php foreach ($item['packages'] as $p): ?>
                            <li class="package-item">
                                <div class="pk-info">
                                    <span class="pk-weeks">Khóa <?php echo $p['week_duration']; ?> tuần</span>
                                    <span class="pk-sessions"><?php echo $p['sessions_per_week']; ?> buổi / tuần</span>
                                </div>
                                <div style="display:flex; align-items:center;">
                                    <div class="pk-price-box">
                                        <span class="pk-price"><?php echo number_format($p['tuition_fee'], 0, ',', '.'); ?> đ</span>
                                        <span class="pk-unit">(~ <?php echo number_format($p['price_per_session'], 0, ',', '.'); ?> đ/buổi)</span>
                                    </div>
                                    
                                    <span class="material-symbols-outlined btn-edit-pkg"
                                        title="Sửa giá"
                                        onclick="openPackageModal(<?php echo $item['id']; ?>, '<?php echo htmlspecialchars($item['level_name'], ENT_QUOTES); ?>', true, <?php echo htmlspecialchars(json_encode($p), ENT_QUOTES, 'UTF-8'); ?>)">
                                        edit
                                    </span>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>

            <div class="co-footer">
                <button class="btn-add-pkg"
                    onclick="openPackageModal(<?php echo $item['id']; ?>, '<?php echo htmlspecialchars($item['level_name'], ENT_QUOTES); ?>', false)">
                    <span class="material-symbols-outlined" style="font-size:18px;">add_circle</span> Thêm gói học phí
                </button>
            </div>
        </div>
    <?php endforeach; ?>
</div>
        </main>
    </div>
    <?php include 'modal.php' ?>

</body>

</html>