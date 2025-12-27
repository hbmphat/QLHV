<?php
session_start();
require_once '../connect/db_connect.php';

if (!isset($_SESSION['user_id'])) { header("Location: 0_login.php"); exit(); }

$currentYear = date('Y');
$years = range($currentYear, $currentYear - 4);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8" /><meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BáoCáo-EngBreak</title>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" rel="stylesheet" />
    
    <link rel="stylesheet" href="../style/1_dashboad.css">
    <link rel="stylesheet" href="../style/9_report.css">
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <script src="../javascript/1_dashboad.js" defer></script>
    <script src="../javascript/9_report.js" defer></script>
</head>
<body>
    <div class="app-container">
        <?php include 'sidebar.php'; ?>
        <main id="main-content">
            
            <div class="page-header">
                <div>
                    <h1>Báo Cáo</h1>
                    <p class="subtitle">Số liệu thống kê và phân tích thời gian thực</p>
                </div>
                <div class="filter-group">
                    <select id="filter_year" class="filter-select">
                        <?php foreach($years as $y): ?>
                            <option value="<?php echo $y; ?>">Năm <?php echo $y; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="stats-grid">
                <div class="stat-card">
                    <button class="btn-view-detail" onclick="openDetailModal('revenue')" title="Xem chi tiết doanh thu tuần này">
                        <span class="material-symbols-outlined">visibility</span>
                    </button>
                    <div class="stat-icon icon-revenue"><span class="material-symbols-outlined">payments</span></div>
                    <div class="stat-info">
                        <h4>Doanh thu tháng này</h4>
                        <div class="stat-value" id="stat_revenue">0 đ</div>
                    </div>
                </div>
                
                <div class="stat-card">
                    <button class="btn-view-detail" onclick="openDetailModal('new_student')" title="Xem danh sách học viên mới tuần này">
                        <span class="material-symbols-outlined">visibility</span>
                    </button>
                    <div class="stat-icon icon-student"><span class="material-symbols-outlined">person_add</span></div>
                    <div class="stat-info">
                        <h4>Học viên mới</h4>
                        <div class="stat-value" id="stat_new_std">0</div>
                    </div>
                </div>

                <div class="stat-card">
                    <button class="btn-view-detail" onclick="openDetailModal('active_student')" title="Xem danh sách đang học">
                        <span class="material-symbols-outlined">visibility</span>
                    </button>
                    <div class="stat-icon icon-total"><span class="material-symbols-outlined">groups</span></div>
                    <div class="stat-info">
                        <h4>Tổng đang học</h4>
                        <div class="stat-value" id="stat_active_std">0</div>
                    </div>
                </div>

                <div class="stat-card">
                    <button class="btn-view-detail" onclick="openDetailModal('debt')" title="Xem danh sách nợ phí">
                        <span class="material-symbols-outlined">visibility</span>
                    </button>
                    <div class="stat-icon icon-debt"><span class="material-symbols-outlined">warning</span></div>
                    <div class="stat-info">
                        <h4>Cần đóng phí</h4>
                        <div class="stat-value" id="stat_debt" style="color:#ef4444;">0</div>
                    </div>
                </div>
            </div>

            <div class="charts-row-1">
                <div class="chart-box big-chart">
                    <div class="chart-header">
                        <div class="chart-title">Biểu đồ Doanh thu (VNĐ)</div>
                    </div>
                    <div style="height: 300px;">
                        <canvas id="revenueChart"></canvas>
                    </div>
                </div>
                <div class="chart-box small-chart">
                    <div class="chart-header">
                        <div class="chart-title">Tăng trưởng Học viên</div>
                    </div>
                    <div style="height: 300px;">
                        <canvas id="studentChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="charts-row-2">
                <div class="chart-box">
                    <div class="chart-header"><div class="chart-title">Nguồn doanh thu</div></div>
                    <div style="height: 250px; display:flex; justify-content:center;"><canvas id="levelPieChart"></canvas></div>
                </div>

                <div class="chart-box">
                    <div class="chart-header"><div class="chart-title">Kênh thanh toán</div></div>
                    <div style="height: 250px; display:flex; justify-content:center;"><canvas id="methodChart"></canvas></div>
                </div>

                <div class="chart-box">
                    <div class="chart-header"><div class="chart-title">Top Giảng Viên</div></div>
                    <div class="top-list" id="top_teachers_list">
                        <p style="color:#999; text-align:center; padding-top:20px;">Đang tải...</p>
                    </div>
                </div>
            </div>

        </main>
    </div>
    
    <div id="reportModal" class="modal">
        <div class="modal-content" style="width: 800px; max-width: 95%;">
            <div class="modal-header">
                <h3 id="report_modal_title">Chi Tiết Báo Cáo</h3>
                <span class="close-btn" onclick="closeModal('reportModal')">&times;</span>
            </div>
            <div class="modal-body-scroll">
                <table class="report-table">
                    <thead id="report_table_head">
                        </thead>
                    <tbody id="report_table_body">
                        </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" onclick="closeModal('reportModal')">Đóng</button>
            </div>
        </div>
    </div>
    <?php include 'modal.php'?>
</body>
</html>