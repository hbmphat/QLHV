<?php
session_start();
require_once '../connect/db_connect.php';

header('Content-Type: application/json');
//nhận mk từ script
$inputPass = $_POST['password'] ?? '';
$userId = $_SESSION['user_id'];

//lấy mk admin
$stmt = $conn->prepare("SELECT password FROM users WHERE id = ?");
$stmt->execute([$userId]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

//check mk
if (!$user || !password_verify($inputPass, $user['password'])) {
    echo json_encode(['status' => 'error', 'message' => 'Mật khẩu không đúng!']);
    exit;
}

//đúng
try {
    $backupDir = '../backups/';
    if (!is_dir($backupDir)) mkdir($backupDir, 0777, true);
    
    $fileName = 'EngBreak_Backup_' . date('Y-m-d_H-i-s') . '.sql';
    $filePath = $backupDir . $fileName;

    $tables = [];
    $sqlScript = "";
    
    $stmt = $conn->query("SHOW TABLES");
    while ($row = $stmt->fetch(PDO::FETCH_NUM)) { $tables[] = $row[0]; }

    foreach ($tables as $table) {
        $row2 = $conn->query("SHOW CREATE TABLE $table")->fetch(PDO::FETCH_NUM);
        $sqlScript .= "\n\n" . $row2[1] . ";\n\n";
        $rows = $conn->query("SELECT * FROM $table")->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $row) {
            $sqlScript .= "INSERT INTO $table VALUES(";
            $values = [];
            foreach ($row as $value) {
                $value = addslashes($value ?? '');
                $values[] = "'" . $value . "'";
            }
            $sqlScript .= implode(", ", $values);
            $sqlScript .= ");\n";
        }
    }

    if (file_put_contents($filePath, $sqlScript)) {
        // ghi log
        $conn->prepare("INSERT INTO backup_logs (backup_filename, status, created_at) VALUES (?, 'Success', NOW())")->execute([$fileName]);
        
        echo json_encode(['status' => 'success', 'url' => $filePath, 'filename' => $fileName]);
    } else {
        throw new Exception("Lỗi ghi file");
    }

} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}
?>