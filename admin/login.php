<?php session_start();?>

<?php
require_once ('../db/config.php');
if(!empty($_POST))
{
    $username = '';
    $password = '';
    if(isset($_POST['username']) && isset($_POST['password']))
    {   
        $username = $_POST['username'];
        $password = $_POST['password'];
    }
    
    if (!empty($username) && !empty($password)) {
        $con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
        $password_hashed = md5($password); // Hash the input password with MD5
        $sql = 'SELECT * FROM taikhoan WHERE username = "'.$username.'" AND password = "'.$password_hashed.'"';
        $query = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($query);
        if ($num_rows == 0) {
            header('Location: login.php');
            $_SESSION['dangnhap'] = 'Sai thông tin, vui lòng nhập lại!';
        } else {
            $_SESSION['USER'] = $username;
            unset($_SESSION['dangnhap']);
            header('Location: admin.php');
            die();
        }
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
        <title>ADMIN | ĐĂNG NHẬP</title> 
        <link href="../CSS/login.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../JS/scripts.js"></script>
    </head>
    
    <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <h3>NHÓM 3 | ĐĂNG NHẬP</h3>
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
                                        <h3 class="text-center font-weight-light my-4">ĐĂNG NHẬP || ADMIN </h3>
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
                                                <a href="signup.php" class="small">Đăng ký ngay!</a>
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
