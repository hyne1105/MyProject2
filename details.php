<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
?>
<?php
if(isset($_GET['pro_id'])){
   $pro_id=$_GET['pro_id'];
   $get_product="select * from products where product_id='$pro_id' ";
   $run_product=mysqli_query($con,$get_product);
   $row_product=mysqli_fetch_array($run_product);
   $p_cat_id=$row_product['p_cat_id'];
   $p_title=$row_product['product_title'];
   $p_price=$row_product['product_price'];
   $p_desc=$row_product['product_desc'];
   $p_img1=$row_product['product_img1'];
   $p_img2=$row_product['product_img2'];
   $p_img3=$row_product['product_img3'];
   $get_p_cat="select * from product_categories where p_cat_id='$p_cat_id'";
   $run_p_cat=mysqli_query($con,$get_p_cat);
   $row_p_cat=mysqli_fetch_array($run_p_cat);
   $p_cat_id=$row_p_cat['p_cat_id'];
   $p_cat_title=$row_p_cat['p_cat_title'];
}
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
                    <li>
                        <a href="shop.php?p_cat=<?php echo $p_cat_id; ?>"></a>
                        <?php
                            echo $p_cat_title 
                        ?>  
                    </li>
                    <li>
                        <?php
                        echo $p_title
                        ?>
                    </li>
                </ul>
            </div>
            <div class="col-md-3">
                <?php
                include("includes/sidebar.php");
                ?>
            </div>
            <div class="col-md-9">
                <div class="row" id="productmain">
                    <div class="col-sm-6">
                        <div id="mainimage">
                            <div id="mycarousel" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#mycarousel" data-slide-to="1"></li>
                                    <li data-target="#mycarousel" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <center>
                                            <img src="admin_area/product_images/<?php echo $p_img1 ?>" class="img-responsive">
                                        </center>
                                    </div>
                                    <div class="item">
                                        <center>
                                            <img src="admin_area/product_images/<?php echo $p_img2 ?>" class="img-responsive">
                                        </center>
                                    </div>
                                    <div class="item">
                                        <center>
                                            <img src="admin_area/product_images/<?php echo $p_img3 ?>" class="img-responsive">
                                        </center>
                                    </div>
                                </div>
                                <a href="#mycarousel" class="left carousel-control" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a href="#mycarousel" class="right carousel-control" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="box">
                            <h1 class="text-center"><?php echo $p_title ?></h1>
                            <?php
                                addCart();
                            ?>
                            <form action="details.php?add_cart=<?php echo $pro_id ?>" method="post" class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-md-5 control-label">Số Lượng Sản Phẩm</label>
                                    <div class="col-md-7">
                                        <select name="product_qty" class="form-control">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-5 control-label">Kích thước</label>
                                    <div class="col-md-7">
                                        <select name="product_size" class="form-control">
                                            <option>Chọn 1 kích thước</option>
                                            <option>Nhỏ</option>
                                            <option>Trung bình</option>
                                            <option>Lớn</option>
                                            <option>Rất lớn</option>
                                        </select>
                                    </div>
                                </div>
                                <p class="price"><?php echo $p_price; ?> VND</p>
                                <p class="text-center buttons">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng
                                    </button>
                                </p>
                            </form>
                        </div>
                        <div class="col-xs-4">
                            <a href="#" class="thumb">
                                <img src="admin_area/product_images/<?php echo $p_img1 ?>" class="img-responsive">
                            </a>
                        </div>
                        <div class="col-xs-4">
                            <a href="#" class="thumb">
                                <img src="admin_area/product_images/<?php echo $p_img2 ?>" class="img-responsive">
                            </a>
                        </div>
                        <div class="col-xs-4">
                            <a href="#" class="thumb">
                                <img src="admin_area/product_images/<?php echo $p_img3 ?>" class="img-responsive">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="box" id="details">
                    <h4>Chi Tiết Sản Phẩm</h4>
                    <p><?php echo $p_desc ?></p>
                    <h4>Kích thước</h4>
                    <ul>
                        <li>Nhỏ</li>
                        <li>Vừa</li>
                        <li>Lớn</li>
                        <li>Rất lớn</li>
                    </ul>
                </div>
                <div class="row same-height-row">
                    <div class="col-md-3 col-sm-6">
                        <div class="box same same-height headline">
                            <h3 class="text-center">Bạn cũng thích những sản phẩm này</h3>
                        </div>
                    </div>
                    <?php
                        $get_product="select * from products order by 1 LIMIT 0,3";
                        $run_product=mysqli_query($con,$get_product);
                        while($row=mysqli_fetch_array($run_product)){
                            $pro_id=$row['product_id'];
                            $product_title=$row['product_title'];
                            $product_price=$row['product_price'];
                            $product_img1=$row['product_img1'];

                            echo "
                                <div class='center-responsive col-md-3 col-sm-6'>
                                    <div class='product same-height'>
                                        <a href='details.php?pro_id=$pro_id'>
                                            <img src='admin_area/product_images/$product_img1' class='img-responsive'>
                                        </a>
                                        <div class='text'>
                                            <h3>
                                                <a href='details.php?pro_id=$pro_id'>
                                                $product_title
                                                </a>
                                            </h3>
                                            <p class='price'>
                                                $product_price
                                            </p>
                                        </div>
                                        
                                    </div>
                                </div>
                            ";
                        }
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