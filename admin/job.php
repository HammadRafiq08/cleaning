<?php include 'header.php';
$id=$_GET['id'];
  $query = "SELECT * FROM `booking` where id='$id'";
                           $result = mysqli_query($connect, $query);
                          while($row = mysqli_fetch_array($result))
                          {
                              $date=$row["date"];
                              $date_day = strtotime($date);
 

                                $day = date("l", $date_day);
                               $time=$row["time"];
                                $suburb=$row["suburb"];
                
?>

<style>
    thead {
        background-color: #03a9f4;
        color: white;
       
    }
     thead th{
       
        font-size:18px!important;
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
                                    <h2>Booking Details</h2>
                                    <br>
                                    <br>
                                  
                                </div>
                                <div class="col-md-12">
                                      <?php
 $msg=$_GET['msg'];
 if(isset($msg)){?>
             <div class="alert alert-primary" style="background-color:#6fbf52!important;width:80%;text-align:center;color:white;margin-top:2%;margin-left:10%;">
                    <?php
                        echo $msg;
                    ?>
                </div>
                <?php
                }
                ?>
                                    <table class="table showing table-bordered table-responsive table-striped">
                                        <thead>
                                            <tr>
                                                <th width="10%">Name</th>
                                                <th width="10%">Email</th>
                                                <th width="10%">Phone No.</th>
                                                <th width="10%">Mobile No.</th>
                                                <th width="10%">State/Country</th>
                                                <th width="10%">Suburb</th>
                                                <th width="10%">Street Name</th>
                                                <th width="10%">Street No.</th>
                                                <th width="10%">Address</th>
                                                <th width="10%">Postal Code</th>
                                                <th width="10%">Service Type</th>
                                                <th width="50%">Date</th>
                                                <th width="50%">Time</th>
                                                <th width="50%">Comments</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php echo $row["name"]?>
                                                </td>
                                                <td>
                                                    <?php echo $row["email"]?>
                                                </td>
                                                <td>
                                                    <?php echo $row["phone"]?>
                                                </td>
                                                <td>
                                                    <?php echo $row["mobile"]?>
                                                </td>
                                                <td>
                                                    <?php echo $row["state"]?>
                                                </td>
                                                <td>
                                                    <?php echo $row["suburb"]?>
                                                </td>
                                                <td>
                                                    <?php echo $row["street_name"]?>
                                                </td>
                                                <td>
                                                    <?php echo $row["street_no"]?>
                                                </td>
                                                <td>
                                                    <?php echo $row["address"]?>
                                                </td>
                                                <td>
                                                    <?php echo $row["post_code"]?>
                                                </td>

                                                <td>
                                                    <?php echo $row["service_type"]?>
                                                </td>
                                                <td>
                                                    <?php echo $row["date"]?>
                                                </td>
                                                <td>
                                                    <?php echo $row["time"]?>
                                                </td>
                                                <td>
                                                    <?php echo $row["comments"]?>
                                                </td>
<?php
                              
                          }
                          ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <br>
                                <br>
                                <div class="row">
                                   
                                    <div class="col-md-12">
                                        <Table class="table showing table-bordered table-responsive table-striped">
                                            <thead>
                                                <tr>
                                                    <th width="20%">Action</th>
                                                    <th width="30%">Driving ID</th>
                                                    <th width="30%">Primary ID</th>

                                                    <th width="20%">Name</th>
                                                    <th width="20%">Email</th>
                                                    <th width="20%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                 $query = "SELECT * FROM `cleaner` where `suburb`='$suburb' and $day='1' and `stime`<'$time' and `etime`>'$time'";
                           $result = mysqli_query($connect, $query);
                          while($row = mysqli_fetch_array($result))
                          {
                                                ?>
                                                <tr>
                                                    <td><a href="cleanerdetails.php?id=<?php echo $row['id']?>" class="btn btn-primary">View Details</a></td>
                                                    <td><?php echo $row['driving_id']?></td>
                                                    <td><?php echo $row['primary_id']?></td>
                                                    <td><?php echo $row['name']?></td>
                                                    <td><?php echo $row['email']?></td>
                                                    <td>
                                                        <form method="post" action="jobscript.php">
                                                            <input type="hidden" name="cleaner_email" value="<?php echo $row['email']?>">
                                                            <input type="hidden" name="booking_id" value="<?php echo $id?>">
                                                            <input type="hidden" name="cleaner_id" value="<?php echo $row['id']?>">
                                                            <input type="submit" name="submit" class="btn btn-primary" value="Assign">
                                                        </form>
                                                    </td>
                                                </tr>
                                                <?php
                          }
                                                ?>
                                            </tbody>
                                        </Table>
                                    </div>
                                </div>
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

include 'footer.php' ?>