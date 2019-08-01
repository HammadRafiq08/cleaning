<?php
session_start();
include 'dbconnect.php';
if (!isset($_SESSION['usr_name'])) {
    header("Location: signin.php");
}
$id= $_SESSION['usr_id'];
$query = "SELECT * FROM `user` where `id`='$id' ";
 $result = mysqli_query($connect, $query);
 while($row = mysqli_fetch_array($result))
 {
     $user_img='<img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" class="user-image" />';
     $user_name=$row['name'];
     $user_email=$row['email'];
    }

?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/img/basic/favicon.ico" type="image/x-icon">
    <title>Admin Panel</title>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
  <script src="assets/ckeditor/ckeditor.js"></script>
  <style>
.showing th{
    font-size:16px;
}
.showing td{
    font-size:22px;
}


  .modal-header{
      background-color: dodgerblue;
      color:white;
  }
  .pagination-wrap{
      text-align:center;
  }
  .pagination-wrap .pagination_link{
      border:1px solid dodgerblue;
      background-color:dodgerblue;
      border-radius:2px;
      padding:5px 10px;
      font-size:18px;
      color:white;
  }
  .pagination-wrap .pagination_link:hover{
      background-color:white;
      color:dodgerblue;
  }
  </style>
</head>

<body class="light sidebar-mini sidebar-collapse">
<!-- Pre loader -->
<div id="loader" class="loader">
    <div class="plane-container">
        <div class="preloader-wrapper small active">
            <div class="spinner-layer spinner-blue">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-yellow">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-green">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>
        </div>
    </div>
