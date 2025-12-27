<!-- BACKUP -->
<div class="modal-overlay" id="backupModal">
    <div class="modal-box">
        <div id="step-auth">
            <span class="material-symbols-outlined modal-icon" style="color: #f0ad4e;">lock</span>
            <h3 class="modal-title">Xác thực Admin</h3>
            <p class="modal-desc">Vui lòng nhập mật khẩu để tiến hành sao lưu.</p>
            <div class="input-group">
                <input type="password" id="adminPass" class="modal-input" placeholder="Nhập mật khẩu...">
                <div id="msg-auth" class="status-message"></div>
            </div>
            <div class="modal-actions">
                <button class="btn btn-secondary" onclick="closeBackupPopup()">Hủy</button>
                <button class="btn btn-primary" onclick="verifyPassword()">Xác nhận</button>
            </div>
        </div>
        <div id="step-loading" style="display: none;">
            <div class="loader"></div>
            <h3 class="modal-title" style="margin-top: 15px;">Đang sao lưu...</h3>
        </div>
        <div id="step-success" style="display: none;">
            <span class="material-symbols-outlined modal-icon" style="color: #28a745;">check_circle</span>
            <h3 class="modal-title">Thành công!</h3>
            <button class="btn btn-primary" onclick="closeBackupPopup()">Hoàn tất</button>
        </div>
        <div id="step-error" style="display: none;">
            <span class="material-symbols-outlined modal-icon" style="color: #dc3545;">error</span>
            <h3 class="modal-title">Sai mật khẩu!</h3>
            <button class="btn btn-primary" onclick="retryBackup()">Thử lại</button>
        </div>
    </div>
</div>
<!-- ĐỔI MẬT KHẨU -->
<div id="changePassModal" class="modal">
    <div class="modal-content" style="max-width: 450px;">
        <div class="modal-header">
            <h3 style="color: var(--primary-color); margin:0;">Đổi Mật Khẩu</h3>
            <span class="close-btn" onclick="closeChangePassModal()">&times;</span>
        </div>
        <div style="padding-top: 15px;">
            <div class="input-group">
                <label style="font-size:13px; font-weight:600; margin-bottom:5px; display:block;">Mật khẩu cũ (*)</label>
                <input type="password" id="cp_old_pass" class="modal-input" placeholder="Nhập mật khẩu hiện tại">
            </div>
            <div class="input-group">
                <label style="font-size:13px; font-weight:600; margin-bottom:5px; display:block;">Mã Key đăng ký (*)</label>
                <input type="text" id="cp_reg_key" class="modal-input" placeholder="Nhập mã Key">
                <small style="color: var(--text-secondary); font-size: 11px;">Dùng để xác minh bảo mật.</small>
            </div>
            <div class="input-group">
                <label style="font-size:13px; font-weight:600; margin-bottom:5px; display:block;">Mật khẩu mới (*)</label>
                <input type="password" id="cp_new_pass" class="modal-input" placeholder="Nhập mật khẩu mới">
            </div>
        </div>
        <div id="cp-status-msg" style="text-align: center; font-size: 13px; font-weight: 600; min-height: 20px; margin-bottom: 10px; transition: opacity 0.5s;"></div>
        <div class="modal-footer">
            <button class="btn btn-cancel" onclick="closeChangePassModal()">Hủy</button>
            <button class="btn btn-primary" onclick="submitChangePass()">
                <span class="material-symbols-outlined" style="font-size:18px; vertical-align:middle">save</span> Lưu
            </button>
        </div>
    </div>
</div>
<!-- TẠO KEY -->
<div id="genKeyModal" class="modal">
    <div class="modal-content" style="max-width: 450px;">
        <div class="modal-header">
            <h3 style="color: var(--primary-color); margin:0;">Tạo Key Nhân Viên</h3>
            <span class="close-btn" onclick="closeGenKeyModal()">&times;</span>
        </div>
        <div id="gk-step-auth" style="padding-top: 15px;">
            <p style="font-size:13px; color:#666; margin-bottom:15px;">Vui lòng nhập mật khẩu Admin để tạo mã kích hoạt mới.</p>
            <div class="input-group">
                <input type="password" id="gk_admin_pass" class="modal-input" placeholder="Nhập mật khẩu Admin...">
            </div>
            <div class="modal-footer">
                <button class="btn btn-cancel" onclick="closeGenKeyModal()">Hủy</button>
                <button class="btn btn-primary" onclick="submitGenKey()">Tạo Key</button>
            </div>
        </div>
        <div id="gk-step-success" style="display:none; text-align:center; padding-top:10px;">
            <div style="font-size:48px; color:#28a745; margin-bottom:10px;">
                <span class="material-symbols-outlined" style="font-size:48px;">check_circle</span>
            </div>
            <h4 style="margin-bottom:10px; color:#333;">Tạo thành công!</h4>
            <div style="background:#f8f9fa; border:2px dashed var(--primary-color); padding:15px; border-radius:8px; margin-bottom:20px; position:relative;">
                <span id="gk_result_code" style="font-size:24px; font-weight:bold; color:var(--primary-color); letter-spacing: 2px;">NV-XXXXXX</span>
            </div>
            <p style="font-size:12px; color:#666; margin-bottom:20px;">Hãy copy mã này và gửi cho nhân viên mới.</p>
            <div class="modal-footer" style="justify-content:center;">
                <button class="btn btn-secondary" onclick="resetGenKeyModal()">Tạo thêm</button>
                <button class="btn btn-primary" onclick="closeGenKeyModal()">Đóng</button>
            </div>
        </div>
        <div id="gk-msg" style="text-align: center; font-size: 13px; color: #dc3545; margin-top: 10px; min-height:20px;"></div>
    </div>
