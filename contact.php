<?php include_once "pages/head.php"; ?>
<?php
$errors =[];
if(is_post()){

    $subject = $_POST['sj'];
    $message = $_POST['msg'];
    $from = isset($_SESSION['user_email']) ? $_SESSION['user_email'] : "random_user";
    if($subject == null) $errors['sj'][] ="Subject is required!";
    if($message == null) $errors['msg'][] ="Message is required!";
    if(!loggedIn()) $errors['login'][] ="You have to be logged in to write a message!";

    $headers  ="From: ".$from."\r\n";
    if(count($errors) ==0)
    {
        mail("coolestwebshop@gmail.com",$subject,$from." asked: ".$message,$headers);
    }


}
?>
<form action="#" method="POST">
<?php if(isset($errors['login'])) foreach ($errors['login'] as $key => $value) echo "<p> $value </p>" ?>
<label for="email">To:</label>
<input type="text" name="email"value="coolestwebshop@gmail.com" readonly style="width:30%;text-align:center;background-color:#BDBDBD;margin-left:5.1%"><br>


<label for="sj">Subject:</label>
<input type="text" name="sj"style="margin:0"><br>
<?php if(isset($errors['sj'])) foreach ($errors['sj'] as $key => $value) echo "<p> $value </p>" ?>

<textarea name="msg" rows="10" placeholder="How can we help you?"></textarea>
<?php if(isset($errors['msg'])) foreach ($errors['msg'] as $key => $value) echo "<p> $value </p>" ?>

<input type="submit" value="Send" style="float:right;margin-right:10%">
</form>
<?php include_once "pages/footer.php"; ?>
<?php include_once "pages/footer.php"; ?>