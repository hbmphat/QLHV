<?php
session_start();
require_once '../connect/db_connect.php';
if (!isset($_SESSION['user_id'])) exit('<div style="color:red; padding:10px;">Vui lòng đăng nhập.</div>');

$currentUserRole = $_SESSION['user_role'] ?? 'staff';
$currentUserId   = $_SESSION['user_id'];

$filter_uid = isset($_GET['uid']) ? $_GET['uid'] : '';
$filter_action = isset($_GET['action']) ? $_GET['action'] : '';
$filter_date_from = isset($_GET['date_from']) ? $_GET['date_from'] : '';
$filter_date_to = isset($_GET['date_to']) ? $_GET['date_to'] : '';

try {
    $sql = "SELECT a.*, u.full_name, u.username 
            FROM activity_logs a 
            LEFT JOIN users u ON a.user_id = u.id 
            WHERE 1=1"; 
    
    $params = [];

    //nếu ko phải admin chỉ được xem lịch sử của chính mình
    if ($currentUserRole !== 'admin') {
        $sql .= " AND a.user_id = ?";
        $params[] = $currentUserId;
    } 
    else {
        if (!empty($filter_uid)) {
            $sql .= " AND a.user_id = ?";
            $params[] = $filter_uid;
        }
    }

    //lọc
    if (!empty($filter_action)) {
        if ($filter_action === 'LOGIN') {
            $sql .= " AND a.action_type LIKE 'LOGIN%'"; 
        } elseif (strpos($filter_action, '_') === 0) {
            $sql .= " AND a.action_type LIKE ?";
            $params[] = "%" . $filter_action;
        } else {
            $sql .= " AND a.action_type LIKE ?";
            $params[] = $filter_action . "%";
        }
    }
    if (!empty($filter_date_from)) {
        $sql .= " AND DATE(a.created_at) >= ?";
        $params[] = $filter_date_from;
    }
    if (!empty($filter_date_to)) {
        $sql .= " AND DATE(a.created_at) <= ?";
        $params[] = $filter_date_to;
    }

    $sql .= " ORDER BY a.created_at DESC LIMIT 100";

    $stmt = $conn->prepare($sql);
    $stmt->execute($params);
    $logs = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($logs) > 0) {
        echo '<table class="history-table" style="width:100%; border-collapse: collapse;">';
        echo '<thead>
                <tr>
                    <th style="width: 180px;">Người thực hiện</th>
                    <th style="width: 130px;">Thời gian</th>
                    <th style="width: 140px; text-align:center;">Hành động</th>
                    <th>Chi tiết mô tả</th>
                </tr>
              </thead><tbody>';
        
        foreach ($logs as $row) {
            if ($row['user_id'] == 0) {
                $user_name = '<span style="color:#d63384; font-weight:bold;"><i class="material-symbols-outlined" style="font-size:14px; vertical-align:middle;">smart_toy</i> Hệ Thống</span>';
            } else {
                $user_name = htmlspecialchars($row['full_name'] ?? 'Unknown');
                if ($row['user_id'] == $currentUserId) {
                    $user_name .= ' <span style="color:#10b981; font-size:11px;">(Tôi)</span>';
                }
            }

            $action_raw = $row['action_type'];
            $desc = nl2br(htmlspecialchars($row['description']));
            $time = date('H:i d/m/Y', strtotime($row['created_at']));

            $badgeColor = '#6c757d'; $badgeText = $action_raw;
            if (strpos($action_raw, 'LOGIN') !== false) { $badgeColor = '#0d6efd'; $badgeText = ($action_raw == 'LOGIN_FAIL') ? 'Đăng nhập lỗi' : 'Đăng nhập'; } 
            elseif (strpos($action_raw, '_THEM') !== false) { $badgeColor = '#198754'; $badgeText = 'Thêm mới'; } 
            elseif (strpos($action_raw, '_SUA') !== false) { $badgeColor = '#ffc107'; $badgeText = 'Cập nhật'; } 
            elseif (strpos($action_raw, '_XOA') !== false) { $badgeColor = '#dc3545'; $badgeText = 'Xóa dữ liệu'; }
            elseif (strpos($action_raw, '_TRANG_THAI') !== false) { $badgeColor = '#0dcaf0'; $badgeText = 'Đổi trạng thái'; }

            $parts = explode('_', $action_raw);
            $context = $parts[0] . (isset($parts[1]) && $parts[1]!='THEM' && $parts[1]!='SUA' && $parts[1]!='XOA' ? ' '.$parts[1] : '');
            if ($context == 'LOGIN') $context = 'Hệ thống';

            echo '<tr>
                    <td><div class="history-user-name">'.$user_name.'</div></td>
                    <td><span class="history-item-time">'.$time.'</span></td>
                    <td style="text-align:center;">
                        <span class="history-badge" style="background:'.$badgeColor.'">'.$badgeText.'</span>
                        <div class="history-item-time" style="font-size:10px; margin-top:3px;">'.$context.'</div>
                    </td>
                    <td><div class="history-desc">'.$desc.'</div></td>
                  </tr>';
        }
        echo '</tbody></table>';
    } else {
        echo '<div style="text-align:center; padding:40px; color:var(--text-secondary);">
                <span class="material-symbols-outlined" style="font-size:48px; opacity:0.5;">history_toggle_off</span>
                <p style="margin-top:10px;">Không tìm thấy hoạt động nào.</p>
              </div>';
    }

} catch (PDOException $e) {
    echo '<div style="color:red; padding:10px;">Lỗi: ' . $e->getMessage() . '</div>';
}
?>