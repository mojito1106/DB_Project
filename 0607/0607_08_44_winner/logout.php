<?php 
    session_start(); 

    //將session清空
    unset($_SESSION['member_id']);
    echo '登出中......';
    echo '<meta http-equiv=REFRESH CONTENT=1;url=home.php>';
?>