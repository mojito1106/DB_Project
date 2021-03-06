<?php

		session_start();
        require("connMySQL.php");
		
		$cart = $_POST['cart'];
		
		foreach($cart as $value)
		{

		$cart_pid = $_GET['id'];
		$mid = $_SESSION['member_id'];
		
		$sql_p ="SELECT p_name,cart_amount FROM product,cart WHERE p_id = $cart_pid AND cart_pid = $cart_pid" ;                     
		$result_p = $conn->query($sql_p);
		$rs_p = $result_p->fetch_assoc();
				
		$sql = "DELETE FROM cart WHERE cart_mid = '$mid' AND cart_pid = '$cart_pid'";
		$result = $conn->query($sql);
				
		if($result)
		{	//檢查存貨
			$sql_inv ="SELECT p_inventory FROM product WHERE p_id = $cart_pid";
			$result_inv = $conn->query($sql_inv);
			$row_inv = $result_inv->fetch_assoc();
			//加回數量
			$inventory=$row_inv["p_inventory"]+$rs_p['cart_amount'];
			$sql_inventory ="UPDATE product SET p_inventory='$inventory'  WHERE p_id = $cart_pid";
			$result_inventory = $conn->query($sql_inventory);
			
			echo '刪除成功<br>';
			echo "商品名稱：",$rs_p['p_name'],"<br>數量：",$rs_p['cart_amount'];
		}
		else
		{
			echo "刪除失敗";
			
		}
		echo "<meta http-equiv=REFRESH CONTENT=1;url=member_manage.php?tab='cart'>";
?>
