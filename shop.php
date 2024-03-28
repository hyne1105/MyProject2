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
                        <li class="active">
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
                        Cửa Hàng
                    </li>
                </ul>
            </div>
            <div class="col-md-3">
                <?php
                include("includes/sidebar.php");
                ?>
            </div>
            <div class="col-md-9">
                <?php
                if(!isset($_GET['p_cat'])){
                    if(!isset($_GET['cat_id'])){
                        echo "<div class='box'>
                                <h1>Cửa Hàng</h1>
                                <p>Uy tín - Chất lượng</p>
                            </div>";
                    }
                }
                ?>
                <div class="row">
                    <?php
                    if(!isset($_GET['p_cat'])){
                        if(!isset($_GET['cat_id'])){
                            $per_page=6;
                            if(isset($_GET['page'])){
                                $page=$_GET['page'];  
                            }else{
                                $page=1;
                            }
                            $start_from=($page-1) * $per_page;
                            $get_product="select * from products order by 1 DESC 
                            LIMIT $start_from, $per_page";
                            $run_pro=mysqli_query($con,$get_product);
                            while($row=mysqli_fetch_array( $run_pro)){
                                $pro_id=$row['product_id'];
                                $pro_title=$row['product_title'];
                                $pro_price=$row['product_price'];
                                $pro_img1=$row['product_img1'];
                                $pro_price=number_format($pro_price,0,',','.');

                                echo "
                                <div class='col-md-4 col-sm-6 center-responsive'>
                                    <div class='product'>
                                        <a href='details.php?pro_id=$pro_id'>
                                            <img src='admin_area/product_images/$pro_img1' class='img-responsive'>
                                        </a>
                                        <div class='text'>
                                            <h3><a href='details.php?pro_id=$pro_id'> $pro_title </a></h3>
                                            <p class='price'> $pro_price VND </p>
                                            <p class='buttons'>
                                                <a href='details.php?pro_id=$pro_id' class='btn btn-default'>Xem chi tiết</a>
                                                <a href='details.php?pro_id=$pro_id' class='btn btn-primary'>
                                                    <i class='fa fa-shopping-cart'></i> Thêm vào giỏ
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                ";
                              
                            }
                       
                    ?>
                    
                </div>
                <center>
                    <ul class="pagination">
                        <?php
                            $query="select * from products";
                            $result=mysqli_query($con,$query);
                            $total_record=mysqli_num_rows($result);
                            $total_pages=ceil($total_record/$per_page);
                            echo "<li><a href='shop.php?page=1'> ".'Trang đầu'." </a></li>";
                            for($i=1; $i<=$total_pages; $i++){
                                echo "<li><a href='shop.php?=".$i."'>".$i."</a></li>";
                            };
                            echo "
                                <li><a href='shop.php?page=$total_pages'> ".'Trang cuối'." </a></li>
                            "; 
                        }
                        }
                        ?>
                    </ul>
                </center>
                <div class="row">
                    <?php
                        getPcatPro();
                        getCatPro();
                    ?>
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