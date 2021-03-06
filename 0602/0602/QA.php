<?php
        
        session_start();
        include ("connMySQL.php");
    
        $content = $_POST['qacontent'];

        if(isset($_SESSION['member_id']))
        {
            $mid = $_SESSION['member_id'];
            if($content != NULL)
            {
                $sql_id = "SELECT qa_id FROM qa WHERE qa_id >= ALL(SELECT qa_id FROM qa)"; 
                $result = $conn->query($sql_id);
                $row = $result->fetch_assoc();
                $id = $row["qa_id"] + 1;
                
                $pid = $_SESSION['product'];

                $sql = "INSERT INTO qa(qa_id,qa_pid,qa_content,qa_mid) VALUES ('$id','$pid','$content','$mid')"; 
                $result = $conn->query($sql);                
                
                
                if($result)
                {
                    echo '提問成功!';
                    echo "<meta http-equiv=REFRESH CONTENT=1;url=product.php?id=$pid>";
                    
                }
                else
                {
                    echo "提問失敗";
                    echo "<meta http-equiv=REFRESH CONTENT=1;url=product.php?id=$pid>";
                }

            }
            else
            {
                echo "未輸入提問內容";
                echo "<meta http-equiv=REFRESH CONTENT=1;url=product.php?id=$pid>";
            }
        }
        else
        {
            echo "未登入，無法提問";
            echo '<meta http-equiv=REFRESH CONTENT=1;url=homelogin.html>';
            
        }
?>