</div>
<!-- CHAT -->
<div id="chat-widget">
    <div class="chat-box" id="chatBox">
        <div class="chat-header">
            <span>💬 Thảo luận nội bộ</span>
            <span class="material-symbols-outlined" style="cursor:pointer" onclick="toggleChat()">close</span>
        </div>
        <div class="chat-body" id="chatBody">
            <div style="text-align:center; color:#999; margin-top:20px; font-size:12px;">
                <span class="spinner" style="border-color:#ccc; border-top-color:#666;"></span> Đang tải tin nhắn...
            </div>
        </div>
        <div class="chat-footer">
            <input type="text" id="chatMsg" class="chat-input" placeholder="Nhập tin nhắn..." autocomplete="off">
            <button class="chat-send" onclick="sendChat()">
                <span class="material-symbols-outlined" style="font-size:20px; margin-right:0;">send</span>
            </button>
        </div>
    </div>
    <button class="chat-toggle-btn" onclick="toggleChat()">
        <span class="material-symbols-outlined" style="font-size:28px; margin-right:0;">chat</span>
        <span id="chatBadge" class="chat-notification-badge">0</span>
    </button>
</div>
<div id="historyModal" class="modal">
    <div class="modal-content" style="width: 1500px; max-width: 95%; height: 85vh; display: flex; flex-direction: column;">

        <div class="modal-header">
            <h3 style="color: var(--primary-color); margin:0;">Lịch sử hoạt động</h3>
            <span class="close-btn" onclick="closeHistoryModal()">&times;</span>
        </div>

        <div class="filter-bar" style="display: flex; gap: 10px; padding: 10px 0; border-bottom: 1px solid var(--border-color); flex-wrap: wrap;">

            <select id="his_user" class="modal-input" style="width: auto; margin:0; padding: 8px;">
                <option value="">-- Tất cả nhân viên --</option>
                <?php
                // lấy danh sách user để lọc
                try {
                    $stmtUsers = $conn->query("SELECT id, full_name FROM users ORDER BY full_name ASC");
                    while ($u = $stmtUsers->fetch(PDO::FETCH_ASSOC)) {
                        echo '<option value="' . $u['id'] . '">' . $u['full_name'] . '</option>';
                    }
                } catch (Exception $e) {
                }
                ?>
            </select>

            <select id="his_action" class="modal-input" style="width: auto; margin:0; padding: 8px;">
                <option value="">-- Tất cả hành động --</option>
                <option value="LOGIN">Đăng nhập (Auth)</option>
                <optgroup label="Tác động dữ liệu">
                    <option value="_THEM">Thêm mới (Create)</option>
                    <option value="_SUA">Cập nhật (Update)</option>
                    <option value="_XOA">Xóa bỏ (Delete)</option>
                    <option value="_DOI_TRANG_THAI">Đổi trạng thái</option>
                </optgroup>
                <optgroup label="Nhóm chức năng">
                    <option value="HOC_VIEN">Học viên</option>
                    <option value="GIANG_VIEN">Giảng viên</option>
                    <option value="PHONG_HOC">Phòng học</option>
                    <option value="HOC_PHI">Học phí</option>
                </optgroup>
            </select>

            <input type="date" id="his_date_from" class="modal-input" style="width: auto; margin:0; padding: 8px;" title="Từ ngày">
            <span style="align-self: center;">-</span>
            <input type="date" id="his_date_to" class="modal-input" style="width: auto; margin:0; padding: 8px;" title="Đến ngày">

            <button class="btn btn-primary" onclick="loadHistoryData()" style="padding: 8px 15px;">
                <span class="material-symbols-outlined" style="font-size:18px; vertical-align: middle;">filter_list</span> Lọc
            </button>
        </div>

        <div id="history-content" style="flex: 1; overflow-y: auto; margin-top: 10px;">
        </div>

        <div class="modal-footer">
            <button class="btn btn-secondary" onclick="closeHistoryModal()">Đóng</button>
        </div>
    </div>
