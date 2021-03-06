<?php
        
        session_start();
        include ("connMySQL.php");

        $content = $_POST['content'];
        $star = $_POST['star'];

		if(isset($_SESSION['member_id']))
        {
			$mid = $_SESSION['member_id'];
			$pid = $_SESSION['product'];

            $sql_id ="SELECT order_id FROM orders WHERE order_pid = $pid AND order_mid = $mid";
			$result_id = $conn->query($sql_id);

            if($result_id->num_rows > 0)
			{
				if($content != NULL && $star != NULL)
				{
					$sql_id = "SELECT comment_id FROM comment WHERE comment_id >= ALL(SELECT comment_id FROM comment)"; 
					$result = $conn->query($sql_id);
					$row = $result->fetch_assoc();
					$id = $row["comment_id"] + 1;
					
					
					$sql = "INSERT INTO comment(comment_id,comment_pid,comment_content,comment_star,comment_mid) VALUES ('$id','$pid','$content','$star','$mid')"; 
					$result = $conn->query($sql);                
					
					
					if($result)
					{
						echo '評價成功!';
						echo "<meta http-equiv=REFRESH CONTENT=1;url=product.php?id=$pid>";
						
					}
					else
					{
						echo "評價失敗";
						echo "<meta http-equiv=REFRESH CONTENT=1;url=product.php?id=$pid>";
					}

				}
				else
				{
                echo "未輸入評價及星等";
                echo "<meta http-equiv=REFRESH CONTENT=1;url=product.php?id=$pid>";
				}
			}
			else
			{
			echo "未下訂單，無法輸入評價";
			echo "<meta http-equiv=REFRESH CONTENT=1;url=product.php?id=$pid>";
			}
        }
        else
        {
            echo "未登入，無法輸入評價";
            echo '<meta http-equiv=REFRESH CONTENT=1;url=homelogin.html>';
            
        }
?>