</div>
<div id="app">
<aside class="main-sidebar fixed offcanvas b-r sidebar-tabs" data-toggle='offcanvas'>
    <div class="sidebar">
        <div class="d-flex hv-100 align-items-stretch">
            <div class="indigo text-white">
                <div class="nav mt-5 pt-5 flex-column nav-pills" id="v-pills-tab" role="tablist"
                     aria-orientation="vertical">
                    <a class="nav-link" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab"
                       aria-controls="v-pills-home" aria-selected="true"><i class="icon-inbox2"></i></a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab"
                       aria-controls="v-pills-profile" aria-selected="false"><i class="icon-add"></i></a>
                    <a class="nav-link blink skin_handle"  href="#"><i class="icon-lightbulb_outline"></i></a>
                    <a href="user.php">
                        <figure class="avatar">
                            <?php
                            echo $user_img;
                            ?>
                            <span class="avatar-badge online"></span>
                        </figure>
                    </a>
                </div>
            </div>
            <div class="tab-content flex-grow-1" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                     aria-labelledby="v-pills-home-tab">
                    <div class="relative brand-wrapper sticky b-b">
                        <div class="d-flex justify-content-between align-items-center p-3">
                            <div class="text-xs-center">
                                <span class="font-weight-lighter s-18">Menu</span>
                            </div>
                            <div class="badge badge-danger r-0">New Panel</div>
                        </div>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="treeview">
                            <a href="index.php">
                            <i class="icon icon-sailing-boat-water s-24"></i> <span>Dashboard</span>
                            </a>
                        </li>
                         <li class="treeview ">
                            <a href="franchise.php">
                                <i class="icon icon-contacts  s-24"></i> <span>Franchise</span>
                               
                            </a>
                           
                        </li>
                        <li class="treeview">
                            <a href="cleaner.php">
                            <i class="icon icon-contacts s-24"></i> <span>Cleaners</span>
                            <?php
                            $query = "SELECT * FROM `cleaner` ";
                             $result = mysqli_query($connect, $query);
                             $countpro=mysqli_num_rows($result);
                            ?>
                            <span class="badge r-3 badge-primary pull-right"><?php echo $countpro;?></span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="booking.php">
                            <i class="icon icon-check-square-o s-24"></i> <span>Bookings</span>
                            <?php
                            $query = "SELECT * FROM `booking` ";
                             $result = mysqli_query($connect, $query);
                             $countpro=mysqli_num_rows($result);
                            ?>
                            <span class="badge r-3 badge-primary pull-right"><?php echo $countpro;?></span>
                            </a>
                        </li>
                           <li class="treeview ">
                            <a href="assignedjob.php">
                                <i class="icon icon-check-square-o s-24"></i> <span>Assigned Jobs</span>
                               
                            </a>
                           
                        </li>
                        <li class="treeview"><a href="product.php">
                            <i class="icon icon icon-product-hunt s-24"></i>
                            <span>Products</span>
                            <?php
                            $query = "SELECT * FROM `product` ";
                             $result = mysqli_query($connect, $query);
                             $countpro=mysqli_num_rows($result);
                            ?>
                            <span class="badge r-3 badge-primary pull-right"><?php echo $countpro;?></span>
                           
                        </a>
                           
                        </li>
                        <li class="treeview"><a href="#"><i class="icon icon-handshake-o s-24"></i>Services<i
                                class=" icon-angle-left  pull-right"></i></a>
                            <ul class="treeview-menu">
                                <li><a href="service.php"><i class="icon icon-tree"></i>Services</a>
                                </li>
                                <li><a href="servicecategory.php"><i class="icon icon-tree"></i>Category</a>
                                </li>
                                
                            </ul>
                        </li>
                        <li class="treeview"><a href="#">
                            <i class="icon icon-address-card s-24"></i>
                            <i class=" icon-angle-left  pull-right"></i>
                            <span>Address</span>
                        </a>
                            <ul class="treeview-menu">
                                <li><a href="country.php"><i class="icon icon-my_location"></i>Country/State</a>
                                </li>
                                <li><a href="suburb.php"><i class="icon icon-my_location"></i>Suburb</a>
                                </li>
                                <li><a href="streetname.php"><i class="icon icon-my_location"></i>Street Name</a>
                                </li>
                                <li><a href="streetno.php"><i class="icon icon-my_location"></i>Street Number</a>
                                </li>
                            </ul>
                        </li>
                        <li class="treeview ">
                            <a href="blog.php">
                                <i class="icon icon-commenting-o  s-24"></i> <span>Blog</span>
                               
                            </a>
                           
                        </li>
                        
                        <li class="treeview ">
                            <a href="testimonial.php">
                                <i class="icon icon-meetup  s-24"></i> <span>Testimonial</span>
                               
                            </a>
                           
                        </li>
                        
                        <li class="treeview">
                            <a href="inbox.php">
                            <i class="icon icon-message s-24"></i> <span>Inbox</span>
                            </a>
                        </li>
                        <li class="treeview ">
                            <a href="faq.php">
                                <i class="icon icon-organization-1  s-24"></i> <span>FAQ</span>
                               
                            </a>
                           
                        </li>
                         <li class="treeview ">
                            <a href="promotion.php">
                                <i class="icon icon-image  s-24"></i> <span>Promotions</span>
                               
                            </a>
                           
                        </li>
                        <li class="treeview ">
                            <a href="team.php">
                                <i class="icon icon-group  s-24"></i> <span>Team</span>
                               
                            </a>
                           
                        </li>
                        <li class="treeview ">
                            <a href="slider.php">
                                <i class="icon icon-image  s-24"></i> <span>Slider</span>
                               
                            </a>
                           
                        </li>
                        <li class="treeview ">
                            <a href="about.php">
                                <i class="icon icon-user-o  s-24"></i> <span>About Us</span>
                               
                            </a>
                           
                        </li>
                         <li class="treeview ">
                            <a href="company.php">
                                <i class="icon icon-organization-1  s-24"></i> <span>Company</span>
                               
                            </a>
                           
                        </li>
                        <li class="treeview ">
                            <a href="user.php">
                                <i class="icon icon-user-secret  s-24"></i> <span>Admin</span>
                               
                            </a>
                           
                        </li>
                </ul>
                </div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <div class="relative brand-wrapper sticky b-b p-3">
                        <form>
                            <div class="form-group input-group-sm has-right-icon">
                                <input class="form-control form-control-sm light r-30" placeholder="Search" type="text">
                                <i class="icon-search"></i>
                            </div>
                        </form>
                    </div>
                    <div class="sticky slimScroll">

                        <div class="p-2">
                            <ul class="list-unstyled">
                                <!-- Alphabet with number of contacts -->
                                <li class="pt-3 pb-3 sticky p-3 b-b white">
                                    <span class="badge r-3 badge-success">Cleaners</span>
                                </li>
                                <!-- Single contact -->
                                <?php
                        $query = "SELECT * FROM `cleaner`";
                        $result = mysqli_query($connect, $query);
                        while($row = mysqli_fetch_array($result))
                        {
                           
                       
                        ?>
                                <li class="my-1">
                                    <div class="card no-b p-3">
                                        <div class="">

                                            <div class="image mr-3  float-left">
                                                <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" class="w-40px" />';?>

                                            </div>
                                            <div>
                                                <div>
                                                    <strong><?php echo $row['name'];?></strong>
                                                </div>
                                                <small> <?php echo $row['email'];?></small>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                               <?php
                        }
                               ?>
                            </ul>

                            
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</aside>
<div class="has-sidebar-left">
    <div class="pos-f-t">
    <div class="collapse" id="navbarToggleExternalContent">
        <div class="bg-dark pt-2 pb-2 pl-4 pr-2">
            <div class="search-bar">
                <input class="transparent s-24 text-white b-0 font-weight-lighter w-128 height-50" type="text"
                       placeholder="start typing...">
            </div>
            <a href="#" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-expanded="false"
               aria-label="Toggle navigation" class="paper-nav-toggle paper-nav-white active "><i></i></a>
        </div>
    </div>