</div>
<!-- LỚP HỌC -->
<div id="roomModal" class="modal">
    <div class="modal-content" style="width: 900px; max-width: 95%;">
        <div class="modal-header">
            <h3>Quản Lý & Tra Cứu Phòng Học</h3><span class="close-btn" onclick="closeModal('roomModal')">&times;</span>
        </div>
        <div class="modal-body-scroll">
            <div style="display: flex; gap: 30px;">
                <div style="flex: 1;">
                    <h4 style="margin-bottom: 10px; color: var(--primary-color);">🔍 Kiểm tra phòng trống</h4>
                    <div class="filter-room-box">
                        <select id="check_shift_id" class="form-control">
                            <option value="">-- Chọn ca học cần kiểm tra --</option>
                            <?php foreach ($shifts as $s): echo "<option value='{$s['id']}'>{$s['shift_name']} ({$s['days']})</option>";
                            endforeach; ?>
                        </select>
                        <button class="btn btn-primary" id="btn-check-room" style="white-space: nowrap;">Kiểm tra</button>
                    </div>
                    <div id="room-check-result" style="max-height: 300px; overflow-y: auto; border: 1px solid #eee; padding: 10px; border-radius: 8px;">
                        <p style="text-align: center; color: #999; margin-top: 20px;">Kết quả sẽ hiện ở đây...</p>
                    </div>
                </div>

                <div style="flex: 1; border-left: 1px dashed #ddd; padding-left: 30px;">
                    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:10px;">
                        <h4 id="form-title-room" style="margin:0; color: var(--primary-color);">Thêm Phòng Mới</h4>
                        <button class="btn btn-secondary" onclick="resetRoomForm()" style="padding: 5px 10px; font-size: 12px;">Reset</button>
                    </div>

                    <form method="POST">
                        <input type="hidden" name="action" id="r_action" value="add_room">
                        <input type="hidden" name="r_id" id="r_id">

                        <div class="form-group">
                            <label>Tên phòng (*)</label>
                            <input type="text" name="r_name" id="r_name" class="form-control" required placeholder="Vd: P.101">
                        </div>
                        <div class="form-group">
                            <label>Trạng thái</label>
                            <select name="r_status" id="r_status" class="form-control">
                                <option value="san_sang">Sẵn sàng</option>
                                <option value="bao_tri">Đang bảo trì</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Ghi chú</label>
                            <textarea name="r_note" id="r_note" class="form-control" rows="2" placeholder="Vd: Máy lạnh hỏng..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" id="btn-save-room" style="width: 100%;">Thêm mới</button>
                    </form>

                    <hr style="margin: 20px 0; border: 0; border-top: 1px solid #eee;">

                    <h4 style="margin-bottom: 10px;">Danh sách phòng hiện có</h4>
                    <div style="max-height: 200px; overflow-y: auto;">
                        <table class="room-table">
                            <thead>
                                <tr>
                                    <th>Tên</th>
                                    <th>TT</th>
                                    <th>Sửa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($rooms as $r): ?>
                                    <tr>
                                        <td><?php echo $r['room_name']; ?></td>
                                        <td>
                                            <?php if ($r['status'] == 'san_sang') echo '<span class="r-status rs-san_sang">OK</span>';
                                            else echo '<span class="r-status rs-bao_tri">Bảo trì</span>'; ?>
                                        </td>
                                        <td>
                                            <button class="btn-icon btn-edit" style="width:24px; height:24px;"
                                                onclick="editRoom(<?php echo $r['id']; ?>, '<?php echo $r['room_name']; ?>', '<?php echo $r['status']; ?>', '<?php echo htmlspecialchars($r['note'] ?? ''); ?>')">
                                                <span class="material-symbols-outlined" style="font-size:14px;">edit</span>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer"><button class="btn btn-secondary" onclick="closeModal('roomModal')">Đóng</button></div>
    </div>
</div>

<div id="addModalLop" class="modal">
    <div class="modal-content" style="width: 650px;">
        <div class="modal-header">
            <h3>Tạo Lớp Học Mới</h3><span class="close-btn" onclick="closeModal('addModalLop')">&times;</span>
        </div>
        <form method="POST" id="form-add-class"><input type="hidden" name="action" value="add_class">
            <div class="modal-body-scroll">
                <div class="preview-name">-- Tên lớp sẽ hiển thị ở đây --</div>
                <div class="form-row">
                    <div class="form-group"><label>Cấp độ (*)</label><select name="level_id" class="form-control" required><?php foreach ($levels as $l): echo "<option value='{$l['id']}'>{$l['level_name']}</option>";
                                                                                                                            endforeach; ?></select></div>
                    <div class="form-group"><label>Ngày khai giảng</label><input type="date" name="start_date" class="form-control" required value="<?php echo date('Y-m-d'); ?>"></div>
                </div>
                <div class="form-row">
                    <div class="form-group"><label>Ca học (*)</label><select name="shift_id" class="form-control" required><?php foreach ($shifts as $s): echo "<option value='{$s['id']}' data-name='{$s['shift_name']}'>{$s['shift_name']}</option>";
                                                                                                                            endforeach; ?></select></div>
                    <div class="form-group"><label>Phòng học</label><select name="room_id" class="form-control" required><?php foreach ($rooms as $r): echo "<option value='{$r['id']}'>{$r['room_name']}</option>";
                                                                                                                            endforeach; ?></select></div>
                </div>
                <div class="form-group"><label>Giáo viên chủ nhiệm (*)</label><select name="teacher_id" class="form-control" required><?php foreach ($teachers as $t): ?><option value="<?php echo $t['id']; ?>" data-code="<?php echo $t['code_name']; ?>" data-gender="<?php echo $t['gender']; ?>"><?php echo $t['full_name']; ?> (<?php echo $t['code_name']; ?>)</option><?php endforeach; ?></select></div>
            </div>
            <div class="modal-footer"><button type="button" class="btn btn-secondary" onclick="closeModal('addModalLop')">Hủy</button><button type="submit" class="btn btn-primary">Tạo lớp ngay</button></div>
        </form>
    </div>
