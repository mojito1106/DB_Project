        <?php

		session_start();
        require("connMySQL.php");
		
		$amount = $_POST['amount'];
		$pid = $_GET['id'];

		if(isset($_SESSION['member_id'])){
			
			$mid = $_SESSION['member_id'];
			
			if($amount != NULL )
			{
				$sql = "INSERT INTO cart(cart_mid,cart_pid,cart_amount) VALUES ('$mid','$pid','$amount')";
				$result = $conn->query($sql);
				
				if($result)
				{
					echo '成功加入購物車!';
					echo "<meta http-equiv=REFRESH CONTENT=1;url=cart_test.php>";
				}
				else
				{
					echo "加入購物車失敗";
					echo "mid = $mid , pid = $pid , amount = $amount";
					//echo "<meta http-equiv=REFRESH CONTENT=1;url=product.php?id=$pid>";
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