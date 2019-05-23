<?php 

$host = "103.48.18.240";
$username = "root";
$pass = "bcsir2018";
$database = "ctgbcsir-app";

//"ctgbcsir-app"

// Create mysqli_error($conn)
$conn = new mysqli($host, $username, $pass,$database);

// Check mysqli_error($conn)
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";
?>