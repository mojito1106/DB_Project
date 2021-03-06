        <?php

		session_start();
        require("connMySQL.php");
		
		$amount = $_POST['amount'];
		$pid = $_GET['id'];

		if(isset($_SESSION['member_id'])){
			
			$mid = $_SESSION['member_id'];
			
			if($amount != NULL )
			{	//若商品存貨足夠才可加入購物車
				$sql_inventory ="SELECT p_inventory FROM product WHERE p_id = $pid";
				$result_inventory = $conn->query($sql_inventory);
				$row_inventory = $result_inventory->fetch_assoc();
				
				if($row_inventory["p_inventory"]>=$amount)
				{	
					//存貨減少
					$inventory=$row_inventory["p_inventory"]-$amount;
					$sql_inventory ="UPDATE product SET p_inventory='$inventory'  WHERE p_id = $pid";
					$result_inventory = $conn->query($sql_inventory);
			
					//若購物車裡已有同商品，數量直接加上去
					$sql_n ="SELECT * FROM cart WHERE cart_mid = $mid AND cart_pid = $pid" ;                     
					$result_n = $conn->query($sql_n);
					
					if($result_n->num_rows > 0)
					{
						$rs_n = $result_n->fetch_assoc();
						$amount = $rs_n['cart_amount'] + $amount;
						
						$sql = "UPDATE cart SET cart_amount = $amount WHERE cart_pid = $pid";
						$result = $conn->query($sql);
					}
					else//INSERT 進 cart
					{
					$sql = "INSERT INTO cart(cart_mid,cart_pid,cart_amount) VALUES ('$mid','$pid','$amount')";
					$result = $conn->query($sql);
					
					}
					
					if($result)
					{
						echo '成功加入購物車!';
						echo "<meta http-equiv=REFRESH CONTENT=1;url=product.php?id=$pid>";
					}
					else
					{
						echo "加入購物車失敗";
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
			echo "未登入，無法加入購物車";
            echo '<meta http-equiv=REFRESH CONTENT=1;url=homelogin.html>';
		}
		?>