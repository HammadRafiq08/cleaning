<script>
 function update_cleaner(val) {
            $.ajax({
            type: "POST",
            url: "update_cleaner.php",
            data:'id='+val,
            success: function(data){
                alert(data);
            }
            });
         }
</script>

<?php
//action.php

include 'dbconnect.php';
$tablename='cleaner';
$record_per_page = 10; 
$search_column='driving_id';
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

        $query = "SELECT * FROM $tablename ";
       
        if(isset($_POST["search"]))
        {
        $query .= '
        WHERE '.$search_column.' LIKE "%'.$_POST["search"].'%" 
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
    <th width="50%">Status</th>
     <th width="10%">Driving ID</th>
       <th width="10%">Primary ID</th>
         <th width="10%">Secondary ID</th>
      <th width="10%">Name</th>
      <th width="10%">Action</th>
        <th width="10%">Update</th>
     <th width="10%">Delete</th>
    </tr>
  ';
  
 
        while($row = mysqli_fetch_array($result))
        {
          
           
            if($row["status"]=='on'){
                $status='checked';
               
            }
            else{
                $status="";
            }
           
            $output .= '

    <tr>
    <td>
    
    <label class="switch">
        <input type="checkbox" name="status" '.$status.' onChange="update_cleaner('.$row[0].');">
        <span class="slider round"></span>
    </label>
</td>
     <td>'.$row["driving_id"].'</td>
      <td>'.$row["pri_id"].'</td> 
      <td>'.$row["sec_id"].'</td>
     <td>'.$row["name"].'</td>
     <td><a href="cleanerdetails.php?id='.$row["id"].'" class="btn btn-primary">View Details</a></td>

    
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
        $driving_id = mysqli_real_escape_string($connect,$_POST['driving_id']);
         $pri_id = mysqli_real_escape_string($connect,$_POST['pri_id']);
          $sec_id = mysqli_real_escape_string($connect,$_POST['sec_id']);
          
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

        $comments = mysqli_real_escape_string($connect,$_POST['comments']);
        $pfile = addslashes(file_get_contents($_FILES["pimage"]["tmp_name"]));
        $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
        
        $status = mysqli_real_escape_string($connect,$_POST['status']);
        $query = "INSERT INTO `cleaner`(`name`, `state`, `suburb`, `street_name`, `street_no`, `comments`, `phone`, `mobile`, `police`, `driving_id`, `address`, `post_code`, `service_type`, `email`, `image`,`status`,`pri_id`,`sec_id`)  VALUES
         ('$name','$state','$suburb','$street_name','$street_no','$comments','$phone','$mobile','$pfile','$driving_id','$address','$postal','$service','$email','$file','$status','$pri_id','$sec_id')";
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
        $driving_id = mysqli_real_escape_string($connect,$_POST['driving_id']);
         $pri_id = mysqli_real_escape_string($connect,$_POST['pri_id']);
          $sec_id = mysqli_real_escape_string($connect,$_POST['sec_id']);
          
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
        
        $comments = mysqli_real_escape_string($connect,$_POST['comments']);
        $status = mysqli_real_escape_string($connect,$_POST['status']);
        $pfile = addslashes(file_get_contents($_FILES["pimage"]["tmp_name"]));
        $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));

        $query = "UPDATE $tablename SET `status`='$status',`image` = '$file',`pri_id`='$pri_id',`sec_id`='$sec_id',`name` = '$name',`service_type` = '$service' , `comments`='$comments',`police` = '$pfile',`email` = '$email',`phone` = '$phone' , `mobile`='$mobile',`suburb` = '$suburb',`state` = '$state',`street_name` = '$street_name' , `street_no`='$street_no' ,`post_code` = '$postal',`address` = '$address',`drving_id` = '$drving_id' WHERE id = '".$_POST["image_id"]."'";
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