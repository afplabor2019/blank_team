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
    //name
    if($name == null) $errors['name'][]= "Name is required!";

    //publisher
    if($publisher == null) $errors['publisher'][]= "Publisher is required!";

    //type
    if($type == null)  $errors['type'][]= "Type is required!";
    if($type == "Select Type") $errors['type'][]= "Please select a type!";

    //price
    if($price == null)  $errors['price'][]= "Price is required!";

    //platform
    if($platform == null) $errors['platform'][]= "Platform is required!";
    if($platform == "Select Platform") $errors['platform'][] = "Please select a platform!";

    //release year
    if($release_year == null)  $errors['release_year'][]= "Release year is required!";

    //description
    if(strlen($description) > 1000)  $errors['description'][]= "Description too long!";


    //INSERT INTO DATABASE
    if(count($errors) == 0){
    $sql = new SQL();
    $sql->execute("INSERT INTO `products`(`name`, `publisher`, `type`, `price`, `platform`, `release_year`, `description`,`del` ) VALUES (?,?,?,?,?,?,?,?)",$name,$publisher,$type,$price,$platform,$release_year,$description,0);
    }
}
?>

<!-- HTML -->
<form action ="<?php echo url('addProduct'); ?>" method ="POST" autocomplete="off" >
    <label for="name"> Name </label> <br>
    <input type ="text" name ="name" value = "<?php echo isset($name) ? $name : ""; ?>"> <br>
    <?php if(isset($errors['name'])) foreach ($errors['name'] as $value) echo "<p class ='input-error'> $value </p>"; ?> 

    <label for="publisher"> Publisher </label> <br>
    <input type ="text" name ="publisher" value = "<?php echo isset($publisher) ? $publisher : ""; ?>"> <br>
    <?php if(isset($errors['publisher'])) foreach ($errors['publisher'] as $value) echo "<p class ='input-error'> $value </p>"; ?> 

    <label for="type"> Type </label> <br>
    <select name ="type">
        <option value="Select Type" selected>Select Type</option>
        <option value="Strategy">Strategy</option>
        <option value="Shooter">Shooter</option>
        <option value="Moba">Moba</option>
        <option value="Open world">Open world</option>
    </select> <br>
    <?php if(isset($errors['type'])) foreach ($errors['type'] as $value) echo "<p class ='input-error'> $value </p>"; ?> 


    <label for="price"> Price </label> <br>
    <input type ="number" step="0.01" min ="0.0" name ="price" value = "<?php echo isset($price) ? $price : ""; ?>"> <br>
    <?php if(isset($errors['price'])) foreach ($errors['price'] as $value) echo "<p class ='input-error'> $value </p>"; ?> 

    <label for="platform"> Platform </label> <br>
    <select name ="platform">
        <option value="Select Platform" selected>Select Platform</option>
        <option value="PC">PC</option>
        <option value="Nintendo Switch">Nintendo Switch</option>
        <option value="Nintendo Wii">Nintendo Wii</option>
        <option value="Nintendo DS">Nintendo DS</option>
        <option value="Nintendo GameCube">Nintendo GameCube</option>
        <option value="Nintendo 64">Nintendo 64</option>
        <option value="XBOX 360">XBOX 360</option>
        <option value="XBOX One">XBOX One</option>
        <option value="PS2">PS2</option>
        <option value="PS3">PS3</option>
        <option value="PS4">PS4</option>
        <option value="PSP">PSP</option>
    </select> <br>
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