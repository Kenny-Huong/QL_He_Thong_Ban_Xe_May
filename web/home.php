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

$isLoggedIn = isset($_SESSION['username']);


?>


<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title> NHÓM 3 - MOTOR </title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="../CSS/bootstrap.min.css" rel="stylesheet">
  <link href="../CSS/shop-homepage.css" rel="stylesheet">
  <link rel="stylesheet" href="../CSS/themify-icons/themify-icons.css">
  <script src="../JS/jquery.min.js"></script>
  <script src="../JS/bootstrap.bundle.min.js"></script>
</head>


<body>
  
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">NHÓM 3 - MOTOR</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#"><i class="ti-home"></i> TRANG CHỦ<span class="sr-only">(current)</span></a>
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
            $sql = 'select * from hang';   
            $categoryList = executeResult($sql);
            foreach ($categoryList as $item) {
                echo '<a class="list-group-item" href="sanpham.php?tenhang='.$item['tenhang'].'"><img class="d-block img-fluid" src='.$item['logo'].' alt="Khong tai duoc"></a><p></p>';                                            
            }
          ?>
        </div>
      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">
        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <img class="d-block img-fluid" src="../Hinh/LOGO/HONDA.png" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block img-fluid" src="../Hinh/LOGO/YAMAHA.png" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block img-fluid" src="../Hinh/LOGO/SUZUKI.png" alt="Third slide">
            </div> 
            <div class="carousel-item">
                <img class="d-block img-fluid" src="../Hinh/LOGO/PIAGGIO.png" alt="Fourth slide">
            </div>
            <div class="carousel-item">
                <img class="d-block img-fluid" src="../Hinh/LOGO/SYM.png" alt="Third slide">
            </div> 
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
    </div>


    <h5 style=" color: white; background-color: #343a40!important; padding: 10px;border: 2px solid black; border-radius: 5px;"> <i class="fa fa-motorcycle ti-receipt"></i> TIN THỊ TRƯỜNG </h5>

    <div class="row">
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="../Hinh/new1.png" alt=""></a>
              <div class="card-footer">
                <h4 class="card-title"><a href="sanpham.php?tenhang=HONDA">HONDA</a></h4>
              </div>
              <div class="card-body">
                <h5>GIÁ XE THÁNG 11</h5>
                <p class="card-text">Giá xe HONDA mới nhất tại các đại lý Việt Nam.</p> 
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="../Hinh/new2.png" alt=""></a>
              <div class="card-footer">
                <h4 class="card-title"><a href="sanpham.php?tenhang=SYM">SYM</a></h4>
              </div>
              <div class="card-body">
                <h5>GIÁ XE THÁNG 11</h5>
                <p class="card-text">Giá xe SYM mới nhất tại các đại lý Việt Nam.</p> 
              </div>
            </div>
          </div>
            
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="../Hinh/new3.png" alt=""></a>
              <div class="card-footer">
                <h4 class="card-title"><a href="sanpham.php?tenhang=YAMAHA">YAMAHA</a></h4>
              </div>
              <div class="card-body">
                <h5>GIÁ XE THÁNG 11</h5>
                <p class="card-text">Giá xe YAMAHA mới nhất tại các đại lý Việt Nam.</p> 
              </div>
            </div>
          </div>  
        </div>
      </div>
    </div> 
