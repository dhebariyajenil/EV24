<?php
  include "header.php";
?>
      <section class="section-height-800 breadcrumb-modern rd-parallax context-dark bg-gray-darkest text-lg-left">
          <div data-speed="0.2" data-type="media" data-url="images/backgrounds/background-01-1920x900.jpg" class="rd-parallax-layer"></div>
          <div data-speed="0" data-type="html" class="rd-parallax-layer">
            <div class="shell section-top-57 section-bottom-30 section-md-top-125 section-lg-top-200">
              <div class="veil reveal-md-block">
                <h1 class="text-bold">About Us</h1>
              </div>
              <ul class="list-inline list-inline-icon list-inline-icon-type-1 list-inline-icon-extra-small list-inline-icon-white p offset-top-30 offset-md-top-40 offset-lg-top-125">
                <li><a href="index.php" class="text-white">Home</a></li>
                <li>About Us
                </li>
              </ul>
            </div>
          </div>
        </section>
      </header>
      <!-- Page Contents-->
      <main class="page-content bg-white">
        <!-- A Few Words About Us-->
        <section class="section-90 section-md-111 text-left">
          <div class="shell">
            <div class="range range-xs-center">
              <div class="cell-sm-8 cell-md-6">
                <div class="inset-lg-right-20">
                  <h2 class="text-bold text-center text-md-left">A Few Words About Us</h2>
                  <hr class="divider hr-md-left-0 bg-gray-darker">
                  <div class="offset-top-30 offset-md-top-60 text-justify">
                    <p>In order to climate change and increase price of fuel in current days, Demand of E-bikes and E-vehicles are increasing day by day. It also helps to reduce the pollution level. Considering this in mind we are planning to develop a portal for e-vehicles that includes sell of e-bikes, services and other required things. It allows user to find e bike, book and purchase. This will be a dedicated portal for e-vehicles. Here user can login and find required e-vehicle. It also allows user to book services like change of spare parts, service or cleaning. In upcoming days use of electric vehicle will increase and requirement of such portal is must.</p>
                  </div>
                </div>
              </div>
              <div class="cell-sm-8 cell-md-6 offset-top-40 offset-md-top-0">
                  <img src="images/blog/2.jpg" />
              </div>
            </div>
          </div>
        </section>
        <!-- Testimonials-->
        <section class="section-top-90 section-bottom-90 section-md-top-111 section-md-bottom-100">
          <div class="shell">
            <h2 class="text-bold text-center">Testimonials</h2>
            <hr class="divider bg-primary">
            <div class="range range-xs-center offset-top-30">
              <div class="cell-sm-8 cell-md-12">
                <!-- Owl Carousel-->
                <div data-items="1" data-md-items="3" data-loop="false" data-stage-padding="5" data-margin="60" data-nav="false" data-dots="true" class="owl-carousel owl-carousel-classic owl-dots-60">
                  <?php
                      $q1 = "SELECT * FROM feedback";
                      $res1 = mysqli_query($con, $q1);
                      while($row1 = mysqli_fetch_array($res1)){
                          $lid = $row1['l_id'];
                          $comment = $row1['comment'];

                          $q2 = "SELECT * FROM login_table WHERE l_id='$lid'";
                          $res2 = mysqli_query($con, $q2);
                          $row2 = mysqli_fetch_array($res2);
                          $dp = $row2['dp'];

                          $q3 = "SELECT * FROM detail_table WHERE l_id='$lid'";
                          $res3 = mysqli_query($con, $q3);
                          $row3 = mysqli_fetch_array($res3);
                          $name = $row3['name'];
                  ?>
                  <div class="owl-item">
                    <!-- Classic Blockquote-->
                    <blockquote class="quote quote-classic offset-top-25">
                      <!-- Media-->
                      <div class="media">
                        <div class="media-left"><span class="icon icon-xs fa fa-quote-left text-primary"></span></div>
                        <div class="media-body">
                          <p class="h6 text-italic">
                            <q><?php echo $comment;?></q>
                          </p>
                          <div class="offset-top-10">
                            <div class="unit unit-middle unit-horizontal unit-spacing-xs">
                              <div class="unit-left"><img src="./userphotos/<?php echo $dp;?>" width="40" height="40" alt="" class="img-circle img-responsive center-block"></div>
                              <div class="unit-body">
                                <p class="quote-author"><?php echo $name;?></p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </blockquote>
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