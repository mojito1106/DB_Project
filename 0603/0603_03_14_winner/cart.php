        <?php

		session_start();
        require("connMySQL.php");
		
		$amount = $_POST['amount'];
		$pid = $_GET['id'];

		if(isset($_SESSION['member_id'])){
			
			$mid = $_SESSION['member_id'];
			
			if($amount != NULL )
			{
				
				$sql_n ="SELECT * FROM cart WHERE cart_mid = $mid AND cart_pid = $pid" ;                     
				$result_n = $conn->query($sql_n);
				
				if($result_n->num_rows > 0)//若購物車裡已有同商品，數量直接加上去
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
				echo "未輸入完全";
				echo "<meta http-equiv=REFRESH CONTENT=1;url=product.php?id=$pid>";
			}
		}
		else{
			echo "未登入，無法加入購物車";
            echo '<meta http-equiv=REFRESH CONTENT=1;url=homelogin.html>';
		}