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
                    <i class="fa fa-dashboard"></i> Bảng Điều Khiển / Xem Quản Trị Viên
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-eye fa-fw"></i> Xem Quản Trị Viên
                    </h3>
                </div>
                <div class="panel-body text-center">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Tên quản trị viên</th>
                                    <th>Email quản trị viên</th>
                                    <th>Hình ảnh</th> 
                                    <th>Quốc gia</th>
                                    <th>Công việc</th> 
                                    <th>Xóa quản trị viên</th> 
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $get_admin="select * from admins";
                                $run_admin=mysqli_query($con,$get_admin);
                                while($row_admin=mysqli_fetch_array($run_admin)){
                                    $admin_id=$row_admin['admin_id'];
                                    $admin_name=$row_admin['admin_name'];
                                    $admin_email=$row_admin['admin_email'];
                                    $admin_image=$row_admin['admin_image'];
                                    $admin_country=$row_admin['admin_country'];
                                    $admin_job=$row_admin['admin_job'];
                                ?>   
                            
                                <tr>
                                    <td><?php echo $admin_name; ?></td>
                                    <td><?php echo $admin_email; ?></td>
                                    <td><img src="admin_images/<?php echo $admin_image; ?>" width="100"></td>
                                    <td><?php echo $admin_country; ?></td>
                                    <td><?php echo $admin_job; ?></td>
                                    <td>
                                        <a style="text-decoration: none;" href="index.php?user_delete=<?php echo $admin_id; ?>">
                                            <i class="fa fa-trash-o"></i> Xóa
                                        </a>
                                    </td>
                                </tr>  
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php } ?>