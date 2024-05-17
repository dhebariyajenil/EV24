<?php
include "header.php";
if (!isset ($_SESSION['uemail'])) {
  header("location:index.php");
}

if (isset ($_GET['bid'])) {
  $bid = $_GET['bid'];
  $txt = $_GET['txt'];
  if ($txt == 'Cancel') {
    $q3 = "update service_booking set service_status=0 WHERE booking_id='$bid'";
    $res3 = mysqli_query($con, $q3);
    if ($res3) {
      echo "<script LANGUAGE='JavaScript'>alert('Service Booking Cancelled.')
    window.location.href='manageservices.php';
    </script>";
    }
  }
}
?>
<section class="section-height-800 breadcrumb-modern rd-parallax context-dark bg-gray-darkest text-lg-left">
  <div data-speed="0.2" data-type="media" data-url="images/backgrounds/background-01-1920x900.jpg"
    class="rd-parallax-layer"></div>
  <div data-speed="0" data-type="html" class="rd-parallax-layer">
    <div class="shell section-top-57 section-bottom-30 section-md-top-125 section-lg-top-200">
      <div class="veil reveal-md-block">
        <h1 class="text-bold">Services</h1>
      </div>
      <ul
        class="list-inline list-inline-icon list-inline-icon-type-1 list-inline-icon-extra-small list-inline-icon-white p offset-top-30 offset-md-top-40 offset-lg-top-125">
        <li><a href="index.php" class="text-white">Home</a></li>
        <li>Services
        </li>
      </ul>
    </div>
  </div>
</section>
</header>
<!-- Page Contents-->
<main class="page-content section-90 section-md-111 text-md-left bg-white">
  <section class="">
    <div class="shell">
      <!-- <h2 class="text-bold">Color Header</h2>
            <hr class="divider hr-md-left-0 bg-gray-darker"> -->
      <div class="range range-xs-center">
        <div class="cell-xs-10 cell-lg-10">
          <!-- Classic Responsive Table-->
          <table data-responsive="true" class="table table-custom table-primary table-fixed">
            <tr>
              <th>Sr. No</th>
              <th>Service Name</th>
              <th>Store Name</th>
              <th>Booking Date</th>
              <th>Pay ID</th>
              <th>Service Price</th>
              <th>Action</th>
            </tr>
            <?php
            date_default_timezone_set("Asia/Calcutta");
            $cdatetime = date('Y-m-d H:i:s');
            $cdatetime = new DateTime($cdatetime);

            $q1 = "SELECT * FROM service_booking WHERE l_id='$ulid' ORDER BY booking_id";
            $res1 = mysqli_query($con, $q1);
            $count = 0;
            while ($row1 = mysqli_fetch_array($res1)) {
              $bid = $row1['booking_id'];
              $sid = $row1['service_id'];
              $stname = $row1['store_name'];
              $bdate = $row1['date_for_book_service'];
              $btime = $row1['time_for_book_service'];
              $payid = $row1['online_payment_id'];
              $ss = $row1['service_status'];

              $q2 = "SELECT * FROM vehicle_service_detail WHERE service_id='$sid'";
              $res2 = mysqli_query($con, $q2);
              $row2 = mysqli_fetch_array($res2);
              $sname = $row2['service_name'];
              $sprice = $row2['service_price'];
              $bdatetime = date('Y-m-d H:i:s', strtotime("$bdate $btime"));
              $bdatetime = new DateTime($bdatetime);
              $text = "";
              $color="";
              $bgcolor = "";
              if ($ss == 0) {
                $text = 'Cancelled';
                $bgcolor = "btn-danger";
                $color="#dc3545";
              }
              if ($ss == 1) {
                $text = 'Cancel';
                $bgcolor = "btn-danger";
                $color="#dc3545";
              }
              if ($ss == 2) {
                $text = 'Complated';
                $bgcolor = "btn-success";
                $color="#69b02a";
              }
              if ($ss == 3) {
                $text = 'Refunded';
                $bgcolor = "btn-primary";
                $color="#007bff";
              }
              ?>
              <tr>
                <td>
                  <?php echo ++$count; ?>
                </td>
                <td>
                  <?php echo $sname; ?>
                </td>
                <td>
                  <?php echo $stname; ?>
                </td>
                <td>
                  <?php echo $bdate; ?>
                </td>
                <td>
                  <?php echo wordwrap($payid , 10 , ' ' , true ); ?>
                </td>
                <td>
                  <?php echo $sprice; ?> Rs.
                </td>
                <td>
                  <?php
                  if ($bdatetime > $cdatetime) {
                    if ($text == 'Cancel') {
                      ?>
                      <a onclick="return confirm('Are you sure you want to cancel booking of this service?');"
                        href="?bid=<?php echo $bid; ?>&txt=<?php echo $text; ?>"
                        class="btn btn-xs btn-ellipse-type-2 <?php echo $bgcolor ?> ">
                        <?php if ($text == "Cancel") { ?>
                          <i class="fas fa-trash"></i>
                          <?php
                        }
                        echo $text ?>
                      </a>
                      <?php
                    } else {
                      ?>
                      <a class="btn btn-xs btn-ellipse-type-2 <?php echo $bgcolor ?> ">
                        <?php if ($text == "Cancel") { ?>
                          <i class="fas fa-trash"></i>
                          <?php
                        }
                        echo $text ?>
                      </a>
                      <?php

                    }
                  } else {
                    ?>
                    <a class="btn btn-xs btn-ellipse-type-2 btn-info" style="color: <?php echo $color ?>">
                    <?php if ($text == "Cancel") { ?>
                          <!-- <i class="fas fa-trash"></i> -->
                      <?php } echo $text ?>
                    </a>
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
      </div>
    </div>
  </section>
</main>
<?php
include "footer.php";
?>