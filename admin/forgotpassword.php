<?php
include "connection.php";

  if(isset($_POST['formsubmit']))
  {
    $email=$_POST['email'];
    $sql = "SELECT * FROM login_table WHERE email_id='$email'";
    $result = mysqli_query($con,$sql);
    $cnt=mysqli_num_rows($result);

    if ($cnt==1){

        /*require_once 'PHPMailer-master/src/PHPMailer.php';
        require_once 'PHPMailer-master/src/Exception.php';
        require_once 'PHPMailer-master/src/SMTP.php';
        $otp = rand(100000,999999);
        $to=$_POST['email']; //any value of email coming from the input control
        $subject="Car Concepts";
        $msg="Dear User, Your one time password for forgot password is: ".$otp." Thank you.";

        $mail = new PHPMailer\PHPMailer\PHPMailer(true);                      // Passing `true` enables exceptions

        //Server settings
        $mail->SMTPDebug = 0;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'Project Email Id';                 // SMTP username
        $mail->Password = 'Email Password';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('project email id');

        $mail->addAddress($to);

         $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $msg;

        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } 
        else{*/
            header("location:forgotpassword.php?flg=1");
        //}
    }
    else{
        header("location:forgotpassword.php?flg=0");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Car Concept | Forgot Password</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a> <b>Password Assistance</b> </a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Enter the Email address associated with your account.</p>

    <form method="POST">
      <div class="center">
      <div class="form-group has-feedback">
        <input type="text" name="email" class="form-control" placeholder="Email Address" required/>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <?php 
        if (isset($_GET['flg'])) {
            if ($_GET['flg']==1) {
                echo "<h5>OTP Send</h5>";
            }
            elseif($_GET['flg']==0) {
                echo "<h5 style='color:red;'>Please Enter your Valid Email Id.</h5>";
            }
        }
      ?>
      <div class="center">
          <button type="submit" name="formsubmit" class="btn btn-primary">Generate OTP</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <!-- /.social-auth-links -->
<br/>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>