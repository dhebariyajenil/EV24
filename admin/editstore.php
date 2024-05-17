<?php include "header.php"; 
if(!isset($_SESSION['aemail']))
{
    header("location:index.php");
}

else{

  if (isset($_GET['aid'])) {
    $aid=$_GET['aid'];
    $query="SELECT * FROM service_store_details_table WHERE area_id='$aid'";
    $result=mysqli_query($con,$query);
    $value=mysqli_fetch_array($result);
    $sarea=$value['area_location'];
    $sname=$value['store_name'];
    $smname=$value['store_manager_name'];
    $snum=$value['store_contact_no'];
    $saddress=$value['store_full_address'];
  }

  if (isset($_POST['formsubmit'])) {
    $aid=$_GET['aid'];
    $starea=$_POST['starea'];
    $stname=$_POST['stname'];
    $stmname=$_POST['stmname'];
    $stnum=$_POST['stnum'];
    $staddress=$_POST['staddress'];

    $query1="UPDATE service_store_details_table SET area_location='$stname',store_name='$stname',store_manager_name='$stmname',store_contact_no='$stnum',store_full_address='$staddress' WHERE area_id='$aid'";
    try {
      $result1=mysqli_query($con,$query1);
      if($result1)
    {
      echo "<script LANGUAGE='JavaScript'>
            window.alert('Store Location Edited Successfully!!');
            window.location.href='managestores.php';
            </script>"; 
    }
    } catch (\Throwable $th) {
      echo "<script LANGUAGE='JavaScript'>
            window.alert('Store Location Not Edited.');
            window.location.href='managestores.php';
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
        Edit Store Details
      </h1>
    </section>

    <section class="content">
      <!-- Small boxes (Stat box) -->
      <!-- Main row -->
          <div class="container-fluid">
            <div class="card card-warning">
              <div class="row">
                <div class="col-md-12">
                <form role="form" method="POST">
                  <div class="card-body">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Area Name:<font style="color: red">*</font></label>
                    <input type="text" name="starea" class="form-control" placeholder="Enter Area Name" value="<?php echo $sarea; ?>" required>
                  </div>
                  <div class="form-group">
                    <label>Store Name:<font style="color: red">*</font></label>
                    <input type="text" name="stname" class="form-control" placeholder="Enter Store Name" value="<?php echo $sname; ?>" required>
                  </div>
                  <div class="form-group">
                    <label>Store Manager Name:<font style="color: red">*</font></label>
                    <input type="text" name="stmname" class="form-control" placeholder="Enter Manager Name" value="<?php echo $smname; ?>" required>
                  </div>
                  <div class="form-group">
                    <label>Store Contact No:<font style="color: red">*</font></label>
                    <input type="text" name="stnum" maxlength="10" class="form-control" placeholder="Enter Contact No" value="<?php echo $snum; ?>" required>
                  </div>
                  <div class="form-group">
                    <label>Store Address:<font style="color: red">*</font></label>
                    <input type="text" name="staddress" class="form-control" placeholder="Enter Store Address" value="<?php echo $saddress; ?>" required>
                  </div>
                  <div>
                    <input type="submit" name="formsubmit" value="EDIT" class="btn btn-primary">
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
  include 'footer.php';
?>  
