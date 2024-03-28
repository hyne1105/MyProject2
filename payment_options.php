<div class="box">
    <?php
    $session_email=$_SESSION['customer_email'];
    $select_customer="select * from customers where customer_email='$session_email'";
    $run_cust=mysqli_query($con,$select_customer);
    $row_customer=mysqli_fetch_array($run_cust);
    $customer_id=$row_customer['customer_id'];
    ?>
    <h1 class="text-center">Các Hình Thức Thanh Toán</h1>
    <p class="lead text-center">
        <a href="order.php?c_id=<?php echo $customer_id ?>">Chuyển Khoản Ngân Hàng</a> 
    </p>
    <center>
        <p class="lead col-12">
            <a href="#">Thanh Toán Qua VISA/MasterCard
                <img src="images/visa-and-master-cards.png" class="img-responsive" width="200" style="padding-left: 50px">
            </a>
        </p>
    </center>
    <center>
        <p class="lead col-12">
            <a href="#">Thanh Toán Ví MoMo
                <img src="images/MoMo_Logo.png" class="img-responsive" width="120" style="padding-left: 50px">
            </a>
        </p>
    </center>
</div>