<?php
		include ("connMySQL.php");
		session_start();
	
        $pw = $_POST['pw'];
        $sex = $_POST['sex'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
		
		if($pw != NULL && $sex != NULL && $phone != NULL && $address != NULL)
		{
			if($sex=='Male')
					$sex = 'M';
				else
					$sex = 'F';                

                $email = $_GET['email'];
                $id = $_SESSION['member_id'];
				$sql = "UPDATE member SET member_id='$id',member_email='$email',member_pw='$pw',member_sex='$sex',member_phone='$phone',member_address='$address' WHERE member_id='$id'";
				$result = $conn->query($sql);
				if($result)
				{
					echo '修改成功!';
					echo '<meta http-equiv=REFRESH CONTENT=1;url=member_manage.php>';
				}
				else
				{
					echo "修改失敗";
					echo '<meta http-equiv=REFRESH CONTENT=1;url=member_manage.php>';
				}
        }
        else
        {
            echo "未輸入完全";
            echo '<meta http-equiv=REFRESH CONTENT=1;url=member_manage.php>';
        }
		
            
?>