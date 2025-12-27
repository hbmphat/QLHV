document.addEventListener("DOMContentLoaded", function() {
    
    const alertBox = document.querySelector('.alert-box');
    if (alertBox) {
        setTimeout(() => {
            alertBox.classList.add('hide'); 
            setTimeout(() => {
                alertBox.remove(); 
            }, 500); 
        }, 5000); 
    }
    //tạo tên lớp
    const formAdd = document.getElementById('form-add-class');
    const formEdit = document.getElementById('form-edit-class');

    function updatePreviewName(form) {
        const selLevel = form.querySelector('select[name="level_id"]');
        const selShift = form.querySelector('select[name="shift_id"]');
        const selTeacher = form.querySelector('select[name="teacher_id"]');
        const previewBox = form.querySelector('.preview-name');

        if (!selLevel || !selShift || !selTeacher || !previewBox) return;

        const levelText = selLevel.options[selLevel.selectedIndex]?.text || 'Level';
        const shiftText = selShift.options[selShift.selectedIndex]?.getAttribute('data-name') || 'Ca';
        
        const teacherOption = selTeacher.options[selTeacher.selectedIndex];
        const teacherCode = teacherOption?.getAttribute('data-code') || 'GV';
        const teacherGender = teacherOption?.getAttribute('data-gender') || 'Nu';
        const prefix = (teacherGender === 'Nam') ? 'Mr.' : 'Ms.';

        const finalName = `${levelText} - ${shiftText} - ${prefix}${teacherCode}`;
        previewBox.innerText = finalName;
    }

    [formAdd, formEdit].forEach(form => {
        if(form) {
            const selects = form.querySelectorAll('select');
            selects.forEach(sel => {
                sel.addEventListener('change', () => updatePreviewName(form));
            });
        }
    });

    window.openEditClassModal = function(data) {
        if(document.getElementById('e_id')) document.getElementById('e_id').value = data.id;
        if(document.getElementById('e_level')) document.getElementById('e_level').value = data.level_id;
        if(document.getElementById('e_shift')) document.getElementById('e_shift').value = data.shift_id;
        if(document.getElementById('e_room')) document.getElementById('e_room').value = data.room_id;
        if(document.getElementById('e_teacher')) document.getElementById('e_teacher').value = data.teacher_id;
        if(document.getElementById('e_start')) document.getElementById('e_start').value = data.start_date;
        if(document.getElementById('e_status')) document.getElementById('e_status').value = data.status;

        updatePreviewName(document.getElementById('form-edit-class'));
        openModal('editModalLop'); 
    }

    const filterShift = document.getElementById('filter_shift');
    const filterTeacher = document.getElementById('filter_teacher');
    const searchInput = document.querySelector('input[name="search"]');
    const cards = document.querySelectorAll('.class-card');

    function filterClasses() {
        const sShift = filterShift ? filterShift.value : '';
        const sTeacher = filterTeacher ? filterTeacher.value : '';
        const sText = searchInput ? searchInput.value.toLowerCase().trim() : '';

        cards.forEach(card => {
            const dShift = card.getAttribute('data-shift');
            const dTeacher = card.getAttribute('data-teacher');
            const dContent = card.innerText.toLowerCase(); 

            let isShow = true;
            if (sShift && dShift !== sShift) isShow = false;
            if (sTeacher && dTeacher !== sTeacher) isShow = false;
            if (sText && !dContent.includes(sText)) isShow = false;

            card.style.display = isShow ? 'flex' : 'none';
        });
    }

    if(filterShift) filterShift.addEventListener('change', filterClasses);
    if(filterTeacher) filterTeacher.addEventListener('change', filterClasses);
    
    if(searchInput) {
        searchInput.addEventListener('input', filterClasses);
        searchInput.closest('form').addEventListener('submit', (e) => e.preventDefault());
    }
    //logic xem danh sách
    window.openClassStudentsModal = function(classId, className) {
        document.getElementById('class-title-preview').innerText = "Danh sách: " + className;
        const tbody = document.getElementById('student-list-body');
        
        tbody.innerHTML = `<tr><td colspan="5" style="text-align:center; padding:30px;"><div class="loader"></div><p style="margin-top:10px; color:#666;">Đang tải danh sách...</p></td></tr>`;

        openModal('studentsModal');

        fetch('../api/api_get_class_student.php?id=' + classId)
            .then(res => res.text())
            .then(html => {
                setTimeout(() => { tbody.innerHTML = html; }, 300);
            })
            .catch(err => {
                console.error(err);
                tbody.innerHTML = '<tr><td colspan="5" style="text-align:center; color:red;">Lỗi tải dữ liệu!</td></tr>';
            });
    }

    //logic thêm học viên
    window.openAddStudentToClassModal = function(preSelectClassId = null) {
        const classSelect = document.getElementById('asc_class');
        const studentSelect = document.getElementById('asc_student');
        
        if(studentSelect) studentSelect.value = "";
        if(classSelect) classSelect.value = preSelectClassId || "";

        openModal('addStudentToClassModal');
    }

    //xuất file
    window.openExportModal = function() {
        openModal('exportModal');
    }

    window.triggerExport = function() {
        const classId = document.getElementById('export_class_id').value;
        if (classId) {
            window.location.href = '../api/api_export_class.php?id=' + classId;
            setTimeout(() => closeModal('exportModal'), 500);
        }
    }

    //quản lý phòng học
    window.openRoomModal = function() {
        openModal('roomModal');
    }

    const checkRoomBtn = document.getElementById('btn-check-room');
    if(checkRoomBtn) {
        checkRoomBtn.addEventListener('click', function() {
            const shiftId = document.getElementById('check_shift_id').value;
            const resultBox = document.getElementById('room-check-result');
            
            if(!shiftId) return alert("Vui lòng chọn ca học!");

            resultBox.innerHTML = '<div class="loader"></div>';

            fetch('../api/api_check_room.php?shift_id=' + shiftId)
                .then(res => res.json())
                .then(data => {
                    let html = '<table class="room-table"><thead><tr><th>Phòng</th><th>Trạng thái</th><th>Tình trạng</th></tr></thead><tbody>';
                    
                    data.forEach(r => {
                        let statusHtml = '';
                        if(r.status === 'bao_tri') {
                            statusHtml = '<span class="r-status rs-bao_tri">Bảo trì</span>';
                        } else if(r.is_busy) {
                            statusHtml = `<span class="r-status rs-busy">Đang học: ${r.class_using}</span>`;
                        } else {
                            statusHtml = '<span class="r-status rs-san_sang">Trống</span>';
                        }

                        html += `<tr>
                            <td><strong>${r.name}</strong></td>
                            <td>${r.status === 'san_sang' ? 'Sẵn sàng' : 'Đang hỏng'}</td>
                            <td>${statusHtml}</td>
                        </tr>`;
                    });
                    
                    html += '</tbody></table>';
                    resultBox.innerHTML = html;
                })
                .catch(err => {
                    console.error(err);
                    resultBox.innerHTML = '<p style="color:red">Lỗi tra cứu!</p>';
                });
        });
    }

    window.editRoom = function(id, name, status, note) {
        document.getElementById('r_action').value = 'edit_room';
        document.getElementById('r_id').value = id;
        document.getElementById('r_name').value = name;
        document.getElementById('r_status').value = status;
        document.getElementById('r_note').value = note;
        document.getElementById('btn-save-room').innerHTML = "Cập nhật";
        document.getElementById('form-title-room').innerText = "Sửa phòng: " + name;
    }

    window.resetRoomForm = function() {
        document.getElementById('r_action').value = 'add_room';
        document.getElementById('r_id').value = '';
        document.getElementById('r_name').value = '';
        document.getElementById('r_status').value = 'san_sang';
        document.getElementById('r_note').value = '';
        document.getElementById('btn-save-room').innerHTML = "Thêm mới";
        document.getElementById('form-title-room').innerText = "Thêm Phòng Mới";
    }
});