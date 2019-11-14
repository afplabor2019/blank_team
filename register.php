<?php require_once "pages/head.php"; ?> 
<div class="register">
<?php 
$errors =[];
if(is_post())
{
    $sql = new SQL();
    $email = $_POST['email'];
    $userName = $_POST['userName'];
    $fullName = $_POST['fullName'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $birthDate = $_POST['bday'];

    //VERIFICATION

    //email
    if ($email == null) $errors['email'][] = 'Email is required!';
    else if(!(preg_match("/^[a-zA-Z0-9-_.]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/",$email))) $errors['email'][] = 'Invalid email!';
    $emails = $sql->execute("SELECT `email` FROM users");
    foreach($emails as $row) 
        if($row['email'] == $email)
            $errors['email'][] = 'Email is already taken!';

    //userName 
    if($userName == null) $errors['userName'][] = 'User name is required!';
    else 
    {
        if(strpos($userName,"@")) $errors['userName'][] = 'User name can not contain "@" character!';
        if(strlen($userName) < 6) $errors['userName'][] = 'User name has to be at least 6 characters long!';
        else if(strlen($userName) > 25) $errors['userName'][] = 'User name can not be longer than 25 characters!';
        $userNames = $sql->execute("SELECT `user_name` FROM users");
        foreach($userNames as $row)
            if($row['user_name'] == $userName)
                $errors['userName'][] = 'User name is already taken!';
    }
    //full name
    if($fullName == null) $errors['fullName'][] = 'Full name is required!';
    else if(strlen($fullName) < 4) $errors['fullName'][] = 'full name is too short!';
    else if(strlen($fullName) > 255) $errors['fullName'][] = 'full name is too long!';

    //birth date
    if($birthDate == null) $errors['bdate'][] = 'Birth date is required!';

    //password
    if($password == null) $errors['password'][] = 'Password is required!';
    else {
        if(strlen($password) < 8) $errors['password'][] = 'Password is too short!';
        else if(strlen($password) > 50) $errors['password'][] = 'Password is too long!';
        if(!(preg_match("*[A-Z]*",$password))) $errors['password'][] = 'Password has to contain at least one upper case letter!';
        if(!(preg_match("*[0-9]*",$password))) $errors['password'][] = 'Password has to contain at least one number!';
    }
    //cpassword
    if($cpassword != $password) {$errors['cpassword'][] = 'Passwords does not match!'; $errors['password'][] = 'Passwords does not match!';}

    //recaptcha
    if($_POST["g-recaptcha-response"] == '') $errors['captcha'][] = "Please verify that you are not a robot.";

    //Insert into database
    if(count($errors) == 0 )
    {
        $sql->execute("INSERT INTO `users`(`id`,`user_name`, `fullname`, `email`, `password`, `role`, `shipping_id`, `del`, `birth_date`,`age`,`registration_date`,`profile_pic`) 
        VALUES(?,?,?,?,?,?,?,?,?,(SELECT TRUNCATE(DATEDIFF(CURRENT_DATE, ?)/365,0)),?,?)",GenerateID(),$userName,$fullName,$email,password_hash($password,PASSWORD_DEFAULT),0,GenerateID(),0,$birthDate,$birthDate,date('y-m-d-h-m-s'),"images\\profilepic\\user.jpg");    
        header("Location: ".url('login'));      
    }
}
?>

<!--HTML-->
    <div class="register-form">
        <h1 class="reg-h">Register</h1>
        <div class="register-data">
            <form action ="<?php echo url('register'); ?>" method ="POST" autocomplete="off">
                <div class="r-left-side">
                    <label for="email"> Email </label><br>
                    <label for="userName"> User Name </label><br>
                    <label for="fullName"> Full Name </label><br>
                    <label for="password"> Password </label><br>
                    <label for="cpassword"> Confirm Password </label><br>
                    <label for="bday"> Birth Date </label><br>
                </div>
                <div class="r.right-side">
                    <input type ="text" name ="email" value = "<?php echo isset($email) ? $email : ""; ?>"> <br>
                    <?php if(isset($errors['email'])) foreach ($errors['email'] as $value) echo "<p class ='input-error'> $value </p>"; ?>                     
                    <input type ="text" name ="userName" value = "<?php echo isset($userName) ? $userName : ""; ?>"> <br>
                    <?php if(isset($errors['userName'])) foreach ($errors['userName'] as $value) echo "<p class ='input-error'> $value </p>"; ?> 
                    <input type ="text" name ="fullName" value = "<?php echo isset($fullName) ? $fullName : ""; ?>"> <br>
                    <?php if(isset($errors['fullName'])) foreach ($errors['fullName'] as $value) echo "<p class ='input-error'> $value </p>"; ?> 
                    <input type ="password" name ="password"> <br>
                    <?php if(isset($errors['password'])) foreach ($errors['password'] as $value) echo "<p class ='input-error'> $value </p>"; ?> 
                    <input type ="password" name ="cpassword"> <br>
                    <?php if(isset($errors['cpassword'])) foreach ($errors['cpassword'] as $value) echo "<p class ='input-error'> $value </p>"; ?> 
                    <input type="date" name="bday" min ="1900-01-01" max=<?php echo date("Y-m-d") ?> value = "<?php echo isset($birthDate) ? $birthDate : ''; ?>">
                    <?php if(isset($errors['bdate'])) foreach ($errors['bdate'] as $value) echo "<p class ='input-error'> $value </p>"; ?> <br>
                </div>
            <script type="text/javascript">
                var onloadCallback = function() { grecaptcha.render('html_element',{'sitekey' : '6LeAgcAUAAAAALIya8oqHrmjIajlp46W3l_ejOuH'});};
            </script>
            <!-- EZ a div a captcha -->
            <div id="html_element"></div><?php if(isset($errors['captcha'])) foreach ($errors['captcha'] as $value) echo "<p class ='input-error'> $value </p>"; ?>
            <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"async defer></script>
            <button class ="button" type="submit">Register</button>
            </form>
            <a href ="<?php echo url('login')?>">Log In</a>
        </div>
    </div>
</div>
<?php require_once "pages/footer.php"; ?>

