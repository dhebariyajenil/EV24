<?php
include "header.php";
include "connection.php";

$query = "SELECT * FROM login_table WHERE role=2 AND status=1";
$result = mysqli_query($con, $query);
$cnt1 = mysqli_num_rows($result);

$query3 = "SELECT * FROM service_booking";
$result3 = mysqli_query($con, $query3);
$cnt3 = mysqli_num_rows($result3);

$query4 = "SELECT * FROM booking_table";
$result4 = mysqli_query($con, $query4);
$cnt4 = mysqli_num_rows($result4);

$query2 = "SELECT * FROM feedback";
$result2 = mysqli_query($con, $query2);
$cnt2 = mysqli_num_rows($result2);

$query5 = "SELECT * FROM booking_table where booking_status!=0";
$result5 = mysqli_query($con, $query5);
$cod=0;
$codamount=0;
$totalamount=0;
$onlineamount=0;
$online=0;
while ($res=mysqli_fetch_array($result5)) {
    $paytype=$res['payment_type'];
    $amount=$res['amount'];
    if ($paytype==2) {
      $cod++;
      $codamount+=$amount;
    }
    if ($paytype==1) {
      $online++;
      $onlineamount+=$amount;
    }
    $totalamount+=$amount;
}




$query6 = "SELECT * FROM service_booking where service_status!=0";
$result6 = mysqli_query($con, $query6);

while ($res2=mysqli_fetch_array($result6)) {
    $paytype=$res2['payment_type'];
    $amount=$res2['amount'];
    if ($paytype==2) {
      $cod++;
      $codamount+=$amount;
    }
    if ($paytype==1) {
      $online++;
      $onlineamount+=$amount;
    }
    $totalamount=$codamount+$onlineamount;
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Dashboard</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>
                <?php echo $cnt1; ?>
              </h3>
              <p>Total Users</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>
                <?php echo $cnt3; ?>
              </h3>
              <p>Total Service Bookings</p>
            </div>
            <div class="icon">
              <i class="fas fa-list"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>
                <?php echo $cnt4; ?>
              </h3>
              <p>Total E-Vehicle Bookings</p>
            </div>
            <div class="icon">
              <i class="fas fa-bicycle"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>
                <?php echo $cnt1; ?>
              </h3>
              <p>Total Feedbacks</p>
            </div>
            <div class="icon">
              <i class="fas fa-star"></i>
            </div>
          </div>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th style="width: 10px">#</th>
                <th>Payment Type</th>
                <th style="width: 100px">Transactions</th>
                <th>Progress</th>
                <th style="width: 40px">%</th>
                <th style="width: 100px">Amount</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1.</td>
                <td>Online Payments</td>
                <td><?php echo $online; ?></td>
                <td>
                  <div class="progress progress-xs">
                    <div class="progress-bar progress-bar-danger" style="width: <?php echo round(100*$online/($online+$cod)).'%'; ?>"></div>
                  </div>
                </td>
                <td><span class="badge bg-primary"><?php echo round(100*$online/($online+$cod)); ?></span></td>
                <td><span class=""><?php echo $onlineamount; ?></span></td>
              </tr>
              <tr>
                <td>2.</td>
                <td>Cash On Delivery Payments</td>
                <td><?php echo $cod; ?></td>
                <td>
                  <div class="progress progress-xs">
                    <div class="progress-bar bg-warning" style="width: <?php echo round(100*$cod/($online+$cod)).'%'; ?>"></div>
                  </div>
                </td>
                <td><span class="badge bg-warning"><?php echo round(100*$cod/($online+$cod)); ?></span></td>
                <td><span class=""><?php echo $codamount; ?></span></td>
              </tr>
              <tr class="">
                <td></td>
                <td>Total Payments</td>
                <td><?php echo $online+$cod; ?></td>
                <td>
                  <div class="progress progress-xs progress-striped active">
                    <div class="progress-bar bg-danger" style="width: 100%"></div>
                  </div>
                </td>
                <td><span class="badge bg-danger">100%</span></td>
                <td><span class=""><?php echo $totalamount; ?></span></td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- Content Wrapper. Contains page content -->
        <!-- /.content-wrapper -->
        <!-- Control Sidebar -->
        <?php include "footer.php"; ?>