<?php
include "header.php";
include "connection.php";
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <h3>Manage Users</h3>
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
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone No</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
              </thead>
              <?php

              $query = "SELECT * FROM login_table WHERE role=2 AND status=1 ORDER BY l_id DESC";
              $result = mysqli_query($con, $query);
              $seq = 0;
              while ($value = mysqli_fetch_array($result)) {
                $lgid = $value['l_id'];
                $qry = "SELECT * FROM detail_table WHERE l_id='$lgid'";
                $res = mysqli_query($con, $qry);
                $val = mysqli_fetch_array($res);
                ?>

                <tr>
                  <td>
                    <?php echo ++$seq; ?>
                  </td>
                  <td>
                    <?php echo $val['name']; ?>
                  </td>
                  <td>
                    <?php echo $value['email_id']; ?>
                  </td>
                  <td>
                    <?php echo $value['phone_no']; ?>
                  </td>
                  <td>
                    <?php
                    if ($value['dp'] != "") {
                      ?>
                      <img src="../user/userphotos/<?php echo $value['dp']; ?>" class="img-circle" height="50px" width=50px
                        alt="User Image">
                      <?php
                    }
                    ?>
                  </td>
                  <td><a href="edituser.php?lid=<?php echo $lgid; ?>"
                      onclick="return confirm('Are you sure you want to edit?');" class="btn btn-success btn-xs"><i
                        class="fas fa-edit"></i></a>
                    <a href="?lid=<?php echo $lgid; ?>" onclick="return confirm('Are you sure you want to delete?');"
                      class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></a>
                  </td>
                </tr>
                <?php
              }
              if (isset ($_GET['lid'])) {
                $sql = "DELETE FROM detail_table WHERE l_id=" . $_GET['lid'] . "";
                $resultt = mysqli_query($con, $sql);
                $sql2 = "DELETE FROM login_table WHERE l_id=" . $_GET['lid'] . "";
                $resultt2 = mysqli_query($con, $sql2);

                if ($resultt && $resultt2) {
                  echo "<script LANGUAGE='JavaScript'>
                            window.alert('User Deleted Successfully!!');
                            window.location.href='manageuser.php';
                            </script>";
                }
              }
              ?>
            </table>
            <table id="example2" class="table table-bordered table-striped text-center" style="display: none;">
              <thead>
                <tr>
                  <th>Sr No</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone No</th>
                  <!-- <th>Image</th> -->
                  <!-- <th>Action</th> -->
                </tr>
              </thead>
              <?php

              $query = "SELECT * FROM login_table WHERE role=2 AND status=1 ORDER BY l_id DESC";
              $result = mysqli_query($con, $query);
              $seq = 0;
              while ($value = mysqli_fetch_array($result)) {
                $lgid = $value['l_id'];
                $qry = "SELECT * FROM detail_table WHERE l_id='$lgid'";
                $res = mysqli_query($con, $qry);
                $val = mysqli_fetch_array($res);
                ?>

                <tr>
                  <td>
                    <?php echo ++$seq; ?>
                  </td>
                  <td>
                    <?php echo $val['name']; ?>
                  </td>
                  <td>
                    <?php echo $value['email_id']; ?>
                  </td>
                  <td>
                    <?php echo $value['phone_no']; ?>
                  </td>
              </tr>
              <?php
              }
              ?>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    </div>
    <!-- /.row (main row) -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include 'footer.php'; ?>

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
      "responsive": false, "lengthChange": false, "autoWidth": false,"searching": true,"paging": false,"ordering": false,"info": false,
      "buttons": ["pdf", "print"]
    }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
    
  });
</script>