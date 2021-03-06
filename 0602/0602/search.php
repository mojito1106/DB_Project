<?php

session_start();
include ("connMySQL.php");

$search=$_POST['search'];
    
if($search != NULL)
{ 
 $sql ="select * from product where p_name like '%$search%' ";                     
 $result = $conn->query($sql);    
    
    
    $_SESSION['search'] = $result->num_rows;
    $_SESSION['searchitem'] = $search;
    if($result->num_rows>0)
     {  
        echo "<meta http-equiv=REFRESH CONTENT=0;url=category.php>";
     } 
     else
     {
         echo "<meta http-equiv=REFRESH CONTENT=0;url=category.php>";
     }
}
else{
    
	echo "<meta http-equiv=REFRESH CONTENT=0;url=home.php>";
}



?>