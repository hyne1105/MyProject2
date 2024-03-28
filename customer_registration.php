<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" type="image" href="images/logo.jpg"/>
    <title>ONEW - Hệ thống chia sẻ thời trang</title>
</head>
<body>
    <div id="top">
        <div class="container">
            <div class="col-md-8 offer">
                <a href="./customer/my_account.php" class="btn btn-info btn-sm">
                    <?php
                    if(!isset($_SESSION['customer_email'])){
                        echo "Xin chào";
                    }else{
                        echo "Xin chào: ".$_SESSION['customer_email']." ";
                    }
                    ?>
                </a>
                <a href="./cart.php">Tổng Tiền Trong Giỏ Hàng: <?php totalPrice(); ?> VND, Tổng Sản Phẩm: <?php item(); ?></a>
            </div>
            <div class="col-md-4">
                <ul class="menu">
                    <li>
                        <a href="customer_registration.php">Đăng ký</a>
                    </li>
                    <li>
                        <?php
                        if(!isset($_SESSION['customer_email'])){
                            echo "<a href='checkout.php'>Tài khoản của tôi</a>";
                        }else{
                            echo "<a href='customer/my_account.php?my_order'>Tài khoản của tôi</a>";
                        }
                        ?>
                    </li>
                    <li>
                        <?php
                        if(!isset($_SESSION['customer_email'])){
                            echo "<a href='customer_login.php'>Đăng nhập</a>";
                        }else{
                            echo"<a href='logout.php'>Đăng xuất</a>";
                        }
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="navbar navbar-default" id="navbar">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand home" href="index.php">
                    <img src="images/logo1.jpg" style="width: 130px" alt="onew" class="hidden-xs">
                    <img src="images/logo.jpg"  style="width: 50px" alt="onew" class="visible-xs">
                </a>
                
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation"> 
                    <span class="sr-only">Toggle Navigation</span>
                    <i class="fa fa-align-justify"></i>
                </button>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                    <span class="sr-only"></span>
                    <i class="fa fa-search"></i>
                </button>
            </div>

            <div class="navbar-collapse collapse" id="navigation">
                <div class="padding-nav">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="index.php">Trang chủ</a>
                        </li>
                        <li>
                            <a href="shop.php">Cửa hàng</a>
                        </li>
                        <li>
                            <a href="cart.php">Giỏ hàng</a>
                        </li>
                        <li>
                            <a href="news.php">Tin tức</a>
                        </li>
                        <li>
                            <a href="contactus.php">Liên hệ</a>
                        </li>
                    </ul>
                </div>

                <div class="navbar-collapse collapse right" style="padding-left: 865px;">
                    <button class="btn navbar-btn btn-primary" style="margin-right: 10px;" type="button" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle Search</span>
                        <i class="fa fa-search"></i>
                    </button>

                    <a href="cart.php" class="btn btn-primary navbar-btn right">
                        <i class="fa fa-shopping-cart"></i>
                        <span><?php item(); ?> sản phẩm trong giỏ</span>
                    </a>
                </div>

                <div class="collapse clearfix" id="search">
                    <form class="navbar-form" method="get" action="result.php">
                        <div class="input-group">
                            <input type="text" name="user_query" placeholder="Search" class="form-control" required="">
                            <span class="input-group-btn">
                                <button type="submit" value="Search" name="search" class="btn btn-primary">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="content">
        <div class="container">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="index.php">Trang Chủ</a></li>
                    <li>
                        Đăng Ký
                    </li>
                </ul>
            </div>
            <div class="col-md-6" style="padding-bottom: 30px">
              <div>
                <img src="./images/sign in.jpg" class="img-responsive img-fluid">
              </div>
            </div>
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header">
                        <center>
                            <h2>Đăng Ký Khách Hàng</h2>
                        </center>
                    </div>
                    <form action="customer_registration.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Tên Khách Hàng</label>
                            <input type="text" name="c_name" required="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Email Khách Hàng</label>
                            <input type="text" name="c_email" required="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Mật Khẩu</label>
                            <input type="password" name="c_password" required="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Quốc Gia</label>
                            <input type="text" name="c_country" required="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Thành Phố</label>
                            <input type="text" name="c_city" required="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Số Điện Thoại</label>
                            <input type="text" name="c_contact" required="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Địa Chỉ</label>
                            <input type="text" name="c_address" required="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Hình Ảnh</label>
                            <input type="file" name="c_image" required="" class="form-control">
                        </div>
                        <div class="text-center">
                            <button type="submit" name="submit" class="btn btn-primary">
                                <i class="fa fa-user-plus"></i> Đăng Ký
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
    include("includes/footer.php");
    ?>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>

<?php 
if(isset($_POST['submit'])){
    $c_name=$_POST['c_name'];
    $c_email=$_POST['c_email'];
    $c_password=$_POST['c_password'];
    $c_country=$_POST['c_country'];
    $c_city=$_POST['c_city'];
    $c_contact=$_POST['c_contact'];
    $c_address=$_POST['c_address'];
    $c_image=$_FILES['c_image']['name'];
    $c_tmp_image=$_FILES['c_image']['tmp_name'];
    $c_ip=getUserIP();

    move_uploaded_file($c_tmp_image,"customer/customer_images/$c_image");
    $insert_customer="insert into 
    customers(customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image,customer_ip) 
    values('$c_name','$c_email','$c_password','$c_country','$c_city','$c_contact','$c_address','$c_image','$c_ip')";
    $run_customer=mysqli_query($con,$insert_customer);
    $sel_cart="select * from cart where ip_add='$c_ip'";
    $run_cart=mysqli_query($con,$sel_cart);
    $check_cart=mysqli_num_rows($run_cart);
    if($check_cart>0){
        $_SESSION['customer_email']=$c_email;
        echo "<script>alert('Bạn đã đăng ký tài khoản thành công')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }else{
        $_SESSION['customer_email']=$c_email;
        echo "<script>alert('Bạn đã đăng ký tài khoản thành công')</script>";
        echo "<script>window.open('shop.php','_self')</script>";
    }
}
?>