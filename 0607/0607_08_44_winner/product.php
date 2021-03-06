<!DOCTYPE html>


<html>
<title>FOOD.com</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
.w3-sidebar a {font-family: "Roboto", sans-serif}
body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}
</style>
<body class="w3-content" style="max-width:1200px">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
  <div class="w3-container w3-display-container w3-padding-16">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
    <h3 class="w3-wide"><b><a href="home.php">FOOD</a></b></h3>
  </div>
  <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
    <a href="category.php?category='drinks'" class="w3-bar-item w3-button">飲料</a> 
    <a href="category.php?category='snack'" class="w3-bar-item w3-button">點心</a>
    <a href="category.php?category='sauce'" class="w3-bar-item w3-button">調味料</a>
    <a href="category.php?category='corp'" class="w3-bar-item w3-button">穀類/麥片</a>
    <a href="category.php?category='meat'" class="w3-bar-item w3-button">肉/家禽</a>
    <a href="category.php?category='processed'" class="w3-bar-item w3-button">特製品</a>
    <a href="category.php?category='seafood'" class="w3-bar-item w3-button">海鮮</a>
  </div>

<div>
<?php
        session_start();
        if(isset($_SESSION['member_id'])){
?>
    <div class="w3-display-bottomleft" style="width:250px">
    <a href="member_manage.php" class="w3-bar-item w3-button w3-padding">會員中心</a> 
<?php } ?>
    <a href="#footer" class="w3-bar-item w3-button w3-padding">Contact Us</a> 
        <br>
    </div>
</div>
    
</nav>

<!-- Top menu on small screens -->
<header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
  <div class="w3-bar-item w3-padding-24 w3-wide">LOGO</div>
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></a>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:250px">

  <!-- Push down content on small screens -->
  <div class="w3-hide-large" style="margin-top:83px"></div>
  
    
<br>
  <!-- Top header -->
  <!-- Add icon library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    
<header class="w3-container w3-xlarge">
<?php
        include ("connMySQL.php");
        if(isset($_SESSION['member_id'])){
?>
    
            <form action="logout.php">
                <p class="w3-right">
                <button class="btn  w3-button w3-black w3-padding-large w3-large" id="logout"><i class="fa fa-user-circle"></i> Logout</button>
                </p>   
            </form>
    
            <form id="form1" name="form1" method="post" action="member_manage.php?tab='cart'">
                <p class="w3-right">
                    <button type="submit" name="button" id="button" class="btn w3-button w3-black w3-padding-large w3-large w3-margin-right">
                    <i class="fa fa-shopping-cart"></i></button>
                </p>
            </form>
    
            <form id="form1" name="form1" method="post" action="search.php">
                <p class="w3-right">
                    <input name="search" type="text" id="search"/>
                    <button type="submit" name="button" id="button" class="btn w3-button w3-black w3-padding-large w3-large w3-margin-right">
                    <i class="fa fa-search"></i></button>
                </p>
            </form>
    
            
<?php   } 
        else
        { 
?>
            <form action="homelogin.html">
                <p class="w3-right">
                    <button class="btn w3-button w3-black w3-padding-large w3-large" id="login"><i class="fa fa-user-circle"></i> Login</button>  
                 </p>   
            </form>
            
            <form id="form1" name="form1" method="post" action="search.php">
                <p class="w3-right">
                    <input name="search" type="text" id="search"/>
                    <button type="submit" name="button" id="button" class="btn w3-button w3-black w3-padding-large w3-large w3-margin-right">
                    <i class="fa fa-search"></i></button>
                </p>
            </form>
    
    
<?php   } ?>
</header>
    

    
      
<header>
    <div class="w3-col" style="width:350px">
    <div class="w3-container">
    
    <?php
        $p_id = $_GET['id'];

        $sql ="SELECT * FROM product WHERE p_id = $p_id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();    
        
        //平均星等
        $sqlstar ="SELECT comment_star FROM comment WHERE comment_pid = $p_id";
        $resultstar = $conn->query($sqlstar);
        $totalstar=0;
        
        for($i=1;$i<=$resultstar->num_rows;$i++){
            $rs = $resultstar->fetch_assoc();
            $totalstar += $rs['comment_star'];
        }
        
        if($resultstar->num_rows == 0)
            $averagestar = 0;
        else
            $averagestar = round($totalstar/$resultstar->num_rows,1);
        
    ?>
        <br><br>
        <img src="<?php echo $row["p_image"]?>" style="width:100%">
        
    </div>
    </div>
    
    <div class="w3-padding-64 w3-large w3-text-black" style="font-weight:bold">
    商品名稱 : <?php echo $row["p_name"]; ?><br><br>
    商品價錢 : $<?php echo $row["p_price"]; ?><br><br>
    
    <form id="order" name="order" method="post" action=" ">
        <p>
        數量 : <input class="input100" type="text" name="amount"><br><br>
		
        <button class="btn" id="buy" onClick="this.form.action='order.php?id=<?php echo $p_id ?>';this.form.submit();"> 立即購買</button>

		<button class="btn" id="cart" onClick="this.form.action='cart.php?id=<?php echo $p_id ?>';this.form.submit();"> 放入購物車</button>
		</p>
    </form>

    <br>
    
    平均星等 : <?php 
                    if($averagestar==0)
                        echo '尚未有評價';
                    else
                        echo $averagestar; ?>
	<br>
	<br>
	商品存貨:<?php echo  $row["p_inventory"]; ?>
    </div>
