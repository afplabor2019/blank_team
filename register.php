<?php 
require_once 'lib/functions.php';
$errors =[];
if(is_post())
{
    $email = $_POST['email'];
    $userName = $_POST['userName'];
    $fullName = $_POST['fullName'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $age = $_POST['age'];

    //VERIFICATION

    //email
    if ($email == null) $errors['email'][] = 'Email is required!';
    //if (!(strpos($email, '.') && strpos($email, '@'))) $errors['email'][] = 'Invalid email!';
    if(!(preg_match("/^[a-zA-Z0-9-_.]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/",$email))) $errors['email'][] = 'Invalid email!';
    $sql = new SQL();
    $emails[] = $sql->execute("SELECT `email` FROM users");
    if(count($emails) != 0) $errors['email'][] = 'Email already taken!';

    //userName 
    if($userName == null) $errors['userName'][] = 'User name is required!';
    if(strlen($userName) < 6) $errors['userName'][] = 'User name has to be at least 6 characters long!';
    if(strlen($userName) > 25) $errors['userName'][] = 'User name can not be longer than 25 characters!';
    $sql = new SQL();
    $userNames[] = $sql->execute("SELECT `user_name` FROM users");
    if(count($userNames) != 0) $errors['userName'][] = 'User name already taken!';

    //full name
    if($fullName == null) $errors['fullName'][] = 'Full name is required!';
    if(strlen($fullName) < 4) $errors['fullName'][] = 'full name is too short!';
    if(strlen($fullName) > 255) $errors['fullName'][] = 'full name is too long!';

    //age
    if($age == null) $errors['age'][] = 'Age is required!';
    if($age < 18) $errors['age'][] = 'You have to be at least 18 years old! Ask your parents...';
    if($age > date("Y")) $errors['age'][] = 'You have to be alive to use this side dude...';

    //password
    if($password == null) $errors['password'][] = 'Password is required!';
    if(strlen($password) < 8) $errors['password'][] = 'Password is too short!';
    if(strlen($password) > 50) $errors['password'][] = 'Password is too long!';
    if(!(preg_match("*[A-Z]*",$password))) $errors['password'][] = 'Password has to contain at least one upper case letter!';
    if(!(preg_match("*[0-9]*",$password))) $errors['password'][] = 'Password has to contain at least one number!';

    //cpassword
    if($cpassword != $password) {$errors['cpassword'][] = 'Passwords does not match!'; $errors['password'][] = 'Passwords does not match!';}

    if(count($errors) == 0)
        {
            $id = GenerateID();
            $shippingid = GenerateID();

            $sql = new SQL();
            $sql->execute("INSERT INTO `users`(`id`,`user_name`, `fullname`, `email`, `password`, `role`, `shipping_id`, `del`, `age`) 
            VALUES(?,?,?,?,?,?,?,?,?)",$id,$userName,$fullName,$email,$password,0,$shippingid,0,$age);
            
            /*$db = db_connect();
            $sql = $db->prepare("INSERT INTO `users`(`id`,`user_name`, `fullname`, `email`, `password`, `role`, `shipping_id`, `del`, `age`) 
            VALUES(?,?,?,?,?,?,?,?,?)");          
            $sql->bind_param("sssssssii", $id,$userName,$fullName,$email,$password,'user',$shippingid,0,$age);   
            $sql->execute();
            $sql->close();
            db_close(); */
        }
}
?>

<!--WRITE BACK-->
<form action ="<?php echo url('register'); ?>" method ="POST" >
<label for="email"> Email </label>
<input type ="text" name ="email" value = "<?php echo isset($email) ? $email : ""; ?>"> <br>
<?php if(isset($errors['email'])) foreach ($errors['email'] as $value) echo "<p class ='input-error'> $value </p>"; ?> 

<label for="userName"> User Name </label>
<input type ="text" name ="userName" value = "<?php echo isset($userName) ? $userName : ""; ?>"> <br>
<?php if(isset($errors['userName'])) foreach ($errors['userName'] as $value) echo "<p class ='input-error'> $value </p>"; ?> 

<label for="fullName"> Full Name </label>
<input type ="text" name ="fullName" value = "<?php echo isset($fullName) ? $fullName : ""; ?>"> <br>
<?php if(isset($errors['fullName'])) foreach ($errors['fullName'] as $value) echo "<p class ='input-error'> $value </p>"; ?> 

<label for="password"> Password </label>
<input type ="password" name ="password"> <br>
<?php if(isset($errors['password'])) foreach ($errors['password'] as $value) echo "<p class ='input-error'> $value </p>"; ?> 

<label for="cpassword"> Confirm Password </label>
<input type ="password" name ="cpassword"> <br>
<?php if(isset($errors['cpassword'])) foreach ($errors['cpassword'] as $value) echo "<p class ='input-error'> $value </p>"; ?> 

<label for="age"> Age </label>
<input type ="number" name ="age" value = "<?php echo isset($age) ? $age : ""; ?>"> <br>
<?php if(isset($errors['age'])) foreach ($errors['age'] as $value) echo "<p class ='input-error'> $value </p>"; ?> 

<button class ="button" type="submit">Register</button>
</form>
