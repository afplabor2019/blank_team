<?php include_once "pages/head.php";?>
<?php

if(is_post()){

    

}


?>
<div class="profile-container">
    <div class = "profile-pic">
        <img src = "images/user.jpg" alt = "profile picture">
        <form action="<?php echo url('profile') ?>" method = "POST">
        <input type="file" name="change-profile-pic">
        <input type="submit" value="Save">
        </form>
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
            <a href="<?php echo url('forgottenPassword') ?>">Change Password</a>
            <input type="submit" value = "edit">
    </div>
</div>
<?php include_once "pages/footer.php"?>