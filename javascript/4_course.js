document.addEventListener("DOMContentLoaded", function() {
    
    //lọc
    const searchInput = document.querySelector('input[name="search"]');
    const cards = document.querySelectorAll('.course-card');
    
    if (searchInput) {
        searchInput.addEventListener('input', function(e) {
            const txt = e.target.value.toLowerCase();
            cards.forEach(card => {
                const content = card.innerText.toLowerCase();
                card.style.display = content.includes(txt) ? 'flex' : 'none';
            });
        });
        searchInput.closest('form').addEventListener('submit', (e) => e.preventDefault());
    }
    const filterLevel = document.getElementById('filter_level');
    
    function filterCourses() {
        const sId = filterLevel ? filterLevel.value : '';
        const sText = searchInput ? searchInput.value.toLowerCase().trim() : '';

        cards.forEach(card => {
            const dId = card.getAttribute('data-id');
            const dContent = card.innerText.toLowerCase();

            let isShow = true;

            //lọc 
            if (sId && dId !== sId) isShow = false;

            //từ khoá
            if (sText && !dContent.includes(sText)) isShow = false;

            card.style.display = isShow ? 'flex' : 'none';
        });
    }

    if (filterLevel) filterLevel.addEventListener('change', filterCourses);
    
    if (searchInput) {
        searchInput.addEventListener('input', filterCourses);
        searchInput.closest('form').addEventListener('submit', (e) => e.preventDefault());
    }

    window.openLevelModal = function(isEdit, data = null) {
        if (isEdit && data) {
            document.getElementById('lvl_action').value = 'edit_level';
            document.getElementById('lvl_id').value = data.id;
            document.getElementById('lvl_name').value = data.level_name;
            document.getElementById('lvl_duration').value = data.course_duration || '5-6 tháng';
            document.getElementById('lvl_desc').value = data.description;
            document.getElementById('lvl_modal_title').innerText = "Cập Nhật Cấp Độ";
            document.getElementById('lvl_btn_submit').innerText = "Lưu thay đổi";
        } else {
            document.getElementById('lvl_action').value = 'add_level';
            document.getElementById('lvl_id').value = '';
            document.getElementById('lvl_name').value = '';
            ocument.getElementById('lvl_duration').value = '5-6 tháng';
            document.getElementById('lvl_desc').value = '';
            document.getElementById('lvl_modal_title').innerText = "Thêm Cấp Độ Mới";
            document.getElementById('lvl_btn_submit').innerText = "Tạo mới";
        }
        openModal('levelModal');
    }

    //gói học phí
    window.openPackageModal = function(levelId, levelName, isEdit, data = null) {
    
        document.getElementById('pkg_level_id').value = levelId;
        document.getElementById('pkg_level_name').value = levelName;

        if (isEdit && data) {
            document.getElementById('pkg_action').value = 'edit_package';
            document.getElementById('pkg_id').value = data.id;
            document.getElementById('pkg_weeks').value = data.week_duration;
            document.getElementById('pkg_sessions').value = data.sessions_per_week;
            document.getElementById('pkg_fee').value = data.tuition_fee;
            document.getElementById('pkg_modal_title').innerText = "Sửa Gói Học Phí";
        } else {
            document.getElementById('pkg_action').value = 'add_package';
            document.getElementById('pkg_id').value = '';
            document.getElementById('pkg_weeks').value = '12';
            document.getElementById('pkg_sessions').value = '3';
            document.getElementById('pkg_fee').value = '';
            document.getElementById('pkg_modal_title').innerText = "Thêm Gói Học Phí";
        }
        openModal('packageModal');
    }

    const alertBox = document.querySelector('.alert-box');
    if (alertBox) setTimeout(() => { alertBox.classList.add('hide'); setTimeout(() => alertBox.remove(), 500); }, 5000);
});