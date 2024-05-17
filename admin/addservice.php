<?php
  include "header.php";
  include "connection.php";
   
  if(!isset($_SESSION['aemail']))
  {
    header("location:../index.php");
  }

  else{
    if(isset($_POST['formsubmit']))
    {
      $sname=$_POST['sname'];
      $sdes=htmlspecialchars($_POST['sdes']);
      $sprice=$_POST['sprice'];

      $q4="INSERT INTO vehicle_service_detail(service_name,service_description,service_price) VALUES ('$sname','$sdes','$sprice')";
      try {
        
        $res4=mysqli_query($con,$q4); 
        if ($res4){
          echo ("<script LANGUAGE='JavaScript'>
                  window.alert('Service Details Added Successfully');
                    window.location.href='addservice.php';
                    </script>"); 
        }
      } catch (\Throwable $th) {
        
          echo "<script LANGUAGE='JavaScript'>
              window.alert('Service Details Not Added.');
              window.location.href='addservice.php';
            </script>";
        
      }

    }  
  }
?>

  <div class="content-wrapper">
    <div class="container-fluid">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Service Details
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
                  <label>Service Name <font style="color: red">*</font></label>
                  <input type="text" name="sname" class="form-control" placeholder="Enter Service Name" required />
                </div>  
                
                <div class="form-group">
                  <label>Service Description <font style="color: red">*</font></label>
                  <textarea class="form-control" name="sdes" rows="3" placeholder="Enter Service Description Here" required></textarea>
                </div>
                <div class="form-group">
                  <label>Service Price <font style="color: red">*</font></label>
                  <input type="number" name="sprice" class="form-control" placeholder="Enter Service Price" required />
                </div>   
              </div>
              <div class="card-footer">
                <button type="submit" name="formsubmit" class="btn btn-primary">Add</button>
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