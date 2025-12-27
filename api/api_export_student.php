<?php
session_start();
require_once '../connect/db_connect.php';
require_once '../tfpdf/tfpdf.php';

if (!isset($_SESSION['user_id'])) exit('Vui lòng đăng nhập.');

$sql = "
    SELECT s.*, 
           c.class_name, 
           l.level_name, 
           t.full_name as teacher_name,
           e.end_study_date,
           (SELECT GROUP_CONCAT(p.name SEPARATOR ', ') 
            FROM payments pay 
            JOIN promotions p ON pay.promotion_id = p.id 
            WHERE pay.student_id = s.id) as promo_names
    FROM students s
    LEFT JOIN enrollments e ON s.id = e.student_id AND e.status = 'dang_hoc'
    LEFT JOIN classes c ON e.class_id = c.id
    LEFT JOIN levels l ON c.level_id = l.id
    LEFT JOIN teachers t ON c.teacher_id = t.id
    ORDER BY s.status DESC, s.full_name ASC
";
$students = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
//pdf
$pdf = new tFPDF('L', 'mm', 'A4');
$pdf->AddPage();
$pdf->AddFont('DejaVu','','DejaVuSans.ttf',true);

$pdf->SetFont('DejaVu','',16);
$pdf->Cell(0, 10, 'DANH SÁCH HỌC VIÊN & TÌNH TRẠNG HỌC TẬP', 0, 1, 'C');
$pdf->SetFont('DejaVu','',10);
$pdf->Cell(0, 5, 'Ngày in: ' . date('d/m/Y'), 0, 1, 'C');
$pdf->Ln(10);

$pdf->SetFillColor(19, 127, 236);
$pdf->SetTextColor(255);
$pdf->SetDrawColor(200);
$pdf->SetLineWidth(.3);

$w = array(10, 45, 20, 25, 25, 40, 30, 40, 25, 20); 
$header = array('STT', 'Họ Tên', 'Ngày sinh', 'SĐT', 'Phụ Huynh', 'Lớp Đang Học', 'Giảng Viên', 'Khuyến Mãi', 'Hết Hạn', 'TT');

foreach($header as $i => $col) {
    $pdf->Cell($w[$i], 10, $col, 1, 0, 'C', true);
}
$pdf->Ln();

$pdf->SetTextColor(0);
$pdf->SetFont('DejaVu','',8);
$fill = false;
$i = 1;

foreach ($students as $row) {
    $endDate = !empty($row['end_study_date']) ? date('d/m/Y', strtotime($row['end_study_date'])) : '-';
    
    $promoNames = $row['promo_names'] ?? ''; 
    $className  = $row['class_name'] ?? 'Chưa xếp';
    $teacherName = $row['teacher_name'] ?? '-';

    $promo = mb_strimwidth($promoNames, 0, 25, '...');
    
    $pdf->Cell($w[0], 8, $i++, 1, 0, 'C', $fill);
    $pdf->Cell($w[1], 8, $row['full_name'], 1, 0, 'L', $fill);
    $pdf->Cell($w[2], 8, date('d/m/Y', strtotime($row['dob'])), 1, 0, 'C', $fill);
    $pdf->Cell($w[3], 8, $row['phone'], 1, 0, 'C', $fill);
    $pdf->Cell($w[4], 8, $row['parent_phone'], 1, 0, 'C', $fill);

    $pdf->Cell($w[5], 8, mb_strimwidth($className, 0, 25, '..'), 1, 0, 'L', $fill);
    $pdf->Cell($w[6], 8, mb_strimwidth($teacherName, 0, 18, '..'), 1, 0, 'L', $fill);
    
    $pdf->Cell($w[7], 8, $promo, 1, 0, 'L', $fill);
    $pdf->Cell($w[8], 8, $endDate, 1, 0, 'C', $fill);
    
    $status = ($row['learning_status'] == 'dang_hoc') ? 'Đang học' : (($row['learning_status'] == 'bao_luu') ? 'Bảo lưu' : 'Nghỉ');
    $pdf->Cell($w[9], 8, $status, 1, 0, 'C', $fill);
    
    $pdf->Ln();
}

$pdf->Output('D', 'DanhSachHocVien.pdf');
?>