</div>
</div>
<a href="#" data-toggle="push-menu" class="paper-nav-toggle left ml-2 fixed">
    <i></i>
</a>
<div class="has-sidebar-left has-sidebar-tabs">
    <!--navbar-->
    <div class="sticky">
        <div class="navbar navbar-expand d-flex justify-content-between bd-navbar white shadow">
            <div class="relative">
                <div class="d-flex">
                    <div class="d-none d-md-block">
                        <h1 class="nav-title">Admin Panel</h1>
                    </div>
                </div>
            </div>
            <!--Top Menu Start -->
<div class="navbar-custom-menu">
<ul class="nav navbar-nav">
        <!-- Messages-->
        <li class="dropdown custom-dropdown messages-menu">
            <a href="#" class="nav-link" data-toggle="dropdown">
                <i class="icon-envelope-o"></i>
                <?php
                            $query = "SELECT * FROM `inbox` ";
                             $result = mysqli_query($connect, $query);
                             $countpro=mysqli_num_rows($result);
                            ?>
                <span class="badge badge-success badge-mini rounded-circle"><?php echo $countpro;?></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-right">
                <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu pl-2 pr-2">
                        <!-- start message -->
                        <?php
                        $query = "SELECT * FROM `inbox`";
                        $result = mysqli_query($connect, $query);
                        while($row = mysqli_fetch_array($result))
                        {
                            if(strlen($row["message"])>30)
                            {
                                $message=substr($row["message"],0,30).'...';
                            }
                            else{
                                $message=substr($row["message"],0,strlen($row["message"]));
                            }
                       
                        ?>
                        <li>
                            <a href="#">
                                <div class="avatar float-left">
                                    <img src="assets/img/dummy/u4.png" alt="">
                                    <span class="avatar-badge busy"></span>
                                </div>
                                <h4>
                                    <?php echo $row['name'];?>
                                     </h4>
                                <p><?php echo $message;?></p>
                            </a>
                        </li>
                       <?php
                        }
                       ?>
                        <!-- end message -->
                    </ul>
                </li>
                <li class="footer s-12 p-2 text-center"><a href="inbox.php">See All Messages</a></li>
            </ul>
        </li>
        <!-- Notifications -->
       
        <!-- User Account-->
        <li class="dropdown custom-dropdown user user-menu ">
            <a href="#" class="nav-link" data-toggle="dropdown">
                <?php
                echo $user_img;
                ?>
                <i class="icon-more_vert "></i>
            </a>
            <div class="dropdown-menu p-4 dropdown-menu-right">
                <div class="row box justify-content-between my-4">
                    <div class="col">
                        <a href="product.php">
                            <i class="icon-product-hunt purple lighten-2 avatar  r-5"></i>
                            <div class="pt-1">Products</div>
                        </a>
                    </div>
                    <div class="col"><a href="blog.php">
                        <i class="icon-commenting pink lighten-1 avatar  r-5"></i>
                        <div class="pt-1">blog</div>
                    </a></div>
                    <div class="col">
                        <a href="team.php">
                            <i class="icon-users indigo lighten-2 avatar  r-5"></i>
                            <div class="pt-1">team</div>
                        </a>
                    </div>
                </div>
                <div class="row box justify-content-between my-4">
                    <div class="col">
                        <a href="testimonial.php">
                            <i class="icon-modx light-green lighten-1 avatar  r-5"></i>
                            <div class="pt-1">testimonial</div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="service.php">
                            <i class="icon-handshake-o orange accent-1 avatar  r-5"></i>
                            <div class="pt-1">Services</div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="country.php">
                            <i class="icon-address-book grey darken-3 avatar  r-5"></i>
                            <div class="pt-1">Address</div>
                        </a>
                    </div>
                </div>
                <hr>
                <div class="row box justify-content-between my-4">
                    <div class="col">
                        <a href="about.php">
                            <i class="icon-user purple lighten-2 avatar  r-5"></i>
                            <div class="pt-1">About</div>
                        </a>
                    </div>
                    <div class="col"><a href="company.php">
                        <i class="icon-organization-1 pink lighten-1 avatar  r-5"></i>
                        <div class="pt-1">Company</div>
                    </a></div>
                    <div class="col">
                        <a href="user.php">
                            <i class="icon-user-secret indigo lighten-2 avatar  r-5"></i>
                            <div class="pt-1">Admin</div>
                        </a>
                    </div>
                </div>
            </div>
        </li>
        <li class="dropdown custom-dropdown user user-menu ">
            <a href="logout.php" class="nav-link">
                <i class="icon-exit_to_app "></i>
            </a>
        </li>
    </ul>