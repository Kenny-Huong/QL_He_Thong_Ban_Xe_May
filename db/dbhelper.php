<?php
header("Content-type: text/html; charset=utf-8");
require_once('config.php');

// Kết nối SQL và lưu dữ liệu vào bảng (insert, delete, update)
function execute($sql)
{
    $con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    mysqli_set_charset($con, 'UTF8');

    // Kiểm tra kết nối
    if (!$con) {
        die("Kết nối không thành công: " . mysqli_connect_error());
    }

    // Thực hiện lệnh SQL
    if (mysqli_query($con, $sql)) {
        mysqli_close($con);
        return true; // Trả về true nếu thực hiện thành công
    } else {
        // In lỗi nếu có
        echo "Lỗi: " . mysqli_error($con);
        mysqli_close($con);
        return false; // Trả về false nếu có lỗi
    }
}

// Để hiển thị khi select
function executeResult($sql, $params = [])
{
    $con = getConnection(); // Lấy kết nối
    $stmt = mysqli_prepare($con, $sql); // Chuẩn bị câu lệnh

    // Nếu có tham số, gán chúng vào câu lệnh
    if ($params) {
        $types = str_repeat('s', count($params)); // Tạo kiểu dữ liệu cho các tham số
        mysqli_stmt_bind_param($stmt, $types, ...$params); // Gán tham số
    }

    // Thực hiện câu lệnh
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt); // Lấy kết quả từ câu lệnh

    if (!$result) {
        echo "Lỗi truy vấn: " . mysqli_error($con); // In lỗi nếu có
        mysqli_close($con);
        return []; // Trả về mảng rỗng nếu có lỗi
    }

    $data = [];
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $data[] = $row; // Lấy dữ liệu từ kết quả
    }

    mysqli_close($con);
    return $data; // Trả về dữ liệu
}


function executeSingleResult($sql) {
    // Kết nối cơ sở dữ liệu
    $con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    mysqli_set_charset($con, 'utf8');

    $result = mysqli_query($con, $sql);
    $row = null;
    if ($result != null && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    }

    // Đóng kết nối
    mysqli_close($con);

    return $row;
}

function getConnection() {
    $con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    mysqli_set_charset($con, 'UTF8');

    // Kiểm tra kết nối
    if (!$con) {
        die("Kết nối không thành công: " . mysqli_connect_error());
    }
    return $con; // Trả về đối tượng kết nối
}
?>