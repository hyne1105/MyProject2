<?php
if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";   
}else{

?>

<?php
if(isset($_GET['edit_cat'])){
    $edit_id = $_GET['edit_cat'];
    $edit_cat = "select * from categories where cat_id='$edit_id'";
    $run_edit = mysqli_query($con,$edit_cat);
    $row_edit = mysqli_fetch_array($run_edit);
    $c_id = $row_edit['cat_id'];
    $c_title = $row_edit['cat_title'];
    $c_desc = $row_edit['cat_desc'];
}

?>

<div style="padding-left: 270px;">
    <div class="row">
        <div class="col-lg-8">
            <div class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Bảng Điều Khiển / Chỉnh Sửa Phân Loại
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
                        <i class="fa fa-edit fa-w"></i> Chỉnh Sửa Phân Loại
                    </h3>
                </div>
                <div class="panel-body">
                <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Tên Phân Loại</label>
                            <div class="col-md-5">
                                <input type="text" name="cat_title" class="form-control" required value="<?php echo $c_title; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Mô Tả Phân Loại</label>
                            <div class="col-md-5">
                                <textarea name="cat_desc" class="form-control" rows="6" cols="19"><?php echo $c_desc; ?></textarea>
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-5">
                                <input type="submit" name="update" value="Cập nhật phân loại" class="btn btn-primary form-control">
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
    $cat_title=$_POST['cat_title'];
    $cat_desc=$_POST['cat_desc'];

    $update_cat = "update categories set cat_title='$cat_title',
    cat_desc='$cat_desc' where cat_id='$c_id'";

    $run_cat=mysqli_query($con,$update_cat);

    if($run_cat){
        echo "<script>alert('Phân loại đã được cập nhật thành công')</script>";
        echo "<script>window.open('index.php?view_categories','_self')</script>";
    }
    
}
?>


<?php } ?>