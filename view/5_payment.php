<?php include '../api/api_payment_action.php'; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8" /><meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ThanhToán-EngBreak</title>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" rel="stylesheet" />
    <link rel="stylesheet" href="../style/1_dashboad.css">
    <link rel="stylesheet" href="../style/5_payment.css">
    <script src="../javascript/1_dashboad.js" defer></script>
    <script src="../javascript/5_payment.js" defer></script>
    <script>
        const BANK_CONFIG = { id: "<?php echo $BANK_ID; ?>", acc: "<?php echo $BANK_ACC; ?>", name: "<?php echo $BANK_NAME; ?>" };
    </script>
</head>
<body>
    <div class="app-container">
        <?php include 'sidebar.php'; ?>
        <main id="main-content">
            <div class="page-header">
                <div><h1>Quản Lý Học Phí</h1><p class="subtitle">Theo dõi và thu học phí định kỳ</p></div>
                <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                    <select id="filter_class" class="filter-select"><option value="">-- Tất cả Lớp --</option><?php foreach($classList as $c) echo "<option value='".strtolower($c['class_name'])."'>{$c['class_name']}</option>"; ?></select>
                    <select id="filter_status" class="filter-select"><option value="">-- Trạng thái phí --</option><option value="expired">Quá hạn (Đỏ)</option><option value="today">Hết hôm nay (Vàng)</option><option value="active">Đang học (Xanh)</option></select>
                    <div class="search-box"><span class="material-symbols-outlined" style="color:#999;">search</span><input type="text" name="search" placeholder="Tìm tên học viên..."></div>
                </div>
            </div>

            <?php if ($msg): ?><div class="alert-box <?php echo $msgType=='success'?'alert-success':'alert-error'; ?>"><span class="material-symbols-outlined"><?php echo $msgType=='success'?'check_circle':'error'; ?></span><?php echo $msg; ?></div><?php endif; ?>

            <div class="payment-grid">
                <?php foreach ($students as $s): ?>
                    <?php
                        $today = date('Y-m-d'); $endDate = $s['end_study_date'];
                        if (empty($endDate) || $endDate < $today) { $status='expired'; $borderClass='pb-expired'; $textClass='st-text-expired'; $statusLabel='Quá hạn'; $daysLeft="Đã hết hạn"; } 
                        elseif ($endDate == $today) { $status='today'; $borderClass='pb-today'; $textClass='st-text-today'; $statusLabel='Hết hôm nay'; $daysLeft="Đóng ngay"; } 
                        else { $status='active'; $borderClass='pb-active'; $textClass='st-text-active'; $statusLabel='Đang học'; $diff=strtotime($endDate)-time(); $days=round($diff/(60*60*24)); $daysLeft="Còn $days ngày"; }
                        
                        $avatarPath = "uploads/" . $s['avatar'];
                        $fallbackUrl = "https://ui-avatars.com/api/?name=" . urlencode($s['full_name']) . "&background=random&size=128&color=fff";
                        $finalAvatar = (!empty($s['avatar']) && file_exists($avatarPath)) ? $avatarPath : $fallbackUrl;
                    ?>
                    <div class="pay-card" data-class="<?php echo strtolower($s['class_name']); ?>" data-status="<?php echo $status; ?>">
                        <div class="pay-border <?php echo $borderClass; ?>"></div>
                        <div class="pay-header">
                            <img src="<?php echo $finalAvatar; ?>" class="pay-avatar" onerror="this.onerror=null; this.src='<?php echo $fallbackUrl; ?>';">
                            <div class="pay-info"><h3><?php echo htmlspecialchars($s['full_name']); ?></h3><span class="pay-class"><?php echo htmlspecialchars($s['class_name']); ?></span></div>
                        </div>
                        <div class="pay-body">
                            <div class="pay-row highlight"><span>Trạng thái:</span><span class="<?php echo $textClass; ?>"><?php echo $statusLabel; ?></span></div>
                            <div class="pay-row"><span>Hạn đóng:</span><strong><?php echo empty($endDate)?'Chưa đóng':date('d/m/Y', strtotime($endDate)); ?></strong></div>
                            <div class="pay-row"><span>Thời gian:</span><span><?php echo $daysLeft; ?></span></div>
                        </div>
                        <div class="pay-footer">
                            <button class="btn-history" onclick="openHistoryPayModal(<?php echo $s['id']; ?>, '<?php echo htmlspecialchars($s['full_name']); ?>')"><span class="material-symbols-outlined" style="font-size:18px;">history</span></button>
                            <!-- <button class="btn-qr" title="Thanh toán VietQR" onclick="openPayModal(<?php echo $s['id']; ?>, <?php echo $s['class_id']; ?>, '<?php echo htmlspecialchars($s['full_name']); ?>', '', true)"><span class="material-symbols-outlined" style="font-size:18px;">qr_code_scanner</span></button> -->
                            <button class="btn-pay" onclick="openPayModal(<?php echo $s['id']; ?>, <?php echo $s['class_id']; ?>, '<?php echo htmlspecialchars($s['full_name']); ?>', '', false)"><span class="material-symbols-outlined" style="font-size:18px;">attach_money</span> Tính học phí</button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </main>
    </div>
    <?php include 'modal.php'; ?>
</body>
</html>