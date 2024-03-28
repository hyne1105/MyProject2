<div id="footer">
    <div class="container">
        <div class="row">
                <div class="col-md-3 col-sm-6">
                    <h4>Các trang</h4>
                    <ul>
                        <li><a href="cart.php">Giỏ hàng</a></li>
                        <li><a href="contactus.php">Liên hệ</a></li>
                        <li><a href="shop.php">Cửa hàng</a></li>
                        <li><a href="customer/my_account.php">Tài khoản của tôi</a></li>
                    </ul>
                    <hr>
                    <h4>Người dùng</h4>
                    <ul>
                    <li>
                        <?php
                        if(!isset($_SESSION['customer_email'])){
                            echo "<a href='customer_login.php'>Đăng nhập</a>";
                        }else{
                            echo"<a href='logout.php'>Đăng xuất</a>";
                        }
                        ?>
                    </li>
                        <li><a href="customer_registration.php">Đăng ký</a></li>
                    </ul>
                    <hr class="hidden-md hidden-lg hidden-sm">
                </div>

                <div class="col-md-3 col-sm-6">
                    <h4>Danh mục sản phẩm hàng đầu</h4>
                    <ul>
                        <?php
                        $get_p_carts="select * from product_categories";
                        $run_p_cats=mysqli_query($con,$get_p_carts);
                        while ($row_p_cat=mysqli_fetch_array($run_p_cats)){
                            $p_cat_id=$row_p_cat['p_cat_id'];
                            $p_cat_title=$row_p_cat['p_cat_title'];
                            echo "<li><a href='shop.php?p_cat= $p_cat_id'> $p_cat_title </a><li>";
                        }
                        ?>
                    </ul>
                    <hr class="hidden-md hidden-lg">
                </div>

                <div class="col-md-3 col-sm-6">
                    <h4>Liên hệ chúng tôi</h4>
                    <p>
                        <strong>ONEW.com</strong>
                        <br>Quận Ninh Kiều, Cần Thơ
                        <br>onew@gmail.com
                        <br>+84 946053795
                    </p>
                    <a href="contactus.php">Tới trang liên hệ với chúng tôi</a>
                    <hr class="hidden-md hidden-lg"> 
                </div> 

                <div class="col-md-3 col-sm-6">
                    <h4>Nhận tin tức</h4>
                    <p class="text-muted">
                        Đăng ký tại đây để nhận tin tức từ ONEW
                    </p>
                    <form action="" method="post">
                        <div class="input-group">
                            <input type="text" name="email" class="form-control">
                            <span class="input-group-btn">
                                <input type="submit" class="btn btn-default" value="Subscribe">
                            </span>
                        </div>
                    </form>
                    <hr>
                    <h4>Kết nối với chúng tôi</h4>
                    <p class="social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                        <a href="#"><i class="fa fa-envelope"></i></a>
                    </p>
                </div>
        </div>
    </div>

    <div id="copyright">
        <div class="container"> 
            <div class="col-md-6">
                <p class="pull-left">
                    &copy; 2023 ONEW
                </p>
            </div>
            <div class="col-md-6">
                <p class="pull-right">
                    Website: <a href="#">ONEW.com</a>
                </p>
            </div>
        </div>
    </div>
</div>