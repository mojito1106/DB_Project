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
  <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold" >
    <a href="gotocategory.php?category='drinks'" class="w3-bar-item w3-button">飲料</a> 
    <a href="gotocategory.php?category='snack'" class="w3-bar-item w3-button">點心</a>
    <a href="gotocategory.php?category='sauce'" class="w3-bar-item w3-button">調味料</a>
    <a href="gotocategory.php?category='corp'" class="w3-bar-item w3-button">穀類/麥片</a>
    <a href="gotocategory.php?category='meat'" class="w3-bar-item w3-button">肉/家禽</a>
    <a href="gotocategory.php?category='processed'" class="w3-bar-item w3-button">特製品</a>
    <a href="gotocategory.php?category='seafood'" class="w3-bar-item w3-button">海鮮</a>
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
    
    
    
<!-- Product grid -->
    

<?php
if(isset($_SESSION['search']))
{
    $searchitem=$_SESSION['searchitem'];
    $sql ="select * from product where p_name like '%$searchitem%' ";                     
    $result = $conn->query($sql);
?>
    <header class="w3-container w3-xlarge">
    <p class="w3-left">搜尋 "<?php echo $searchitem?>" 結果</p>
    </header>
<?php } 
else
{
    $cate = $_GET['category'];

    $sql ="SELECT * FROM product WHERE p_category = $cate";
    $result = $conn->query($sql);
    //$row = $result->fetch_assoc();
?>
    <header class="w3-container w3-xlarge">
    <p class="w3-left"><?php echo $cate?></p>
    </header>
<?php } ?>

    
    
    
    
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
    
  
    
    
    
</div>   
    
    
    
</body>
</html>