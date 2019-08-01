<?php

include 'dbconnect.php';
session_start();
if(isset($_SESSION['usr_name']))
{
    header("location: index.php");
}

if (isset($_POST['btn-login'])) {

    $usr_name = $_POST['username'];
    $usr_pass = $_POST['password'];


    $query = $connect->query("SELECT * FROM user WHERE `name`='$usr_name' or `email`='$usr_name'") or die(mysqli_error());
    $row=$query->fetch_array();
    $count = $query->num_rows; // if email/password are correct returns must be 1 row

    if ($usr_pass == $row['pass'] && $count==1) {
        $_SESSION['usr_name'] = $usr_name;
        $_SESSION['usr_id'] = $row['id'];

        $mag = "<div class='alert alert-danger'>
     <span class='glyphicon glyphicon-info-sign'></span> &nbsp; LOGIN
    </div> ";
        header("location: index.php");
    } else {

        $msg = "<div class='alert alert-danger'>
     <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Invalid Username or Password !
      
    </div>";
        header("Location: signin.php");
    }
    $connect->close();
}

?>