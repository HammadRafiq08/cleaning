<?php
include 'header.php';
?>

<section class="big-title">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h2>FAQ</h2>
      </div>
    </div>
  </div>
</section>
<!-- /.big-title -->


<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <p><i class="fa fa-pencil"></i>&nbsp;&nbsp; Having questions that not on the list? <a href="contact.php">Send us a message!</a></p>

      <!-- Accordion -->
      <div class="panel-group accordion-rn" id="accordion-faq" role="tablist" aria-multiselectable="true">
<?php
$query = "select * from `faq`";
$gallery= $connect->query($query);
while($data = mysqli_fetch_array($gallery)){
  ?>
        <div class="panel">
          <div class="panel-heading" role="tab" id="<?php echo $data['faqID']?>">
            <h4 class="panel-title">
              <a role="button" data-toggle="collapse" data-parent="#accordion-faq" href="#<?php echo $data['collapseID']?>" aria-expanded="true" aria-controls="<?php echo $data['collapseID']?>">
                <?php echo $data['question']?>
              </a>
            </h4>
          </div>
          <div id="<?php echo $data['collapseID']?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="faq-headingOne">
            <div class="panel-body">
              <?php echo $data['answer']?>
            </div>
          </div>
        </div>
<?php } ?>
      </div>
      <!-- /#accordion-faq -->

    </div>
  </div>
</div>

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