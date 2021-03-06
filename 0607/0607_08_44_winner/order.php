<?php
		
		session_start();
		include ("connMySQL.php");
	
	
		$amount = $_POST['amount'];
		$pid = $_GET['id'];

		if(isset($_SESSION['member_id'])){
			$mid = $_SESSION['member_id'];
			if($amount != NULL )
			{
				
				$sql_inventory ="SELECT p_inventory FROM product WHERE p_id = $pid";
				$result_inventory = $conn->query($sql_inventory);
				$row_inventory = $result_inventory->fetch_assoc();
				
				if($row_inventory["p_inventory"]>=$amount){
					
					$sql_id = "SELECT order_id FROM orders WHERE order_id >= ALL(SELECT order_id FROM orders)"; 
					$result = $conn->query($sql_id);
					$row = $result->fetch_assoc();
					$id = $row["order_id"] + 1;
					
					$inventory=$row_inventory["p_inventory"]-$amount;
					$sql_inventory ="UPDATE product SET p_inventory='$inventory'  WHERE p_id = $pid";
					$result_inventory = $conn->query($sql_inventory);
					
					$sql = "INSERT INTO orders(order_id,order_pid,order_amount,order_mid) VALUES ('$id','$pid','$amount','$mid')";
					$result = $conn->query($sql);
					if($result)
					{	
						echo '下單成功!';
						echo "<meta http-equiv=REFRESH CONTENT=1;url=product.php?id=$pid>";
					
					}
					else
					{
					echo "下單失敗";
					echo "<meta http-equiv=REFRESH CONTENT=1;url=product.php?id=$pid>";
					}
				}	
				else
				{
				if($row_inventory["p_inventory"]==0)
				{
					echo "此商品已無存貨";
				}			
				else echo "存貨不足";
				echo "<meta http-equiv=REFRESH CONTENT=1;url=product.php?id=$pid>";
				}
			}
			else
			{
				echo "未輸入完全";
				echo "<meta http-equiv=REFRESH CONTENT=1;url=product.php?id=$pid>";
			}
		}
		else{
			echo "未登入，無法下訂單";
            echo '<meta http-equiv=REFRESH CONTENT=1;url=homelogin.html>';
		}
        
		
            
?>