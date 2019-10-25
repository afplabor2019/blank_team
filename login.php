<?php
$errors = [];
if(is_post())
{
    $sql = new SQL();
    $userName = $_POST['userName'];
    $password = $_POST['password'];

    //VALIDATION

    //user name
    if($userName == null) $errors['userName'][] = 'User name is required!';
    else if(strlen($userName) < 6) $errors['userName'][] = 'User name is least 6 characters long!';
    else if(strlen($userName) > 25) $errors['userName'][] = 'User name is shorter than 25 characters!';
    $userFound = false;
    $userNames = $sql->execute("SELECT `user_name` FROM users");
    foreach($userNames as $row) 
        if($row['user_name'] == $userName)  
               $userFound = true;                      
    if(!$userFound)
        $errors['userName'][] = 'User name does not exist!';

    //Password
    if(count($errors) == 0)
    {
        $dbpassword = $sql->execute("SELECT `password` FROM `users` WHERE `user_name` = ?",$userName);
        if(password_verify($password,$dbpassword[0]['password']))  
            header("Location: ".url('home'));   
        else  
            $errors['password'][] = 'Invalid password!';            
    }
}
?>



<h1> Log In </h1>
    <form action ="<?php echo url('login'); ?>" method ="POST">
        <label for="userName"> User Name </label>
        <input type ="text" name ="userName" value = "<?php echo isset($userName) ? $userName : '' ?>"> <br>
        <?php if(isset($errors['userName'])) foreach ($errors['userName'] as $value) echo "<p class ='input-error'> $value </p>"; ?> 

        <label for="password"> Password </label>
        <input type ="password" name ="password"> <br>
        <?php if(isset($errors['password'])) foreach ($errors['password'] as $value) echo "<p class ='input-error'> $value </p>"; ?> 
        
        <button class ="button" type="submit" > Log In </button>
    </form>


<a href="<?php echo url('register')?>"> Register </a> <br>
