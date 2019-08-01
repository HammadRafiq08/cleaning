<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "cleaning";
// Create connection
$connect = mysqli_connect($servername,$username,$password,$dbName);

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
?>