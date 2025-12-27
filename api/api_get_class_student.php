<?php
session_start();
require_once '../connect/db_connect.php';

if (!isset($_SESSION['user_id'])) exit('<tr><td colspan="5">Vui lòng đăng nhập.</td></tr>');

$class_id = $_GET['id'] ?? 0;

if ($class_id) {
    $sql = "SELECT s.*, e.registration_date 
            FROM enrollments e
            JOIN students s ON e.student_id = s.id
            WHERE e.class_id = ? AND e.status = 'dang_hoc'
            ORDER BY s.full_name ASC";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute([$class_id]);
    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($students) > 0) {
        $i = 1;
        foreach ($students as $s) {
            $avatarUrl = !empty($s['avatar']) && file_exists('uploads/'.$s['avatar']) 
                ? 'uploads/'.$s['avatar'] 
                : "https://ui-avatars.com/api/?name=".urlencode($s['full_name'])."&background=random&color=fff";
            
            echo '<tr>
                    <td style="text-align:center; color:#666;">'.$i++.'</td>
                    <td>
                        <div style="display:flex; align-items:center; gap:10px;">
                            <img src="'.$avatarUrl.'" style="width:36px; height:36px; border-radius:50%; object-fit:cover;">
                            <span style="font-weight:600; color:var(--text-main);">'.htmlspecialchars($s['full_name']).'</span>
                        </div>
                    </td>
                    <td>'.htmlspecialchars($s['phone']).'</td>
                    <td>'.date('d/m/Y', strtotime($s['dob'])).'</td>
                    <td>'.date('d/m/Y', strtotime($s['registration_date'])).'</td>
                  </tr>';
        }
    } else {
        echo '<tr><td colspan="5" style="text-align:center; padding:30px; color:#999;">Lớp này chưa có học viên nào.</td></tr>';
    }
}
?>