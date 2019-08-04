<?php include'admin/dbconnect.php'?>


<!Doctype html>
<html lang="" class="page-home01">
  
<!-- Mirrored from renovation.themesun.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Jul 2019 23:52:56 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cleaning Service</title>

    <link rel="icon" type="image/png" href="images/page-home/logo.png">

    <!-- Icon font 7 Stroke -->
    <link rel="stylesheet" href="fonts/icon-7/css/pe-icon-7-stroke.css">
    <link rel="stylesheet" href="fonts/icon-7/css/helper.css">

    <!-- Icon font Renovation -->
    <link rel="stylesheet" href="fonts/renovation/icon-font-renovation.css">

    <!-- Google font -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lato:400,400italic,700,700italic' rel='stylesheet' type='text/css'>

    <!-- Menu Mobile: mmenu -->
    <link type="text/css" rel="stylesheet" href="components/mmenu/jquery.mmenu.all.css" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="components/font-awesome/css/font-awesome.css" />

    <!-- Owl Carousel -->
    <link rel="stylesheet" href="components/owl.carousel/assets/owl.carousel.css" />

    <!-- Light Gallery -->
    <link rel="stylesheet" href="components/lightgallery/css/lightgallery.css" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="components/bootstrap/css/bootstrap.css" />

    <!-- REVOLUTION STYLE SHEETS -->
    <link rel="stylesheet" type="text/css" href="components/slider/slider.css">

    <!-- THEME STYLE -->
    <link rel="stylesheet" href="css/main.css">

  </head>
  <body>
  <div class="site">
    
<div class="site-top style-01">
  <div class="container">
    <div class="row row-sm-center">

      <div class="col-sm-5 col-md-6">
        <div class="site-top-left text-xs-center text-sm-left">
          <a href="#">Your Trusted 24 Hours Cleaning Service Provider!</a>
        </div>
      </div>

      <div class="col-sm-7 col-md-6">
        <div class="site-top-right text-xs-center text-sm-right">
          <!--<nav id="top-right-menu">
            <ul class="menu">
              <li class="menu-item"><a href="#">Infomation</a></li>
              <li class="menu-item">
                <a href="#">Extras</a>
                <ul class="sub-menu text-left">
                  <li class="menu-item"><a href="#">FAQ</a></li>
                  <li class="menu-item"><a href="#">Site Maintenance</a></li>
                  <li class="menu-item"><a href="#">404</a></li>
                </ul>
              </li>
              <li class="menu-item"><a href="#">Alternative Pages</a></li>
            </ul>
          </nav>-->
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.site-top .style-01 -->

<header class="site-header style-01">
  <div class="container">
    <div class="row row-xs-center">
      <?php
      $query = "select * from `company`";
      $gallery= $connect->query($query);
      while($data = mysqli_fetch_array($gallery)){
      ?>
      <div class="col-xs-10 col-lg-2 site-branding">
        <a href="index.php">
          <img src="data:image/jpeg;base64,<?php echo base64_encode($data['logo'])?>" alt="Renovation">
        </a>
      </div>
<?php }?>
      <div class="col-xs-2 hidden-lg-up text-right">
        <a id="menu-button" href="#primary-menu-mobile"><i id="open-left" class="fa fa-bars"></i></a>
        <nav id="primary-menu-mobile">
          <ul>
            <li>
              <a href="index.php">Home</a>
            </li>
            <li><a href="services.php">Our Services</a>
              <ul>
                <?php
                $query = "select * from `servicecateg`";
                $gallery= $connect->query($query);
                while($data = mysqli_fetch_array($gallery)){
                ?>
                <li><a href="services-detail.php?name=<?php echo $data['name']?>"><?php echo $data['name']?></a></li>
                <?php }?>
              </ul>
            </li>
            <li class="menu-item"><a href="about.php">About us</a>
            </li>
            <li><a href="faq.php">FAQ</a></li>
            <li><a href="blog.php">Blog</a>
            </li>
            <li><a href="contact.php">Contact</a>
            </li>
          </ul>
        </nav>
      </div>
      <!-- / Menu Mobile -->
      <?php
      $query = "select * from `company`";
      $gallery= $connect->query($query);
      while($data = mysqli_fetch_array($gallery)){
      ?>
      <div class="col-xs-12 col-sm-9 col-lg-8 extra-info">
        <div class="row">
          <div class="col-sm-5">
            <i class="fa fa-phone"></i>
            <div class="phone">
              <h3><?php echo $data['number']?></h3>
              <span><?php echo $data['email']?></span>
            </div>
          </div>
          <div class="col-sm-7 col-md-6">
            <i class="fa fa-home"></i>
            <div class="address">
              <h3><?php echo $data['address']?></h3>
            </div>
          </div>
        </div>
      </div>
      <?php }?>
      <!-- /.extra-info -->

      <div class="col-xs-12 col-sm-3 col-lg-2 text-xs-center text-sm-right search-cart">
        <div class="search-box">
          <form action="#" class="search-form">
            <input type="search" placeholder="Search" class="search-field">
            <input type="submit" class="search-submit" value="search">
          </form>
          <span class="search-box-icon"><i class="fa fa-search"></i></span>
        </div>
        <!-- /.search-box -->
        <!-- .mini-cart -->
      </div>
      <!-- / .search-cart -->

    </div>
  </div>
  <?php
  $query = "select * from `company`";
  $gallery= $connect->query($query);
  while($data = mysqli_fetch_array($gallery)){
  ?>
  <div class="social-menu social-menu_right-arrow hidden-md-down">
    <ul class="menu">
      <li class="menu-item"><a href="<?php echo $data['facebook']?>">facebook</a></li>
      <li class="menu-item"><a href="<?php echo $data['twitter']?>">twitter</a></li>
      <li class="menu-item"><a href="<?php echo $data['instagram']?>">instagram</a></li>
    </ul>
  </div>
  <?php } ?>
  <!-- /.social-menu -->

</header>
<!-- /.site-header .style-01 -->

<nav id="primary-menu" class="primary-menu_style-01 hidden-md-down">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ul class="menu">
          <li class="menu-item active">
            <a href="index.php">Home</a>
          </li>
          <li class="menu-item"><a href="services.php">Our Services</a>
            <ul class="sub-menu">
              <?php
              $query = "select * from `servicecateg`";
              $gallery= $connect->query($query);
              while($data = mysqli_fetch_array($gallery)){

              ?>
              <li class="menu-item"><a href="services-detail.php?name=<?php echo $data['name']?>"><?php echo $data['name']?></a></li>
              <?php }?>
            </ul>
          </li>
          <li class="menu-item"><a href="about.php">About us</a></li>
          <li class="menu-item"><a href="faq.php">FAQ</a></li>
          <li class="menu-item"><a href="blog.php">Blog</a>
          </li>
          <li class="menu-item"><a href="contact.php">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
<!-- /.primary-menu -->
