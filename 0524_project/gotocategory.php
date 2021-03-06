<?php

session_start();

$cate = $_GET['category'];

unset($_SESSION['search']); 
unset($_SESSION['searchitem']); 

echo "<meta http-equiv=REFRESH CONTENT=0;url=category.php?category=$cate>";

?>