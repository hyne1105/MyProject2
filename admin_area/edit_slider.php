<?php
if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";   
}else{

?>

<?php
if(isset($_GET['edit_slide'])){
    $edit_id = $_GET['edit_slide'];
    $edit_slide = "select * from slider where id='$edit_id'";
    $run_edit = mysqli_query($con,$edit_slide);
    $row_edit = mysqli_fetch_array($run_edit);
    $slide_id = $row_edit['id'];
    $slide_name = $row_edit['slider_name'];
    $slide_url = $row_edit['slider_url'];
    $slide_image = $row_edit['slider_image'];
}

?>

<div style="padding-left: 270px;">
    <div class="row">
        <div class="col-lg-8">
            <div class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Bảng Điều Khiển / Chỉnh Sửa Slide
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
                        <i class="fa fa-edit fa-w"></i> Chỉnh Sửa Slide
                    </h3>
                </div>
                <div class="panel-body">
                <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Tên Slide</label>
                            <div class="col-md-6">
                                <input type="text" name="slide_name" class="form-control" required value="<?php echo $slide_name; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Slide Url:</label>
                            <div class="col-md-6">
                                <input type="text" name="slide_url" class="form-control" required value="<?php echo $slide_url; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Hình Ảnh Slide</label>
                            <div class="col-md-6">
                                <input type="file" name="slide_image" class="form-control">
                                <br>
                                <img src="slider_images/<?php echo $slide_image; ?>" width="350">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-6">
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
    $slide_name=$_POST['slide_name'];
    $slide_url=$_POST['slide_url'];
    $slide_image=$_FILES['slide_image']['name'];
    $temp_name=$_FILES['slide_image']['tmp_name'];
    
    move_uploaded_file($temp_name, "slider_images/$slide_image");

    $update_slide = "update slider set slider_name='$slide_name',slider_image='$slide_image',
    slider_url='$slide_url' where id='$slide_id'";

    $run_slide=mysqli_query($con,$update_slide);

    if($run_slide){
        echo "<script>alert('Slide đã được cập nhật thành công')</script>";
        echo "<script>window.open('index.php?view_slider','_self')</script>";
    }
    
}
?>


<?php } ?>