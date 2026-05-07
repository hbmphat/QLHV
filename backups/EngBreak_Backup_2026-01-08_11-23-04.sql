

CREATE TABLE `activity_logs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `action_type` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=196 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO activity_logs VALUES('5', '3', 'LOGIN', 'Huỳnh Lâm Chí Dũng (LOGIN): Đăng nhập vào hệ thống', '2025-11-29 07:36:51');
INSERT INTO activity_logs VALUES('6', '3', 'LOGIN_FAIL', 'Huỳnh Lâm Chí Dũng (LOGIN_FAIL): Sai mật khẩu hoặc tài khoản: chidung', '2025-11-29 07:37:18');
INSERT INTO activity_logs VALUES('7', '0', 'LOGIN_FAIL', 'Khách (LOGIN_FAIL): Sai mật khẩu hoặc tài khoản: caphe', '2025-11-29 07:37:54');
INSERT INTO activity_logs VALUES('8', '5', 'LOGIN_FAIL', 'Chấn Kiệt (LOGIN_FAIL): Sai mật khẩu hoặc tài khoản: chankiet', '2025-11-29 07:38:14');
INSERT INTO activity_logs VALUES('9', '5', 'LOGIN', 'Chấn Kiệt (LOGIN): Đăng nhập vào hệ thống', '2025-11-29 07:38:20');
INSERT INTO activity_logs VALUES('10', '0', 'GIANG_VIEN_SUA', 'Trạng thái thay đổi: dang_day -> tam_nghi', '2025-11-29 10:38:32');
INSERT INTO activity_logs VALUES('11', '0', 'GIANG_VIEN_SUA', 'Trạng thái thay đổi: dang_day -> nghi_phep', '2025-11-29 10:38:47');
INSERT INTO activity_logs VALUES('12', '0', 'GIANG_VIEN_SUA', 'Trạng thái thay đổi: nghi_phep -> thu_viec', '2025-11-29 10:38:57');
INSERT INTO activity_logs VALUES('13', '0', 'GIANG_VIEN_SUA', 'Trạng thái thay đổi: dang_day -> nghi_viec', '2025-11-29 10:39:08');
INSERT INTO activity_logs VALUES('14', '0', 'GIANG_VIEN_SUA', 'Trạng thái thay đổi: dang_day -> nghi_phep', '2025-11-29 10:39:27');
INSERT INTO activity_logs VALUES('15', '0', 'GIANG_VIEN_SUA', 'Trạng thái thay đổi: dang_day -> nghi_phep', '2025-11-29 10:40:01');
INSERT INTO activity_logs VALUES('16', '0', 'GIANG_VIEN_SUA', 'Trạng thái thay đổi: dang_day -> tam_nghi', '2025-11-29 10:40:19');
INSERT INTO activity_logs VALUES('17', '3', 'LOGIN', 'Huỳnh Lâm Chí Dũng (LOGIN): Đăng nhập vào hệ thống', '2025-11-29 10:53:26');
INSERT INTO activity_logs VALUES('18', '2', 'LOGIN', 'Huỳnh Bảo Minh Phát (LOGIN): Đăng nhập vào hệ thống', '2025-11-29 10:56:18');
INSERT INTO activity_logs VALUES('19', '3', 'LOGIN', 'Huỳnh Lâm Chí Dũng (LOGIN): Đăng nhập vào hệ thống', '2025-11-29 11:18:31');
INSERT INTO activity_logs VALUES('20', '2', 'LOGIN', 'Huỳnh Bảo Minh Phát (LOGIN): Đăng nhập vào hệ thống', '2025-11-29 18:19:59');
INSERT INTO activity_logs VALUES('21', '2', 'LOGIN', 'Huỳnh Bảo Minh Phát (LOGIN): Đăng nhập vào hệ thống', '2025-11-29 18:45:28');
INSERT INTO activity_logs VALUES('22', '3', 'LOGIN', 'Huỳnh Lâm Chí Dũng (LOGIN): Đăng nhập vào hệ thống', '2025-11-29 18:45:57');
INSERT INTO activity_logs VALUES('23', '2', 'LOGIN', 'Huỳnh Bảo Minh Phát (LOGIN): Đăng nhập vào hệ thống', '2025-11-29 22:13:43');
INSERT INTO activity_logs VALUES('24', '3', 'LOGIN', 'Huỳnh Lâm Chí Dũng (LOGIN): Đăng nhập vào hệ thống', '2025-11-30 06:42:38');
INSERT INTO activity_logs VALUES('25', '0', 'GIANG_VIEN_SUA', 'Trạng thái thay đổi: thu_viec -> dang_day', '2025-11-30 06:49:36');
INSERT INTO activity_logs VALUES('26', '3', 'GIANG_VIEN_SUA', 'Cập nhật hồ sơ giảng viên: Trần Hoài Nam', '2025-11-30 06:49:36');
INSERT INTO activity_logs VALUES('27', '3', 'GIANG_VIEN_THEM', 'Thêm hồ sơ giảng viên: Lâm Gia Linh', '2025-11-30 06:53:45');
INSERT INTO activity_logs VALUES('28', '3', 'GIANG_VIEN_SUA', 'Cập nhật hồ sơ giảng viên: Lâm Gia Linh', '2025-11-30 06:54:23');
INSERT INTO activity_logs VALUES('29', '3', 'GIANG_VIEN_SUA', 'Cập nhật hồ sơ giảng viên: Vũ Thị Lan Anh', '2025-11-30 06:54:43');
INSERT INTO activity_logs VALUES('30', '3', 'GIANG_VIEN_SUA', 'Cập nhật hồ sơ giảng viên: Trần Hoài Nam', '2025-11-30 06:55:03');
INSERT INTO activity_logs VALUES('31', '2', 'LOGIN', 'Huỳnh Bảo Minh Phát (LOGIN): Đăng nhập vào hệ thống', '2025-11-30 07:24:48');
INSERT INTO activity_logs VALUES('32', '2', 'LOGIN', 'Huỳnh Bảo Minh Phát (LOGIN): Đăng nhập vào hệ thống', '2025-11-30 07:48:02');
INSERT INTO activity_logs VALUES('33', '2', 'LOGIN', 'Huỳnh Bảo Minh Phát (LOGIN): Đăng nhập vào hệ thống', '2025-11-30 10:03:09');
INSERT INTO activity_logs VALUES('34', '2', 'LOGIN_FAIL', 'Huỳnh Bảo Minh Phát (LOGIN_FAIL): Sai mật khẩu hoặc tài khoản: admin', '2025-11-30 10:15:27');
INSERT INTO activity_logs VALUES('35', '2', 'LOGIN_FAIL', 'Huỳnh Bảo Minh Phát (LOGIN_FAIL): Sai mật khẩu hoặc tài khoản: admin', '2025-11-30 10:15:31');
INSERT INTO activity_logs VALUES('36', '2', 'LOGIN', 'Huỳnh Bảo Minh Phát (LOGIN): Đăng nhập vào hệ thống', '2025-11-30 10:15:34');
INSERT INTO activity_logs VALUES('37', '2', '', 'Huỳnh Bảo Minh Phát (): Đổi mật khẩu thành công', '2025-11-30 10:25:14');
INSERT INTO activity_logs VALUES('38', '2', 'LOGIN_FAIL', 'Huỳnh Bảo Minh Phát (LOGIN_FAIL): Sai mật khẩu hoặc tài khoản: admin', '2025-11-30 10:25:23');
INSERT INTO activity_logs VALUES('39', '2', '', 'Huỳnh Bảo Minh Phát (): Khôi phục mật khẩu bằng Key cũ', '2025-11-30 10:25:40');
INSERT INTO activity_logs VALUES('40', '2', 'LOGIN', 'Huỳnh Bảo Minh Phát (LOGIN): Đăng nhập vào hệ thống', '2025-11-30 10:25:45');
INSERT INTO activity_logs VALUES('41', '2', '', 'Huỳnh Bảo Minh Phát (): Đổi mật khẩu thành công', '2025-11-30 10:27:21');
INSERT INTO activity_logs VALUES('42', '2', 'LOGIN', 'Huỳnh Bảo Minh Phát (LOGIN): Đăng nhập vào hệ thống', '2025-11-30 10:27:29');
INSERT INTO activity_logs VALUES('43', '0', 'GIANG_VIEN_SUA', 'Trạng thái thay đổi: tam_nghi -> nghi_phep', '2025-11-30 11:05:58');
INSERT INTO activity_logs VALUES('44', '2', 'GIANG_VIEN_SUA', 'Cập nhật hồ sơ giảng viên: Đặng Thùy Dương', '2025-11-30 11:05:58');
INSERT INTO activity_logs VALUES('45', '2', 'GIANG_VIEN_SUA', 'Cập nhật hồ sơ giảng viên: Đặng Thùy Dương', '2025-11-30 11:08:14');
INSERT INTO activity_logs VALUES('46', '2', 'LOGIN_FAIL', 'Huỳnh Bảo Minh Phát (LOGIN_FAIL): Sai mật khẩu hoặc tài khoản: admin', '2025-11-30 16:59:58');
INSERT INTO activity_logs VALUES('47', '2', 'LOGIN_FAIL', 'Huỳnh Bảo Minh Phát (LOGIN_FAIL): Sai mật khẩu hoặc tài khoản: admin', '2025-11-30 17:00:05');
INSERT INTO activity_logs VALUES('48', '2', 'LOGIN_FAIL', 'Huỳnh Bảo Minh Phát (LOGIN_FAIL): Sai mật khẩu hoặc tài khoản: admin', '2025-11-30 17:00:10');
INSERT INTO activity_logs VALUES('49', '2', 'LOGIN_FAIL', 'Huỳnh Bảo Minh Phát (LOGIN_FAIL): Sai mật khẩu hoặc tài khoản: admin', '2025-11-30 17:00:13');
INSERT INTO activity_logs VALUES('50', '2', 'LOGIN_FAIL', 'Huỳnh Bảo Minh Phát (LOGIN_FAIL): Sai mật khẩu hoặc tài khoản: admin', '2025-11-30 17:00:14');
INSERT INTO activity_logs VALUES('51', '2', 'LOGIN_FAIL', 'Huỳnh Bảo Minh Phát (LOGIN_FAIL): Sai mật khẩu hoặc tài khoản: admin', '2025-11-30 17:00:16');
INSERT INTO activity_logs VALUES('52', '2', '', 'Huỳnh Bảo Minh Phát (): Khôi phục mật khẩu bằng Key cũ', '2025-11-30 17:00:25');
INSERT INTO activity_logs VALUES('53', '2', 'LOGIN', 'Huỳnh Bảo Minh Phát (LOGIN): Đăng nhập vào hệ thống', '2025-11-30 17:00:30');
INSERT INTO activity_logs VALUES('54', '2', 'LOGIN', 'Huỳnh Bảo Minh Phát (LOGIN): Đăng nhập vào hệ thống', '2025-11-30 19:22:59');
INSERT INTO activity_logs VALUES('55', '2', 'LOP_HOC_THEM', 'Tạo lớp: Pre-Ielts - Ca 1 (2-4-6) - Mr.Minh', '2025-11-30 19:49:14');
INSERT INTO activity_logs VALUES('56', '0', 'PHONG_HOC_DOI_TRANG_THAI', 'Phòng P.402: san_sang -> bao_tri', '2025-11-30 20:00:52');
INSERT INTO activity_logs VALUES('57', '2', 'PHONG_HOC_SUA', 'Cập nhật phòng: P.402', '2025-11-30 20:00:52');
INSERT INTO activity_logs VALUES('58', '2', 'PHONG_HOC_SUA', 'Cập nhật thông tin phòng: P.402', '2025-11-30 20:06:10');
INSERT INTO activity_logs VALUES('59', '2', 'PHONG_HOC_DOI_TRANG_THAI', 'Đổi trạng thái phòng P.402: Bảo trì -> Sẵn sàng', '2025-11-30 20:06:10');
INSERT INTO activity_logs VALUES('60', '2', 'LOP_HOC_THEM', 'Tạo lớp: Ielts 4 - Ca 1 (2-4-6) - Mr.Lâm', '2025-11-30 20:07:07');
INSERT INTO activity_logs VALUES('61', '2', 'GIANG_VIEN_THEM', 'Thêm hồ sơ giảng viên: Bùi Trần Nhật Quang', '2025-11-30 20:09:21');
INSERT INTO activity_logs VALUES('62', '2', 'LOP_HOC_THEM', 'Tạo lớp: Toeic 1 - Ca 1 (T7-CN) - Ms.Linh', '2025-11-30 20:11:38');
INSERT INTO activity_logs VALUES('63', '2', 'HOC_VIEN_SUA', 'Cập nhật hồ sơ: Tạ Bích Loan', '2025-11-30 20:54:24');
INSERT INTO activity_logs VALUES('64', '2', 'HOC_VIEN_SUA', 'Cập nhật hồ sơ: Tạ Bích Loan', '2025-11-30 20:57:04');
INSERT INTO activity_logs VALUES('65', '2', 'HOC_VIEN_SUA', 'Cập nhật hồ sơ: Tạ Bích Loan', '2025-11-30 21:09:50');
INSERT INTO activity_logs VALUES('66', '2', 'HOC_VIEN_SUA', 'Cập nhật hồ sơ: Tạ Bích Loan', '2025-11-30 21:10:58');
INSERT INTO activity_logs VALUES('67', '2', 'LOGIN', 'Huỳnh Bảo Minh Phát (LOGIN): Đăng nhập vào hệ thống', '2025-11-30 22:51:49');
INSERT INTO activity_logs VALUES('68', '2', 'LOGIN', 'Huỳnh Bảo Minh Phát (LOGIN): Đăng nhập vào hệ thống', '2025-12-02 18:08:41');
INSERT INTO activity_logs VALUES('69', '3', 'LOGIN', 'Huỳnh Lâm Chí Dũng (LOGIN): Đăng nhập vào hệ thống', '2025-12-02 18:11:17');
INSERT INTO activity_logs VALUES('70', '2', 'LOGIN', 'Huỳnh Bảo Minh Phát (LOGIN): Đăng nhập vào hệ thống', '2025-12-02 18:22:58');
INSERT INTO activity_logs VALUES('71', '2', 'HOC_VIEN_SUA', 'Cập nhật hồ sơ: Tạ Bích Loan', '2025-12-02 18:23:47');
INSERT INTO activity_logs VALUES('72', '2', 'HOC_VIEN_SUA', 'Cập nhật hồ sơ: Quách Ngọc Ngoan', '2025-12-02 18:23:55');
INSERT INTO activity_logs VALUES('73', '2', 'HOC_VIEN_SUA', 'Cập nhật hồ sơ: Lương Thùy Linh', '2025-12-02 18:23:59');
INSERT INTO activity_logs VALUES('74', '2', 'HOC_VIEN_SUA', 'Cập nhật hồ sơ: Đinh Văn Lâm', '2025-12-02 18:24:04');
INSERT INTO activity_logs VALUES('75', '2', 'HOC_VIEN_SUA', 'Cập nhật hồ sơ: Võ Thị Bích', '2025-12-02 18:24:08');
INSERT INTO activity_logs VALUES('76', '2', 'HOC_VIEN_SUA', 'Cập nhật hồ sơ: Mai Thị Tuyết', '2025-12-02 18:24:13');
INSERT INTO activity_logs VALUES('77', '2', 'HOC_VIEN_SUA', 'Cập nhật hồ sơ: Lý Văn Cường', '2025-12-02 18:24:17');
INSERT INTO activity_logs VALUES('78', '2', 'HOC_VIEN_SUA', 'Cập nhật hồ sơ: Hồ Thị Thu', '2025-12-02 18:24:31');
INSERT INTO activity_logs VALUES('79', '2', 'HOC_VIEN_SUA', 'Cập nhật hồ sơ: Ngô Phương Linh', '2025-12-02 18:24:37');
INSERT INTO activity_logs VALUES('80', '2', 'LOGIN', 'Huỳnh Bảo Minh Phát (LOGIN): Đăng nhập vào hệ thống', '2025-12-02 18:49:26');
INSERT INTO activity_logs VALUES('81', '2', 'HOC_VIEN_THEM', 'Thêm học viên: Tạ Minh Hậu', '2025-12-02 18:50:37');
INSERT INTO activity_logs VALUES('82', '2', 'HOC_VIEN_SUA', 'Cập nhật hồ sơ: Tạ Minh Hậu', '2025-12-02 18:50:54');
INSERT INTO activity_logs VALUES('83', '2', 'LOGIN', 'Huỳnh Bảo Minh Phát (LOGIN): Đăng nhập vào hệ thống', '2025-12-02 22:05:13');
INSERT INTO activity_logs VALUES('84', '2', 'LOP_HOC_THEM', 'Tạo lớp: Early - Ca 2 (T7-CN) - Ms.Thảo', '2025-12-02 22:33:57');
INSERT INTO activity_logs VALUES('85', '2', 'LOP_HOC_THEM_HV', 'Thêm học viên Tạ Minh Hậu', '2025-12-02 22:49:50');
INSERT INTO activity_logs VALUES('86', '2', 'HOC_PHI_', 'Thu 1800000 VNĐ của Nguyễn Văn An (8 tuần)', '2025-12-02 23:39:52');
INSERT INTO activity_logs VALUES('87', '2', 'HOC_PHI_', 'Thu 1800000 VNĐ của Nguyễn Văn An (8 tuần)', '2025-12-02 23:40:42');
INSERT INTO activity_logs VALUES('88', '2', 'HOC_PHI_', 'Thu 9405000 VNĐ của Tạ Minh Hậu (16 tuần)', '2025-12-02 23:40:55');
INSERT INTO activity_logs VALUES('89', '2', 'HOC_PHI_', 'Thu 3600000 VNĐ của Trần Thị Bích (8 tuần)', '2025-12-02 23:41:02');
INSERT INTO activity_logs VALUES('90', '2', 'HOC_PHI_', 'Thu 3600000 VNĐ của Lê Hoàng Nam (8 tuần)', '2025-12-02 23:41:05');
INSERT INTO activity_logs VALUES('91', '2', 'HOC_PHI_', 'Thu 1800000 VNĐ của Phạm Minh Khôi (8 tuần)', '2025-12-02 23:41:08');
INSERT INTO activity_logs VALUES('92', '2', 'HOC_PHI_', 'Thu 2700000 VNĐ của Nguyễn Thị Mai (8 tuần)', '2025-12-02 23:41:11');
INSERT INTO activity_logs VALUES('93', '2', 'HOC_PHI_', 'Thu 0 VNĐ của Hoàng Văn Long (8 tuần)', '2025-12-02 23:41:14');
INSERT INTO activity_logs VALUES('94', '2', 'HOC_PHI_', 'Thu 0 VNĐ của Hoàng Văn Long (8 tuần)', '2025-12-02 23:41:41');
INSERT INTO activity_logs VALUES('95', '2', 'HOC_PHI_', 'Thu 2800000 VNĐ của Nguyễn Bảo Ngọc (8 tuần)', '2025-12-02 23:41:50');
INSERT INTO activity_logs VALUES('96', '2', 'HOC_PHI_', 'Thu 3600000 VNĐ của Đoàn Thu Hà (8 tuần)', '2025-12-02 23:41:54');
INSERT INTO activity_logs VALUES('97', '2', 'HOC_PHI_', 'Thu 3420000 VNĐ của Vũ Đức Thắng (16 tuần)', '2025-12-02 23:41:57');
INSERT INTO activity_logs VALUES('98', '2', 'HOC_PHI_', 'Thu 6840000 VNĐ của Ngô Bảo Châu (16 tuần)', '2025-12-02 23:42:00');
INSERT INTO activity_logs VALUES('99', '2', 'HOC_PHI_', 'Thu 5130000 VNĐ của Lý Hải Đăng (16 tuần)', '2025-12-02 23:42:04');
INSERT INTO activity_logs VALUES('100', '2', 'HOC_PHI_', 'Thu 2800000 VNĐ của Trần Minh Khôi (8 tuần)', '2025-12-02 23:42:07');
INSERT INTO activity_logs VALUES('101', '2', 'HOC_PHI_', 'Thu 4000000 VNĐ của Lê Gia Hân (8 tuần)', '2025-12-02 23:42:10');
INSERT INTO activity_logs VALUES('102', '2', 'HOC_PHI_', 'Thu 2090000 VNĐ của Phạm Đức Anh (8 tuần)', '2025-12-02 23:42:12');
INSERT INTO activity_logs VALUES('103', '2', 'HOC_PHI_', 'Thu 2800000 VNĐ của Hoàng Yến Nhi (8 tuần)', '2025-12-02 23:42:16');
INSERT INTO activity_logs VALUES('104', '2', 'HOC_PHI_', 'Thu 4000000 VNĐ của Vũ Tuấn Kiệt (8 tuần)', '2025-12-02 23:42:19');
INSERT INTO activity_logs VALUES('105', '2', 'HOC_PHI_', 'Thu 2800000 VNĐ của Đặng Minh Châu (8 tuần)', '2025-12-02 23:42:21');
INSERT INTO activity_logs VALUES('106', '2', 'HOC_PHI_', 'Thu 2200000 VNĐ của Bùi Tiến Dũng (8 tuần)', '2025-12-02 23:42:24');
INSERT INTO activity_logs VALUES('107', '2', 'HOC_PHI_', 'Thu 2660000 VNĐ của Ngô Phương Linh (8 tuần)', '2025-12-02 23:42:26');
INSERT INTO activity_logs VALUES('108', '2', 'HOC_PHI_', 'Thu 2660000 VNĐ của Dương Văn Hậu (8 tuần)', '2025-12-02 23:42:30');
INSERT INTO activity_logs VALUES('109', '2', 'HOC_PHI_', 'Thu 2660000 VNĐ của Hồ Thị Thu (8 tuần)', '2025-12-02 23:42:32');
INSERT INTO activity_logs VALUES('110', '2', 'HOC_PHI_', 'Thu 2850000 VNĐ của Lý Văn Cường (8 tuần)', '2025-12-02 23:42:35');
INSERT INTO activity_logs VALUES('111', '2', 'HOC_PHI_', 'Thu 1900000 VNĐ của Mai Thị Tuyết (8 tuần)', '2025-12-02 23:42:37');
INSERT INTO activity_logs VALUES('112', '2', 'HOC_PHI_', 'Thu 3600000 VNĐ của Trương Tấn Sang (8 tuần)', '2025-12-02 23:42:41');
INSERT INTO activity_logs VALUES('113', '2', 'HOC_PHI_', 'Thu 1980000 VNĐ của Võ Thị Bích (8 tuần)', '2025-12-02 23:42:44');
INSERT INTO activity_logs VALUES('114', '2', 'HOC_PHI_', 'Thu 2520000 VNĐ của Đinh Văn Lâm (8 tuần)', '2025-12-02 23:42:47');
INSERT INTO activity_logs VALUES('115', '2', 'HOC_PHI_', 'Thu 2850000 VNĐ của Lương Thùy Linh (8 tuần)', '2025-12-02 23:42:50');
INSERT INTO activity_logs VALUES('116', '2', 'HOC_PHI_', 'Thu 2660000 VNĐ của Quách Ngọc Ngoan (8 tuần)', '2025-12-02 23:42:55');
INSERT INTO activity_logs VALUES('117', '2', 'HOC_PHI_', 'Thu 1800000 VNĐ của Tạ Bích Loan (8 tuần)', '2025-12-02 23:42:58');
INSERT INTO activity_logs VALUES('118', '2', 'HOC_PHI_', 'Thu 4000000 VNĐ của Phan Anh Tuấn (8 tuần)', '2025-12-02 23:43:01');
INSERT INTO activity_logs VALUES('119', '2', 'HOC_PHI_', 'Thu 4000000 VNĐ của Phan Anh Tuấn (8 tuần)', '2025-12-02 23:46:42');
INSERT INTO activity_logs VALUES('120', '2', 'HOC_PHI_', 'Thu 4000000 VNĐ của Phan Anh Tuấn (8 tuần)', '2025-12-02 23:56:16');
INSERT INTO activity_logs VALUES('121', '2', 'HOC_PHI_', 'Thu 4000000 VNĐ của Phan Anh Tuấn (8 tuần)', '2025-12-03 00:01:10');
INSERT INTO activity_logs VALUES('122', '2', 'HOC_PHI_', 'Thu 4000000 VNĐ của Phan Anh Tuấn (8 tuần)', '2025-12-03 00:05:33');
INSERT INTO activity_logs VALUES('123', '2', 'HOC_PHI_', 'Thu 4000000 VNĐ của Phan Anh Tuấn (8 tuần)', '2025-12-03 00:06:01');
INSERT INTO activity_logs VALUES('124', '2', 'HOC_PHI_', 'Thu 4000000 VNĐ của Phan Anh Tuấn (8 tuần)', '2025-12-03 00:06:14');
INSERT INTO activity_logs VALUES('125', '2', 'HOC_PHI_', 'Thu 4000000 VNĐ của Phan Anh Tuấn (8 tuần)', '2025-12-03 00:06:36');
INSERT INTO activity_logs VALUES('126', '2', 'HOC_PHI_', 'Thu 4000000 VNĐ của Phan Anh Tuấn (8 tuần)', '2025-12-03 00:06:59');
INSERT INTO activity_logs VALUES('127', '2', 'HOC_PHI_', 'Thu 4000000 đ của Phan Anh Tuấn (8 tuần) qua Tiền mặt', '2025-12-03 00:10:51');
INSERT INTO activity_logs VALUES('128', '2', 'HOC_PHI_', 'Thu 4000000 đ của Phan Anh Tuấn (8 tuần) qua Tiền mặt', '2025-12-03 00:12:09');
INSERT INTO activity_logs VALUES('129', '2', 'HOC_PHI_', 'Thu 3600000 đ của Trần Thị Bích (8 tuần) qua Chuyển khoản QR', '2025-12-03 00:12:30');
INSERT INTO activity_logs VALUES('130', '2', 'HOC_PHI_', 'Thu 3600000 đ của Lê Hoàng Nam (8 tuần) qua Tiền mặt', '2025-12-03 00:24:26');
INSERT INTO activity_logs VALUES('131', '2', 'HOC_PHI_', 'Thu 3600000 đ của Lê Hoàng Nam (8 tuần) qua Tiền mặt', '2025-12-03 00:25:23');
INSERT INTO activity_logs VALUES('132', '2', 'HOC_PHI_', 'Thu 2800000 đ của Nguyễn Bảo Ngọc (8 tuần) qua Chuyển khoản QR', '2025-12-03 00:25:46');
INSERT INTO activity_logs VALUES('133', '6', '', 'Nguyễn Tuấn Huy (): Đăng ký tài khoản mới bằng key: NV-630378', '2025-12-03 14:21:27');
INSERT INTO activity_logs VALUES('134', '6', 'LOGIN', 'Nguyễn Tuấn Huy (LOGIN): Đăng nhập vào hệ thống', '2025-12-03 14:21:35');
INSERT INTO activity_logs VALUES('135', '2', 'LOGIN', 'Huỳnh Bảo Minh Phát (LOGIN): Đăng nhập vào hệ thống', '2025-12-03 14:23:16');
INSERT INTO activity_logs VALUES('136', '2', 'LOGIN', 'Huỳnh Bảo Minh Phát (LOGIN): Đăng nhập vào hệ thống', '2025-12-03 22:31:09');
INSERT INTO activity_logs VALUES('137', '2', 'HOC_PHI_', 'Thu phí Nguyễn Thị Mai (8 tuần): 2700000 đ', '2025-12-03 23:05:19');
INSERT INTO activity_logs VALUES('138', '2', 'HOC_PHI_', 'Thu phí Nguyễn Thị Mai (8 tuần): 2700000 đ', '2025-12-03 23:07:10');
INSERT INTO activity_logs VALUES('139', '2', 'HOC_PHI_', 'Thu phí Phạm Minh Khôi (8 tuần): 1800000 đ', '2025-12-03 23:07:30');
INSERT INTO activity_logs VALUES('140', '2', 'HOC_PHI_', 'Thu phí Đoàn Thu Hà (8 tuần): 3600000 đ', '2025-12-03 23:07:56');
INSERT INTO activity_logs VALUES('141', '2', 'HOC_PHI_', 'Thu phí Quách Ngọc Ngoan (8 tuần): 2660000 đ', '2025-12-03 23:09:00');
INSERT INTO activity_logs VALUES('142', '2', 'LOGIN', 'Huỳnh Bảo Minh Phát (LOGIN): Đăng nhập vào hệ thống', '2025-12-04 11:26:20');
INSERT INTO activity_logs VALUES('143', '2', 'LOGIN', 'Huỳnh Bảo Minh Phát (LOGIN): Đăng nhập vào hệ thống', '2025-12-04 18:10:47');
INSERT INTO activity_logs VALUES('144', '2', 'LOGIN', 'Huỳnh Bảo Minh Phát (LOGIN): Đăng nhập vào hệ thống', '2025-12-05 17:57:41');
INSERT INTO activity_logs VALUES('145', '2', 'HOC_VIEN_SUA', 'Cập nhật hồ sơ: Tạ Minh Hậu', '2025-12-05 17:57:58');
INSERT INTO activity_logs VALUES('146', '2', 'HOC_VIEN_SUA', 'Cập nhật hồ sơ: Tạ Minh Hậu', '2025-12-05 17:58:27');
INSERT INTO activity_logs VALUES('147', '2', 'HOC_VIEN_SUA', 'Cập nhật hồ sơ: Tạ Minh Hậu', '2025-12-05 17:58:41');
INSERT INTO activity_logs VALUES('148', '2', 'HOC_VIEN_SUA', 'Cập nhật hồ sơ: Tạ Minh Hậu', '2025-12-05 17:59:23');
INSERT INTO activity_logs VALUES('149', '2', 'HOC_VIEN_SUA', 'Cập nhật hồ sơ: Tạ Minh Hậu', '2025-12-05 18:00:20');
INSERT INTO activity_logs VALUES('150', '2', 'HOC_VIEN_SUA', 'Cập nhật hồ sơ: Tạ Minh Hậu', '2025-12-05 18:00:35');
INSERT INTO activity_logs VALUES('151', '2', 'LOGIN_FAIL', 'Huỳnh Bảo Minh Phát (LOGIN_FAIL): Sai mật khẩu hoặc tài khoản: admin', '2025-12-05 22:39:23');
INSERT INTO activity_logs VALUES('152', '3', 'LOGIN', 'Huỳnh Lâm Chí Dũng (LOGIN): Đăng nhập vào hệ thống', '2025-12-05 22:40:15');
INSERT INTO activity_logs VALUES('153', '2', 'LOGIN', 'Huỳnh Bảo Minh Phát (LOGIN): Đăng nhập vào hệ thống', '2025-12-05 22:40:26');
INSERT INTO activity_logs VALUES('154', '2', 'LOGIN', 'Huỳnh Bảo Minh Phát (LOGIN): Đăng nhập vào hệ thống', '2025-12-05 23:34:35');
INSERT INTO activity_logs VALUES('155', '3', 'LOGIN', 'Huỳnh Lâm Chí Dũng (LOGIN): Đăng nhập vào hệ thống', '2025-12-06 01:03:44');
INSERT INTO activity_logs VALUES('156', '2', 'LOGIN', 'Huỳnh Bảo Minh Phát (LOGIN): Đăng nhập vào hệ thống', '2025-12-06 01:03:53');
INSERT INTO activity_logs VALUES('157', '2', 'LOGIN', 'Huỳnh Bảo Minh Phát (LOGIN): Đăng nhập vào hệ thống', '2025-12-06 01:31:33');
INSERT INTO activity_logs VALUES('158', '2', 'HOC_PHI_', 'Thu phí Trần Minh Khôi (8 tuần): 2800000 đ', '2025-12-06 02:50:14');
INSERT INTO activity_logs VALUES('159', '2', 'LOGIN', 'Huỳnh Bảo Minh Phát (LOGIN): Đăng nhập vào hệ thống', '2025-12-06 03:24:12');
INSERT INTO activity_logs VALUES('160', '2', 'LOGIN', 'Huỳnh Bảo Minh Phát (LOGIN): Đăng nhập vào hệ thống', '2025-12-06 13:51:30');
INSERT INTO activity_logs VALUES('161', '2', 'HOC_PHI_', 'Thu phí Lê Gia Hân (16 tuần): 7600000 đ', '2025-12-06 14:05:51');
INSERT INTO activity_logs VALUES('162', '2', 'LOGIN', 'Huỳnh Bảo Minh Phát (LOGIN): Đăng nhập vào hệ thống', '2025-12-06 15:34:38');
INSERT INTO activity_logs VALUES('163', '2', 'LOGIN', 'Huỳnh Bảo Minh Phát (LOGIN): Đăng nhập vào hệ thống', '2025-12-06 15:39:34');
INSERT INTO activity_logs VALUES('164', '2', 'LOGIN', 'Huỳnh Bảo Minh Phát (LOGIN): Đăng nhập vào hệ thống', '2025-12-06 15:47:43');
INSERT INTO activity_logs VALUES('165', '2', 'HOC_PHI_', 'Thu phí Phạm Đức Anh (8 tuần): 2090000 đ', '2025-12-06 15:48:01');
INSERT INTO activity_logs VALUES('166', '2', 'HOC_PHI_', 'Thu phí Võ Thị Bích (8 tuần): 1980000 đ', '2025-12-06 15:50:06');
INSERT INTO activity_logs VALUES('167', '2', 'LOGIN', 'Huỳnh Bảo Minh Phát (LOGIN): Đăng nhập vào hệ thống', '2025-12-06 15:58:33');
INSERT INTO activity_logs VALUES('168', '2', 'HOC_VIEN_THEM', 'Thêm học viên: Phát', '2025-12-06 16:00:44');
INSERT INTO activity_logs VALUES('169', '2', 'LOP_HOC_THEM_HV', 'Thêm học viên Phát', '2025-12-06 16:01:13');
INSERT INTO activity_logs VALUES('170', '2', 'HOC_VIEN_SUA', 'Cập nhật hồ sơ: Phát', '2025-12-06 16:19:04');
INSERT INTO activity_logs VALUES('171', '2', 'HOC_VIEN_SUA', 'Cập nhật hồ sơ: Phát', '2025-12-06 16:19:12');
INSERT INTO activity_logs VALUES('172', '2', 'LOGIN', 'Huỳnh Bảo Minh Phát (LOGIN): Đăng nhập vào hệ thống', '2025-12-07 17:05:03');
INSERT INTO activity_logs VALUES('173', '2', 'LOGIN', 'Huỳnh Bảo Minh Phát (LOGIN): Đăng nhập vào hệ thống', '2025-12-09 18:08:12');
INSERT INTO activity_logs VALUES('174', '2', 'HOC_VIEN_THEM', 'Thêm học viên: Phát', '2025-12-09 18:09:41');
INSERT INTO activity_logs VALUES('175', '2', 'LOGIN', 'Huỳnh Bảo Minh Phát (LOGIN): Đăng nhập vào hệ thống', '2025-12-13 09:24:30');
INSERT INTO activity_logs VALUES('176', '2', '', 'Huỳnh Bảo Minh Phát (): Đổi mật khẩu thành công', '2025-12-13 10:15:41');
INSERT INTO activity_logs VALUES('177', '2', 'LOGIN_FAIL', 'Huỳnh Bảo Minh Phát (LOGIN_FAIL): Sai mật khẩu hoặc tài khoản: admin', '2025-12-13 10:15:48');
INSERT INTO activity_logs VALUES('178', '2', 'LOGIN', 'Huỳnh Bảo Minh Phát (LOGIN): Đăng nhập vào hệ thống', '2025-12-13 10:15:52');
INSERT INTO activity_logs VALUES('179', '2', 'LOP_HOC_THEM', 'Tạo lớp: Toeic 1 - Ca 2 (T7-CN) - Mr.Nam', '2025-12-13 10:22:20');
INSERT INTO activity_logs VALUES('180', '2', 'LOGIN_FAIL', 'Huỳnh Bảo Minh Phát (LOGIN_FAIL): Sai mật khẩu hoặc tài khoản: admin', '2025-12-27 23:47:34');
INSERT INTO activity_logs VALUES('181', '2', 'LOGIN', 'Huỳnh Bảo Minh Phát (LOGIN): Đăng nhập vào hệ thống', '2025-12-27 23:47:37');
INSERT INTO activity_logs VALUES('182', '2', 'LOGIN_FAIL', 'Huỳnh Bảo Minh Phát (LOGIN_FAIL): Sai mật khẩu hoặc tài khoản: admin', '2025-12-31 12:36:55');
INSERT INTO activity_logs VALUES('183', '2', 'LOGIN', 'Huỳnh Bảo Minh Phát (LOGIN): Đăng nhập vào hệ thống', '2025-12-31 12:36:58');
INSERT INTO activity_logs VALUES('184', '2', 'LOGIN', 'Huỳnh Bảo Minh Phát (LOGIN): Đăng nhập vào hệ thống', '2026-01-04 10:05:03');
INSERT INTO activity_logs VALUES('185', '2', 'LOGIN', 'Huỳnh Bảo Minh Phát (LOGIN): Đăng nhập vào hệ thống', '2026-01-05 00:21:14');
INSERT INTO activity_logs VALUES('186', '3', 'LOGIN', 'Huỳnh Lâm Chí Dũng (LOGIN): Đăng nhập vào hệ thống', '2026-01-05 00:21:53');
INSERT INTO activity_logs VALUES('187', '2', 'LOGIN', 'Huỳnh Bảo Minh Phát (LOGIN): Đăng nhập vào hệ thống', '2026-01-05 00:22:29');
INSERT INTO activity_logs VALUES('188', '3', 'LOGIN', 'Huỳnh Lâm Chí Dũng (LOGIN): Đăng nhập vào hệ thống', '2026-01-05 00:34:13');
INSERT INTO activity_logs VALUES('189', '2', 'LOGIN', 'Huỳnh Bảo Minh Phát (LOGIN): Đăng nhập vào hệ thống', '2026-01-05 00:34:34');
INSERT INTO activity_logs VALUES('190', '2', 'LOGIN', 'Huỳnh Bảo Minh Phát (LOGIN): Đăng nhập vào hệ thống', '2026-01-05 09:24:44');
INSERT INTO activity_logs VALUES('191', '2', 'LOGIN', 'Huỳnh Bảo Minh Phát (LOGIN): Đăng nhập vào hệ thống', '2026-01-05 14:33:18');
INSERT INTO activity_logs VALUES('192', '2', 'LOGIN', 'Huỳnh Bảo Minh Phát (LOGIN): Đăng nhập vào hệ thống', '2026-01-06 11:02:09');
INSERT INTO activity_logs VALUES('193', '2', 'LOGIN', 'Huỳnh Bảo Minh Phát (LOGIN): Đăng nhập vào hệ thống', '2026-01-08 12:31:14');
INSERT INTO activity_logs VALUES('194', '2', 'LOGIN', 'Huỳnh Bảo Minh Phát (LOGIN): Đăng nhập vào hệ thống', '2026-01-08 17:55:26');
INSERT INTO activity_logs VALUES('195', '2', 'LOGIN', 'Huỳnh Bảo Minh Phát (LOGIN): Đăng nhập vào hệ thống', '2026-01-08 18:16:42');


CREATE TABLE `attendance` (
  `id` int NOT NULL AUTO_INCREMENT,
  `enrollment_id` int DEFAULT NULL,
  `class_id` int DEFAULT NULL,
  `date` date NOT NULL,
  `status` enum('co_mat','vang_phep','vang_khong_phep') COLLATE utf8mb4_general_ci DEFAULT 'co_mat',
  `note` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `enrollment_id` (`enrollment_id`),
  KEY `class_id` (`class_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



