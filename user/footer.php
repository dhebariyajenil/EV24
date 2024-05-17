<!-- Page Footer-->
<!-- Footer Minimal Light-->
<footer class="page-footer context-dark">
  <section class="section-60">
    <div class="shell">
      <div class="range range-xs-center text-md-left">
        <div class="cell-xs-10 cell-sm-7 cell-md-8">
          <!-- Footer brand-->
          <div class="footer-brand"><a href="index.html">EV-24</a></div>
          <div class="offset-top-30 inset-sm-right-20">
            <p class="text-white">In order to climate change and increase price of fuel in current days, Demand of
              E-bikes and E-vehicles are increasing day by day. It also helps to reduce the pollution level. Considering
              this in mind we are planning to develop a portal for e-vehicles that includes sell of e-bikes, services
              and other required things. It allows user to find e bike, book and purchase. This will be a dedicated
              portal for e-vehicles. Here user can login and find required e-vehicle. It also allows user to book
              services like change of spare parts, service or cleaning. In upcoming days use of electric vehicle will
              increase and requirement of such portal is must.</p>
          </div>
        </div>
        <div class="cell-xs-10 cell-sm-7 cell-md-4 offset-top-60 offset-md-top-0">
          <div>
            <h5 class="text-bold">Contacts</h5>
          </div>
          <div class="offset-top-6">
            <div class="text-subline"></div>
          </div>
          <div class="offset-top-20">
            <!-- Contact Info-->
            <address class="contact-info text-left">
              <div>
                <div class="reveal-inline-block"><a href="callto:#"
                    class="unit unit-middle unit-horizontal unit-spacing-xs"><span class="unit-left"><span
                        class="icon icon-xxs icon-primary icon-primary-filled icon-circle mdi mdi-phone fa-phone"></span></span><span
                      class="unit-body"><span class="text-white">
                        +91 9898989898 </span></span></a></div>
              </div>
              <div class="offset-top-10">
                <div class="reveal-inline-block"><a href="mailto:#"
                    class="unit unit-middle unit-horizontal unit-spacing-xs"><span class="unit-left"><span
                        class="icon icon-xxs icon-primary icon-primary-filled icon-circle mdi mdi-email-outline fa-envelope-open-text"></span></span><span
                      class="unit-body"><span class="text-white">evehicle@gmail.com</span></span></a></div>
              </div>
              <div class="offset-top-10">
                <div class="reveal-inline-block"><a href="#" class="unit unit-horizontal unit-spacing-xs"><span
                      class="unit-left"><span
                        class="icon icon-xxs icon-primary icon-primary-filled icon-circle mdi mdi-map-marker fa-map-marker-alt"></span></span><span
                      class="unit-body"><span class="text-white">Navrangpura,<br> Ahmedabad
                        380009</span></span></a></div>
              </div>
            </address>
          </div>
          <div class="offset-top-20">
            <!-- List Inline-->
            <ul class="list-inline list-inline-2">
              <li><a href="#" class="icon icon-xxs icon-transparent-white-filled icon-circle fa fa-facebook"></a></li>
              <li><a href="#" class="icon icon-xxs icon-transparent-white-filled icon-circle fa fa-twitter"></a></li>
              <!-- <li><a href="#" class="icon icon-xxs icon-transparent-white-filled icon-circle fa fa-google-plus"></a> -->
              </li>
              <li><a href="#" class="icon icon-xxs icon-transparent-white-filled icon-circle fa fa-instagram"></a></li>
              <!-- <li><a href="#" class="icon icon-xxs icon-transparent-white-filled icon-circle fa fa-rss"></a></li> -->
            </ul>
          </div>
        </div>

        </form>
      </div>
    </div>
    </div>
    </div>
  </section>
  <section class="section-12 text-md-center">
    <div class="shell">
      <p class="font-accent"><span class="small text-silver-dark">&copy; <span id="copyright-year"></span> All Rights
          Reserved Terms of Use and <a href="privacy.html">Privacy Policy</a></span>
      </p>
    </div>
  </section>
</footer>
</div>

<!-- Java script-->
<script src="js/core.min.js"></script>
<script src="js/script.js"></script>
<script src="js/responsive.js"></script>
<noscript>
  <iframe src="//www.googletagmanager.com/ns.html?id=GTM-P9FT69" height="0" width="0"
    style="display:none;visibility:hidden"></iframe>
</noscript>
<script>(function (w, d, s, l, i) { w[l] = w[l] || []; w[l].push({ 'gtm.start': new Date().getTime(), event: 'gtm.js' }); var f = d.getElementsByTagName(s)[0], j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src = '//www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f); })(window, document, 'script', 'dataLayer', 'GTM-P9FT69');
</script>


<script type="text/javascript">

  var path = window.location.pathname;
  var page = path.split("/").pop();

  //alert(page);

  str = page.slice(0, -4);
  //alert(str);

  $(".rd-navbar-nav li").removeClass("active");

  if (str == "") {
    //alert("null");
    $("#index").addClass("active");
  }
  else {
    //alert(str);

    if (str == "services" || str == "manageservices" || str == "bookservices") {
      $("#services").addClass("active");
    }
    else if (str == "vehicles" || str == "managevehicles" || str == "bookvehicles") {
      $("#vehicles").addClass("active");
    }
    else if (str == "editprofile" || str == "changepass" || str == "forgotpass" || str == "loginregister") {
      $("#editprofile").addClass("active");
    }
    else {
      $("#" + str).addClass("active");
    }

  }
</script>
<a href="#" id="ui-to-top"
  class="ui-to-top icon icon-xs icon-circle icon-darker-filled mdi mdi-chevron-up fa-arrow-up"></a>

</body>

</html>