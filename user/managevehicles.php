<?php
include "header.php";
if (!isset ($_SESSION['uemail'])) {
  header("location:index.php");
}

if (isset ($_GET['bid'])) {
  $bid = $_GET['bid'];
  $txt = $_GET['txt'];
  if ($txt == 'Cancel') {
  $q3 = "update booking_table set booking_status=0 WHERE book_id='$bid'";
  $res3 = mysqli_query($con, $q3);
  if ($res3) {
    echo "<script LANGUAGE='JavaScript'>alert('Vehicle Booking Cancelled And Refund Will Initiated In 2-3 Working Days.');
    window.location.href='managevehicles.php';
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
        <h1 class="text-bold">Vehicles</h1>
      </div>
      <ul
        class="list-inline list-inline-icon list-inline-icon-type-1 list-inline-icon-extra-small list-inline-icon-white p offset-top-30 offset-md-top-40 offset-lg-top-125">
        <li><a href="index.php" class="text-white">Home</a></li>
        <li>Vehicles
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
              <th>Vehicle Image</th>
              <th>Vehicle Name</th>
              <th>Vehicle Color</th>
              <th>Booking Date</th>
              <th>Pay ID</th>
              <th>Price</th>
              <th>Action</th>
            </tr>
            <?php
            date_default_timezone_set("Asia/Calcutta");
            $cdatetime = date('Y-m-d H:i:s');
            $cdatetime = new DateTime($cdatetime);

            $q1 = "SELECT * FROM booking_table WHERE l_id='$ulid' ORDER BY book_id";
            $res1 = mysqli_query($con, $q1);
            $count = 0;
            while ($row1 = mysqli_fetch_array($res1)) {
              $bid = $row1['book_id'];
              $vid = $row1['vehicle_id'];
              $bdate = $row1['date_for_booking'];
              $payid = $row1['online_payment_id'];
              $btime = $row1['time_for_booking'];
              $color = $row1['color'];
              $payid = $row1['online_payment_id'];
              $bs = $row1['booking_status'];

              $q2 = "SELECT * FROM vehicle_detail_table WHERE vehicle_id='$vid'";
              $res2 = mysqli_query($con, $q2);
              $row2 = mysqli_fetch_array($res2);
              $vname = $row2['vehicle_name'];
              $vprice = $row2['vehicle_price'];
              $vimage = $row2['vehicle_image'];
              $bdatetime = date('Y-m-d H:i:s', strtotime("$bdate $btime"));
              $bdatetime = new DateTime($bdatetime);
              $text = "";
              $bgcolor = "";
              $coloroftext="";
              if ($bs == 0) {
                $text = 'Cancelled';
                $bgcolor = "btn-danger";
                $coloroftext="#dc3545";
              }
              if ($bs == 1) {
                $text = 'Cancel';
                $bgcolor = "btn-danger";
                $coloroftext="#dc3545";
              }
              if ($bs == 2) {
                $text = 'Delivered';
                $bgcolor = "btn-success";
                $coloroftext="#69b02a";
              }
              if ($bs == 3) {
                $text = 'Refunded';
                $bgcolor = "btn-primary";
                $coloroftext="#007bff";
              }
              ?>
              <tr>
                <td>
                  <?php echo ++$count; ?>
                </td>
                <td>
                  <img src="../admin/photos/vehicles/<?php echo $vimage; ?>" style="height:6rem;width:8rem;" />
                </td>
                <td>
                  <?php echo $vname; ?>
                </td>
                <td>
                  <?php echo $color; ?>
                </td>
                <td>
                  <?php echo $bdate; ?>
                </td>
                <td>
                  <?php echo wordwrap($payid , 10 , ' ' , true ); ?>
                </td>
                <td>
                  <?php echo $vprice; ?> Rs.
                </td>
                <td>
                  <?php
                  if ($bdatetime > $cdatetime) {
                    if ($text == 'Cancel') {

                      ?>
                      <a href="?bid=<?php echo $bid; ?>&txt=<?php echo $text; ?>"
                        onclick="return confirm('Are you sure you want to cancel booking of this vehicle?');"
                        class="btn btn-xs btn-ellipse-type-2 <?php echo $bgcolor; ?>">
                        <?php if ($text == "Cancel") { ?>
                          <i class="fas fa-trash"></i>
                          <?php
                        }
                        echo $text; ?>
                      </a>
                      <?php
                    } else {
                      ?>
                      <a class="btn btn-xs btn-ellipse-type-2 <?php echo $bgcolor ?> " >
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
                    <a class="btn btn-xs btn-ellipse-type-2 btn-info" style="color: <?php echo $coloroftext ?>" >
                      <?php if ($text == "Cancel") { ?>
                          <!-- <i class="fas fa-trash"></i> -->
                          <?php
                        }
                      echo $text; ?>
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