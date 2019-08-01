<?php
include "dbconnect.php";

if(!empty($_POST["street_no"])) {
	$query = "SELECT * FROM `streetno` where `streetname`='".$_POST["street_no"]."' ";
 $result = mysqli_query($connect, $query);
 
?>
	<option value="">Select Street Number</option>
<?php
	while($row = mysqli_fetch_array($result))
    {
?>
	<option value="<?php echo $row["name"]; ?>"><?php echo $row["name"]; ?></option>
<?php
	}
}
?>