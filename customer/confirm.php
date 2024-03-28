<?php
session_start();
if(!isset($_SESSION['customer_email'])){
    echo "<script>window.open('../checkout.php','_self')</script>";
}else{

include("includes/db.php");
include("functions/functions.php");

if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];
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
                <a href="./my_account.php" class="btn btn-info btn-sm">
                    <?php
                    if(!isset($_SESSION['customer_email'])){
                        echo "Xin chào";
                    }else{
                        echo "Xin chào: ".$_SESSION['customer_email']." ";
                    }
                    ?>
                </a>
                <a href="../cart.php">Tổng Tiền Trong Giỏ Hàng: <?php totalPrice(); ?> VND, Tổng Sản Phẩm: <?php item(); ?></a>
            </div>
            <div class="col-md-4">
                <ul class="menu">
                    <li>
                        <a href="../customer_registration.php">Đăng ký</a>
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
                <a class="navbar-brand home" href="../index.php">
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
                            <a href="../index.php">Trang chủ</a>
                        </li>
                        <li>
                            <a href="../shop.php">Cửa hàng</a>
                        </li>
                        <li>
                            <a href="../cart.php">Giỏ hàng</a>
                        </li>
                        <li>
                            <a href="../news.php">Tin tức</a>
                        </li>
                        <li>
                            <a href="../contactus.php">Liên hệ</a>
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
                        Tài Khoản Của Tôi
                    </li>
                </ul>
            </div>
            <div class="col-md-3">
                <?php
                include("includes/sidebar.php");
                ?>
            </div>
            <div class="col-md-9">
                <div class="box">
                    <h2 align="center">Vui Lòng Xác Nhận Thanh Toán Của Bạn</h2>
                    <form action="confirm.php?update_id=<?php echo $order_id ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Số hóa đơn</label>
                            <input type="text" class="form-control" name="invoice_number" required="">
                        </div>
                        <div class="form-group">
                            <label>Số tiền thanh toán</label>
                            <input type="text" class="form-control" name="amount" required="">
                        </div>
                        <div class="form-group">
                            <label>Chọn hình thức thanh toán</label>
                            <select class="form-control" name="payment_mode">
                                <option>Chuyển khoản ngân hàng</option>
                                <option>Thanh toán qua VISA/MasterCard</option>
                                <option>Thanh toán qua ví điện tử MoMo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Số tài khoản giao dịch</label>
                            <input type="text" class="form-control" name="trfr_number" required="">
                        </div>
                        <div class="form-group">
                            <label>Ngày thanh toán</label>
                            <input type="date" class="form-control" name="date" required="">
                        </div>
                        <div class="text-center">
                            <button type="submit" name="confirm_payment" class="btn btn-primary btn-lg">
                                Xác nhận thanh toán
                            </button>
                        </div>
                    </form>
<?php
if(isset($_POST['confirm_payment'])){
    $update_id=$_GET['update_id'];
    $invoice_number=$_POST['invoice_number'];
    $amount=$_POST['amount'];
    $payment_mode=$_POST['payment_mode'];
    $trfr_number=$_POST['trfr_number'];
    $date=$_POST['date'];
    $complete="Hoàn tất";
    $insert="insert into payments (invoice_id,amount,payment_mode,ref_no,payment_date) 
    values ('$invoice_number','$amount','$payment_mode','$trfr_number','$date') 
    ";
    $run_insert=mysqli_query($con,$insert);
    $update_q="update customer_order set order_status='$complete' where order_id='$update_id'";
    $run_insert=mysqli_query($con,$update_q);
    // $update_p="update pending_order set order_status='$complete' where order_id='$update_id'";
    // $run_insert=mysqli_query($con,$update_p);

    echo "<script>alert('Đơn đặt hàng của bạn đã được nhận')</script>";
    echo "<script>window.open('my_account.php?order','_self')</script>";
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

<?php } ?>