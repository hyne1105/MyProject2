<?php
if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";   
}else{

?>

<?php
if(isset($_GET['edit_box'])){
    $edit_box = $_GET['edit_box'];
    $get_box = "select * from boxes_section where box_id='$edit_box'";
    $run_box = mysqli_query($con,$get_box);
    $row_box = mysqli_fetch_array($run_box);
    $box_id = $row_box['box_id'];
    $box_title = $row_box['box_title'];
    $box_desc = $row_box['box_desc'];
}

?>

<div style="padding-left: 270px;">
    <div class="row">
        <div class="col-lg-8">
            <div class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Bảng Điều Khiển / Chỉnh Sửa Box
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
                        <i class="fa fa-edit fa-w"></i> Chỉnh Sửa Box
                    </h3>
                </div>
                <div class="panel-body">
                <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Tiêu Đề Box:</label>
                            <div class="col-md-6">
                                <input type="text" name="box_title" class="form-control" required value="<?php echo $box_title; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Nội Dung:</label>
                            <div class="col-md-6">
                                <input type="text" name="box_desc" class="form-control" required value="<?php echo $box_desc; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-6">
                                <input type="submit" name="update" value="Cập nhật" class="btn btn-primary form-control">
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
    $box_title=$_POST['box_title'];
    $box_desc=$_POST['box_desc'];

    $update_box = "update boxes_section set box_title='$box_title',box_desc='$box_desc' where box_id='$box_id'";

    $run_box=mysqli_query($con,$update_box);

    if($run_box){
        echo "<script>alert('Box đã được cập nhật thành công')</script>";
        echo "<script>window.open('index.php?view_box','_self')</script>";
    }
    
}
?>


<?php } ?>