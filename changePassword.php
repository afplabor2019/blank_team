<?php require_once "pages/head.php";?>
<?php 
$errors = [];
if(is_post()) {
$sql = new SQL();
$npassword = $_POST['npassword'];
$cnpassword = $_POST['cnpassword'];

    //Password Verification
    if($npassword == null) $errors['npassword'][] = 'Password is required!';
    else {
        if(strlen($npassword) < 8) $errors['npassword'][] = 'Password is too short!';
        else if(strlen($npassword) > 50) $errors['npassword'][] = 'Password is too long!';
        if(!(preg_match("*[A-Z]*",$npassword))) $errors['npassword'][] = 'Password has to contain at least one upper case letter!';
        if(!(preg_match("*[0-9]*",$npassword))) $errors['npassword'][] = 'Password has to contain at least one number!';
        $oldPassword = $sql->execute("SELECT `password` FROM `users` WHERE `email` = ?",$_SESSION['email']);
        if(password_verify($npassword,$oldPassword[0]['password'])) $errors['npassword'][] = 'Old password can not be the new pasword.'; 
    }
    if($cnpassword != $npassword) {$errors['cnpassword'][] = 'Passwords does not match!'; $errors['npassword'][] = 'Passwords does not match!';}
    //Change password
    if(count($errors) == 0){
        $sql->execute("UPDATE `users` SET `password` = ? WHERE `email` = ?",password_hash($npassword,PASSWORD_DEFAULT),$_SESSION['email']);
        header("Location: ".url('login'));
    }
       
}
?>
<div class="change-pw-container">
    <h1 class="login-h">CHANGE PASSWORD</h1>  
    <form action ="<?php url('changePassword')?>" method ="POST">
    <label for="npassword"> New Password </label>
        <input type ="password" name ="npassword" style="margin-left:3.45%; margin-top:2%"> <br>
        <?php if(isset($errors['npassword'])) foreach ($errors['npassword'] as $value) echo "<p class ='input-error'> $value </p>"; ?> 

        <label for="cnpassword"> Confirm Password </label>
        <input type ="password" name ="cnpassword"> <br>
        <?php if(isset($errors['cnpassword'])) foreach ($errors['cnpassword'] as $value) echo "<p class ='input-error'> $value </p>"; ?> 
        <button class ="change-pw-btn" type="submit"><Span>Save</span></button>
    </form>
</div>
<?php require_once "pages/footer.php";?>