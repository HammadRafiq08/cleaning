<?php
include 'dbconnect.php';

$query = "SELECT * FROM company ";
$result = mysqli_query($connect, $query);
while($row = mysqli_fetch_array($result))
    {
       
        $emailcompany=$row['email'];
       
       $company =$row['name'];
  
    }

$booking_id=$_POST['booking_id'];
$cleaner_email=$_POST['cleaner_email'];
$cleaner_id=$_POST['cleaner_id'];
$date=date("d/m/Y");

$query = "SELECT * FROM booking where `id`='$booking_id' ";
$result = mysqli_query($connect, $query);
while($row = mysqli_fetch_array($result))
    {
         $name = $row['name'];
    $email = $row['email'];
    $phone = $row['phone'];
    $mobile = $row['mobile'];
    $state = $row['state'];

    $suburb = $row['suburb'];
    $street_name = $row['street_name'];
    $street_no = $row['street_no'];
    $address = $row['address'];
    $postal = $row['post_code'];
    $date=$row['date'];
     $time=$row['time'];
     
    $service = $row['service'];
    }


 $query = "INSERT INTO job (`booking_id`,`cleaner_id`,`date`)  VALUES ('$booking_id','$cleaner_id','$date')";
        if(mysqli_query($connect, $query))
        {
            echo 'Data Inserted!';
            
                  $to = $emailcompany;
        $from = $emailcompany;
        $subject = "Enquiry About Service";
        $message = "<!DOCTYPE html>
<html lang='en'>
<head>
 
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css'>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js'></script>
<style>
.head{
    background-color: #6fbf52;
    padding: 2% 2%;
    text-align: center;
}
h2{
    color:white;
}
.body{
    border:2px solid #6fbf52;
    text-align:center;
}

table{

width:100%;
    margin-top:3%;
    margin-bottom: 5%;
     border-collapse: collapse;
}
table th{
   
    font-size: 18px;
}
table td{
   
    font-size: 16px;
}
table, th, td {
  border: 1px solid #6fbf52;
}
</style>
</head>
<body>

<div class='container body'>
  <div class='col-md-12 text-center head'>
    
  <img src='http://www.ekoclean.com.au/images/download.jpg' style='width:auto;height:100px;'>
     
   </div>
   <div class='col-md-12'>
    <h3>You have been assigned to following booking, check it's details.<br>And remember you would be monitored and based on your clients satisfaction you will be rewareded!</h3>
   </div>
  <div class='col-md-12'>      
  <table class='table table-striped table-bordered table-responsive'>
    <thead>
      <tr>
        <th>Name</th>
        <th>Phone No.</th>
        <th>Email</th>
        <th>Mobile No</th>
        <th>Full Address</th>
        <th>Postal</th>
        <th>Service</th>
        <th>Date/Time</th>
       <th>Addition Info</th>
      </tr>
    </thead>
    <tbody>
            <tr>
                    <td>$name</td>
                    <td>$phone</td>
                    <td>$email</td>
                    <td>$mobile</td>
                    <td>$state, $suburb, $street_name, $street_no, $address</td>
                    <td>$postal</td>
                    <td>$service</td>
                    <td>$date, $time</td>
                    <td>$comments</td>
                  </tr>
     
    </tbody>
  </table>
    </div>
</div>

</body>
</html>
";
         $headers = "From: $from"; 
        // boundary 
      $headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
$headers .= "To: '$emailcompany', .";

        
  $ok = @mail($to, $subject, $message, $headers, "-f " . $from);  
  $ok2 = @mail($cleaner_email, $subject, $message, $headers, "-f " . $from);  
   echo $ok ? "Mail sent" : "Mail failed";
            
            $query = "UPDATE booking SET `status` = '0' WHERE id = '$booking_id'";
            if(mysqli_query($connect, $query))
            {
                $msg="Job has been Assigned! and email has been sent to the cleaner.";
                 header("Location: job.php?msg=$msg&id=$booking_id");
            }
            else{
                echo $query;
            }
            
        }
        else{
            echo $query;
        }
?>