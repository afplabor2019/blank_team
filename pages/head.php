<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>WSNAME</title>
    <link rel="stylesheet" href="app.css">
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

?>   
<header class="header">
  <div class="upper-row">

      <div class="upper-row-left-side">
        <a class="mainlogo" href ="<?php echo url('home') ?>">GamerZ</a>
        <div class="wrap">
          <div class="search">
              <input type="text" style="border: 3px solid #00B4CC; border-right: none" class="searchTerm" placeholder="What are you looking for?">
              <button type="submit" class="searchButton">
                <i class="fa fa-search"></i>
            </button>
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
                      <a href="<?php echo url('contact') ?>" <?php echo $page == 'contact' ? 'class="active"' : ''; ?>>Contact</a>
                      <?php if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 1) :?>
                      <a href="<?php echo url('addProduct') ?>" <?php echo $page == 'addProduct' ? 'class="active"' : '';?>>Add Product</a>
                        <?php endif;?>
                      <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>  
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
