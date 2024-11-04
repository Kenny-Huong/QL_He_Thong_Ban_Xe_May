<?php
session_start();

// Xóa tất cả các biến phiên
$_SESSION = [];

// Hủy phiên làm việc
session_destroy();

// Kiểm tra và đảm bảo không có đầu ra nào trước khi chuyển hướng
ob_start();
header("Location: home.php");
ob_end_flush();
exit();
?>