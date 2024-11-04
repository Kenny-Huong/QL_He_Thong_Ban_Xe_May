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

// Kiểm tra nếu dữ liệu POST đã được gửi từ trang xe.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $hinhanh = $_POST['hinhanh'];
    $tensp = $_POST['tensp'];
    $gia = floatval($_POST['gia']);
    $soluong = intval($_POST['soluong']);
    $tongtien = $gia * $soluong;

    if (!empty($id) && !empty($tensp) && $soluong > 0 && $gia > 0) {
        // Kiểm tra xem sản phẩm đã có trong giỏ hàng với tên khách hàng hiện tại hay chưa
        $sql = "SELECT * FROM giohang WHERE id = '$id' AND tenkh = '$username'";
        $existingProduct = executeSingleResult($sql);

        if ($existingProduct) {
            // Nếu sản phẩm đã tồn tại, cập nhật số lượng và tổng tiền
            $newQuantity = $existingProduct['soluong'] + $soluong;
            $newTotal = $gia * $newQuantity;
            $updateSql = "UPDATE giohang SET soluong = $newQuantity, tongtien = $newTotal WHERE id = '$id' AND tenkh = '$username'";
            execute($updateSql);
        } else {
            // Nếu sản phẩm chưa tồn tại, thêm sản phẩm mới vào giỏ hàng
            $insertSql = "INSERT INTO giohang (id, hinhanh, tensp, gia, soluong, tongtien, tenkh)
                          VALUES ('$id', '$hinhanh', '$tensp', $gia, $soluong, $tongtien, '$username')";
            execute($insertSql);
        }

        // Cập nhật session giỏ hàng
        if (!isset($_SESSION['giohang'])) {
            $_SESSION['giohang'] = [];
        }

        // Tìm sản phẩm trong session, nếu có thì cập nhật số lượng
        $found = false;
        foreach ($_SESSION['giohang'] as &$item) {
            if ($item['id'] == $id) {
                $item['soluong'] += $soluong;
                $item['tongtien'] = $item['gia'] * $item['soluong'];
                $found = true;
                break;
            }
        }
        if (!$found) {
            $_SESSION['giohang'][] = [
                'id' => $id,
                'hinhanh' => $hinhanh,
                'tensp' => $tensp,
                'gia' => $gia,
                'soluong' => $soluong,
                'tongtien' => $tongtien
            ];
        }

        echo '<script>alert("Sản phẩm đã được thêm vào giỏ hàng!"); window.location.href = "giohang.php";</script>';
    } else {
        echo '<script>alert("Thông tin sản phẩm không hợp lệ!"); window.location.href = "xe.php";</script>';
    }
}

// Lấy danh sách sản phẩm từ cơ sở dữ liệu cho người dùng hiện tại
$sql = "SELECT * FROM giohang WHERE tenkh = '$username'";
$cartItems = executeResult($sql);

// Cập nhật session giỏ hàng dựa trên dữ liệu từ cơ sở dữ liệu
$_SESSION['giohang'] = [];
foreach ($cartItems as $item) {
    $_SESSION['giohang'][] = [
        'id' => $item['id'],
        'hinhanh' => $item['hinhanh'],
        'tensp' => $item['tensp'],
        'gia' => $item['gia'],
        'soluong' => $item['soluong'],
        'tongtien' => $item['tongtien']
    ];
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Giỏ Hàng</title>
    <link href="../CSS/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/themify-icons/themify-icons.css">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
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
      <a class="navbar-brand" href="#">NHÓM 5 | GIỎ HÀNG      <i class="ti-shopping-cart-full"> </i></a>
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
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-motorcycle ti-user"></i>  <?php echo htmlspecialchars($_SESSION['username']); ?></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="xemdonhang.php">Xem đơn hàng</a>
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
            
        </ul>
      </div>
    </div>
  </nav>

    <div class="content container mt-5">
        <h2 style = "margin-top: 30px;" >Giỏ Hàng của Bạn :</h2>
        <form method="post">
     <table class="table table-striped">
            <thead>
                <tr>
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng tiền</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($cartItems)): ?>
                    <tr>
                        <td colspan="6" class="text-center">Giỏ hàng của bạn đang trống.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($cartItems as $row): ?>
                        <tr>
                            <td><img src="<?php echo htmlspecialchars($row['hinhanh']); ?>" style="width: 100px;"></td>
                            <td><?php echo htmlspecialchars($row['tensp']); ?></td>
                            <td><?php echo number_format($row['gia'], 0, ',', '.'); ?> VNĐ</td>
                            <td><?php echo htmlspecialchars($row['soluong']); ?></td>
                            <td><?php echo number_format($row['tongtien'], 0, ',', '.'); ?> VNĐ</td>
                            <td>
                                <a href="xoagiohang.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Nút đặt hàng chuyển đến trang dathang.php -->
        <?php if (!empty($cartItems)): ?>
            <a href="dathang.php" class="btn btn-primary">Đặt hàng</a>
        <?php endif; ?>
    </div>

    </div>

    <footer class="py-5 bg-dark text-white text-center">
        <p style="color: #fff !important;">NHÓM 3 - Thiết kế website bán xe máy - DHTI15A5HN</p>
    </footer>
</body>
</html>