</div>
<div id="editModalLop" class="modal">
    <div class="modal-content" style="width: 650px;">
        <div class="modal-header">
            <h3>Cập Nhật Lớp Học</h3><span class="close-btn" onclick="closeModal('editModalLop')">&times;</span>
        </div>
        <form method="POST" id="form-edit-class"><input type="hidden" name="action" value="edit_class"><input type="hidden" name="class_id" id="e_id_lop">
            <div class="modal-body-scroll">
                <div class="preview-name">-- Tên lớp mới --</div>
                <div class="form-row">
                    <div class="form-group"><label>Cấp độ</label><select name="level_id" id="e_level" class="form-control" required><?php foreach ($levels as $l): echo "<option value='{$l['id']}'>{$l['level_name']}</option>";
                                                                                                                                    endforeach; ?></select></div>
                    <div class="form-group"><label>Trạng thái</label><select name="status" id="e_status_lop" class="form-control">
                            <option value="1">Đang hoạt động</option>
                            <option value="0">Đã kết thúc</option>
                        </select></div>
                </div>
                <div class="form-row">
                    <div class="form-group"><label>Ca học</label><select name="shift_id" id="e_shift" class="form-control" required><?php foreach ($shifts as $s): echo "<option value='{$s['id']}' data-name='{$s['shift_name']}'>{$s['shift_name']}</option>";
                                                                                                                                    endforeach; ?></select></div>
                    <div class="form-group"><label>Phòng học</label><select name="room_id" id="e_room" class="form-control" required><?php foreach ($rooms as $r): echo "<option value='{$r['id']}'>{$r['room_name']}</option>";
                                                                                                                                        endforeach; ?></select></div>
                </div>
                <div class="form-row">
                    <div class="form-group"><label>Giáo viên</label><select name="teacher_id" id="e_teacher" class="form-control" required><?php foreach ($teachers as $t): ?><option value="<?php echo $t['id']; ?>" data-code="<?php echo $t['code_name']; ?>" data-gender="<?php echo $t['gender']; ?>"><?php echo $t['full_name']; ?></option><?php endforeach; ?></select></div>
                    <div class="form-group"><label>Ngày khai giảng</label><input type="date" name="start_date" id="e_start" class="form-control" required></div>
                </div>
            </div>
            <div class="modal-footer"><button type="button" class="btn btn-secondary" onclick="closeModal('editModalLop')">Hủy</button><button type="submit" class="btn btn-primary">Lưu thay đổi</button></div>
        </form>
    </div>
</div>
<div id="addStudentToClassModal" class="modal">
    <div class="modal-content" style="width: 500px;">
        <div class="modal-header">
            <h3>Xếp Lớp / Ghi Danh</h3><span class="close-btn" onclick="closeModal('addStudentToClassModal')">&times;</span>
        </div>
        <form method="POST"><input type="hidden" name="action" value="add_student_to_class">
            <div class="modal-body-scroll" style="padding: 20px 30px !important;">
                <div class="form-group"><label>Chọn Lớp Học (*)</label><select name="asc_class_id" id="asc_class" class="form-control" required>
                        <option value="">-- Chọn lớp --</option><?php foreach ($classes as $cl): ?><option value="<?php echo $cl['id']; ?>"><?php echo $cl['class_name']; ?> (Sĩ số: <?php echo $cl['student_count']; ?>)</option><?php endforeach; ?>
                    </select></div>
                <div class="form-group"><label>Chọn Học Viên (*)</label><select name="asc_student_id" id="asc_student" class="form-control" required>
                        <option value="">-- Chọn học viên --</option><?php foreach ($students as $st): $isBusy = $st['busy_count'] > 0;
                                                                            $style = $isBusy ? 'color:red;' : 'color:green; font-weight:bold;';
                                                                            $note = $isBusy ? '(Đang học lớp khác)' : '(Trống)'; ?><option value="<?php echo $st['id']; ?>" style="<?php echo $style; ?>"><?php echo $st['full_name']; ?> - <?php echo $note; ?></option><?php endforeach; ?>
                    </select><small style="color:var(--text-secondary);">* Ưu tiên học viên chưa có lớp lên đầu.</small></div>
            </div>
            <div class="modal-footer"><button type="button" class="btn btn-secondary" onclick="closeModal('addStudentToClassModal')">Hủy</button><button type="submit" class="btn btn-primary">Lưu lại</button></div>
        </form>
    </div>
