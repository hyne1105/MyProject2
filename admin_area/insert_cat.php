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
                    <i class="fa fa-dashboard"></i> Bảng Điều Khiển / Thêm Phân Loại
                </li>
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
                        <i class="fa fa-edit fa-w"></i> Thêm Phân Loại
                    </h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Tên Phân Loại:</label>
                            <div class="col-md-5">
                                <input type="text" name="cat_title" class="form-control" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Mô Tả Phân Loại:</label>
                            <div class="col-md-5">
                                <textarea type="text" name="cat_desc" class="form-control" rows="6" cols="19"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-5">
                                <input type="submit" name="submit" value="Thêm Phân Loại" class="btn btn-primary form-control">
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
    $cat_title=$_POST['cat_title'];
    $cat_desc=$_POST['cat_desc'];

    $insert_cat="insert into categories (cat_title,cat_desc) values
    ('$cat_title','$cat_desc')";

    $run_cat=mysqli_query($con,$insert_cat);

    if($run_cat){
        echo "<script>alert('Phân loại mới đã được thêm thành công')</script>";
        echo "<script>window.open('index.php?view_categories','_self')</script>";
    }
    
}
?>

<?php } ?>