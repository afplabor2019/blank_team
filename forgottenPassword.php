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
        $headers .= "Content-type: text\html\r\n";
        mail($email,$subject,$message,$headers);
        header("Location: ".url('confirmVerificationCode'));                  
    }
 }

 //Write back
 if(loggedIn()) $value = $_SESSION['user_email'];
 if(isset($email)) $value = $email;

 ?> 
<form action ="<?php echo url('forgottenPassword') ?>" method ="POST">
<label for="email"> Email </label>
    <input type ="text" name ="email" value = "<?php echo $value?>"><br>
<?php if(isset($errors['email'])) foreach ($errors['email'] as $value) echo "<p class ='input-error'> $value </p>"; ?> 
    <button type ="submit"> Send email </button> 

<?php require_once "pages/footer.php";?>