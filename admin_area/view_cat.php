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
                    <i class="fa fa-dashboard"></i> Bảng Điều Khiển / Xem Phân Loại
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-eye fa-fw"></i> Xem Phân Loại
                    </h3>
                </div>
                <div class="panel-body text-center">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>ID phân loại</th>
                                    <th>Tên phân loại</th>
                                    <th>Mô phân loại</th>
                                    <th>Xóa phân loại</th> 
                                    <th>Chỉnh sửa phân loại</th> 
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=0;
                                $get_cats="select * from categories";
                                $run_cats=mysqli_query($con,$get_cats);
                                while($row_cats=mysqli_fetch_array($run_cats)){
                                    $cat_id=$row_cats['cat_id'];
                                    $cat_title=$row_cats['cat_title'];
                                    $cat_desc=$row_cats['cat_desc'];
                                    $i++;
                                ?>   
                            
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $cat_title; ?></td>
                                    <td width="300"><?php echo $cat_desc; ?></td>
                                    <td>
                                        <a style="text-decoration: none;" href="index.php?delete_cat=<?php echo $cat_id; ?>">
                                            <i class="fa fa-trash-o"></i> Xóa
                                        </a>
                                    </td>
                                    <td>
                                        <a style="text-decoration: none;" href="index.php?edit_cat=<?php echo $cat_id; ?>">
                                            <i class="fa fa-pencil"></i> Chỉnh sửa
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