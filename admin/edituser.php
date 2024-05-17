<?php

include "header.php";

if(!isset($_SESSION['aemail']))
{
	header("location:index.php");
}
	
else
{
  if (isset($_GET['lid'])) {
  	$lid = $_GET['lid'];
    $q1 = "SELECT * FROM login_table WHERE l_id='$lid'";
    $res1 = mysqli_query($con,$q1);
    $row1 = mysqli_fetch_array($res1);
    $email=$row1['email_id'];
    $phone=$row1['phone_no'];
    $dp=$row1['dp'];

    $q2 = "SELECT * FROM detail_table WHERE l_id='$lid'";
    $res2 = mysqli_query($con,$q2);
    $row2 = mysqli_fetch_array($res2);
    $name = $row2['name'];
    $dob = $row2['dob'];
    $address = $row2['address'];
  }
}
	
		
?>
<?php
	
	if(isset($_POST['formsubmit']))
    {
      $lid = $_GET['lid'];
      $uname=$_POST['fullname'];
      $uemail=$_POST['email'];
      $uphone=$_POST['uphone'];
      $bdate=$_POST['dob'];
      $uaddress=$_POST['uaddress'];
      /*$state=$_POST['state'];
      $city=$_POST['city'];*/

      $filename=addslashes($_FILES['image']['name']);
      $tmpname=addslashes($_FILES['image']['tmp_name']);
      date_default_timezone_set("Asia/Calcutta");
      $date = date('Y-m-d H:i:s');
      $iname=strtotime(date('Y-m-d H:i:s'));
      $extension=pathinfo($filename, PATHINFO_EXTENSION);
      $image_path= $iname.".".$extension;

      $q4="UPDATE detail_table SET name='$uname',dob='$bdate',address='$uaddress' WHERE l_id='$lid'";
      $res4=mysqli_query($con,$q4); 

      $q3="UPDATE login_table SET email_id='$uemail',phone_no='$uphone' WHERE l_id='$lid'";
      $res3=mysqli_query($con,$q3); 

      if($filename)
      {
      	move_uploaded_file($_FILES["image"]["tmp_name"],"../user/userphotos/".$image_path);
        $q5="UPDATE login_table SET dp='$image_path' WHERE l_id=$lid";
        $res5=mysqli_query($con,$q5);
      }
      if ($res3 ||$res4 || $res5){
      	echo ("<script LANGUAGE='JavaScript'>
                window.alert('User Details Updated Successfully');
                  window.location.href='manageuser.php';
                  </script>"); 
      }
	}  			
?>

<div class="content-wrapper">
    <div class="container-fluid">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit User
      </h1>
    </section>
  
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <!-- Main row -->
          <div class="container-fluid">
            <div class="card card-warning">
              <div class="row">
                <div class="col-md-12">
                  <form role="form" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Name<font style="color: red">*</font></label>
                        <input type="text" name="fullname" value="<?php echo $name; ?>" class="form-control" placeholder="Enter Name ..." required />
                      </div>
            				  <div class="form-group">
                        <label>Email<font style="color: red">*</font></label>
                        <input type="email" name="email" value="<?php echo $email; ?>" class="form-control" placeholder="Enter Email ..." required/>
                      </div>
            				  <div class="form-group">
                        <label>Contact No<font style="color: red">*</font></label>
                        <input type="text" name="uphone" class="form-control" placeholder="Enter Phone no ..." required pattern="([6|7|8|9]{1})([0-9]{9})" oninput="setCustomValidity('')" title='Enter 10 Digit mobile number starting with 7 or 8 or 9' value="<?php echo $phone; ?>"/>
                      </div>
                      <div>
                        <label>Date of Birth: <font style="color: red">*</font></label>
                        <input type="Date" name="dob" id="dob" class="form-control" placeholder="Enter Date of Birth" value="<?php echo $dob ?>" required>
                      </div></br>
                      <div class="form-group">
                        <label>Address<font style="color: red">*</font></label>
                        <textarea class="form-control" required name="uaddress" rows="3"><?php echo $address; ?></textarea>
                      </div>
          				    <div class="form-group">
                        <label>Profile Pic</label>
                        <input type="file" id="profile-img" name="image" accept="image/png,image/jpg,image/jpeg" class="form-control" placeholder="">
              					<div id="myDiv"> 
              						<!--<p class="square"> -->
              					  <img src="../user/userphotos/<?php echo $dp; ?>" id="profile-img-tag" alt="Profile Pic" width="200px" height="200px" style="border:5px solid #ffffff; background-color: #ffffff;" />

              						<script type="text/javascript">
              							function readURL(input) {
              								if (input.files && input.files[0]) {
              									var reader = new FileReader();
              									
              									reader.onload = function (e) {
              										$('#profile-img-tag').attr('src', e.target.result);
              									}
              									reader.readAsDataURL(input.files[0]);
              								}
              							}
              							$("#profile-img").change(function(){
              								readURL(this);
              							});
              						</script>
              					</div>	
      				        </div>
                    </div>
                    <div class="card-footer" align="center">
                      <button type="submit" name="formsubmit" class="btn btn-primary">Modify</button>
                    </div>
      			   </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      <!-- /.row (main row) -->
    <!-- /.content -->
	
  </div>
  <!-- /.content-wrapper -->
<?php include 'footer.php';
?>  

<script>
$(document).ready(function () {
$('#datepicker').datepicker({    
    endDate: '+1d',
    autoclose: true
});  });
</script>

</body>
</html>