</div>
<div id="exportModal" class="modal">
    <div class="modal-content" style="width: 400px;">
        <div class="modal-header">
            <h3>Xuất Danh Sách Lớp</h3><span class="close-btn" onclick="closeModal('exportModal')">&times;</span>
        </div>
        <div class="modal-body-scroll" style="padding: 30px !important;">
            <p style="margin-bottom: 15px; color: var(--text-secondary);">Chọn lớp cần xuất file PDF:</p>
            <div class="form-group"><select id="export_class_id" class="form-control"><?php foreach ($classes as $cl): ?><option value="<?php echo $cl['id']; ?>"><?php echo $cl['class_name']; ?></option><?php endforeach; ?></select></div>
        </div>
        <div class="modal-footer"><button type="button" class="btn btn-secondary" onclick="closeModal('exportModal')">Đóng</button><button type="button" class="btn btn-primary" onclick="triggerExport()"><span class="material-symbols-outlined" style="font-size:18px;">download</span> Tải về</button></div>
    </div>
</div>
<div id="studentsModal" class="modal">
    <div class="modal-content" style="width: 800px; max-width: 95%;">
        <div class="modal-header">
            <h3 id="class-title-preview" style="color:var(--primary-color);">Danh sách lớp</h3><span class="close-btn" onclick="closeModal('studentsModal')">&times;</span>
        </div>
        <div class="modal-body-scroll">
            <table class="student-list-table">
                <thead>
                    <tr>
                        <th style="width: 50px; text-align:center;">STT</th>
                        <th>Họ và Tên</th>
                        <th>Số điện thoại</th>
                        <th>Ngày sinh</th>
                        <th>Ngày vào lớp</th>
                    </tr>
                </thead>
                <tbody id="student-list-body"></tbody>
            </table>
        </div>
        <div class="modal-footer"><button class="btn btn-secondary" onclick="closeModal('studentsModal')">Đóng</button></div>
    </div>
</div>
<!-- GIẢNG VIÊN -->
<div id="addModalGV" class="modal">
    <div class="modal-content" style="width: 750px; max-width: 95%;">
        <div class="modal-header">
            <h3>Thêm Hồ Sơ Giảng Viên</h3>
            <span class="close-btn" onclick="closeModal('addModalGV')">&times;</span>
        </div>
        <form method="POST" enctype="multipart/form-data"> <input type="hidden" name="action" value="add_teacher">

            <div class="modal-body-scroll">
                <div class="form-row">
                    <div class="form-group">
                        <label>Họ và Tên (*)</label>
                        <input type="text" name="full_name" class="form-control" required placeholder="Nhập tên đầy đủ">
                    </div>
                    <div class="form-group">
                        <label>Ngày sinh</label>
                        <input type="date" name="dob" class="form-control">
                    </div>
                    <div class="form-group" style="flex: 0 0 120px;">
                        <label>Giới tính</label>
                        <select name="gender" class="form-control">
                            <option value="Nam">Nam</option>
                            <option value="Nu">Nữ</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Số điện thoại (*)</label>
                        <input type="text" name="phone" class="form-control" required placeholder="09xxxxxxxx">
                    </div>
                    <div class="form-group">
                        <label>Email (*)</label>
                        <input type="email" name="email" class="form-control" required placeholder="email@example.com">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Trình độ cao nhất</label>
                        <select name="specialty" class="form-control">
                            <option value="Cử Nhân">Cử Nhân</option>
                            <option value="Thạc Sĩ">Thạc Sĩ</option>
                            <option value="Tiến Sĩ">Tiến Sĩ</option>
                            <option value="Khác">Khác</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Trường tốt nghiệp</label>
                        <input type="text" name="university" class="form-control" placeholder="Tên trường ĐH/CĐ">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Kinh nghiệm làm việc</label>
                        <input type="text" name="experience" class="form-control" placeholder="Vd: 3 năm, Mới ra trường...">
                    </div>
                    <div class="form-group">
                        <label>Ảnh hồ sơ</label>
                        <input type="file" name="avatar" class="form-control" accept="image/*">
                    </div>
                </div>

                <div class="form-group">
                    <label>Chứng chỉ chuyên môn (IELTS, TESOL, CELTA...)</label>
                    <textarea name="p_c" class="form-control" rows="2" placeholder="Liệt kê các chứng chỉ nếu có"></textarea>
                </div>
            </div> <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="closeModal('addModalGV')">Hủy</button>
                <button type="submit" class="btn btn-primary">Lưu hồ sơ</button>
            </div>
        </form>
    </div>
</div>

