<?php
$host = "localhost";
$username = "root";
$password = ""; // Replace with your actual password
$database = "bloodbank";

$conn = mysqli_connect($host, $username, $password, $database) or die("Connection error: " . mysqli_connect_error());
?>
