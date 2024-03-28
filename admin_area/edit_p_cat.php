<?php
if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";   
}else{

?>

<?php
if(isset($_GET['edit_p_cat'])){
    $edit_p_cat_id = $_GET['edit_p_cat'];
    $edit_p_cat_query = "select * from product_categories where p_cat_id='$edit_p_cat_id'";
    $run_edit = mysqli_query($con,$edit_p_cat_query);
    $row_edit = mysqli_fetch_array($run_edit);
    $p_cat_id = $row_edit['p_cat_id'];
    $p_cat_title = $row_edit['p_cat_title'];
    $p_cat_desc = $row_edit['p_cat_desc'];
}

?>

<div style="padding-left: 270px;">
    <div class="row">
        <div class="col-lg-8">
            <div class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Bảng Điều Khiển / Chỉnh Sửa Danh Mục Sản Phẩm
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
                        <i class="fa fa-edit fa-w"></i> Chỉnh Sửa Danh Mục Sản Phẩm
                    </h3>
                </div>
                <div class="panel-body">
                <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Tên Danh Mục Sản Phẩm</label>
                            <div class="col-md-5">
                                <input type="text" name="p_cat_title" class="form-control" required value="<?php echo $p_cat_title; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Mô Tả Danh Mục Sản Phẩm</label>
                            <div class="col-md-5">
                                <textarea name="p_cat_desc" class="form-control" rows="6" cols="19"><?php echo $p_cat_desc; ?></textarea>
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-5">
                                <input type="submit" name="update" value="Cập nhật ngay" class="btn btn-primary form-control">
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
if(isset($_POST['update'])){
    $p_cat_title=$_POST['p_cat_title'];
    $p_cat_desc=$_POST['p_cat_desc'];

    $update_p_cat = "update product_categories set p_cat_title='$p_cat_title',
    p_cat_desc='$p_cat_desc' where p_cat_id='$p_cat_id'";

    $run_p_cat=mysqli_query($con,$update_p_cat);

    if($run_p_cat){
        echo "<script>alert('Danh mục sản phẩm đã được cập nhật thành công')</script>";
        echo "<script>window.open('index.php?view_product_cat','_self')</script>";
    }
    
}
?>


<?php } ?>