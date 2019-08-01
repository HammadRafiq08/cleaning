<?php include 'header.php';
$id=$_GET['id'];
  $query = "SELECT * FROM `cleaner` where id='$id'";
                           $result = mysqli_query($connect, $query);
                          while($row = mysqli_fetch_array($result))
                          {
                               if($row["monday"]=='1') {$mon='Available';} else{$mon='Not';}
             if($row["tuesday"]=='1') {$tue='Available';} else{$tue='Not';}
              if($row["wednesday"]=='1') {$wed='Available';} else{$wed='Not';}
             if($row["thursday"]=='1') {$thu='Available';} else{$thu='Not';}
              if($row["friday"]=='1') {$fri='Available';} else{$fri='Not';}
              if($row["saturday"]=='1') {$sat='Available';} else{$sat='Not';}
              if($row["sunday"]=='1') {$sun='Available';} else{$sun='Not';}
?>
<style>
    p{
        font-size:18px;
        text-align:left;
    }
    .col-md-5,.col-md-6,.col-md-1{
        padding:2% 2%;
        border:1px solid #ddd;
        margin-bottom:4%;
    }
    .col-md-1{
        background-color:#ddd;
    }
    b{
        margin-right:5px;
    }
</style>

</div>
        </div>
    </div>
    <!--#navbar-->
    <div class="container-fluid animatedParent animateOnce">
        <div class="tab-content my-3" id="v-pills-tabContent">
            <div class="tab-pane animated fadeInUpShort show active" id="v-pills-all" role="tabpanel" aria-labelledby="v-pills-all-tab">
                <div class="row my-3">
                    <div class="col-md-12">
                        <div class="card r-0 shadow">
                            <div class="table-responsive">

                            <div class="container box">
                            <div class="container" style="width:100%;">
                            <br>
                            <h2>Cleaner Detail Page</h2>
  <br><br>
</div>
    <div class="col-md-12 text-center">
     <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="200px" width="250px" class="img-thumbnail" />'?>
    </div>
    <br><br>
<div class="row">
    <div class="col-md-5">
       
     <p><b>Name:</b><?php echo $row["name"]?></p>
     <p><b>Email:</b><?php echo $row["email"]?></p>
     <p><b>Phone No:</b><?php echo $row["phone"]?></p>
     <p><b>Mobile No:</b><?php echo $row["mobile"]?></p>

    </div>
    <div class="col-md-1"></div>
    <div class="col-md-6">
      
         <p><b>Driving ID:</b><?php echo $row["driving_id"]?></p>
      <p><b>Primary ID:</b><?php echo $row["pri_id"]?></p> 
      <p><b>Secondary ID:</b><?php echo $row["sec_id"]?></p>
    </div>
    
</div>
<div class="row">
    <div class="col-md-5">
  
     <p><b>State:</b><?php echo $row["state"]?></p>
     <p><b>Suburb:</b><?php echo $row["suburb"]?></p>
     <p><b>Street Name:</b><?php echo $row["street_name"]?></p>
     <p><b>Street No:</b><?php echo $row["street_no"]?></p>
     <p><b>Block:</b><?php echo $row["address"]?></p>
     <p><b>Postal Code:</b><?php echo $row["post_code"]?></p>
  
    </div>
    <div class="col-md-1"></div>
    <div class="col-md-6">
   <p><b>Comments:</b><Br>
   <?php echo $row["comments"]?></p>
      
   
  
   
    </div>
    
</div>
   <div class="col-md-12">
   
   <table class="table table-bordered table-striped" style="border:1px solid #ddd;padding:2%;">
      <tr>
     <td>Starting Time</td>
      <td>Ending Time</td>
      </tr>
  <tr>
     <td><?php echo $row["stime"]?></td>
      <td><?php echo $row["etime"]?></td>
      </tr>
      </table>
      <table class="table table-bordered table-striped" style="border:1px solid #ddd;padding:2%;">
        <tr>
             <td>Monday</td>
      <td>Tuesday</td>
       <td>Wednesday</td>
       <td>Thursday</td>
       <td>Friday</td>
       <td>Saturday</td>
        <td>Sunday</td>
        </tr>
        <tr>
             <td><?php echo $mon?></td>
      <td><?php echo $tue?></td>
       <td><?php echo $wed?></td>
       <td><?php echo $thu?></td>
       <td><?php echo $fri?></td>
       <td><?php echo $sat?></td>
        <td><?php echo $sun?></td>
        </tr>
      
        </table>
    </div>
    
  <br><br>
 <div class="col-md-12 text-center">
     <h3>Police Clearance</h3>
     <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['police'] ).'" height="200px" width="250px" class="img-thumbnail" />'?>
    </div>  
     <br><br>
                            </div>
                        </div>
                    </div>
                </div>

               
            </div>
         
        </div>
    </div>
    <!--Add New Message Fab Button-->
  
</div>
<!-- Right Sidebar -->

<!-- /.right-sidebar -->
<!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
<?php
}
include 'footer.php' ?>


