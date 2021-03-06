<?php
        session_start();
        include ("connMySQL.php");
        $name = $_POST['name'];
        $pw = $_POST['pw'];
        if($name != NULL && $pw != NULL){
                    $sql ="SELECT member_email,member_pw FROM member WHERE member_email='$name'";                     
                    $result = $conn->query($sql);
                    if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                            if($row["member_email"]==$name&&$row["member_pw"]==$pw){
                                
                                $sql ="SELECT member_id FROM member WHERE member_email='$name'";
                                $result = $conn->query($sql);
                                $row = $result->fetch_assoc();
                                $id = $row["member_id"];
                                
                                
                                $_SESSION['member_id'] = $id;
                                echo "登入成功！ 歡迎使用本系統";
                                echo '<meta http-equiv=REFRESH CONTENT=1;url=home.php>';
                                
                            }else{
                                echo "登入失敗！";
                                echo '<meta http-equiv=REFRESH CONTENT=1;url=homelogin.html>';
                            }
                    }}else{
                        echo "資料庫連接失敗";
                        echo '<meta http-equiv=REFRESH CONTENT=1;url=homelogin.html>';
                    }
        }else{
            echo "未輸入帳號密碼";
            echo '<meta http-equiv=REFRESH CONTENT=1;url=homelogin.html>';
        }
?>
