<?php
include 'header.php';
?>

<!--<section class="big-title">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h2>electrical</h2>
      </div>
    </div>
  </div>
</section>-->
<!-- /.big-title -->
<br/><br/><br/>
<?php
$name = $_GET['name'];
$query = "select * from `servicecateg` WHERE name = '$name'";
$gallery= $connect->query($query);
while($data = mysqli_fetch_array($gallery)){
  ?>

<div class="container">
  <div class="row service-detail_heading">
    <div class="col-xs-12 text-center">
      <h2 class="heading-title"><?php echo $data['name']?></h2>
    </div>
  </div><br/><br/>
  <!-- /.service-detail_heading -->

  <div class="row service-detail_content">
    <div class="col-sm-6">
      <img class="service-detail_img" src="data:image/jpeg;base64,<?php echo base64_encode($data['image'])?>" alt="">
    </div>
    <div class="col-sm-6">
      <?php echo $data['description']?>
    </div>
  </div>
  <!-- /.service-detail_content -->
</div>
  <?php }?>

<?php
include 'footer.php';
?>