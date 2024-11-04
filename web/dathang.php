<?php
require_once ('../db/dbhelper.php');
session_start();


// Kiểm tra nếu người dùng đã đăng nhập
$isLoggedIn = isset($_SESSION['username']) && !empty($_SESSION['username']);
if (!$isLoggedIn) {
    echo '<script>alert("Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng!"); window.location.href = "dangnhap.php";</script>';
    exit;
}

// Lấy tên người dùng từ session
$username = $_SESSION['username'];

// Kiểm tra nếu người dùng đã đăng nhập
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    echo '<script>alert("Vui lòng đăng nhập để đặt hàng!"); window.location.href = "dangnhap.php";</script>';
    exit;
}

// Lấy danh sách sản phẩm từ session giỏ hàng
$cartItems = isset($_SESSION['giohang']) ? $_SESSION['giohang'] : [];

// Xử lý khi người dùng gửi thông tin đặt hàng
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $hoten = $_POST['hoten'];
    $sdt = $_POST['sdt'];
    $email = $_POST['email'];
    $diachi = $_POST['diachi'];
    $ghichu = $_POST['ghichu'];
    $username = $_SESSION['username']; // Tên người dùng từ phiên làm việc

    // Lưu từng sản phẩm trong đơn hàng vào cơ sở dữ liệu
    foreach ($cartItems as $row) {
        $tensp = $row['tensp'];
        $soluongdat = $row['soluong'];
        $tongtien = $row['tongtien']; // Giả sử bạn đã tính toán tổng tiền trong giỏ hàng

        // Câu lệnh SQL để chèn dữ liệu vào bảng donhang
        $sql = "INSERT INTO donhang (tensp, soluongdat, tongtien, hoten, sdt, email, diachi, ghichu, tenkh) 
                VALUES ('$tensp', $soluongdat, $tongtien,'$hoten', '$sdt', '$email', '$diachi', '$ghichu', '$username')";
        execute($sql);
    }

    $deleteSql = "DELETE FROM giohang WHERE tenkh = '$username'";
    execute($deleteSql);

    // Xóa giỏ hàng trong session
    unset($_SESSION['giohang']);
    
    // Hiển thị thông báo thành công và quay lại trang giỏ hàng
    echo '<script>alert("Đặt hàng thành công!"); window.location.href = "giohang.php";</script>';
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt Hàng</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="../CSS/bootstrap.min.css" rel="stylesheet">
  <link href="../CSS/shop-homepage.css" rel="stylesheet">
  <link rel="stylesheet" href="../CSS/themify-icons/themify-icons.css">
  <script src="../JS/jquery.min.js"></script>
  <script src="../JS/bootstrap.bundle.min.js"></script>
</head>
<body>

        
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">NHÓM 3 | ĐẶT HÀNG <i class="fa fa-motorcycle logo-icon"></i></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="home.php">TRANG CHỦ<span class="sr-only">(current)</span></a>
          </li>
          
          <?php if ($isLoggedIn): ?>
            <!-- Display username if logged in -->
            <li class="nav-item">
              <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-motorcycle ti-user"></i>  <?php echo htmlspecialchars($_SESSION['username']); ?></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="../NguoiDung/xemdonhang.php">Xem đơn hàng</a>
                        <div class="dropdown-divider"></div>
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
            <a class="nav-link" href="giohang.php"> <i class="fa fa-shopping-cart"> </i></a>
          </li>

        </ul>
      </div>
    </div>
  </nav>


    <div class="container mt-5">
        <h1 class="my-4" style = "padding-top: 50px; text-align: center;" >Xác nhận Đặt hàng</h1>
        <h4 class="my-4"style = "margin-top: 10px;" > <i class="fa fa-motorcycle ti-view-list"></i>  SẢN PHẨM : </h4>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng tiền</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($cartItems)): ?>
                    <tr>
                        <td colspan="5" class="text-center">Giỏ hàng của bạn đang trống.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($cartItems as $row): ?>
                        <tr>
                            <td><img src="<?php echo htmlspecialchars($row['hinhanh']); ?>" style="width: 100px;"></td>
                            <td><?php echo htmlspecialchars($row['tensp']); ?></td>
                            <td><?php echo number_format($row['gia'], 0, ',', '.'); ?> VNĐ</td>
                            <td><?php echo htmlspecialchars($row['soluong']); ?></td>
                            <td><?php echo number_format($row['tongtien'], 0, ',', '.'); ?> VNĐ</td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Form nhập thông tin đặt hàng -->
        <form action="dathang.php" method="post">
            <h4 class="my-4"style = "margin-top: 10px; text-align: center;" > <i class="fa fa-motorcycle ti-info-alt"></i>  THÔNG TIN CỦA KHÁCH HÀNG : </h4>

            <div class="form-group">
                <label for="hoten">Họ và tên:</label>
                <input type="text" name="hoten" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="sdt">Số điện thoại:</label>
                <input type="text" name="sdt" class="form-control" pattern="^[0-9]{10,11}$" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="diachi">Địa chỉ:</label>
                <input type="text" name="diachi" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="ghichu">Ghi chú:</label>
                <textarea name="ghichu" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Xác nhận Đặt hàng</button>
        </form>
    </div>

    <footer class="py-5 bg-dark text-white text-center" style = "margin-top: 50px;">
        <p style="color: #fff !important;">NHÓM 3 - Thiết kế website bán xe máy - DHTI15A5HN</p>
    </footer>
    
    
</body>

</html>
