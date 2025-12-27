document.addEventListener("DOMContentLoaded", function() {
   
    const filterClass = document.getElementById('filter_class');
    const filterStatus = document.getElementById('filter_status');
    const searchInput = document.querySelector('input[name="search"]');
    const cards = document.querySelectorAll('.pay-card');

    function filterCards() {
        const sClass = filterClass.value.toLowerCase();
        const sStatus = filterStatus.value;
        const sText = searchInput.value.toLowerCase();

        cards.forEach(card => {
            const dClass = card.getAttribute('data-class').toLowerCase();
            const dStatus = card.getAttribute('data-status');
            const dName = card.querySelector('h3').innerText.toLowerCase();
            let isShow = true;
            if (sClass && !dClass.includes(sClass)) isShow = false;
            if (sStatus && dStatus !== sStatus) isShow = false;
            if (sText && !dName.includes(sText)) isShow = false;
            card.style.display = isShow ? 'flex' : 'none';
        });
    }
    if(filterClass) filterClass.addEventListener('change', filterCards);
    if(filterStatus) filterStatus.addEventListener('change', filterCards);
    if(searchInput) searchInput.addEventListener('input', filterCards);


    //logic thanh toán
    window.openPayModal = function(studentId, classId, studentName, endDateStr, autoShowQR = false) {
        document.getElementById('pay_student_id').value = studentId;
        document.getElementById('pay_class_id').value = classId;
        document.getElementById('disp_student_name').innerText = studentName;
        
        const pkgSelect = document.getElementById('pay_package');
        pkgSelect.innerHTML = '<option value="">Đang tải gói học phí...</option>';
        resetBillUI();
        
        document.getElementById('qr-area').style.display = 'none';
        document.getElementById('btn-show-qr').style.display = 'flex';
        document.getElementById('btn-confirm-qr').style.display = 'none';

        openModal('paymentModal');

        //gọi api
        fetch(`../api/api_get_tuition_info.php?student_id=${studentId}&class_id=${classId}`)
            .then(res => res.json())
            .then(data => {
                if(data.error) { alert(data.error); return; }

                pkgSelect.innerHTML = '<option value="">-- Chọn gói gia hạn --</option>';
                data.packages.forEach(pkg => {
                    const opt = document.createElement('option');
                    opt.value = pkg.id;
                    opt.text = `${pkg.week_duration} Tuần - ${new Intl.NumberFormat('vi-VN').format(pkg.tuition_fee)} đ`;
                    opt.setAttribute('data-price', pkg.tuition_fee);
                    opt.setAttribute('data-weeks', pkg.week_duration);
                    pkgSelect.appendChild(opt);
                });

                pkgSelect.setAttribute('data-discount-percent', data.promo.percent);
                document.getElementById('disp_promo_name').innerText = data.promo.name + ` (-${data.promo.percent}%)`;

                if(autoShowQR) {
                    if (pkgSelect.options.length > 1) {
                        pkgSelect.selectedIndex = 1;
                        pkgSelect.dispatchEvent(new Event('change'));
                        toggleQR();
                    } else {
                        alert("Học viên này chưa có gói học phí phù hợp để tạo QR!");
                    }
                }
            });
    }

    //tính hp khi chọn gói
    const pkgSelect = document.getElementById('pay_package');
    if(pkgSelect) {
        pkgSelect.addEventListener('change', function() {
            const selected = this.options[this.selectedIndex];
            if(!selected.value) { resetBillUI(); return; }

            const price = parseFloat(selected.getAttribute('data-price'));
            const weeks = parseInt(selected.getAttribute('data-weeks'));
            const discountPercent = parseInt(this.getAttribute('data-discount-percent')) || 0;
            const discountAmount = price * (discountPercent / 100);
            const finalAmount = price - discountAmount;

            document.getElementById('bill_original').innerText = formatMoney(price);
            document.getElementById('bill_discount').innerText = '-' + formatMoney(discountAmount);
            document.getElementById('bill_final').innerText = formatMoney(finalAmount);
            
            document.getElementById('inp_original').value = price;
            document.getElementById('inp_discount').value = discountAmount;
            document.getElementById('inp_final').value = finalAmount;
            document.getElementById('inp_weeks').value = weeks;

            updateQRCode(finalAmount);
        });
    }

    function resetBillUI() {
        document.getElementById('bill_original').innerText = '0 đ';
        document.getElementById('bill_discount').innerText = '0 đ';
        document.getElementById('bill_final').innerText = '0 đ';
        document.getElementById('qr-image').src = "";
    }
    
    function formatMoney(amount) {
        return new Intl.NumberFormat('vi-VN').format(amount) + ' đ';
    }

    //logic vietqr
    window.toggleQR = function() {
        const qrArea = document.getElementById('qr-area');
        const btnShow = document.getElementById('btn-show-qr');
        const btnConfirm = document.getElementById('btn-confirm-qr');
        const finalAmount = document.getElementById('inp_final').value;

        if (!finalAmount || finalAmount == 0) {
            alert("Vui lòng chọn gói học phí trước!");
            return;
        }

        if (qrArea.style.display === 'none') {
            updateQRCode(finalAmount);
            qrArea.style.display = 'block';
            btnShow.style.display = 'none';
            btnConfirm.style.display = 'flex';
        }
    }

    function updateQRCode(amount) {
        const studentName = document.getElementById('disp_student_name').innerText;
        const content = `HP ${removeVietnameseTones(studentName)}`.substring(0, 50);
        const qrUrl = `https://img.vietqr.io/image/${BANK_CONFIG.id}-${BANK_CONFIG.acc}-compact.png?amount=${amount}&addInfo=${encodeURIComponent(content)}&accountName=${encodeURIComponent(BANK_CONFIG.name)}`;
        
        document.getElementById('qr-image').src = qrUrl;
    }
    //set phương thức thanh toán trước khi submit
    window.setMethod = function(method) {
        document.getElementById('inp_payment_method').value = method;
    }
    //bỏ dấu tiếng Việt
    function removeVietnameseTones(str) {
        str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a"); 
        str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e"); 
        str = str.replace(/ì|í|ị|ỉ|ĩ/g,"i"); 
        str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o"); 
        str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u"); 
        str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y"); 
        str = str.replace(/đ/g,"d");
        str = str.replace(/À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ/g, "A");
        str = str.replace(/È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ/g, "E");
        str = str.replace(/Ì|Í|Ị|Ỉ|Ĩ/g, "I");
        str = str.replace(/Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ/g, "O");
        str = str.replace(/Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ/g, "U");
        str = str.replace(/Ỳ|Ý|Ỵ|Ỷ|Ỹ/g, "Y");
        str = str.replace(/Đ/g, "D");
        return str;
    }

    //history
    window.openHistoryPayModal = function(studentId, studentName) {
        document.getElementById('his_student_name').innerText = studentName;
        const body = document.getElementById('history_body');
        body.innerHTML = '<div class="loader"></div>';
        openModal('historyPayModal');
        fetch(`../api/api_get_payment_history.php?student_id=${studentId}`).then(res=>res.text()).then(html=>{body.innerHTML=html;});
    }
    const alertBox = document.querySelector('.alert-box');
    if (alertBox) setTimeout(() => { alertBox.classList.add('hide'); setTimeout(() => alertBox.remove(), 500); }, 5000);
});