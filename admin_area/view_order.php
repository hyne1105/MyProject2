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
                    <i class="fa fa-dashboard"></i> Bảng Điều Khiển / Xem Đơn Đặt Hàng
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-eye fa-fw"></i> Xem Đơn Đặt Hàng
                    </h3>
                </div>
                <div class="panel-body text-center">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Email khách hàng</th>
                                    <th>Số hóa đơn</th> 
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th> 
                                    <th>Kích thước</th> 
                                    <th>Ngày đặt hàng</th> 
                                    <th>Tổng tiền</th> 
                                    <th>Trạng thái đơn hàng</th> 
                                    <th>Xóa đơn hàng</th> 
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=0;
                                $get_orders="select * from customer_order";
                                $run_orders=mysqli_query($con,$get_orders);
                                while($row_orders=mysqli_fetch_array($run_orders)){
                                    $order_id=$row_orders['order_id'];
                                    $c_id=$row_orders['customer_id'];
                                    $invoice_no=$row_orders['invoice_no'];
                                    $product_id=$row_orders['product_id'];
                                    $qty=$row_orders['qty'];
                                    $size=$row_orders['size'];
                                    $order_date=$row_orders['order_date'];
                                    $due_amount=$row_orders['due_amount'];
                                    $due_amount=number_format($due_amount,0,',','.');
                                    $order_status=$row_orders['order_status'];
                                    $get_products="select * from products where product_id='$product_id'";
                                    $run_products=mysqli_query($con,$get_products);
                                    $row_products=mysqli_fetch_array($run_products);
                                    $product_title=$row_products['product_title'];
                                    $i++;
                                ?>   
                            
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td>
                                        <?php 
                                        $get_customer = "select * from customers where customer_id='$c_id'";
                                        $run_customer = mysqli_query($con,$get_customer);
                                        $row_customer = mysqli_fetch_array($run_customer);
                                        $customer_email = $row_customer['customer_email'];
                                        echo $customer_email;
                                        ?>
                                    </td>
                                    <td bgcolor="yellow"><?php echo $invoice_no; ?></td>
                                    <td><?php echo $product_title; ?></td>
                                    <td><?php echo $qty; ?></td>
                                    <td><?php echo $size; ?></td>
                                    <td><?php echo $order_date; ?></td>
                                    <td><?php echo $due_amount; ?></td>
                                    <td>
                                        <?php
                                        if($order_status=='Chưa hoàn tất'){
                                            echo $order_status = 'Chưa thanh toán';
                                        }
                                        else {
                                            echo $order_status = 'Đã thanh toán';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a style="text-decoration: none;" href="index.php?order_delete=<?php echo $order_id; ?>">
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