<?php
require_once('../db/dbhelper.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int)$_GET['id'];
    
    // Xóa đơn hàng theo ID
    $sql = "DELETE FROM donhang WHERE id = $id";
    if (execute($sql)) {
        // Nếu xóa thành công, chuyển hướng
        header('Location: xemdonhang.php');
        die();
    } else {
        echo "Không thể xóa đơn hàng. Vui lòng thử lại.";
    }
} else {
    echo "ID không hợp lệ.";
}
?>