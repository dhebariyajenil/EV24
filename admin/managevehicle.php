<?php include "header.php";
include "connection.php";
if (!isset ($_SESSION['aemail'])) {
  header("location:index.php");
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <h3>Manage Vehicles</h3>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!--content-header-->
  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body table-responsive">
            <table id="example1" class="table table-bordered table-striped text-center">
              <thead>
                <tr align="center">
                  <th>Sr No.</th>
                  <th>Vehicle Name</th>
                  <th>Vehicle Description</th>
                  <th>Veicle Price</th>
                  <th>Vehicle Image</th>
                  <th>Vehicle Colours</th>
                  <th>Action</th>
                </tr>
              </thead>
              <?php
              $count = 0;
              $q2 = "SELECT * FROM vehicle_detail_table";
              $ans2 = mysqli_query($con, $q2);
              while ($row2 = mysqli_fetch_array($ans2)) {
                $vid = $row2['vehicle_id'];
                $vname = $row2['vehicle_name'];
                $vdesc = $row2['vehicle_description'];
                $vprice = $row2['vehicle_price'];
                $vimage = $row2['vehicle_image'];
                $vcolor = $row2['color'];

                ?>
                <tr align="center">
                  <td>
                    <?php echo ++$count; ?>
                  </td>
                  <td>
                    <?php echo $vname; ?>
                  </td>
                  <td>
                    <?php echo $vdesc; ?>
                  </td>
                  <td>
                    <?php echo $vprice; ?>
                  </td>
                  <td>
                    <?php
                    if ($vimage != "") {
                      ?>
                      <img src="./photos/vehicles/<?php echo $vimage; ?>" class="img-circle" height="50px" width=50px
                        alt="Vehicle Image">
                      <?php
                    }
                    ?>
                  </td>
                  <td>
                    <?php echo $vcolor; ?>
                  </td>
                  <td>
                    <a href="editvehicle.php?vid=<?php echo $vid; ?>" class="btn btn-success btn-sm"><i
                        class="fas fa-edit"></i></a>
                    <a href="?vid=<?php echo $vid; ?>" onclick="return confirm('Are you sure you want to delete');"
                      class="btn btn-sm btn-danger">
                      <i class="fas fa-trash"></i>
                    </a>
                  </td>
                </tr>
                <?php
              }
              if (isset ($_GET['vid'])) {
                $delid=$_GET['vid'];
                $sql = "DELETE from vehicle_detail_table WHERE vehicle_id='$delid' ";
                $resultt = mysqli_query($con, $sql);
                if ($resultt) {
                  echo "<script LANGUAGE='JavaScript'>
                            window.alert('Vehicle Details Deleted Successfully!!');
                            window.location.href='managevehicle.php';
                            </script>";
                }
              }
              ?>
            </table>
            <!-- display none table for print and pdf  -->
            <table id="example2" class="table table-bordered table-striped text-center" style="display: none;">
              <thead>
                <tr align="center">
                  <th>Sr No.</th>
                  <th>Vehicle Name</th>
                  <th>Vehicle Description</th>
                  <th>Veicle Price</th>
                  <!-- <th>Vehicle Image</th> -->
                  <th>Vehicle Colours</th>
                  <!-- <th>Action</th> -->
                </tr>
              </thead>
              <?php
              $count = 0;
              $q2 = "SELECT * FROM vehicle_detail_table";
              $ans2 = mysqli_query($con, $q2);
              while ($row2 = mysqli_fetch_array($ans2)) {
                $vid = $row2['vehicle_id'];
                $vname = $row2['vehicle_name'];
                $vdesc = $row2['vehicle_description'];
                $vprice = $row2['vehicle_price'];
                $vimage = $row2['vehicle_image'];
                $vcolor = $row2['color'];

                ?>
                <tr align="center">
                  <td>
                    <?php echo ++$count; ?>
                  </td>
                  <td>
                    <?php echo $vname; ?>
                  </td>
                  <td>
                    <?php echo $vdesc; ?>
                  </td>
                  <td>
                    <?php echo $vprice; ?>
                  </td>
                  
                  <td>
                    <?php echo $vcolor; ?>
                  </td>
                  
                </tr>
                <?php
              }
              ?>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- /.card -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include "footer.php" ?>

<script>
  $(function () {
    $("#example1").DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
    });
  });
</script>

<script src="./plugins/jquery/jquery.min.js"></script>
<script src="./plugins/datatables/jquery.dataTables.min.js"></script>
<script src="./plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="./plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="./plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="./plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="./plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="./plugins/jszip/jszip.min.js"></script>
<script src="./plugins/pdfmake/pdfmake.min.js"></script>
<script src="./plugins/pdfmake/vfs_fonts.js"></script>
<script src="./plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="./plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="./plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="./dist/js/adminlte.min.js"></script>
<script src="./dist/js/demo.js"></script>




<script>
  $(function () {
    $("#example2").DataTable({
      "responsive": false, "lengthChange": false, "autoWidth": false, "searching": true, "paging": false, "ordering": false, "info": false,
      "buttons": ["pdf", "print"]
    }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');

  });
</script>