<div id="editModalGV" class="modal">
    <div class="modal-content" style="width: 750px; max-width: 95%;">
        <div class="modal-header">
            <h3>Cập Nhật Hồ Sơ</h3>
            <span class="close-btn" onclick="closeModal('editModalGV')">&times;</span>
        </div>
        <form method="POST" enctype="multipart/form-data" style="padding-top: 10px;">
            <input type="hidden" name="action" value="edit_teacher">
            <input type="hidden" name="teacher_id" id="e_id">
            <div class="modal-body-scroll">
            <div class="form-row">
                <div class="form-group">
                    <label>Họ và Tên</label>
                    <input type="text" name="full_name" id="e_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Trạng thái công việc</label>
                    <select name="status" id="e_status" class="form-control" style="font-weight: bold; color: var(--primary-color);">
                        <option value="dang_day">🟢 Đang giảng dạy</option>
                        <option value="thu_viec">🔵 Thử việc</option>
                        <option value="nghi_phep">🟠 Nghỉ phép</option>
                        <option value="tam_nghi">🟣 Tạm nghỉ</option>
                        <option value="nghi_viec">🔴 Đã nghỉ việc</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Số điện thoại</label>
                    <input type="text" name="phone" id="e_phone" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" id="e_email" class="form-control" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Trình độ</label>
                    <select name="specialty" id="e_spec" class="form-control">
                        <option value="Cử Nhân">Cử Nhân</option>
                        <option value="Thạc Sĩ">Thạc Sĩ</option>
                        <option value="Tiến Sĩ">Tiến Sĩ</option>
                        <option value="Khác">Khác</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Trường đại học</label>
                    <input type="text" name="university" id="e_uni" class="form-control">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Kinh nghiệm</label>
                    <input type="text" name="experience" id="e_exp" class="form-control">
                </div>
                <div class="form-group">
                    <label>Cập nhật ảnh mới</label>
                    <input type="file" name="avatar" class="form-control" accept="image/*">
                    <small style="color: var(--text-secondary);">Để trống nếu không muốn đổi ảnh.</small>
                </div>
            </div>

            <div class="form-group">
                <label>Chứng chỉ chuyên môn</label>
                <textarea name="p_c" id="e_pc" class="form-control" rows="2"></textarea>
            </div>
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="closeModal('editModalGV')">Hủy</button>
                <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
            </div>
        </form>
    </div>
</div>
<!-- HỌC VIÊN -->
<div id="addModalHV" class="modal">
    <div class="modal-content" style="width: 700px;">
        <div class="modal-header">
            <h3>Thêm Học Viên Mới</h3><span class="close-btn" onclick="closeModal('addModalHV')">&times;</span>
        </div>
        <form method="POST" enctype="multipart/form-data">
            <input type="hidden" name="action" value="add_student">
            <div class="modal-body-scroll">
                <div class="form-row">
                    <div class="form-group"><label>Họ và Tên (*)</label><input type="text" name="full_name" class="form-control" required></div>
                    <div class="form-group"><label>Ngày sinh</label><input type="date" name="dob" class="form-control" required></div>
                    <div class="form-group" style="flex:0 0 100px;"><label>Giới tính</label><select name="gender" class="form-control">
                            <option value="Nam">Nam</option>
                            <option value="Nu">Nữ</option>
                        </select></div>
                </div>
                <div class="form-row">
                    <div class="form-group"><label>SĐT Học viên</label><input type="text" name="phone" class="form-control"></div>
                    <div class="form-group"><label>SĐT Phụ huynh (*)</label><input type="text" name="parent_phone" class="form-control" required></div>
                </div>
                <div class="form-group">
                    <label>Ngày tham gia (Nhập học)</label>
                    <input type="date" name="join_date" class="form-control" value="<?php echo date('Y-m-d'); ?>">
                </div>
                <div class="form-group">
                    <label style="color: var(--primary-color);">Khuyến Mãi / Học Bổng</label>
                    <select name="promotion_id" class="form-control">
                        <option value="">-- Không áp dụng --</option>
                        <?php foreach ($promotions as $p): ?>
                            <option value="<?php echo $p['id']; ?>">
                                <?php echo $p['name']; ?> (Giảm <?php echo $p['discount_percent']; ?>%)
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group"><label>Địa chỉ</label><input type="text" name="address" class="form-control"></div>
                <div class="form-group"><label>Ảnh đại diện</label><input type="file" name="avatar" class="form-control"></div>
            </div>
            <div class="modal-footer"><button type="button" class="btn btn-secondary" onclick="closeModal('addModalHV')">Hủy</button><button type="submit" class="btn btn-primary">Lưu lại</button></div>
        </form>
    </div>
</div>

<div id="editModalHV" class="modal">
    <div class="modal-content" style="width: 700px;">
        <div class="modal-header">
            <h3>Cập Nhật Hồ Sơ</h3>
            <span class="close-btn" onclick="closeModal('editModalHV')">&times;</span>
        </div>
        <form method="POST" enctype="multipart/form-data">
            <input type="hidden" name="action" value="edit_student">

            <input type="hidden" name="student_id" id="hv_id">

            <div class="modal-body-scroll">
                <div class="form-row">
                    <div class="form-group">
                        <label>Họ và Tên</label>
                        <input type="text" name="full_name" id="hv_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <select name="status" id="hv_status" class="form-control">
                            <option value="dang_hoc">Đang học</option>
                            <option value="bao_luu">Bảo lưu</option>
                            <option value="da_nghi">Đã nghỉ</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Ngày sinh</label>
                        <input type="date" name="dob" id="hv_dob" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Giới tính</label>
                        <select name="gender" id="hv_gender" class="form-control">
                            <option value="Nam">Nam</option>
                            <option value="Nu">Nữ</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>SĐT Học viên</label>
                        <input type="text" name="phone" id="hv_phone" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>SĐT Phụ huynh</label>
                        <input type="text" name="parent_phone" id="hv_parent_phone" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label>Ngày tham gia</label>
                    <input type="date" name="join_date" id="e_join_date" class="form-control">
                </div>
                <div class="form-group">
                    <label>Khuyến mãi / Học bổng</label>
                    <select name="promotion_id" id="hv_promo" class="form-control">
                        <option value="">-- Không áp dụng --</option>
                        <?php foreach ($promotions as $p): ?>
                            <option value="<?php echo $p['id']; ?>">
                                <?php echo $p['name']; ?> (Giảm <?php echo $p['discount_percent']; ?>%)
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Địa chỉ</label>
                    <input type="text" name="address" id="hv_address" class="form-control">
                </div>

                <div class="form-group">
                    <label>Ảnh mới (Nếu muốn đổi)</label>
                    <input type="file" name="avatar" class="form-control">
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="closeModal('editModalHV')">Hủy</button>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
        </form>
    </div>
