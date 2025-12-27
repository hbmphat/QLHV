<?php
require_once '../connect/db_connect.php';

function writeLog($tableType, $recordId, $action, $desc, $oldData = null) {
    global $conn;

    $tableMap = [
        'student'   => 'student_logs',
        'teacher'   => 'teacher_logs',
        'level'     => 'level_logs',
        'tuition'   => 'tuition_logs',
        'promotion' => 'promotion_logs',
        'auth'      => 'auth_logs',
        'room'      => 'room_logs',
        'class'     => 'class_logs'
    ];

    if (!isset($tableMap[$tableType])) return;
    $tableName = $tableMap[$tableType];

    //lấy id user
    $actorId = $_SESSION['user_id'] ?? 0; 
    
    $jsonOldData = ($oldData) ? json_encode($oldData, JSON_UNESCAPED_UNICODE) : null;

    try {
        if ($tableType === 'auth') {
            
            $actorName = $_SESSION['full_name'] ?? 'Khách';

            if ($recordId > 0) {
                $stmtUser = $conn->prepare("SELECT full_name FROM users WHERE id = ?");
                $stmtUser->execute([$recordId]);
                $u = $stmtUser->fetch();
                if ($u) $actorName = $u['full_name'];
            }

            $stmt = $conn->prepare("INSERT INTO auth_logs (user_id, full_name, action, description, ip_address) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$recordId, $actorName, $action, $desc, $_SERVER['REMOTE_ADDR']]);

        } else {
            $sql = "INSERT INTO $tableName (record_id, actor_id, action, description, old_data) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$recordId, $actorId, $action, $desc, $jsonOldData]);
        }
    } catch (Exception $e) {
        error_log("Lỗi ghi log: " . $e->getMessage());
    }
}
?>