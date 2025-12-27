<?php
require_once '../connect/db_connect.php';
//lấy 20 email gần nhất
$sql = "SELECT l.*, u.full_name FROM email_logs l JOIN users u ON l.sender_id = u.id ORDER BY l.id DESC LIMIT 20";
$stmt = $conn->query($sql);
$logs = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($logs as $log) {
    $statusBadge = $log['status'] == 'sent' ? '<span class="badge badge-success">Đã gửi</span>' : '<span class="badge badge-danger">Lỗi</span>';
    $date = date('H:i d/m/Y', strtotime($log['created_at']));
    $attachIcon = $log['attachment'] ? '<span class="material-symbols-outlined" style="font-size:16px">attachment</span>' : '';
    
    echo "<tr>
            <td>#{$log['id']}</td>
            <td>{$date}</td>
            <td><strong>{$log['subject']}</strong> $attachIcon</td>
            <td>{$log['recipient_type']}: {$log['recipient_detail']}</td>
            <td>{$statusBadge}</td>
            <td><button class='btn-icon' onclick='viewEmailDetail(".json_encode($log).")'><span class='material-symbols-outlined'>visibility</span></button></td>
          </tr>";
}
?>