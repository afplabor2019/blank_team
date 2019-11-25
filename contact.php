<?php include_once "pages/head.php"; ?>
<?php
$errors =[];
if(is_post()){

    if(isset($_POST['sj']))
    $subject = $_POST['sj'];
    if(isset($_POST['msg']))
    $message = $_POST['msg'];
    $from = isset($_SESSION['user_email']) ? $_SESSION['user_email'] : "random_user";
    if(isset($subject) && $subject == null) $errors['sj'][] ="Subject is required!";
    if(isset($message) && $message == null) $errors['msg'][] ="Message is required!";
    if(!loggedIn()) $errors['login'][] ="You have to be logged in to write a message!";

    $headers  ="From: ".$from."\r\n";
    if(count($errors) == 0 && isset($message) && $message != null && isset($message) && $message != null)
    {
        mail("coolestwebshop@gmail.com",$subject,$from." asked: ".$message,$headers);
    }

    if(isset($_POST['review']))
    $reviewDescription = $_POST['review'];
    if(isset($_POST['review']) && $reviewDescription  == null) $errors['err'][] = "Message is required!";
    if(!isset($_SESSION['user_id'])) $errors['err'][] = "You have to log in to leave a review!";
    if(!isset($_POST['rating-input'])) $errors['err'][] = "You have to give a rating!";


}
?>
<div class="contact-container">
<h1 class="contact-h"> CONTACT </h1><br>
<p>If you have some problem with any part of our website, or you can give us some really helpful advice, we will gladly take it.
    Our team from the customer service will help you out as soon as possible and we will work hard to find the solution. </p>
<form action="#" method="POST">
<?php if(isset($errors['login'])) foreach ($errors['login'] as $key => $value) echo "<p> $value </p>" ?>
<label for="email">To:</label>
<input type="text" name="email"value="coolestwebshop@gmail.com" readonly style="width:50%;text-align:center;background-color:#BDBDBD;text-align: left;"><br>


<label for="sj">Subject:</label>
<input type="text" name="sj"style="margin-left:0.9%"><br>
<?php if(isset($errors['sj'])) foreach ($errors['sj'] as $key => $value) echo "<p> $value </p>" ?>

<textarea name="msg" rows="10" placeholder="How can we help you?"></textarea>
<?php if(isset($errors['msg'])) foreach ($errors['msg'] as $key => $value) echo "<p> $value </p>" ?>
<button class ="contact-btn" type="submit" value="Send"><Span>Send</span></button>
</form>
</div>
<h1 class="product-h">Leave a review of this game!</h1>
<div class="p-send-review">
<div class="leave-review">
    <?php 
    if(loggedIn()){
        $userpictemp = $sql->execute("SELECT `profile_pic` FROM `users` WHERE `id` = ?",$_SESSION['user_id']); 
        $userpic = $userpictemp[0]['profile_pic'];
    } else{
        $userpic = "images/user.jpg";
    }

    ?>
    <form action="<?php echo url('contact') ?>" method = "POST">
    <div class="product-profile-img"><img src="<?php echo $userpic ?>" alt="" class="p-review-profile-pic"></div>
    <div class="review-right">
    <span class="rating">
        <input type="radio" class="rating-input" id="rating-input-1-5" name="rating-input" value =5>
        <label for="rating-input-1-5" class="rating-star"></label>
        <input type="radio" class="rating-input" id="rating-input-1-4" name="rating-input" value =4>
        <label for="rating-input-1-4" class="rating-star"></label>
        <input type="radio" class="rating-input" id="rating-input-1-3" name="rating-input" value =3>
        <label for="rating-input-1-3" class="rating-star"></label>
        <input type="radio" class="rating-input" id="rating-input-1-2" name="rating-input"value =2>
        <label for="rating-input-1-2" class="rating-star"></label>
        <input type="radio" class="rating-input" id="rating-input-1-1" name="rating-input" value =1>
        <label for="rating-input-1-1" class="rating-star"></label>
    </span><br>
    <textarea name="review" class="p-review"></textarea>
    <?php if(isset($errors['err'])) foreach ($errors['err'] as $key => $value) echo "<p> $value </p>"; ?>
    <button class ="review-submit" type="submit" value ="SUBMIT"><Span>Send review</span></button>
    </div>
    </form>
</div>
<?php include_once "pages/footer.php"; ?>