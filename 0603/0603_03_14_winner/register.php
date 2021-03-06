<?php
		include ("connMySQL.php");
		session_start();
	
        //$name = $_POST['name'];
        $email = $_POST['email'];
        $pw = $_POST['pw'];
        $sex = $_POST['sex'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
		
		
		

        if($email != NULL && $pw != NULL && $sex != NULL && $phone != NULL && $address != NULL)
		{
			$sql_email = "SELECT member_email FROM member "; 
			$result = $conn->query($sql_email);
			for($i=1;$i<=$result->num_rows;$i++){
				$rs = $result->fetch_assoc();
				if($rs['member_email']==$email){
					$flag=1;
					break;
				}
				else $flag=0;
				
		    }
			
			if ($flag==1){
				echo "此帳號已有人註冊";
				echo '<meta http-equiv=REFRESH CONTENT=1;url=homelogin.html>';
			
			}				
			else{
				$sql_id = "SELECT member_id FROM member WHERE member_id >= ALL(SELECT member_id FROM member)"; 
				$result = $conn->query($sql_id);
				$row = $result->fetch_assoc();
				$id = $row["member_id"] + 1;

				if($sex=='Male')
					$sex = 'M';
				else
					$sex = 'F';

				$sql = "INSERT INTO member(member_id,member_email,member_pw,member_sex,member_phone,member_address) VALUES ('$id','$email','$pw','$sex','$phone','$address')"; 
				$result = $conn->query($sql);
				if($result)
				{
					$_SESSION['member_id']=$id;
					echo '註冊成功!';
					echo '<meta http-equiv=REFRESH CONTENT=1;url=home.php>';
				}
				else
				{
					echo "註冊失敗";
					echo '<meta http-equiv=REFRESH CONTENT=1;url=homelogin.html>';
				}
			}
        }
        else
        {
            echo "未輸入完全";
            echo '<meta http-equiv=REFRESH CONTENT=1;url=homelogin.html>';
        }
		
            
?>