<?php include_once "pages/head.php";?>
<?php
$sql = new SQL();
  if(isset($_SESSION['user_id'])) {
    $profilepic = $sql->execute("SELECT `profile_pic` FROM `users` WHERE id = ?",$_SESSION['user_id']);

    $shipping_data = $sql->execute("SELECT * FROM `shippings` WHERE `id` = ?",$_SESSION['user_shippingID']);
  }
  else
  $profilepic = "images\\profilepic\\user.jpg";
    if(is_post()) {
      $URL="http://localhost:8080/blank_team/?p=editProfile";
            echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";  
    }



?>
<div class="profile-container">
  <h1 class="login-h">PROFILE PAGE</h1>  
  <div class = "profile-pic">
        <img src = "<?php echo isset($_SESSION['user_id']) ? $profilepic[0]['profile_pic'] : $profilepic ?>" alt = "profile picture">
    </div>                  
    <div class ="profile-data">
            <h1>Personal data</h1>
            <p style="font-weight: bold">User Name</p>
            <p class="profile-title"><?php echo $_SESSION['user_user_name'] ?></p>
            <p style="font-weight: bold">Email</p>
            <p class="profile-title"><?php echo $_SESSION['user_email'] ?></p>
            <p style="font-weight: bold">Full Name</p>
            <p class="profile-title"><?php echo $_SESSION['user_fullname'] ?></p>
            <p style="font-weight: bold">Birth Date</p>
            <p class="profile-title"><?php echo $_SESSION['user_birth_date'] ?></p><br>
            <h1>Shipping data</h1>
            <p style="font-weight: bold">Recipient</p>
            <p class="profile-title"><?php echo isset($shipping_data[0]['client_name']) ? $shipping_data[0]['client_name'] :"" ?></p>
            <p style="font-weight: bold">Country</p>
            <p class="profile-title"><?php echo isset($shipping_data[0]['country']) ? $shipping_data[0]['country'] :"" ?></p>
            <p style="font-weight: bold">City</p>
            <p class="profile-title"><?php echo isset($shipping_data[0]['city']) ? $shipping_data[0]['city'] :"" ?></p>
            <p style="font-weight: bold">Address</p>
            <p class="profile-title"><?php echo isset($shipping_data[0]['address']) ? $shipping_data[0]['address'] :" " ?></p>
            <p style="font-weight: bold">Email</p>
            <p class="profile-title"><?php echo isset($shipping_data[0]['email']) ? $shipping_data[0]['email'] :" " ?></p>
            <p style="font-weight: bold">Telephone number</p>
            <p class="profile-title"><?php echo isset($shipping_data[0]['tel']) ? $shipping_data[0]['tel'] :" " ?></p>         
            <form action="<?php echo url('profile') ?>" method ="POST">
            <button class ="edit-btn" type="submit" value = "edit" name="letsedit"><Span>Edit</span></button>
            </form>
    </div>
</div>
<?php include_once "pages/footer.php"?>