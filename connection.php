<?php 
session_start();
$host = "localhost";
$user = "root";
$password = "";
$database = "registration";
$conn = mysqli_connect($host, $user, $password, $database);

if(!$conn)
die("Failed to connect with database");

// mysqli_close($conn);
?>