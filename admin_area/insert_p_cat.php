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
                    <i class="fa fa-dashboard"></i> Bảng Điều Khiển / Thêm Danh Mục Sản Phẩm
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
                        <i class="fa fa-edit fa-w"></i> Thêm Danh Mục Sản Phẩm
                    </h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Tên Danh Mục Sản Phẩm:</label>
                            <div class="col-md-5">
                                <input type="text" name="p_cat_title" class="form-control" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Mô Tả Danh Mục Sản Phẩm:</label>
                            <div class="col-md-5">
                                <textarea type="text" name="p_cat_desc" class="form-control" rows="6" cols="19"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-5">
                                <input type="submit" name="submit" value="Thêm Ngay" class="btn btn-primary form-control">
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
    $p_cat_title=$_POST['p_cat_title'];
    $p_cat_desc=$_POST['p_cat_desc'];

    $insert_p_cat="insert into product_categories (p_cat_title,p_cat_desc) values
    ('$p_cat_title','$p_cat_desc')";

    $run_p_cat=mysqli_query($con,$insert_p_cat);

    if($run_p_cat){
        echo "<script>alert('Danh mục sản phẩm mới đã được thêm thành công')</script>";
        echo "<script>window.open('index.php?view_product_cat','_self')</script>";
    }
    
}
?>

<?php } ?>