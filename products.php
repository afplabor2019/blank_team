<?php require_once "pages/head.php"; ?>
<?php
    $sql = new SQL();
    $product = $sql->execute("SELECT * FROM products WHERE id = 1");
?>
<img src = "<?php echo $product[0]['cover'] ?>">
<p><?php echo $product[0]['title'] ?></p>
<p><?php echo $product[0]['publisher'] ?></p>
<p><?php echo $product[0]['price'] ?></p>
<p><?php echo $product[0]['platform'] ?></p>
<p><?php echo $product[0]['type'] ?></p>
<p><?php echo $product[0]['description'] ?></p>
<p><?php echo $product[0]['release_year'] ?></p>










<?php require_once "pages/footer.php"; ?>