<?php
session_start();
require_once '../connect/db_connect.php';
require_once '../tfpdf/tfpdf.php';

if (!isset($_SESSION['user_id'])) exit('Vui lòng đăng nhập.');

$sql = "SELECT * FROM teachers ORDER BY status ASC, full_name ASC";
$teachers = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);

//pdf
$pdf = new tFPDF('L', 'mm', 'A4');
$pdf->AddPage();

$pdf->AddFont('DejaVu','','DejaVuSans.ttf',true);
$pdf->SetFont('DejaVu','',12);

$pdf->SetFontSize(18);
$pdf->Cell(0, 10, 'DANH SÁCH GIẢNG VIÊN', 0, 1, 'C');
$pdf->SetFontSize(10);
$pdf->Cell(0, 5, 'Ngày in: ' . date('d/m/Y'), 0, 1, 'C');
$pdf->Ln(10);

$pdf->SetFont('DejaVu','',10);
$pdf->SetFillColor(19, 127, 236);
$pdf->SetTextColor(255);
$pdf->SetDrawColor(200, 200, 200);
$pdf->SetLineWidth(.3);

$w = array(10, 20, 55, 15, 30, 65, 35, 35);
$header = array('STT', 'Mã GV', 'Họ và Tên', 'Giới', 'Điện thoại', 'Email', 'Trình độ', 'Trạng thái');

for($i=0; $i<count($header); $i++) {
    $pdf->Cell($w[$i], 10, $header[$i], 1, 0, 'C', true);
}
$pdf->Ln();

$pdf->SetTextColor(0);
$pdf->SetFont('DejaVu','',9);
$fill = false;

$statusMap = [
    'dang_day' => 'Đang dạy',
    'thu_viec' => 'Thử việc',
    'nghi_phep' => 'Nghỉ phép',
    'tam_nghi' => 'Tạm nghỉ',
    'nghi_viec' => 'Đã nghỉ'
];

$i = 1;
foreach ($teachers as $row) {
    $code = $row['code_name'] ?? '---';
    $name = $row['full_name'];
    $gender = ($row['gender'] == 'Nam') ? 'Nam' : 'Nữ';
    $phone = $row['phone'];
    $email = $row['email'];
    $level = $row['specialty'];
    $statusText = $statusMap[$row['status']] ?? $row['status'];

    $pdf->Cell($w[0], 8, $i++, 1, 0, 'C', $fill);
    $pdf->Cell($w[1], 8, $code, 1, 0, 'C', $fill);
    $pdf->Cell($w[2], 8, $name, 1, 0, 'L', $fill);
    $pdf->Cell($w[3], 8, $gender, 1, 0, 'C', $fill);
    $pdf->Cell($w[4], 8, $phone, 1, 0, 'C', $fill);
    $pdf->Cell($w[5], 8, $email, 1, 0, 'L', $fill);
    $pdf->Cell($w[6], 8, $level, 1, 0, 'C', $fill);
    $pdf->Cell($w[7], 8, $statusText, 1, 0, 'C', $fill);
    
    $pdf->Ln();
}

$pdf->Ln(10);
$pdf->SetFont('DejaVu','',10);
$pdf->Cell(0, 10, 'Người lập biểu: ' . ($_SESSION['full_name'] ?? 'Admin'), 0, 1, 'R');

//xuất pdf
$fileName = 'DanhSachGiangVien_' . date('Ymd') . '.pdf';
$pdf->Output('D', $fileName);
?>