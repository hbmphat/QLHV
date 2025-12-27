document.addEventListener("DOMContentLoaded", function () {
    const alertBox = document.querySelector('.alert-box');
    if (alertBox) {
        setTimeout(() => {
            alertBox.classList.add('hide');
            setTimeout(() => {
                alertBox.remove();
            }, 500);
        }, 5000);
    }
    //lọc
    const filterClass = document.getElementById('filter_class');
    const filterLevel = document.getElementById('filter_level');
    const filterStatus = document.getElementById('filter_status');
    const searchInput = document.querySelector('input[name="search"]');
    const cards = document.querySelectorAll('.student-card');

    function filterStudents() {
        const sClass = filterClass ? filterClass.value.toLowerCase() : '';
        const sLevel = filterLevel ? filterLevel.value.toLowerCase() : '';
        const sStatus = filterStatus ? filterStatus.value.toLowerCase() : '';
        const sText = searchInput ? searchInput.value.toLowerCase() : '';

        cards.forEach(card => {
            const dClass = card.getAttribute('data-class').toLowerCase();
            const dLevel = card.getAttribute('data-level').toLowerCase();
            const dStatus = card.getAttribute('data-status').toLowerCase();
            const dContent = card.innerText.toLowerCase(); // Tìm trong toàn bộ text thẻ

            let isShow = true;

            if (sClass && !dClass.includes(sClass)) isShow = false;
            if (sLevel && dLevel !== sLevel) isShow = false;
            if (sStatus && dStatus !== sStatus) isShow = false;
            if (sText && !dContent.includes(sText)) isShow = false;

            card.style.display = isShow ? 'flex' : 'none';
        });
    }

    if (filterClass) filterClass.addEventListener('change', filterStudents);
    if (filterLevel) filterLevel.addEventListener('change', filterStudents);
    if (filterStatus) filterStatus.addEventListener('change', filterStudents);
    if (searchInput) searchInput.addEventListener('input', filterStudents);

    window.openEditStudentModal = function (data) {
        if (document.getElementById('hv_id')) document.getElementById('hv_id').value = data.id;
        if (document.getElementById('hv_name')) document.getElementById('hv_name').value = data.full_name;
        if (document.getElementById('hv_dob')) document.getElementById('hv_dob').value = data.dob;
        if (document.getElementById('hv_gender')) document.getElementById('hv_gender').value = data.gender;
        if (document.getElementById('hv_phone')) document.getElementById('hv_phone').value = data.phone;
        if (document.getElementById('hv_parent_phone')) document.getElementById('hv_parent_phone').value = data.parent_phone;
        if (document.getElementById('hv_address')) document.getElementById('hv_address').value = data.address;
        if(document.getElementById('e_join_date')) {
            document.getElementById('e_join_date').value = data.join_date;
        }
        if (document.getElementById('hv_status')) document.getElementById('hv_status').value = data.learning_status;

        //dữ liệu khuyến mãi
        if (document.getElementById('hv_promo')) {
            document.getElementById('hv_promo').value = data.promotion_id || '';
        }
        openModal('editModalHV');
    }

        //xuất file
        window.exportStudentList = function () {
            window.location.href = '../api/api_export_student.php';
        }
    });