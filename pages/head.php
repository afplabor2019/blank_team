<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GamerZ</title>
    <link rel="stylesheet" href="style/app.css">
    <link rel="stylesheet" href="style/footer.css">
    <link rel="stylesheet" href="style/login.css">
    <link rel="stylesheet" href="style/register.css">
    <link rel="stylesheet" href="style/home.css">
    <link rel="stylesheet" href="style/product.css">
    <link rel="stylesheet" href="style/profile.css">
    <link rel="stylesheet" href="style/filter.css">
    <link rel="stylesheet" href="style/header.css">
    <link rel="stylesheet" href="style/rating.css">
    <link rel="stylesheet" href="style/pwchanging.css">
    <link rel="stylesheet" href="style/shoppingcart.css">
    <link rel="stylesheet" href="style/contact.css">
    <link rel="stylesheet" href="style/buy.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   
</head>
<body>
<?php
  include_once "lib/config.php";
  include_once "lib/functions.php";
  $sql = new SQL();
  if(isset($_SESSION['user_id']))
  $profilepic = $sql->execute("SELECT `profile_pic` FROM `users` WHERE id = ?",$_SESSION['user_id']);
  else
  $profilepic = "images\\profilepic\\user.jpg";

  if(loggedIn()){
    $id= $_SESSION['user_id'];
  }else{
    $id = $_SESSION['guest_user_id'];
  }
  $cartCounttemp = $sql->execute("SELECT COUNT(*) AS `count` FROM `orders` WHERE `user_id` = ?",$id);
  if($cartCounttemp[0]['count'] ==0){
    $cartCount = 0;
  }else{
    $cartCount = $cartCounttemp[0]['count'];
  }

?>   
<header class="header">
  <div class="upper-row">
      <div class="upper-row-left-side">
        <a class="mainlogo" href ="<?php echo url('home') ?>">GamerZ</a>

      <div class="upper-row-right-side">
      <div class="popup" onclick="myFunction2()" style="display:inline;margin:0;padding:0;">
                      <?php if(!loggedIn()) : ?>
                        <span class="popuptext" id="myPopup">
                          <a href="<?php echo url('login') ?>"> Login</a><br>
                          <a href="<?php echo url('register') ?>"> Register</a>
                        </span>
                      <?php else : ?>
                        <span class="popuptext" id="myPopup">
                          <a href="<?php echo url('profile') ?>"> Profile</a><br>
                          <a href="<?php echo isset($_GET['p']) ? $_SERVER['REQUEST_URI']."&e=1": $_SERVER['REQUEST_URI']."?p=home&e=1" ;?>"> Log out</a>
                        </span>
                      <?php endif; ?>
                        <img src="<?php echo isset($_SESSION['user_id']) ? $profilepic[0]['profile_pic'] : $profilepic ?>" class ="login-img" alt="Profile">
                    </div>
                    <a href ="<?php echo url('shoppingcart') ?>"><img src="images/cart2.png" alt="Shopping cart" class="shoppingcart-img">
                    <span style="<?php echo $cartCount ==0 ? "display:none" : "" ?>"><?php echo $cartCount ?></span></a> 
                  </div>
        </div>
      </div>         
    </div>
  <div class="topnav" id="myTopnav">
                      <a href="<?php echo url('home') ?>" <?php echo $page == 'home' ? 'class="active"' : ''; ?>>Home</a>
                      <a href="<?php echo url('products') ?>" <?php echo $page == 'products' ? 'class="active"' : ''; ?>>Products</a>
                      <div class="dropdown">
                        <button class="dropbtn">Platform 
                          <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-content">
                          <a href="<?php echo url('products')."&platform=PC" ?>" >PC</a>
                          <a href="<?php echo url('products')."&platform=XBOX One" ?>">XBOX ONE</a>
                          <a href="<?php echo url('products')."&platform=PS4" ?>">PS4</a>
                          <a href="<?php echo url('products')."&platform=Nintendo Switch" ?>">Nintendo Switch</a>
                        </div>
                      </div>
                      <a href="<?php echo url('contact') ?>" <?php echo $page == 'contact' ? 'class="active"' : ''; ?>>Support</a>
                      <?php if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 1) :?>
                      <a href="<?php echo url('addProduct') ?>" <?php echo $page == 'addProduct' ? 'class="active"' : '';?>>Add Product</a>
                        <?php endif;?>

    </div>
                    <script>
    function myFunction() {
      var x = document.getElementById("myTopnav");
      if (x.className === "topnav") {
        x.className += " responsive";
      } else {
        x.className = "topnav";
      }
    }

    function myFunction2() {
      var popup = document.getElementById("myPopup");
    popup.classList.toggle("show");
    }
  </script>

</header>
<main class="container">
