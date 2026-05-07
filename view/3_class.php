<?php include '../api/api_class_action.php'; ?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LớpHọc-EngBreak</title>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" rel="stylesheet" />
    <link rel="stylesheet" href="../style/1_dashboad.css">
    <link rel="stylesheet" href="../style/3_class.css">
    <script src="../javascript/1_dashboad.js" defer></script>
    <script src="../javascript/3_class.js" defer></script>
</head>

<body>
    <div class="app-container">
        <?php include 'sidebar.php'; ?>
        <main id="main-content">
            <div class="page-header">
                <div>
                    <h1>Quản Lý Lớp Học</h1>
                    <p class="subtitle">Danh sách các lớp học trong trung tâm</p>
                </div>

                <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                    <div class="filter-group">
                        <select id="filter_shift" class="filter-select">
                            <option value="">-- Tất cả Ca học --</option>
                            <?php foreach ($shifts as $s): ?>
                                <option value="<?php echo $s['id']; ?>">
                                    <?php echo $s['shift_name']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                        <select id="filter_teacher" class="filter-select">
                            <option value="">-- Tất cả Giảng viên --</option>
                            <?php foreach ($teachers as $t): ?>
                                <option value="<?php echo $t['id']; ?>">
                                    <?php echo $t['full_name']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <form class="search-box"><span class="material-symbols-outlined" style="color:var(--text-secondary);">search</span><input type="text" name="search" placeholder="Tìm tên lớp..."></form>

                    <button class="btn-header btn-room" onclick="openRoomModal()">
                        <span class="material-symbols-outlined">meeting_room</span> Xem phòng học
                    </button>


                    <button class="btn-header btn-print" onclick="openExportModal()"><span class="material-symbols-outlined">file_download</span> Xuất DS</button>
                    <button class="btn-header btn-add-class" onclick="openModal('addModalLop')"><span class="material-symbols-outlined">add</span> Tạo lớp mới</button>
                </div>
            </div>

            <?php if ($msg): ?>
                <div class="alert-box <?php echo $msgType == 'success' ? 'alert-success' : 'alert-error'; ?>">
                    <span class="material-symbols-outlined" style="font-size: 24px;">
                        <?php echo $msgType == 'success' ? 'check_circle' : 'error'; ?>
                    </span>
                    <span><?php echo $msg; ?></span>
                </div>
            <?php endif; ?>

            <div class="class-grid">
                <?php foreach ($classes as $c): ?>
                    <?php
                    $statusClass = 'st-dang_hoc';
                    $statusText = 'Đang học';
                    $borderClass = 'bd-dang_hoc';
                    $startDate = !empty($c['start_date']) ? strtotime($c['start_date']) : 0;
                    if ($c['status'] == 0) {
                        $statusClass = 'st-ket_thuc';
                        $statusText = 'Đã kết thúc';
                        $borderClass = 'bd-ket_thuc';
                    } elseif ($startDate > time()) {
                        $statusClass = 'st-sap_mo';
                        $statusText = 'Sắp mở';
                        $borderClass = 'bd-sap_mo';
                    }
                    $timeString = (!empty($c['start_time']) && !empty($c['end_time'])) ? date('H:i', strtotime($c['start_time'])) . ' - ' . date('H:i', strtotime($c['end_time'])) : "Chưa xếp lịch";
                    ?>
                    <div class="class-card" data-shift="<?php echo $c['shift_id']; ?>"

                        data-teacher="<?php echo $c['teacher_id']; ?>">

                        <div class="card-border-left <?php echo $borderClass; ?>"></div>
                        <div class="c-header">
                            <div class="c-title">
                                <h3><?php echo htmlspecialchars($c['class_name'] ?? ''); ?></h3><span><?php echo htmlspecialchars($c['level_name'] ?? ''); ?></span>
                            </div>
                            <div class="c-count"><span class="material-symbols-outlined" style="font-size:16px;">groups</span><?php echo htmlspecialchars($c['student_count'] ?? 0); ?></div>
                        </div>
                        <div class="c-body">
                            <div class="c-info-row"><span class="material-symbols-outlined">person</span><span>GV: <strong><?php echo htmlspecialchars($c['teacher_name'] ?? ''); ?></strong></span></div>
                            <div class="c-info-row"><span class="material-symbols-outlined">meeting_room</span><span>Phòng: <strong><?php echo htmlspecialchars($c['room_name'] ?? ''); ?></strong></span></div>
                            <div class="c-info-row"><span class="material-symbols-outlined">schedule</span><span><?php echo htmlspecialchars($c['shift_name'] ?? ''); ?> (<?php echo $timeString; ?>)</span></div>
                            <div class="c-info-row"><span class="material-symbols-outlined">event_upcoming</span><span>Khai giảng: <?php echo !empty($c['start_date']) ? date('d/m/Y', strtotime($c['start_date'])) : '...'; ?></span></div>
                        </div>
                        <div class="c-footer">
                            <span class="c-status <?php echo $statusClass; ?>"><?php echo $statusText; ?></span>
                            <div class="c-actions-group">
                                <button class="btn-icon btn-add-std" title="Thêm học viên vào lớp này"
                                    onclick="openAddStudentToClassModal(<?php echo $c['id']; ?>)">
                                    <span class="material-symbols-outlined" style="font-size: 18px;">person_add</span>
                                </button>
                                <button class="btn-icon btn-view" title="Xem danh sách"
                                    onclick="openClassStudentsModal(<?php echo $c['id']; ?>, '<?php echo htmlspecialchars($c['class_name'] ?? '', ENT_QUOTES); ?>')">
                                    <span class="material-symbols-outlined" style="font-size: 18px;">list_alt</span>
                                </button>
                                <button class="btn-icon btn-edit" title="Chỉnh sửa" onclick='openEditClassModal(<?php echo json_encode($c, JSON_HEX_APOS | JSON_HEX_QUOT); ?>)'><span class="material-symbols-outlined" style="font-size: 18px;">edit</span></button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </main>
    </div>
    <?php include 'modal.php'; ?>
</body>

</html>