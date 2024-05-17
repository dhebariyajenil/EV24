<?php include "header.php"; 
if(!isset($_SESSION['aemail']))
{
    header("location:index.php");
}
else{
  if(isset($_POST['submit'])){
    $loc=$_POST['stype'];
    $saddress=$_POST['saddress'];
    $snum=$_POST['snum'];
    $sname=$_POST['sname'];
    $smname=$_POST['smname'];

    $query="INSERT INTO service_store_details_table(area_location,store_name,store_manager_name,store_contact_no,store_full_address) VALUES ('$loc','$sname','$smname','$snum','$saddress')";
    try {
      $result=mysqli_query($con,$query);
      if($result)
      {
        echo ("<script LANGUAGE='JavaScript'>
              window.alert('Store Detail Added Successfully!!');
              window.location.href='addstore.php';
              </script>");
      }
      
    } catch (\Throwable $th) {
        echo "<script LANGUAGE='JavaScript'>
              window.alert('Store Details Not Added');
              window.location.href='addstore.php';
            </script>";
      
    }
  }
?>

  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Store Detais
      </h1>
    </section>   
    <section class="content">
      <div class="container-fluid">
            <div class="card card-warning">
              <div class="row">
                <div class="col-md-12">
                  <form role="form" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                    <!-- text input -->
                      
                      <div class="form-group">
                          <label>Store Name:<font style="color: red">*</font></label>
                          <input type="text" name="sname" class="form-control" placeholder="Enter Store Name" required />
                      </div>
                      
                      <div class="form-group">
                          <label>Store Manager Name:<font style="color: red">*</font></label>
                          <input type="text" name="smname" class="form-control" placeholder="Enter Store Name" required />
                      </div>
                      <div class="form-group">
                          <label>Area Name:<font style="color: red">*</font></label>
                          <input type="text" name="stype" class="form-control" placeholder="Enter area location name" required />
                      </div>
                      <div class="form-group">
                          <label>Store Contact No:<font style="color: red">*</font></label>
                          <input type="text" name="snum" maxlength="10" pattern="[6789][0-9]{9}" class="form-control" placeholder="Enter Contact No" required />
                      </div>
                      <div class="form-group">
                          <label>Store Address:<font style="color: red">*</font></label>
                          <input type="text" name="saddress" class="form-control" placeholder="Enter Address" required />
                      </div>
                      <div>
                          <input type="submit" name="submit" value="ADD" class="btn btn-primary">
                      </div>
                    </form>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
              </div>
            <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
<?php
  } 
  
  include 'footer.php';
?>  