<?php
session_start();
require_once '../connect/db_connect.php';
require_once 'api_system_log.php';

if (!isset($_SESSION['user_id'])) { header("Location: 0_login.php"); exit(); }

//cấu hình bank
$BANK_ID   = '970423'; 
$BANK_ACC  = '07564271147';
$BANK_NAME = 'TRUNG TAM TIENG ANH ENGBREAK';

//tính ngày kthp
function calculateEndDateBySessions($startDateStr, $weeks, $classDaysStr) {
    //xác định các thứ trong tuần có học (1=T2, 7=CN)
    $validDays = [];
    if (strpos($classDaysStr, '2') !== false) $validDays[] = 1; //thứ 2
    if (strpos($classDaysStr, '3') !== false) $validDays[] = 2;
    if (strpos($classDaysStr, '4') !== false) $validDays[] = 3;
    if (strpos($classDaysStr, '5') !== false) $validDays[] = 4;
    if (strpos($classDaysStr, '6') !== false) $validDays[] = 5;
    if (strpos($classDaysStr, '7') !== false || strpos($classDaysStr, 'T7') !== false) $validDays[] = 6;
    if (strpos($classDaysStr, 'CN') !== false) $validDays[] = 7; //cn

    if (empty($validDays)) return date('Y-m-d', strtotime("+$weeks weeks", strtotime($startDateStr))); //fallback nếu lỗi

    //tính tổng số buổi cần học
    $sessionsPerWeek = count($validDays);
    $totalSessionsNeeded = $weeks * $sessionsPerWeek;

    //vòng lặp đếm ngày bắt đầu đếm từ ngày tiếp theo của StartDate
    $currentDate = strtotime($startDateStr); 
    $sessionsCounted = 0;

    while ($sessionsCounted < $totalSessionsNeeded) {
        //tăng lên 1 ngày (kiểm tra ngày tiếp theo)
        $currentDate = strtotime('+1 day', $currentDate);
        
        //lấy thứ
        $currentDayOfWeek = date('N', $currentDate);

        //nếu thứ này có trong ngày học thì tăng số buổi
        if (in_array($currentDayOfWeek, $validDays)) {
            $sessionsCounted++;
        }
    }

    return date('Y-m-d', $currentDate);
}

//thanh toán
$msg = ""; $msgType = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] == 'pay') {
    $sId = $_POST['student_id'];
    $cId = $_POST['class_id'];
    $weeks = (int)$_POST['weeks']; 
    $original = $_POST['original_amount'];
    $discount = $_POST['discount_amount'];
    $final = $_POST['final_amount'];
    $method = $_POST['payment_method'] ?? 'tien_mat'; 

    try {
        $info = $conn->query("
            SELECT e.end_study_date, st.promotion_id, s.days 
            FROM enrollments e 
            JOIN students st ON e.student_id = st.id 
            JOIN classes c ON e.class_id = c.id
            JOIN shifts s ON c.shift_id = s.id
            WHERE e.student_id=$sId AND e.class_id=$cId
        ")->fetch(PDO::FETCH_ASSOC);

        if (!$info) throw new Exception("Không tìm thấy thông tin học viên/lớp học.");

        $currentEndDate = $info['end_study_date'];
        $promoId = $info['promotion_id'];
        $classDays = $info['days'];

        $baseDate = (empty($currentEndDate) || strtotime($currentEndDate) < time()) ? date('Y-m-d') : $currentEndDate;

        //logic đếm buổi
        $newEndDate = calculateEndDateBySessions($baseDate, $weeks, $classDays);

        $sqlInsert = "INSERT INTO payments (enrollment_id, student_id, weeks, start_date, end_date, original_amount, discount_amount, promotion_id, final_amount, payment_method, note) VALUES ((SELECT id FROM enrollments WHERE student_id=? AND class_id=?), ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmtPay = $conn->prepare($sqlInsert);
        
        $baseDateShow = date('d/m', strtotime('+2 day', strtotime($baseDate))); 
        $note = "Đóng $weeks tuần ($baseDateShow -> ".date('d/m', strtotime($newEndDate)).")";
        
        $stmtPay->execute([$sId, $cId, $sId, $weeks, $baseDate, $newEndDate, $original, $discount, $promoId, $final, $method, $note]);

        $stmtUpd = $conn->prepare("UPDATE enrollments SET end_study_date = ?, status = 'dang_hoc' WHERE student_id = ? AND class_id = ?");
        $stmtUpd->execute([$newEndDate, $sId, $cId]);
        
        //ghi log
        $sName = $conn->query("SELECT full_name FROM students WHERE id=$sId")->fetchColumn();
        writeLog('tuition', $sId, 'THU_PHI', "Thu phí $sName ($weeks tuần): $final đ");

        $msg = "Thanh toán thành công! Hạn mới: " . date('d/m/Y', strtotime($newEndDate));
        $msgType = "success";

    } catch (Exception $e) {
        $msg = "Lỗi: " . $e->getMessage(); $msgType = "error";
    }
}

$sql = "SELECT s.id, s.full_name, s.avatar, s.phone, e.class_id, c.class_name, e.end_study_date FROM students s JOIN enrollments e ON s.id = e.student_id JOIN classes c ON e.class_id = c.id WHERE e.status IN ('dang_hoc', 'chua_dong_tien', 'het_han') ORDER BY e.end_study_date ASC";
$students = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$classList = $conn->query("SELECT id, class_name FROM classes WHERE status=1")->fetchAll(PDO::FETCH_ASSOC);
?>