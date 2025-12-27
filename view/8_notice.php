<?php include '../api/api_notice_action.php'?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8" /><meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ThôngBáo-EngBreak</title>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" rel="stylesheet" />
    <link rel="stylesheet" href="../style/1_dashboad.css">
    <link rel="stylesheet" href="../style/8_notice.css">
    <script src="../javascript/1_dashboad.js" defer></script>
    <script src="../javascript/8_notice.js" defer></script>
</head>
<body>
    <div class="app-container">
        <?php include 'sidebar.php'; ?>
        <main id="main-content">
            <div class="page-header">
                <div><h1>Quản Lý Thông Báo</h1><p class="subtitle">Gửi email thông báo đến học viên và giảng viên</p></div>
            </div>

            <?php if ($msg): ?>
                <div class="alert-box <?php echo $msgType == 'success' ? 'alert-success' : 'alert-error'; ?>">
                    <span class="material-symbols-outlined"><?php echo $msgType == 'success' ? 'check_circle' : 'error'; ?></span>
                    <?php echo $msg; ?>
                </div>
            <?php endif; ?>

            <div class="notice-container">
                <div class="notice-card">
                    <div class="card-title"><span class="material-symbols-outlined" style="color:var(--primary-color);">edit_note</span> Soạn Email Mới</div>
                    
                    <form method="POST" id="form-notice">
                        <div class="form-group">
                            <label>Gửi đến:</label>
                            <select name="target_type" id="targetType" class="form-control" required>
                                <option value="">-- Chọn nhóm nhận --</option>
                                <optgroup label="Học viên">
                                    <option value="student_one">Một học viên cụ thể</option>
                                    <option value="class_all">Toàn bộ lớp học</option>
                                    <option value="all_active">Tất cả học viên đang học</option>
                                </optgroup>
                                <optgroup label="Giảng viên">
                                    <option value="teacher_one">Một giảng viên cụ thể</option>
                                    <option value="all_teachers">Tất cả giảng viên</option>
                                </optgroup>
                            </select>
                        </div>

                        <div class="form-group" id="box-student" style="display:none;">
                            <label>Chọn Học viên:</label>
                            <select name="student_id" id="selStudent" class="form-control" disabled>
                                <?php foreach($students as $s): ?><option value="<?php echo $s['id']; ?>"><?php echo $s['full_name']; ?> (<?php echo $s['email']; ?>)</option><?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group" id="box-class" style="display:none;">
                            <label>Chọn Lớp học:</label>
                            <select name="class_id" id="selClass" class="form-control" disabled>
                                <?php foreach($classes as $c): ?><option value="<?php echo $c['id']; ?>"><?php echo $c['class_name']; ?></option><?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group" id="box-teacher" style="display:none;">
                            <label>Chọn Giảng viên:</label>
                            <select name="teacher_id" id="selTeacher" class="form-control" disabled>
                                <?php foreach($teachers as $t): ?><option value="<?php echo $t['id']; ?>"><?php echo $t['full_name']; ?> (<?php echo $t['email']; ?>)</option><?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group"><label>Tiêu đề:</label><input type="text" name="subject" id="inpSubject" class="form-control" required placeholder="Vd: Thông báo nghỉ lễ..."></div>

                        <div class="form-group"><label>Nội dung:</label><textarea name="content" class="form-control" required placeholder="..."></textarea></div>

                        <input type="hidden" name="send_email" value="1">

                        <button type="button" class="btn-send" onclick="openConfirmSendModal()">
                            <span class="material-symbols-outlined">send</span> Gửi Thông Báo
                        </button>
                    </form>
                </div>

                <div class="notice-card">
                    <div class="card-title"><span class="material-symbols-outlined" style="color:var(--text-secondary);">history</span> Lịch sử gửi gần đây</div>
                    <div class="history-list">
                        <?php if(empty($logs)): ?><p style="text-align:center; color:#999; padding:20px;">Chưa có lịch sử gửi mail.</p>
                        <?php else: foreach($logs as $l): ?>
                            <div class="log-item">
                                <div class="log-icon"><span class="material-symbols-outlined">mail</span></div>
                                <div class="log-content">
                                    <h4>Đến: <?php echo htmlspecialchars($l['recipient_name']); ?></h4>
                                    <p style="font-weight:600; color:var(--primary-color); margin-bottom:2px;"><?php echo htmlspecialchars($l['subject']); ?></p>
                                    <div class="log-meta"><span><?php echo htmlspecialchars($l['recipient_email']); ?></span><span>•</span><span><?php echo date('d/m/Y H:i', strtotime($l['sent_at'])); ?></span></div>
                                </div>
                            </div>
                        <?php endforeach; endif; ?>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <?php include 'modal.php'; ?>
</body>
</html>