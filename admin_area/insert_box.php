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
                    <i class="fa fa-dashboard"></i> Bảng Điều Khiển / Thêm Box
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
                        <i class="fa fa-edit fa-w"></i> Thêm Box
                    </h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Tiêu Đề Box:</label>
                            <div class="col-md-6">
                                <input type="text" name="box_title" class="form-control" required="">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label">Nội Dung:</label>
                            <div class="col-md-6">
                                <textarea name="box_desc" class="form-control" rows="6" cols="19"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-6">
                                <input type="submit" name="submit" value="Thêm Box" class="btn btn-primary form-control">
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
    $box_title=$_POST['box_title'];
    $box_desc=$_POST['box_desc'];
    $insert="insert into boxes_section (box_title,box_desc) 
    values ('$box_title', '$box_desc')";
    $run_box=mysqli_query($con,$insert);

    echo "<script>alert('Box mới đã được thêm thành công')</script>";
    echo "<script>window.open('index.php?view_box','_self')</script>";
    }
?>

<?php } ?>