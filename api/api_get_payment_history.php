<?php
session_start();
require_once '../connect/db_connect.php';

$studentId = $_GET['student_id'] ?? 0;

if (!$studentId) {
    echo '<p style="text-align:center; color:red; padding:20px;">Lỗi: Không tìm thấy ID học viên.</p>';
    exit;
}

try {
    $sql = "
        SELECT p.*, pr.name as promo_name 
        FROM payments p 
        LEFT JOIN promotions pr ON p.promotion_id = pr.id
        WHERE p.student_id = ? 
        ORDER BY p.payment_date DESC
    ";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute([$studentId]);
    $history = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($history) > 0) {
        echo '<table class="history-table" style="width:100%; font-size:13px;">
                <thead>
                    <tr style="background:#f8f9fa; color:#64748b;">
                        <th style="padding:10px;">Ngày thu</th>
                        <th style="padding:10px; text-align:center;">Số tuần</th>
                        <th style="padding:10px;">Thời gian áp dụng</th>
                        <th style="padding:10px; text-align:right;">Thực thu</th>
                        <th style="padding:10px;">Khuyến mãi</th>
                        <th style="padding:10px;">Hình thức</th>
                    </tr>
                </thead>
                <tbody>';
        
        foreach ($history as $h) {
            $payDate = date('d/m/Y H:i', strtotime($h['payment_date']));
            
            $weeks = $h['weeks'] > 0 ? $h['weeks'] . " tuần" : "-";
            
            $timeRange = "-";
            if (!empty($h['start_date']) && !empty($h['end_date'])) {
                $timeRange = date('d/m/y', strtotime($h['start_date'])) . ' <i class="material-symbols-outlined" style="font-size:10px; vertical-align:middle">arrow_right_alt</i> ' . date('d/m/y', strtotime($h['end_date']));
            }

            $amount = number_format($h['final_amount'], 0, ',', '.') . ' đ';
            
            //xử lý khuyến mãi
            $promo = '<span style="color:#ccc;">-</span>';
            if ($h['discount_amount'] > 0) {
                $pName = $h['promo_name'] ?? 'Ưu đãi';
                $pVal = number_format($h['discount_amount'], 0, ',', '.');
                $promo = "<div style='font-size:11px; color:#eab308; font-weight:600;'>$pName</div>
                          <div style='font-size:11px;'>-$pVal đ</div>";
            }

            $methodMap = [
                'tien_mat' => '<span style="color:#059669; background:#ecfdf5; padding:2px 6px; border-radius:4px; font-size:11px; font-weight:600;">Tiền mặt</span>',
                'chuyen_khoan' => '<span style="color:#0284c7; background:#e0f2fe; padding:2px 6px; border-radius:4px; font-size:11px; font-weight:600;">CK</span>',
                'vietqr' => '<span style="color:#7c3aed; background:#f5f3ff; padding:2px 6px; border-radius:4px; font-size:11px; font-weight:600;">VietQR</span>'
            ];
            $method = $methodMap[$h['payment_method']] ?? $h['payment_method'];

            echo "<tr style='border-bottom:1px solid #eee;'>
                    <td style='padding:12px;'>$payDate</td>
                    <td style='padding:12px; text-align:center; font-weight:600;'>$weeks</td>
                    <td style='padding:12px; color:#475569;'>$timeRange</td>
                    <td style='padding:12px; text-align:right; color:#10b981; font-weight:700; font-family:Consolas;'>$amount</td>
                    <td style='padding:12px;'>$promo</td>
                    <td style='padding:12px;'>$method</td>
                  </tr>";
        }
        echo '</tbody></table>';
    } else {
        echo '<div style="text-align:center; padding:40px; color:#64748b;">
                <span class="material-symbols-outlined" style="font-size:48px; opacity:0.3;">receipt_long</span>
                <p style="margin-top:10px;">Học viên này chưa có lịch sử giao dịch nào.</p>
              </div>';
    }

} catch (Exception $e) {
    echo '<div style="color:red; padding:20px;">Lỗi hệ thống: ' . $e->getMessage() . '</div>';
}
?>