<?php include_once "pages/head.php";?>
<?php
$sql = new SQL();
  if(isset($_SESSION['user_id']))
  $profilepic = $sql->execute("SELECT `profile_pic` FROM `users` WHERE id = ?",$_SESSION['user_id']);
  else
  $profilepic = "images\\profilepic\\user.jpg";
    if(is_post())  header("Location: ".url('editProfile'));



?>
<div class="profile-container">
    <div class = "profile-pic">
        <img src = "<?php echo isset($_SESSION['user_id']) ? $profilepic[0]['profile_pic'] : $profilepic ?>" alt = "profile picture">
    </div>

    <div class ="profile-data"> 
            <p>User Name</p>
            <p><?php echo $_SESSION['user_user_name'] ?></p>
            <p>Email</p>
            <p><?php echo $_SESSION['user_email'] ?></p>
            <p>Full Name</p>
            <p><?php echo $_SESSION['user_fullname'] ?></p>
            <p>Birth Date</p>
            <?php echo $_SESSION['user_birth_date'] ?><br>
            <form action="<?php echo url('profile') ?>" method ="POST">
            <input type="submit" value = "edit" name="letsedit">
            </form>
    </div>
</div>
<?php include_once "pages/footer.php"?>