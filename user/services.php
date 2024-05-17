<?php
    include "header.php";
?>
        <section class="section-height-800 breadcrumb-modern rd-parallax context-dark bg-gray-darkest text-lg-left">
          <div data-speed="0.2" data-type="media" data-url="images/backgrounds/background-01-1920x900.jpg" class="rd-parallax-layer"></div>
          <div data-speed="0" data-type="html" class="rd-parallax-layer">
            <div class="shell section-top-57 section-bottom-30 section-md-top-125 section-lg-top-200">
              <div class="veil reveal-md-block">
                <h1 class="text-bold">Services</h1>
              </div>
              <ul class="list-inline list-inline-icon list-inline-icon-type-1 list-inline-icon-extra-small list-inline-icon-white p offset-top-30 offset-md-top-40 offset-lg-top-125">
                <li><a href="index.php" class="text-white">Home</a></li>
                <li>Services
                </li>
              </ul>
            </div>
          </div>
        </section>
      </header>

      <main class="page-content bg-white">
        <!-- Where Will You Go?-->
        <section class="section-90 section-md-111 text-left">
          <div class="shell">
            <div class="range range-xs-center">
              <div class="cell-md-8">
                <div class="range range-xs-center">
                 <?php
                    if(isset($_POST['formsubmit'])){
                      $aid = $_POST['location'];
                      $q3 = "SELECT * FROM service_store_details_table WHERE area_id='$aid'";
                      $res3 = mysqli_query($con, $q3);
                      $cnt = mysqli_num_rows($res3);
                      if ($cnt==0) {
                        echo "<h3><b>Sorry for the inconvenience but currently we don't offer any services in this location. Please try selecting any other location.</b></h3>";
                      }
                      else{
                        while($row3 = mysqli_fetch_array($res3)){
                          // $lid = $row3['l_id'];
                          $snum = $row3['store_contact_no'];
                          $saddress = $row3['store_full_address'];
                          $smname=$row3['store_manager_name'];
                          $q1 = "SELECT * FROM vehicle_service_detail";
                          $res1 = mysqli_query($con, $q1);
                          while($row1 = mysqli_fetch_array($res1)){
                              $sid = $row1['service_id'];
                              $sname = $row1['service_name'];
                              $sdesc = $row1['service_description'];
                              $sprice = $row1['service_price'];
                  ?>
                  <div class="cell-xs-10 cell-sm-6 offset-top-30">
                    <!-- Box Member Type 2-->
                    <article class="post post-masonry" style="border: 1px solid #c2c2c2;">
                  <section class="post-content text-left">
                    <ul class="list list-inline list-inline-dots list-inline-8 list-inline-0 text-gray">
                      <li class="offset-top-0"><span class="inset-left-0">
                        <!-- <?php //echo $stype;?></span></li> -->
                    </ul>
                    <!-- Post Title-->
                    <div class="post-title offset-top-20">
                      <h6 class="text-bold text-primary"><?php echo $sname; ?></h6>
                    </div>
                    <!-- Post Body-->
                    <div class="post-body offset-top-10">
                      <p class="text-justify"><?php echo $sdesc; ?></p>
                      <h5 class="text-bold text-primary"><?php echo 'Rs. '.$sprice; ?></h5>
                      <p><?php echo 'Store Manager Name : '.$smname; ?></p>
                      <p><?php echo 'Contact Number: +91'.$snum; ?></p>
                      <p><?php echo 'Address: '.$saddress; ?></p>
                      <div class="offset-top-20">
                        <div class="offset-top-20"><a href="bookservices.php?sid=<?php echo $sid;?>&aid=<?php echo $aid;?>" class="btn btn-primary">Book Now</a></div>
                      </div>
                    </div>
                  </section>
                </article>
                  </div>
                <?php 
                      }
                    }
                  }
                }
                else{
                    echo "<h3><b>Please Select a location to find your nearby available services!!</b></h3>";
                }
                ?>
                </div>
              </div>
              <div class="cell-md-4 offset-top-60 offset-md-top-30">
                <div class="inset-md-left-30">
                  <!-- Panel-->
                  <div class="panel panel-xl panel-vertical panel-sm-resize panel-md-resize section-bottom-40 bg-gray-darker context-dark text-lg-left">
                    <h5 class="text-bold"><span class="big"><span class="big"><span class="big">Find Stores Near By</span></span></span></h5>
                    <form class="offset-top-25" method="post">
                      <div class="group group-top">
                        <div class="group-item element-fullwidth">
                          <div class="form-group text-left">
                            <label for="discount-options" class="form-label form-label-outside">Select Store Location *
                            </label>
                            <div class="select2-whitout-border shadow-drop-md" style="content: none;">
                              <select name="location" id="location" data-minimum-results-for-search="Infinity" class="form-control " required>
                                <option value="0" selected disabled>Select Location</option>
                                <?php
                                    $q1 = "SELECT * FROM service_store_details_table";
                                    $res1 = mysqli_query($con, $q1);
                                    while($row1 = mysqli_fetch_array($res1)){
                                        $aid = $row1['area_id'];
                                        $aloc = $row1['area_location'];
                                        echo "<option value='$aid'>$aloc</option>";
                                    }
                                ?>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="group-item element-fullwidth offset-top-6 offset-md-top-0 offset-lg-top-6" id="hidediv">
                          <div class="form-group text-left">
                            <label for="discount-options" class="form-label form-label-outside">Bike Type</label>
                            <div class="select2-whitout-border shadow-drop-md">
                              <select id="discount-options" name="discount-options" data-minimum-results-for-search="Infinity" class="form-control">
                                <option value="1"></option>
                                <option value="2"></option>
                                <option value="3"></option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="group-item reveal-block reveal-md-inline-block text-center text-md-left offset-top-15">
                          <button type="submit" name="formsubmit" class="btn btn-primary shadow-drop-md">Search</button>
                        </div>
                        <div class="offset-bottom-30"></div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>

<?php
    include "footer.php";
?>

<script type="text/javascript">
  $(document).ready(function(){
    $('#hidediv').hide();
  });
</script>