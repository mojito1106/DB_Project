<?php
$servername = "localhost";
$username = "root";
$password = "iam!0513405!";
$dbname = "project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
 mysqli_query($conn,"SET CHARACTER SET UTF8");
// Check connection
?>