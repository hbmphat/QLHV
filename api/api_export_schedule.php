<?php
session_start();
require_once '../connect/db_connect.php';
require_once '../tfpdf/tfpdf.php';

if (!isset($_SESSION['user_id'])) exit('Vui lòng đăng nhập.');

$filterRoom = $_GET['room'] ?? '';
$filterTeacher = $_GET['teacher'] ?? '';

$sql = "SELECT c.class_name, c.student_count, c.status,
               r.room_name,
               t.code_name, t.full_name as teacher_name,
               s.shift_name, s.start_time, s.end_time, s.days
        FROM classes c
        JOIN shifts s ON c.shift_id = s.id
        JOIN rooms r ON c.room_id = r.id
        JOIN teachers t ON c.teacher_id = t.id
        WHERE c.status = 1"; 

$params = [];
if ($filterRoom) {
    $sql .= " AND c.room_id = ?";
    $params[] = $filterRoom;
}
if ($filterTeacher) {
    $sql .= " AND c.teacher_id = ?";
    $params[] = $filterTeacher;
}

$sql .= " ORDER BY s.start_time ASC, r.room_name ASC, c.class_name ASC";

$stmt = $conn->prepare($sql);
$stmt->execute($params);
$classes = $stmt->fetchAll(PDO::FETCH_ASSOC);

//pdf
$pdf = new tFPDF('L', 'mm', 'A4');
$pdf->AddPage();
$pdf->AddFont('DejaVu','','DejaVuSans.ttf',true);

$pdf->SetFont('DejaVu','',16);
$pdf->Cell(0, 10, 'DANH SÁCH LỊCH HỌC', 0, 1, 'C');
$pdf->SetFont('DejaVu','',10);
$pdf->Cell(0, 5, 'Ngày in: ' . date('d/m/Y'), 0, 1, 'C');
$pdf->Ln(10);

$pdf->SetFillColor(19, 127, 236);
$pdf->SetTextColor(255);
$pdf->SetDrawColor(200);
$pdf->SetLineWidth(.3);
$pdf->SetFont('DejaVu','',10);

$w = array(35, 120, 45, 20, 30); 
$header = array('Ca Học', 'Tên Lớp Học', 'Giờ Học', 'Sĩ Số', 'Phòng');

foreach($header as $i => $col) {
    $pdf->Cell($w[$i], 10, $col, 1, 0, 'C', true);
}
$pdf->Ln();

$pdf->SetTextColor(0);
$pdf->SetFont('DejaVu','',10);
$fill = false;

$h = 10; 

if (count($classes) > 0) {
    foreach ($classes as $row) {
        $classInfo = $row['class_name']; 
        
        $timeRange = date('H:i', strtotime($row['start_time'])) . ' - ' . date('H:i', strtotime($row['end_time']));
        
        if ($pdf->GetY() + $h > $pdf->GetPageHeight() - 15) {
            $pdf->AddPage();
            $pdf->SetFillColor(19, 127, 236); $pdf->SetTextColor(255);
            foreach($header as $i => $col) $pdf->Cell($w[$i], 10, $col, 1, 0, 'C', true);
            $pdf->Ln();
            $pdf->SetTextColor(0);
        }

        $pdf->Cell($w[0], $h, $row['shift_name'], 1, 0, 'C', $fill);

        $x = $pdf->GetX(); $y = $pdf->GetY();
        $pdf->MultiCell($w[1], $h, $classInfo, 1, 'L', $fill);
        $pdf->SetXY($x + $w[1], $y);

        $pdf->Cell($w[2], $h, $timeRange, 1, 0, 'C', $fill);

        $pdf->Cell($w[3], $h, $row['student_count'], 1, 0, 'C', $fill);

        $pdf->Cell($w[4], $h, $row['room_name'], 1, 0, 'C', $fill);

        $pdf->Ln($h);
    }
} else {
    $pdf->Cell(array_sum($w), 10, 'Không có lớp học nào.', 1, 1, 'C');
}

$pdf->Output('D', 'LichHoc.pdf');
?>