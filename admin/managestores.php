<?php
include "header.php";
include "connection.php";
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <h3>Manage Store Locations</h3>
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
                <tr>
                  <th>Sr No</th>
                  <th>Store Name</th>
                  <th>Store Manager Name</th>
                  <th>Contact No</th>
                  <th>Area Name</th>
                  <th>Store Address</th>
                  <th>Action</th>
                </tr>
              </thead>
              <?php
              $query = "SELECT * FROM service_store_details_table ";
              $result = mysqli_query($con, $query);
              $count = 1;
              while ($value = mysqli_fetch_array($result)) {
                $aid = $value['area_id'];
                $location = $value['area_location'];
                $sname = $value['store_name'];
                $smname = $value['store_manager_name'];
                $snum = $value['store_contact_no'];
                $saddress = $value['store_full_address'];
                ?>
                <tr>
                  <td>
                    <?php echo $count++; ?>
                  </td>
                  <td>
                    <?php echo $sname; ?>
                  </td>
                  <td>
                    <?php echo $smname; ?>
                  </td>
                  <td>
                    <?php echo $snum; ?>
                  </td>
                  <td>
                    <?php echo $location; ?>
                  </td>
                  <td>
                    <?php echo $saddress; ?>
                  </td>
                  <td><a href="editstore.php?aid=<?php echo $aid; ?>"
                      onclick="return confirm('Are you sure you want to edit?');" class="btn btn-success btn-xs"><i
                        class="fas fa-edit"></i></a>
                    <a href="?aid=<?php echo $aid; ?>" onclick="return confirm('Are you sure you want to delete?');"
                      class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></a>
                  </td>
                </tr>
                <?php
              }
              if (isset ($_GET['aid'])) {
                $sql = "DELETE FROM service_store_details_table WHERE area_id=" . $_GET['aid'] . "";
                $resultt = mysqli_query($con, $sql);
                if ($resultt) {
                  echo "<script LANGUAGE='JavaScript'>
                        window.alert('Store Details Deleted Successfully!!');
                        window.location.href='managestores.php';
                        </script>";
                }
              }
              ?>
            </table>
            <!-- display none table for print and pdf -->
            <table id="example2" class="table table-bordered table-striped text-center" style="display: none;">
              <thead>
                <tr>
                  <th>Sr No</th>
                  <th>Store Name</th>
                  <th>Store Manager Name</th>
                  <th>Contact No</th>
                  <th>Area Name</th>
                  <th>Store Address</th>
                </tr>
              </thead>
              <?php
              $query = "SELECT * FROM service_store_details_table ORDER BY area_id DESC";
              $result = mysqli_query($con, $query);
              $count = 1;
              while ($value = mysqli_fetch_array($result)) {
                $aid = $value['area_id'];
                $location = $value['area_location'];
                $sname = $value['store_name'];
                $smname = $value['store_manager_name'];
                $snum = $value['store_contact_no'];
                $saddress = $value['store_full_address'];
                ?>
                <tr>
                  <td>
                    <?php echo $count++; ?>
                  </td>
                  <td>
                    <?php echo $sname; ?>
                  </td>
                  <td>
                    <?php echo $smname; ?>
                  </td>
                  <td>
                    <?php echo $snum; ?>
                  </td>
                  <td>
                    <?php echo $location; ?>
                  </td>
                  <td>
                    <?php echo $saddress; ?>
                  </td>
                  
                </tr>
                <?php
              }
             
              ?>
            </table>

          </div>
        </div>
      </div>
      <!-- /.box-body -->
      <!-- /.row (main row) -->
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include 'footer.php';
    ?>

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