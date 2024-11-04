<?php
require_once ('../db/dbhelper.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $hovaten = trim($_POST['hovaten']);
  $email = trim($_POST['email']);
  $sodienthoai = trim($_POST['sodienthoai']);
  $noidung = trim($_POST['noidung']);

  if (!empty($hovaten) && !empty($email) && !empty($sodienthoai) && !empty($noidung)) {
      $sql = "INSERT INTO lienhe (hovaten, email, sodienthoai, noidung) VALUES ('$hovaten', '$email', '$sodienthoai', '$noidung')";
      execute($sql);
      echo '<script>alert("Cảm ơn bạn đã liên hệ với chúng tôi!"); window.location.href = "";</script>';
  }
}

session_start(); // Start the session to track login state

// Define $isLoggedIn based on session data
$isLoggedIn = isset($_SESSION['username']) && !empty($_SESSION['username']);


?>
<!DOCTYPE html>
<html lang="vi">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> MOWO - MOTO WORLD </title>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap core CSS -->
  <link href="../CSS/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="../CSS/shop-homepage.css" rel="stylesheet">
  <link rel="stylesheet" href="../CSS/themify-icons/themify-icons.css">
    <!-- Bootstrap core JavaScript -->
  <script src="../JS/jquery.min.js"></script>
  <script src="../JS/bootstrap.bundle.min.js"></script>


</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">NHÓM 3 | SẢN PHẨM <i class="fa fa-motorcycle logo-icon"></i></a>
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
            
          <li class="nav-item">
            <a class="nav-link" href="giohang.php"> GIỎ HÀNG <i class="fa ti-shopping-cart"> </i></a>
          </li>
          

        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <div class="row">               
      <div class="col-lg-3">
        <br>
        <div class="list-group">
          <?php
            // lấy dữ liệu hãng ra
            $sql = 'select * from hang';   
            $categoryList = executeResult($sql);
            $index = 1;
            foreach ($categoryList as $item)
            {
                echo '<a class="list-group-item" href="sanpham.php?tenhang='.$item['tenhang'].'"> <img class="d-block img-fluid" src='.$item['logo'].' alt="Khong tai duoc"> </a>  <p> </p>';                                            
            }
           ?>        
        </div>
      </div>
                                   
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
           <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
            <?php 
                $tenhang = $_GET['tenhang']; 
                echo '<img class="d-block img-fluid" src="../Hinh/LOGO/'.$tenhang.'.png" alt="Khong tai duoc">';
            ?>  
            </div>          
          </div>
            
        </div>
        
        <div class="row">
        <?php
            $tenhang = $_GET['tenhang'];  
            // lấy dữ liệu hãng ra
            $sql = 'SELECT * FROM sanpham where tenhang = "'.$tenhang.'"';   
            $categoryList = executeResult($sql);
            foreach ($categoryList  as $item)
            {
            echo'
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="thumbnail">
                  <a href="xe.php?id='.$item['id'].'&tenhang='.$item['tenhang'].'"> <img class="card-img-top" src='.$item['hinhanh'].'  height="200" alt="khongtaiduoc"> </a>
                    </div>
                  <div class="card-footer">
                    <h4 style="color: firebrick;" class="card-title"> '.$item['tensp'].' </h4>
                  </div>

                  <div class="card-body">
                    <h5> Giá: '.number_format($item['gia'], 0, '', '.').' VNĐ</h5> 
                  </div>
                </div>
            </div> ';}?>       
        </div>
        
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer  class="py-5 bg-dark">
    <div class="container text-center text-white">
        <h4 style="color: #fff !important;">Đề tài thực tập thiết kế web</h4>
        <p style="color: #fff !important;">Nhóm 3 - Thiết kế web bán xe máy</p>
        
        <h5 style="color: #fff !important;" style = "margin-top: 30px;" > Thành viên nhóm</h5>
        <p style="color: #fff !important;">Lê Hoài Khiêm - 21103100327 - DHTI15A5HN - 06/12/2003</p>
        <p style="color: #fff !important;">Nguyễn Văn Hướng - 21103100115 - DHTI15A5HN - 08/09/2003</p>
        <p style="color: #fff !important;">Hoàng Thị Linh - 21103100329 - DHTI15A5HN - 03/01/2003</p>
        
    </div>
</footer>
</body>

</html>
