<?php require_once "pages/head.php";?>
<?php 
$errors = [];
$value="";

 if(is_post())
 {
    $sql = new SQL();
    if(isset($_POST['email']))
    $email = $_POST['email'];
    $_SESSION['email'] = $email; 

    

    //email Verification
    if ($email == null) $errors['email'][] = 'Email is required!';
    else if(!(preg_match("/^[a-zA-Z0-9-_.]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/",$email))) $errors['email'][] = 'Invalid email!';
    else { 
    $emails = $sql->execute("SELECT `email` FROM users");
    $is_registered = false;
    foreach($emails as $row) 
        if($row['email'] == $email)
            $is_registered = true;
    if(!$is_registered) $errors['email'][] = 'Email is not registered!';
    }

    if(count($errors) == 0) {
        $subject ="Forgotten password";
        $restorationCode = GenerateRestorationCode(8);
        $_SESSION['restorationCode'] = $restorationCode;
        $message = "Password restoration code: ".$restorationCode;
        $headers  ="From: ".WSNAME."<coolemail@gmail.com>\r\n";
        $headers .="Do not reply to this email";
        mail($email,$subject,$message,$headers);
        $URL="http://localhost:8080/blank_team/?p=confirmVerificationCode";
        echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";                  
    }
 }

 //Write back
 if(loggedIn()) $value = $_SESSION['user_email'];
 if(isset($email)) $value = $email;

 ?>
<div class="forgotten-pw">
    <h1 class="login-h">New password request</h1>
    <p>If you forgot or want to change your password, first, you need to verify yourself with your email address.
        You will receive a verification code in a few minutes, so you will be able to change your password.</p>
    <form action ="<?php echo url('forgottenPassword') ?>" method ="POST">
    <label for="email"> Email </label>
        <input type ="text" name ="email" value = "<?php echo $value?>"><br>
    <?php if(isset($errors['email'])) foreach ($errors['email'] as $value) echo "<p class ='input-error'> $value </p>"; ?> 
        <button class ="send-email" type="submit"><Span>Send email</span></button>
</div>
<?php require_once "pages/footer.php";?>