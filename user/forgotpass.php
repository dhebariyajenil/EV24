<?php
  include "header.php";

  if(isset($_POST['formsubmit']))
  {
    $email=$_POST['email'];
    $q1 = "SELECT * FROM login_table WHERE email_id='$email'";
    $res1 = mysqli_query($con,$q1);
    $n = mysqli_num_rows($res1);

    if ($n==1){
      try {
        
        $headers = 'From: <dhebariyajenil@gmail.com>' . "\r\n";
        $to=$email;
        $psw = rand(100000,999999);
        $sub="Password";
        $msg = "Your Password Is $psw";
        mail($to,$sub,$msg,$headers);
      } catch (\Throwable $th) {
        echo ("<script LANGUAGE='JavaScript'>
             window.location.href='forgotpass.php?flag=0';
            </script>");
      }


        /*require_once 'PHPMailer-master/src/PHPMailer.php';
        require_once 'PHPMailer-master/src/Exception.php';
        require_once 'PHPMailer-master/src/SMTP.php';*/
        // $otp = rand(100000,999999);
        /*$to=$_POST['email']; //any value of email coming from the input control
        $subject="Fabric Seekers";
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
            // $q2 = "UPDATE login_table SET password='$otp' WHERE email_id='$email'";
            // $res2 = mysqli_query($con, $q2);
            echo ("<script LANGUAGE='JavaScript'>
            window.location.href='forgotpass.php?flag=1';
            </script>");
        //}
    }
    else{
        echo ("<script LANGUAGE='JavaScript'>
             window.location.href='forgotpass.php?flag=0';
            </script>");
    }
}
?>
      <section class="section-height-800 breadcrumb-modern rd-parallax context-dark bg-gray-darkest text-lg-left">
          <div data-speed="0.2" data-type="media" data-url="images/backgrounds/background-01-1920x900.jpg" class="rd-parallax-layer"></div>
          <div data-speed="0" data-type="html" class="rd-parallax-layer">
            <div class="shell section-top-57 section-bottom-30 section-md-top-125 section-lg-top-200">
              <div class="veil reveal-md-block">
                <h1 class="text-bold">Forgot Password</h1>
              </div>
              <ul class="list-inline list-inline-icon list-inline-icon-type-1 list-inline-icon-extra-small list-inline-icon-white p offset-top-30 offset-md-top-40 offset-lg-top-125">
                <li><a href="index.php" class="text-white">Home</a></li>
                <li><a href="loginregister.php" class="text-white">Login/Register</a></li>
                <li>Forgot Password
              </ul>
            </div>
          </div>
        </section>
      </header>
      <!-- Page Contents-->
      <main class="page-content bg-white">
        <!-- Login and Register-->
        <section class="section-top-90 section-bottom-90 section-md-top-82 section-md-111 text-sm-left">
          <div class="shell">
            <div class="range range-xs-center">
              <div class="cell-xs-10 cell-sm-8 cell-md-6 cell-lg-4">
                <!-- Responsive-tabs-->
                <div data-type="horizontal" class="responsive-tabs responsive-tabs-classic horizontal">
                  <div data-group="tabs-group-default" class="resp-tabs-container text-sm-left tabs-group-default">
                    <div>
                      <!-- RD Mailform-->
                      <form class="text-left" method="post">
                        <div class="form-group form-group-label-outside">
                          <label for="login-email" class="text-dark">Email *</label>
                          <input id="login-email" type="email" name="email" data-constraints="@Email @Required" class="form-control" required>
                        </div>
                        <div class="offset-top-15 offset-sm-top-30 text-center text-md-left">
                          <div class="reveal-xs-inline-block text-middle">
                            <button type="submit" id="formsubmit" name="formsubmit" class="btn btn-primary">Reset Password</button>
                          </div>
                        </div>
                        <?php
                                      if (isset($_GET['flag'])){
                                          if ($_GET['flag']==1){
                                              echo "<br/><center><font color='success'>OTP Sent.</font></center>";
                                          }elseif($_GET['flag']==0){
                                              echo "<br/><center><font color='red'>Please Enter your Valid Email Id.</font></center>";
                                          }
                                     }
                        ?>
                      </form>
                    </div>
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