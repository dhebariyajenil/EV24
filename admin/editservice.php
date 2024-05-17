<?php
  include "header.php";
   
  if(!isset($_SESSION['aemail']))
  {
    header("location:../index.php");
  }
  if(isset($_GET['sid'])){
    $sid=$_GET['sid'];
    $q2="SELECT * FROM vehicle_service_detail WHERE service_id='$sid'";
    $ans2=mysqli_query($con,$q2);
    $row2=mysqli_fetch_array($ans2);
    $name=$row2['service_name'];
    $des=$row2['service_description'];
    $price=$row2['service_price']; 
    // $type=$row2['stype_id']; 
  }
?>
<?php
    if(isset($_POST['formsubmit']))
    {
      $srid=$_GET['sid'];
      $sname=$_POST['sname'];
      $sdes=htmlspecialchars($_POST['sdes']);
      $sprice=$_POST['sprice'];
      // $stype=$_POST['stype'];

      $q4="UPDATE vehicle_service_detail SET service_name='$sname',service_description='$sdes',service_price='$sprice' WHERE service_id='$srid'";
      try {
      $res4=mysqli_query($con,$q4); 
      if ($res4){
        echo ("<script LANGUAGE='JavaScript'>
                window.alert('Service details Updated Successfully');
                  window.location.href='manageservice.php';
                  </script>"); 
      }
      } catch (\Throwable $th) {
        echo "<script LANGUAGE='JavaScript'>
            window.alert('Service details Not Updated.');
            window.location.href='manageservice.php';
          </script>";
      }      
    }  
?>

  <div class="content-wrapper">
    <div class="container-fluid">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Service
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
          <form role="form" method="POST">
            <div class="card-body">
                <div class="form-group">
                  <label>Service Name  <font style="color: red">*</font></label>
                  <input type="text" name="sname" class="form-control" placeholder="Enter Service Name" value="<?php echo $name; ?>" required />
                </div>  
                        
                <div class="form-group">
                  <label>Service Description <font style="color: red">*</font></label>
                  <textarea class="form-control" name="sdes" rows="3" required><?php echo $des; ?></textarea>
                </div>
                <div class="form-group">
                  <label>Service Price <font style="color: red">*</font></label>
                  <input type="text" name="sprice" class="form-control" placeholder="Enter Service Price" value="<?php echo $price; ?>" required />
                </div>   
              </div>
              <div class="card-footer">
                <button type="submit" name="formsubmit" class="btn btn-primary">Edit</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  </section>
        <aside class="control-sidebar control-sidebar-dark">
        </aside>
  </div>
</div>
<?php
  include "footer.php";
?>