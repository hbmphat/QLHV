<?php
session_start();
require_once '../connect/db_connect.php';
require_once '../tfpdf/tfpdf.php';

if (!isset($_SESSION['user_id'])) exit('Vui lòng đăng nhập.');

$classId = $_GET['id'] ?? 0;
if (!$classId) exit('Không tìm thấy lớp.');

$sqlClass = "SELECT c.class_name, c.start_date, l.level_name, t.full_name as teacher_name, 
                    s.shift_name, s.start_time, s.end_time, r.room_name
             FROM classes c
             LEFT JOIN levels l ON c.level_id = l.id
             LEFT JOIN teachers t ON c.teacher_id = t.id
             LEFT JOIN shifts s ON c.shift_id = s.id
             LEFT JOIN rooms r ON c.room_id = r.id
             WHERE c.id = ?";
$stmt = $conn->prepare($sqlClass);
$stmt->execute([$classId]);
$class = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$class) exit('Lớp không tồn tại.');

//dshv
$sqlStudents = "SELECT s.full_name, s.gender, s.dob, s.phone, e.registration_date 
                FROM enrollments e
                JOIN students s ON e.student_id = s.id
                WHERE e.class_id = ? AND e.status = 'dang_hoc'
                ORDER BY s.full_name ASC";
$stmtS = $conn->prepare($sqlStudents);
$stmtS->execute([$classId]);
$students = $stmtS->fetchAll(PDO::FETCH_ASSOC);

//pdf
$pdf = new tFPDF();
$pdf->AddPage();

$pdf->AddFont('DejaVu','','DejaVuSans.ttf',true);
$pdf->SetFont('DejaVu','',14);

$pdf->SetFontSize(20);
$pdf->Cell(0, 10, 'DANH SÁCH LỚP HỌC', 0, 1, 'C');
$pdf->Ln(5);

$pdf->SetFontSize(11);
$pdf->SetFillColor(240, 240, 240);

function printInfoRow($pdf, $label, $value, $label2 = '', $value2 = '') {
    $pdf->SetFont('DejaVu','',11); 
    
    $pdf->Cell(30, 8, $label, 0, 0); 
    
    $pdf->Cell(70, 8, $value, 0, 0);
    
    if($label2) {
        $pdf->Cell(25, 8, $label2, 0, 0); 
        $pdf->Cell(65, 8, $value2, 0, 0);
    }
    $pdf->Ln();
}

printInfoRow($pdf, 'Lớp học:', $class['class_name']);
printInfoRow($pdf, 'Giảng viên:', $class['teacher_name']);
printInfoRow($pdf, 'Cấp độ:', $class['level_name'], 'Phòng:', $class['room_name']);

$timeInfo = $class['shift_name'];
if (!empty($class['start_time'])) {
    $timeInfo .= ' (' . date('H:i', strtotime($class['start_time'])) . '-' . date('H:i', strtotime($class['end_time'])) . ')';
}
printInfoRow($pdf, 'Ca học:', $timeInfo);
$pdf->Ln(10);

$pdf->SetFont('DejaVu','',10);
$pdf->SetFillColor(19, 127, 236);
$pdf->SetTextColor(255);
$pdf->SetDrawColor(200, 200, 200);
$pdf->SetLineWidth(.3);

$w = array(15, 65, 30, 20, 35, 25);
$header = array('STT', 'Họ và Tên', 'Ngày sinh', 'Giới', 'Số điện thoại', 'Ngày vào');

for($i=0; $i<count($header); $i++) {
    $pdf->Cell($w[$i], 8, $header[$i], 1, 0, 'C', true);
}
$pdf->Ln();

$pdf->SetTextColor(0);
$pdf->SetFont('DejaVu','',10);
$fill = false;

$i = 1;
foreach ($students as $row) {
    $pdf->Cell($w[0], 8, $i++, 1, 0, 'C', $fill);
    $pdf->Cell($w[1], 8, $row['full_name'], 1, 0, 'L', $fill);
    
    $dob = !empty($row['dob']) ? date('d/m/Y', strtotime($row['dob'])) : '';
    $pdf->Cell($w[2], 8, $dob, 1, 0, 'C', $fill);
    
    $pdf->Cell($w[3], 8, $row['gender'], 1, 0, 'C', $fill);
    $pdf->Cell($w[4], 8, $row['phone'], 1, 0, 'C', $fill);
    
    $regDate = !empty($row['registration_date']) ? date('d/m/Y', strtotime($row['registration_date'])) : '';
    $pdf->Cell($w[5], 8, $regDate, 1, 0, 'C', $fill);
    
    $pdf->Ln();
}

$pdf->Ln(10);
$pdf->Cell(0, 10, 'Ngày in: ' . date('d/m/Y'), 0, 1, 'R');

//xuất pdf
$cleanName = preg_replace('/[^a-zA-Z0-9_\-\. ]/', '', $class['class_name']);
$fileName = 'DanhSachLop_' . $cleanName . '.pdf';

$pdf->Output('D', $fileName);
?>