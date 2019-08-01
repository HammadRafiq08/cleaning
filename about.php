<?php
include 'header.php';
?>

<section class="about-big-title text-center" data-parallax="scroll" data-image-src="images/page-home/about_page_title_bg.jpg">
  <h2>We Provide Professional Services</h2>
  <p>TOTALLY AFFORADBLE AND EFFICIENT</p>
</section>
<!-- /.about-big-title -->

<div class="container">
  <div class="row about-slogan text-center">
    <div class="col-xs-12">
      <h3>“Getting the job done wherever, however, no matter how big or small.”</h3>
      <p>To set new standards of ethics and excellence in delivering to our customers superior quality and value-for-money residential and commercial spaces by employing a team of highly motivated and focused professionals.</p>
    </div>
  </div>
  <!-- /.about-slogan -->
<?php
$query = "select * from `about`";
$gallery= $connect->query($query);
while($data = mysqli_fetch_array($gallery)){

  ?>
  <div class="row home-maintenance">
    <div class="col-md-6">
      <h3><?php echo $data['heading']?></h3>
      <?php echo $data['description']?>
       </div>
    <div class="col-md-6">
      <img src="data:image/jpeg;base64,<?php echo base64_encode($data['image'])?>" alt="image">
    </div>
  </div>
  <?php } ?>
  <!-- /.home-maintenance -->
</div>

<section class="feature-style-2" data-parallax="scroll" data-image-src="images/page-home/feature_style2_bg.jpg">
  <div class="container">
    <div class="row">
      <div class="col-sm-4">
        <div class="feature-item">
          <div class="feature-item_icon">
            <i class="pe-7s-drawer"></i>
          </div>
          <h3 class="feature-item_title">
            Professional HandyMan
          </h3>
          <p class="feature-item_description">
            From room assessment to reviewing attic space and cleaning to give you a confortable life.
          </p>
        </div>
      </div>

      <div class="col-sm-4">
        <div class="feature-item feature-item_clock">
          <div class="feature-item_icon">
            <i class="pe-7s-clock"></i>
          </div>
          <h3 class="feature-item_title">
            24/7 Services
          </h3>
          <p class="feature-item_description">
            If you are in emergency situation, please do not worry. We provide 24/7 service. Whenever you call, we service you.
          </p>
        </div>
      </div>

      <div class="col-sm-4">
        <div class="feature-item feature-item_price">
          <div class="feature-item_icon">
            <i class="pe-7s-cash"></i>
          </div>
          <h3 class="feature-item_title">
            Affordable Price
          </h3>
          <p class="feature-item_description">
            We do more than a handyman service- we check for glitches that need attention to keep you safe and save your money.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /.feature-style-2 -->

<section class="our-team our-team_style-1">
  <div class="text-center">
    <h2 class="heading-title">our team</h2>
   <!-- <p class="our-team_description">We have high quality handmen who are equiped with the latest tools.</p>-->
  </div>

  <div class="container">
    <div class="row">
<?php
$query = "select * from `team`";
$gallery= $connect->query($query);
while($data = mysqli_fetch_array($gallery)){

  ?>
      <div class="col-sm-6 our-team_item">
        <div class="our-team_item-img">
          <img src="data:image/jpeg;base64,<?php echo base64_encode($data['image'])?>" alt="team">
        </div>
        <div class="our-team_item-content">
          <h4 class="our-team_item-content-name">
            <?php echo $data['name']?>
          </h4>
          <p><strong><?php echo $data['title']?></strong></p>
          <?php echo $data['description']?>
          <ul>
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
          </ul>
        </div>
      </div>
  <?php }?>
<!--
      <div class="col-sm-6 our-team_item">
        <div class="our-team_item-img">
          <img src="images/page-home/team02-150x150.jpg" alt="team">
        </div>
        <div class="our-team_item-content">
          <h4 class="our-team_item-content-name">
            David Villar
          </h4>
          <p><strong>David Villar</strong></p>
          <p>James displayed a professional and trusting manner. His performance on the job was excellent. His major is heating and electricity.</p>
          <ul>
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
          </ul>
        </div>
      </div>

      <div class="col-sm-6 our-team_item">
        <div class="our-team_item-img">
          <img src="images/page-home/team03-150x150.jpg" alt="team">
        </div>
        <div class="our-team_item-content">
          <h4 class="our-team_item-content-name">
            Arlo Reilly
          </h4>
          <p><strong>Painting</strong></p>
          <p>James displayed a professional and trusting manner. His performance on the job was excellent. His major is heating and electricity.</p>
          <ul>
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
          </ul>
        </div>
      </div>

      <div class="col-sm-6 our-team_item">
        <div class="our-team_item-img">
          <img src="images/page-home/team04-150x150.jpg" alt="team">
        </div>
        <div class="our-team_item-content">
          <h4 class="our-team_item-content-name">
            Crawford Kerry
          </h4>
          <p><strong>Carpentry</strong></p>
          <p>James displayed a professional and trusting manner. His performance on the job was excellent. His major is heating and electricity.</p>
          <ul>
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
          </ul>
        </div>
      </div>

      <div class="col-sm-6 our-team_item">
        <div class="our-team_item-img">
          <img src="images/page-home/team05-150x150.jpg" alt="team">
        </div>
        <div class="our-team_item-content">
          <h4 class="our-team_item-content-name">
            Jem Ernie
          </h4>
          <p><strong>Heating, Electricity</strong></p>
          <p>James displayed a professional and trusting manner. His performance on the job was excellent. His major is heating and electricity.</p>
          <ul>
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
          </ul>
        </div>
      </div>

      <div class="col-sm-6 our-team_item">
        <div class="our-team_item-img">
          <img src="images/page-home/team07-150x150.jpg" alt="team">
        </div>
        <div class="our-team_item-content">
          <h4 class="our-team_item-content-name">
            Mort Bernie
          </h4>
          <p><strong>Remodeling</strong></p>
          <p>James displayed a professional and trusting manner. His performance on the job was excellent. His major is heating and electricity.</p>
          <ul>
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
          </ul>
        </div>
      </div>-->
    </div>
  </div>
</section>
<!-- /.our-team -->

<!--<section class="piece-of-us">
  <div class="container">
    <div class="row row-xs-center">
      <div class="col-md-1">
        <div class="piece-of-us_icon">
          <i class="fa fa-users"></i>
        </div>
      </div>
      <div class="col-md-8">

        <h2>Want to be a piece of us?</h2>
        <p>We give a chance for people to work in the professional environment with challenges and values. Come with us!</p>
      </div>
      <div class="col-md-3">
        <a href="#" class="btn">purchase this theme</a>
      </div>
    </div>
  </div>
</section>-->
<!-- /.piece-of-us -->




<?php
include 'footer.php';
?>