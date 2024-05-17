<?php include "header.php";
include "connection.php";
if (!isset ($_SESSION['aemail'])) {
  header("location:index.php");
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <h3>View Service Bookings</h3>
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
                <tr align="center">
                  <th>Sr No.</th>
                  <th>User Name</th>
                  <th>User Mobile</th>
                  <th>Service Name</th>
                  <th>User Address</th>
                  <th>Store Name</th>
                  <th>Booking Date</th>
                  <th>Booking Time</th>
                  <th>Payment_id</th>
                  <th>Amount</th>
                  <th>Service Status</th>
                </tr>
              </thead>
              <?php
              $count = 0;
              // $lid=$_SESSION['slogid'];
              $q = "SELECT * FROM vehicle_service_detail ORDER BY service_id DESC";
              $ans = mysqli_query($con, $q);
              while ($row = mysqli_fetch_array($ans)) {
                $sid = $row['service_id'];
                $q2 = "SELECT * FROM service_booking WHERE service_id='$sid'";
                $ans2 = mysqli_query($con, $q2);
                while ($row2 = mysqli_fetch_array($ans2)) {
                  $cnt = mysqli_num_rows($ans2);

                  $bid = $row2['booking_id'];
                  $sid = $row2['service_id'];
                  $lid = $row2['l_id'];
                  $address = $row2['address'];
                  $stname = $row2['store_name'];
                  $bdate = $row2['date_for_book_service'];
                  $btime = $row2['time_for_book_service'];
                  $payid = $row2['online_payment_id'];
                  $amount = $row2['amount'];
                  $service_status = $row2['service_status'];

                  $qry = "SELECT * FROM detail_table WHERE l_id='$lid'";
                  $rt = mysqli_query($con, $qry);
                  $value1 = mysqli_fetch_array($rt);
                  $uname = $value1['name'];

                  $qry3 = "SELECT * FROM login_table WHERE l_id='$lid'";
                  $rt3 = mysqli_query($con, $qry3);
                  $value3 = mysqli_fetch_array($rt3);
                  $uphone = $value3['phone_no'];

                  $qry2 = "SELECT * FROM vehicle_service_detail WHERE service_id='$sid'";
                  $rt2 = mysqli_query($con, $qry2);
                  $value2 = mysqli_fetch_array($rt2);
                  $service = $value2['service_name'];

                  if ($cnt > 0) {
                    ?>
                    <tr align="center">
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
                        <?php echo $service; ?>
                      </td>
                      <td>
                        <?php echo $address; ?>
                      </td>
                      <td>
                        <?php echo $stname; ?>
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
                        if ($service_status == 3) {
                          ?>
                          <button class=" btn btn-primary ">Refunded</button>
                          <?php
                        } else if ($service_status == 0) {
                          ?>
                            <form action="">
                              <div class="btn-group">
                                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"
                                  aria-haspopup="true" aria-expanded="false">
                                  Cancelled
                                </button>
                                <div class="dropdown-menu">
                                  <a class="dropdown-item btn-primary"
                                    href="?bid=<?php echo $bid; ?>&service_status=<?php echo $service_status; ?>&payid=<?php echo $payid; ?>"
                                    onclick="return confirm('Are You Sure You Want To Change Status To Refunded');">Refund</a>
                                </div>
                              </div>
                            </form>
                          <?php
                        }
                        if ($service_status == 2) {
                          ?>
                          <button class=" btn btn-success ">Completed</button>
                          <?php
                        } else if ($service_status == 1) {
                          ?>
                            <form action="">
                              <div class="btn-group">
                                <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"
                                  aria-haspopup="true" aria-expanded="false">
                                  Pending
                                </button>
                                <div class="dropdown-menu">
                                  <a class="dropdown-item btn-success"
                                    href="?bid=<?php echo $bid; ?>&service_status=<?php echo $service_status; ?>&payid=<?php echo $payid; ?>"
                                    onclick="return confirm('Are You Sure You Want To Change Service Status To Completed');">Completed</a>
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
              }if (isset ($_GET['bid'])) {
                $bid = $_GET['bid'];
                $ss = $_GET['service_status'];
                $payid = $_GET['payid'];
                if ($ss == 0) {
                    $q3 = "update service_booking set service_status=3,amount=0,payment_type=3 WHERE booking_id='$bid'";
                    $res3 = mysqli_query($con, $q3);
                    if ($payid != "Cash On Delivery") {
                        $q4 = "update payment_table set pay_status=2 where pay_id='$payid'";
                        $res4 = mysqli_query($con, $q4);
                    }
                    if ($res3) {
                        echo "<script>alert('Status Changed to Refunded');
                    window.location.href = 'servicebooking.php';
                    </script>";
                    }
                }
                if ($ss == 1) {
                    $q3 = "update service_booking set service_status=2 WHERE booking_id='$bid'";
                    $res3 = mysqli_query($con, $q3);
                    if ($res3) {
                        echo "<script>alert('Booking Status Changed To Complated.');
                    window.location.href = 'servicebooking.php';
                    </script>";
                    }
                }

            }
              // if (isset ($_GET['bid'])) {
              //   $bid = $_GET['bid'];
              //   $ss = $_GET['service_status'];
              //   if ($ss == 0) {
              //     $q3 = "update service_booking set service_status=3,amount=0,payment_type=3 WHERE booking_id='$bid'";
              //     $res3 = mysqli_query($con, $q3);
              //     $q4 = "update payment_table set pay_status=2 where pay_id='$payid'";
              //     $res4 = mysqli_query($con, $q4);
              //     if ($res3 && $res4) {
              //       echo "<script>alert('Status Changed To Refunded.');
              //                           window.location.href = 'servicebooking.php';
              //                           </script>";
              //     }

              //   }
              //   if ($ss == 1) {
              //     $q3 = "update service_booking set service_status=2 WHERE booking_id='$bid'";
              //     $res3 = mysqli_query($con, $q3);
              //     if ($res3) {
              //       echo "<script>alert('Booking Status Changed To Delivered.');
              //                             window.location.href = 'servicebooking.php';
              //                             </script>";
              //     }
              //   }

              // }
              ?>
            </table>

            <!-- display none table for print and pdf -->

            <table id="example2" class="table table-bordered table-striped text-center" style="display: none;">
              <thead>
                <tr align="center">
                  <th>Sr No.</th>
                  <th>User Name</th>
                  <th>User Mobile</th>
                  <th>Service Name</th>
                  <th>User Address</th>
                  <th>Store Name</th>
                  <th>Booking Date</th>
                  <th>Booking Time</th>
                  <th>Payment_id</th>
                  <th>Amount</th>
                  <th>Service Status</th>
                </tr>
              </thead>
              <?php
              $count = 0;
              // $lid=$_SESSION['slogid'];
              $q = "SELECT * FROM vehicle_service_detail ORDER BY service_id DESC";
              $ans = mysqli_query($con, $q);
              while ($row = mysqli_fetch_array($ans)) {
                $sid = $row['service_id'];
                $q2 = "SELECT * FROM service_booking WHERE service_id='$sid'";
                $ans2 = mysqli_query($con, $q2);
                while ($row2 = mysqli_fetch_array($ans2)) {
                  $cnt = mysqli_num_rows($ans2);

                  $bid = $row2['booking_id'];
                  $sid = $row2['service_id'];
                  $lid = $row2['l_id'];
                  $address = $row2['address'];
                  $stname = $row2['store_name'];
                  $bdate = $row2['date_for_book_service'];
                  $btime = $row2['time_for_book_service'];
                  $payid = $row2['online_payment_id'];
                  $amount = $row2['amount'];
                  $service_status = $row2['service_status'];

                  $qry = "SELECT * FROM detail_table WHERE l_id='$lid'";
                  $rt = mysqli_query($con, $qry);
                  $value1 = mysqli_fetch_array($rt);
                  $uname = $value1['name'];

                  $qry3 = "SELECT * FROM login_table WHERE l_id='$lid'";
                  $rt3 = mysqli_query($con, $qry3);
                  $value3 = mysqli_fetch_array($rt3);
                  $uphone = $value3['phone_no'];

                  $qry2 = "SELECT * FROM vehicle_service_detail WHERE service_id='$sid'";
                  $rt2 = mysqli_query($con, $qry2);
                  $value2 = mysqli_fetch_array($rt2);
                  $service = $value2['service_name'];

                  if ($cnt > 0) {
                    ?>
                    <tr align="center">
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
                        <?php echo $service; ?>
                      </td>
                      <td>
                        <?php echo $address; ?>
                      </td>
                      <td>
                        <?php echo $stname; ?>
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
                        if ($service_status == 0) {
                          echo "Cancelled";
                        }
                        if ($service_status == 1) {
                          echo "Service Pending";
                        }
                        if ($service_status == 2) {
                          echo "Service Completed";
                        }
                        if ($service_status == 3) {
                          echo "Refunded";
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
        </div>
      </div>
    </div>
    <!-- /.card -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include "footer.php" ?>

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