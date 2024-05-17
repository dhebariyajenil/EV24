<?php
include "header.php";
include "connection.php";
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row space-between">
                <h3>Manage Payment</h3>
                <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                <a class="btn btn-primary right" target="_blank" href="https://dashboard.razorpay.com/app/payments"
                    onclick="return confirm('You Are Redirected To RazorPay Dashboard');">RazorPay Dashboard</a>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!--content-header-->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                    <th>Sr No</th>
                                    <th>Name</th>
                                    <th>Payment ID</th>
                                    <th>Phone No</th>
                                    <th>Amount</th>
                                    <th>Payment Discription</th>
                                    <th>Pay Status</th>
                                </tr>
                            </thead>
                            <?php

                            $query = "SELECT * FROM payment_table";
                            $result = mysqli_query($con, $query);
                            $seq = 0;
                            while ($value = mysqli_fetch_array($result)) {
                                $pid = $value['product_id'];
                                $payid = $value['pay_id'];
                                $payment_status = $value['pay_status'];
                                $productfor = $value['payment_for'];
                                $lgid = $value['l_id'];
                                $qry = "SELECT * FROM detail_table WHERE l_id='$lgid'";
                                $res = mysqli_query($con, $qry);
                                $val = mysqli_fetch_array($res);
                                $qry1 = "SELECT * FROM login_table WHERE l_id='$lgid'";
                                $res1 = mysqli_query($con, $qry1);
                                $val1 = mysqli_fetch_array($res1);
                                ?>

                                <tr>
                                    <td>
                                        <?php echo ++$seq; ?>
                                    </td>
                                    <td>
                                        <?php echo $val['name']; ?>
                                    </td>
                                    <td>
                                        <?php echo $value['pay_id']; ?>
                                    </td>
                                    <td>
                                        <?php echo $val1['phone_no']; ?>
                                    </td>
                                    <td>
                                        <?php echo $value['payment_amount']; ?>
                                    </td>

                                    <?php
                                    if ($productfor == "Services") {
                                        $query1 = "SELECT * FROM vehicle_service_detail where service_id=$pid";
                                        $result1 = mysqli_query($con, $query1);
                                        $value1 = mysqli_fetch_array($result1);
                                        $sname = $value1['service_name'];
                                        $productname = $sname;
                                    }
                                    if ($productfor == "E-Vehicle") {
                                        $query2 = "SELECT * FROM vehicle_detail_table where vehicle_id=$pid";
                                        $result2 = mysqli_query($con, $query2);
                                        $value2 = mysqli_fetch_array($result2);
                                        $vname = $value2['vehicle_name'];
                                        $productname = $vname;
                                    }

                                    ?>



                                    <td>
                                        <?php echo $productname; ?>
                                    </td>

                                    <td>
                                        <?php
                                        if ($payment_status == 2) {
                                            ?>
                                            <button class=" btn btn-primary ">Refunded</button>
                                            <?php
                                        }
                                        if ($payment_status == 1) {
                                            ?>
                                            <button class=" btn btn-success ">Success</button>

                                            <?php
                                        }
                                        // if ($payment_status == 0) {
                                        ?>
                                        <!-- <form action="">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-danger dropdown-toggle"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Failed
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item btn-success" href="?payid=<?php //echo $payid;  ?>"
                                                            onclick="return confirm('Are You Sure You Want To Change Payment Status To Success');">Success</a>
                                                    </div>
                                                </div>
                                            </form> -->
                                        <?php
                                        // } else if ($payment_status == 1) {
                                        ?>
                                        <!-- <form action="">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-success dropdown-toggle"
                                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Success
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item btn-danger" href="?payid=<?php //echo $payid;  ?>"
                                                                onclick="return confirm('Are You Sure You Want To Change Payment Status To Failed');">Failed</a>
                                                        </div>
                                                    </div>
                                                </form> -->
                                        <?php
                                        // }
                                        ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            // if (isset ($_GET['payid'])) {
                            //     $pid = $_GET['payid'];
                            //     $q3 = "update payment_table set pay_status=(   CASE
                            // WHEN pay_status=1  THEN 
                            //         0
                            // WHEN pay_status=0  THEN 
                            //         1
                            // END) WHERE pay_id='$pid'";
                            //     $res3 = mysqli_query($con, $q3);
                            //     if ($res3) {
                            //         echo "<script>alert('Payment Status Changed.');
                            //     window.location.href = 'managepayment.php';
                            //     </script>";
                            //     }
                            // }
                            ?>
                        </table>
                        
                        <!-- display none table for print and pdf -->
                        <table id="example2" class="table table-bordered table-striped text-center" style="display: none;">
                            <thead>
                                <tr>
                                    <th>Sr No</th>
                                    <th>Name</th>
                                    <th>Payment ID</th>
                                    <th>Phone No</th>
                                    <th>Amount</th>
                                    <th>Payment Discription</th>
                                    <th>Pay Status</th>
                                </tr>
                            </thead>
                            <?php

                            $query = "SELECT * FROM payment_table";
                            $result = mysqli_query($con, $query);
                            $seq = 0;
                            while ($value = mysqli_fetch_array($result)) {
                                $pid = $value['product_id'];
                                $payid = $value['pay_id'];
                                $payment_status = $value['pay_status'];
                                $productfor = $value['payment_for'];
                                $lgid = $value['l_id'];
                                $qry = "SELECT * FROM detail_table WHERE l_id='$lgid'";
                                $res = mysqli_query($con, $qry);
                                $val = mysqli_fetch_array($res);
                                $qry1 = "SELECT * FROM login_table WHERE l_id='$lgid'";
                                $res1 = mysqli_query($con, $qry1);
                                $val1 = mysqli_fetch_array($res1);
                                ?>

                                <tr>
                                    <td>
                                        <?php echo ++$seq; ?>
                                    </td>
                                    <td>
                                        <?php echo $val['name']; ?>
                                    </td>
                                    <td>
                                        <?php echo $value['pay_id']; ?>
                                    </td>
                                    <td>
                                        <?php echo $val1['phone_no']; ?>
                                    </td>
                                    <td>
                                        <?php echo $value['payment_amount']; ?>
                                    </td>

                                    <?php
                                    if ($productfor == "Services") {
                                        $query1 = "SELECT * FROM vehicle_service_detail where service_id=$pid";
                                        $result1 = mysqli_query($con, $query1);
                                        $value1 = mysqli_fetch_array($result1);
                                        $sname = $value1['service_name'];
                                        $productname = $sname;
                                    }
                                    if ($productfor == "E-Vehicle") {
                                        $query2 = "SELECT * FROM vehicle_detail_table where vehicle_id=$pid";
                                        $result2 = mysqli_query($con, $query2);
                                        $value2 = mysqli_fetch_array($result2);
                                        $vname = $value2['vehicle_name'];
                                        $productname = $vname;
                                    }

                                    ?>



                                    <td>
                                        <?php echo $productname; ?>
                                    </td>

                                    <td>
                                        <?php
                                        if ($payment_status == 2) {
                                            ?>
                                            <button class=" btn btn-primary ">Refunded</button>
                                            <?php
                                        }
                                        if ($payment_status == 1) {
                                            ?>
                                            <button class=" btn btn-success ">Success</button>

                                            <?php
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row (main row) -->

    </section>
    <!-- /.content -->


</div>
<!-- /.content-wrapper -->
<?php include 'footer.php'; ?>

<script>
    $(function () {
        $("#example1").DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
        });
    });
</script>

<script src="./plugins/jquery/jquery.min.js"></script>
<script src="./plugins/datatables/jquery.dataTables.min.js"></script>
<script src="./plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="./plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="./plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="./plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="./plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="./plugins/jszip/jszip.min.js"></script>
<script src="./plugins/pdfmake/pdfmake.min.js"></script>
<script src="./plugins/pdfmake/vfs_fonts.js"></script>
<script src="./plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="./plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="./plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="./dist/js/adminlte.min.js"></script>
<script src="./dist/js/demo.js"></script>




<script>
    $(function () {
        $("#example2").DataTable({
            "responsive": false, "lengthChange": false, "autoWidth": false, "searching": true, "paging": false, "ordering": false, "info": false,
            "buttons": ["pdf", "print"]
        }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');

    });
</script>