<?php
session_start();
require_once '../db/dbhelper.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Assuming passwords are stored in MD5 format

    // Write the SQL query directly, escaping the values to prevent SQL injection
    $query = "SELECT * FROM taikhoan_user WHERE username = '$username' AND password = '$password'";
    
    // Execute the query using executeResult function from dbhelper.php
    $result = executeResult($query);

    // Check if the user was found
    if (count($result) > 0) {
        $_SESSION['username'] = $username;
        header("Location: home.php"); // Redirect to home.php upon successful login
        exit();
    } else {
        echo "Tên đăng nhập hoặc mật khẩu không đúng.";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link href="../CSS/login.css" rel="stylesheet" />
        <title> MOWO - MOTO WORLD </title> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../JS/scripts.js"></script>

        
    </head>
    
    <body>
        <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <h2>NHÓM 3 | ĐĂNG NHẬP</h2>
    </div>
  </nav>

        <div class="bg-primary" >
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <h3 class="text-center font-weight-light my-4"> <strong> ĐĂNG NHẬP </strong> </h3>
                                    </div>
                                    <div class="card-body">
                                        
                                        <form method="post" onsubmit = "return dangnhap()">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress"> TÀI KHOẢN </label>
                                                <input class="form-control py-4" id="username" name="username" type="text"/>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword"> MẬT KHẨU </label>
                                                <input class="form-control py-4" id="password" name="password" type="password"/>
                                            </div>
                                            <?php
                                                //nếu có session tên dangnhap thì ta thực hiện lệnh dưới
                                                if(isset($_SESSION['dangnhap']) && $_SESSION['dangnhap'] != NULL)
                                                {
                                                    echo '<h4 style="color: red"> '.$_SESSION['dangnhap'];' </h4>';
                                                    
                                                }
                                            ?>                                              
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <input class="btn btn-primary" type="submit" value="Xác nhận">
                                                <!-- <a class="small" href="#"> Quên mật khẩu ?</a> -->
                                            </div>
                                                   
                                            <div class="text-center mt-3">
                                            <span>Bạn chưa có tài khoản? </span>
                                                <a href="dangky.php" class="small">Đăng ký ngay!</a>
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
