<?php 
include_once "pages/head.php";
$errors = [];
if(is_post())
{
    $restorationCode = $_POST['code'];
    if($_SESSION['restorationCode'] == $restorationCode)
        header("Location: ".url('changePassword'));
    else
        $errors['code'][] = "Invalid Verification Code.";
}

?>

<form action ="<?php echo url('confirmVerificationCode') ?>" method ="POST" autocomplete="off">
<label for="code"> Verification Code </label>
    <input type ="text" name ="code"> <br>
    <?php if(isset($errors['code'])) foreach ($errors['code'] as $value) echo "<p class ='input-error'> $value </p>"; ?> 
    <input class ="edit-profile-btn" value ="Verify" type ="submit">  </button>
</form>
<?php

include_once "pages/footer.php";
?>