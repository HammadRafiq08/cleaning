<?php
include 'dbconnect.php';

$query = "SELECT `status` FROM `franchise`  where `id` = '".$_POST["id"]."'";
 $result = mysqli_query($connect, $query);
while($row = mysqli_fetch_array($result))
{
    $status=$row[0];
}
if($status!='on'){
    $new_status='on';
}
else{
    $new_status='';
}
$query2 = "UPDATE `franchise` SET `status`='$new_status' where `id` = '".$_POST["id"]."'";
if(mysqli_query($connect, $query2))
{
    echo 'Status Updated!';
}
else{
    echo $query2;
}

?>