CREATE TABLE `auth_logs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `full_name` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `action` enum('LOGIN','LOGOUT','LOGIN_FAIL') COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO auth_logs VALUES('1', '3', 'Huỳnh Lâm Chí Dũng', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2025-11-29 07:36:51');
INSERT INTO auth_logs VALUES('2', '3', 'Huỳnh Lâm Chí Dũng', '::1', 'LOGIN_FAIL', 'Sai mật khẩu hoặc tài khoản: chidung', '2025-11-29 07:37:18');
INSERT INTO auth_logs VALUES('3', '0', 'Khách', '::1', 'LOGIN_FAIL', 'Sai mật khẩu hoặc tài khoản: caphe', '2025-11-29 07:37:54');
INSERT INTO auth_logs VALUES('4', '5', 'Chấn Kiệt', '::1', 'LOGIN_FAIL', 'Sai mật khẩu hoặc tài khoản: chankiet', '2025-11-29 07:38:14');
INSERT INTO auth_logs VALUES('5', '5', 'Chấn Kiệt', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2025-11-29 07:38:20');
INSERT INTO auth_logs VALUES('6', '3', 'Huỳnh Lâm Chí Dũng', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2025-11-29 10:53:26');
INSERT INTO auth_logs VALUES('7', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2025-11-29 10:56:18');
INSERT INTO auth_logs VALUES('8', '3', 'Huỳnh Lâm Chí Dũng', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2025-11-29 11:18:31');
INSERT INTO auth_logs VALUES('9', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2025-11-29 18:19:59');
INSERT INTO auth_logs VALUES('10', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2025-11-29 18:45:28');
INSERT INTO auth_logs VALUES('11', '3', 'Huỳnh Lâm Chí Dũng', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2025-11-29 18:45:57');
INSERT INTO auth_logs VALUES('12', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2025-11-29 22:13:43');
INSERT INTO auth_logs VALUES('13', '3', 'Huỳnh Lâm Chí Dũng', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2025-11-30 06:42:38');
INSERT INTO auth_logs VALUES('14', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2025-11-30 07:24:48');
INSERT INTO auth_logs VALUES('15', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2025-11-30 07:48:02');
INSERT INTO auth_logs VALUES('16', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2025-11-30 10:03:09');
INSERT INTO auth_logs VALUES('17', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN_FAIL', 'Sai mật khẩu hoặc tài khoản: admin', '2025-11-30 10:15:27');
INSERT INTO auth_logs VALUES('18', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN_FAIL', 'Sai mật khẩu hoặc tài khoản: admin', '2025-11-30 10:15:31');
INSERT INTO auth_logs VALUES('19', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2025-11-30 10:15:34');
INSERT INTO auth_logs VALUES('20', '2', 'Huỳnh Bảo Minh Phát', '::1', '', 'Đổi mật khẩu thành công', '2025-11-30 10:25:14');
INSERT INTO auth_logs VALUES('21', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN_FAIL', 'Sai mật khẩu hoặc tài khoản: admin', '2025-11-30 10:25:23');
INSERT INTO auth_logs VALUES('22', '2', 'Huỳnh Bảo Minh Phát', '::1', '', 'Khôi phục mật khẩu bằng Key cũ', '2025-11-30 10:25:40');
INSERT INTO auth_logs VALUES('23', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2025-11-30 10:25:45');
INSERT INTO auth_logs VALUES('24', '2', 'Huỳnh Bảo Minh Phát', '::1', '', 'Đổi mật khẩu thành công', '2025-11-30 10:27:21');
INSERT INTO auth_logs VALUES('25', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2025-11-30 10:27:29');
INSERT INTO auth_logs VALUES('26', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN_FAIL', 'Sai mật khẩu hoặc tài khoản: admin', '2025-11-30 16:59:58');
INSERT INTO auth_logs VALUES('27', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN_FAIL', 'Sai mật khẩu hoặc tài khoản: admin', '2025-11-30 17:00:05');
INSERT INTO auth_logs VALUES('28', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN_FAIL', 'Sai mật khẩu hoặc tài khoản: admin', '2025-11-30 17:00:10');
INSERT INTO auth_logs VALUES('29', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN_FAIL', 'Sai mật khẩu hoặc tài khoản: admin', '2025-11-30 17:00:13');
INSERT INTO auth_logs VALUES('30', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN_FAIL', 'Sai mật khẩu hoặc tài khoản: admin', '2025-11-30 17:00:14');
INSERT INTO auth_logs VALUES('31', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN_FAIL', 'Sai mật khẩu hoặc tài khoản: admin', '2025-11-30 17:00:16');
INSERT INTO auth_logs VALUES('32', '2', 'Huỳnh Bảo Minh Phát', '::1', '', 'Khôi phục mật khẩu bằng Key cũ', '2025-11-30 17:00:25');
INSERT INTO auth_logs VALUES('33', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2025-11-30 17:00:30');
INSERT INTO auth_logs VALUES('34', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2025-11-30 19:22:59');
INSERT INTO auth_logs VALUES('35', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2025-11-30 22:51:49');
INSERT INTO auth_logs VALUES('36', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2025-12-02 18:08:41');
INSERT INTO auth_logs VALUES('37', '3', 'Huỳnh Lâm Chí Dũng', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2025-12-02 18:11:17');
INSERT INTO auth_logs VALUES('38', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2025-12-02 18:22:58');
INSERT INTO auth_logs VALUES('39', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2025-12-02 18:49:26');
INSERT INTO auth_logs VALUES('40', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2025-12-02 22:05:13');
INSERT INTO auth_logs VALUES('41', '6', 'Nguyễn Tuấn Huy', '::1', '', 'Đăng ký tài khoản mới bằng key: NV-630378', '2025-12-03 14:21:27');
INSERT INTO auth_logs VALUES('42', '6', 'Nguyễn Tuấn Huy', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2025-12-03 14:21:35');
INSERT INTO auth_logs VALUES('43', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2025-12-03 14:23:16');
INSERT INTO auth_logs VALUES('44', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2025-12-03 22:31:09');
INSERT INTO auth_logs VALUES('45', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2025-12-04 11:26:20');
INSERT INTO auth_logs VALUES('46', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2025-12-04 18:10:47');
INSERT INTO auth_logs VALUES('47', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2025-12-05 17:57:41');
INSERT INTO auth_logs VALUES('48', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN_FAIL', 'Sai mật khẩu hoặc tài khoản: admin', '2025-12-05 22:39:23');
INSERT INTO auth_logs VALUES('49', '3', 'Huỳnh Lâm Chí Dũng', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2025-12-05 22:40:15');
INSERT INTO auth_logs VALUES('50', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2025-12-05 22:40:26');
INSERT INTO auth_logs VALUES('51', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2025-12-05 23:34:35');
INSERT INTO auth_logs VALUES('52', '3', 'Huỳnh Lâm Chí Dũng', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2025-12-06 01:03:44');
INSERT INTO auth_logs VALUES('53', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2025-12-06 01:03:53');
INSERT INTO auth_logs VALUES('54', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2025-12-06 01:31:33');
INSERT INTO auth_logs VALUES('55', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2025-12-06 03:24:12');
INSERT INTO auth_logs VALUES('56', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2025-12-06 13:51:30');
INSERT INTO auth_logs VALUES('57', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2025-12-06 15:34:38');
INSERT INTO auth_logs VALUES('58', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2025-12-06 15:39:34');
INSERT INTO auth_logs VALUES('59', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2025-12-06 15:47:43');
INSERT INTO auth_logs VALUES('60', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2025-12-06 15:58:33');
INSERT INTO auth_logs VALUES('61', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2025-12-07 17:05:03');
INSERT INTO auth_logs VALUES('62', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2025-12-09 18:08:12');
INSERT INTO auth_logs VALUES('63', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2025-12-13 09:24:30');
INSERT INTO auth_logs VALUES('64', '2', 'Huỳnh Bảo Minh Phát', '::1', '', 'Đổi mật khẩu thành công', '2025-12-13 10:15:41');
INSERT INTO auth_logs VALUES('65', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN_FAIL', 'Sai mật khẩu hoặc tài khoản: admin', '2025-12-13 10:15:48');
INSERT INTO auth_logs VALUES('66', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2025-12-13 10:15:52');
INSERT INTO auth_logs VALUES('67', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN_FAIL', 'Sai mật khẩu hoặc tài khoản: admin', '2025-12-27 23:47:34');
INSERT INTO auth_logs VALUES('68', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2025-12-27 23:47:37');
INSERT INTO auth_logs VALUES('69', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN_FAIL', 'Sai mật khẩu hoặc tài khoản: admin', '2025-12-31 12:36:55');
INSERT INTO auth_logs VALUES('70', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2025-12-31 12:36:58');
INSERT INTO auth_logs VALUES('71', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2026-01-04 10:05:03');
INSERT INTO auth_logs VALUES('72', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2026-01-05 00:21:14');
INSERT INTO auth_logs VALUES('73', '3', 'Huỳnh Lâm Chí Dũng', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2026-01-05 00:21:53');
INSERT INTO auth_logs VALUES('74', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2026-01-05 00:22:29');
INSERT INTO auth_logs VALUES('75', '3', 'Huỳnh Lâm Chí Dũng', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2026-01-05 00:34:13');
INSERT INTO auth_logs VALUES('76', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2026-01-05 00:34:34');
INSERT INTO auth_logs VALUES('77', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2026-01-05 09:24:44');
INSERT INTO auth_logs VALUES('78', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2026-01-05 14:33:18');
INSERT INTO auth_logs VALUES('79', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2026-01-06 11:02:09');
INSERT INTO auth_logs VALUES('80', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2026-01-08 12:31:14');
INSERT INTO auth_logs VALUES('81', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2026-01-08 17:55:26');
INSERT INTO auth_logs VALUES('82', '2', 'Huỳnh Bảo Minh Phát', '::1', 'LOGIN', 'Đăng nhập vào hệ thống', '2026-01-08 18:16:42');


CREATE TABLE `backup_logs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `backup_filename` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO backup_logs VALUES('1', 'EngBreak_Backup_2025-11-29_00-05-27.sql', '2025-11-29 07:05:27', 'Success');
INSERT INTO backup_logs VALUES('2', 'EngBreak_Backup_2025-11-29_00-05-38.sql', '2025-11-29 07:05:38', 'Success');
INSERT INTO backup_logs VALUES('3', 'EngBreak_Backup_2025-11-29_00-07-13.sql', '2025-11-29 07:07:13', 'Success');
INSERT INTO backup_logs VALUES('4', 'EngBreak_Backup_2025-11-29_00-08-12.sql', '2025-11-29 07:08:12', 'Success');
INSERT INTO backup_logs VALUES('5', 'EngBreak_Backup_2025-11-29_00-08-28.sql', '2025-11-29 07:08:28', 'Success');
INSERT INTO backup_logs VALUES('6', 'EngBreak_Backup_2025-11-29_00-08-51.sql', '2025-11-29 07:08:51', 'Success');
INSERT INTO backup_logs VALUES('7', 'EngBreak_Backup_2025-11-30_03-14-44.sql', '2025-11-30 10:14:44', 'Success');
INSERT INTO backup_logs VALUES('8', 'EngBreak_Backup_2025-11-30_12-40-52.sql', '2025-11-30 19:40:52', 'Success');
INSERT INTO backup_logs VALUES('9', 'EngBreak_Backup_2025-12-05_11-06-30.sql', '2025-12-05 18:06:30', 'Success');
INSERT INTO backup_logs VALUES('10', 'EngBreak_Backup_2025-12-05_12-02-25.sql', '2025-12-05 19:02:25', 'Success');
INSERT INTO backup_logs VALUES('11', 'EngBreak_Backup_2025-12-05_12-03-29.sql', '2025-12-05 19:03:29', 'Success');
INSERT INTO backup_logs VALUES('12', 'EngBreak_Backup_2025-12-13_03-15-09.sql', '2025-12-13 10:15:10', 'Success');