<!-- Section-->

          
<section class="py-5">
<h4 style="text-align: center; color: white; background-color: #343a40!important; padding: 10px; border: 2px solid black; border-radius: 5px;"><i class="fa fa-motorcycle ti-medall"></i> SẢN PHẨM NỔI BẬT</h4>
            <div class="container px-4 px-lg-5 mt-5">
            
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                  
                    <div class="col mb-5">
                        <div class="card h-100">

                            <!-- Product image-->
                            <a href="xe.php?id=12&tenhang=YAMAHA"> 
                                <img class="card-img-top" src="../Hinh/YAMAHA/WR155.png" alt="..." /> 
                            </a>
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">YAMAHA WR155R</h5>
                                    <!-- Product price-->
                                    Giá: 79.000.000 ~ 87.000.000
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="xe.php?id=12&tenhang=YAMAHA">Xem chi tiết</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                        
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                            <!-- Product image-->
                            <a href="xe.php?id=28&tenhang=PAGGIO"> 
                                <img class="card-img-top" src="../Hinh/PAGGIO/946.png" alt="..." /> 
                            </a>
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Vespa 946 Christian Dior</h5>
                                    <!-- Product reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <!-- Product price-->
                                     Giá: 
                                    <span style="color: gray; text-decoration: line-through;" class="text-muted text-decoration-line-through">725.500.000 VNĐ</span>
                                     697.500.000 VNĐ
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="xe.php?id=28&tenhang=PAGGIO">Xem chi tiết</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                            <!-- Product image-->
                            <a href="xe.php?id=31&tenhang=SUZUKI"> 
                                <img class="card-img-top" src="../Hinh/SUZUKI/VStrom.jpg" alt="..." /> 
                            </a>
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">V-Strom 250SX</h5>
                                    <!-- Product price-->
                                    Giá:
                                    <span style="color: gray; text-decoration: line-through;" class="text-muted text-decoration-line-through"> 150.000.000 VNĐ</span>
                                    132.900.000 VNĐ
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="xe.php?id=31&tenhang=SUZUKI">Xem chi tiết</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <a href="xe.php?id=2&tenhang=HONDA"> 
                                <img class="card-img-top" src="../Hinh/HONDA/Wave2025.png" alt="..." /> 
                            </a>
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Wave Alpha 2025</h5>
                                    <!-- Product reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <!-- Product price-->
                                    Giá: 18.939.273 VNĐ
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="xe.php?id=2&tenhang=HONDA">Xem chi tiết</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                            <!-- Product image-->
                            <a href="xe.php?id=1&tenhang=HONDA"> 
                                <img class="card-img-top" src="../Hinh/HONDA/VARIO160.png" alt="..." /> 
                            </a>
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Vario 160</h5>
                                    <!-- Product price-->
                                    Giá:
                                    <span style="color: gray; text-decoration: line-through;" class="text-muted text-decoration-line-through">67.500.000 VNĐ</span>
                                    59.990.000 VNĐ
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="xe.php?id=1&tenhang=HONDA">Xem chi tiết</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <a href="xe.php?id=15&tenhang=SYM"> 
                                <img class="card-img-top" src="../Hinh/SYM/TS150.jpg" alt="..." /> 
                            </a>
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Tuscany 150 2023</h5>
                                    <!-- Product price-->
                                    Giá: 45.000.000 VNĐ ~ 50.000.000 VNĐ
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="xe.php?id=15&tenhang=SYM">Xem chi tiết</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                        
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                            <!-- Product image-->
                            <a href="xe.php?id=5&tenhang=HONDA"> 
                                <img class="card-img-top" src="../Hinh/HONDA/Cub.png" alt="..." /> 
                            </a>
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Super Cub 2025</h5>
                                    <!-- Product reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    Giá:
                                    <!-- Product price-->
                                    <span style="color: gray; text-decoration: line-through;" class="text-muted text-decoration-line-through">92.000.000 VNĐ</span>
                                    86.292.000 VNĐ
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="xe.php?id=5&tenhang=HONDA">Xem chi tiết</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <a href="xe.php?id=9&tenhang=YAMAHA"> 
                                <img class="card-img-top" src="../Hinh/YAMAHA/PG1.jpg" alt="..." /> 
                            </a>
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Yamaha PG-1</h5>
                                    <!-- Product reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <!-- Product price-->
                                    Giá: 30.347.000 VNĐ
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="xe.php?id=9&tenhang=YAMAHA">Xem chi tiết</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
  </section>



  <!-- -------------------------------------------------------LIÊN HỆ------------------------------------------------------- -->
  
<div id="lienhe">
            
  <div id = "lienhe1" class="container mt-5">
      <h3 style="text-align: center; color: white; background-color: #343a40!important; padding: 10px; border: 2px solid black; border-radius: 5px;"><i class="fa fa-motorcycle ti-signal"></i> Liên hệ với chúng tôi</h3>
      <h6 style="margin-top: 30px; margin-bottom: 20px;" class="text-center">Nhập thông tin của bạn xuống bên dưới, chúng tôi sẽ phản hồi bạn trong thời gian sớm nhất!</h6>
      
      <form id="contactForm" method="POST" action="">

            <div class="form-group" style="display: flex; align-items: center; margin-bottom: 15px;">
                <label for="hovaten" style="width: 100px; margin-right: 10px;">Họ và tên</label>
                <input type="text" class="form-control" id="hovaten" name="hovaten" style="flex: 1;" required>
            </div>

            <div class="form-group" style="display: flex; align-items: center; margin-bottom: 15px;">
                <label for="email" style="width: 100px; margin-right: 10px;">Email</label>
                <input type="email" class="form-control" id="email" name="email" style="flex: 1;" required>
            </div>

            <div class="form-group" style="display: flex; align-items: center; margin-bottom: 15px;">
                <label for="sodienthoai" style="width: 100px; margin-right: 10px;">Số điện thoại</label>
                <input type="tel" class="form-control" id="sodienthoai" name="sodienthoai" pattern="^[0-9]{10,11}$" style="flex: 1;" required>
                
            </div>

            <div class="form-group" style="display: flex; align-items: center; margin-bottom: 15px;">
                <label for="noidung" style="width: 100px; margin-right: 10px;">Nội dung</label>
                <textarea class="form-control" id="noidung" name="noidung" rows="5" style="flex: 1;" required></textarea>
            </div>

            <button style="margin-bottom: 50px;" type="submit" class="btn btn-primary">Gửi</button>
      </form>        
  </div>

</div>
<!-- -------------------------------------------------------KẾT THÚC LIÊN HỆ------------------------------------------------------- -->

          </div>
</body>


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

  
</html>