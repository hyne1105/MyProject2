<?php
include("includes/db.php");
if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";   
}else{

?>
<?php

?>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse"
        data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
        </button>
        <a href="index.php?dashboard" class="navbar-brand">Quản Trị</a>
    </div>
    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
               <i class="fa fa-user"></i> <?php echo $admin_name ?>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a href="index.php?view_profile">
                        <i class="fa fa-fw-user"></i> Thông Tin
                    </a>
                </li>
                <li>
                    <a href="index.php?view_product">
                        <i class="fa fa-fw-envelope"></i> Các Sản Phẩm
                        <span class="badge"><?php echo $count_pro ?></span>
                    </a>
                </li>
                <li>
                    <a href="index.php?view_customer">
                        <i class="fa fa-fw-users"></i> Khách Hàng
                        <span class="badge"><?php echo $count_cust ?></span>
                    </a>
                </li>
                <li>
                    <a href="index.php?view_product_cat">
                        <i class="fa fa-fw-gear"></i> Danh Mục Sản Phẩm
                        <span class="badge"><?php echo $count_p_cat ?></span>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="logout.php">Đăng Xuất
                        <i class="fa fa-fw fa-sign-out"></i>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav sidebar-nav">
            <li>
                <a href="index.php?dashboard">
                    <i class="fa fa-fw fa-dashboard"></i> Bảng Điều Khiển
                </a>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#users">
                    <i class="fa fa-fw fa-user"></i> Quản Trị Viên
                </a>
                <i class="fa fa-fw fa-caret-down"></i>
          
                <ul id="users" class="collapse">
                    <li>
                        <a href="index.php?insert_users">Thêm Quản Trị Viên</a>
                    </li>
                    <li>
                        <a href="index.php?view_users">Xem Quản Trị Viên</a>
                    </li>
                    <li>
                        <a href="index.php?user_profile=<?php echo $admin_id ?>">Chỉnh Sửa Thông Tin</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#products">
                    <i class="fa fa-fw fa-archive"></i> Sản Phẩm
                </a>
                <i class="fa fa-fw fa-caret-down"></i>
          
                <ul id="products" class="collapse">
                    <li>
                        <a href="index.php?insert_product">Thêm Sản Phẩm</a>
                    </li>
                    <li>
                        <a href="index.php?view_product">Xem Sản Phẩm</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#product_cat">
                    <i class="fa fa-fw fa-shopping-cart"></i> Danh Mục Sản Phẩm
                </a>
                <i class="fa fa-fw fa-caret-down"></i>
          
                <ul id="product_cat" class="collapse">
                    <li>
                        <a href="index.php?insert_product_cat">Thêm Danh Mục Sản Phẩm</a>
                    </li>
                    <li>
                        <a href="index.php?view_product_cat">Xem Danh Mục Sản Phẩm</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#category">
                    <i class="fa fa-fw fa-list-ul"></i> Phân Loại
                </a>
                <i class="fa fa-fw fa-caret-down"></i>
          
                <ul id="category" class="collapse">
                    <li>
                        <a href="index.php?insert_categories">Thêm Phân Loại</a>
                    </li>
                    <li>
                        <a href="index.php?view_categories">Xem Phân Loại</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#boxes">
                    <i class="fa fa-fw fa-arrows"></i> Boxes
                </a>
                <i class="fa fa-fw fa-caret-down"></i>
          
                <ul id="boxes" class="collapse">
                    <li>
                        <a href="index.php?insert_box">Thêm Box</a>
                    </li>
                    <li>
                        <a href="index.php?view_box">Xem Box</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#slider">
                    <i class="fa fa-fw fa-th-large"></i> Slider
                </a>
                <i class="fa fa-fw fa-caret-down"></i>
          
                <ul id="slider" class="collapse">
                    <li>
                        <a href="index.php?insert_slider">Thêm Slide</a>
                    </li>
                    <li>
                        <a href="index.php?view_slider">Xem Slide</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="index.php?view_customer">
                    <i class="fa fa-fw fa-user-circle"></i> Khách Hàng
                </a>
            </li>
            <li>
                <a href="index.php?view_order">
                    <i class="fa fa-fw fa-file-text"></i> Đơn Đặt Hàng
                </a>
            </li>
            <li>
                <a href="index.php?view_payments">
                    <i class="fa fa-fw fa-credit-card"></i> Thanh Toán
                </a>
            </li>
        </ul>
    </div>
</nav>

<?php } ?>