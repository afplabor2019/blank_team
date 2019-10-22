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

    echo $email;
    echo $userName;
    echo $fullName;
    echo $password;
    echo $cpassword;
    echo $age;
  
}
?>

<form action ="<?php echo url('register'); ?>" method ="POST">
<label for="email"> Email </label>
<input type ="text" name ="email" > <br>

<label for="userName"> User Name </label>
<input type ="text" name ="userName" > <br>

<label for="fullName"> Full Name </label>
<input type ="text" name ="fullName" > <br>

<label for="password"> Password </label>
<input type ="password" name ="password" > <br>

<label for="cpassword"> Confirm Password </label>
<input type ="password" name ="cpassword" > <br>

<label for="age"> Age </label>
<input type ="number" name ="age" > <br>

<button class ="button" type="submit">Register</button>
</form>
