<?php
include "header.php";

if (isset ($_GET['sid'])) {
  if (isset ($_POST['formsubmit'])) {

    $sid = $_GET['sid'];
    $aid = $_GET['aid'];
    $sql = "select store_name from service_store_details_table where area_id='$aid'";
    $qry = mysqli_query($con, $sql);
    while ($row1 = mysqli_fetch_array($qry)) {
      $stname = $row1['store_name'];
    }
    $q1 = "SELECT * FROM vehicle_service_detail where service_id=$sid";
    $res1 = mysqli_query($con, $q1);
    while ($row1 = mysqli_fetch_array($res1)) {
      $sid = $row1['service_id'];
      $sname = $row1['service_name'];
      $sdesc = $row1['service_description'];
      $sprice = $row1['service_price'];
    }

    $sdate = $_POST['sdate'];
    $stime = $_POST['stime'];
    $sadd = $_POST['sadd'];
    $spaytype = $_POST['spaytype'];
    if ($spaytype == 1) {
      ?>
      <script LANGUAGE='JavaScript'>
        // if (window.confirm('You will be redirect to another page for online payment') == true) {
        var amount = <?php echo $sprice ?>;
        var productid = <?php echo $sid ?>;
        var productname = '<?php echo $sname ?>';
        var options = {
          "key": "rzp_test_Y6EqyWk2PlDPp3", // Enter the Key ID generated from the Dashboard
          "amount": amount, //* 100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
          "name": "EV24",
          "description": productname,
          "image": "https://example.com/your_logo",
          "handler": function (response) {
            var paymentid = response.razorpay_payment_id;

            $.ajax({
              url: "payment-process.php",
              type: "POST",
              data: {
                sid: <?php echo $sid ?>, payment_id: paymentid, l_id: <?php echo $ulid ?>, payment_for: "Services", amount: amount,
                sdate: "<?php echo $sdate ?>", spaytype: <?php echo $spaytype ?>, sadd: "<?php echo $sadd ?>", sname: "<?php echo $stname ?>"
              },
              success: function (finalresponse) {
                if (finalresponse == 'done') {
                  window.alert("Service Booking Successful");
                  window.location.href = "manageservices.php";
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
      $q1 = "INSERT INTO service_booking(service_id, l_id, address, date_for_book_service, time_for_book_service,payment_type,store_name,amount) VALUES ('$sid', '$ulid', '$sadd', '$sdate', '$stime', '$spaytype','$stname','$sprice')";
      $res1 = mysqli_query($con, $q1);
      if ($res1) {
        echo "<script>alert('Service Booked Successfully.')
                      window.location.href='manageservices.php';
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
        <h1 class="text-bold">Book Service</h1>
      </div>
      <ul
        class="list-inline list-inline-icon list-inline-icon-type-1 list-inline-icon-extra-small list-inline-icon-white p offset-top-30 offset-md-top-40 offset-lg-top-125">
        <li><a href="index.php" class="text-white">Home</a></li>
        <li><a href="services.php" class="text-white">Services</a></li>
        <li>Book Service</li>
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
                        Service</span></span></span></h5>
                <form class="offset-top-25" method="post">
                  <div class="group group-top">
                    <div class="group-item element-fullwidth">
                      <div class="form-group text-left">
                        <label for="traveling-from" class="">Service Booking Date *</label>
                        <input style="color:black;" type="date" name="sdate" class="form-control" min=<?php date_default_timezone_set("Asia/Calcutta");
                        echo date('Y-m-d h:i:s') ?> required />
                      </div>
                    </div>
                    <div class="group-item element-fullwidth">
                      <div class="form-group text-left">
                        <label for="traveling-from" class="">Service Booking Time *</label>
                        <input style="color:black;" type="time" name="stime" class="form-control" min="09:00:00.00"
                          max="20:00:00.00" required />
                      </div>
                    </div>
                    <div class="group-item element-fullwidth offset-top-6 offset-xs-top-0 offset-lg-top-6">
                      <div class="form-group text-left">
                        <label for="traveling-to" class="">Your Address *</label>
                        <div class="select2-whitout-border shadow-drop-md">
                          <input type="text" class="form-control" name="sadd" required />
                        </div>
                      </div>
                    </div>
                    <!--<div id="spaytype_output"><font color="red">Select Payment Type</font></div>-->
                    <div class="group-item element-fullwidth offset-top-6 offset-md-top-0 offset-lg-top-6">
                      <div class="form-group text-left">
                        <label for="discount-options" class="">Payment Type *
                        </label>
                        <div class="select2-whitout-border shadow-drop-md">
                          <select name="spaytype" id="spaytype" data-minimum-results-for-search="Infinity"
                            class="form-control" required>
                            <option value="0" selected disabled>Select Payment Type</option>
                            <option value="1">Online</option>
                            <option value="2">Cash On Delivery</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    </br>
                    <div class="group-item reveal-block reveal-md-inline-block text-center text-md-left offset-top-15">
                      <?php
                      if (isset ($_SESSION['uemail'])) {
                        ?>
                        <button type="submit" id="formsubmit" name="formsubmit"
                          class="btn btn-primary shadow-drop-md">Book Service</button>
                        <?php
                      } else {
                        ?>
                        <h4><a href="loginregister.php">You need to login in order to book a service.</a></h4>
                        <button type="submit" id="formsubmit" name="formsubmit" class="btn btn-primary shadow-drop-md"
                          disabled>Book Service</button>
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
<script>
  /*$(document).ready(function(){
     $('#spaytype').on('change', function(){   
         var spaytype = $(this).val(); 
         if(spaytype){
             if(spaytype==0){
                 document.getElementById('formsubmit').disabled = true;
                 $("#spaytype_output").show();
             }else{
                 document.getElementById('formsubmit').disabled = false;
                 $("#spaytype_output").hide();
             }
         }else{
             alert("No value in CG");       
         }
     });
   });*/
</script>
<?php
include "footer.php";
?>