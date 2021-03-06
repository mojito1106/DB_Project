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
    <h3 class="w3-wide"><b>FOOD</b></h3>
  </div>
  <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
    <a href="#" class="w3-bar-item w3-button">飲料</a>
    <a href="#" class="w3-bar-item w3-button">點心</a>
    <a href="#" class="w3-bar-item w3-button">調味料</a>
    <a href="#" class="w3-bar-item w3-button">日用品</a>
    <a href="#" class="w3-bar-item w3-button">穀類/麥片</a>
    <a href="#" class="w3-bar-item w3-button">肉/家禽</a>
    <a href="#" class="w3-bar-item w3-button">特製品</a>
    <a href="#" class="w3-bar-item w3-button">海鮮</a>
  </div>
<a href="#footer" class="w3-bar-item w3-button w3-padding">Contact</a> 
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding" onclick="document.getElementById('newsletter').style.display='block'">Newsletter</a> 
  <a href="#footer"  class="w3-bar-item w3-button w3-padding">Subscribe</a>
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
  
  <!-- Top header -->
  <!-- Add icon library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    
<header class="w3-container w3-xlarge">
<?php
        session_start();
        include ("connMySQL.php");
        if(isset($_SESSION['member_id'])){
?>
            <form action="logout.php">
                <p class="w3-right">
                <button class="btn" id="logout"><i class="fa fa-user-circle"></i> Logout</button>
                <i class="fa fa-shopping-cart w3-margin-right"></i>
                <i class="fa fa-search"></i>
                </p>   
            </form>
<?php   } 
        else
        { 
?>
            <form action="homelogin.html">
                <p class="w3-right">
                    <button class="btn" id="login"><i class="fa fa-user-circle"></i> Login</button>
                    <i class="fa fa-shopping-cart w3-margin-right"></i>
                    <i class="fa fa-search"></i>
                 </p>   
            </form>
<?php   } ?>
</header>
    

      
<header>
<?php

require("connMySQL.php");

$p_id = $_GET['id'];

$sql ="SELECT * FROM product WHERE p_id = $p_id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

//$data=mysql_query('select * from guest order by guestTime desc')//讓資料由最新呈現到最舊

?>

    <div class="w3-col" style="width:350px">
    <div class="w3-container">
        
        <img src="https://i.imgur.com/GIqEmVG.jpg" style="width:100%">
        
    </div>
    </div>
    
    <div class="w3-padding-64 w3-large w3-text-black" style="font-weight:bold">

	商品名稱 : <?php echo $row['p_name']?><br><br>
    商品價錢 : $<?php echo $row['p_price']?><br><br>
    數量 : <?php echo $row['p_inventory']?> <br>
    <form >
        <p>
        <button class="btn" id="buy"> 立即購買</button>
        </p>   
    </form>
        
    <form >
    <p>
    <button class="btn" id="cart"> 放入購物車</button>
    </p>   
    </form>
    <br>
    平均星等 : 
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
</style>
    

<div class="container">
 <div class="top">
    <h3>新增留言</h3>
    </div>
    <form id="form1" name="form1" method="post" action="" class="form-horizontal">
        
        
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
              <textarea name="guestContent" class="form-control" id="guestContent" rows="5"></textarea>
          </div>
        </div>
        <div class="button">
            <input type="submit" name="button" id="button" value="送出" class="btn"/>
        </div>
    </form>
    
</div>

    
    
<br><br><br><br>

<style>
table {
  border: 1px solid #ccc;
  border-collapse: collapse;
  /* margin: 100; */
  padding: 0;
  width: 80%;
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
}
</style>
<?php

require("connMySQL.php");

$sql ="SELECT member_email FROM comment,member WHERE member_id = comment_mid";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$member_email = $row["member_email"];

$sql ="SELECT * FROM comment order by comment_id";                     
$result = $conn->query($sql);
//$data=mysql_query('select * from guest order by guestTime desc')//讓資料由最新呈現到最舊

for($i=1;$i<=$result->num_rows;$i++){
 $rs = $result->fetch_assoc();
?>
      
      <table align="center">
            <tr>
              <td width="200px"><?php echo $rs['comment_id']?></td>
            </tr>
            
            <tr>
              <td width="200px">會員</td>
              <td><?php echo $member_email?></td>
            </tr>
            <tr>
              <td width="200px">內容</td>
              <td><?php echo $rs['comment_content']?></td>
            </tr>
            <tr>
              <td width="200px">打星等</td>
              <td ><?php echo $rs['comment_star']?></td>
            </tr>
            
        </table>

<br />
<?php } ?>
    
    
</div>
</body>
</html>