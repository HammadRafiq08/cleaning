<?php include 'header.php';

 
                            
                
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
                                  
                                    <table class="table showing table-bordered table-responsive table-striped">
                                        <thead>
                                            <tr>
                                                <th width="10%">Booking Name</th>
                                                <th width="10%">Booking Email</th>
                                                  <th width="10%">Date</th>
                                                  <th width="10%">Cleaner Name</th>
                                                <th width="10%">Cleaner Email</th>
                                              
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                             $query = "SELECT b.name,b.email,c.name,c.email,job.date FROM `job` inner join `booking` b on b.id=booking_id inner join `cleaner` c on c.id=cleaner_id";
                           $result = mysqli_query($connect, $query);
                          while($row = mysqli_fetch_array($result))
                          {
                              
                             
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $row[0]?>
                                                </td>
                                                <td>
                                                    <?php echo $row[1]?>
                                                </td>
                                                 <td>
                                                    <?php echo $row[4]?>
                                                </td>
                                                <td>
                                                    <?php echo $row[2]?>
                                                </td>
                                                <td>
                                                    <?php echo $row[3]?>
                                                </td>
                                               
                                           </tr>
<?php
                              
                          }
                          ?>
                                            </tr>
                                        </tbody>
                                    </table>
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