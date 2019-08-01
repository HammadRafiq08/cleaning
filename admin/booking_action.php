<?php
//action.php

include 'dbconnect.php';
$tablename='booking';
$record_per_page = 10; 
$search_column='name';
if(isset($_POST["action"]))
{
    if($_POST["action"] == "fetch")
    {
      
        $page = '';  
        $output = '';  
        if(isset($_POST["page"]))  
        {  
             $page = $_POST["page"];  
        }  
        else  
        {  
             $page = 1;  
        }  
        $start_from = ($page - 1)*$record_per_page;  

        $query = "SELECT * FROM $tablename where `status`='1'";
       
        if(isset($_POST["search"]))
        {
        $query .= '
        and '.$search_column.' LIKE "%'.$_POST["search"].'%" 
        ';
        }

        $query .= 'ORDER BY id desc';
        $query .= "
		 LIMIT $start_from, $record_per_page
		";

        $result = mysqli_query($connect, $query);
        if(mysqli_num_rows($result)>0){
        $output = '
   <table class="table showing table-bordered table-responsive table-striped">
    <tr>
     <th width="10%">Action</th>
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
      
    <th width="10%">Update</th>
     <th width="10%">Delete</th>
    </tr>
  ';
  
 
        while($row = mysqli_fetch_array($result))
        {
          
            if(strlen($row["comments"])>100)
            {
                $comment=substr($row["comments"],0,100);
            }
            else{
                $comment=substr($row["comments"],0,strlen($row["comments"]));
            }
            
            $output .= '

    <tr>
     <td><a href="job.php?id='.$row['id'].'" Class="btn btn-primary">Assign Job</a></td>
     <td>'.$row["name"].'</td>
     <td>'.$row["email"].'</td>
     <td>'.$row["phone"].'</td>
     <td>'.$row["mobile"].'</td>
     <td>'.$row["state"].'</td>
     <td>'.$row["suburb"].'</td>
     <td>'.$row["street_name"].'</td>
     <td>'.$row["street_no"].'</td>
     <td>'.$row["address"].'</td>
     <td>'.$row["post_code"].'</td>
       
     <td>'.$row["service_type"].'</td>
   <td>'.$row["date"].'</td>
         <td>'.$row["time"].'</td>
    <td>
           '.$comment.'...
    </td>
      
    
     <td><button type="button" name="update" class="btn btn-info bt-xs update" id="'.$row["id"].'"><i class="fas fa-pen"></i></button></td>
     <td><button type="button" name="delete" class="btn btn-danger bt-xs delete" id="'.$row["id"].'"><i class="fas fa-trash"></i></button></td>
    </tr>
   ';
        }
        $output .= '</table>';
    }
    else{
        $output .= '<div class="alert alert-danger">No Records Found</div>';
    }
        $page_query = "SELECT * FROM $tablename"; 
   
        
        if(isset($_POST["search"]))
        {
        $page_query .= '
        WHERE '.$search_column.' LIKE "%'.$_POST["search"].'%" 
        ';
        }

         
     
         
      $page_result = mysqli_query($connect, $page_query);  
      $total_records = mysqli_num_rows($page_result);  
      $total_pages = ceil($total_records/$record_per_page); 
      
       $output .= "<nav class='pagination-wrap'>
       ";
     $first=1;
     if($total_records>0){
     $output .= "
      
      <a class='icon-angle-left pagination_link'  href='#' id='".$first."'></a> ";  
        
       for($i=1; $i<=$total_pages; $i++)  
      {  
           $output .= "
           <a class='pagination_link' href='#' style='cursor:pointer;' id='".$i."'>".$i."</a>";  
      }  
       $output .= "
      
         
               <a class='icon-angle-right pagination_link'  href='#' id='".$total_pages."'></a>
      
     </nav>";  
         ;  

    }
        echo $output;
        
    }

    if($_POST["action"] == "insert")
    {
        $name = mysqli_real_escape_string($connect,$_POST['name']);
        $email = mysqli_real_escape_string($connect,$_POST['email']);
        $phone = mysqli_real_escape_string($connect,$_POST['phone']);
        $mobile = mysqli_real_escape_string($connect,$_POST['mobile']);
        $state = mysqli_real_escape_string($connect,$_POST['state']);

        $suburb = mysqli_real_escape_string($connect,$_POST['suburb']);
        $street_name = mysqli_real_escape_string($connect,$_POST['street_name']);
        $street_no = mysqli_real_escape_string($connect,$_POST['street_no']);
        $address = mysqli_real_escape_string($connect,$_POST['address']);
        $postal = mysqli_real_escape_string($connect,$_POST['post_code']);

        $service = mysqli_real_escape_string($connect,$_POST['service']);
$date = mysqli_real_escape_string($connect,$_POST['date']);
$time = mysqli_real_escape_string($connect,$_POST['time']);
        $comments = mysqli_real_escape_string($connect,$_POST['comments']);
        
        $status = '1';
       $query = "INSERT INTO $tablename (`name`, `state`, `suburb`, `street_name`, `street_no`, `comments`, `phone`, `mobile`, `address`, `post_code`, `service_type`, `email`,`date`,`time`,`status`)  VALUES
         ('$name','$state','$suburb','$street_name','$street_no','$comments','$phone','$mobile','$address','$postal','$service','$email','$date','$time','$status')";
        if(mysqli_query($connect, $query))
        {
            echo 'Data Inserted!';
        }
        else{
            echo $query;
        }
    }
    if($_POST["action"] == "update")
    {
        $name = mysqli_real_escape_string($connect,$_POST['name']);
        $email = mysqli_real_escape_string($connect,$_POST['email']);
        $phone = mysqli_real_escape_string($connect,$_POST['phone']);
        $mobile = mysqli_real_escape_string($connect,$_POST['mobile']);
        $state = mysqli_real_escape_string($connect,$_POST['state']);

        $suburb = mysqli_real_escape_string($connect,$_POST['suburb']);
        $street_name = mysqli_real_escape_string($connect,$_POST['street_name']);
        $street_no = mysqli_real_escape_string($connect,$_POST['street_no']);
        $address = mysqli_real_escape_string($connect,$_POST['address']);
        $postal = mysqli_real_escape_string($connect,$_POST['post_code']);

        $service = mysqli_real_escape_string($connect,$_POST['service']);

$date = mysqli_real_escape_string($connect,$_POST['date']);
$time = mysqli_real_escape_string($connect,$_POST['time']);
        $comments = mysqli_real_escape_string($connect,$_POST['comments']);

        $query = "UPDATE $tablename SET `name` = '$name',`date` = '$date',`time` = '$time',`service_type` = '$service' , `comments`='$comments',`email` = '$email',`phone` = '$phone' , `mobile`='$mobile',`suburb` = '$suburb',`state` = '$state',`street_name` = '$street_name' , `street_no`='$street_no' ,`post_code` = '$postal',`address` = '$address' WHERE id = '".$_POST["image_id"]."'";
        if(mysqli_query($connect, $query))
        {
            echo 'Data Updated!';
        }
        else{
            echo $query;
        }
    }
    if($_POST["action"] == "delete")
    {
        $query = "DELETE FROM $tablename WHERE id = '".$_POST["image_id"]."'";
        if(mysqli_query($connect, $query))
        {
            echo 'Data Deleted!';
        }
    }
}
?>