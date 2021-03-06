<?php
$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_query($conn,"SET CHARACTER SET UTF8");
// Check connection
?>