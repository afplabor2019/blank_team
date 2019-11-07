<?php require_once "pages/head.php"; ?>
<?php
    $sql = new SQL();
    $product = $sql->execute("SELECT * FROM products");
?>
<?php foreach ($product as $key => $value)
{
?> <img src ="<?php echo $value['cover'] ?>">; <?php
echo "<p>".$value['title'];"</p>";
echo "<p>".$value['price'];"</p>";
echo "<p>".$value['platform'];"</p>";
echo "<p>".$value['publisher'];"</p>";
echo "<p>".$value['type'];"</p>";
echo "<p>".$value['release_year'];"</p>";
echo "<p>".$value['description'];"</p>";
echo "<br>";
}
?>






<?php require_once "pages/footer.php"; ?>