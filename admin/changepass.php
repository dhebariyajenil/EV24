<?php
    include "header.php";
    include "connection.php"; 
  if(!isset($_SESSION['aemail']))
  {
    header("location:index.php");
  }
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- /.content-header -->
<!-- Main content -->
  <br/>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <!-- Main row -->
      <div class="row">
        <div class="col-md-12">
          <h3>To change password you must know your old password.</h3>
	     <div class="card card-primary">
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post">
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Old Password: <font color="red">*</font></label>
                  <input type="password" name="old_pass" maxlength="8" class="form-control" id="exampleInputEmail1" placeholder="Enter old password" required />
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">New Password: <font color="red">*</font></label>
                  <input type="password" name="pass1" maxlength="8" class="form-control" id="pass1" placeholder="Enter new password" required />
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Retype New Password: <font color="red">*</font></label>
                  <input type="password" name="pass2" maxlength="8" class="form-control" id="pass2" placeholder="Re-Enter new password" oninput="check(this)" required />
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
                </div>
                
              </div>

              <div class="card-footer">
                <input type="submit" name="submit" class="btn btn-primary" value="Change">
              </div>
            </form>
          </div>
        </div>
        </div>
      </section>
		
    
<?php
  if(isset($_POST['submit']))
  {
    $email=$_SESSION['aemail'];
    $q1="SELECT * FROM login_table WHERE email_id='$email'";
    $res1=mysqli_query($con,$q1);
    $row1=mysqli_fetch_array($res1);
    $currpass=$row1['password'];
    $old=$_POST['old_pass'];
    $newpass=$_POST['pass1'];
    $repass=$_POST['pass2'];

    if($currpass==$old)
    {
      if($newpass==$repass)  
      {
        $update = "UPDATE login_table SET password='$newpass' WHERE email_id='$email'";
        $result1 = mysqli_query($con,$update);
        
        if($result1)
        {
        echo ("<script LANGUAGE='JavaScript'>
                window.alert('Password changed successfully');
                window.location.href='dashboard.php';
            </script>");
        }
        else
        {
          echo ("<script LANGUAGE='JavaScript'>
                window.alert('Error Occured Please Try Agian.');
            </script>");
        }
      }
    }
    else
    {
      echo "<font style='color:red'>Incorrect Old Password</font>";
    }
  }
?>

<?php
  include("footer.php")
?>