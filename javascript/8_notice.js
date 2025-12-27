document.addEventListener("DOMContentLoaded", function() {
    
    const targetType = document.getElementById('targetType');
    const boxStudent = document.getElementById('box-student');
    const boxClass = document.getElementById('box-class');
    const boxTeacher = document.getElementById('box-teacher');
    
    const selStudent = document.getElementById('selStudent');
    const selClass = document.getElementById('selClass');
    const selTeacher = document.getElementById('selTeacher');

    function toggleReceiver() {
        boxStudent.style.display = 'none'; selStudent.disabled = true;
        boxClass.style.display = 'none'; selClass.disabled = true;
        boxTeacher.style.display = 'none'; selTeacher.disabled = true;

        const type = targetType.value;

        if (type === 'student_one') {
            boxStudent.style.display = 'block'; selStudent.disabled = false;
        } else if (type === 'class_all') {
            boxClass.style.display = 'block'; selClass.disabled = false;
        } else if (type === 'teacher_one') {
            boxTeacher.style.display = 'block'; selTeacher.disabled = false;
        }
    }

    if(targetType) {
        targetType.addEventListener('change', toggleReceiver);
        toggleReceiver();
    }

    const alertBox = document.querySelector('.alert-box');
    if (alertBox) {
        setTimeout(() => {
            alertBox.classList.add('hide');
            setTimeout(() => alertBox.remove(), 500);
        }, 5000);
    }

    window.showAlert = function(message) {
        document.getElementById('alert-msg').innerText = message;
        openModal('alertModal');
    }

    window.openConfirmSendModal = function() {
        const type = targetType.value;
        const subject = document.querySelector('input[name="subject"]').value.trim();
        const content = document.querySelector('textarea[name="content"]').value.trim();

        if (!type) { showAlert("Vui lòng chọn nhóm người nhận!"); return; }
        if (!subject) { showAlert("Vui lòng nhập tiêu đề email!"); return; }
        if (!content) { showAlert("Vui lòng nhập nội dung email!"); return; }

        document.getElementById('cf_subject').innerText = `"${subject}"`;

        openModal('confirmSendModal');
    }

    window.submitNoticeForm = function() {
        closeModal('confirmSendModal');
        document.getElementById('form-notice').submit();
    }
});