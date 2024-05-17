<?php
    include "header.php";
?>
        <section class="section-height-800 breadcrumb-modern rd-parallax context-dark bg-gray-darkest text-lg-left">
          <div data-speed="0.2" data-type="media" data-url="images/backgrounds/background-01-1920x900.jpg" class="rd-parallax-layer"></div>
          <div data-speed="0" data-type="html" class="rd-parallax-layer">
            <div class="shell section-top-57 section-bottom-30 section-md-top-125 section-lg-top-200">
              <div class="veil reveal-md-block">
                <h1 class="text-bold">Feedback</h1>
              </div>
              <ul class="list-inline list-inline-icon list-inline-icon-type-1 list-inline-icon-extra-small list-inline-icon-white p offset-top-30 offset-md-top-40 offset-lg-top-125">
                <li><a href="index.php" class="text-white">Home</a></li>
                <li>Feedback
                </li>
              </ul>
            </div>
          </div>
        </section>
      </header>
      <!-- Page Contents-->
      <main class="page-content bg-white">
        <!-- Get in touch-->
        <section class="section-90 section-md-111 text-left">
          <div class="shell">
            <div class="range range-xs-center">
              <div class="cell-xs-10 cell-md-8">
                <div class="inset-lg-right-40">
                  <!-- <h2 class="text-bold text-center text-md-left">Feedback</h2>
                  <hr class="divider hr-sm-left-0 bg-gray-darker"> -->
                  <div class="">
                    <!-- RD Mailform-->
                    <form method="post" action="addfeedback.php" class="text-left">
                    <div class="star-rating">
                        <div class="star-input">
                          <input type="radio" name="rating" id="rating-5" value="5" required>
                          <label for="rating-5" class="fas fa-star"></label>
                          <input type="radio" name="rating" id="rating-4" value="4">
                          <label for="rating-4" class="fas fa-star"></label>
                          <input type="radio" name="rating" id="rating-3" value="3">
                          <label for="rating-3" class="fas fa-star"></label>
                          <input type="radio" name="rating" id="rating-2" value="2">
                          <label for="rating-2" class="fas fa-star"></label>
                          <input type="radio" name="rating" id="rating-1" value="1">
                          <label for="rating-1" class="fas fa-star"></label>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="contacts-message" class="text-dark">Comment *</label>
                        <textarea id="contacts-message" name="comment" data-constraints="@Required" style="max-height: 150px;" class="form-control" required></textarea>
                      </div>
                      <?php 
                          if(isset($_SESSION['uemail'])){
                      ?>
                          <div class="offset-top-18 offset-sm-top-30 text-center text-sm-left">
                            <button type="submit" name="formsubmit" class="btn btn-primary">Give Feedback</button>
                          </div>
                      <?php
                          }else{
                      ?>
                          <div class="offset-top-18 offset-sm-top-30 text-center text-sm-left">
                            <button type="submit" name="formsubmit" class="btn btn-primary" disabled>Give Feedback</button>
                          </div>
                      <?php
                          }
                      ?>
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