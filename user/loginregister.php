<?php
include "header.php";
?>
<section class="section-height-800 breadcrumb-modern rd-parallax context-dark bg-gray-darkest text-lg-left">
  <div data-speed="0.2" data-type="media" data-url="images/backgrounds/background-01-1920x900.jpg"
    class="rd-parallax-layer"></div>
  <div data-speed="0" data-type="html" class="rd-parallax-layer">
    <div class="shell section-top-57 section-bottom-30 section-md-top-125 section-lg-top-200">
      <div class="veil reveal-md-block">
        <h1 class="text-bold">Login/Register</h1>
      </div>
      <ul
        class="list-inline list-inline-icon list-inline-icon-type-1 list-inline-icon-extra-small list-inline-icon-white p offset-top-30 offset-md-top-40 offset-lg-top-125">
        <li><a href="index.php" class="text-white">Home</a></li>
        <li>Login/Register
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
            <ul data-group="tabs-group-default" class="resp-tabs-list tabs-1 text-center tabs-group-default">
              <li>Login</li>
              <li>Register</li>
            </ul>
            <div data-group="tabs-group-default" class="resp-tabs-container text-sm-left tabs-group-default">
              <div>
                <!-- RD Mailform-->
                <form class="text-left" method="post" action="checklogin.php">
                  <div class="form-group form-group-label-outside">
                    <label for="login-email" class="text-dark">Email or Phone <font style="color: red">*</font></label>
                    <input id="login-email" type="text" name="email" data-constraints="@Email @Required"
                      class="form-control" required>
                  </div>
                  <div class="form-group form-group-label-outside offset-top-20">
                    <label for="login-password" class="text-dark">Password <font style="color: red">*</font></label>
                    <input id="login-password" type="password" name="pass" data-constraints="@Required"
                      class="form-control" autocomplete="off" required>
                  </div>
                  <div class="offset-top-15 offset-sm-top-30 text-center text-md-left">
                    <div class="reveal-xs-inline-block text-middle">
                      <button type="submit" id="formsubmit" name="formsubmit" class="btn btn-primary">Sign In</button>
                    </div>
                  </div>
                </form>
                <br />
                <a style="color:#01b3a0;" href="forgotpass.php">Forgot Password?</a>
                <br />
                <?php
                if (isset ($_GET['flag'])) {
                  if ($_GET['flag'] == 1) {
                    echo "<br/><font color='red'>Incorrect email or password</font>";
                  }
                }
                ?>
              </div>
              <div>
                <form class="text-left" method="post" action="checkreg.php" enctype="multipart/form-data">
                  <div class="form-group form-group-label-outside">
                    <label for="register-name" class="text-dark">Name <font style="color: red">*</font></label>
                    <input type="text" name="name" data-constraints="@Required" class="form-control" required>
                  </div>
                  <div class="form-group form-group-label-outside offset-top-20">
                    <label for="register-email" class="text-dark">Email <font style="color: red">*</font></label>
                    <input id="register-email" type="email" name="email" data-constraints="@Email @Required"
                      class="form-control" required>
                  </div>
                  <div class="form-group form-group-label-outside offset-top-20">
                    <label for="register-password" class="text-dark">Password <font style="color: red">*</font></label>
                    <input id="register-password" maxlength="25" type="password" name="pass" data-constraints="@Required"
                      class="form-control" required>
                  </div>
                  <div class="form-group form-group-label-outside offset-top-20">
                    <label for="register-repeat-password" class="text-dark">Confirm Passwod <font style="color: red">*
                      </font></label>
                    <input id="register-repeat-password" maxlength="25" type="password" oninput="check(this)"
                      name="cpass" data-constraints="@Required" class="form-control" required>
                  </div>
                  <div class="form-group form-group-label-outside">
                    <label for="register-name" class="text-dark">Mobile No <font style="color: red">*</font></label>
                    <input maxlength="10" type="phone" name="phone" data-constraints="@Required" class="form-control"
                      pattern="[6789][0-9]{9}" required>
                  </div>
                  <div class="form-group form-group-label-outside">
                    <label for="register-name" class="text-dark">Address <font style="color: red">*</font></label>
                    <textarea style="height:8rem;" name="add" data-constraints="@Required" class="form-control"
                      required></textarea>
                  </div>
                  <div class="form-group form-group-label-outside">
                    <label for="register-name" class="text-dark">Date Of Birth <font style="color: red">*</font></label>
                    <input type="date" name="dob" data-constraints="@Required" class="form-control" required>
                  </div>
                  <div class="form-group form-group-label-outside">
                    <label for="register-name" class="text-dark">Your Profile Pic <font style="color: red">*</font>
                      </label>
                    <input type="file" name="dp" accept="" data-constraints="@Required"
                      class="form-control" required>
                  </div>
                  <script language='javascript' type='text/javascript'>
                    function check(input) {
                      if (input.value != document.getElementById('register-password').value) {
                        input.setCustomValidity('Password Must be Matching.');
                      } else {
                        // input is valid -- reset the error message
                        input.setCustomValidity('');
                      }
                    }
                  </script>
                  <div class="offset-top-15 offset-sm-top-20 text-center text-md-left">
                    <button type="submit" name="formsubmit" class="btn btn-primary">Sign Up</button>
                  </div>
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