document.addEventListener("DOMContentLoaded", function() {
    const ctxRevenue = document.getElementById('revenueChart');
    const ctxStudent = document.getElementById('studentChart');
    const ctxPie = document.getElementById('levelPieChart');
    const ctxMethod = document.getElementById('methodChart');
    const filterYear = document.getElementById('filter_year');

    let chartRev, chartStd, chartPie, chartMethod;

    function loadStats() {
        fetch('../api/api_report.php?type=overview')
            .then(res => res.json())
            .then(data => {
                const fmt = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' });
                animateValue('stat_revenue', 0, data.revenue_month, 1000, fmt);
                animateValue('stat_new_std', 0, data.new_students_month, 1000);
                animateValue('stat_active_std', 0, data.active_students, 1000);
                animateValue('stat_debt', 0, data.debt_count, 1000);
            });
    }

    function loadTopTeachers() {
        fetch('../api/api_report.php?type=top_teachers')
            .then(res => res.json())
            .then(data => {
                const list = document.getElementById('top_teachers_list');
                let html = '';
                data.forEach((t, index) => {
                    const avatar = t.avatar ? `uploads/${t.avatar}` : 'style/images/default.png';
                    html += `
                        <div class="top-item">
                            <div class="top-rank">#${index + 1}</div>
                            <img src="${avatar}" class="top-avatar" onerror="this.src='https://ui-avatars.com/api/?name=${t.full_name}'">
                            <div class="top-info">
                                <div class="top-name">${t.full_name}</div>
                                <div class="top-detail">${t.class_count} lớp - ${t.total_students} học viên</div>
                            </div>
                        </div>
                    `;
                });
                list.innerHTML = html || '<p class="text-center">Chưa có dữ liệu</p>';
            });
    }

    function loadCharts(year) {
        fetch(`../api/api_report.php?type=chart_data&year=${year}`)
            .then(res => res.json())
            .then(data => {
                //doanh thu chart
                if(chartRev) chartRev.destroy();
                chartRev = new Chart(ctxRevenue, {
                    type: 'line',
                    data: {
                        labels: data.months,
                        datasets: [{
                            label: 'Doanh thu',
                            data: data.revenue,
                            borderColor: '#10b981', backgroundColor: 'rgba(16, 185, 129, 0.1)',
                            borderWidth: 3, tension: 0.4, fill: true
                        }]
                    },
                    options: { responsive: true, maintainAspectRatio: false }
                });

                //hv chart
                if(chartStd) chartStd.destroy();
                chartStd = new Chart(ctxStudent, {
                    type: 'bar',
                    data: {
                        labels: data.months,
                        datasets: [{ label: 'Học viên mới', data: data.students, backgroundColor: '#3b82f6', borderRadius: 4 }]
                    },
                    options: { responsive: true, maintainAspectRatio: false }
                });

                //doanh thu theo level
                if(chartPie) chartPie.destroy();
                const pieLabels = data.revenue_by_level.map(item => item.level_name);
                const pieVals = data.revenue_by_level.map(item => item.total);
                chartPie = new Chart(ctxPie, {
                    type: 'pie',
                    data: {
                        labels: pieLabels,
                        datasets: [{ data: pieVals, backgroundColor: ['#3b82f6', '#10b981', '#f59e0b', '#ef4444', '#8b5cf6'] }]
                    },
                    options: { responsive: true, maintainAspectRatio: false }
                });

                //thanh toán
                if(chartMethod) chartMethod.destroy();
                const methodMap = {'tien_mat': 'Tiền mặt', 'chuyen_khoan': 'CK', 'vietqr': 'VietQR'};
                const mLabels = data.payment_methods.map(item => methodMap[item.payment_method] || item.payment_method);
                const mVals = data.payment_methods.map(item => item.count);
                chartMethod = new Chart(ctxMethod, {
                    type: 'doughnut',
                    data: {
                        labels: mLabels,
                        datasets: [{ data: mVals, backgroundColor: ['#0ea5e9', '#6366f1', '#ec4899'] }]
                    },
                    options: { responsive: true, maintainAspectRatio: false }
                });
            });
    }

    function animateValue(id, start, end, duration, formatter=null) {
        const obj = document.getElementById(id);
        if(!obj) return;
        let startTimestamp = null;
        const step = (timestamp) => {
            if (!startTimestamp) startTimestamp = timestamp;
            const progress = Math.min((timestamp - startTimestamp) / duration, 1);
            const value = Math.floor(progress * (end - start) + start);
            obj.innerHTML = formatter ? formatter.format(value) : value;
            if (progress < 1) window.requestAnimationFrame(step);
        };
        window.requestAnimationFrame(step);
    }

    loadStats();
    loadTopTeachers();
    loadCharts(new Date().getFullYear());

    if(filterYear) {
        filterYear.addEventListener('change', function() { loadCharts(this.value); });
    }
    //xem chi tiết
    window.openDetailModal = function(type) {
        let modalId, apiType, tableBodyId, title;
        
        if (type === 'revenue') {
            modalId = 'reportModal'; 
            apiType = 'revenue_list'; 
            title = 'Chi tiết Doanh Thu Tháng Này';
        } else if (type === 'new_student') {
            modalId = 'reportModal'; 
            apiType = 'new_students_list'; 
            title = 'Học Viên Mới Tháng Này';
        } else if (type === 'active_student') {
            modalId = 'reportModal'; 
            apiType = 'active_students_list'; 
            title = 'Danh Sách Đang Học';
        } else if (type === 'debt') {
            modalId = 'reportModal'; 
            apiType = 'debt_students_list'; 
            title = 'Danh Sách Cần Đóng Phí';
        }

        document.getElementById('report_modal_title').innerText = title;
        const thead = document.getElementById('report_table_head');
        const tbody = document.getElementById('report_table_body');
        
        if (type === 'revenue') {
            thead.innerHTML = `<tr><th>Ngày</th><th>Học viên</th><th>Lớp</th><th>Số tiền</th></tr>`;
        } else if (type === 'debt') {
            thead.innerHTML = `<tr><th>Học viên</th><th>Lớp</th><th>Hạn đóng</th><th>Trạng thái</th></tr>`;
        } else {
            thead.innerHTML = `<tr><th>Học viên</th><th>SĐT</th><th>Lớp</th><th>Trạng thái</th></tr>`;
        }

        tbody.innerHTML = '<tr><td colspan="4" style="text-align:center; padding:30px;"><div class="loader"></div><p style="color:#666;">Đang tải...</p></td></tr>';
        
        openModal('reportModal');

        //api
        fetch(`../api/api_report.php?type=${apiType}`)
            .then(res => res.json())
            .then(data => {
                let html = '';
                if(data.length === 0) {
                    html = '<tr><td colspan="4" style="text-align:center; padding:20px; color:#999;">Không có dữ liệu.</td></tr>';
                } else {
                    data.forEach(row => {
                        if(type === 'revenue') {
                            const date = new Date(row.payment_date).toLocaleDateString('vi-VN');
                            const money = new Intl.NumberFormat('vi-VN').format(row.final_amount);
                            html += `<tr><td>${date}</td><td><b>${row.full_name}</b></td><td>${row.class_name}</td><td style="color:#10b981; font-weight:bold;">+${money} đ</td></tr>`;
                        } 
                        else if (type === 'debt') {
                            const date = row.end_study_date ? new Date(row.end_study_date).toLocaleDateString('vi-VN') : 'Chưa đóng';
                            const stClass = row.status === 'het_han' ? 'st-danger' : 'st-warning';
                            const stText = row.status === 'het_han' ? 'Quá hạn' : 'Chưa đóng';
                            html += `<tr><td><b>${row.full_name}</b><br><small>${row.phone}</small></td><td>${row.class_name}</td><td style="color:#ef4444;">${date}</td><td><span class="status-badge ${stClass}">${stText}</span></td></tr>`;
                        }
                        else {
                            const info2 = row.class_name || row.join_date || '';
                            const statusBadge = type==='new_student' ? '<span class="status-badge st-success">Mới</span>' : '<span class="status-badge st-info">Đang học</span>';
                            html += `<tr><td><b>${row.full_name}</b></td><td>${row.phone}</td><td>${info2}</td><td>${statusBadge}</td></tr>`;
                        }
                    });
                }
                tbody.innerHTML = html;
            })
            .catch(err => console.error(err));
    }
    
});