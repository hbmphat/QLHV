<?php
session_start();
require_once '../connect/db_connect.php';
header('Content-Type: application/json');
if (!isset($_SESSION['user_id'])) { echo json_encode(['error' => 'Unauthorized']); exit; }

$type = $_GET['type'] ?? 'overview';
$year = $_GET['year'] ?? date('Y');

try {
    if ($type === 'overview') {
        $revenueMonth = $conn->query("SELECT SUM(final_amount) FROM payments WHERE MONTH(payment_date) = MONTH(CURRENT_DATE()) AND YEAR(payment_date) = YEAR(CURRENT_DATE())")->fetchColumn() ?: 0;
        $newStudentsMonth = $conn->query("SELECT COUNT(*) FROM students WHERE MONTH(join_date) = MONTH(CURRENT_DATE()) AND YEAR(join_date) = YEAR(CURRENT_DATE())")->fetchColumn() ?: 0;
        $activeStudents = $conn->query("SELECT COUNT(*) FROM students WHERE status = 1")->fetchColumn() ?: 0;
        $activeClasses = $conn->query("SELECT COUNT(*) FROM classes WHERE status = 1")->fetchColumn() ?: 0;
        
        $debtCount = $conn->query("SELECT COUNT(*) FROM enrollments WHERE status IN ('chua_dong_tien', 'het_han')")->fetchColumn() ?: 0;

        echo json_encode([
            'revenue_month' => $revenueMonth,
            'new_students_month' => $newStudentsMonth,
            'active_students' => $activeStudents,
            'active_classes' => $activeClasses,
            'debt_count' => $debtCount
        ]);
    }

    elseif ($type === 'chart_data') {
        //doanh thu tháng
        $sqlRev = "SELECT MONTH(payment_date) as m, SUM(final_amount) as total FROM payments WHERE YEAR(payment_date) = ? GROUP BY MONTH(payment_date)";
        $stmt = $conn->prepare($sqlRev); $stmt->execute([$year]); $rawRev = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);

        $sqlStd = "SELECT MONTH(join_date) as m, COUNT(*) as total FROM students WHERE YEAR(join_date) = ? GROUP BY MONTH(join_date)";
        $stmt = $conn->prepare($sqlStd); $stmt->execute([$year]); $rawStd = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);

        $months=[]; $dRev=[]; $dStd=[];
        for($i=1; $i<=12; $i++) { $months[]="T$i"; $dRev[]=$rawRev[$i]??0; $dStd[]=$rawStd[$i]??0; }

        //doanh thu theo cấp độ
        $sqlPie = "
            SELECT l.level_name, SUM(p.final_amount) as total
            FROM payments p
            JOIN enrollments e ON p.enrollment_id = e.id
            JOIN classes c ON e.class_id = c.id
            JOIN levels l ON c.level_id = l.id
            WHERE YEAR(p.payment_date) = ?
            GROUP BY l.level_name
        ";
        $stmtPie = $conn->prepare($sqlPie); $stmtPie->execute([$year]);
        $pieData = $stmtPie->fetchAll(PDO::FETCH_ASSOC);

        //thanh toán
        $sqlMethod = "SELECT payment_method, COUNT(*) as count FROM payments WHERE YEAR(payment_date) = ? GROUP BY payment_method";
        $stmtMethod = $conn->prepare($sqlMethod); $stmtMethod->execute([$year]);
        $methodData = $stmtMethod->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode([
            'months' => $months,
            'revenue' => $dRev,
            'students' => $dStd,
            'revenue_by_level' => $pieData,
            'payment_methods' => $methodData
        ]);
    }

    //gvien
    elseif ($type === 'top_teachers') {
        // đếm lớp & chỉ số hv
        $sql = "
            SELECT t.full_name, t.avatar, 
                   COUNT(c.id) as class_count, 
                   SUM(c.student_count) as total_students
            FROM teachers t
            LEFT JOIN classes c ON t.id = c.teacher_id AND c.status = 1
            WHERE t.status = 'dang_day'
            GROUP BY t.id
            ORDER BY total_students DESC
            LIMIT 5
        ";
        $data = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($data);
    }
    //dshv mới
    elseif ($type === 'new_students_list') {
        $sql = "SELECT full_name, phone, join_date 
                FROM students 
                WHERE YEARWEEK(join_date, 1) = YEARWEEK(CURDATE(), 1)
                ORDER BY join_date DESC";
        $data = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($data);
    }

    //ds doanh thu
    elseif ($type === 'revenue_list') {
        $sql = "SELECT p.payment_date, p.final_amount, s.full_name, c.class_name
                FROM payments p
                JOIN students s ON p.student_id = s.id
                JOIN enrollments e ON p.enrollment_id = e.id
                JOIN classes c ON e.class_id = c.id
                WHERE YEARWEEK(p.payment_date, 1) = YEARWEEK(CURDATE(), 1)
                ORDER BY p.payment_date DESC";
        $data = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($data);
    }
    //ds đang học
    elseif ($type === 'active_students_list') {
        $sql = "SELECT s.full_name, s.phone, c.class_name 
                FROM students s 
                JOIN enrollments e ON s.id = e.student_id 
                JOIN classes c ON e.class_id = c.id
                WHERE e.status = 'dang_hoc'
                ORDER BY c.class_name ASC";
        $data = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($data);
    }

    //nợ hp
    elseif ($type === 'debt_students_list') {
        $sql = "SELECT s.full_name, s.phone, c.class_name, e.status, e.end_study_date
                FROM students s 
                JOIN enrollments e ON s.id = e.student_id 
                JOIN classes c ON e.class_id = c.id
                WHERE e.status IN ('chua_dong_tien', 'het_han')
                ORDER BY e.end_study_date ASC";
        $data = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($data);
    }

} catch (Exception $e) { echo json_encode(['error' => $e->getMessage()]); }
?>