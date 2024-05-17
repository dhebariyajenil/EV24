<?php include "header.php";
  include "connection.php";
    if(!isset($_SESSION['aemail']))
    {
       header("location:index.php");
    }
?>

  <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <h3>View Service Feedbacks</h3>
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
                  <th>Sr No</th>
                  <th>User Name</th>
                  <th>Ratings</th>
                  <th>Comment</th>
                  <th>Action</th>
                </tr>
                </thead>
                <?php
                $count=0;
                  $q2="SELECT * FROM feedback";
                  $ans2=mysqli_query($con,$q2);
                  while($row2=mysqli_fetch_array($ans2))
                    {
                        $cnt=mysqli_num_rows($ans2);
                        
                        $fid=$row2['feed_id'];
                        $log=$row2['l_id'];
                        $rate=$row2['ratings'];
                        $comment=$row2['comment']; 

                        $qry="SELECT * FROM detail_table WHERE l_id='$log'";
                        $rt=mysqli_query($con,$qry);
                        $value2=mysqli_fetch_array($rt);

                        if($cnt>0){
                  ?>
                  <tr align="center">
                  <td><?php echo ++$count; ?></td>
                  <td><?php echo $value2['name']; ?></td> 
                  <td><?php for($i=1; $i<=5; $i++) {
                      if ($rate >= 1) {
                        echo '<img src="photos/Star (Full).png" width="20"/>';
                        $rate--;
                      }
                      elseif($rate<1){
                          echo '<img src="photos/Star (Empty).png" width="20"/>';
                      }
                  }?></td>
                  <td><?php echo $comment; ?></td>
                <td>
                  <a href="?fid=<?php echo $fid;?>" onclick="return confirm('Are you sure you want to delete');" class="btn btn-sm btn-danger">
                      <i class="fas fa-trash"></i>
                    </a>
              </td>
              </tr>
              <?php
                    }
                  }
                  if(isset($_GET['fid']))
                  {
                   
                    $sql="DELETE FROM feedback WHERE feed_id=".$_GET['fid']."";
                    $resultt=mysqli_query($con,$sql);
                    if($resultt)
                    {
                      echo "<script LANGUAGE='JavaScript'>
                            window.alert('Feedback Deleted Successfully!!');
                            window.location.href='viewfeedback.php';
                            </script>";
                    }
                  }     
              ?>
          </table>
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