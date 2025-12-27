<?php
session_start(); //khởi động session để biết đang hủy cái gì
//khi bấm Back sẽ không hiện lại trang cũ
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
require_once '../connect/db_connect.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: 0_login.php");
    exit();
}
//xóa tất cả các biến session
session_unset(); 
//hủy phiên làm việc trên server
session_destroy(); 
header("Location: 0_login.php");
exit();
?>