<?php
  include "header.php";
  if(!isset($_SESSION['uemail'])){
        header("location:index.php");
  }

  $q2 = "SELECT * FROM login_table WHERE l_id='$ulid'";
  $res2 = mysqli_query($con,$q2);
  $row2 = mysqli_fetch_array($res2);
  $dp=$row2['dp'];

  if(isset($_POST['formsubmit']))
  {
    
    $q1="SELECT * FROM login_table WHERE l_id='$ulid'";
    $ans1=mysqli_query($con,$q1);
    $row1=mysqli_fetch_array($ans1);
    $currpass=$row1['password'];
    $old= $_POST['old_pass'];
    $newpass = $_POST['pass1'];
    $repass = $_POST['pass2'];


    if($currpass==$old)
    {
      if($newpass==$repass)  
      {
        $q1 = "UPDATE login_table SET password='$newpass' WHERE l_id='$ulid'";
        $res1 = mysqli_query($con,$q1);
        
        if($res1)
        {
            echo ("<script LANGUAGE='JavaScript'>
               window.alert('Password changed successfully.');
            </script>");
        }
        else
        {
          echo "Error...";
        }
      }
    }
    else
    {
      echo "<script>alert('Old password incorrect.')</script>";
    }
  }
?>
      <section class="section-height-800 breadcrumb-modern rd-parallax context-dark bg-gray-darkest text-lg-left">
          <div data-speed="0.2" data-type="media" data-url="images/backgrounds/background-01-1920x900.jpg" class="rd-parallax-layer"></div>
          <div data-speed="0" data-type="html" class="rd-parallax-layer">
            <div class="shell section-top-57 section-bottom-30 section-md-top-125 section-lg-top-200">
              <div class="veil reveal-md-block">
                <h1 class="text-bold">Change Password</h1>
              </div>
              <ul class="list-inline list-inline-icon list-inline-icon-type-1 list-inline-icon-extra-small list-inline-icon-white p offset-top-30 offset-md-top-40 offset-lg-top-125">
                <li><a href="index.php" class="text-white">Home</a></li>
                <li>Change Password
                </li>
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
                        <div class="form-group form-group-label-outside offset-top-20">
                          <label for="login-password" class="text-dark">Old Password *</label>
                          <input type="password" name="old_pass" data-constraints="@Required" class="form-control" autocomplete="off" required>
                        </div>
                        <div class="form-group form-group-label-outside offset-top-20">
                          <label for="login-password" class="text-dark">New Password *</label>
                          <input type="password" name="pass1" id="pass1" data-constraints="@Required" class="form-control" autocomplete="off" required>
                        </div>
                        <div class="form-group form-group-label-outside offset-top-20">
                          <label for="login-password" class="text-dark">Retype Password *</label>
                          <input type="password" name="pass2" id="pass2" oninput="check(this)" data-constraints="@Required" class="form-control" autocomplete="off" required>
                        </div>
                        <div class="offset-top-15 offset-sm-top-30 text-center text-md-left">
                          <div class="reveal-xs-inline-block text-middle">
                            <button type="submit" id="formsubmit" name="formsubmit" class="btn btn-primary">Change</button>
                          </div>
                        </div>
                        <script language='javascript' type='text/javascript'>
                                    function check(input) {
                                        if (input.value != document.getElementById('pass1').value) {
                                            input.setCustomValidity('Password Must be Matching.');
                                        } else {
                                            // input is valid -- reset the error message
                                            input.setCustomValidity('');
                                        }
                                    }
                        </script>
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