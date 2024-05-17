<?php
    include "header.php";
    if(!isset($_SESSION['uemail'])){
        header("location:index.php");
    }
    
    $q1 = "SELECT * FROM login_table WHERE l_id='$ulid'";
    $res1 = mysqli_query($con,$q1);
    $row1 = mysqli_fetch_array($res1);
    $email=$row1['email_id'];
    $phone=$row1['phone_no'];

    $q2 = "SELECT * FROM detail_table WHERE l_id='$ulid'";
    $res2 = mysqli_query($con,$q2);
    $row2 = mysqli_fetch_array($res2);
    $name = $row2['name'];
    $add = $row2['address'];
    $dob = $row2['dob'];

    if(isset($_POST['formsubmit']))
    {
      unset($_SESSION['uemail']);
      unset($_SESSION['uphone']);
      $name=$_POST['name'];
      $email=$_POST['email'];
      $_SESSION['uemail']=$email;
      $phone=(double)$_POST['phone'];
      $_SESSION['uphone']=$phone;
      $add=$_POST['add'];
      $dob=$_POST['dob'];
      
      $q3="UPDATE login_table SET email_id='$email',phone_no=$phone WHERE l_id='$ulid'";
      $res3=mysqli_query($con,$q3);

      $q4="UPDATE detail_table SET name='$name', address='$add', dob='$dob' WHERE l_id='$ulid'";
      $res4=mysqli_query($con,$q4); 

      if($res3){
        echo ("<script LANGUAGE='JavaScript'>
              window.alert('Profile updated successfully.');
            </script>");
      }
    }  
?>
      <section class="section-height-800 breadcrumb-modern rd-parallax context-dark bg-gray-darkest text-lg-left">
          <div data-speed="0.2" data-type="media" data-url="images/backgrounds/background-01-1920x900.jpg" class="rd-parallax-layer"></div>
          <div data-speed="0" data-type="html" class="rd-parallax-layer">
            <div class="shell section-top-57 section-bottom-30 section-md-top-125 section-lg-top-200">
              <div class="veil reveal-md-block">
                <h1 class="text-bold">Edit Profile</h1>
              </div>
              <ul class="list-inline list-inline-icon list-inline-icon-type-1 list-inline-icon-extra-small list-inline-icon-white p offset-top-30 offset-md-top-40 offset-lg-top-125">
                <li><a href="index.php" class="text-white">Home</a></li>
                <li>Edit Profile
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
                      <form class="text-left" method="POST">
                        <div class="form-group form-group-label-outside">
                          <label for="register-name" class="text-dark">Name *</label>
                          <input type="text" name="name" value="<?php echo $name?>" data-constraints="@Required" class="form-control" required>
                        </div>
                        <div class="form-group form-group-label-outside offset-top-20">
                          <label for="register-email" class="text-dark">Email *</label>
                          <input id="register-email" type="email" name="email" value="<?php echo $email?>" data-constraints="@Email @Required" class="form-control" required>
                        </div>
                        <div class="form-group form-group-label-outside">
                        <label for="register-name" class="text-dark">Mobile *</label>
                          <input maxlength="10" type="phone" name="phone" 
                          value="<?php echo $phone?>"data-constraints="@Required" class="form-control" required>
                        </div>
                        <div class="form-group form-group-label-outside">
                          <label for="register-name" class="text-dark">Address *</label>
                          <textarea style="height:8rem;" name="add" data-constraints="@Required" class="form-control"
                          required><?php echo $add;?></textarea>
                        </div>
                        <div class="form-group form-group-label-outside">
                          <label for="register-name" class="text-dark">Date Of Birth *</label>
                          <input type="date" name="dob" value="<?php echo $dob?>" data-constraints="@Required" class="form-control" required>
                        </div>
                        <!--<div class="form-group form-group-label-outside">
                          <label for="register-name" class="text-dark">Your Profile Pic *</label>
                          <input type="file" name="dp" accept="image/jpg,image/jpeg,image/png" data-constraints="@Required" class="form-control">
                        </div>-->
                        <div class="offset-top-15 offset-sm-top-20 text-center text-md-left">
                          <button type="submit" name="formsubmit" class="btn btn-primary">Modify</button>
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