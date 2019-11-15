<?php include_once "pages/head.php"; ?>
<?php
$sql = new SQL();
$errors = [];

if(is_post())
{
    if(isset($_POST['username'])) $userName = $_POST['username'];
    if(isset($_POST['email']))$email = $_POST['email'];
    if(isset($_POST['fullname']))$fullName = $_POST['fullname'];

    //email
    if(isset($email)){
        if ($email == null) $errors['email'][] = 'Email is required!';
        else if(!(preg_match("/^[a-zA-Z0-9-_.]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/",$email))) $errors['email'][] = 'Invalid email!';
            $emails = $sql->execute("SELECT `email` FROM users");
                foreach($emails as $row) 
                    if($row['email'] == $email && $email != $_SESSION['user_email'])
                     $errors['email'][] = 'Email is already taken!';
    }
    

    //userName 
    if(isset($userName)){
        if($userName == null) $errors['userName'][] = 'User name is required!';
        else 
        {
            if(strpos($userName,"@")) $errors['userName'][] = 'User name can not contain "@" character!';
            if(strlen($userName) < 6) $errors['userName'][] = 'User name has to be at least 6 characters long!';
            else if(strlen($userName) > 25) $errors['userName'][] = 'User name can not be longer than 25 characters!';
            $userNames = $sql->execute("SELECT `user_name` FROM users");
            foreach($userNames as $row)
                if($row['user_name'] == $userName && $userName != $_SESSION['user_user_name'])
                    $errors['userName'][] = 'User name is already taken!';
        }
    }
    
    //full name
    if(isset($fullName)){
        if($fullName == null) $errors['fullName'][] = 'Full name is required!';
        else if(strlen($fullName) < 4) $errors['fullName'][] = 'full name is too short!';
        else if(strlen($fullName) > 255) $errors['fullName'][] = 'full name is too long!';
    }
    

    //pic
    $allow = array("jpg", "jpeg", "png");
    $dir = "images\\profilepic\\";
    if(isset($_FILES['pic']['name']) && $_FILES['pic']['name'] != null)
    {
        $pic = $_FILES['pic']['name'];
        $extension = explode(".", $pic);
        $extension = end($extension);
        $fullpath = $dir.$pic;
        if(in_array($extension, $allow) && !file_exists($fullpath))
            move_uploaded_file($_FILES['pic']['tmp_name'], $fullpath);
        else if(in_array($extension, $allow) && file_exists($fullpath)){
            $fullpath = $dir.GenerateID().$pic;
            move_uploaded_file($_FILES['pic']['tmp_name'], $fullpath);
        }
        $sql->execute("UPDATE `users` SET `profile_pic` = ? WHERE `id` = ?",$fullpath, $_SESSION['user_id']);
    }
    
    //Set changes
    if(count($errors) == 0) {
        if(isset($userName) && $userName != $_SESSION['user_user_name']){
            $sql->execute("UPDATE `users` SET `user_name` = ? WHERE `id` = ?",$userName,$_SESSION['user_id']);
            $_SESSION['user_user_name'] = $userName;
        }
           
        if(isset($email) && $email != $_SESSION['user_email']){
            $sql->execute("UPDATE `users` SET `email` = ? WHERE `id` = ?",$email,$_SESSION['user_id']);
            $_SESSION['user_email'] = $email;
        }
            
        if(isset($fullName) && $fullName != $_SESSION['user_fullname']){
            $sql->execute("UPDATE `users` SET `fullname` = ? WHERE `id` = ?",$fullName,$_SESSION['user_id']);
            $_SESSION['user_fullname'] = $fullName;
        }

        header("Location: ".url('profile'));
    }
}


  if(isset($_SESSION['user_id']))
  $profilepic = $sql->execute("SELECT `profile_pic` FROM `users` WHERE id = ?",$_SESSION['user_id']);
  else
  $profilepic = "images\\profilepic\\user.jpg";
?>
<div>
    <div>
        <img id = "pic" src = "<?php echo isset($_SESSION['user_id']) ? $profilepic[0]['profile_pic'] : $profilepic ?>" alt = "profile picture">
        <form action="<?php echo url('editProfile')?>" method ="POST" enctype="multipart/form-data" autocomplete="off">
        <input type ="file" name ="pic" id ="pic" onchange="loadFile(event)" accept="image/png, image/jpeg, image/jpg" />
        <input type="submit">
        </form>

    </div>
    <div> 
        <form action="<?php echo url('editProfile')?>" method ="POST" enctype="multipart/form-data">
            <label for="username">User Name</label><br>
            <input type="text" name = "username" value="<?php echo $_SESSION['user_user_name'] ?>"><br>
            <?php if(isset($errors['userName'])) foreach ($errors['userName'] as $value) echo "<p class ='input-error'> $value </p>"; ?> 

            <label for="email">Email</label><br>
            <input type="text" name = "email" value="<?php echo $_SESSION['user_email'] ?>"><br>
            <?php if(isset($errors['email'])) foreach ($errors['email'] as $value) echo "<p class ='input-error'> $value </p>"; ?> 

            <label for="fullname">Full Name</label><br>
            <input type="text" name = "fullname" value="<?php echo $_SESSION['user_fullname'] ?>"><br>
            <?php if(isset($errors['fullName'])) foreach ($errors['fullName'] as $value) echo "<p class ='input-error'> $value </p>"; ?> 

            <a href="<?php echo url('forgottenPassword') ?>">Change Password</a>

            <input type="submit" value="Save">
            </form>
    </div>
</div>
<script>
var loadFile = function(event) {
	var image = document.getElementById('pic');
	image.src = URL.createObjectURL(event.target.files[0]);
};
</script>
<?php include_once "pages/footer.php"; ?>