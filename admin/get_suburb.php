<?php
include "dbconnect.php";

if(!empty($_POST["country_id"])) {
	$query = "SELECT * FROM `suburb` where `state`='".$_POST["country_id"]."' ";
 $result = mysqli_query($connect, $query);
 
?>
	<option value="">Select Suburb</option>
<?php
	while($row = mysqli_fetch_array($result))
    {
?>
	<option value="<?php echo $row["name"]; ?>, <?php echo $row["number"]; ?>"><?php echo $row["name"]; ?>, <?php echo $row["number"]; ?></option>
<?php
	}
}
?>