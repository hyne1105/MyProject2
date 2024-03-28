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
    <div class="container" id="slider">
        <div class="col-md-12">
            <div class="carousel slide" id="myCarousel" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="myCarousel" data-slide-to="1"></li>
                    <li data-target="myCarousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <?php
                    $get_slider="select * from slider LIMIT 0,1";
                    $run_slider=mysqli_query($con,$get_slider);
                    while($row=mysqli_fetch_array($run_slider)){
                        $slider_name=$row['slider_name'];
                        $slider_image=$row['slider_image'];
                        $slider_url=$row['slider_url'];
                        echo "<div class='item active'>
                        <a href='$slider_url'><img src='admin_area/slider_images/$slider_image'></a>
                        </div>
                        "; 
                    }
                    ?>  
                    <?php
                    $get_slider="select * from slider LIMIT 1,3";
                    $run_slider=mysqli_query($con,$get_slider);
                    while($row=mysqli_fetch_array($run_slider)){
                        $slider_name=$row['slider_name'];
                        $slider_image=$row['slider_image'];
                        $slider_url=$row['slider_url'];
                        echo "<div class='item'>
                        <a href='$slider_url'><img src='admin_area/slider_images/$slider_image'></a>
                        </div>
                        "; 
                    }
                    ?>  
                </div>
                <a href="#myCarousel" class="left carousel-control" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>

                <a href="#myCarousel" class="right carousel-control" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    <div id="advantage">
        <div class="container">
            <div class="same-height-row">
                <?php
                $get_boxes="select * from boxes_section";
                $run_box=mysqli_query($con,$get_boxes);
                while($row=mysqli_fetch_array($run_box)){
                    $box_id=$row['box_id'];
                    $box_title=$row['box_title'];
                    $box_desc=$row['box_desc'];
                
                ?>

                <div class="col-sm-4">
                    <div class="box same-height">
                        <div class="icon">
                            <i class="fa fa-heart"></i>
                        </div>
                        <h3><a href="#"><?php echo $box_title; ?></h3>
                            <p><?php echo $box_desc; ?></p>
                    </div>
                </div>

                <?php } ?>
             
            </div>
        </div>
    </div>

    <div id="hot">
        <div class="box">
            <div class="container">
                <div class="col-md-12">
                    <h2>MỚI NHẤT TUẦN NÀY</h2>
                </div>
            </div>
        </div>
    </div>

    <div id="content" class="container">
        <div class="row">
            <?php
            getPro();
            ?>
        </div>
    </div>

    <?php
    include("includes/footer.php");
    ?>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>