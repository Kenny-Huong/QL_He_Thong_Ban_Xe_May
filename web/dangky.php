<?php
session_start();
require_once ('../db/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $sodienthoai = $_POST['sodienthoai'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    $errors = [];
    
    // Validate fields
    if (empty($username)) $errors[] = "Tên đăng nhập không được để trống";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Email không hợp lệ";
    if (empty($sodienthoai) || !preg_match('/^[0-9]{10}$/', $sodienthoai)) $errors[] = "Số điện thoại phải có 10 chữ số";
    if (strlen($password) < 6) $errors[] = "Mật khẩu phải có ít nhất 6 ký tự";
    if ($password !== $confirm_password) $errors[] = "Xác nhận mật khẩu không khớp";

    // If no errors, insert into database
    if (empty($errors)) {
        $con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
        if ($con) {
            $password_hashed = md5($password); // Use MD5 instead of password_hash
            $sql = "INSERT INTO taikhoan_user (username, email, sodienthoai, password) VALUES ('$username', '$email', '$sodienthoai', '$password_hashed')";


            if (mysqli_query($con, $sql)) {
                $_SESSION['success_message'] = "Đăng ký thành công! Sử dụng tài khoản của bạn ngay nhé!";
                header("Location: dangnhap.php");
                exit();
            } else {
                $errors[] = "Đã xảy ra lỗi trong quá trình đăng ký";
            }
        } else {
            $errors[] = "Không thể kết nối đến cơ sở dữ liệu";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký tài khoản</title>
    <link href="../CSS/login.css" rel="stylesheet" />
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
     <h2>NHÓM 3 | ĐĂNG KÝ</h2>
    </div>
  </nav>
 
    <div class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Đăng Ký</h3>
                                </div>
                                <div class="card-body">
                                    <?php
                                    if (!empty($errors)) {
                                        echo '<div class="alert alert-danger">';
                                        foreach ($errors as $error) {
                                            echo "<p>$error</p>";
                                        }
                                        echo '</div>';
                                    }
                                    ?>
                                    <form method="post" action="dangky.php">
                                        <div class="form-group">
                                            <label for="username">Tên đăng nhập</label>
                                            <input type="text" name="username" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="sodienthoai">Số điện thoại</label>
                                            <input type="text" name="sodienthoai" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Mật khẩu</label>
                                            <input type="password" name="password" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="confirm_password">Xác nhận mật khẩu</label>
                                            <input type="password" name="confirm_password" class="form-control" required>
                                        </div>
                                        <div class="form-group mt-4 mb-0">
                                            <input type="submit" class="btn btn-primary" value="Đăng Ký">
                                        </div>
                                        <div class="text-center mt-3">
                                            <span>Bạn đã có tài khoản? </span>
                                                <a href="dangnhap.php" class="small">Đăng nhập ngay!</a>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">NHÓM 3 - Thiết kế website bán xe máy - DHTI15A5HN</div>
                        </div>
                    </div>
                </footer>
            </div>
    </div>
</body>
</html>
