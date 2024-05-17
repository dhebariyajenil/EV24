<?php
session_start();
include "connection.php";
if (isset($_SESSION['uemail'])) {
  $email = $_SESSION['uemail'];
  $q1 = "SELECT * FROM login_table WHERE email_id='$email'";
  $res1 = mysqli_query($con, $q1);
  $row1 = mysqli_fetch_array($res1);
  $lid = $row1['l_id'];
  $dp = $row1['dp'];
  $_SESSION['ulid'] = $lid;
  $ulid = $_SESSION['ulid'];
}
?>
<!DOCTYPE html>
<html lang="en" class="wide wow-animation smoothscroll scrollTo">

<head>
  <!-- Site Title-->
  <title>EV24</title>
  <meta charset="utf-8">
  <meta name="format-detection" content="telephone=no">
  <meta name="viewport"
    content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="keywords" content="intense web design multipurpose template">
  <meta name="date" content="Dec 26">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">
  <!-- Stylesheets-->
  <link rel="stylesheet" type="text/css"
    href="//fonts.googleapis.com/css?family=Roboto:400,400italic,500,700%7CLato:400">
    <link rel="stylesheet" href="css/mystyle.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

  <!-- [if lt IE 10]>
    <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;"><a href="https://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <script src="js/html5shiv.min.js"></script>
    <![endif] -->
</head>

<body>
  <!-- Page-->
  <div class="page text-center">
    <!-- Page Head-->
    <header class="page-head slider-menu-position">
      <!-- RD Navbar Transparent-->
      <div class="rd-navbar-wrap">
        <nav data-md-device-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-static"
          data-md-stick-up-offset="90px" data-lg-stick-up-offset="75px" data-auto-height="false"
          class="rd-navbar rd-navbar-top-panel rd-navbar-default rd-navbar-white rd-navbar-static-fullwidth-transparent"
          data-lg-auto-height="true" data-md-layout="rd-navbar-fullwidth" data-lg-layout="rd-navbar-static"
          data-lg-stick-up="true">
          <div class="rd-navbar-inner">
            <!-- RD Navbar Panel-->
            <div class="rd-navbar-panel">
              <!-- RD Navbar Toggle-->
              <button data-rd-navbar-toggle=".rd-navbar, .rd-navbar-nav-wrap"
                class="rd-navbar-toggle"><span></span></button>
              <!-- Navbar Brand-->
              <div class="rd-navbar-brand"><a href="index.php">EV24</a></div>
            </div>
            <div class="rd-navbar-menu-wrap">
              <div class="rd-navbar-nav-wrap">
                <div class="rd-navbar-mobile-scroll">
                  <!-- Navbar Brand Mobile-->
                  <div class="rd-navbar-mobile-brand"><a href="index.php">EV24</a></div>
                  <!-- RD Navbar Nav-->
                  <ul class="rd-navbar-nav">
                    <li id="index"><a href="index.php">Home</a></li>
                    <li id="about"><a href="about.php">About Us</a></li>
                    <?php
                    if (isset($_SESSION['uemail'])) {
                      ?>
                      <li id="vehicles">
                        <a>Vehicles</a>
                        <ul class="rd-navbar-dropdown">
                          <li id="vehicles"><a href="vehicles.php">Book Vehicle</a></li>
                          <li id="managevehicles"><a href="managevehicles.php">Manage Vehicles</a></li>
                        </ul>
                      </li>
                      <li id="services">
                        <a>Services</a>
                        <ul class="rd-navbar-dropdown">
                          <li id="services"><a href="services.php">Book Service</a></li>
                          <li id="manageservices"><a href="manageservices.php">Manage Services</a></li>
                        </ul>
                      </li>
                      <?php
                    } else {
                      ?>
                      <li id="vehicles"><a href="vehicles.php">Vehicles</a></li>
                      <li id="services"><a href="services.php">Services</a></li>
                      <?php
                    }
                    ?>
                    <li id="feedback"><a href="feedback.php">Feedback</a></li>
                    <li id="contact"><a href="contact.php">Contact Us</a></li>
                    <?php
                    if (isset($_SESSION['uemail'])) {
                      echo '<li id="editprofile"><a class="icon icon-xxs icon-transparent-white-filled fa-user"> Profile</a>
                                <ul class="rd-navbar-dropdown">
                                  <li id="editprfile"><a href="editprofile.php">Edit Profile</a></li>
                                  <li id="changepass"><a href="changepass.php">Change Password</a></li>
                                  <li><a href="logout.php">Logout</a></li>
                                </ul>
                              </li>';
                    } else {
                      echo '<li id="editprofile"><a href="loginregister.php">Login/Register</a></li>';
                    }
                    ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </nav>
      </div>
      <!-- Modern Breadcrumbs-->