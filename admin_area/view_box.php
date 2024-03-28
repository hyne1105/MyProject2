<?php
include("includes/db.php");
if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";   
}else{

?>

<div style="padding-left: 270px;">
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Bảng Điều Khiển / Xem Box
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-eye fa-fw"></i> Xem Box
                    </h3>
                </div>
                <div class="panel-body">
                    <?php 
                    $get_boxes = "select * from boxes_section";
                    $run = mysqli_query($con,$get_boxes);
                    while($row=mysqli_fetch_array($run)){
                        $box_id=$row['box_id'];
                        $box_title=$row['box_title'];
                        $box_desc=$row['box_desc'];
                    
                    ?>
                    <div class="col-lg-4 col-md-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title" align="center">
                                    <?php echo $box_title; ?>
                                </h3>
                            </div>
                            <div class="panel-body">
                                <?php echo $box_desc ?>
                            </div>
                            <div class="panel-footer">
                                <center>
                                   <a href="index.php?delete_box=<?php echo $box_id ?>" class="pull-left">
                                        <i class="fa fa-trash"></i> Xóa
                                   </a> 
                                   <a href="index.php?edit_box=<?php echo $box_id ?>" class="pull-right">
                                        <i class="fa fa-pencil"></i> Chỉnh sửa
                                   </a> 
                                   <div class="clearfix">

                                   </div>
                                </center>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php } ?>