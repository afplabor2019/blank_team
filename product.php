<?php include_once "pages/head.php"; 
    $sql = new SQL();
    $product = $sql->execute("SELECT * FROM `products` WHERE `id` = ?",$_GET['id']);

?>
<div class="product-container">
    <div class = "product-left-side">
        <img class="p-image" src="<?php echo $product[0]['cover'] ?>" alt="cover"><br>
        <button >TO CART</button>
    </div>
    <div class ="product-right-side">
        <h1 class ="p-title"><?php echo $product[0]['title']?></h1>
        <p class ="p-price" ><?php echo $product[0]['price']." €"  ?></p>
        <p class ="p-publisher" ><?php echo $product[0]['publisher'] ?></p>
        <p class ="p-desc" ><?php echo $product[0]['description'] ?></p>
    </div>
</div>

<div class="p-send-review">
<h1>Leave a review of this game!</h1>
<textarea name="review" class="p-review"></textarea>
</div>

<?php
include_once "pages/footer.php";
?>