</div>
<!-- KHOÁ HỌC -->
<div id="levelModal" class="modal">
    <div class="modal-content" style="width: 500px;">
        <div class="modal-header">
            <h3 id="lvl_modal_title">Thêm Cấp Độ</h3><span class="close-btn" onclick="closeModal('levelModal')">&times;</span>
        </div>
        <form method="POST"><input type="hidden" name="action" id="lvl_action"><input type="hidden" name="level_id" id="lvl_id">
            <div class="modal-body-scroll">
                <div class="form-group"><label>Tên Cấp Độ (*)</label><input type="text" name="level_name" id="lvl_name" class="form-control" required placeholder="Vd: IELTS Foundation"></div>

                <div class="form-group"><label>Thời gian học dự kiến</label><input type="text" name="course_duration" id="lvl_duration" class="form-control" placeholder="Vd: 5-6 tháng"></div>

                <div class="form-group"><label>Mô tả ngắn</label><textarea name="description" id="lvl_desc" class="form-control" rows="2" placeholder="Mô tả mục tiêu đầu ra..."></textarea></div>
            </div>
            <div class="modal-footer"><button type="button" class="btn btn-secondary" onclick="closeModal('levelModal')">Hủy</button><button type="submit" class="btn btn-primary" id="lvl_btn_submit">Lưu lại</button></div>
        </form>
    </div>
</div>

<div id="packageModal" class="modal">
    <div class="modal-content" style="width: 500px;">
        <div class="modal-header">
            <h3 id="pkg_modal_title">Thêm Gói Học Phí</h3><span class="close-btn" onclick="closeModal('packageModal')">&times;</span>
        </div>
        <form method="POST"><input type="hidden" name="action" id="pkg_action"><input type="hidden" name="pkg_id" id="pkg_id"><input type="hidden" name="level_id" id="pkg_level_id">
            <div class="modal-body-scroll">
                <div class="preview-name" style="margin-bottom:20px;">Cấp độ: <input type="text" id="pkg_level_name" readonly style="border:none; background:transparent; font-weight:bold; color:inherit; width:auto; text-align:center;"></div>
                <div class="form-row">
                    <div class="form-group"><label>Thời lượng (Tuần)</label><input type="number" name="weeks" id="pkg_weeks" class="form-control" required min="1" placeholder="Vd: 12"></div>
                    <div class="form-group"><label>Số buổi / tuần</label><input type="number" name="sessions" id="pkg_sessions" class="form-control" required min="1" max="7" value="3"></div>
                </div>
                <div class="form-group"><label>Học phí trọn gói (VND)</label><input type="number" name="fee" id="pkg_fee" class="form-control money-input" required min="0" step="1000" placeholder="Vd: 5000000"></div>
            </div>
            <div class="modal-footer"><button type="button" class="btn btn-secondary" onclick="closeModal('packageModal')">Hủy</button><button type="submit" class="btn btn-primary">Lưu gói</button></div>
        </form>
    </div>
