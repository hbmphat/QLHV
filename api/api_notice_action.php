<?php
session_start();
require_once '../connect/db_connect.php';
require_once 'api_system_log.php';

//nhúng PHPMailer
require_once '../vendor/PHPMailer/src/Exception.php';
require_once '../vendor/PHPMailer/src/PHPMailer.php';
require_once '../vendor/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (!isset($_SESSION['user_id'])) { header("Location: 0_login.php"); exit(); }

$students = $conn->query("SELECT id, full_name, email FROM students WHERE status=1 ORDER BY full_name")->fetchAll(PDO::FETCH_ASSOC);
$classes = $conn->query("SELECT id, class_name FROM classes WHERE status=1 ORDER BY class_name")->fetchAll(PDO::FETCH_ASSOC);
$teachers = $conn->query("SELECT id, full_name, email FROM teachers WHERE status IN ('dang_day','thu_viec') ORDER BY full_name")->fetchAll(PDO::FETCH_ASSOC);
$logs = $conn->query("SELECT * FROM email_logs ORDER BY sent_at DESC LIMIT 15")->fetchAll(PDO::FETCH_ASSOC);

//xử lý gửi
$msg = ""; $msgType = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['send_email'])) {
    $type = $_POST['target_type'];
    $subject = $_POST['subject'];
    $content = $_POST['content'];
    $recipients = [];

    try {
        //lọc danh sách người nhận
        if ($type === 'student_one') {
            $sid = $_POST['student_id'];
            $stmt = $conn->prepare("SELECT full_name, email FROM students WHERE id = ? AND email IS NOT NULL AND email != ''");
            $stmt->execute([$sid]);
            $recipients = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } 
        elseif ($type === 'class_all') {
            $cid = $_POST['class_id'];
            $stmt = $conn->prepare("SELECT s.full_name, s.email FROM students s JOIN enrollments e ON s.id = e.student_id WHERE e.class_id = ? AND e.status = 'dang_hoc' AND s.email IS NOT NULL AND s.email != ''");
            $stmt->execute([$cid]);
            $recipients = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } 
        elseif ($type === 'all_active') {
            $recipients = $conn->query("SELECT full_name, email FROM students WHERE status = 1 AND email IS NOT NULL AND email != ''")->fetchAll(PDO::FETCH_ASSOC);
        }
        elseif ($type === 'teacher_one') {
            $tid = $_POST['teacher_id'];
            $stmt = $conn->prepare("SELECT full_name, email FROM teachers WHERE id = ? AND email IS NOT NULL AND email != ''");
            $stmt->execute([$tid]);
            $recipients = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        elseif ($type === 'all_teachers') {
            $recipients = $conn->query("SELECT full_name, email FROM teachers WHERE status IN ('dang_day','thu_viec') AND email IS NOT NULL AND email != ''")->fetchAll(PDO::FETCH_ASSOC);
        }

        if (empty($recipients)) {
            throw new Exception("Không tìm thấy người nhận có email hợp lệ.");
        }

        //cấu hình Mail
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->CharSet    = 'UTF-8';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;
        
        $mail->Username   = 'minhphat1474@gmail.com';

        $mail->Password   = 'qyvy ybcx paqg emww';

        $mail->setFrom('EngBreak@gmail.com', 'EngBreak Center');

        $count = 0;
        $stmtLog = $conn->prepare("INSERT INTO email_logs (sender_id, recipient_name, recipient_email, subject, content) VALUES (?, ?, ?, ?, ?)");

        foreach ($recipients as $r) {
            $mail->clearAddresses();
            $mail->addAddress($r['email'], $r['full_name']);
            $personalBody = str_replace('[Name]', $r['full_name'], $content);
            
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = nl2br($personalBody);
            $mail->AltBody = strip_tags($personalBody);

            $mail->send();
            
            $stmtLog->execute([$_SESSION['user_id'], $r['full_name'], $r['email'], $subject, $personalBody]);
            $count++;
        }

        $msg = "Đã gửi thành công $count email!";
        $msgType = "success";
        $logs = $conn->query("SELECT * FROM email_logs ORDER BY sent_at DESC LIMIT 15")->fetchAll(PDO::FETCH_ASSOC);

    } catch (Exception $e) {
        $msg = "Gửi thất bại: " . $mail->ErrorInfo . " " . $e->getMessage();
        $msgType = "error";
    }
}
?>