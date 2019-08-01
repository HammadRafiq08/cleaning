<?php include 'header.php'?>


<section class="big-title">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h2>Blog</h2>
      </div>
    </div>
  </div>
</section>
<!-- /.big-title -->

<div class="container">
  <div class="row">
    <div class="col-sm-8 col-md-9">
      <div class="post-single-layout">
<?php
$id = $_GET['id'];
$query = "select * from `blog` WHERE id = '$id'";
$gallery= $connect->query($query);
while($data = mysqli_fetch_array($gallery)){

  ?>
  <div class="post post-full-item">
    <div class="post-thumb">
      <a class="attachment-post-thumb" href="#"><img src="data:image/jpeg;base64,<?php echo base64_encode($data['image'])?>" alt=""></a>
      <div class="entry-meta">
        <span class="posted-on">
          <i class="fa fa-clock-o"></i>
          <a href="#"><?php echo $data['date']?></a>
        </span>
        <span class="categories-links">
          <i class="fa fa-folder-open-o"></i>
          <a href="#">Blogs</a>
        </span>
      </div>
    </div>
    <div class="entry-header">
      <h2 class="entry-title">
        <a href="#"><?php echo $data['title']?></a>
      </h2>
    </div>
    <div class="entry-content">
      <?php echo $data['description']?><br/>
      <div class="post-share-buttons">
        <span>share</span>
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-google-plus"></i></a>
      </div>
      <!-- /.post-share-buttons -->
    </div>
  </div>
  <?php }?>
  <!-- /.post-full-item -->

</div>
<!-- /.post-single-layout -->

    </div>
  </div>
</div>

<?php include 'footer.php'?>