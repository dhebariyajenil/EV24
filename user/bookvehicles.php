<?php
include "header.php";
?>
<?php


$vid = $_GET['vid'];
$query = "SELECT * FROM vehicle_detail_table where vehicle_id='$vid'";
$result1 = mysqli_query($con, $query);
$row1 = mysqli_fetch_array($result1);
$string = $row1['color'];
$vprice = $row1['vehicle_price'];
$vname = $row1['vehicle_name'];
$ar1 = explode(",", $string);



if (isset ($_GET['vid'])) {
  if (isset ($_POST['formsubmit'])) {

    $vid = $_GET['vid'];
    $vdate = $_POST['vdate'];
    $vtime = $_POST['vtime'];
    $vpaytype = $_POST['vpaytype'];
    $vcolor = $_POST['vcolor'];
    if ($vpaytype == 1) {
      ?>
      <script LANGUAGE='JavaScript'>
        // if (window.confirm('You will be redirect to another page for online payment') == true) {
        var amount = <?php echo $vprice ?>;
        var productid = <?php echo $vid ?>;
        var productname = '<?php echo $vname ?>';
        var options = {
          "key": "rzp_test_Y6EqyWk2PlDPp3", // Enter the Key ID generated from the Dashboard
          "amount": amount / 100, //* 100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
          "name": "EV24",
          "description": productname,
          "image": "https://example.com/your_logo",
          "handler": function (response) {
            var paymentid = response.razorpay_payment_id;

            $.ajax({
              url: "payment-process.php",
              type: "POST",
              data: {
                product_id: <?php echo $vid ?>, payment_id: paymentid, l_id: <?php echo $ulid ?>, payment_for: "E-Vehicle", amount: amount,
                vdate: "<?php echo $vdate ?>", vpaytype: <?php echo $vpaytype ?>, color: "<?php echo $vcolor ?>"
              },
              success: function (finalresponse) {
                if (finalresponse == 'done') {
                  window.alert("Vehicle Booking Successful");
                  window.location.href = "managevehicles.php";
                }
                else {
                  alert('Please check console.log to find error');
                  console.log(finalresponse);
                }
              }
            })

          },
          "theme": {
            "color": "#01b3a0 "
          }
        };
        var rzp1 = new Razorpay(options);

        rzp1.on('payment.failed', function (response) {

          window.location.replace("payment-failed.php?oid=" + productid + "&reason=" + response.error.description + "&paymentid=" + paymentid);

        });
        rzp1.open();
        // e.preventDefault();
        // }
      </script>
      <?php
    } else {
      $q1 = "INSERT INTO booking_table(vehicle_id, l_id, date_for_booking, time_for_booking, payment_type,color,amount) VALUES ('$vid', '$ulid', '$vdate', '$vtime', '$vpaytype','$vcolor','$vprice')";
      $res1 = mysqli_query($con, $q1);
      if ($res1) {
        echo "<script>alert('Vehicle Booked Successfully.');
        window.location.href = 'managevehicles.php';
        </script>";
      }
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
        <h1 class="text-bold">Book Vehicle</h1>
      </div>
      <ul
        class="list-inline list-inline-icon list-inline-icon-type-1 list-inline-icon-extra-small list-inline-icon-white p offset-top-30 offset-md-top-40 offset-lg-top-125">
        <li><a href="index.php" class="text-white">Home</a></li>
        <li><a href="vehicles.php" class="text-white">Vehicles</a></li>
        <li>Book Vehicle</li>
      </ul>
    </div>
  </div>
</section>
</header>
<!-- Page Contents-->
<main class="page-content bg-white">
  <!-- Where Will You Go?-->
  <section class="section-90 section-md-111 text-left">
    <div class="shell">
      <div class="range range-xs-center">
        <div class="cell-md-8">
          <div class="cell-md-4 offset-top-60 offset-md-top-0">
            <div class="inset-md-left-30">
              <!-- Panel-->
              <div
                class="panel panel-xl panel-vertical panel-sm-resize panel-md-resize section-bottom-40 bg-gray-darker context-dark text-lg-left">
                <h5 class="text-bold"><span class="big"><span class="big"><span class="big">Book
                        Vehicle</span></span></span></h5>
                <form class="offset-top-25" method="post">
                  <div class="group group-top">
                    <div class="group-item element-fullwidth">
                      <div class="form-group text-left">
                        <label for="traveling-from" class="">Vehicle Booking Date *</label>
                        <input style="color:black;" type="date" name="vdate" class="form-control" min=<?php date_default_timezone_set("Asia/Calcutta");
                        echo date('Y-m-d h:i:s') ?> required />
                      </div>
                    </div>
                    <div class="group-item element-fullwidth">
                      <div class="form-group text-left">
                        <label for="traveling-from" class="">Vehicle Booking Time *</label>
                        <input style="color:black;" type="time" name="vtime" class="form-control" min="09:00:00.00" max="20:00:00.00" required />
                      </div>
                    </div>




                    <div class="group-item element-fullwidth offset-top-6 offset-md-top-0 offset-lg-top-6">
                      <div class="form-group text-left">
                        <label for="discount-options" class="">Vehicle Color *
                        </label>
                        <div class="select2-whitout-border shadow-drop-md">
                          <select name="vcolor" id="vcolor" data-minimum-results-for-search="Infinity"
                            class="form-control" required>
                            <option value="0" selected disabled>Select Vehicle Color</option>

                            <?php

                            foreach ($ar1 as $ar) {
                              echo "<option value='$ar'>$ar</option>";
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                    </div>






                    <!--<div id="vpaytype_output"><font color="red">Select Payment Type</font></div>-->
                    <div class="group-item element-fullwidth offset-top-6 offset-md-top-0 offset-lg-top-6">
                      <div class="form-group text-left">
                        <label for="discount-options" class="">Payment Type *
                        </label>
                        <div class="select2-whitout-border shadow-drop-md">
                          <select name="vpaytype" id="vpaytype" data-minimum-results-for-search="Infinity"
                            class="form-control" required>
                            <option value="0" selected disabled>Select Payment Type</option>
                            <option value="1">Online</option>
                            <option value="2">Cash On Delivery</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="group-item reveal-block reveal-md-inline-block text-center text-md-left offset-top-15">
                      <?php
                      if (isset ($_SESSION['uemail'])) {
                        ?>
                        <button type="submit" id="formsubmit" name="formsubmit"
                          class="btn btn-primary shadow-drop-md">Book
                          Vehicle</button>
                        <?php
                      } else {
                        ?>
                        <h4><a href="loginregister.php">You need to login in order to book a vehicle.</a></h4>
                        <button type="submit" id="formsubmit" name="formsubmit" class="btn btn-primary shadow-drop-md"
                          disabled>Book Vehicle</button>
                        <?php
                      }
                      ?>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>
</main>
<?php
include "footer.php";
?>
<script>
  /*$(document).ready(function(){
     $('#vpaytype').on('change', function(){   
         var vpaytype = $(this).val(); 
         if(vpaytype){
             if(vpaytype==0){
                 document.getElementById('formsubmit').disabled = true;
                 $("#vpaytype_output").show();
             }else{
                 document.getElementById('formsubmit').disabled = false;
                 $("#vpaytype_output").hide();
             }
         }else{
             alert("No value in CG");       
         }
     });
   });*/
</script>