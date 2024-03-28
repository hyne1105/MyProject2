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
                    <i class="fa fa-dashboard"></i> Bảng Điều Khiển / Xem Thanh Toán
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-eye fa-fw"></i> Xem Thanh Toán
                    </h3>
                </div>
                <div class="panel-body text-center">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Số hóa đơn</th> 
                                    <th>Tổng tiền</th>
                                    <th>Hình thức thanh toán</th> 
                                    <th>Số tài khoản thanh toán</th> 
                                    <th>Ngày thanh toán</th>  
                                    <th>Xóa thanh toán</th> 
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=0;
                                $get_payments="select * from payments";
                                $run_payments=mysqli_query($con,$get_payments);
                                while($row_payments=mysqli_fetch_array($run_payments)){
                                    $payment_id=$row_payments['payment_id'];
                                    $invoice_no=$row_payments['invoice_id'];
                                    $amount=$row_payments['amount'];
                                    $amount=number_format($amount,0,',','.');
                                    $payment_mode=$row_payments['payment_mode'];
                                    $ref_no=$row_payments['ref_no'];
                                    $payment_date=$row_payments['payment_date'];
                                    $i++;
                                ?>   
                            
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td bgcolor="yellow"><?php echo $invoice_no; ?></td>
                                    <td><?php echo $amount; ?></td>
                                    <td><?php echo $payment_mode; ?></td>
                                    <td><?php echo $ref_no; ?></td>
                                    <td><?php echo $payment_date; ?></td>
                                    <td>
                                        <a style="text-decoration: none;" href="index.php?payment_delete=<?php echo $payment_id; ?>">
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