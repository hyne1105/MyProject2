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
                        <li class="active">
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
                        Giỏ Hàng
                    </li>
                </ul>
            </div>
            <div class="col-md-9" id="cart">
                <div class="box">
                    <form action="cart.php" method="post" enctype="multipart-form-data">
                        <h1>Giỏ Hàng</h1>
                        <?php
                        $ip_add=getUserIP();
                        $select_cat="select * from cart where ip_add='$ip_add'";
                        $run_cart=mysqli_query($con,$select_cat);
                        $count=mysqli_num_rows($run_cart);
                        ?>
                        <p class="text-muted">Hiện tại bạn có <?php echo $count ?> mặt hàng trong giỏ hàng của mình</p>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan="2">Sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Đơn giá</th>
                                        <th>Kích thước</th>
                                        <th colspan="1">Xóa</th>
                                        <th colspan="1">Tổng</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $total=0;
                                    while($row=mysqli_fetch_array($run_cart)){
                                        $pro_id=$row['p_id'];
                                        $pro_size=$row['size'];
                                        $pro_qty=$row['qty'];
                                        $get_product="select *from products where product_id='$pro_id'";
                                        $run_pro=mysqli_query($con,$get_product);
                                        while($row=mysqli_fetch_array($run_pro)){

                                        $p_title=$row['product_title'];
                                        $p_img1=$row['product_img1'];
                                        $p_price=$row['product_price'];
                                        $p_price=number_format($p_price,0,',','.');
                                        $sub_total=$row['product_price']*$pro_qty;
                                        $total += $sub_total;
                                        $sub_total=number_format($sub_total,0,',','.');
                                        $total=number_format($total,0,',','.');
                                    
                                    ?>
                                    <tr>
                                        <td><img src="admin_area/product_images/<?php echo $p_img1 ?>"></td>
                                        <td><?php echo $p_title ?></td>
                                        <td><?php echo $pro_qty ?></td>
                                        <td><?php echo $p_price ?> VND</td>
                                        <td><?php echo $pro_size ?></td>
                                        <td><input type="checkbox" name="remove[]" value="<?php echo  $pro_id ?>"></td>
                                        <td><?php echo $sub_total ?> VND</td>
                                    </tr>
                                    <?php

                                    }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="box-footer">
                            <div class="pull-left">
                                <h4>Tổng tiền sản phẩm</h4>
                            </div>
                            <div class="pull-right">
                                <h4><?php echo $total ?> VND</h4>
                            </div>
                        </div>
                        <div class="box-footer">
                            <div class="pull-left">
                                <a href="index.php" class="btn btn-default">
                                    <i class="fa fa-chevron-left"></i> Tiếp tục mua sắm
                                </a>
                            </div>
                            <div class="pull-right">
                                <button class="btn btn-default" type="submit" name="update" value="Cập nhật giỏ hàng">
                                    <i class="fa fa-refresh"></i> Cập nhật giỏ hàng
                                </button>
                                <a href="checkout.php" class="btn btn-primary">Tiến hành thanh toán
                                    <i class="fa fa-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
                <?php
                function update_cart(){
                    global $con;
                    if(isset($_POST['update'])){
                        foreach($_POST['remove'] as $remove_id){
                            $delete_product="delete from cart where p_id='$remove_id'";
                            $run_del=mysqli_query($con,$delete_product);
                            if($run_del){
                                echo "
                                <script>window.open('cart.php','_self')</script>
                                ";
                            }
                        }
                    }
                }
                echo @$up_cart=update_cart();
                ?>
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
                            $product_price=number_format($product_price,0,',','.');
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
                                                $product_price VND
                                            </p>
                                        </div>
                                        
                                    </div>
                                </div>
                            ";
                        }
                    ?>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box" id="order-summary">
                    <div class="box-header">
                        <h3>Đơn đặt hàng</h3>
                    </div>
                    <p class="text-muted">
                        Vận chuyển và chi phí bổ sung được tính toán dựa trên các giá trị bạn đã nhập
                    </p>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Tổng tiền sản phẩm</td>
                                    <th><?php echo $total ?> VND</th>
                                </tr>
                                <tr>
                                    <td>Vận chuyển và xử lý</td>
                                    <td>0 VND</td>
                                </tr>
                                <tr>
                                    <td>Thuế</td>
                                    <td>0 VND</td>
                                </tr>
                                <tr class="total">
                                    <td>Tổng cộng</td>
                                    <th><?php echo $total ?> VND</th>
                                </tr>
                            </tbody>
                        </table>
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