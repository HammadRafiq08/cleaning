<?php include 'header.php' ?>


        </div>
    </div>
    <!--#navbar-->
    <div class="container-fluid relative animatedParent animateOnce my-3">
        <div class="row row-eq-height my-3 mt-3">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="card no-b mb-3 bg-danger text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div><i class="icon-television s-18"></i></div>
                                    <?php
                            $query = "SELECT * FROM `blog` ";
                             $result = mysqli_query($connect, $query);
                             $countpro=mysqli_num_rows($result);
                            ?>
                                    <div><span class="badge badge-pill badge-primary"><?php echo $countpro;?></span></div>
                                </div>
                                <div class="text-center">
                                    <div class="s-48 my-3 font-weight-lighter"><i class="icon-podcast"></i></div>
                                    Blogs
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="card no-b mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div><i class="icon-commenting-o s-18"></i></div>
                                    <?php
                            $query = "SELECT * FROM `testimonial` ";
                             $result = mysqli_query($connect, $query);
                             $countpro=mysqli_num_rows($result);
                            ?>
                                    <div><span class="badge badge-pill badge-danger"><?php echo $countpro;?></span></div>
                                </div>
                                <div class="text-center">
                                <div class="s-48 my-3 font-weight-lighter"><i class="icon-meetup"></i></div>
                                  
                                    Testimonial
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="card no-b mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div><i class="icon-modx s-18"></i></div>
                                    <?php
                            $query = "SELECT * FROM `product` ";
                             $result = mysqli_query($connect, $query);
                             $countpro=mysqli_num_rows($result);
                            ?>
                                    <div><span class="badge badge-pill badge-danger"><?php echo $countpro;?></span></div>
                                </div>
                                <div class="text-center">
                                <div class="s-48 my-3 font-weight-lighter"><i class="icon-product-hunt"></i></div>
                             
                                    Product
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="card no-b mb-3 bg-danger text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div><i class="icon-scribd s-18"></i></div>
                                    <?php
                            $query = "SELECT * FROM `service` ";
                             $result = mysqli_query($connect, $query);
                             $countpro=mysqli_num_rows($result);
                            ?>
                                    <div><span class="badge badge-pill badge-primary"><?php echo $countpro;?></span></div>
                                </div>
                                <div class="text-center">
                                <div class="s-48 my-3 font-weight-lighter"><i class="icon-handshake-o"></i></div>
                             
                                    Service
                               
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card no-b p-2">
                    <div class="card-body">
                        <div class="card-body">
                         <?php
                            $query = "SELECT * FROM `country` ";
                             $result = mysqli_query($connect, $query);
                             $countcs=mysqli_num_rows($result);
                             $query2 = "SELECT * FROM `suburb` ";
                             $result2 = mysqli_query($connect, $query2);
                             $countsu=mysqli_num_rows($result2);
                             $query3 = "SELECT * FROM `streetname` ";
                             $result3 = mysqli_query($connect, $query3);
                             $countst=mysqli_num_rows($result3);
                            ?>
                                   
                                
                            <div class="height-300">
                                <canvas
                                        data-chart="chartJs"
                                        data-chart-type="doughnut"
                                        data-dataset="[
                                                        [ <?php echo $countcs;?>, <?php echo $countsu;?>,<?php echo $countst;?>],

                                                    ]"
                                        data-labels="[['Country/States'],['Suburbs'],['Streets']]"
                                        data-dataset-options="[
                                                    {
                                                        label: 'Disk',
                                                        backgroundColor: [
                                                            '#03a9f4',
                                                            '#8f5caf',
                                                            '#3f51b5'
                                                        ],

                                                    },


                                                    ]"
                                        data-options="{legend: {display: !0,position: 'bottom',labels: {fontColor: '#7F8FA4',usePointStyle: !0}},
                                }"
                                >
                                </canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 
        <div class=" row my-3">
            <div class="col-md-6">
                <div class=" card b-0">
                    <div class="card-body p-5">
                        <canvas id="gradientChart" width="600" height="340"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class=" card no-b">
                    <div class="card-body">
                        <table class="table table-hover earning-box">
                            <tbody>
                           <?php
                            $query = "SELECT * FROM `team` limit 4 ";
                             $result = mysqli_query($connect, $query);
                             while($row = mysqli_fetch_array($result))
                             {
                             ?>
                            <tr class="no-b">
                                <td class="w-10">
                                    <a href="panel-page-profile.html" class="avatar avatar-lg">
                                    <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'">';?>
                                    </a>
                                </td>
                                <td>
                                    <h6><?php echo $row['name'];?></h6>
                                  
                                </td>
                               
                                <td><?php echo $row['title'];?></td>
                            </tr>
                           <?php
                             }
                             ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- Right Sidebar -->

<!-- /.right-sidebar -->
<!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
         <?php include 'footer.php' ?>