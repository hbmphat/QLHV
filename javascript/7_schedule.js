document.addEventListener("DOMContentLoaded", function() {
    
    const filterRoom = document.getElementById('filter_room');
    const filterTeacher = document.getElementById('filter_teacher');
    const classItems = document.querySelectorAll('.class-item');

    function filterSchedule() {
        const roomId = filterRoom.value;
        const teacherId = filterTeacher.value;

        classItems.forEach(item => {
            const itemRoom = item.getAttribute('data-room');
            const itemTeacher = item.getAttribute('data-teacher');
            
            let isShow = true;
            if (roomId && itemRoom !== roomId) isShow = false;
            if (teacherId && itemTeacher !== teacherId) isShow = false;

            item.style.display = isShow ? 'block' : 'none';
        });
    }

    if(filterRoom) filterRoom.addEventListener('change', filterSchedule);
    if(filterTeacher) filterTeacher.addEventListener('change', filterSchedule);

    //xuất pdf
    window.exportSchedulePDF = function() {
        const roomId = filterRoom ? filterRoom.value : '';
        const teacherId = filterTeacher ? filterTeacher.value : '';
        
        let url = '../api/api_export_schedule.php?';
        if (roomId) url += 'room=' + roomId + '&';
        if (teacherId) url += 'teacher=' + teacherId;

        window.location.href = url;
    }
});