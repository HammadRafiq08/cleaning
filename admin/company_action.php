<?php
//action.php

include 'dbconnect.php';
$tablename='company';
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
   <table class="table showing  table-responsive table-bordered table-striped">
    <tr>
     <th width="10%">ID</th>
      <th width="30%">Name</th>
      <th width="30%">Phone</th>
      <th width="30%">Mobile</th>
      <th width="30%">Address</th>
       <th width="30%">E-mail</th>
       <th width="30%">Facebook</th>
       <th width="30%">Twitter</th>
       <th width="30%">Instagram</th>
       <th width="30%">Google</th>
     <th width="40%">Logo</th>
    <th width="10%">Update</th>
    </tr>
  ';
  
  $i=0;
        while($row = mysqli_fetch_array($result))
        {
            $i++;
            
            $output .= '

    <tr>
     <td>'.$i.'</td>

     <td>
      '.$row[1].'
     </td>
     <td>
     '.$row[2].'
    </td>
    <td>
     '.$row[3].'
   </td>
   <td>
   '.$row[4].'
  </td>
  <td>
   '.$row[5].'
 </td>
     <td>
      '.$row[6].'
    </td>
    <td>
    '.$row[7].'
   </td>
   <td>
    '.$row[8].'
  </td>
  <td>
  '.$row[9].'
 </td>
      
    <td>
      <img src="data:image/jpeg;base64,'.base64_encode($row[10] ).'" height="100px" width="auto" class="img-thumbnail" />
     </td>
     <td><button type="button" name="update" class="btn btn-info bt-xs update" id="'.$row["id"].'"><i class="fas fa-pen"></i></button></td>
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
        $pass = mysqli_real_escape_string($connect,$_POST['pass']);
        $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
        $query = "INSERT INTO $tablename(`name`,`email`,`pass`,`image`)  VALUES ('$name','$email','$pass','$file')";
        if(mysqli_query($connect, $query))
        {
            echo 'Data Inserted!';
        }
    }
    if($_POST["action"] == "update")
    {
        $name = mysqli_real_escape_string($connect,$_POST['name']);
        $phone = mysqli_real_escape_string($connect,$_POST['phone']);
        $mobile = mysqli_real_escape_string($connect,$_POST['mobile']);
        $address = mysqli_real_escape_string($connect,$_POST['address']);
        $email = mysqli_real_escape_string($connect,$_POST['email']);
        $twitter = mysqli_real_escape_string($connect,$_POST['twitter']);
        $facebook = mysqli_real_escape_string($connect,$_POST['facebook']);
        $instagram = mysqli_real_escape_string($connect,$_POST['instagram']);
        $google = mysqli_real_escape_string($connect,$_POST['google']);
        $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
        $query = "UPDATE $tablename SET `logo` = '$file',`name` = '$name',`email` = '$email' , `address`='$address',`mobile` = '$mobile' , `number`='$phone',`facebook` = '$facebook' , `twitter`='$twitter',`instagram` = '$instagram' , `google`='$google' WHERE id = '".$_POST["image_id"]."'";
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