</div>
<!-- THANH TOÁN -->
<div id="paymentModal" class="modal">
    <div class="modal-content" style="width: 600px;">
        <div class="modal-header">
            <h3>Thu Học Phí</h3>
            <span class="close-btn" onclick="closeModal('paymentModal')">&times;</span>
        </div>
        <form method="POST" id="form-pay">
            <input type="hidden" name="action" value="pay">
            <input type="hidden" name="student_id" id="pay_student_id">
            <input type="hidden" name="class_id" id="pay_class_id">
            <input type="hidden" name="original_amount" id="inp_original">
            <input type="hidden" name="discount_amount" id="inp_discount">
            <input type="hidden" name="final_amount" id="inp_final">
            <input type="hidden" name="weeks" id="inp_weeks">
            <input type="hidden" name="payment_method" id="inp_payment_method" value="tien_mat">
            <div class="modal-body-scroll">
                <div style="text-align: center; margin-bottom: 20px;">
                    <p style="font-size: 14px; color: var(--text-secondary);">Đang thu phí cho học viên:</p>
                    <h2 id="disp_student_name" style="color: var(--primary-color); margin: 5px 0;">---</h2>
                </div>
                <div class="form-group">
                    <label>Chọn gói gia hạn (*)</label>
                    <select id="pay_package" class="form-control" required style="font-weight: 600; color: var(--text-main);">
                        <option value="">-- Đang tải dữ liệu... --</option>
                    </select>
                </div>
                <div class="bill-preview">
                    <div class="bill-row">
                        <span>Học phí gốc:</span>
                        <strong id="bill_original">0 đ</strong>
                    </div>
                    <div class="bill-row"><span>Giảm giá <span class="discount-tag" id="disp_promo_name">Không</span>:</span><strong id="bill_discount" style="color:#ef4444;">0 đ</strong></div>
                    <div class="bill-total"><span>Cần thanh toán:</span><span id="bill_final">0 đ</span></div>
                </div>
                <div id="qr-area" style="display:none; text-align:center; margin-top:20px; animation: fadeIn 0.5s;">
                    <div style="background: #fff; padding: 15px; border: 1px solid #ddd; border-radius: 12px; display: inline-block; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                        <img id="qr-image" src="" alt="QR Code" style="width: 250px; height: 250px; display: block;">
                        <p style="margin-top: 10px; font-size: 13px; color: #666;">Quét mã để thanh toán nhanh</p>
                    </div>
                </div>
                <div style="background: #e0f2fe; padding: 10px; border-radius: 8px; display: flex; gap: 10px; align-items: center; color: #0369a1; font-size: 13px; margin-top: 20px;"><span class="material-symbols-outlined">info</span><span id="pay_note">Vui lòng chọn gói học phí để hệ thống tính toán.</span></div>
            </div>
            <div class="modal-footer" style="justify-content: space-between;">
                <button type="button" class="btn-qr-action" onclick="toggleQR()" id="btn-show-qr"><span class="material-symbols-outlined">qr_code_2</span> Hiện QR</button>
                <button type="submit" class="btn btn-primary" onclick="setMethod('tien_mat')"><span class="material-symbols-outlined">payments</span> Thu Tiền Mặt</button>
                <button type="submit" class="btn-qr-confirm" id="btn-confirm-qr" style="display:none;" onclick="setMethod('vietqr')"><span class="material-symbols-outlined">check_circle</span> Đã nhận CK</button>
            </div>
    </div>
    </form>
</div>
</div>
<div id="historyPayModal" class="modal">
    <div class="modal-content" style="width: 800px; max-width: 95%;">
        <div class="modal-header">
            <h3>Lịch Sử Giao Dịch: <span id="his_student_name" style="color: var(--primary-color);"></span></h3><span class="close-btn" onclick="closeModal('historyPayModal')">&times;</span>
        </div>
        <div class="modal-body-scroll" id="history_body" style="padding: 0 !important;"></div>
        <div class="modal-footer"><button type="button" class="btn btn-secondary" onclick="closeModal('historyPayModal')">Đóng</button>
        </div>
    </div>
</div>
<!-- THÔNG BÁO -->
<div id="confirmSendModal" class="modal" style="z-index: 2100;">
    <div class="modal-content" style="width: 400px; text-align: center;">
        <div class="modal-body-scroll" style="padding: 30px !important; overflow: visible;">
            <div style="width: 60px; height: 60px; background: #e0f2fe; color: var(--primary-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px auto;">
                <span class="material-symbols-outlined" style="font-size: 32px;">forward_to_inbox</span>
            </div>
            <h3 style="margin: 0 0 10px 0; color: var(--text-main);">Xác nhận gửi?</h3>
            <p style="color: var(--text-secondary); font-size: 14px; margin-bottom: 20px;">
                Bạn có chắc chắn muốn gửi email này không?
                <br>
                <strong id="cf_subject" style="color: var(--primary-color); display:block; margin-top:5px;"></strong>
            </p>
            <div style="display: flex; gap: 10px; justify-content: center;">
                <button class="btn btn-secondary" onclick="closeModal('confirmSendModal')">Hủy bỏ</button>
                <button class="btn btn-primary" onclick="submitNoticeForm()">
                    <span class="material-symbols-outlined">check</span> Đồng ý gửi
                </button>
            </div>
        </div>
    </div>
</div>
<div id="alertModal" class="modal" style="z-index: 2200;">
    <div class="modal-content" style="width: 400px; text-align: center;">
        <div class="modal-body-scroll" style="padding: 30px !important; overflow: visible;">
            <div style="width: 60px; height: 60px; background: #fee2e2; color: #ef4444; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px auto;">
                <span class="material-symbols-outlined" style="font-size: 32px;">priority_high</span>
            </div>

            <h3 style="margin: 0 0 10px 0; color: var(--text-main);">Thông báo</h3>

            <p id="alert-msg" style="color: var(--text-secondary); font-size: 14px; margin-bottom: 25px;">
                ... </p>

            <button class="btn btn-primary" style="width: 100%; justify-content: center;" onclick="closeModal('alertModal')">
                Đã hiểu
            </button>
        </div>
    </div>
</div>