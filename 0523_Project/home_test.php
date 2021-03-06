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
    <p class="w3-left">New Arrivals</p>

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

  <!-- Image header -->
  <div class="w3-display-container w3-container">
    <img src="https://png.pngtree.com/thumb_back/fh260/back_pic/03/96/76/9357ee07b1326a5.jpg" alt="Jeans" style="width:100%">
    <div class="w3-display-topleft w3-text-white" style="padding:24px 48px">
      <h1 class="w3-jumbo w3-hide-small">New arrivals</h1>
      <h1 class="w3-hide-large w3-hide-medium">New arrivals</h1>
      <h1 class="w3-hide-small">COLLECTION 2018</h1>
      <p><a href="#jeans" class="w3-button w3-black w3-padding-large w3-large">SHOP NOW</a></p>
    </div>
  </div>

  <div class="w3-container w3-text-grey" id="jeans">
    <p>8 items</p>
  </div>

  <!-- Product grid -->
 <?php

require("connMySQL.php");

$sql ="SELECT * FROM product order by p_id";                     
$result = $conn->query($sql);
//$data=mysql_query('select * from guest order by guestTime desc')//讓資料由最新呈現到最舊

for($i=1;$i<=$result->num_rows;$i++){
 $rs = $result->fetch_assoc();
?>

  <div class="w3-display-container w3-container">
    <div class="w3-col l3 s6">
      <div class="w3-container">
        <a href="product.php?id=<?php echo $rs['p_id'];?>">
            <img src="https://i.imgur.com/GIqEmVG.jpg" style="width:100%"></a>
        <p><?php echo $rs['p_name']?><br><b>$<?php echo $rs['p_price']?></b></p>
      </div>
<?php } ?>
      <div class="w3-display-container w3-container">
	    <a href="product.php?id=<?php echo $rs['p_id'];?>">
        <img src="https://pbs.twimg.com/media/CzZv9oGXgAEOZ2Q.jpg" style="width:100%"></a>
        <p>柳橙汁/Orange juice<br><b>$19.99</b></p>
      </div>
    </div>


    <div class="w3-col l3 s6">
      <div class="w3-container">
        <div class="w3-display-container">
          <img src="http://s6.gigacircle.com/media/s6_53c4853da404b.jpg" style="width:100%">
          <span class="w3-tag w3-display-topleft">New</span>
          <div class="w3-display-middle w3-display-hover">
            <button class="w3-button w3-black">Buy now <i class="fa fa-shopping-cart"></i></button>
          </div>
        </div>
        <p>鳳梨汁/Pineapple juice<br><b>$19.99</b></p>
      </div>
      <div class="w3-container">
        <img src="http://i.epochtimes.com/assets/uploads/2014/09/1409032036281962.jpg" style="width:100%">
        <p>檸檬汁/Lemon juice<br><b>$20.50</b></p>
      </div>
    </div>

    <div class="w3-col l3 s6">
      <div class="w3-container">
        <img src="https://s.yimg.com/wb/images/C1C82221CAF4CB33900684AD81A4D566C68E4D85" style="width:100%">
        <p>啤酒/Beer<br><b>$20.50</b></p>
      </div>
      <div class="w3-container">
        <div class="w3-display-container">
          <img src="https://www.itsfun.com.tw/cacheimg/3f/4f/32410b808957112e0476a770e8aa.jpg" style="width:100%">
          <span class="w3-tag w3-display-topleft">Sale</span>
          <div class="w3-display-middle w3-display-hover">
            <button class="w3-button w3-black">Buy now <i class="fa fa-shopping-cart"></i></button>
          </div>
        </div>
        <p>草莓汁/Strawberry juice<br><b class="w3-text-red">$14.99</b></p>
      </div>
    </div>

    <div class="w3-col l3 s6">
      <div class="w3-container">
        <img src="http://img.pcstore.com.tw/~prod/M20060148_big.jpg?pimg=static&P=1428387988" style="width:100%">
        <p>咖啡/Coffee<br><b>$14.99</b></p>
      </div>
      <div class="w3-container">
        <img src="https://www.herdorlife.com/system/photos/paperclips/000/000/846/big/32%E5%86%B7%E6%B3%A1%E8%8C%B6_%E8%8C%89%E8%8E%89%E7%B6%A0%E8%8C%B6_%E6%9D%AF_%E8%8C%B6%E5%8C%85.jpg?1413965437" style="width:100%">
        <p>綠茶/Green tea<br><b>$24.99</b></p>
      </div>
    </div>
  </div>

  <!-- Subscribe section -->
  <div class="w3-container w3-black w3-padding-32">
    <h1>Subscribe</h1>
    <p>To get special offers and VIP treatment:</p>
    <p><input class="w3-input w3-border" type="text" placeholder="Enter e-mail" style="width:100%"></p>
    <button type="button" class="w3-button w3-red w3-margin-bottom">Subscribe</button>
  </div>
  
  <!-- Footer -->
  <footer class="w3-padding-64 w3-light-grey w3-small w3-center" id="footer">
    <div class="w3-row-padding">
      <div class="w3-col s4">
        <h4>Contact</h4>
        <p>Questions? Go ahead.</p>
        <form action="/action_page.php" target="_blank">
          <p><input class="w3-input w3-border" type="text" placeholder="Name" name="Name" required></p>
          <p><input class="w3-input w3-border" type="text" placeholder="Email" name="Email" required></p>
          <p><input class="w3-input w3-border" type="text" placeholder="Subject" name="Subject" required></p>
          <p><input class="w3-input w3-border" type="text" placeholder="Message" name="Message" required></p>
          <button type="submit" class="w3-button w3-block w3-black">Send</button>
        </form>
      </div>

      <div class="w3-col s4">
        <h4>About</h4>
        <p><a href="#">About us</a></p>
        <p><a href="#">We're hiring</a></p>
        <p><a href="#">Support</a></p>
        <p><a href="#">Find store</a></p>
        <p><a href="#">Shipment</a></p>
        <p><a href="#">Payment</a></p>
        <p><a href="#">Gift card</a></p>
        <p><a href="#">Return</a></p>
        <p><a href="#">Help</a></p>
      </div>

      <div class="w3-col s4 w3-justify">
        <h4>Store</h4>
        <p><i class="fa fa-fw fa-map-marker"></i> FOOD</p>
        <p><i class="fa fa-fw fa-phone"></i> XXXXXXXXXX</p>
        <p><i class="fa fa-fw fa-envelope"></i> FOOD@gmail.com</p>
        <h4>We accept</h4>
        <p><i class="fa fa-fw fa-cc-amex"></i> Amex</p>
        <p><i class="fa fa-fw fa-credit-card"></i> Credit Card</p>
        <br>
        <i class="fa fa-facebook-official w3-hover-opacity w3-large"></i>
        <i class="fa fa-instagram w3-hover-opacity w3-large"></i>
        <i class="fa fa-snapchat w3-hover-opacity w3-large"></i>
        <i class="fa fa-pinterest-p w3-hover-opacity w3-large"></i>
        <i class="fa fa-twitter w3-hover-opacity w3-large"></i>
        <i class="fa fa-linkedin w3-hover-opacity w3-large"></i>
      </div>
    </div>
  </footer>

  <div class="w3-black w3-center w3-padding-24">Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-opacity">w3.css</a></div>

  <!-- End page content -->
</div>

<!-- Newsletter Modal -->
<div id="newsletter" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('newsletter').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
      <h2 class="w3-wide">NEWSLETTER</h2>
      <p>Join our mailing list to receive updates on new arrivals and special offers.</p>
      <p><input class="w3-input w3-border" type="text" placeholder="Enter e-mail"></p>
      <button type="button" class="w3-button w3-padding-large w3-red w3-margin-bottom" onclick="document.getElementById('newsletter').style.display='none'">Subscribe</button>
    </div>
  </div>
</div>

<script>
// Accordion 
function myAccFunc() {
    var x = document.getElementById("demoAcc");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}

// Click on the "Jeans" link on page load to open the accordion for demo purposes
document.getElementById("myBtn").click();


// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}
</script>

</body>
</html>