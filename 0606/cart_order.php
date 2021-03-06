<?php

		session_start();
        require("connMySQL.php");
		
		$cart = $_POST['cart'];
		$mid = $_SESSION['member_id'];
		
		//order id
		$sql_oid = "SELECT order_id FROM orders WHERE order_id >= ALL(SELECT order_id FROM orders)"; 
		$result_oid = $conn->query($sql_oid);
		$row = $result_oid->fetch_assoc();
		$oid = $row["order_id"] + 1;
		
		foreach($cart as $value)
		{
			$cart_pid = $value;
			
			$sql_p ="SELECT p_name,cart_amount FROM product,cart WHERE p_id = $cart_pid AND cart_pid = $cart_pid AND cart_mid = $mid" ;                     
			$result_p = $conn->query($sql_p);
			$rs_p = $result_p->fetch_assoc();
			
			$amount = $rs_p['cart_amount'];
					
			$sql = "INSERT INTO orders(order_id,order_pid,order_amount,order_mid) VALUES ('$oid','$cart_pid','$amount','$mid')";
			$result = $conn->query($sql);
			if($result)
			{	
				$sql = "DELETE FROM cart WHERE cart_mid = '$mid' AND cart_pid = '$cart_pid'";
				$result = $conn->query($sql);

				echo "成功下單<br>商品名稱：",$rs_p['p_name'],"<br>數量：",$rs_p['cart_amount'],"<br><br>";
			}
			else
			{
			echo "下單失敗";
			}
		}
		echo "<meta http-equiv=REFRESH CONTENT=1;url=member_manage.php?tab='cart'>";
?>
