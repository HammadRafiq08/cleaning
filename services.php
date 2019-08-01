<?php
include 'header.php';
?>

<section class="big-title">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h2>our services</h2>
      </div>
    </div>
  </div>
</section>
<!-- /.big-title -->


<div class="container">
  <div class="provide-services row row-xs-center">
    <div class="col-sm-3">
      <img class="provide-services_img" src="images/page-home/Maid-Service-In-Santa-Barbara.png" alt="">
    </div>

    <div class="col-sm-9">
      <h2 class="provide-services_title">We Provide Professional Services</h2>
      <p class="provide-services_description">Every home owner has a list of handyman, home repair, or home improvement projects he or she needs done both interior and exterior. Sometimes that list can get quite long, too! The bathrooms that needs updating.</p>
    </div>
  </div>
</div>
<!-- /.provide-services -->

<section class="services services-style-01">
  <h2 class="hidden">Services</h2>
  <div class="service-content">
    <div class="container">
      <div class="row">
<?php
$query = "select * from `servicecateg`";
$gallery= $connect->query($query);
while($data = mysqli_fetch_array($gallery)){

  ?>
        <div class="col-sm-6 col-md-4">
          <div class="service-item">
            <div class="service-item_img">
              <img src="data:image/jpeg;base64,<?php echo base64_encode($data['image'])?>" alt="service-renovation">
            </div>
            <a class="service-item_link" href="#">
              <!--<div class="service-item_icon"><i class="rn-renovation"></i></div>-->
              <?php echo $data['name']?>
            </a>
          </div>
        </div>
<?php } ?>
      </div>
    </div>
  </div>
</section>
<!-- /.services-style-01 -->

<section class="piece-of-us">
  <div class="container">
    <div class="row row-xs-center">
      <div class="col-md-1">
        <div class="piece-of-us_icon">
          <i class="fa fa-users"></i>
        </div>
      </div>
      <div class="col-md-8">

        <h2>Want to be a part of us?</h2>
        <p>We give a chance for people to work in the professional environment with challenges and values. Come with us!</p>

      </div>
      <div class="col-md">
        <a href="#" class="btn" style="width: 200px">Join Us</a>
      </div>
    </div>
  </div>
</section>
<!-- /.piece-of-us -->


<?php
include 'footer.php';
?>