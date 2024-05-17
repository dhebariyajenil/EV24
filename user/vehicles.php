<?php
    include "header.php";
?>
      <section class="section-height-800 breadcrumb-modern rd-parallax context-dark bg-gray-darkest text-lg-left">
          <div data-speed="0.2" data-type="media" data-url="images/backgrounds/background-06-1920x617.jpg" class="rd-parallax-layer"></div>
          <div data-speed="0" data-type="html" class="rd-parallax-layer">
            <div class="shell section-top-57 section-bottom-30 section-md-top-125 section-lg-top-200">
              <div class="veil reveal-md-block">
                <h1 class="text-bold">Vehicles</h1>
              </div>
              <ul class="list-inline list-inline-icon list-inline-icon-type-1 list-inline-icon-extra-small list-inline-icon-white p offset-top-30 offset-md-top-40 offset-lg-top-125">
                <li><a href="index.php" class="text-white">Home</a></li>
                <li>Vehicles
                </li>
              </ul>
            </div>
          </div>
        </section>
      </header>
      <!-- Page Contents-->
      <main class="page-content bg-white">
        <!-- Pricing-->
        <section class="section-90 section-md-111">
          <div class="shell">
            <!-- <h2 class="text-bold">Choose the Type of Bike</h2>
            <hr class="divider bg-gray-darker"> -->
            <div class="range range-xs-center">
              <div class="cell-xs-10 cell-sm-6 cell-md-12">
                <div class="range">
                  <?php
                      $q1 = "SELECT * FROM vehicle_detail_table";
                      $res1 = mysqli_query($con, $q1);
                      while($row1 = mysqli_fetch_array($res1)){
                          $vid = $row1['vehicle_id'];
                          $vname = $row1['vehicle_name'];
                          $vimage = $row1['vehicle_image'];
                          $vdesc = $row1['vehicle_description'];
                          $vprice = $row1['vehicle_price'];
                  ?>
                  <div class="cell-md-4">
                    <!-- Pricing Box-->
                    <div class="pricing-box">
                      
                        <a href="bookvehicles.php?vid=<?php echo $vid;?>" class="post-media">
                        <img src="../admin/photos/vehicles/<?php echo $vimage;?>" style="width:100%;height:20vh;" alt="" class="img-responsive center-block"/>
                        </a>
                      
                      <div class="pricing-box-title offset-top-35">
                        
                        <div class="h5 text-bold"><a href="bookvehicles.php?vid=<?php echo $vid;?>"><?php echo $vname;?></a></div>
                      
                      </div>
                      <div class="offset-top-10" style="text-align: justify;">
                          <?php
                          echo $vdesc;
                          ?>
                      </div>
                      <div class="pricing-box-price offset-top-30"><span class="h4 text-bold text-gray">Rs.</span><span class="h2 text-bold text-primary"><?php echo $vprice;?></span><sup class="h4 text-bold text-gray"></sup></div>
                      <div class="pricing-box-btn offset-top-15"><a href="bookvehicles.php?vid=<?php echo $vid;?>" class="btn btn-block btn-primary">Book Now</a></div>
                    </div>
                  </div>
                  <?php
                        }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>
<?php
    include "footer.php";
?>