CREATE TABLE `chat_messages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO chat_messages VALUES('27', '2', 'hi', '2026-01-05 00:34:07');
INSERT INTO chat_messages VALUES('28', '3', 'chào a', '2026-01-05 00:34:26');
INSERT INTO chat_messages VALUES('29', '2', 'xin chào', '2026-01-08 13:06:32');
INSERT INTO chat_messages VALUES('30', '2', 'hi', '2026-01-08 13:06:40');


CREATE TABLE `class_logs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `record_id` int NOT NULL,
  `actor_id` int NOT NULL,
  `action` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `old_data` json DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `record_id` (`record_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO class_logs VALUES('1', '8', '2', 'THEM', 'Tạo lớp: Pre-Ielts - Ca 1 (2-4-6) - Mr.Minh', '', '2025-11-30 19:49:14');
INSERT INTO class_logs VALUES('2', '9', '2', 'THEM', 'Tạo lớp: Ielts 4 - Ca 1 (2-4-6) - Mr.Lâm', '', '2025-11-30 20:07:07');
INSERT INTO class_logs VALUES('3', '10', '2', 'THEM', 'Tạo lớp: Toeic 1 - Ca 1 (T7-CN) - Ms.Linh', '', '2025-11-30 20:11:38');
INSERT INTO class_logs VALUES('4', '11', '2', 'THEM', 'Tạo lớp: Early - Ca 2 (T7-CN) - Ms.Thảo', '', '2025-12-02 22:33:57');
INSERT INTO class_logs VALUES('5', '9', '2', 'THEM_HV', 'Thêm học viên Tạ Minh Hậu', '', '2025-12-02 22:49:50');
INSERT INTO class_logs VALUES('6', '11', '2', 'THEM_HV', 'Thêm học viên Phát', '', '2025-12-06 16:01:13');
INSERT INTO class_logs VALUES('7', '12', '2', 'THEM', 'Tạo lớp: Toeic 1 - Ca 2 (T7-CN) - Mr.Nam', '', '2025-12-13 10:22:20');


CREATE TABLE `classes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `class_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `level_id` int DEFAULT NULL,
  `package_id` int DEFAULT NULL,
  `teacher_id` int DEFAULT NULL,
  `shift_id` int DEFAULT NULL,
  `room_id` int DEFAULT NULL,
  `schedule_days` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `shift` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `student_count` int DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `teacher_id` (`teacher_id`),
  KEY `package_id` (`package_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO classes VALUES('1', 'Early - Ca 1 (2-4-6) - Ms.Thảo', '5', '', '11', '1', '2', '', '', '2025-12-05', '', '1', '5');
INSERT INTO classes VALUES('3', 'Ielts 1 - Ca 1 (2-4-6) - Mr.Nam', '14', '', '12', '1', '3', '', '', '2025-11-30', '', '1', '8');
INSERT INTO classes VALUES('4', 'Giao tiếp A - Ca 2 (2-4-6) - Mr.Nam', '19', '', '12', '2', '7', '', '', '2025-12-05', '', '1', '5');
INSERT INTO classes VALUES('5', 'Toeic 2 - Ca 1 (3-5-7) - Mr.Hùng', '11', '', '5', '3', '4', '', '', '2025-12-10', '', '1', '5');
INSERT INTO classes VALUES('6', 'Starter - Ca 1 (T7-CN) - Ms.Đảm', '6', '', '3', '4', '1', '', '', '2025-12-02', '', '1', '3');
INSERT INTO classes VALUES('7', 'Pet - Ca 1 (2-4-6) - Mr.Thắng', '9', '', '8', '1', '10', '', '', '2025-12-15', '', '1', '4');
INSERT INTO classes VALUES('8', 'Pre-Ielts - Ca 1 (2-4-6) - Mr.Minh', '13', '', '10', '1', '4', '', '', '2025-11-30', '', '1', '0');
INSERT INTO classes VALUES('9', 'Ielts 4 - Ca 1 (2-4-6) - Mr.Lâm', '17', '', '1', '1', '1', '', '', '2025-11-30', '', '1', '1');
INSERT INTO classes VALUES('10', 'Toeic 1 - Ca 1 (T7-CN) - Ms.Linh', '10', '', '15', '4', '4', '', '', '2025-11-30', '', '1', '0');
INSERT INTO classes VALUES('11', 'Early - Ca 2 (T7-CN) - Ms.Thảo', '5', '', '11', '6', '1', '', '', '2025-12-02', '', '1', '1');
INSERT INTO classes VALUES('12', 'Toeic 1 - Ca 2 (T7-CN) - Mr.Nam', '10', '', '12', '6', '3', '', '', '2025-12-13', '', '1', '0');


CREATE TABLE `email_logs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sender_id` int NOT NULL,
  `recipient_name` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `recipient_email` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_general_ci,
  `status` varchar(50) COLLATE utf8mb4_general_ci DEFAULT 'success',
  `sent_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `sender_id` (`sender_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO email_logs VALUES('1', '2', 'Bùi Tiến Dũng', 'dung.bui@gmail.com', 'thông báo nghỉ học', 'Chào bạn nghỉ nhe', 'success', '2025-12-06 02:26:24');
INSERT INTO email_logs VALUES('2', '2', 'Bùi Phương Thảo', 'thao.bui@engbreak.edu.vn', 'Thông Báo Nghỉ Việc', '2', 'success', '2025-12-06 03:19:11');
INSERT INTO email_logs VALUES('3', '2', 'Bùi Phương Thảo', 'thao.bui@engbreak.edu.vn', 'Thông báo nghỉ học', '2', 'success', '2025-12-06 03:20:19');
INSERT INTO email_logs VALUES('4', '2', 'Bùi Phương Thảo', 'thao.bui@engbreak.edu.vn', 'Thông báo nghỉ học', '2', 'success', '2025-12-06 03:21:37');
INSERT INTO email_logs VALUES('5', '2', 'Bùi Phương Thảo', 'thao.bui@engbreak.edu.vn', 'Thông báo nghỉ học', '2', 'success', '2025-12-06 03:22:26');
INSERT INTO email_logs VALUES('6', '2', 'Bùi Trần Nhật Quang', 'quangbuitrannhat@gmail.com', 'Thông báo nghỉ học', '2', 'success', '2025-12-06 03:25:52');
INSERT INTO email_logs VALUES('7', '2', 'Bùi Trần Nhật Quang', 'quangbuitrannhat@gmail.com', 'Thông báo nghỉ học', '2', 'success', '2025-12-06 03:27:19');
INSERT INTO email_logs VALUES('8', '2', 'Bùi Phương Thảo', 'thao.bui@engbreak.edu.vn', 'Thông Báo Nghỉ Việc', '2', 'success', '2025-12-06 03:29:45');
INSERT INTO email_logs VALUES('9', '2', 'Bùi Tiến Dũng', 'dung.bui@gmail.com', 'Thông báo nghỉ học', 'nghỉ e nhé', 'success', '2026-01-08 13:00:01');


CREATE TABLE `email_templates` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO email_templates VALUES('1', 'Thông báo nghỉ lễ', 'Thông báo nghỉ lễ - Trung tâm EngBreak', '<p>Chào bạn,</p><p>Trung tâm xin thông báo lịch nghỉ lễ...</p>');
INSERT INTO email_templates VALUES('2', 'Nhắc đóng học phí', 'Nhắc nhở đóng học phí tháng này', '<p>Chào quý phụ huynh,</p><p>Đây là thông báo nhắc nhở về khoản học phí...</p>');


CREATE TABLE `enrollments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_id` int DEFAULT NULL,
  `class_id` int DEFAULT NULL,
  `registration_date` date DEFAULT (curdate()),
  `start_study_date` date DEFAULT NULL,
  `end_study_date` date DEFAULT NULL,
  `is_special_schedule` tinyint DEFAULT '0',
  `special_days` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` enum('chua_dong_tien','dang_hoc','chuyen_lop','bao_luu','het_han') COLLATE utf8mb4_general_ci DEFAULT 'chua_dong_tien',
  `note` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`),
  KEY `student_id` (`student_id`),
  KEY `class_id` (`class_id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO enrollments VALUES('1', '1', '1', '2025-11-28', '', '2025-12-06', '0', '', 'dang_hoc', '');
INSERT INTO enrollments VALUES('2', '2', '3', '2025-11-28', '', '2025-12-05', '0', '', 'dang_hoc', '');
INSERT INTO enrollments VALUES('3', '3', '3', '2025-11-28', '', '2026-05-19', '0', '', 'dang_hoc', '');
INSERT INTO enrollments VALUES('4', '4', '1', '2025-11-28', '', '2026-03-23', '0', '', 'dang_hoc', '');
INSERT INTO enrollments VALUES('5', '5', '7', '2025-11-28', '', '2026-05-18', '0', '', 'dang_hoc', '');
INSERT INTO enrollments VALUES('6', '6', '5', '2025-11-28', '', '2026-03-24', '0', '', 'dang_hoc', '');
INSERT INTO enrollments VALUES('7', '11', '4', '2025-11-28', '', '2026-03-24', '0', '', 'dang_hoc', '');
INSERT INTO enrollments VALUES('8', '7', '3', '2025-11-28', '', '2026-03-23', '0', '', 'dang_hoc', '');
INSERT INTO enrollments VALUES('9', '8', '1', '2025-11-28', '', '2026-03-24', '0', '', 'dang_hoc', '');
INSERT INTO enrollments VALUES('10', '9', '3', '2025-11-28', '', '2026-03-24', '0', '', 'dang_hoc', '');
INSERT INTO enrollments VALUES('11', '10', '7', '2025-11-28', '', '2026-03-24', '0', '', 'dang_hoc', '');
INSERT INTO enrollments VALUES('12', '12', '4', '2025-11-28', '', '2026-03-23', '0', '', 'dang_hoc', '');
INSERT INTO enrollments VALUES('13', '13', '3', '2025-11-28', '', '2026-05-18', '0', '', 'dang_hoc', '');
INSERT INTO enrollments VALUES('14', '14', '6', '2025-11-28', '', '2026-03-22', '0', '', 'dang_hoc', '');
INSERT INTO enrollments VALUES('15', '15', '5', '2025-11-28', '', '2026-01-27', '0', '', 'dang_hoc', '');
INSERT INTO enrollments VALUES('16', '16', '3', '2025-11-28', '', '2026-01-27', '0', '', 'dang_hoc', '');
INSERT INTO enrollments VALUES('17', '17', '4', '2025-11-28', '', '2026-01-27', '0', '', 'dang_hoc', '');
INSERT INTO enrollments VALUES('18', '18', '6', '2025-11-28', '', '2026-01-27', '0', '', 'dang_hoc', '');
INSERT INTO enrollments VALUES('19', '19', '5', '2025-11-28', '', '2026-01-27', '0', '', 'dang_hoc', '');
INSERT INTO enrollments VALUES('20', '20', '5', '2025-11-28', '', '2026-01-27', '0', '', 'dang_hoc', '');
INSERT INTO enrollments VALUES('21', '21', '4', '2025-11-28', '', '2026-01-27', '0', '', 'dang_hoc', '');
INSERT INTO enrollments VALUES('22', '22', '7', '2025-11-28', '', '2026-01-27', '0', '', 'dang_hoc', '');
INSERT INTO enrollments VALUES('23', '23', '1', '2025-11-28', '', '2026-01-27', '0', '', 'dang_hoc', '');
INSERT INTO enrollments VALUES('24', '24', '3', '2025-11-28', '', '2026-01-27', '0', '', 'dang_hoc', '');
INSERT INTO enrollments VALUES('25', '25', '6', '2025-11-28', '', '2026-03-22', '0', '', 'dang_hoc', '');
INSERT INTO enrollments VALUES('26', '26', '4', '2025-11-28', '', '2026-01-27', '0', '', 'dang_hoc', '');
INSERT INTO enrollments VALUES('27', '27', '7', '2025-11-28', '', '2026-01-27', '0', '', 'dang_hoc', '');
INSERT INTO enrollments VALUES('28', '28', '5', '2025-11-28', '', '2026-03-24', '0', '', 'dang_hoc', '');
INSERT INTO enrollments VALUES('29', '29', '1', '2025-11-28', '', '2026-01-27', '0', '', 'dang_hoc', '');
INSERT INTO enrollments VALUES('30', '30', '3', '2025-11-28', '', '2027-08-10', '0', '', 'dang_hoc', '');
INSERT INTO enrollments VALUES('31', '31', '9', '2025-12-02', '', '2026-03-24', '0', '', 'dang_hoc', '');
INSERT INTO enrollments VALUES('32', '32', '11', '2025-12-06', '', '', '0', '', 'dang_hoc', '');


CREATE TABLE `level_logs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `record_id` int NOT NULL,
  `actor_id` int NOT NULL,
  `action` enum('THEM','SUA','XOA') COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `old_data` json DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



CREATE TABLE `levels` (
  `id` int NOT NULL AUTO_INCREMENT,
  `level_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `course_duration` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '5-6 tháng',
  `description` text COLLATE utf8mb4_general_ci,
  `sort_order` int DEFAULT '100',
  PRIMARY KEY (`id`),
  UNIQUE KEY `level_name` (`level_name`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO levels VALUES('4', 'Ket', '5-6 tháng', 'Key English Test (A2)', '5');
INSERT INTO levels VALUES('5', 'Early', '5-6 tháng', 'Tiếng Anh Mầm Non (Pre-School)', '1');
INSERT INTO levels VALUES('6', 'Starter', '3-4 tháng', 'Cambridge Starters (Pre-A1)', '2');
INSERT INTO levels VALUES('7', 'Mover', '5-6 tháng', 'Cambridge Movers (A1)', '3');
INSERT INTO levels VALUES('8', 'Flyer', '5-6 tháng', 'Cambridge Flyers (A2)', '4');
INSERT INTO levels VALUES('9', 'Pet', '5-6 tháng', 'Preliminary English Test (B1)', '6');
INSERT INTO levels VALUES('10', 'Toeic 1', '5-6 tháng', 'TOEIC Căn bản (Mục tiêu 300-450)', '10');
INSERT INTO levels VALUES('11', 'Toeic 2', '5-6 tháng', 'TOEIC Trung cấp (Mục tiêu 450-650)', '11');
INSERT INTO levels VALUES('12', 'Toeic 3', '5-6 tháng', 'TOEIC Nâng cao (Mục tiêu 650-800+)', '12');
INSERT INTO levels VALUES('13', 'Pre-Ielts', '6 tháng', 'Nhập môn IELTS (Làm quen format)', '20');
INSERT INTO levels VALUES('14', 'Ielts 1', '6 tháng', 'IELTS Foundation (Band 3.5 - 4.5)', '21');
INSERT INTO levels VALUES('15', 'Ielts 2', '6 tháng', 'IELTS Intermediate (Band 4.5 - 5.5)', '22');
INSERT INTO levels VALUES('16', 'Ielts 3', '6 tháng', 'IELTS Upper-Inter (Band 5.5 - 6.5)', '23');
INSERT INTO levels VALUES('17', 'Ielts 4', '6 tháng', 'IELTS Advanced (Band 6.5 - 7.5)', '24');
INSERT INTO levels VALUES('18', 'Ielts 5', '6 tháng', 'IELTS Master (Band 7.5+)', '25');
INSERT INTO levels VALUES('19', 'Giao tiếp A', '5-6 tháng', 'Giao tiếp Cơ bản (Mất gốc)', '30');
INSERT INTO levels VALUES('20', 'Giao tiếp B', '5-6 tháng', 'Giao tiếp Phản xạ (Chủ đề thông dụng)', '31');
INSERT INTO levels VALUES('21', 'Giao tiếp C', '5-6 tháng', 'Giao tiếp Chuyên sâu (Công việc/Thuyết trình)', '32');


CREATE TABLE `payments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `enrollment_id` int DEFAULT NULL,
  `student_id` int DEFAULT NULL,
  `weeks` int DEFAULT '0',
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `original_amount` decimal(12,2) DEFAULT NULL,
  `discount_amount` decimal(12,2) DEFAULT '0.00',
  `promotion_id` int DEFAULT NULL,
  `final_amount` decimal(12,2) DEFAULT NULL,
  `payment_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `payment_method` enum('tien_mat','chuyen_khoan','vietqr') COLLATE utf8mb4_general_ci DEFAULT 'tien_mat',
  `transaction_code` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`),
  KEY `enrollment_id` (`enrollment_id`),
  KEY `student_id` (`student_id`),
  KEY `promotion_id` (`promotion_id`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO payments VALUES('1', '9', '4', '0', '', '', '', '0.00', '2', '21111093.00', '2025-11-21 15:28:09', 'tien_mat', '', '');
INSERT INTO payments VALUES('2', '9', '4', '0', '', '', '', '0.00', '2', '21111093.00', '2025-11-21 15:44:17', 'tien_mat', '', '');
INSERT INTO payments VALUES('3', '1', '1', '0', '', '', '2000000.00', '200000.00', '2', '1800000.00', '2025-12-02 23:39:52', 'tien_mat', '', 'Đóng phí 8 tuần (Đến 2026-01-27)');
INSERT INTO payments VALUES('4', '1', '1', '0', '', '', '2000000.00', '200000.00', '2', '1800000.00', '2025-12-02 23:40:42', 'tien_mat', '', 'Đóng phí 8 tuần (Đến 2026-03-24)');
INSERT INTO payments VALUES('5', '31', '31', '0', '', '', '10450000.00', '1045000.00', '2', '9405000.00', '2025-12-02 23:40:55', 'tien_mat', '', 'Đóng phí 16 tuần (Đến 2026-03-24)');
INSERT INTO payments VALUES('6', '2', '2', '0', '', '', '4000000.00', '400000.00', '2', '3600000.00', '2025-12-02 23:41:02', 'tien_mat', '', 'Đóng phí 8 tuần (Đến 2026-01-27)');
INSERT INTO payments VALUES('7', '3', '3', '0', '', '', '4000000.00', '400000.00', '2', '3600000.00', '2025-12-02 23:41:05', 'tien_mat', '', 'Đóng phí 8 tuần (Đến 2026-01-27)');
INSERT INTO payments VALUES('8', '4', '4', '0', '', '', '2000000.00', '200000.00', '2', '1800000.00', '2025-12-02 23:41:08', 'tien_mat', '', 'Đóng phí 8 tuần (Đến 2025-12-06)');
INSERT INTO payments VALUES('9', '5', '5', '0', '', '', '3000000.00', '300000.00', '2', '2700000.00', '2025-12-02 23:41:11', 'tien_mat', '', 'Đóng phí 8 tuần (Đến 2026-01-27)');
INSERT INTO payments VALUES('10', '6', '6', '0', '', '', '2800000.00', '2800000.00', '4', '0.00', '2025-12-02 23:41:14', 'tien_mat', '', 'Đóng phí 8 tuần (Đến 2026-01-27)');
INSERT INTO payments VALUES('11', '6', '6', '0', '', '', '2800000.00', '2800000.00', '4', '0.00', '2025-12-02 23:41:41', 'tien_mat', '', 'Đóng phí 8 tuần (Đến 2026-03-24)');
INSERT INTO payments VALUES('12', '7', '11', '0', '', '', '2800000.00', '0.00', '', '2800000.00', '2025-12-02 23:41:50', 'tien_mat', '', 'Đóng phí 8 tuần (Đến 2026-01-27)');
INSERT INTO payments VALUES('13', '8', '7', '0', '', '', '4000000.00', '400000.00', '2', '3600000.00', '2025-12-02 23:41:54', 'tien_mat', '', 'Đóng phí 8 tuần (Đến 2026-01-27)');
INSERT INTO payments VALUES('14', '9', '8', '0', '', '', '3800000.00', '380000.00', '2', '3420000.00', '2025-12-02 23:41:57', 'tien_mat', '', 'Đóng phí 16 tuần (Đến 2026-03-24)');
INSERT INTO payments VALUES('15', '10', '9', '0', '', '', '7600000.00', '760000.00', '2', '6840000.00', '2025-12-02 23:42:00', 'tien_mat', '', 'Đóng phí 16 tuần (Đến 2026-03-24)');
INSERT INTO payments VALUES('16', '11', '10', '0', '', '', '5700000.00', '570000.00', '2', '5130000.00', '2025-12-02 23:42:04', 'tien_mat', '', 'Đóng phí 16 tuần (Đến 2026-03-24)');
INSERT INTO payments VALUES('17', '12', '12', '0', '', '', '2800000.00', '0.00', '', '2800000.00', '2025-12-02 23:42:07', 'tien_mat', '', 'Đóng phí 8 tuần (Đến 2026-01-27)');
INSERT INTO payments VALUES('18', '13', '13', '0', '', '', '4000000.00', '0.00', '', '4000000.00', '2025-12-02 23:42:09', 'tien_mat', '', 'Đóng phí 8 tuần (Đến 2026-01-27)');
INSERT INTO payments VALUES('19', '14', '14', '0', '', '', '2200000.00', '110000.00', '3', '2090000.00', '2025-12-02 23:42:12', 'tien_mat', '', 'Đóng phí 8 tuần (Đến 2026-01-27)');
INSERT INTO payments VALUES('20', '15', '15', '0', '', '', '2800000.00', '0.00', '', '2800000.00', '2025-12-02 23:42:16', 'tien_mat', '', 'Đóng phí 8 tuần (Đến 2026-01-27)');
INSERT INTO payments VALUES('21', '16', '16', '0', '', '', '4000000.00', '0.00', '', '4000000.00', '2025-12-02 23:42:19', 'tien_mat', '', 'Đóng phí 8 tuần (Đến 2026-01-27)');
INSERT INTO payments VALUES('22', '17', '17', '0', '', '', '2800000.00', '0.00', '', '2800000.00', '2025-12-02 23:42:21', 'tien_mat', '', 'Đóng phí 8 tuần (Đến 2026-01-27)');
INSERT INTO payments VALUES('23', '18', '18', '0', '', '', '2200000.00', '0.00', '', '2200000.00', '2025-12-02 23:42:24', 'tien_mat', '', 'Đóng phí 8 tuần (Đến 2026-01-27)');
INSERT INTO payments VALUES('24', '19', '19', '0', '', '', '2800000.00', '140000.00', '1', '2660000.00', '2025-12-02 23:42:26', 'tien_mat', '', 'Đóng phí 8 tuần (Đến 2026-01-27)');
INSERT INTO payments VALUES('25', '20', '20', '0', '', '', '2800000.00', '140000.00', '3', '2660000.00', '2025-12-02 23:42:30', 'tien_mat', '', 'Đóng phí 8 tuần (Đến 2026-01-27)');
INSERT INTO payments VALUES('26', '21', '21', '0', '', '', '2800000.00', '140000.00', '1', '2660000.00', '2025-12-02 23:42:32', 'tien_mat', '', 'Đóng phí 8 tuần (Đến 2026-01-27)');
INSERT INTO payments VALUES('27', '22', '22', '0', '', '', '3000000.00', '150000.00', '3', '2850000.00', '2025-12-02 23:42:35', 'tien_mat', '', 'Đóng phí 8 tuần (Đến 2026-01-27)');
INSERT INTO payments VALUES('28', '23', '23', '0', '', '', '2000000.00', '100000.00', '3', '1900000.00', '2025-12-02 23:42:37', 'tien_mat', '', 'Đóng phí 8 tuần (Đến 2026-01-27)');
INSERT INTO payments VALUES('29', '24', '24', '0', '', '', '4000000.00', '400000.00', '2', '3600000.00', '2025-12-02 23:42:41', 'tien_mat', '', 'Đóng phí 8 tuần (Đến 2026-01-27)');
INSERT INTO payments VALUES('30', '25', '25', '0', '', '', '2200000.00', '220000.00', '2', '1980000.00', '2025-12-02 23:42:44', 'tien_mat', '', 'Đóng phí 8 tuần (Đến 2026-01-27)');
INSERT INTO payments VALUES('31', '26', '26', '0', '', '', '2800000.00', '280000.00', '2', '2520000.00', '2025-12-02 23:42:47', 'tien_mat', '', 'Đóng phí 8 tuần (Đến 2026-01-27)');
INSERT INTO payments VALUES('32', '27', '27', '0', '', '', '3000000.00', '150000.00', '3', '2850000.00', '2025-12-02 23:42:50', 'tien_mat', '', 'Đóng phí 8 tuần (Đến 2026-01-27)');
INSERT INTO payments VALUES('33', '28', '28', '0', '', '', '2800000.00', '140000.00', '3', '2660000.00', '2025-12-02 23:42:55', 'tien_mat', '', 'Đóng phí 8 tuần (Đến 2026-01-27)');
INSERT INTO payments VALUES('34', '29', '29', '0', '', '', '2000000.00', '200000.00', '2', '1800000.00', '2025-12-02 23:42:58', 'tien_mat', '', 'Đóng phí 8 tuần (Đến 2026-01-27)');
INSERT INTO payments VALUES('35', '30', '30', '0', '', '', '4000000.00', '0.00', '', '4000000.00', '2025-12-02 23:43:01', 'tien_mat', '', 'Đóng phí 8 tuần (Đến 2026-01-27)');
INSERT INTO payments VALUES('36', '30', '30', '0', '', '', '4000000.00', '0.00', '', '4000000.00', '2025-12-02 23:46:42', 'tien_mat', '', 'Đóng phí 8 tuần (Đến 2026-03-24)');
INSERT INTO payments VALUES('37', '30', '30', '0', '', '', '4000000.00', '0.00', '', '4000000.00', '2025-12-02 23:56:16', 'tien_mat', '', 'Đóng phí 8 tuần (Đến 2026-05-19)');
INSERT INTO payments VALUES('38', '30', '30', '0', '', '', '4000000.00', '0.00', '', '4000000.00', '2025-12-03 00:01:10', 'tien_mat', '', 'Đóng phí 8 tuần (Đến 2026-07-14)');
INSERT INTO payments VALUES('39', '30', '30', '0', '', '', '4000000.00', '0.00', '', '4000000.00', '2025-12-03 00:05:33', 'tien_mat', '', 'Đóng phí 8 tuần (Đến 2026-09-08)');
INSERT INTO payments VALUES('40', '30', '30', '0', '', '', '4000000.00', '0.00', '', '4000000.00', '2025-12-03 00:06:01', 'tien_mat', '', 'Đóng phí 8 tuần (Đến 2026-11-03)');
INSERT INTO payments VALUES('41', '30', '30', '0', '', '', '4000000.00', '0.00', '', '4000000.00', '2025-12-03 00:06:14', 'tien_mat', '', 'Đóng phí 8 tuần (Đến 2026-12-29)');
INSERT INTO payments VALUES('42', '30', '30', '0', '', '', '4000000.00', '0.00', '', '4000000.00', '2025-12-03 00:06:36', 'tien_mat', '', 'Đóng phí 8 tuần (Đến 2027-02-23)');
INSERT INTO payments VALUES('43', '30', '30', '0', '', '', '4000000.00', '0.00', '', '4000000.00', '2025-12-03 00:06:59', 'tien_mat', '', 'Đóng phí 8 tuần (Đến 2027-04-20)');
INSERT INTO payments VALUES('44', '30', '30', '0', '', '', '4000000.00', '0.00', '', '4000000.00', '2025-12-03 00:10:51', 'tien_mat', '', 'Gia hạn 8 tuần (Đến 15/06)');
INSERT INTO payments VALUES('45', '30', '30', '0', '', '', '4000000.00', '0.00', '', '4000000.00', '2025-12-03 00:12:09', 'tien_mat', '', 'Gia hạn 8 tuần (Đến 10/08)');
INSERT INTO payments VALUES('46', '2', '2', '0', '', '', '4000000.00', '400000.00', '2', '3600000.00', '2025-12-03 00:12:30', 'vietqr', '', 'Gia hạn 8 tuần (Đến 24/03)');
INSERT INTO payments VALUES('47', '3', '3', '8', '2026-01-27', '2026-03-24', '4000000.00', '400000.00', '2', '3600000.00', '2025-12-03 00:24:26', 'tien_mat', '', 'Gia hạn 8 tuần');
INSERT INTO payments VALUES('48', '3', '3', '8', '2026-03-24', '2026-05-19', '4000000.00', '400000.00', '2', '3600000.00', '2025-12-03 00:25:23', 'tien_mat', '', 'Gia hạn 8 tuần');
INSERT INTO payments VALUES('49', '7', '11', '8', '2026-01-27', '2026-03-24', '2800000.00', '0.00', '', '2800000.00', '2025-12-03 00:25:46', 'vietqr', '', 'Gia hạn 8 tuần');
INSERT INTO payments VALUES('50', '5', '5', '8', '2026-01-27', '2026-03-23', '3000000.00', '300000.00', '2', '2700000.00', '2025-12-03 23:05:19', 'tien_mat', '', 'Đóng 8 tuần (28/01 -> 23/03)');
INSERT INTO payments VALUES('51', '5', '5', '8', '2026-03-23', '2026-05-18', '3000000.00', '300000.00', '2', '2700000.00', '2025-12-03 23:07:10', 'tien_mat', '', 'Đóng 8 tuần (25/03 -> 18/05)');
INSERT INTO payments VALUES('52', '4', '4', '8', '2026-01-27', '2026-03-23', '2000000.00', '200000.00', '2', '1800000.00', '2025-12-03 23:07:30', 'tien_mat', '', 'Đóng 8 tuần (29/01 -> 23/03)');
INSERT INTO payments VALUES('53', '8', '7', '8', '2026-01-27', '2026-03-23', '4000000.00', '400000.00', '2', '3600000.00', '2025-12-03 23:07:56', 'tien_mat', '', 'Đóng 8 tuần (29/01 -> 23/03)');
INSERT INTO payments VALUES('54', '28', '28', '8', '2026-01-27', '2026-03-24', '2800000.00', '140000.00', '3', '2660000.00', '2025-12-03 23:09:00', 'tien_mat', '', 'Đóng 8 tuần (29/01 -> 24/03)');
INSERT INTO payments VALUES('55', '12', '12', '8', '2026-01-27', '2026-03-23', '2800000.00', '0.00', '', '2800000.00', '2025-12-06 02:50:14', 'vietqr', '', 'Đóng 8 tuần (29/01 -> 23/03)');
INSERT INTO payments VALUES('56', '13', '13', '16', '2026-01-27', '2026-05-18', '7600000.00', '0.00', '', '7600000.00', '2025-12-06 14:05:51', 'tien_mat', '', 'Đóng 16 tuần (29/01 -> 18/05)');
INSERT INTO payments VALUES('57', '14', '14', '8', '2026-01-27', '2026-03-22', '2200000.00', '110000.00', '3', '2090000.00', '2025-12-06 15:48:01', 'vietqr', '', 'Đóng 8 tuần (29/01 -> 22/03)');
INSERT INTO payments VALUES('58', '25', '25', '8', '2026-01-27', '2026-03-22', '2200000.00', '220000.00', '2', '1980000.00', '2025-12-06 15:50:06', 'vietqr', '', 'Đóng 8 tuần (29/01 -> 22/03)');


CREATE TABLE `promotion_logs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `record_id` int NOT NULL,
  `actor_id` int NOT NULL,
  `action` enum('THEM','SUA','XOA') COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `old_data` json DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



CREATE TABLE `promotions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `discount_percent` int DEFAULT NULL,
  `condition_type` enum('none','seniority_1y','seniority_2y','family','special') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO promotions VALUES('1', 'Học trên 1 năm', '5', 'seniority_1y', '');
INSERT INTO promotions VALUES('2', 'Học trên 2 năm', '10', 'seniority_2y', '');
INSERT INTO promotions VALUES('3', 'Gia đình/Người thân', '5', 'family', '');
INSERT INTO promotions VALUES('4', 'Đặc biệt (Học bổng)', '100', 'special', '');


CREATE TABLE `registration_keys` (
  `id` int NOT NULL AUTO_INCREMENT,
  `key_code` varchar(50) NOT NULL,
  `is_used` tinyint(1) DEFAULT '0' COMMENT '0: Chưa dùng, 1: Đã dùng',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `key_code` (`key_code`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO registration_keys VALUES('1', 'NV-123456', '1', '2025-11-23 11:08:54');
INSERT INTO registration_keys VALUES('2', 'NV-999888', '1', '2025-11-23 11:08:54');
INSERT INTO registration_keys VALUES('3', 'NV-ABCXYZ', '1', '2025-11-23 11:08:54');
INSERT INTO registration_keys VALUES('4', 'Admin', '1', '2025-11-23 11:16:56');
INSERT INTO registration_keys VALUES('5', 'NV-630378', '1', '2025-11-26 16:24:49');
INSERT INTO registration_keys VALUES('6', 'NV-522924', '0', '2025-11-26 22:54:50');
INSERT INTO registration_keys VALUES('7', 'NV-125496', '1', '2025-11-26 22:54:58');
INSERT INTO registration_keys VALUES('8', 'NV-354750', '0', '2025-11-26 22:56:46');
INSERT INTO registration_keys VALUES('9', 'NV-263792', '0', '2025-11-26 23:01:18');
INSERT INTO registration_keys VALUES('10', 'NV-871316', '0', '2025-11-27 22:46:18');


CREATE TABLE `room_logs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `record_id` int NOT NULL,
  `actor_id` int NOT NULL,
  `action` enum('THEM','SUA','XOA','DOI_TRANG_THAI') COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `old_data` json DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO room_logs VALUES('1', '14', '0', 'DOI_TRANG_THAI', 'Phòng P.402: san_sang -> bao_tri', '{\"new_status\": \"bao_tri\", \"old_status\": \"san_sang\"}', '2025-11-30 20:00:52');
INSERT INTO room_logs VALUES('2', '14', '2', 'SUA', 'Cập nhật phòng: P.402', '{\"id\": 14, \"note\": \"Lầu 4\", \"status\": \"san_sang\", \"room_name\": \"P.402\"}', '2025-11-30 20:00:52');
INSERT INTO room_logs VALUES('3', '14', '2', 'SUA', 'Cập nhật thông tin phòng: P.402', '{\"id\": 14, \"note\": \"Lầu 4\", \"status\": \"bao_tri\", \"room_name\": \"P.402\"}', '2025-11-30 20:06:10');
INSERT INTO room_logs VALUES('4', '14', '2', 'DOI_TRANG_THAI', 'Đổi trạng thái phòng P.402: Bảo trì -> Sẵn sàng', '', '2025-11-30 20:06:10');


CREATE TABLE `rooms` (
  `id` int NOT NULL AUTO_INCREMENT,
  `room_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `status` enum('san_sang','dang_su_dung','bao_tri') COLLATE utf8mb4_general_ci DEFAULT 'san_sang',
  `note` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `room_name` (`room_name`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO rooms VALUES('1', 'P.101', 'san_sang', 'Lầu 1 - Sức chứa 20 HV');
INSERT INTO rooms VALUES('2', 'P.102', 'san_sang', 'Lầu 1 - Sức chứa 20 HV');
INSERT INTO rooms VALUES('3', 'P.103', 'san_sang', 'Lầu 1 - Phòng Kid');
INSERT INTO rooms VALUES('4', 'P.104', 'san_sang', 'Lầu 1 - Phòng Kid');
INSERT INTO rooms VALUES('5', 'P.201', 'san_sang', 'Lầu 2 - Máy lạnh mới');
INSERT INTO rooms VALUES('6', 'P.202', 'san_sang', 'Lầu 2 - Sức chứa 30 HV');
INSERT INTO rooms VALUES('7', 'P.203', 'san_sang', 'Lầu 2');
INSERT INTO rooms VALUES('8', 'P.204', 'san_sang', 'Lầu 2');
INSERT INTO rooms VALUES('9', 'P.301', 'san_sang', 'Lầu 3 - Phòng Lab (Nghe/Nói)');
INSERT INTO rooms VALUES('10', 'P.302', 'san_sang', 'Lầu 3');
INSERT INTO rooms VALUES('11', 'P.303', 'san_sang', 'Lầu 3');
INSERT INTO rooms VALUES('12', 'P.304', 'san_sang', 'Lầu 3');
INSERT INTO rooms VALUES('13', 'P.401', 'san_sang', 'Lầu 4 - Hội trường nhỏ');
INSERT INTO rooms VALUES('14', 'P.402', 'san_sang', 'Lầu 4');
INSERT INTO rooms VALUES('15', 'P.403', 'bao_tri', 'Lầu 4 - Hỏng máy chiếu, đang sửa');
INSERT INTO rooms VALUES('16', 'P.404', 'bao_tri', 'Lầu 4 - Thấm trần, chưa sử dụng');


CREATE TABLE `shifts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `shift_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `days` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO shifts VALUES('1', 'Ca 1 (2-4-6)', '2-4-6', '17:45:00', '19:15:00');
INSERT INTO shifts VALUES('2', 'Ca 2 (2-4-6)', '2-4-6', '19:30:00', '21:00:00');
INSERT INTO shifts VALUES('3', 'Ca 1 (3-5-7)', '3-5-7', '17:45:00', '19:15:00');
INSERT INTO shifts VALUES('4', 'Ca 1 (T7-CN)', 'T7-CN', '07:30:00', '09:30:00');
INSERT INTO shifts VALUES('5', 'Ca 2 (3-5-7)', '3-5-7', '19:30:00', '21:00:00');
INSERT INTO shifts VALUES('6', 'Ca 2 (T7-CN)', 'T7-CN', '09:45:00', '11:45:00');
INSERT INTO shifts VALUES('7', 'Ca 3 (T7-CN)', 'T7-CN', '15:00:00', '17:00:00');
INSERT INTO shifts VALUES('8', 'Ca 1 (T2-T4)', '2-4', '17:30:00', '19:30:00');
INSERT INTO shifts VALUES('9', 'Ca 1 (T3-T5)', '3-5', '17:30:00', '19:30:00');


CREATE TABLE `student_logs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `record_id` int NOT NULL,
  `actor_id` int NOT NULL,
  `action` enum('THEM','SUA','XOA') COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `old_data` json DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `record_id` (`record_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO student_logs VALUES('1', '29', '2', 'SUA', 'Cập nhật hồ sơ: Tạ Bích Loan', '{\"id\": 29, \"dob\": \"1985-06-15\", \"note\": null, \"email\": \"loan.ta@gmail.com\", \"phone\": \"0909123123\", \"avatar\": \"default_student.png\", \"gender\": \"Nu\", \"status\": 1, \"address\": \"Sở Y Tế\", \"full_name\": \"Tạ Bích Loan\", \"join_date\": \"2025-11-28\", \"parent_phone\": \"\", \"learning_status\": \"dang_hoc\"}', '2025-11-30 20:54:24');
INSERT INTO student_logs VALUES('2', '29', '2', 'SUA', 'Cập nhật hồ sơ: Tạ Bích Loan', '{\"id\": 29, \"dob\": \"2012-06-15\", \"note\": null, \"email\": \"loan.ta@gmail.com\", \"phone\": \"0909123123\", \"avatar\": \"default_student.png\", \"gender\": \"Nu\", \"status\": 1, \"address\": \"Sở Y Tế\", \"full_name\": \"Tạ Bích Loan\", \"join_date\": \"2025-11-28\", \"parent_phone\": \"0909123123\", \"learning_status\": \"dang_hoc\"}', '2025-11-30 20:57:04');
INSERT INTO student_logs VALUES('3', '29', '2', 'SUA', 'Cập nhật hồ sơ: Tạ Bích Loan', '{\"id\": 29, \"dob\": \"2012-06-15\", \"note\": null, \"email\": \"loan.ta@gmail.com\", \"phone\": \"0909123123\", \"avatar\": \"default_student.png\", \"gender\": \"Nu\", \"status\": 1, \"address\": \"Sở Y Tế\", \"full_name\": \"Tạ Bích Loan\", \"join_date\": \"2025-11-28\", \"parent_phone\": \"0909123123\", \"learning_status\": \"dang_hoc\"}', '2025-11-30 21:09:50');
INSERT INTO student_logs VALUES('4', '29', '2', 'SUA', 'Cập nhật hồ sơ: Tạ Bích Loan', '{\"id\": 29, \"dob\": \"2012-07-15\", \"note\": null, \"email\": \"loan.ta@gmail.com\", \"phone\": \"0909123123\", \"avatar\": \"default_student.png\", \"gender\": \"Nu\", \"status\": 1, \"address\": \"Sở Y Tế\", \"full_name\": \"Tạ Bích Loan\", \"join_date\": \"2025-11-28\", \"parent_phone\": \"0909123123\", \"learning_status\": \"dang_hoc\"}', '2025-11-30 21:10:58');
INSERT INTO student_logs VALUES('5', '29', '2', 'SUA', 'Cập nhật hồ sơ: Tạ Bích Loan', '{\"id\": 29, \"dob\": \"2012-07-15\", \"note\": null, \"email\": \"loan.ta@gmail.com\", \"phone\": \"0909123123\", \"avatar\": \"default_student.png\", \"gender\": \"Nu\", \"status\": 1, \"address\": \"Sở Y Tế\", \"full_name\": \"Tạ Bích Loan\", \"join_date\": \"2025-11-28\", \"parent_phone\": \"0909123123\", \"promotion_id\": null, \"learning_status\": \"dang_hoc\"}', '2025-12-02 18:23:47');
INSERT INTO student_logs VALUES('6', '28', '2', 'SUA', 'Cập nhật hồ sơ: Quách Ngọc Ngoan', '{\"id\": 28, \"dob\": \"2017-02-28\", \"note\": null, \"email\": \"quachngocngoan@gmail.com\", \"phone\": \"0912222333\", \"avatar\": \"default_student.png\", \"gender\": \"Nam\", \"status\": 1, \"address\": \"Công viên Văn Miếu\", \"full_name\": \"Quách Ngọc Ngoan\", \"join_date\": \"2025-11-28\", \"parent_phone\": \"0912222333\", \"promotion_id\": null, \"learning_status\": \"dang_hoc\"}', '2025-12-02 18:23:55');
INSERT INTO student_logs VALUES('7', '27', '2', 'SUA', 'Cập nhật hồ sơ: Lương Thùy Linh', '{\"id\": 27, \"dob\": \"2009-11-11\", \"note\": null, \"email\": \"linh.luong@gmail.com\", \"phone\": \"0912111222\", \"avatar\": \"default_student.png\", \"gender\": \"Nu\", \"status\": 1, \"address\": \"Vincom Plaza\", \"full_name\": \"Lương Thùy Linh\", \"join_date\": \"2025-11-28\", \"parent_phone\": \"0912111222\", \"promotion_id\": null, \"learning_status\": \"dang_hoc\"}', '2025-12-02 18:23:59');
INSERT INTO student_logs VALUES('8', '26', '2', 'SUA', 'Cập nhật hồ sơ: Đinh Văn Lâm', '{\"id\": 26, \"dob\": \"2008-09-09\", \"note\": null, \"email\": \"lam.dinh@gmail.com\", \"phone\": \"0988999000\", \"avatar\": \"default_student.png\", \"gender\": \"Nam\", \"status\": 1, \"address\": \"Đường Lý Thường Kiệt\", \"full_name\": \"Đinh Văn Lâm\", \"join_date\": \"2025-11-28\", \"parent_phone\": \"0912000111\", \"promotion_id\": null, \"learning_status\": \"dang_hoc\"}', '2025-12-02 18:24:04');
INSERT INTO student_logs VALUES('9', '25', '2', 'SUA', 'Cập nhật hồ sơ: Võ Thị Bích', '{\"id\": 25, \"dob\": \"2007-07-07\", \"note\": null, \"email\": \"bich.vo@gmail.com\", \"phone\": \"0988888999\", \"avatar\": \"default_student.png\", \"gender\": \"Nu\", \"status\": 1, \"address\": \"Chợ Cao Lãnh\", \"full_name\": \"Võ Thị Bích\", \"join_date\": \"2025-11-28\", \"parent_phone\": \"0912999000\", \"promotion_id\": null, \"learning_status\": \"dang_hoc\"}', '2025-12-02 18:24:08');
INSERT INTO student_logs VALUES('10', '23', '2', 'SUA', 'Cập nhật hồ sơ: Mai Thị Tuyết', '{\"id\": 23, \"dob\": \"2000-01-20\", \"note\": null, \"email\": \"tuyet.mai@gmail.com\", \"phone\": \"0988666777\", \"avatar\": \"default_student.png\", \"gender\": \"Nu\", \"status\": 1, \"address\": \"Đường 30/4\", \"full_name\": \"Mai Thị Tuyết\", \"join_date\": \"2025-11-28\", \"parent_phone\": \"0988666777\", \"promotion_id\": null, \"learning_status\": \"dang_hoc\"}', '2025-12-02 18:24:13');
INSERT INTO student_logs VALUES('11', '22', '2', 'SUA', 'Cập nhật hồ sơ: Lý Văn Cường', '{\"id\": 22, \"dob\": \"1995-04-15\", \"note\": null, \"email\": \"cuong.ly@gmail.com\", \"phone\": \"0988555666\", \"avatar\": \"default_student.png\", \"gender\": \"Nam\", \"status\": 1, \"address\": \"Khu 500 Căn\", \"full_name\": \"Lý Văn Cường\", \"join_date\": \"2025-11-28\", \"parent_phone\": \"0988555666\", \"promotion_id\": null, \"learning_status\": \"dang_hoc\"}', '2025-12-02 18:24:17');
INSERT INTO student_logs VALUES('12', '21', '2', 'SUA', 'Cập nhật hồ sơ: Hồ Thị Thu', '{\"id\": 21, \"dob\": \"1998-10-10\", \"note\": null, \"email\": \"thu.ho@gmail.com\", \"phone\": \"0988444555\", \"avatar\": \"default_student.png\", \"gender\": \"Nu\", \"status\": 1, \"address\": \"P.6, TP. Cao Lãnh\", \"full_name\": \"Hồ Thị Thu\", \"join_date\": \"2025-11-28\", \"parent_phone\": \"0988444555\", \"promotion_id\": null, \"learning_status\": \"dang_hoc\"}', '2025-12-02 18:24:31');
INSERT INTO student_logs VALUES('13', '19', '2', 'SUA', 'Cập nhật hồ sơ: Ngô Phương Linh', '{\"id\": 19, \"dob\": \"2004-08-22\", \"note\": null, \"email\": \"linh.ngo@gmail.com\", \"phone\": \"0988222333\", \"avatar\": \"default_student.png\", \"gender\": \"Nu\", \"status\": 1, \"address\": \"Huyện Tháp Mười\", \"full_name\": \"Ngô Phương Linh\", \"join_date\": \"2025-11-28\", \"parent_phone\": \"0988222333\", \"promotion_id\": null, \"learning_status\": \"dang_hoc\"}', '2025-12-02 18:24:37');
INSERT INTO student_logs VALUES('14', '31', '2', 'THEM', 'Thêm học viên: Tạ Minh Hậu', '', '2025-12-02 18:50:37');
INSERT INTO student_logs VALUES('15', '31', '2', 'SUA', 'Cập nhật hồ sơ: Tạ Minh Hậu', '{\"id\": 31, \"dob\": \"2004-12-21\", \"note\": null, \"email\": null, \"phone\": \"0987459353\", \"avatar\": \"default_student.png\", \"gender\": \"Nam\", \"status\": 1, \"address\": \"1069 Trần Hưng Đạo\", \"full_name\": \"Tạ Minh Hậu\", \"join_date\": \"2023-01-02\", \"parent_phone\": \"0987459353\", \"promotion_id\": null, \"learning_status\": \"dang_hoc\"}', '2025-12-02 18:50:54');
INSERT INTO student_logs VALUES('16', '31', '2', 'SUA', 'Cập nhật hồ sơ: Tạ Minh Hậu', '{\"id\": 31, \"dob\": \"2004-12-21\", \"note\": null, \"email\": null, \"phone\": \"0987459353\", \"avatar\": \"default_student.png\", \"gender\": \"Nam\", \"status\": 1, \"address\": \"1069 Trần Hưng Đạo\", \"full_name\": \"Tạ Minh Hậu\", \"join_date\": \"2023-01-02\", \"parent_phone\": \"0987459353\", \"promotion_id\": 2, \"learning_status\": \"dang_hoc\"}', '2025-12-05 17:57:58');
INSERT INTO student_logs VALUES('17', '31', '2', 'SUA', 'Cập nhật hồ sơ: Tạ Minh Hậu', '{\"id\": 31, \"dob\": \"2004-12-21\", \"note\": null, \"email\": null, \"phone\": \"0987459353\", \"avatar\": \"std_1764932278.png\", \"gender\": \"Nam\", \"status\": 1, \"address\": \"1069 Trần Hưng Đạo\", \"full_name\": \"Tạ Minh Hậu\", \"join_date\": \"2023-01-02\", \"parent_phone\": \"0987459353\", \"promotion_id\": 2, \"learning_status\": \"dang_hoc\"}', '2025-12-05 17:58:27');
INSERT INTO student_logs VALUES('18', '31', '2', 'SUA', 'Cập nhật hồ sơ: Tạ Minh Hậu', '{\"id\": 31, \"dob\": \"2004-12-21\", \"note\": null, \"email\": null, \"phone\": \"0987459353\", \"avatar\": \"std_1764932307.png\", \"gender\": \"Nam\", \"status\": 1, \"address\": \"1069 Trần Hưng Đạo\", \"full_name\": \"Tạ Minh Hậu\", \"join_date\": \"2023-01-02\", \"parent_phone\": \"0987459353\", \"promotion_id\": 2, \"learning_status\": \"dang_hoc\"}', '2025-12-05 17:58:41');
INSERT INTO student_logs VALUES('19', '31', '2', 'SUA', 'Cập nhật hồ sơ: Tạ Minh Hậu', '{\"id\": 31, \"dob\": \"2004-12-21\", \"note\": null, \"email\": null, \"phone\": \"0987459353\", \"avatar\": \"std_1764932321.png\", \"gender\": \"Nam\", \"status\": 1, \"address\": \"1069 Trần Hưng Đạo\", \"full_name\": \"Tạ Minh Hậu\", \"join_date\": \"2023-01-02\", \"parent_phone\": \"0987459353\", \"promotion_id\": 2, \"learning_status\": \"dang_hoc\"}', '2025-12-05 17:59:23');
INSERT INTO student_logs VALUES('20', '31', '2', 'SUA', 'Cập nhật hồ sơ: Tạ Minh Hậu', '{\"id\": 31, \"dob\": \"2004-12-21\", \"note\": null, \"email\": null, \"phone\": \"0987459353\", \"avatar\": \"default_student.png\", \"gender\": \"Nam\", \"status\": 1, \"address\": \"1069 Trần Hưng Đạo\", \"full_name\": \"Tạ Minh Hậu\", \"join_date\": \"2023-01-02\", \"parent_phone\": \"0987459353\", \"promotion_id\": 2, \"learning_status\": \"dang_hoc\"}', '2025-12-05 18:00:20');
INSERT INTO student_logs VALUES('21', '31', '2', 'SUA', 'Cập nhật hồ sơ: Tạ Minh Hậu', '', '2025-12-05 18:00:35');
INSERT INTO student_logs VALUES('22', '32', '2', 'THEM', 'Thêm học viên: Phát', '', '2025-12-06 16:00:44');
INSERT INTO student_logs VALUES('23', '32', '2', 'SUA', 'Cập nhật hồ sơ: Phát', '{\"id\": 32, \"dob\": \"2003-07-14\", \"note\": null, \"email\": null, \"phone\": \"0999999999\", \"avatar\": \"default_student.png\", \"gender\": \"Nam\", \"status\": 1, \"address\": \"1069 Trần Hưng Đạo\", \"full_name\": \"Phát\", \"join_date\": \"2025-12-06\", \"parent_phone\": \"0999999999\", \"promotion_id\": 2, \"learning_status\": \"dang_hoc\"}', '2025-12-06 16:19:04');
INSERT INTO student_logs VALUES('24', '32', '2', 'SUA', 'Cập nhật hồ sơ: Phát', '{\"id\": 32, \"dob\": \"2003-07-14\", \"note\": null, \"email\": null, \"phone\": \"09999999993\", \"avatar\": \"default_student.png\", \"gender\": \"Nam\", \"status\": 1, \"address\": \"1069 Trần Hưng Đạo\", \"full_name\": \"Phát\", \"join_date\": \"2025-12-06\", \"parent_phone\": \"0999999999\", \"promotion_id\": 2, \"learning_status\": \"dang_hoc\"}', '2025-12-06 16:19:12');
INSERT INTO student_logs VALUES('25', '33', '2', 'THEM', 'Thêm học viên: Phát', '', '2025-12-09 18:09:41');


CREATE TABLE `students` (
  `id` int NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `dob` date DEFAULT NULL,
  `gender` enum('Nam','Nu','Khac') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `parent_phone` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_general_ci DEFAULT 'default_student.png',
  `address` text COLLATE utf8mb4_general_ci,
  `note` text COLLATE utf8mb4_general_ci,
  `join_date` date DEFAULT (curdate()),
  `status` tinyint DEFAULT '1',
  `learning_status` enum('dang_hoc','bao_luu','da_nghi') COLLATE utf8mb4_general_ci DEFAULT 'dang_hoc',
  `promotion_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `promotion_id` (`promotion_id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO students VALUES('1', 'Nguyễn Văn An', '2012-05-15', 'Nam', '0912345678', '0912345678', 'an.nguyen@gmail.com', 'default_student.png', '123 Lê Lợi, P.1, TP. Cao Lãnh', '', '2021-01-10', '1', 'dang_hoc', '2');
INSERT INTO students VALUES('2', 'Trần Thị Bích', '2010-08-20', 'Nu', '0987654321', '0987654321', 'bich.tran@gmail.com', 'default_student.png', '45 Nguyễn Huệ, P.2', '', '2022-05-20', '1', 'dang_hoc', '2');
INSERT INTO students VALUES('3', 'Lê Hoàng Nam', '2003-12-12', 'Nam', '0909090909', '0909090909', 'nam.le@yahoo.com', 'default_student.png', '78 Trần Hưng Đạo, P. Hòa Thuận', '', '2023-11-01', '1', 'dang_hoc', '2');
INSERT INTO students VALUES('4', 'Phạm Minh Khôi', '2016-01-30', 'Nam', '0933445566', '0933445566', 'minhkhoi@gmail.com', 'default_student.png', 'Khu đô thị Vincom', '', '2023-10-15', '1', 'dang_hoc', '2');
INSERT INTO students VALUES('5', 'Nguyễn Thị Mai', '2008-07-15', 'Nu', '0911223344', '0977889900', 'mai.nguyen@outlook.com', 'default_student.png', 'Xã Mỹ Tân, Cao Lãnh', '', '2023-09-05', '1', 'dang_hoc', '2');
INSERT INTO students VALUES('6', 'Hoàng Văn Long', '2014-03-25', 'Nam', '0912987654', '0912987654', 'long.hoang@gmail.com', 'default_student.png', 'Đường 30/4, Phường 1', '', '2023-08-01', '1', 'dang_hoc', '4');
INSERT INTO students VALUES('11', 'Nguyễn Bảo Ngọc', '2015-01-15', 'Nu', '0912000111', '0912000111', 'ngoc.baonguyen@gmail.com', 'default_student.png', 'P.1, TP. Cao Lãnh', '', '2025-11-28', '1', 'dang_hoc', '');
INSERT INTO students VALUES('7', 'Đoàn Thu Hà', '2015-09-09', 'Nu', '0945678901', '0945678901', 'ha.doan@gmail.com', 'default_student.png', 'Phường 3, TP. Sa Đéc', '', '2023-06-20', '1', 'bao_luu', '2');
INSERT INTO students VALUES('8', 'Vũ Đức Thắng', '2005-11-20', 'Nam', '0868123123', '0868123123', 'thang.vu@company.com', 'default_student.png', 'Ký túc xá Đại học', '', '2023-01-01', '0', 'dang_hoc', '2');
INSERT INTO students VALUES('9', 'Ngô Bảo Châu', '2013-02-14', 'Nu', '0988776655', '0988776655', 'chau.ngo@gmail.com', 'default_student.png', 'Phường 6, TP. Cao Lãnh', '', '2022-12-12', '1', 'dang_hoc', '2');
INSERT INTO students VALUES('10', 'Lý Hải Đăng', '2018-06-01', 'Nam', '0911112222', '0911112222', 'lyhaidang@gmail.com', 'default_student.png', 'Phường 11, TP. Cao Lãnh', '', '2023-11-10', '1', 'da_nghi', '2');
INSERT INTO students VALUES('12', 'Trần Minh Khôi', '2014-03-20', 'Nam', '0912000222', '0912000222', 'khoi.tran@gmail.com', 'default_student.png', 'P.2, TP. Cao Lãnh', '', '2025-11-28', '1', 'dang_hoc', '');
INSERT INTO students VALUES('13', 'Lê Gia Hân', '2013-05-10', 'Nu', '0912000333', '0912000333', 'han.legia@gmail.com', 'default_student.png', 'P.3, TP. Cao Lãnh', '', '2025-11-28', '1', 'dang_hoc', '');
INSERT INTO students VALUES('14', 'Phạm Đức Anh', '2012-07-25', 'Nam', '0912000444', '0912000444', 'ducanh.pham@gmail.com', 'default_student.png', 'P.4, TP. Cao Lãnh', '', '2025-11-28', '1', 'dang_hoc', '3');
INSERT INTO students VALUES('15', 'Hoàng Yến Nhi', '2016-09-12', 'Nu', '0912000555', '0912000555', 'nhi.hoangyen@gmail.com', 'default_student.png', 'Xã Mỹ Ngãi', '', '2025-11-28', '1', 'dang_hoc', '');
INSERT INTO students VALUES('16', 'Vũ Tuấn Kiệt', '2010-11-30', 'Nam', '0912000666', '0912000666', 'kiet.vu@gmail.com', 'default_student.png', 'P.11, TP. Cao Lãnh', '', '2025-11-28', '1', 'dang_hoc', '');
INSERT INTO students VALUES('17', 'Đặng Minh Châu', '2011-02-14', 'Nu', '0912000777', '0912000777', 'chau.dang@gmail.com', 'default_student.png', 'P. Hòa Thuận', '', '2025-11-28', '1', 'dang_hoc', '');
INSERT INTO students VALUES('18', 'Bùi Tiến Dũng', '2005-06-18', 'Nam', '0988111222', '0988111222', 'dung.bui@gmail.com', 'default_student.png', 'Huyện Cao Lãnh', '', '2025-11-28', '1', 'dang_hoc', '');
INSERT INTO students VALUES('19', 'Ngô Phương Linh', '2004-08-22', 'Nu', '0988222333', '0988222333', 'linh.ngo@gmail.com', 'default_student.png', 'Huyện Tháp Mười', '', '2025-11-28', '1', 'dang_hoc', '1');
INSERT INTO students VALUES('20', 'Dương Văn Hậu', '2003-12-05', 'Nam', '0988333444', '0988333444', 'hau.duong@gmail.com', 'default_student.png', 'P. Mỹ Phú', '', '2025-11-28', '1', 'dang_hoc', '3');
INSERT INTO students VALUES('21', 'Hồ Thị Thu', '1998-10-10', 'Nu', '0988444555', '0988444555', 'thu.ho@gmail.com', 'default_student.png', 'P.6, TP. Cao Lãnh', '', '2025-11-28', '1', 'dang_hoc', '1');
INSERT INTO students VALUES('22', 'Lý Văn Cường', '1995-04-15', 'Nam', '0988555666', '0988555666', 'cuong.ly@gmail.com', 'default_student.png', 'Khu 500 Căn', '', '2025-11-28', '1', 'dang_hoc', '3');
INSERT INTO students VALUES('23', 'Mai Thị Tuyết', '2000-01-20', 'Nu', '0988666777', '0988666777', 'tuyet.mai@gmail.com', 'default_student.png', 'Đường 30/4', '', '2025-11-28', '1', 'dang_hoc', '3');
INSERT INTO students VALUES('24', 'Trương Tấn Sang', '2006-05-05', 'Nam', '0988777888', '0912888999', 'sang.truong@gmail.com', 'default_student.png', 'Cầu Cái Vừng', '', '2025-11-28', '1', 'bao_luu', '2');
INSERT INTO students VALUES('25', 'Võ Thị Bích', '2007-07-07', 'Nu', '0988888999', '0912999000', 'bich.vo@gmail.com', 'default_student.png', 'Chợ Cao Lãnh', '', '2025-11-28', '1', 'dang_hoc', '2');
INSERT INTO students VALUES('26', 'Đinh Văn Lâm', '2008-09-09', 'Nam', '0988999000', '0912000111', 'lam.dinh@gmail.com', 'default_student.png', 'Đường Lý Thường Kiệt', '', '2025-11-28', '1', 'dang_hoc', '2');
INSERT INTO students VALUES('27', 'Lương Thùy Linh', '2009-11-11', 'Nu', '0912111222', '0912111222', 'linh.luong@gmail.com', 'default_student.png', 'Vincom Plaza', '', '2025-11-28', '1', 'dang_hoc', '3');
INSERT INTO students VALUES('28', 'Quách Ngọc Ngoan', '2017-02-28', 'Nam', '0912222333', '0912222333', 'quachngocngoan@gmail.com', 'default_student.png', 'Công viên Văn Miếu', '', '2025-11-28', '1', 'dang_hoc', '3');
INSERT INTO students VALUES('29', 'Tạ Bích Loan', '2012-07-15', 'Nu', '0909123123', '0909123123', 'loan.ta@gmail.com', 'default_student.png', 'Sở Y Tế', '', '2025-11-28', '1', 'dang_hoc', '2');
INSERT INTO students VALUES('30', 'Phan Anh Tuấn', '1990-12-20', 'Nam', '0909456456', '0909456456', 'tuan.phan@gmail.com', 'default_student.png', 'Bưu điện Tỉnh', '', '2025-11-28', '1', 'da_nghi', '');
INSERT INTO students VALUES('32', 'Phát', '2003-07-14', 'Nam', '0999999999', '0999999999', '', 'default_student.png', '1069 Trần Hưng Đạo', '', '2025-12-06', '1', 'dang_hoc', '2');
INSERT INTO students VALUES('33', 'Phát', '2003-02-24', 'Nam', '0999999998', '0999999998', '', 'default_student.png', '', '', '2025-12-09', '1', 'dang_hoc', '');


CREATE TABLE `teacher_logs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `record_id` int NOT NULL,
  `actor_id` int NOT NULL,
  `action` enum('THEM','SUA','XOA') COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `old_data` json DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `record_id` (`record_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO teacher_logs VALUES('1', '13', '0', 'SUA', 'Trạng thái thay đổi: dang_day -> tam_nghi', '{\"new_status\": \"tam_nghi\", \"old_status\": \"dang_day\"}', '2025-11-29 10:38:32');
INSERT INTO teacher_logs VALUES('2', '11', '0', 'SUA', 'Trạng thái thay đổi: dang_day -> nghi_phep', '{\"new_status\": \"nghi_phep\", \"old_status\": \"dang_day\"}', '2025-11-29 10:38:47');
INSERT INTO teacher_logs VALUES('3', '11', '0', 'SUA', 'Trạng thái thay đổi: nghi_phep -> thu_viec', '{\"new_status\": \"thu_viec\", \"old_status\": \"nghi_phep\"}', '2025-11-29 10:38:57');
INSERT INTO teacher_logs VALUES('4', '6', '0', 'SUA', 'Trạng thái thay đổi: dang_day -> nghi_viec', '{\"new_status\": \"nghi_viec\", \"old_status\": \"dang_day\"}', '2025-11-29 10:39:08');
INSERT INTO teacher_logs VALUES('5', '2', '0', 'SUA', 'Trạng thái thay đổi: dang_day -> nghi_phep', '{\"new_status\": \"nghi_phep\", \"old_status\": \"dang_day\"}', '2025-11-29 10:39:27');
INSERT INTO teacher_logs VALUES('6', '4', '0', 'SUA', 'Trạng thái thay đổi: dang_day -> nghi_phep', '{\"new_status\": \"nghi_phep\", \"old_status\": \"dang_day\"}', '2025-11-29 10:40:01');
INSERT INTO teacher_logs VALUES('7', '7', '0', 'SUA', 'Trạng thái thay đổi: dang_day -> tam_nghi', '{\"new_status\": \"tam_nghi\", \"old_status\": \"dang_day\"}', '2025-11-29 10:40:19');
INSERT INTO teacher_logs VALUES('8', '14', '0', 'SUA', 'Trạng thái thay đổi: thu_viec -> dang_day', '{\"new_status\": \"dang_day\", \"old_status\": \"thu_viec\"}', '2025-11-30 06:49:36');
INSERT INTO teacher_logs VALUES('9', '14', '3', 'SUA', 'Cập nhật hồ sơ giảng viên: Trần Hoài Nam', '{\"id\": 14, \"dob\": \"2000-06-15\", \"p_c\": \"IELTS 7.5, TOEIC 980\", \"note\": null, \"email\": \"nam.tran@email.com\", \"phone\": \"0909123456\", \"avatar\": \"default_avatar.png\", \"gender\": \"Nam\", \"status\": \"thu_viec\", \"code_name\": \"T.Nam\", \"full_name\": \"Trần Hoài Nam\", \"specialty\": \"Cử Nhân\", \"experience\": \"3 năm\", \"university\": \"Đại học Sư Phạm TP.HCM\"}', '2025-11-30 06:49:36');
INSERT INTO teacher_logs VALUES('10', '15', '3', 'THEM', 'Thêm hồ sơ giảng viên: Lâm Gia Linh', '', '2025-11-30 06:53:45');
INSERT INTO teacher_logs VALUES('11', '15', '3', 'SUA', 'Cập nhật hồ sơ giảng viên: Lâm Gia Linh', '{\"id\": 15, \"dob\": \"1985-03-20\", \"p_c\": \"Ielts 7.0, TOEIC 890\", \"note\": null, \"email\": \"linhlam@gmail.com\", \"phone\": \"0988637456\", \"avatar\": \"default_avatar.png\", \"gender\": \"Nu\", \"status\": \"thu_viec\", \"code_name\": \"Linh\", \"full_name\": \"Lâm Gia Linh\", \"specialty\": \"Cử Nhân\", \"experience\": \"Mới ra trường\", \"university\": \"Đại học Công Nghệ TP.HCM\"}', '2025-11-30 06:54:23');
INSERT INTO teacher_logs VALUES('12', '9', '3', 'SUA', 'Cập nhật hồ sơ giảng viên: Vũ Thị Lan Anh', '{\"id\": 9, \"dob\": \"1993-06-18\", \"p_c\": \"TESOL, CELTA\", \"note\": null, \"email\": \"lananh.vu@engbreak.edu.vn\", \"phone\": \"0966778899\", \"avatar\": \"default.png\", \"gender\": \"Nu\", \"status\": \"dang_day\", \"code_name\": \"Anh\", \"full_name\": \"Vũ Thị Lan Anh\", \"specialty\": \"Thạc Sĩ\", \"experience\": \"7 năm\", \"university\": \"Đại học Ngoại Ngữ\"}', '2025-11-30 06:54:43');
INSERT INTO teacher_logs VALUES('13', '14', '3', 'SUA', 'Cập nhật hồ sơ giảng viên: Trần Hoài Nam', '{\"id\": 14, \"dob\": \"2000-06-15\", \"p_c\": \"IELTS 7.5, TOEIC 980\", \"note\": null, \"email\": \"nam.tran@email.com\", \"phone\": \"0909123456\", \"avatar\": \"default_avatar.png\", \"gender\": \"Nam\", \"status\": \"dang_day\", \"code_name\": \"T.Nam\", \"full_name\": \"Trần Hoài Nam\", \"specialty\": \"Cử Nhân\", \"experience\": \"3 năm\", \"university\": \"Đại học Sư Phạm TP.HCM\"}', '2025-11-30 06:55:03');
INSERT INTO teacher_logs VALUES('14', '13', '0', 'SUA', 'Trạng thái thay đổi: tam_nghi -> nghi_phep', '{\"new_status\": \"nghi_phep\", \"old_status\": \"tam_nghi\"}', '2025-11-30 11:05:58');
INSERT INTO teacher_logs VALUES('15', '13', '2', 'SUA', 'Cập nhật hồ sơ giảng viên: Đặng Thùy Dương', '{\"id\": 13, \"dob\": \"1994-10-12\", \"p_c\": \"Ielts 7.5\\r\\nTOEIC 920\\r\\n\", \"note\": null, \"email\": \"duong.dang@engbreak.edu.vn\", \"phone\": \"0955667788\", \"avatar\": \"default.png\", \"gender\": \"Nu\", \"status\": \"tam_nghi\", \"code_name\": \"Dương\", \"full_name\": \"Đặng Thùy Dương\", \"specialty\": \"Cử Nhân\", \"experience\": \"4 năm\", \"university\": \"Đại học Ngoại Thương\"}', '2025-11-30 11:05:58');
INSERT INTO teacher_logs VALUES('16', '13', '2', 'SUA', 'Cập nhật hồ sơ giảng viên: Đặng Thùy Dương', '{\"id\": 13, \"dob\": \"1994-10-12\", \"p_c\": \"Ielts 7.5\\r\\nTOEIC 920\", \"note\": null, \"email\": \"duong.dang@engbreak.edu.vn\", \"phone\": \"0955667788\", \"avatar\": \"default.png\", \"gender\": \"Nu\", \"status\": \"nghi_phep\", \"code_name\": \"Dương\", \"full_name\": \"Đặng Thùy Dương\", \"specialty\": \"Cử Nhân\", \"experience\": \"4 năm\", \"university\": \"Đại học Ngoại Thương\"}', '2025-11-30 11:08:14');
INSERT INTO teacher_logs VALUES('17', '16', '2', 'THEM', 'Thêm hồ sơ giảng viên: Bùi Trần Nhật Quang', '', '2025-11-30 20:09:21');


CREATE TABLE `teachers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `code_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` enum('Nam','Nu') COLLATE utf8mb4_general_ci DEFAULT 'Nu',
  `phone` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `university` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `p_c` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci COMMENT 'Chứng chỉ chuyên môn (Professional Certifications)',
  `experience` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'Kinh nghiệm làm việc',
  `specialty` enum('Cử Nhân','Thạc Sĩ','Tiến Sĩ','Khác') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'Khác',
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `status` enum('dang_day','tam_nghi','nghi_phep','nghi_viec','thu_viec') COLLATE utf8mb4_general_ci DEFAULT 'thu_viec',
  `avatar` varchar(255) COLLATE utf8mb4_general_ci DEFAULT 'default_avatar.png',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO teachers VALUES('1', 'Lê Dương Bảo Lâm', 'Lâm', '1986-03-13', 'Nam', '0846245235', 'lamduongle@gmail.com', 'Đại học Cần Thơ', 'TEFL 120h
TESOL Advanced
Ielts 7.5', '10 năm', 'Thạc Sĩ', '', 'dang_day', 'default.png');
INSERT INTO teachers VALUES('2', 'Kiều Minh Tuấn', 'K.Tuấn', '1979-02-22', 'Nam', '0846784523', 'minhtuankieu@gmail.com', 'Đại học Huế', 'Iellts 7.0
TOEIC 850
TOEFL iBT 105', '4 năm', 'Cử Nhân', '', 'nghi_phep', 'default.png');
INSERT INTO teachers VALUES('3', 'Lê Dương Bảo Đảm', 'Đảm', '1989-12-30', 'Nu', '0945647345', 'duongle12@gmail.com', 'Đại học Mở TPHCM', 'TESOL Advanced
CELTA Pass B
Ielts 7.5', '2 năm', 'Cử Nhân', '', 'dang_day', 'default.png');
INSERT INTO teachers VALUES('4', 'Nguyễn Thu Trang', 'Trang', '1992-05-15', 'Nu', '0901234567', 'trang.nguyen@engbreak.edu.vn', 'Đại học Sư Phạm TP.HCM', 'IELTS 7.5', '5 năm', 'Cử Nhân', '', 'nghi_phep', 'default.png');
INSERT INTO teachers VALUES('5', 'Trần Văn Hùng', 'Hùng', '1988-11-20', 'Nam', '0912345678', 'hung.tran@engbreak.edu.vn', 'Đại học Hà Nội', 'TOEIC 900', '3 năm', 'Cử Nhân', '', 'dang_day', 'default.png');
INSERT INTO teachers VALUES('6', 'Phạm Minh Tuấn', 'P.Tuấn', '1995-03-10', 'Nam', '0987654321', 'tuan.pham@engbreak.edu.vn', 'Đại học Văn Lang', 'Ielts 7.0', '3 năm', 'Cử Nhân', '', 'nghi_viec', 'default.png');
INSERT INTO teachers VALUES('7', 'Lê Thị Mai', 'Mai', '1990-08-25', 'Nu', '0933445566', 'mai.le@engbreak.edu.vn', 'Đại học Sư Phạm Hà Nội', 'Ielts 8.0', '7 năm', 'Cử Nhân', '', 'tam_nghi', 'default.png');
INSERT INTO teachers VALUES('8', 'Hoàng Đức Thắng', 'Thắng', '1985-12-05', 'Nam', '0977889900', 'thang.hoang@engbreak.edu.vn', 'Học viện Ngoại Giao', 'IELTS 8.0', '9 năm', 'Thạc Sĩ', '', 'dang_day', 'default.png');
INSERT INTO teachers VALUES('9', 'Vũ Thị Lan Anh', 'Anh', '1993-06-18', 'Nu', '0966778899', 'lananh.vu@engbreak.edu.vn', 'Đại học Ngoại Ngữ', 'TESOL
CELTA', '7 năm', 'Thạc Sĩ', '', 'dang_day', 'default.png');
INSERT INTO teachers VALUES('10', 'Đỗ Quang Minh', 'Minh', '1979-09-30', 'Nam', '0944556677', 'minh.do@engbreak.edu.vn', 'Đại học Quốc Gia Hà Nội', 'Ielts 9.0
TOEFL iBT 110+
DELTA
CELTA
Teacher Trainer Certificate', '20 năm', 'Tiến Sĩ', '', 'dang_day', 'default.png');
INSERT INTO teachers VALUES('11', 'Bùi Phương Thảo', 'Thảo', '1996-02-14', 'Nu', '0922334455', 'thao.bui@engbreak.edu.vn', 'RMIT University', 'TESOL
Ielts 7.5', '2 năm', 'Cử Nhân', '', 'thu_viec', 'default.png');
INSERT INTO teachers VALUES('12', 'Ngô Văn Nam', 'Nam', '1989-07-22', 'Nam', '0911223344', 'nam.ngo@engbreak.edu.vn', 'Đại học Mở TP.HCM', 'Ielts 7.0
TOEIC 900
', '7 năm', 'Cử Nhân', '', 'dang_day', 'default.png');
INSERT INTO teachers VALUES('13', 'Đặng Thùy Dương', 'Dương', '1994-10-12', 'Nu', '0955667788', 'duong.dang@engbreak.edu.vn', 'Đại học Ngoại Thương', 'Ielts 7.5
TOEIC 920', '4 năm', 'Cử Nhân', '', 'nghi_phep', 'default.png');
INSERT INTO teachers VALUES('14', 'Trần Hoài Nam', 'T.Nam', '2000-06-15', 'Nam', '0909123456', 'nam.tran@email.com', 'Đại học Sư Phạm TP.HCM', 'IELTS 7.5
TOEIC 980', '3 năm', 'Cử Nhân', '', 'dang_day', 'default_avatar.png');
INSERT INTO teachers VALUES('15', 'Lâm Gia Linh', 'Linh', '1985-03-20', 'Nu', '0988637456', 'linhlam@gmail.com', 'Đại học Công Nghệ TP.HCM', 'Ielts 7.0
TOEIC 890', 'Mới ra trường', 'Cử Nhân', '', 'thu_viec', 'default_avatar.png');
INSERT INTO teachers VALUES('16', 'Bùi Trần Nhật Quang', 'Quang', '1982-04-19', 'Nam', '0987674574', 'quangbuitrannhat@gmail.com', 'Trường Đại học Sư Phạm Kỹ Thuật TP.HCM', 'Ielts 8.0
TOEIC 950
CELTA
DELTA', '10 năm', 'Cử Nhân', '', 'thu_viec', 'default_avatar.png');


CREATE TABLE `tuition_logs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `record_id` int NOT NULL,
  `actor_id` int NOT NULL,
  `action` enum('THEM','SUA','XOA') COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `old_data` json DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tuition_logs VALUES('1', '1', '2', '', 'Thu 1800000 VNĐ của Nguyễn Văn An (8 tuần)', '', '2025-12-02 23:39:52');
INSERT INTO tuition_logs VALUES('2', '1', '2', '', 'Thu 1800000 VNĐ của Nguyễn Văn An (8 tuần)', '', '2025-12-02 23:40:42');
INSERT INTO tuition_logs VALUES('3', '31', '2', '', 'Thu 9405000 VNĐ của Tạ Minh Hậu (16 tuần)', '', '2025-12-02 23:40:55');
INSERT INTO tuition_logs VALUES('4', '2', '2', '', 'Thu 3600000 VNĐ của Trần Thị Bích (8 tuần)', '', '2025-12-02 23:41:02');
INSERT INTO tuition_logs VALUES('5', '3', '2', '', 'Thu 3600000 VNĐ của Lê Hoàng Nam (8 tuần)', '', '2025-12-02 23:41:05');
INSERT INTO tuition_logs VALUES('6', '4', '2', '', 'Thu 1800000 VNĐ của Phạm Minh Khôi (8 tuần)', '', '2025-12-02 23:41:08');
INSERT INTO tuition_logs VALUES('7', '5', '2', '', 'Thu 2700000 VNĐ của Nguyễn Thị Mai (8 tuần)', '', '2025-12-02 23:41:11');
INSERT INTO tuition_logs VALUES('8', '6', '2', '', 'Thu 0 VNĐ của Hoàng Văn Long (8 tuần)', '', '2025-12-02 23:41:14');
INSERT INTO tuition_logs VALUES('9', '6', '2', '', 'Thu 0 VNĐ của Hoàng Văn Long (8 tuần)', '', '2025-12-02 23:41:41');
INSERT INTO tuition_logs VALUES('10', '11', '2', '', 'Thu 2800000 VNĐ của Nguyễn Bảo Ngọc (8 tuần)', '', '2025-12-02 23:41:50');
INSERT INTO tuition_logs VALUES('11', '7', '2', '', 'Thu 3600000 VNĐ của Đoàn Thu Hà (8 tuần)', '', '2025-12-02 23:41:54');
INSERT INTO tuition_logs VALUES('12', '8', '2', '', 'Thu 3420000 VNĐ của Vũ Đức Thắng (16 tuần)', '', '2025-12-02 23:41:57');
INSERT INTO tuition_logs VALUES('13', '9', '2', '', 'Thu 6840000 VNĐ của Ngô Bảo Châu (16 tuần)', '', '2025-12-02 23:42:00');
INSERT INTO tuition_logs VALUES('14', '10', '2', '', 'Thu 5130000 VNĐ của Lý Hải Đăng (16 tuần)', '', '2025-12-02 23:42:04');
INSERT INTO tuition_logs VALUES('15', '12', '2', '', 'Thu 2800000 VNĐ của Trần Minh Khôi (8 tuần)', '', '2025-12-02 23:42:07');
INSERT INTO tuition_logs VALUES('16', '13', '2', '', 'Thu 4000000 VNĐ của Lê Gia Hân (8 tuần)', '', '2025-12-02 23:42:10');
INSERT INTO tuition_logs VALUES('17', '14', '2', '', 'Thu 2090000 VNĐ của Phạm Đức Anh (8 tuần)', '', '2025-12-02 23:42:12');
INSERT INTO tuition_logs VALUES('18', '15', '2', '', 'Thu 2800000 VNĐ của Hoàng Yến Nhi (8 tuần)', '', '2025-12-02 23:42:16');
INSERT INTO tuition_logs VALUES('19', '16', '2', '', 'Thu 4000000 VNĐ của Vũ Tuấn Kiệt (8 tuần)', '', '2025-12-02 23:42:19');
INSERT INTO tuition_logs VALUES('20', '17', '2', '', 'Thu 2800000 VNĐ của Đặng Minh Châu (8 tuần)', '', '2025-12-02 23:42:21');
INSERT INTO tuition_logs VALUES('21', '18', '2', '', 'Thu 2200000 VNĐ của Bùi Tiến Dũng (8 tuần)', '', '2025-12-02 23:42:24');
INSERT INTO tuition_logs VALUES('22', '19', '2', '', 'Thu 2660000 VNĐ của Ngô Phương Linh (8 tuần)', '', '2025-12-02 23:42:26');
INSERT INTO tuition_logs VALUES('23', '20', '2', '', 'Thu 2660000 VNĐ của Dương Văn Hậu (8 tuần)', '', '2025-12-02 23:42:30');
INSERT INTO tuition_logs VALUES('24', '21', '2', '', 'Thu 2660000 VNĐ của Hồ Thị Thu (8 tuần)', '', '2025-12-02 23:42:32');
INSERT INTO tuition_logs VALUES('25', '22', '2', '', 'Thu 2850000 VNĐ của Lý Văn Cường (8 tuần)', '', '2025-12-02 23:42:35');
INSERT INTO tuition_logs VALUES('26', '23', '2', '', 'Thu 1900000 VNĐ của Mai Thị Tuyết (8 tuần)', '', '2025-12-02 23:42:37');
INSERT INTO tuition_logs VALUES('27', '24', '2', '', 'Thu 3600000 VNĐ của Trương Tấn Sang (8 tuần)', '', '2025-12-02 23:42:41');
INSERT INTO tuition_logs VALUES('28', '25', '2', '', 'Thu 1980000 VNĐ của Võ Thị Bích (8 tuần)', '', '2025-12-02 23:42:44');
INSERT INTO tuition_logs VALUES('29', '26', '2', '', 'Thu 2520000 VNĐ của Đinh Văn Lâm (8 tuần)', '', '2025-12-02 23:42:47');
INSERT INTO tuition_logs VALUES('30', '27', '2', '', 'Thu 2850000 VNĐ của Lương Thùy Linh (8 tuần)', '', '2025-12-02 23:42:50');
INSERT INTO tuition_logs VALUES('31', '28', '2', '', 'Thu 2660000 VNĐ của Quách Ngọc Ngoan (8 tuần)', '', '2025-12-02 23:42:55');
INSERT INTO tuition_logs VALUES('32', '29', '2', '', 'Thu 1800000 VNĐ của Tạ Bích Loan (8 tuần)', '', '2025-12-02 23:42:58');
INSERT INTO tuition_logs VALUES('33', '30', '2', '', 'Thu 4000000 VNĐ của Phan Anh Tuấn (8 tuần)', '', '2025-12-02 23:43:01');
INSERT INTO tuition_logs VALUES('34', '30', '2', '', 'Thu 4000000 VNĐ của Phan Anh Tuấn (8 tuần)', '', '2025-12-02 23:46:42');
INSERT INTO tuition_logs VALUES('35', '30', '2', '', 'Thu 4000000 VNĐ của Phan Anh Tuấn (8 tuần)', '', '2025-12-02 23:56:16');
INSERT INTO tuition_logs VALUES('36', '30', '2', '', 'Thu 4000000 VNĐ của Phan Anh Tuấn (8 tuần)', '', '2025-12-03 00:01:10');
INSERT INTO tuition_logs VALUES('37', '30', '2', '', 'Thu 4000000 VNĐ của Phan Anh Tuấn (8 tuần)', '', '2025-12-03 00:05:33');
INSERT INTO tuition_logs VALUES('38', '30', '2', '', 'Thu 4000000 VNĐ của Phan Anh Tuấn (8 tuần)', '', '2025-12-03 00:06:01');
INSERT INTO tuition_logs VALUES('39', '30', '2', '', 'Thu 4000000 VNĐ của Phan Anh Tuấn (8 tuần)', '', '2025-12-03 00:06:14');
INSERT INTO tuition_logs VALUES('40', '30', '2', '', 'Thu 4000000 VNĐ của Phan Anh Tuấn (8 tuần)', '', '2025-12-03 00:06:36');
INSERT INTO tuition_logs VALUES('41', '30', '2', '', 'Thu 4000000 VNĐ của Phan Anh Tuấn (8 tuần)', '', '2025-12-03 00:06:59');
INSERT INTO tuition_logs VALUES('42', '30', '2', '', 'Thu 4000000 đ của Phan Anh Tuấn (8 tuần) qua Tiền mặt', '', '2025-12-03 00:10:51');
INSERT INTO tuition_logs VALUES('43', '30', '2', '', 'Thu 4000000 đ của Phan Anh Tuấn (8 tuần) qua Tiền mặt', '', '2025-12-03 00:12:09');
INSERT INTO tuition_logs VALUES('44', '2', '2', '', 'Thu 3600000 đ của Trần Thị Bích (8 tuần) qua Chuyển khoản QR', '', '2025-12-03 00:12:30');
INSERT INTO tuition_logs VALUES('45', '3', '2', '', 'Thu 3600000 đ của Lê Hoàng Nam (8 tuần) qua Tiền mặt', '', '2025-12-03 00:24:26');
INSERT INTO tuition_logs VALUES('46', '3', '2', '', 'Thu 3600000 đ của Lê Hoàng Nam (8 tuần) qua Tiền mặt', '', '2025-12-03 00:25:23');
INSERT INTO tuition_logs VALUES('47', '11', '2', '', 'Thu 2800000 đ của Nguyễn Bảo Ngọc (8 tuần) qua Chuyển khoản QR', '', '2025-12-03 00:25:46');
INSERT INTO tuition_logs VALUES('48', '5', '2', '', 'Thu phí Nguyễn Thị Mai (8 tuần): 2700000 đ', '', '2025-12-03 23:05:19');
INSERT INTO tuition_logs VALUES('49', '5', '2', '', 'Thu phí Nguyễn Thị Mai (8 tuần): 2700000 đ', '', '2025-12-03 23:07:10');
INSERT INTO tuition_logs VALUES('50', '4', '2', '', 'Thu phí Phạm Minh Khôi (8 tuần): 1800000 đ', '', '2025-12-03 23:07:30');
INSERT INTO tuition_logs VALUES('51', '7', '2', '', 'Thu phí Đoàn Thu Hà (8 tuần): 3600000 đ', '', '2025-12-03 23:07:56');
INSERT INTO tuition_logs VALUES('52', '28', '2', '', 'Thu phí Quách Ngọc Ngoan (8 tuần): 2660000 đ', '', '2025-12-03 23:09:00');
INSERT INTO tuition_logs VALUES('53', '12', '2', '', 'Thu phí Trần Minh Khôi (8 tuần): 2800000 đ', '', '2025-12-06 02:50:14');
INSERT INTO tuition_logs VALUES('54', '13', '2', '', 'Thu phí Lê Gia Hân (16 tuần): 7600000 đ', '', '2025-12-06 14:05:51');
INSERT INTO tuition_logs VALUES('55', '14', '2', '', 'Thu phí Phạm Đức Anh (8 tuần): 2090000 đ', '', '2025-12-06 15:48:01');
INSERT INTO tuition_logs VALUES('56', '25', '2', '', 'Thu phí Võ Thị Bích (8 tuần): 1980000 đ', '', '2025-12-06 15:50:06');


CREATE TABLE `tuition_packages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `level_id` int NOT NULL,
  `week_duration` int NOT NULL,
  `tuition_fee` decimal(12,2) NOT NULL,
  `sessions_per_week` int DEFAULT '3',
  `price_per_session` decimal(12,2) GENERATED ALWAYS AS ((`tuition_fee` / (`week_duration` * `sessions_per_week`))) STORED,
  PRIMARY KEY (`id`),
  KEY `level_id` (`level_id`)
) ENGINE=MyISAM AUTO_INCREMENT=145 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tuition_packages VALUES('1', '5', '8', '2000000.00', '3', '83333.33');
INSERT INTO tuition_packages VALUES('2', '5', '16', '3800000.00', '3', '79166.67');
INSERT INTO tuition_packages VALUES('3', '5', '32', '7200000.00', '3', '75000.00');
INSERT INTO tuition_packages VALUES('4', '5', '48', '10200000.00', '3', '70833.33');
INSERT INTO tuition_packages VALUES('5', '6', '8', '2200000.00', '3', '91666.67');
INSERT INTO tuition_packages VALUES('6', '6', '16', '4180000.00', '3', '87083.33');
INSERT INTO tuition_packages VALUES('7', '6', '32', '7920000.00', '3', '82500.00');
INSERT INTO tuition_packages VALUES('8', '6', '48', '11220000.00', '3', '77916.67');
INSERT INTO tuition_packages VALUES('9', '7', '8', '2400000.00', '3', '100000.00');
INSERT INTO tuition_packages VALUES('10', '7', '16', '4560000.00', '3', '95000.00');
INSERT INTO tuition_packages VALUES('11', '7', '32', '8640000.00', '3', '90000.00');
INSERT INTO tuition_packages VALUES('12', '7', '48', '12240000.00', '3', '85000.00');
INSERT INTO tuition_packages VALUES('13', '8', '8', '2600000.00', '3', '108333.33');
INSERT INTO tuition_packages VALUES('14', '8', '16', '4940000.00', '3', '102916.67');
INSERT INTO tuition_packages VALUES('15', '8', '32', '9360000.00', '3', '97500.00');
INSERT INTO tuition_packages VALUES('16', '8', '48', '13260000.00', '3', '92083.33');
INSERT INTO tuition_packages VALUES('17', '4', '8', '2800000.00', '3', '116666.67');
INSERT INTO tuition_packages VALUES('18', '4', '16', '5320000.00', '3', '110833.33');
INSERT INTO tuition_packages VALUES('19', '4', '32', '10080000.00', '3', '105000.00');
INSERT INTO tuition_packages VALUES('20', '4', '48', '14280000.00', '3', '99166.67');
INSERT INTO tuition_packages VALUES('21', '9', '8', '3000000.00', '3', '125000.00');
INSERT INTO tuition_packages VALUES('22', '9', '16', '5700000.00', '3', '118750.00');
INSERT INTO tuition_packages VALUES('23', '9', '32', '10800000.00', '3', '112500.00');
INSERT INTO tuition_packages VALUES('24', '9', '48', '15300000.00', '3', '106250.00');
INSERT INTO tuition_packages VALUES('25', '10', '8', '2500000.00', '3', '104166.67');
INSERT INTO tuition_packages VALUES('26', '10', '16', '4750000.00', '3', '98958.33');
INSERT INTO tuition_packages VALUES('27', '10', '32', '9000000.00', '3', '93750.00');
INSERT INTO tuition_packages VALUES('28', '10', '48', '12750000.00', '3', '88541.67');
INSERT INTO tuition_packages VALUES('29', '11', '8', '2800000.00', '3', '116666.67');
INSERT INTO tuition_packages VALUES('30', '11', '16', '5320000.00', '3', '110833.33');
INSERT INTO tuition_packages VALUES('31', '11', '32', '10080000.00', '3', '105000.00');
INSERT INTO tuition_packages VALUES('32', '11', '48', '14280000.00', '3', '99166.67');
INSERT INTO tuition_packages VALUES('33', '12', '8', '3200000.00', '3', '133333.33');
INSERT INTO tuition_packages VALUES('34', '12', '16', '6080000.00', '3', '126666.67');
INSERT INTO tuition_packages VALUES('35', '12', '32', '11520000.00', '3', '120000.00');
INSERT INTO tuition_packages VALUES('36', '12', '48', '16320000.00', '3', '113333.33');
INSERT INTO tuition_packages VALUES('37', '19', '8', '2800000.00', '3', '116666.67');
INSERT INTO tuition_packages VALUES('38', '19', '16', '5320000.00', '3', '110833.33');
INSERT INTO tuition_packages VALUES('39', '19', '32', '10080000.00', '3', '105000.00');
INSERT INTO tuition_packages VALUES('40', '19', '48', '14280000.00', '3', '99166.67');
INSERT INTO tuition_packages VALUES('41', '20', '8', '3000000.00', '3', '125000.00');
INSERT INTO tuition_packages VALUES('42', '20', '16', '5700000.00', '3', '118750.00');
INSERT INTO tuition_packages VALUES('43', '20', '32', '10800000.00', '3', '112500.00');
INSERT INTO tuition_packages VALUES('44', '20', '48', '15300000.00', '3', '106250.00');
INSERT INTO tuition_packages VALUES('45', '21', '8', '3500000.00', '3', '145833.33');
INSERT INTO tuition_packages VALUES('46', '21', '16', '6650000.00', '3', '138541.67');
INSERT INTO tuition_packages VALUES('47', '21', '32', '12600000.00', '3', '131250.00');
INSERT INTO tuition_packages VALUES('48', '21', '48', '17850000.00', '3', '123958.33');
INSERT INTO tuition_packages VALUES('49', '13', '8', '3500000.00', '3', '145833.33');
INSERT INTO tuition_packages VALUES('50', '13', '16', '6650000.00', '3', '138541.67');
INSERT INTO tuition_packages VALUES('51', '13', '32', '12600000.00', '3', '131250.00');
INSERT INTO tuition_packages VALUES('52', '13', '48', '17850000.00', '3', '123958.33');
INSERT INTO tuition_packages VALUES('53', '14', '8', '4000000.00', '3', '166666.67');
INSERT INTO tuition_packages VALUES('54', '14', '16', '7600000.00', '3', '158333.33');
INSERT INTO tuition_packages VALUES('55', '14', '32', '14400000.00', '3', '150000.00');
INSERT INTO tuition_packages VALUES('56', '14', '48', '20400000.00', '3', '141666.67');
INSERT INTO tuition_packages VALUES('57', '15', '8', '4500000.00', '3', '187500.00');
INSERT INTO tuition_packages VALUES('58', '15', '16', '8550000.00', '3', '178125.00');
INSERT INTO tuition_packages VALUES('59', '15', '32', '16200000.00', '3', '168750.00');
INSERT INTO tuition_packages VALUES('60', '15', '48', '22950000.00', '3', '159375.00');
INSERT INTO tuition_packages VALUES('61', '16', '8', '5000000.00', '3', '208333.33');
INSERT INTO tuition_packages VALUES('62', '16', '16', '9500000.00', '3', '197916.67');
INSERT INTO tuition_packages VALUES('63', '16', '32', '18000000.00', '3', '187500.00');
INSERT INTO tuition_packages VALUES('64', '16', '48', '25500000.00', '3', '177083.33');
INSERT INTO tuition_packages VALUES('65', '17', '8', '5500000.00', '3', '229166.67');
INSERT INTO tuition_packages VALUES('66', '17', '16', '10450000.00', '3', '217708.33');
INSERT INTO tuition_packages VALUES('67', '17', '32', '19800000.00', '3', '206250.00');
INSERT INTO tuition_packages VALUES('68', '17', '48', '28050000.00', '3', '194791.67');
INSERT INTO tuition_packages VALUES('69', '18', '8', '6000000.00', '3', '250000.00');
INSERT INTO tuition_packages VALUES('70', '18', '16', '11400000.00', '3', '237500.00');
INSERT INTO tuition_packages VALUES('71', '18', '32', '21600000.00', '3', '225000.00');
INSERT INTO tuition_packages VALUES('72', '18', '48', '30600000.00', '3', '212500.00');
INSERT INTO tuition_packages VALUES('73', '5', '8', '2000000.00', '2', '125000.00');
INSERT INTO tuition_packages VALUES('74', '5', '16', '3800000.00', '2', '118750.00');
INSERT INTO tuition_packages VALUES('75', '5', '32', '7200000.00', '2', '112500.00');
INSERT INTO tuition_packages VALUES('76', '5', '48', '10200000.00', '2', '106250.00');
INSERT INTO tuition_packages VALUES('77', '6', '8', '2200000.00', '2', '137500.00');
INSERT INTO tuition_packages VALUES('78', '6', '16', '4180000.00', '2', '130625.00');
INSERT INTO tuition_packages VALUES('79', '6', '32', '7920000.00', '2', '123750.00');
INSERT INTO tuition_packages VALUES('80', '6', '48', '11220000.00', '2', '116875.00');
INSERT INTO tuition_packages VALUES('81', '7', '8', '2400000.00', '2', '150000.00');
INSERT INTO tuition_packages VALUES('82', '7', '16', '4560000.00', '2', '142500.00');
INSERT INTO tuition_packages VALUES('83', '7', '32', '8640000.00', '2', '135000.00');
INSERT INTO tuition_packages VALUES('84', '7', '48', '12240000.00', '2', '127500.00');
INSERT INTO tuition_packages VALUES('85', '8', '8', '2600000.00', '2', '162500.00');
INSERT INTO tuition_packages VALUES('86', '8', '16', '4940000.00', '2', '154375.00');
INSERT INTO tuition_packages VALUES('87', '8', '32', '9360000.00', '2', '146250.00');
INSERT INTO tuition_packages VALUES('88', '8', '48', '13260000.00', '2', '138125.00');
INSERT INTO tuition_packages VALUES('89', '4', '8', '2800000.00', '2', '175000.00');
INSERT INTO tuition_packages VALUES('90', '4', '16', '5320000.00', '2', '166250.00');
INSERT INTO tuition_packages VALUES('91', '4', '32', '10080000.00', '2', '157500.00');
INSERT INTO tuition_packages VALUES('92', '4', '48', '14280000.00', '2', '148750.00');
INSERT INTO tuition_packages VALUES('93', '9', '8', '3000000.00', '2', '187500.00');
INSERT INTO tuition_packages VALUES('94', '9', '16', '5700000.00', '2', '178125.00');
INSERT INTO tuition_packages VALUES('95', '9', '32', '10800000.00', '2', '168750.00');
INSERT INTO tuition_packages VALUES('96', '9', '48', '15300000.00', '2', '159375.00');
INSERT INTO tuition_packages VALUES('97', '10', '8', '2500000.00', '2', '156250.00');
INSERT INTO tuition_packages VALUES('98', '10', '16', '4750000.00', '2', '148437.50');
INSERT INTO tuition_packages VALUES('99', '10', '32', '9000000.00', '2', '140625.00');
INSERT INTO tuition_packages VALUES('100', '10', '48', '12750000.00', '2', '132812.50');
INSERT INTO tuition_packages VALUES('101', '11', '8', '2800000.00', '2', '175000.00');
INSERT INTO tuition_packages VALUES('102', '11', '16', '5320000.00', '2', '166250.00');
INSERT INTO tuition_packages VALUES('103', '11', '32', '10080000.00', '2', '157500.00');
INSERT INTO tuition_packages VALUES('104', '11', '48', '14280000.00', '2', '148750.00');
INSERT INTO tuition_packages VALUES('105', '12', '8', '3200000.00', '2', '200000.00');
INSERT INTO tuition_packages VALUES('106', '12', '16', '6080000.00', '2', '190000.00');
INSERT INTO tuition_packages VALUES('107', '12', '32', '11520000.00', '2', '180000.00');
INSERT INTO tuition_packages VALUES('108', '12', '48', '16320000.00', '2', '170000.00');
INSERT INTO tuition_packages VALUES('109', '19', '8', '2800000.00', '2', '175000.00');
INSERT INTO tuition_packages VALUES('110', '19', '16', '5320000.00', '2', '166250.00');
INSERT INTO tuition_packages VALUES('111', '19', '32', '10080000.00', '2', '157500.00');
INSERT INTO tuition_packages VALUES('112', '19', '48', '14280000.00', '2', '148750.00');
INSERT INTO tuition_packages VALUES('113', '20', '8', '3000000.00', '2', '187500.00');
INSERT INTO tuition_packages VALUES('114', '20', '16', '5700000.00', '2', '178125.00');
INSERT INTO tuition_packages VALUES('115', '20', '32', '10800000.00', '2', '168750.00');
INSERT INTO tuition_packages VALUES('116', '20', '48', '15300000.00', '2', '159375.00');
INSERT INTO tuition_packages VALUES('117', '21', '8', '3500000.00', '2', '218750.00');
INSERT INTO tuition_packages VALUES('118', '21', '16', '6650000.00', '2', '207812.50');
INSERT INTO tuition_packages VALUES('119', '21', '32', '12600000.00', '2', '196875.00');
INSERT INTO tuition_packages VALUES('120', '21', '48', '17850000.00', '2', '185937.50');
INSERT INTO tuition_packages VALUES('121', '13', '8', '3500000.00', '2', '218750.00');
INSERT INTO tuition_packages VALUES('122', '13', '16', '6650000.00', '2', '207812.50');
INSERT INTO tuition_packages VALUES('123', '13', '32', '12600000.00', '2', '196875.00');
INSERT INTO tuition_packages VALUES('124', '13', '48', '17850000.00', '2', '185937.50');
INSERT INTO tuition_packages VALUES('125', '14', '8', '4000000.00', '2', '250000.00');
INSERT INTO tuition_packages VALUES('126', '14', '16', '7600000.00', '2', '237500.00');
INSERT INTO tuition_packages VALUES('127', '14', '32', '14400000.00', '2', '225000.00');
INSERT INTO tuition_packages VALUES('128', '14', '48', '20400000.00', '2', '212500.00');
INSERT INTO tuition_packages VALUES('129', '15', '8', '4500000.00', '2', '281250.00');
INSERT INTO tuition_packages VALUES('130', '15', '16', '8550000.00', '2', '267187.50');
INSERT INTO tuition_packages VALUES('131', '15', '32', '16200000.00', '2', '253125.00');
INSERT INTO tuition_packages VALUES('132', '15', '48', '22950000.00', '2', '239062.50');
INSERT INTO tuition_packages VALUES('133', '16', '8', '5000000.00', '2', '312500.00');
INSERT INTO tuition_packages VALUES('134', '16', '16', '9500000.00', '2', '296875.00');
INSERT INTO tuition_packages VALUES('135', '16', '32', '18000000.00', '2', '281250.00');
INSERT INTO tuition_packages VALUES('136', '16', '48', '25500000.00', '2', '265625.00');
INSERT INTO tuition_packages VALUES('137', '17', '8', '5500000.00', '2', '343750.00');
INSERT INTO tuition_packages VALUES('138', '17', '16', '10450000.00', '2', '326562.50');
INSERT INTO tuition_packages VALUES('139', '17', '32', '19800000.00', '2', '309375.00');
INSERT INTO tuition_packages VALUES('140', '17', '48', '28050000.00', '2', '292187.50');
INSERT INTO tuition_packages VALUES('141', '18', '8', '6000000.00', '2', '375000.00');
INSERT INTO tuition_packages VALUES('142', '18', '16', '11400000.00', '2', '356250.00');
INSERT INTO tuition_packages VALUES('143', '18', '32', '21600000.00', '2', '337500.00');
INSERT INTO tuition_packages VALUES('144', '18', '48', '30600000.00', '2', '318750.00');


CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `full_name` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `role` enum('admin','staff') COLLATE utf8mb4_general_ci DEFAULT 'staff',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO users VALUES('2', 'Admin', '$2y$10$GHyPCFqq.h38CH6KYihiBOsaz0y4VqGZbY.tnba3eBHecQUWjXQyO', 'Huỳnh Bảo Minh Phát', 'admin', '2025-11-23 11:17:52');
INSERT INTO users VALUES('3', 'chidung', '$2y$10$WwArNzxloUmO.yOE1ygy8uJ7ekeGwHZOd9V1PApCvF11zdosg6Tt2', 'Huỳnh Lâm Chí Dũng', 'staff', '2025-11-23 11:33:04');
INSERT INTO users VALUES('4', 'hongmy', '$2y$10$e.eLBolMowHGk8eI2FHlKOdGYrpZ9tEvIenl5crBlpra235hDh1b2', 'Hồng My', 'staff', '2025-11-26 11:35:48');
INSERT INTO users VALUES('5', 'chankiet', '$2y$10$3Uh3B3rZW3iD2QdFtpv5MueJKDiK4j2a0.h64rZH8acmftAy8/xBq', 'Chấn Kiệt', 'staff', '2025-11-27 18:15:14');
INSERT INTO users VALUES('6', 'tuanhuy', '$2y$10$9cOe44nPDNb3HFZjPFrz/u7egczf4QCkKEUBwgoJOJOpHO4U6JXne', 'Nguyễn Tuấn Huy', 'staff', '2025-12-03 14:21:27');
