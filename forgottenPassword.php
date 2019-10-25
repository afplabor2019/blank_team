<?php 
$errors = [];
 if(is_post())
 {
    $email = $_POST['email'];

    if ($email == null) $errors['email'][] = 'Email is required!';
    else if(!(preg_match("/^[a-zA-Z0-9-_.]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/",$email))) $errors['email'][] = 'Invalid email!';

    if(count($errors) == 0) {
        $subject ="Forgotten password";
        $restorationCode = GenerateRestorationCode(8);
        echo $restorationCode;
        $message = "Password restoration Code : ".$restorationCode;
        $headers  ="From: ".WSNAME."<coolemail@gmail.com>\r\n";
        $headers .="Do not reply to this email";
        $headers .= "Content-type: text/html\r\n";
        mail($email,$subject,$message,$headers);                    
    }
 }

 ?> 
<form action ="<?php echo url('forgottenPassword') ?>" method ="POST">
<label for="email"> Email </label>
    <input type ="text" name ="email" value = "<?php echo isset($email) ? $email : ""; ?>"> <br>
    <?php if(isset($errors['email'])) foreach ($errors['email'] as $value) echo "<p class ='input-error'> $value </p>"; ?> 
    <button type ="submit"> Send email </button>