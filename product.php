<?php include_once "pages/head.php"; 
    $sql = new SQL();
    $productid = $_GET['id'];
    $product = $sql->execute("SELECT * FROM `products` WHERE `id` = ?",$productid);
    if(is_post()){
        //insert into order database?
    }

?>
<div class="product-container">
    <div class = "product-left-side">
        <img class="p-image" src="<?php echo $product[0]['cover'] ?>" alt="cover"><br>
        <form action="<?php echo url('product')."&id=$productid" ?>" method = "POST"><button type="submit">TO CART</button></form>
    </div>
    <div class ="product-right-side">
        <h1 class ="p-title"><?php echo $product[0]['title']?></h1>
        <p class ="p-price" ><?php echo $product[0]['price']." €"  ?></p>
        <p class ="p-publisher" ><?php echo $product[0]['publisher'] ?></p>
        <p class ="p-platform" ><?php echo $product[0]['platform'] ?></p>
        <p class ="p-desc" ><?php echo $product[0]['description'] ?></p>

    </div>
</div>

<div class="p-send-review">
<h1>Leave a review of this game!</h1>
<form action="<?php echo url('product')."&id=$productid" ?>" method = "POST">
<textarea name="review" class="p-review"></textarea>
<input type="submit" value ="SUBMIT">
</form>

<!-- eddigi review-k listázása -->
</div>

<?php
include_once "pages/footer.php";
?>