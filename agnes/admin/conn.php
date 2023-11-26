<?php
$host = "localhost";
$username = "root";
$password = ""; 
$database = "bloodbank";

$conn = mysqli_connect($host, $username, $password, $database) or die("Connection error: " . mysqli_connect_error());
?>
