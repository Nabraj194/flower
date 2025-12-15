<?php
$servername = "localhost";
$username = "root";   // XAMPP default username
$password = "";       // XAMPP default password is empty
$database = "artnest"; // Change this to your database name

// Create Connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check Connection
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
?>
