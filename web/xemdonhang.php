<?php
session_start();
require_once('../db/dbhelper.php');

// Kiểm tra nếu người dùng đã đăng nhập
$isLoggedIn = isset($_SESSION['username']) && !empty($_SESSION['username']);
if (!$isLoggedIn) {
    echo '<script>alert("Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng!"); window.location.href = "dangnhap.php";</script>';
    exit;
}

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (!isset($_SESSION['username'])) {
    echo 'Bạn cần đăng nhập để xem đơn hàng.';
    exit();
}

// Lấy tên người dùng từ phiên
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title> UNETI - Xem Đơn Hàng </title>
    <link href="../CSS/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/themify-icons/themify-icons.css">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    <style>
      body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
      }

      .content {
        flex: 1;
      }
    </style>
</head>


<body>
    
    
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">NHÓM 3 | ĐƠN HÀNG</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="home.php"><i class="ti-home"></i> TRANG CHỦ<span class="sr-only">(current)</span></a>
          </li>
          
          <?php if ($isLoggedIn): ?>
            <!-- Display username if logged in -->
            <li class="nav-item">
              <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-user"></i>  <?php echo htmlspecialchars($_SESSION['username']); ?></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="dangxuat.php"> Đăng xuất </a>
                    </div>
                </li>
            </li>
          <?php else: ?>
            <!-- Display login and signup options if not logged in -->
            <li class="nav-item">
              <a class="nav-link" href="dangnhap.php">Đăng nhập</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="dangky.php">Đăng ký</a>
            </li>
          <?php endif; ?>
          <li class="nav-item">
            <a class="nav-link" href="giohang.php"> GIỎ HÀNG <i class="ti-shopping-cart"> </i></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  

<div class="content container mt-5">
        <h2 style= "margin-top: 30px; margin-bottom: 30px; text-align:center; ">Danh Sách Đơn Hàng :</h2>  
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Tài khoản</th>
                            <th>Họ và tên</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th>Địa chỉ</th>
                            <th>Ghi chú</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Truy vấn dữ liệu từ bảng donhang với điều kiện tenkh = tên người dùng đang đăng nhập
                        $sql = 'SELECT * FROM donhang WHERE tenkh = ?';
                        $params = [$username];
                        $result = executeResult($sql, $params);

                        if (!empty($result)) {
                            foreach ($result as $row) {
                                $soluong = isset($row['soluongdat']) ? $row['soluongdat'] : 'Không có';
                                $hoten = isset($row['hoten']) ? $row['hoten'] : 'Không có';

                                echo '<tr>
                                    <td>' . $row['id'] . '</td>
                                    <td>' . $row['tensp'] . '</td>
                                    <td>' . $soluong . '</td>
                                    <td>' . $username . '</td>
                                    <td>' . $hoten . '</td>
                                    <td>' . $row['sdt'] . '</td>
                                    <td>' . $row['email'] . '</td>
                                    <td>' . $row['diachi'] . '</td>
                                    <td>' . $row['ghichu'] . '</td>
                                    <td>
                                        <a href="xoadonhang.php?id=' . $row['id'] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Bạn có chắc chắn muốn xóa đơn hàng này?\')">Xóa</a>
                                    </td>
                                </tr>';
                            }
                        } else {
                            echo '<tr><td colspan="10" class="text-center">Chưa có đơn hàng nào</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
        </div>


<footer class="py-5 bg-dark text-white text-center">
    <p style="color: #fff !important;">NHÓM 3 - Thiết kế website bán xe máy - DHTI15A5HN</p>
</footer>
</body>

</html>
