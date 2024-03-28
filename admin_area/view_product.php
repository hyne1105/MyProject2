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
                    <i class="fa fa-dashboard"></i> Bảng Điều Khiển / Xem Sản Phẩm
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-eye fa-fw"></i> Xem Sản Phẩm
                    </h3>
                </div>
                <div class="panel-body text-center">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>ID sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Hình ảnh sản phẩm</th>
                                    <th>Giá sản phẩm</th>
                                    <th>Từ khóa sản phẩm</th> 
                                    <th>Ngày thêm</th> 
                                    <th>Xóa sản phẩm</th> 
                                    <th>Chỉnh sửa sản phẩm</th> 
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=0;
                                $get_product="select * from products";
                                $run_p=mysqli_query($con,$get_product);
                                while($row=mysqli_fetch_array($run_p)){
                                    $pro_id=$row['product_id'];
                                    $product_title=$row['product_title'];
                                    $product_img1=$row['product_img1'];
                                    $product_price=$row['product_price'];
                                    $product_price=number_format($product_price,0,',','.');
                                    $product_keywords=$row['product_keywords'];
                                    $date=$row['date'];
                                    $i++;
                                ?>   
                            
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $product_title ?></td>
                                    <td><img src="product_images/<?php echo $product_img1 ?>" width="120"></td>
                                    <td><?php echo $product_price ?></td>
                                    <td><?php echo $product_keywords ?></td>
                                    <td><?php echo $date ?></td>
                                    <td>
                                        <a style="text-decoration: none;" href="index.php?delete_product=<?php echo $pro_id ?>">
                                            <i class="fa fa-trash-o"></i> Xóa
                                        </a>
                                    </td>
                                    <td>
                                        <a style="text-decoration: none;" href="index.php?edit_product=<?php echo $pro_id ?>">
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