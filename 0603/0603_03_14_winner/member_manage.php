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
      <button class="w3-bar-item w3-button tablink <?php if(!isset($_GET['tab'])){ ?> w3-red <?php } ?>" onclick="openCity(event, 'member_manange')">會員資料/修改</button>
      <button class="w3-bar-item w3-button tablink <?php if(isset($_GET['tab'])){ ?> w3-red <?php } ?>" onclick="openCity(event, 'cart')">購物車</button>
      <button class="w3-bar-item w3-button tablink" onclick="openCity(event, 'order')">訂單紀錄</button>
    </div>
    
    
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
     
<style>
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
          border: 1px solid #ddd;
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
.button{
  text-align:center;
  padding:20px 0;
 }
.container{
  margin:auto;
  background-color:#f5f5f5;
  width:800px;
  padding-bottom: 20px;
 }
            
</style>

<div style="margin-left:20px">
<div id="member_manange" class="w3-container city" <?php if(isset($_GET['tab'])){ ?> style="display:none" <?php } ?>  >
    <h2>會員資料</h2>
    <?php
        $id = $_SESSION['member_id'];
        $sql ="SELECT * FROM member WHERE member_id='$id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    ?>
    <table style="width:900px">
        <tr>
            <td width="100px">會員帳號</td>
            <td><?php echo $row["member_email"] ?></td>
        </tr>

        <tr>
            <td width="100px" >密碼</td>
            <td><?php echo $row["member_pw"] ?></td>
        </tr>
        <tr>
            <td width="100px">性別</td>
            <td><?php echo $row["member_sex"] ?></td>
        </tr>
        <tr>
            <td width="100px">電話</td>
            <td><?php echo $row["member_phone"] ?></td>
        </tr>
        <tr>
            <td width="100px">住址</td>
            <td><?php echo $row["member_address"] ?></td>
        </tr>
    </table>
    <h2>修改</h2> 
    <form action="member_modify.php?email=<?php echo $row["member_email"] ?>" method="post">
    <table style="width:900px">

        <tr>
            <td width="100px" >密碼</td>
            <td><input class="input100" type="text" name="pw" placeholder="<?php echo $row["member_pw"] ?>" style="width:550px"></td>
        </tr>
        <tr>
            <td width="100px">性別</td>
            <td>
                    <input type="radio" name="sex" value="Male" checked > Male &nbsp;&nbsp;
                    <input type="radio" name="sex" value="Female"> Female
            </td>
        </tr>
        <tr>
            <td width="100px">電話</td>
            <td><input class="input100" type="text" name="phone" placeholder="<?php echo $row["member_phone"] ?>" style="width:550px"></td>
        </tr>
        <tr>
            <td width="100px">住址</td>
            <td><input class="input100" type="text" name="address" placeholder="<?php echo $row["member_address"] ?>" style="width:550px"></td>
        </tr>
    </table>
        <p class="w3-right"><a size="10px">*每一欄都要填寫</a></p> 
        <div class="button" style="padding:20px 0">
            <input type="submit" name="button" id="button" value="送出修改" class="btn"/>
        </div>
    </form>
    <br><br><br>
    
  </div>    
    
<div id="cart" class="w3-container city" <?php if(!isset($_GET['tab'])){ ?> style="display:none" <?php } ?> >
    <h2>購物車</h2> 
	 
	 <?php 
		$mid = $_SESSION['member_id'];
		$pid = $_SESSION['product'];
		$totalprice = 0;

        $sql_p ="SELECT * FROM cart, product WHERE  cart_mid = $mid AND p_id = cart_pid";
        $result_p = $conn->query($sql_p);?>
	
    
    <table style="width:900px">

		<tr>
            <th width="50px"></th>
			<th width="50px"></th>
			<th width="100px">商品名稱</th> 
			<th width="100px">價格</th> 
			<th width="100px">數量</th>
			<th width="100px">小計</th>
		</tr>
		
		<?php
        for($i=1;$i<=$result_p->num_rows;$i++){

		 $rs_p = $result_p->fetch_assoc();
		 $cart_pid = $rs_p['cart_pid'];
		?>
		<form  method="post" action="cart_test.php">
		 <tr>
				<td>
				<input type="checkbox" name="cart[]" value="<?php echo $cart_pid ?>">
				</td>
				<td>
				<input type="submit"value="刪除" class="btn" onClick="this.form.action='cart_delete.php?id=<?php echo $cart_pid ?>';this.form.submit();"/>
				</td>
				<td><?php echo $rs_p['p_name'];?></td>
				<td><?php echo $rs_p['p_price'];?></td>
				<td><?php echo $rs_p['cart_amount'];?></td>
				<td><?php echo $rs_p['p_price']*$rs_p['cart_amount'];?></td>

                    
                </td>
		 </tr>
		 
     <?php
		$totalprice += $rs_p['p_price']*$rs_p['cart_amount'];
	 } ?>
		<tr>
			<th><input type="submit" name="button" id="button" value="勾選刪除" class="btn"/></th>
			<th></th>
			<th colspan="2"></th>
			<th >總計</th>
			<th><?php echo $totalprice;?></th>
		</tr>
	 
	     </form>	 
		 
    </table>
	<br>
	 
	<br><br><br>
	<a href="product.php?id=<?php echo $_SESSION['product'] ?>" class="w3-bar-item w3-button">繼續購物</a> 

  </div>


  <div id="order" class="w3-container city" style="display:none">
    <h2>訂單紀錄</h2>
    <p>Tokyo is the capital of Japan.</p>
    <p>It is the center of the Greater Tokyo Area, and the most populous metropolitan area in the world.</p>
  </div>
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
      tablinks[i].className = tablinks[i].className.replace(" w3-red", ""); 
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " w3-red";
}
</script>
    
    
    
    
    
    
    </div>
    </body>
</html>
    