<?php
if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";   
}else{
?>

<div style="padding-left: 270px;">
    <div class="row">
        <div class="col-lg-12">
            <div class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Bảng Điều Khiển / Thêm Quản Trị Viên
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2">

        </div>
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-edit fa-w"></i> Thêm Quản Trị Viên
                    </h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Tên Quản Trị Viên:</label>
                            <div class="col-md-6">
                                <input type="text" name="admin_name" class="form-control" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Email Quản Trị Viên:</label>
                            <div class="col-md-6">
                                <input type="text" name="admin_email" class="form-control" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Mật Khẩu:</label>
                            <div class="col-md-6">
                                <input type="text" name="admin_pass" class="form-control" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Quốc Gia:</label>
                            <div class="col-md-6">
                                <input type="text" name="admin_country" class="form-control" required="">
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <label class="col-md-3 control-label">Công Việc:</label>
                            <div class="col-md-6">
                                <input type="text" name="admin_job" class="form-control" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Số Điện Thoại:</label>
                            <div class="col-md-6">
                                <input type="text" name="admin_contact" class="form-control" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Giới Thiệu:</label>
                            <div class="col-md-6">
                                <textarea name="admin_about" class="form-control" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Hình Ảnh:</label>
                            <div class="col-md-6">
                                <input type="file" name="admin_image" class="form-control" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-6">
                                <input type="submit" name="submit" value="Thêm" class="btn btn-primary form-control">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
</div>

<?php
if(isset($_POST['submit'])){
    $admin_name=$_POST['admin_name'];
    $admin_email=$_POST['admin_email'];
    $admin_pass=$_POST['admin_pass'];
    $admin_country=$_POST['admin_country'];
    $admin_job=$_POST['admin_job'];
    $admin_contact=$_POST['admin_contact'];
    $admin_about=$_POST['admin_about'];

    $admin_image=$_FILES['admin_image']['name'];
    $temp_admin_image=$_FILES['admin_image']['tmp_name']; 
    move_uploaded_file($temp_admin_image, "admin_images/$admin_image");

    $insert_admin="insert into admins (admin_name,admin_email,admin_pass,admin_image,
    admin_contact,admin_country,admin_job,admin_about) values
    ('$admin_name','$admin_email',$admin_pass,'$admin_image','$admin_contact',
    '$admin_country','$admin_job','$admin_about')";

    $run_admin=mysqli_query($con,$insert_admin);

    if($run_admin){
        echo "<script>alert('Quản trị viên mới đã được thêm thành công')</script>";
        echo "<script>window.open('index.php?view_users','_self')</script>";
    }
    
}
?>

<?php } ?>