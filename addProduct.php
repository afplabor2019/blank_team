<?php require_once "pages/head.php"; ?>
<?php
$errors = [];
if(is_post())
{

    $name = $_POST['name'];
    $publisher = $_POST['publisher'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $platform = $_POST['platform'];
    $release_year = $_POST['release_year'];
    $description = $_POST['description'];

    //VALIDATION
    
    //INSERT INTO DATABASE
    if(count($errors) == 0){
    $sql = new SQL();
    $sql->execute("INSERT INTO `products`(`name`, `publisher`, `type`, `price`, `platform`, `release_year`, `description`,`del` ) VALUES (?,?,?,?,?,?,?,?)",$name,$publisher,$type,$price,$platform,$release_year,$description,0);
    }
}
?>

<!-- HTML -->
<form action ="<?php echo url('addProduct'); ?>" method ="POST" >
    <label for="name"> Name </label> <br>
    <input type ="text" name ="name" value = "<?php echo isset($name) ? $name : ""; ?>"> <br>
    <?php if(isset($errors['name'])) foreach ($errors['name'] as $value) echo "<p class ='input-error'> $value </p>"; ?> 

    <label for="publisher"> Publisher </label> <br>
    <input type ="text" name ="publisher" value = "<?php echo isset($publisher) ? $publisher : ""; ?>"> <br>
    <?php if(isset($errors['publisher'])) foreach ($errors['publisher'] as $value) echo "<p class ='input-error'> $value </p>"; ?> 

    <label for="type"> Type </label> <br>
    <input type ="text" name ="type" value = "<?php echo isset($type) ? $type : ""; ?>"> <br>
    <?php if(isset($errors['type'])) foreach ($errors['type'] as $value) echo "<p class ='input-error'> $value </p>"; ?> 

    <label for="price"> Price </label> <br>
    <input type ="text" name ="price" value = "<?php echo isset($price) ? $price : ""; ?>"> <br>
    <?php if(isset($errors['price'])) foreach ($errors['price'] as $value) echo "<p class ='input-error'> $value </p>"; ?> 

    <label for="platform"> Platform </label> <br>
    <input type ="text" name ="platform" value = "<?php echo isset($platform) ? $platform : ""; ?>"> <br>
    <?php if(isset($errors['platform'])) foreach ($errors['platform'] as $value) echo "<p class ='input-error'> $value </p>"; ?> 

    <label for="release_year"> Release year </label> <br>
    <input type ="number" name ="release_year" value = "<?php echo isset($release_year) ? $release_year : ""; ?>"> <br>
    <?php if(isset($errors['release_year'])) foreach ($errors['release_year'] as $value) echo "<p class ='input-error'> $value </p>"; ?> 

    <label for="description"> Description </label> <br>
    <textarea name = "description"> </textarea>
    <?php if(isset($errors['description'])) foreach ($errors['description'] as $value) echo "<p class ='input-error'> $value </p>"; ?> <br>

    <button class ="button" type="submit">Register</button>
</form>
<?php require_once 'pages/footer.php';