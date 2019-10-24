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
    else if(!(preg_match("/^[a-zA-Z0-9-_.]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/",$email))) $errors['email'][] = 'Invalid email!';
    $sql = new SQL();
    $emails = $sql->execute("SELECT `email` FROM users");
    foreach($emails as $row) {
        if($row['email'] == $email)
            $errors['email'][] = 'Email is already taken!';
    }

    //userName 
    if($userName == null) $errors['userName'][] = 'User name is required!';
    else if(strlen($userName) < 6) $errors['userName'][] = 'User name has to be at least 6 characters long!';
    else if(strlen($userName) > 25) $errors['userName'][] = 'User name can not be longer than 25 characters!';
    $sql = new SQL();
    $userNames = $sql->execute("SELECT `user_name` FROM users");
    foreach($userNames as $row) {
        if($row['user_name'] == $userName)
            $errors['userName'][] = 'User name is already taken!';
    }
    
    //full name
    if($fullName == null) $errors['fullName'][] = 'Full name is required!';
    else if(strlen($fullName) < 4) $errors['fullName'][] = 'full name is too short!';
    else if(strlen($fullName) > 255) $errors['fullName'][] = 'full name is too long!';

    //age
    if($age == null) $errors['age'][] = 'Age is required!';
    else if($age < 18) $errors['age'][] = 'You have to be at least 18 years old! Ask your parents...';
    else if($age > date("Y")) $errors['age'][] = 'You have to be alive to use this side dude...';

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

    //Insert into database
    if(count($errors) == 0)
    {
        $sql = new SQL();
        $sql->execute("INSERT INTO `users`(`id`,`user_name`, `fullname`, `email`, `password`, `role`, `shipping_id`, `del`, `age`) 
        VALUES(?,?,?,?,?,?,?,?,?)",GenerateID(),$userName,$fullName,$email,$password,0,GenerateID(),0,$age);           
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
<input type ="password" name ="password" value ="Proba1234"> <br>
<?php if(isset($errors['password'])) foreach ($errors['password'] as $value) echo "<p class ='input-error'> $value </p>"; ?> 

<label for="cpassword"> Confirm Password </label>
<input type ="password" name ="cpassword" value ="Proba1234"> <br>
<?php if(isset($errors['cpassword'])) foreach ($errors['cpassword'] as $value) echo "<p class ='input-error'> $value </p>"; ?> 

<label for="age"> Age </label>
<input type ="number" name ="age" value = "<?php echo isset($age) ? $age : ""; ?>"> <br>
<?php if(isset($errors['age'])) foreach ($errors['age'] as $value) echo "<p class ='input-error'> $value </p>"; ?> 

<button class ="button" type="submit">Register</button>
</form>
