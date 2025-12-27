<?php include '../api/api_schedule_action.php'; ?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LịchHọc-EngBreak</title>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" rel="stylesheet" />
    <link rel="stylesheet" href="../style/1_dashboad.css">
    <link rel="stylesheet" href="../style/7_schedule.css">
    <script src="../javascript/1_dashboad.js" defer></script>
    <script src="../javascript/7_schedule.js" defer></script>
</head>

<body>
    <div class="app-container">
        <?php include 'sidebar.php'; ?>
        <main id="main-content">

            <div class="page-header">
                <div>
                    <h1>Thời Khóa Biểu</h1>
                    <p class="subtitle">Lịch học tổng quát toàn trung tâm</p>
                </div>
                <div class="filter-group">
                    <select id="filter_room" class="filter-select">
                        <option value="">-- Tất cả Phòng --</option>
                        <?php foreach ($rooms as $r) echo "<option value='{$r['id']}'>{$r['room_name']}</option>"; ?>
                    </select>
                    <select id="filter_teacher" class="filter-select">
                        <option value="">-- Tất cả Giảng viên --</option>
                        <?php foreach ($teachers as $t) echo "<option value='{$t['id']}'>{$t['full_name']}</option>"; ?>
                    </select>
                    <button class="btn-print" onclick="exportSchedulePDF()">
                        <span class="material-symbols-outlined">file_download</span> Xuất PDF Lịch
                    </button>
                </div>
            </div>

            <div class="schedule-container">
                <table class="schedule-table">
                    <thead>
                        <tr>
                            <th class="col-shift">Ca Học</th>
                            <th>Thứ 2</th>
                            <th>Thứ 3</th>
                            <th>Thứ 4</th>
                            <th>Thứ 5</th>
                            <th>Thứ 6</th>
                            <th>Thứ 7</th>
                            <th>Chủ Nhật</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($shifts as $s): ?>
                            <tr>
                                <td class="col-shift">
                                    <span class="shift-name"><?php echo $s['shift_name']; ?></span>
                                    <span class="shift-time">
                                        <?php echo date('H:i', strtotime($s['start_time'])) . ' - ' . date('H:i', strtotime($s['end_time'])); ?>
                                    </span>
                                </td>

                                <?php for ($day = 2; $day <= 8; $day++): ?>
                                    <td>
                                        <?php
                                        if (isset($scheduleData[$s['id']][$day])) {
                                            foreach ($scheduleData[$s['id']][$day] as $classItem) {
                                        ?>
                                                <div class="class-item"
                                                    data-room="<?php echo $classItem['room_id']; ?>"
                                                    data-teacher="<?php echo $classItem['teacher_id']; ?>"
                                                    title="<?php echo $classItem['class_name']; ?>">

                                                    <span class="ci-count"><?php echo $classItem['student_count']; ?> HV</span>
                                                    <span class="ci-room"><?php echo $classItem['room_name']; ?></span>
                                                    <span class="ci-name"><?php echo $classItem['class_name']; ?></span>

                                                    <div class="ci-teacher">
                                                        <span class="material-symbols-outlined" style="font-size:12px;">person</span>
                                                        <?php echo $classItem['code_name'] ?? 'GV'; ?>
                                                    </div>
                                                </div>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </td>
                                <?php endfor; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
    <?php include 'modal.php'; ?>
</body>

</html>