<!DOCTYPE html>


<html>
<style>
.w3-sidebar a {font-family: "Roboto", sans-serif}
body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family:微軟正黑體; sans-serif;}
</style>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body class="w3-content" style="max-width:1200px">

        <?php
		session_start();
        require("connMySQL.php");
		
		$mid = $_SESSION['member_id'];
		$pid = $_SESSION['product'];
		
		$sql ="SELECT * FROM cart WHERE cart_mid = $mid" ;                     
        $result = $conn->query($sql);

        $sql_p ="SELECT p_name, p_price FROM cart, product WHERE  p_id = cart_pid";
        $result_p = $conn->query($sql_p);

        for($i=1;$i<=$result->num_rows;$i++){
         $rs = $result->fetch_assoc();
		 $rs_p = $result_p->fetch_assoc();
        ?>

              <table align="center" style="width:775px">
                    <tr>
                      <td width="200px"><?php echo $i?></td>
                    </tr>

                    <tr>
                      <td width="200px">商品名稱</td>
                      <td><?php echo $rs_p['p_name']?></td>
                    </tr>
                    <tr>
                      <td width="200px">價格</td>
                      <td ><?php echo $rs_p['p_price'];?></td>
                    </tr>
                    <tr>
                      <td width="200px">數量</td>
                       <td ><?php echo $rs['cart_amount'];?></td>
                    </tr>


                </table>
                <br>
    
        <?php } ?>
		<?php echo "<meta http-equiv=REFRESH CONTENT=1;url=product.php?id=$pid>";?>
</body>
</html>	