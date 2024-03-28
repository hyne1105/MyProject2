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
                    <i class="fa fa-dashboard"></i> Bảng Điều Khiển / Thêm Slider
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
                        <i class="fa fa-edit fa-w"></i> Thêm Slider
                    </h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Tên Slide:</label>
                            <div class="col-md-6">
                                <input type="text" name="slide_name" class="form-control" required="">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label">Slide Url:</label>
                            <div class="col-md-6">
                                <input type="text" name="slide_url" class="form-control" required="">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-3 control-label">Hình Ảnh Slide:</label>
                            <div class="col-md-6">
                                <input type="file" name="slide_image" class="form-control" required="">
                            </div>
                           
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-6">
                                <input type="submit" name="submit" value="Thêm ngay" class="btn btn-primary form-control">
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
    $slide_name=$_POST['slide_name'];
    $slide_url=$_POST['slide_url'];
    $slide_image=$_FILES['slide_image']['name'];
    $temp_name=$_FILES['slide_image']['tmp_name'];
 
    $view_slides = "select * from slider";
    $view_run_slides = mysqli_query($con,$view_slides);
    $count = mysqli_num_rows($view_run_slides);

    if($count<4){
    move_uploaded_file($temp_name, "slider_images/$slide_image");

    $insert_slide="insert into slider(slider_name,slider_image,slider_url) 
    values ('$slide_name','$slide_image','$slide_url')";

    $run_slide=mysqli_query($con,$insert_slide);

    echo "<script>alert('Slide mới đã được thêm thành công')</script>";
    echo "<script>window.open('index.php?view_slider','_self')</script>";
    } 
    else{
        echo "<script>alert('Bạn đã chèn đủ 4 slide')</script>";
    }  
}
?>

<?php } ?>