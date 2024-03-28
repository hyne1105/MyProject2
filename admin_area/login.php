<?php
session_start();
include("includes/db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" type="image" href="../images/logo.jpg"/>
    <title>Đăng Nhập Quản Trị Viên</title>
</head>
<body>
    <div class="container">
        <form class="form-login" action="" method="post">
            <h2 class="form-login-heading">Đăng Nhập <br> Quản Trị Viên</h2>
            <input type="text" class="form-control" name="admin_email" placeholder="Nhập email" required>
            <input type="password" class="form-control" name="admin_pass" placeholder="Nhập mật khẩu" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="admin_login">
            Đăng nhập
            </button>
            <h4 class="forgot-password">
               <a href="forgot_password.php"> Quên mật khẩu?</a>  
            </h4>
        </form>
    </div>
</body>
</html>

<?php
if(isset($_POST['admin_login'])){
    $admin_email=mysqli_real_escape_string($con,$_POST['admin_email']);
    $admin_pass=mysqli_real_escape_string($con,$_POST['admin_pass']);
    $get_admin="select * from admins where admin_email='$admin_email' AND admin_pass='$admin_pass'";
    $run_admin=mysqli_query($con,$get_admin);
    $count=mysqli_num_rows($run_admin);
    if($count==1){
        $_SESSION['admin_email']=$admin_email;
        echo "<script>alert('Bạn đã đăng nhập')</script>";
        echo "<script>window.open('index.php?dashboard','_self')</script>";
    }else{
        echo "<script>alert('Email hoặc mật khẩu sai')</script>";
    }
}

?>
