<?php include "header.php";
include "connection.php";
if (!isset ($_SESSION['aemail'])) {
  header("location:../index.php");
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <h3>Manage Services</h3>
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
                  <th>Service Name</th>
                  <!-- <th>Service Type</th> -->
                  <th>Service Description</th>
                  <th>Service Price</th>
                  <th>Action</th>
                </tr>
              </thead>
              <?php
              $count = 0;
              $q2 = "SELECT * FROM vehicle_service_detail";
              $ans2 = mysqli_query($con, $q2);
              while ($row2 = mysqli_fetch_array($ans2)) {
                $sid = $row2['service_id'];
                $sname = $row2['service_name'];
                // $stype=$row2['stype_id'];
                $sdes = $row2['service_description'];
                $sprice = $row2['service_price'];

                // $q3="SELECT * FROM service_type_detail WHERE stype_id='$stype'";
                // $ans3=mysqli_query($con,$q3);
                // $row3=mysqli_fetch_array($ans3);
                ?>
                <tr align="center">
                  <td>
                    <?php echo ++$count; ?>
                  </td>
                  <td>
                    <?php echo $sname; ?>
                  </td>
                  <!-- <td><?php //echo $row3['service_type'];   ?></td> -->
                  <td>
                    <?php echo $sdes; ?>
                  </td>
                  <td>
                    <?php echo $sprice; ?>
                  </td>
                  <td>
                    <a href="editservice.php?sid=<?php echo $sid; ?>" class="btn btn-success btn-sm"><i
                        class="fas fa-edit"></i></a>
                    <a href="?sid=<?php echo $sid; ?>" onclick="return confirm('Are you sure you want to delete');"
                      class="btn btn-sm btn-danger">
                      <i class="fas fa-trash"></i>
                    </a>
                  </td>
                </tr>
                <?php
              }
              if (isset ($_GET['sid'])) {

                $sql = "DELETE FROM vehicle_service_detail WHERE service_id=" . $_GET['sid'] . "";
                $resultt = mysqli_query($con, $sql);
                if ($resultt) {
                  echo "<script LANGUAGE='JavaScript'>
                            window.alert('Service Deleted Successfully!!');
                            window.location.href='manageservice.php';
                            </script>";
                }
              }
              ?>
            </table>
            
            <!-- display none table for print and pdf -->
            <table id="example2" class="table table-bordered table-striped text-center" style="display: none;">
              <thead>
                <tr align="center">
                  <th>Sr No.</th>
                  <th>Service Name</th>
                  <th>Service Description</th>
                  <th>Service Price</th>
                </tr>
              </thead>
              <?php
              $count = 0;
              $q2 = "SELECT * FROM vehicle_service_detail";
              $ans2 = mysqli_query($con, $q2);
              while ($row2 = mysqli_fetch_array($ans2)) {
                $sid = $row2['service_id'];
                $sname = $row2['service_name'];
                // $stype=$row2['stype_id'];
                $sdes = $row2['service_description'];
                $sprice = $row2['service_price'];

                // $q3="SELECT * FROM service_type_detail WHERE stype_id='$stype'";
                // $ans3=mysqli_query($con,$q3);
                // $row3=mysqli_fetch_array($ans3);
                ?>
                <tr align="center">
                  <td>
                    <?php echo ++$count; ?>
                  </td>
                  <td>
                    <?php echo $sname; ?>
                  </td>
                  <!-- <td><?php //echo $row3['service_type'];   ?></td> -->
                  <td>
                    <?php echo $sdes; ?>
                  </td>
                  <td>
                    <?php echo $sprice; ?>
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