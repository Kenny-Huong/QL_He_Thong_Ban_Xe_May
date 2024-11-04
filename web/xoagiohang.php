<?php
require_once ('../db/dbhelper.php');
session_start();

// Kiểm tra đăng nhập
$isLoggedIn = isset($_SESSION['username']) && !empty($_SESSION['username']);
if (!$isLoggedIn) {
    echo '<script>alert("Vui lòng đăng nhập để xóa sản phẩm!"); window.location.href = "dangnhap.php";</script>';
    exit;
}

// Lấy tên người dùng từ session
$username = $_SESSION['username'];

// Kiểm tra nếu có ID sản phẩm cần xóa
if (isset($_GET['id'])) {
    $idToDelete = $_GET['id'];

    // Xóa sản phẩm khỏi giỏ hàng
    $sqlDelete = "DELETE FROM giohang WHERE id = ?";
    $conn = getConnection(); // Gọi hàm để lấy kết nối
    $stmtDelete = $conn->prepare($sqlDelete);
    $stmtDelete->bind_param("i", $idToDelete);

    if ($stmtDelete->execute()) {
        echo '<script>alert("Sản phẩm đã được xóa!"); window.location.href = "giohang.php";</script>';
    } else {
        echo "Lỗi: " . $stmtDelete->error;
    }

    // Đóng statement và kết nối
    $stmtDelete->close();
    $conn->close();
} else {
    echo '<script>alert("Không có sản phẩm nào để xóa!"); window.location.href = "giohang.php";</script>';
}
?>
