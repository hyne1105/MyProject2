<div class="box">
    <center>
        <h2>Đơn Hàng Của Tôi</h2>
        <p>
        Nếu bạn có bất kỳ câu hỏi nào, xin vui lòng liên hệ với <a href="../contactus.php">chúng tôi</a>, trung tâm hỗ trợ khách hàng của chúng tôi đang làm việc 24/7.
        </p>
    </center>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Số tiền</th>
                    <th>Số hóa đơn</th>
                    <th>Số lượng</th>
                    <th>Kích thước</th>
                    <th>Ngày đặt hàng</th>
                    <th>Thanh toán/Chưa thanh toán</th>
                    <th>Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $customer_session=$_SESSION['customer_email'];
                $get_customer="select * from customers where customer_email='$customer_session'";
                $run_cust=mysqli_query($con,$get_customer);
                $row_cust=mysqli_fetch_array($run_cust);
                $customer_id=$row_cust['customer_id'];
                $get_order="select * from customer_order where customer_id='$customer_id'";
                $run_order=mysqli_query($con,$get_order);
                $i=0;
                while($row_order=mysqli_fetch_array($run_order)){
                    $order_id=$row_order['order_id'];
                    $order_due_amount=$row_order['due_amount'];
                    $order_due_amount=number_format($order_due_amount,0,',','.');
                    $order_invoice=$row_order['invoice_no'];
                    $order_qty=$row_order['qty'];
                    $order_size=$row_order['size'];
                    $order_date=substr($row_order['order_date'], 0, 11);
                    $order_status=$row_order['order_status'];
                    $i++;
                    if($order_status=='Chưa hoàn tất'){
                        $order_status="Chưa thanh toán";
                    }else{
                        $order_status="Đã thanh toán";
                    }
                

                ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $order_due_amount ?></td>
                    <td><?php echo $order_invoice ?></td>
                    <td><?php echo $order_qty ?></td>
                    <td><?php echo $order_size ?></td>
                    <td><?php echo $order_date ?></td>
                    <td><?php echo $order_status ?></td>
                    <td><a href="confirm.php?order_id=<?php echo $order_id ?>" target="_blank" class="btn btn-primary btn-sm">Xác nhận nếu thanh toán</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
