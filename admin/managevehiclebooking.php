<?php
include "header.php";
include "connection.php";
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <h3>Manage E-Vehicle Booking</h3>
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
                                    <th>User Name</th>
                                    <th>User Mobile No</th>
                                    <th>Vehicle Name</th>
                                    <th>Vehicle Image</th>
                                    <th>Vehicle Color</th>
                                    <th>Booking Date</th>
                                    <th>Booking Time</th>
                                    <th>Payment ID</th>
                                    <th>Amount</th>
                                    <th>Booking Status</th>
                                    <!-- <th>Action</th> -->
                                </tr>
                            </thead>
                            <?php
                            $count = 0;
                            // $sid=$_SESSION['slogid'];
                            $q = "SELECT * FROM vehicle_detail_table ORDER BY vehicle_id DESC";
                            $ans = mysqli_query($con, $q);
                            while ($row = mysqli_fetch_array($ans)) {
                                $vid = $row['vehicle_id'];

                                $q2 = "SELECT * FROM booking_table WHERE vehicle_id='$vid'";
                                $ans2 = mysqli_query($con, $q2);
                                while ($row2 = mysqli_fetch_array($ans2)) {
                                    $cnt = mysqli_num_rows($ans2);
                                    $bid = $row2['book_id'];
                                    $vehid = $row2['vehicle_id'];
                                    $lid = $row2['l_id'];
                                    $bdate = $row2['date_for_booking'];
                                    $btime = $row2['time_for_booking'];
                                    $vcolor = $row2['color'];
                                    $booking_status = $row2['booking_status'];
                                    $payid = $row2['online_payment_id'];
                                    $amount = $row2['amount'];

                                    $qry = "SELECT * FROM detail_table WHERE l_id='$lid'";
                                    $rt = mysqli_query($con, $qry);
                                    $value1 = mysqli_fetch_array($rt);
                                    $uname = $value1['name'];

                                    $qry3 = "SELECT * FROM login_table WHERE l_id='$lid'";
                                    $rt3 = mysqli_query($con, $qry3);
                                    $value3 = mysqli_fetch_array($rt3);
                                    $uphone = $value3['phone_no'];

                                    $qry2 = "SELECT * FROM vehicle_detail_table WHERE vehicle_id='$vehid'";
                                    $rt2 = mysqli_query($con, $qry2);
                                    $value2 = mysqli_fetch_array($rt2);
                                    $image = $value2['vehicle_image'];
                                    $vname = $value2['vehicle_name'];

                                    if ($cnt > 0) {
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo ++$count; ?>
                                            </td>
                                            <td>
                                                <?php echo $uname; ?>
                                            </td>
                                            <td>
                                                <?php echo $uphone; ?>
                                            </td>
                                            <td>
                                                <?php echo $vname; ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($image != "") {
                                                    ?>
                                                    <img src="./photos/vehicles/<?php echo $image; ?>" class="img-circle" height="50px"
                                                        width=50px alt="Vehicle Image">
                                                    <?php
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php echo $vcolor; ?>
                                            </td>
                                            <td>
                                                <?php echo $bdate; ?>
                                            </td>
                                            <td>
                                                <?php echo $btime; ?>
                                            </td>
                                            <td>
                                                <?php echo $payid; ?>
                                            </td>
                                            <td>
                                                <?php echo $amount; ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($booking_status == 3) {
                                                    ?>
                                                    <button class=" btn btn-primary ">Refunded</button>
                                                    <?php
                                                } else if ($booking_status == 0) {
                                                    ?>
                                                        <form action="">
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-danger dropdown-toggle"
                                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    Cancelled
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item btn-warning"
                                                                        href="?bid=<?php echo $bid; ?>&booking_status=<?php echo $booking_status; ?>&payid=<?php echo $payid; ?>"
                                                                        onclick="return confirm('Are You Sure You Want To Change Status To Refunded');">Refund</a>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    <?php
                                                }
                                                if ($booking_status == 2) {
                                                    ?>
                                                    <button class=" btn btn-success ">Delivered</button>
                                                    <?php
                                                } else if ($booking_status == 1) {
                                                    ?>
                                                        <form action="">
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-warning dropdown-toggle"
                                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    Pending
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item btn-success"
                                                                        href="?bid=<?php echo $bid; ?>&booking_status=<?php echo $booking_status; ?>&payid=<?php echo $payid; ?>"
                                                                        onclick="return confirm('Are You Sure You Want To Change Vehicle Status To Delivered');">Deliver</a>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    <?php
                                                }
                                                ?>

                                            </td>

                                        </tr>
                                        <?php
                                    }
                                }
                            }
                            if (isset ($_GET['bid'])) {
                                $bid = $_GET['bid'];
                                $bs = $_GET['booking_status'];
                                $payid = $_GET['payid'];
                                if ($bs == 0) {
                                    $q3 = "update booking_table set booking_status=3,amount=0,payment_type=3 WHERE book_id='$bid'";
                                    $res3 = mysqli_query($con, $q3);
                                    if ($payid != "Cash On Delivery") {
                                        $q4 = "update payment_table set pay_status=2 where pay_id='$payid'";
                                        $res4 = mysqli_query($con, $q4);
                                    }
                                    if ($res3) {
                                        echo "<script>alert('Status Changed to Refunded');
                                    window.location.href = 'managevehiclebooking.php';
                                    </script>";
                                    }
                                }
                                if ($bs == 1) {
                                    $q3 = "update booking_table set booking_status=2 WHERE book_id='$bid'";
                                    $res3 = mysqli_query($con, $q3);
                                    if ($res3) {
                                        echo "<script>alert('Booking Status Changed To Delivered.');
                                    window.location.href = 'managevehiclebooking.php';
                                    </script>";
                                    }
                                }

                            }
                            ?>
                        </table>
                        
                        <!-- display none table for print and pdf -->
                        <table id="example2" class="table table-bordered table-striped text-center" style="display: none;">
                            <thead>
                                <tr>
                                    <th>Sr No</th>
                                    <th>User Name</th>
                                    <th>User Mobile No</th>
                                    <th>Vehicle Name</th>
                                    <th>Vehicle Color</th>
                                    <th>Booking Date</th>
                                    <th>Booking Time</th>
                                    <th>Payment ID</th>
                                    <th>Amount</th>
                                    <th>Booking Status</th>
                                </tr>
                            </thead>
                            <?php
                            $count = 0;
                            // $sid=$_SESSION['slogid'];
                            $q = "SELECT * FROM vehicle_detail_table ORDER BY vehicle_id DESC";
                            $ans = mysqli_query($con, $q);
                            while ($row = mysqli_fetch_array($ans)) {
                                $vid = $row['vehicle_id'];

                                $q2 = "SELECT * FROM booking_table WHERE vehicle_id='$vid'";
                                $ans2 = mysqli_query($con, $q2);
                                while ($row2 = mysqli_fetch_array($ans2)) {
                                    $cnt = mysqli_num_rows($ans2);
                                    $bid = $row2['book_id'];
                                    $vehid = $row2['vehicle_id'];
                                    $lid = $row2['l_id'];
                                    $bdate = $row2['date_for_booking'];
                                    $btime = $row2['time_for_booking'];
                                    $vcolor = $row2['color'];
                                    $booking_status = $row2['booking_status'];
                                    $payid = $row2['online_payment_id'];
                                    $amount = $row2['amount'];

                                    $qry = "SELECT * FROM detail_table WHERE l_id='$lid'";
                                    $rt = mysqli_query($con, $qry);
                                    $value1 = mysqli_fetch_array($rt);
                                    $uname = $value1['name'];

                                    $qry3 = "SELECT * FROM login_table WHERE l_id='$lid'";
                                    $rt3 = mysqli_query($con, $qry3);
                                    $value3 = mysqli_fetch_array($rt3);
                                    $uphone = $value3['phone_no'];

                                    $qry2 = "SELECT * FROM vehicle_detail_table WHERE vehicle_id='$vehid'";
                                    $rt2 = mysqli_query($con, $qry2);
                                    $value2 = mysqli_fetch_array($rt2);
                                    $image = $value2['vehicle_image'];
                                    $vname = $value2['vehicle_name'];

                                    if ($cnt > 0) {
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo ++$count; ?>
                                            </td>
                                            <td>
                                                <?php echo $uname; ?>
                                            </td>
                                            <td>
                                                <?php echo $uphone; ?>
                                            </td>
                                            <td>
                                                <?php echo $vname; ?>
                                            </td>
                                            
                                            <td>
                                                <?php echo $vcolor; ?>
                                            </td>
                                            <td>
                                                <?php echo $bdate; ?>
                                            </td>
                                            <td>
                                                <?php echo $btime; ?>
                                            </td>
                                            <td>
                                                <?php echo $payid; ?>
                                            </td>
                                            <td>
                                                <?php echo $amount; ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($booking_status == 0) {
                                                    echo"Cancelled";
                                                }
                                                if ($booking_status == 1) {
                                                    echo"Delivery Pending";
                                                }
                                                if ($booking_status == 2) {
                                                    echo"Delivered";
                                                }
                                                if ($booking_status == 3) {
                                                    echo"Refunded";
                                                }
                                                ?>

                                            </td>

                                        </tr>
                                        <?php
                                    }
                                }
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