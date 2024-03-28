<div class="box">
    <center>
        <h2>Bạn có thực sự muốn xóa tài khoản của mình không?</h2>
    </center>
    <form action="" method="POST">
        <center>
        <input type="submit" name="yes" value="Có, tôi muốn xóa" class="btn btn-danger">
        <input type="submit" name="no" value="Không, tôi không muốn xóa" class="btn btn-primary">
        </center>
    </form>   
</div>
<?php
$c_email=$_SESSION['customer_email'];
if(isset($_POST['yes'])){
    $delete_q="delete from customers where customer_email='$c_email'";
    $run_q=mysqli_query($con,$delete_q);
    if($run_q){
        session_destroy();
        echo "<script>alert('Tài khoản của bạn đã được xóa')</script>";
        echo "<script>window.open('../index.php','_self')</script>";
    }
}
?>