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
<?php
        session_start();
        include ("connMySQL.php");
        
        unset($_SESSION['search']); 
        unset($_SESSION['searchitem']); 
?>
  <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
    <a href="category.php?category='drinks'" class="w3-bar-item w3-button">飲料</a> 
    <a href="category.php?category='snack'" class="w3-bar-item w3-button">點心</a>
    <a href="category.php?category='sauce'" class="w3-bar-item w3-button">調味料</a>
    <a href="category.php?category='corp'" class="w3-bar-item w3-button">穀類/麥片</a>
    <a href="category.php?category='meat'" class="w3-bar-item w3-button">肉/家禽</a>
    <a href="category.php?category='processed'" class="w3-bar-item w3-button">特製品</a>
    <a href="category.php?category='seafood'" class="w3-bar-item w3-button">海鮮</a>
  </div>
    
<div class="w3-display-bottomleft" style="width:250px">
<?php
        if(isset($_SESSION['member_id'])){
?>
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
    <p class="w3-left">New Arrivals</p>

<?php
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
    <!--<p>8 items</p>-->
  </div>
    <br>

    
<?php
    $sql ="select * from product ";                     
    $result = $conn->query($sql);
?>
    
    
<div class="w3-display-container w3-container">
    <?php
      for($i=1;$i<=$result->num_rows;$i++){
        $rs = $result->fetch_assoc();
    ?>
        <div class="w3-col l3 s6">
            <div class="w3-container">
                <a href="product.php?id=<?php echo $rs['p_id'];?>">
                    <img src="<?php echo $rs['p_image']?>" style="width:100%">
                </a>
                <p><?php echo $rs['p_name']?><br><b>$<?php echo $rs['p_price']?></b></p>
            </div>
        </div>
    <?php } ?>
</div> 
 

        

<!--
   Subscribe section 
  <div class="w3-container w3-black w3-padding-32">
    <h1>Subscribe</h1>
    <p>To get special offers and VIP treatment:</p>
    <p><input class="w3-input w3-border" type="text" placeholder="Enter e-mail" style="width:100%"></p>
    <button type="button" class="w3-button w3-red w3-margin-bottom">Subscribe</button>
  </div>
  
   Footer 
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

  <div class="w3-black w3-center w3-padding-24">Powered by group12</div>

   End page content 
</div>

 Newsletter Modal 
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
-->

<br><br><br><br><br><br>
    
    
</div>
</body>
</html>