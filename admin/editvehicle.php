<?php
include "header.php";
include "connection.php";

if (!isset ($_SESSION['aemail'])) {
  header("location:index.php");
}
if (isset ($_GET['vid'])) {
  $vid = $_GET['vid'];
  $q2 = "SELECT * FROM vehicle_detail_table WHERE vehicle_id='$vid'";
  $ans2 = mysqli_query($con, $q2);
  $row2 = mysqli_fetch_array($ans2);
  $name = $row2['vehicle_name'];
  $color = $row2['color'];
  $des = $row2['vehicle_description'];
  $price = $row2['vehicle_price'];
  $vimg = $row2['vehicle_image'];
}
?>
<?php
if (isset ($_POST['formsubmit'])) {
  $vid = $_GET['vid'];
  $vname = $_POST['cname'];
  $vdes = $_POST['cdes'];
  $vprice = $_POST['cprice'];
  $vcolor = $_POST['vcolor'];

  $filename = addslashes($_FILES['image']['name']);
  $tmpname = addslashes($_FILES['image']['tmp_name']);
  date_default_timezone_set("Asia/Calcutta");
  $date = date('Y-m-d H:i:s');
  $iname = strtotime(date('Y-m-d H:i:s'));
  $iname = $filename;
  $extension = pathinfo($filename, PATHINFO_EXTENSION);
  // $image_path= $iname;
  $image_path = $iname;

  // $image_path= $iname;

  if ($filename) {
    move_uploaded_file($_FILES["image"]["tmp_name"], "photos/vehicles/" . $image_path);
    $q5 = "UPDATE vehicle_detail_table SET vehicle_image='$image_path' WHERE vehicle_id='$vid'";
    try {
      $res5 = mysqli_query($con, $q5);
    } catch (\Throwable $th) {
      echo ("<script LANGUAGE='JavaScript'>
          window.alert('Vehicle Details Not Updated');
            window.location.href='managevehicle.php';
            </script>");
    }
  }

  $q4 = "UPDATE vehicle_detail_table SET vehicle_name='$vname',vehicle_description='$vdes',vehicle_price='$vprice',color='$vcolor' WHERE vehicle_id='$vid'";
  try {
    $res4 = mysqli_query($con, $q4);
    if ($res4 || $res5) {
      echo ("<script LANGUAGE='JavaScript'>
                  window.alert('Vehicle Details Updated Successfully');
                    window.location.href='managevehicle.php';
                    </script>");
    }
  } catch (\Throwable $th) {
    echo ("<script LANGUAGE='JavaScript'>
          window.alert('Vehicle Details Not Updated');
            window.location.href='managevehicle.php';
            </script>");
  }

}
?>

<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Vehicle Details
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
                  <div class="form-group">
                    <label>Vehicle Name<font style="color: red">*</font></label>
                    <input type="text" name="cname" class="form-control" placeholder="Enter Car Name"
                      value="<?php echo $name; ?>" required />
                  </div>
                  <div class="form-group">
                    <label>Vehicle Description<font style="color: red">*</font></label>
                    <textarea class="form-control" required name="cdes" rows="3" required><?php echo $des; ?></textarea>
                  </div>
                  <div class="form-group">
                    <label>Price<font style="color: red">*</font></label>
                    <input type="text" name="cprice" class="form-control" placeholder="Enter Car Price"
                      value="<?php echo $price; ?>" required />
                  </div>
                  <div class="form-group">
                    <label>Vehicle Color's<font style="color: red">*</font></label>
                    <input type="text" name="vcolor" class="form-control" placeholder="Enter Color's"
                      value="<?php echo $color; ?>" required />
                  </div>
                  <div class="form-group">
                    <label>Vehicle Image: <font style="color: red"></font></label>
                    <input type="file" id="photo-img" accept="image/png,image/jpg,image/jpeg,image/webp"
                      class="form-control" name="image">
                    <div id="myDiv">
                      <!--<p class="square"> -->
                      <img src="./photos/vehicles/<?php echo $vimg; ?>" id="photo-img-tag" width="200px"
                        height="200px" />
                      <script type="text/javascript">
                        function readURL(input) {
                          if (input.files && input.files[0]) {
                            var reader = new FileReader();
                            reader.onload = function (e) {
                              $('#photo-img-tag').attr('src', e.target.result);
                            }
                            reader.readAsDataURL(input.files[0]);
                          }
                        }
                        $("#photo-img").change(function () {
                          readURL(this);
                        });
                      </script>
                    </div>
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