</header>
    
    
    
<header>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>我要留言</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</header>
    


<style>
 .container{
  margin:auto;
  background-color:#f5f5f5;
  width:800px;
  padding-bottom: 20px;
 }
 .button{
  text-align:center;
  padding:20px 0;
 }
 .top h3{
  font-family:微軟正黑體;
  text-align:center;
  padding:10px 0;
 }
 .form-group{
  font-family:微軟正黑體;
  font-size:16px;
 }
/* Style the tab */
.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
    width:800px;
    margin:auto;
}

/* Style the buttons inside the tab */
.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
    border: 1px solid #ddd;
}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 10px 0px ;
    
    border-top: none;
    width:800px;
    margin:auto;
}
table {
          border: 1px solid #ccc;
          border-collapse: collapse;
          /* margin: 100; */
          padding: 0;
          width:800px;
          table-layout: fixed; 
        }

        table caption {
          font-size: 1.5em;
          margin: .5em 0 .75em;
        }

        table tr {
          background-color: #f8f8f8;
          border: 1px solid #ddd;
          padding: .35em;
        }

        table th,
        table td {
          padding: .625em;
          text-align: center;
          font-size: 16px;
        }

        table th {
          font-size: .85em;
          letter-spacing: .1em;
          text-transform: uppercase;
        }

        @media screen and (max-width: 600px) {
          table {
            border: 0;
          }

          table caption {
            font-size: 1.3em;
          }

          table thead {
            border: none;
            clip: rect(0 0 0 0);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute;
            width: 1px;
          }

          table tr {
            border-bottom: 3px solid #ddd;
            display: block;
            margin-bottom: .625em;
          }

          table td {
            border-bottom: 1px solid #ddd;
            display: block;
            font-size: .8em;
            text-align: right;
          }

          table td::before {
            /*
            * aria-label has no advantage, it won't be read inside a table
            content: attr(aria-label);
            */
            content: attr(data-label);
            float: left;
            font-weight: bold;
            text-transform: uppercase;
          }

          table td:last-child {
            border-bottom: 0;
          }
</style>
    
      
    
<div class="tab">
    <button class="w3-bar-item w3-button tablink w3-grey" style="width:50%" onclick="openCity(event,'comment')">留言評價</button>
    <button class="w3-bar-item w3-button tablink" style="width:50%" onclick="openCity(event,'qa')">問與答</button>
</div>

<div id="comment" class="w3-container city">
  
    <?php //---------------------------------------------------------------------------------------------------------------------------------- ?>
    
            <div class="container">
         <div class="top">
            <h3>新增評價</h3>
            </div>
            <form id="form1" name="form1" method="post" action="comment.php" class="form-horizontal">


                <div class="form-group">
                    <label for="guestGender" class="col-sm-4 control-label">星等：</label>
                    <label class="radio-inline">
                        <input type="radio" name="star" id="radio" value="1" /> 1
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="star" id="radio2" value="2" />2
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="star" id="radio2" value="3" />3
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="star" id="radio2" value="4" />4
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="star" id="radio2" value="5" checked>5
                    </label>
                </div>

                <div class="form-group">
                  <label for="guestContent" class="col-sm-4 control-label">留言內容：</label>
                  <div class="col-sm-6">
                      <textarea name="content" class="form-control" id="content" rows="5"></textarea>
                  </div>
                </div>
                <div class="button">
                    <input type="submit" name="button" id="button" value="送出" class="btn" <?php $_SESSION['product'] = $p_id; ?>/>
                </div>
            </form>

        </div>
    
        <br><br>

    
        <?php


        function hidestr($name, $start = 0, $length = 0, $re = '*') {
            if (empty($name)) return false;
            $strarr = array();
            $mb_strlen = mb_strlen($name);
            while ($mb_strlen) {
                $strarr[] = mb_substr($name, 0, 1, 'utf8');
                $name = mb_substr($name, 1, $mb_strlen, 'utf8');
                $mb_strlen = mb_strlen($name);
            }
            $strlen = count($strarr);
            $begin  = $start >= 0 ? $start : ($strlen - abs($start));
            $end    = $last   = $strlen - 1;
            if ($length > 0) {
                $end  = $begin + $length - 1;
            } elseif ($length < 0) {
                $end -= abs($length);
            }
            for ($i=$begin; $i<=$end; $i++) {
                $strarr[$i] = $re;
            }
            if ($begin >= $end || $begin >= $last || $end > $last) return false;
            return implode('', $strarr);
        }

        ?>
    
        <?php

        require("connMySQL.php");

        $sql ="SELECT * FROM comment where comment_pid = '$p_id' order by comment_id" ;                     
        $result = $conn->query($sql);
        //$data=mysql_query('select * from guest order by guestTime desc')//讓資料由最新呈現到最舊

        $sql_email ="SELECT member_email,comment_id FROM comment,member WHERE member_id = comment_mid AND comment_pid = '$p_id' order by comment_id";
        $result_email = $conn->query($sql_email);

        for($i=1;$i<=$result->num_rows;$i++){
         $rs = $result->fetch_assoc();
         $row_email = $result_email->fetch_assoc();
                //$member_email = $row_email['member_email'];
        ?>

              <table align="center" style="width:775px">
                    <tr>
                        <td width="200px"><?php echo $i?></td>
                    </tr>

                    <tr>
                      <td width="200px">評價內容</td>
                      <td><?php echo $rs['comment_content']?></td>
                    </tr>
                    <tr>
                      <td width="200px">星等</td>
                      <td ><?php    $star = $rs['comment_star'];
                                    for($ii=0;$ii<$star;$ii++){ ?>
                                        <font size="4">★</font>
                          <?php } ?>
                      </td>
                    </tr>
                    <tr>
                      <td width="200px">會員</td>
                      <td><?php
                        list($name, $domain) = explode('@', $row_email['member_email']);
                        echo hidestr($name, 1, -1) . '@' . hidestr($domain, 0,-4 ); 
                    ?></td>
                    </tr>


                </table>
                <br>
    
        <?php } ?>

        
    <?php //---------------------------------------------------------------------------------------------------?>
    
</div>

<div id="qa" class="w3-container city" style="display:none">
  
    <?php //---------------------------------------------------------------------------------------------------------------------------------- ?>
    
            <div class="container">
         <div class="top">
            <h3>提問</h3>
            </div>
            <form id="form1" name="form1" method="post" action="QA.php" class="form-horizontal">

                <div class="form-group">
                  <label for="guestContent" class="col-sm-4 control-label">提問內容：</label>
                  <div class="col-sm-6">
                      <textarea name="qacontent" class="form-control" id="qacontent" rows="5"></textarea>
                  </div>
                </div>
                <div class="button">
                    <input type="submit" name="button" id="button" value="送出" class="btn" <?php $_SESSION['product'] = $p_id; ?>/>
                </div>
            </form>

        </div>
    
        <br><br>
    
    
        <?php


        $sql ="SELECT * FROM qa where qa_pid = '$p_id' order by qa_id" ;                     
        $result = $conn->query($sql);
        //$data=mysql_query('select * from guest order by guestTime desc')//讓資料由最新呈現到最舊

        $sql_email ="SELECT member_email,qa_id FROM qa,member WHERE member_id = qa_mid AND qa_pid = '$p_id' order by qa_id";
        $result_email = $conn->query($sql_email);

        for($i=1;$i<=$result->num_rows;$i++){
         $rs = $result->fetch_assoc();
         $row_email = $result_email->fetch_assoc();
                //$member_email = $row_email['member_email'];
        ?>

              <table align="center" style="width:775px">
                    <tr>
                      <td width="200px"><?php echo $i?></td>
                    </tr>

                    <tr>
                      <td width="200px">會員</td>
                      <td><?php
                        list($name, $domain) = explode('@', $row_email['member_email']);
                        echo hidestr($name, 1, -1) . '@' . hidestr($domain, 0,-4 ); 
                    ?></td>
                    </tr>
                    <tr>
                      <td width="200px">內容</td>
                      <td><?php echo $rs['qa_content']?></td>
                    </tr>


                </table>
                <br>
    
        <?php } ?>
    
    <?php //---------------------------------------------------------------------------------------------------------------------------------- ?>
    
</div>
    
    
<script> 
function openCity(evt, cityName) {
    var i, x, tablinks;
  x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" w3-grey", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " w3-grey";
}
</script>
    
    

    
    
</div>
</body>
</html>