<?php
include "dbconnect.php";

if(!empty($_POST["street_name"])) {
	$query = "SELECT * FROM `streetname` where `suburb`='".$_POST["street_name"]."' ";
 $result = mysqli_query($connect, $query);
 
?>
	<option value="">Select Street Name</option>
<?php
	while($row = mysqli_fetch_array($result))
    {
?>
	<option value="<?php echo $row["name"]; ?>"><?php echo $row["name"]; ?></option>
<?php
	}
}
?>