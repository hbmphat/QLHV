document.addEventListener("DOMContentLoaded", function () {

    const currentPath = window.location.pathname.split("/").pop();
    const navItems = document.querySelectorAll('.nav-item');
    const filterStatus = document.getElementById('filter_status');
    const filterAssign = document.getElementById('filter_assign');
    const searchInput = document.querySelector('input[name="search"]');
    const cards = document.querySelectorAll('.teacher-card');

    function filterTeachers() {
        const sStatus = filterStatus ? filterStatus.value : '';
        const sAssign = filterAssign ? filterAssign.value : '';
        const sText = searchInput ? searchInput.value.toLowerCase() : '';

        cards.forEach(card => {
            const dStatus = card.getAttribute('data-status');
            const dAssign = card.getAttribute('data-assign');
            const dContent = card.innerText.toLowerCase();

            let isShow = true;
            if (sStatus && dStatus !== sStatus) isShow = false;
            if (sAssign && dAssign !== sAssign) isShow = false;
            if (sText && !dContent.includes(sText)) isShow = false;

            card.style.display = isShow ? 'flex' : 'none';
        });
    }

    if(filterStatus) filterStatus.addEventListener('change', filterTeachers);
    if(filterAssign) filterAssign.addEventListener('change', filterTeachers);
    if(searchInput) searchInput.addEventListener('input', filterTeachers);

    navItems.forEach(item => {
        item.classList.remove('active');
        const href = item.getAttribute('href');

        if (href && (currentPath.includes(href) || (currentPath === '' && href === '1_dashboad.php'))) {
            item.classList.add('active');
        }
    });

    //tìm kiếm nhanh
    const teacherCards = document.querySelectorAll('.teacher-card');

    if (searchInput) {
        searchInput.addEventListener('input', function (e) {
            const keyword = e.target.value.toLowerCase().trim();

            teacherCards.forEach(card => {
                const name = card.querySelector('h3')?.textContent.toLowerCase() || '';
                const code = card.querySelector('.t-code')?.textContent.toLowerCase() || '';

                if (name.includes(keyword) || code.includes(keyword)) {
                    card.style.display = 'flex';
                } else {
                    card.style.display = 'none';
                }
            });
        });

        searchInput.closest('form').addEventListener('submit', function (e) {
            e.preventDefault();
        });
    }

    const alertBox = document.querySelector('.alert-box');
    if (alertBox) {
        setTimeout(() => {
            alertBox.classList.add('hide');
            setTimeout(() => alertBox.remove(), 500);
        }, 5000);
    }

    window.openModal = function (id) {
        const modal = document.getElementById(id);
        if (modal) {
            modal.style.display = 'flex';
            setTimeout(() => modal.classList.add('show'), 10);
        }
    }

    window.closeModal = function (id) {
        const modal = document.getElementById(id);
        if (modal) {
            modal.classList.remove('show');
            setTimeout(() => modal.style.display = 'none', 300);
        }
    }

    window.openEditModal = function (data) {

        if (document.getElementById('e_id')) document.getElementById('e_id').value = data.id;
        if (document.getElementById('e_name')) document.getElementById('e_name').value = data.full_name;
        if (document.getElementById('e_phone')) document.getElementById('e_phone').value = data.phone;
        if (document.getElementById('e_email')) document.getElementById('e_email').value = data.email;
        if (document.getElementById('e_spec')) document.getElementById('e_spec').value = data.specialty;
        if (document.getElementById('e_status')) document.getElementById('e_status').value = data.status;

        if (document.getElementById('e_uni')) document.getElementById('e_uni').value = data.university || '';
        if (document.getElementById('e_exp')) document.getElementById('e_exp').value = data.experience || '';
        if (document.getElementById('e_pc')) document.getElementById('e_pc').value = data.p_c || '';

        openModal('editModalGV');
    }

    // click ngoài đóng modal
    window.onclick = function (event) {
        if (event.target.classList.contains('modal')) {
            event.target.classList.remove('show');
            setTimeout(() => event.target.style.display = 'none', 300);
        }
    }
    //xuất file pdf
    window.exportTeacherList = function() {
        window.location.href = '../api/api_export_teacher.php';
    }
});