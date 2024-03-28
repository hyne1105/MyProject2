<?php
if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";   
}else{

?>

<div style="padding-left: 270px;">
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Bảng Điều Khiển / Xem Thông Tin
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-eye fa-fw"></i> Xem Thông Tin
                    </h3>
                </div>
                <div class="panel-body">
                        <div class="panel">
                            <div class="panel-body">
                                <div class="col-md-4">
                                    <div class="thumb-info mb-md">
                                        <img class="img-rounded img-responsive" width="300" src="admin_images/<?php echo $admin_image ?>" >
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="text-center">
                                           <h2>Thông Tin Quản Trị Viên</h2> 
                                    </div>
                                    <div class="mb-md" style="font-size: 17px;">
                                        <div class="widget-content-expanded" >
                                            <i class="fa fa-user"></i> <span>Tên: </span> <?php echo $admin_name ?><br>
                                            <i class="fa fa-vcard-o"></i> <span>Công việc: </span> <?php echo $admin_job ?><br>
                                            <i class="fa fa-google-plus"></i> <span>Email: </span> <?php echo $admin_email ?><br>
                                            <i class="fa fa-globe"></i> <span>Quốc gia: </span> <?php echo $admin_country ?> <br>
                                            <i class="fa fa-phone"></i> <span>Số điện thoại: </span> <?php echo $admin_contact ?> <br>
                                        </div>
                                        <hr class="dotted short">
                                        <h5 class="text-muted">Giới thiệu</h5>
                                        <p><?php echo $admin_about ?></p>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php } ?>