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
                            echo "<a href='customer_login.php'>Tài khoản của tôi</a>";
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
                        <li class="active">
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
                        Tin tức
                    </li>
                </ul>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-5">
                        <a href="#" style="text-decoration: none;">
                            <img src="./images/jennie-chanel-1024x1335.jpg" class="img-responsive" >
                            <h3 class="text-center" style="padding-top: 10px;">
                            GIẢI MÃ SỨC HÚT CỦA JENNIE (BLACKPINK): <br>
                            NHÂN TỐ ĐƯỢC MỌI THƯƠNG HIỆU THỜI TRANG SĂN LÙNG
                            </h3>  
                        </a>
                    </div>
                
                
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="#">
                                    <img class="img-responsive" src="./images/z4208017246387_c2b0bfec48e09e7e58166b0cb16c3dd2.jpg">
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="#" class="text-success" style="text-decoration: none;">
                                    <h4>ERAS TOUR: TAYLOR SWIFT CHẠM ĐỈNH THỜI TRANG KỶ NGUYÊN ÁNH SÁNG</h4> 
                                </a>
                                <p class="">Đắm chìm trong bữa tiệc của âm nhạc và ánh sáng, mãn nhãn với loạt trang phục lung linh, The...</p>
                            </div>
                        </div>
                            
                
                        <div class="row" style="padding-top: 10px;">
                            <div class="col-md-6">
                                <a href="#">
                                    <img class="img-responsive" src="./images/z4208017697506_a9a6096d6372237ca6f8c5af4751d6fd.jpg">
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="#" class="text-success" style="text-decoration: none;">
                                    <h4>MẶC LẠI TRANG PHỤC, CATE BLANCHETT TRUYỀN CẢM HỨNG THEO ĐUỔI THỜI TRANG THẢM ĐỎ BỀN VỮNG</h4>
                                </a>
                                <p class="">Dưới áp lực mặc đẹp, mặc “độc,” nhiều sao nữ tránh diện một thiết kế hai lần. Cate Blanchett -...</p>
                            </div>
                        </div>

                        <div class="row" style="padding-top: 10px;">
                            <div class="col-md-6">
                                <a href="#">
                                    <img class="img-responsive" src="./images/z4208018067069_644c2bed30fea15ad383f2419d1aca5c.jpg">
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="#" class="text-success" style="text-decoration: none;">
                                    <h4>LẬT MỞ HỒ SƠ PHONG CÁCH ĐỐI LẬP GIỮA LILY COLLINS VÀ EMILY COOPER</h4>
                                </a>
                                <p class="">Thời trang của hai cô gái, trên phim và ngoài đời, hư cấu và hiện thực… thời trang cũng có thể...</p>
                            </div>
                        </div>

                        <div class="row" style="padding-top: 10px;">
                            <div class="col-md-6">
                                <a href="#">
                                    <img class="img-responsive" src="./images/z4208018627841_f07a496b35a18624680e06a7a1e524e5.jpg">
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="#" class="text-success" style="text-decoration: none;">
                                    <h4>ĐẮM CHÌM VÀO NHỮNG BỘ CÁNH THẢM ĐỎ ĐA SẮC THÁI TRONG "ĐÊM ĐẦY SAO" ELLE BEAUTY AWARDS 2023</h4>
                                </a>
                                <p class="">Đúng với tinh thần "Giao hưởng của những giấc mơ", thời trang thảm đỏ tại ELLE Beauty Awards..</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" style="padding-top: 30px;">
                    <div> 
                        <img src="./images/fire-icon-png-4.jpg" class="img-responsive col-md-1" style="width: 70px"> 
                    </div>
                   
                    <h2 class="col-md-11">TIN NỔI BẬT</h2>
                </div>
                
                <div class="row" style="padding-top: 20px;">
                    <div class="col-md-5">
                        <a href="#">
                            <img class="img-responsive" src="./images/z4208220234613_0aa8efaa19bed08e58c98606418ff45d.jpg">
                        </a>
                    </div>
                    <div class="col-md-7">
                        <a href="#" class="text-success" style="text-decoration: none;">
                            <h4>GIẢI MÃ SỨC HÚT CỦA JENNIE (BLACKPINK): NHÂN TỐ ĐƯỢC MỌI THƯƠNG HIỆU THỜI TRANG SĂN LÙNG</h4>
                        </a>
                        <p>Điều gì ở Jennie Kim khiến các nhãn hàng chi hàng chục triệu đô để săn đón, phải chăng chỉ dừng...</p>
                    </div>
                </div>

                <div class="row" style="padding-top: 30px;">
                    <div class="col-md-5">
                        <a href="#">
                            <img class="img-responsive" src="./images/z4208220982214_577e9aedfdf5ba69083321b702f88b30.jpg">
                        </a>
                    </div>
                    <div class="col-md-7">
                        <a href="#" class="text-success" style="text-decoration: none;">
                            <h4>DÀN SAO NỮ THE GLORY VÀ NHỮNG ĐIỂM TƯƠNG ĐỒNG VỚI VAI DIỄN TRONG PHONG CÁCH ĐỜI THỰC</h4>
                        </a>
                        <p class="">Bước ra khỏi cuộc chiến váy áo kịch liệt sau 2 phần The Glory, hội nhân vật nữ học được những...</p>
                    </div>
                </div>

                <div class="row" style="padding-top: 30px;">
                    <div class="col-md-5">
                        <a href="#">
                            <img class="img-responsive" src="./images/z4208221388066_b7b0fd1aa5f046855be6c0de332d89a3.jpg">
                        </a>
                    </div>
                    <div class="col-md-7">
                        <a href="#" class="text-success" style="text-decoration: none;">
                            <h4>THẢM "CHAMPAGNE" OSCAR 2023: MANG SẮC TRẮNG, BẠC ĐỂ "RINH" TƯỢNG VÀNG</h4>
                        </a>
                        <p class="">Lần đầu tiên trong suốt 6 thập kỷ, Oscar thay thế thảm đỏ bằng màu champagne, những ngôi sao đổ...</p>
                    </div>
                 </div>

                <div class="row" style="padding-top: 30px;">
                    <div class="col-md-5">
                        <a href="#">
                            <img class="img-responsive" src="./images/z4208222280416_468eddbc017d43f9d5d6e211138dd4c4.jpg">
                        </a>
                    </div>
                    <div class="col-md-7">
                        <a href="#" class="text-success" style="text-decoration: none;">
                            <h4>DƯƠNG TỬ QUỲNH: BIỂU TƯỢNG THANH LỊCH "CHINH CHIẾN" THẢM ĐỎ HƠN HAI THẬP KỶ</h4>
                        </a>
                        <p class="">Trong phạm vi phong cách, Dương Tử Quỳnh chứng minh vị thế “lão làng” bằng những bí quyết đáng...</p>
                    </div>
                </div>

                <div class="text-center" style="padding-top: 30px; padding-bottom: 30px;">
                    <a href="#" style="text-decoration: none" >XEM THÊM...</a>
                </div>
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