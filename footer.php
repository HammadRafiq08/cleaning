<?php
$query = "select * from `company`";
$gallery= $connect->query($query);
while($data = mysqli_fetch_array($gallery)){
  ?>
<footer class="footer">
  <div class="container">
    <div class="row">

      <div class="col-md-4">
        <div class="footer-about">
          <p><a href="index.php"><img src="data:image/jpeg;base64,<?php echo base64_encode($data['logo'])?>" style="max-width: 75%" alt="renovation-logo"></a></p>
          <p>We are a South Australia based , home cleaning company that provides the highest quality cleaning services to all Melbourne suburbs.
            Our cleaning services are environmentally friendly and simple to use with a huge focus on customer service and satisfaction.
            We only send experienced, Professional cleaners who are rewarded fairly for putting a smile on your face, so either give us a call on 1300 EKO 000,
            or book a home or office clean through our booking page.
            Our focus is to go above and beyond with our cleaning service and we are confident we will exceed your expectations.</p>
          </div>
      </div>

      <div class="col-md-4">
        <div class="footer-infomation">
          <h3 class="widget-tittle">infomation</h3>
          <ul class="menu-infomation">
            <li><a href="#">Blog</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">About Us</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-4">
        <div class="footer-info">
          <h3 class="widget-tittle">office</h3>
          <ul>
            <li><i class="fa fa-map-marker"></i><?php echo $data['address']?></li>
            <li><i class="fa fa-phone"></i><?php echo $data['number']?></li>
            <li><i class="fa fa-envelope"></i><?php echo $data['email']?></li>
            <li><i class="fa fa-mobile"></i><?php echo $data['mobile']?></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="social-menu social-menu_right-arrow">
    <ul class="menu">
      <li class="menu-item"><a href="<?php echo $data['facebook']?>">facebook</a></li>
      <li class="menu-item"><a href="<?php echo $data['twitter']?>">twitter</a></li>
      <li class="menu-item"><a href="<?php echo $data['instagram']?>">google+</a></li>
    </ul>
  </div>
</footer>
<!-- /.footer -->
<?php } ?>
<div class="copyright">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        Copy Right : <i class="fa fa-copyright"></i>&nbsp; All rights are reserved by &nbsp;<a href="http://www.bluehat-techno.com/" target="_blank"><i class="fa fa-graduation-cap"></i>&nbsp;Bluehat - Techno</a>
      </div>
    </div>
  </div>
</div>
<!-- /.copyright -->


  </div>
	<!-- Map-About us -->
	<script src="https://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>

    <script src="components/jquery/jquery.js"></script>
    <script src="components/bootstrap/js/bootstrap.js"></script>
    <script src="components/owl.carousel/owl.carousel.js"></script>
    <script src="components/parallax.js/parallax.js"></script>
  	<script src="components/scrollup/jquery.scrollUp.js"></script>
  	<script src="components/lightgallery/js/lightgallery.js"></script>

    <!-- Mobile Menu -->
    <script src="components/mmenu/jquery.mmenu.min.all.js"></script>

    <!-- REVOLUTION JS FILES -->
    <script src="components/slider/jquery.themepunch.tools.min.js"></script>
    <script src="components/slider/jquery.themepunch.revolution.min.js"></script>

    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS -->
    <script src="components/slider/extensions/revolution.extension.actions.min.js"></script>
    <script src="components/slider/extensions/revolution.extension.carousel.min.js"></script>
    <script src="components/slider/extensions/revolution.extension.kenburn.min.js"></script>
    <script src="components/slider/extensions/revolution.extension.layeranimation.min.js"></script>
    <script src="components/slider/extensions/revolution.extension.migration.min.js"></script>
    <script src="components/slider/extensions/revolution.extension.navigation.min.js"></script>
    <script src="components/slider/extensions/revolution.extension.parallax.min.js"></script>
    <script src="components/slider/extensions/revolution.extension.slideanims.min.js"></script>
    <script src="components/slider/extensions/revolution.extension.video.min.js"></script>

    <!-- ISOTOPE -->
    <script src="components/isotope.pkgd.min.js"></script>

    <!-- HOVER ISOTOPE -->
    <script src="components/jquery.directional-hover.min.js"></script>

    <!-- Image loaded ISOTOPE -->
    <script src="components/imagesloaded.pkgd.min.js"></script>

    <script src="js/main.js"></script>
  </body>

<!-- Mirrored from renovation.themesun.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Jul 2019 23:53:39 GMT -->
</html>
