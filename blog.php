<?php
include 'header.php';
?>
  <section class="big-title">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h2>Blogs</h2>
      </div>
    </div>
  </div>
</section>
<!-- /.big-title -->

  <div class="container">
    <div class="row">
      <div class="col-sm-8 col-md-9">
        <div class="post-grid-layout">

 <!-- <div class="post post-full-item">
    <div class="post-thumb">
      <a class="attachment-post-thumb" href="blog-single.php"><img src="images/post/post08-800x500.jpg" alt=""></a>
      <div class="entry-meta">
        <span class="posted-on">
          <i class="fa fa-clock-o"></i>
          <a href="blog-single.php">December 6, 2015</a>
        </span>
        <span class="categories-links">
          <i class="fa fa-folder-open-o"></i>
          <a href="blog-single.php">Aging in Place Remodel</a>
        </span>
        <span class="comment-counts">
          <i class="fa fa-comments"></i>
          0
        </span>
      </div>
    </div>
    <div class="entry-header">
      <h2 class="entry-title">
        <a href="blog-single.php">Choosing which roofing matering to use for your home</a>
      </h2>
    </div>
    <div class="entry-content">
      <p>Uniquely architect user friendly strategic theme areas and scalable e-services. Monotonectally matrix resource sucking materials through clicks-and-mortar catalysts for change.</p>
      <a href="blog-single.php" class="read-more">read more<i class="fa fa-angle-double-right"></i></a>
    </div>
  </div>-->
  <!-- /.post-full-item -->

  <div class="row">
<?php
$query = "select * from `blog`";
$gallery= $connect->query($query);
while($data = mysqli_fetch_array($gallery)){

  ?>
    <div class="post post-grid-item col-sm-6">
      <div class="post-thumb">
        <a class="attachment-post-thumb" href="#"><img src="data:image/jpeg;base64,<?php echo base64_encode($data['image'])?>" alt=""></a>
        <div class="entry-meta">
          <span class="posted-on">
            <i class="fa fa-clock-o"></i>
            <a href="#"><?php echo $data['date']?></a>
          </span>
        </div>
      </div>
      <div class="entry-header">
        <h2 class="entry-title">
          <a href="#"><?php echo $data['category']?></a>
        </h2>
      </div>
      <div class="entry-content">
        <?php echo $data['title']?><br/>

        <a href="blog-single.php?id=<?php echo $data['id']?>" class="read-more">read more<i class="fa fa-angle-double-right"></i></a>
      </div>
    </div>
  <?php } ?>
    <!-- /.post-grid-item -->
    </div>

</div>
<!-- /.post-grid-layout -->
  </div>
      <div class="col-sm-4 col-md-3">
        <!-- Recent Posts -->


<!-- Tag Cloud -->
<!--<aside class="sidebar widget">
  <h3 class="widget-title">Tags</h3>
  <div class="tagcloud">
    <a href="blog-single.php">bathroom</a>
    <a href="blog-single.php">door</a>
    <a href="blog-single.php">handyman</a>
    <a href="blog-single.php">home</a>
    <a href="blog-single.php">laundry</a>
    <a href="blog-single.php">painting</a>
    <a href="blog-single.php">plumbing</a>
    <a href="blog-single.php">roofing</a>
    <a href="blog-single.php">room</a>
    <a href="blog-single.php">shower</a>
  </div>
</aside>-->

      </div>
    </div>
  </div>



<?php
include 'footer.php';
?>