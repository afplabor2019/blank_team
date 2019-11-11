<?php include_once "pages/head.php"; 
    $sql = new SQL();
    $product = $sql->execute("SELECT * FROM `products` WHERE `id` = ?",$_GET['id']);

?>
<div style="padding-bottom:12px;">
<div class = "product-left-side" style = "float:left;width:50%;">
    <img width=300  height=450 style="margin-bottom: 5%;" src="<?php echo $product[0]['cover'] ?>" alt="cover"><br>
    <button >TO CART</button>
</div>

<div class ="product-right-side" style = "float:right;width:50%;;">
    <h1 class = "title" style ="font-size:30px;font-weight:bold;"><?php echo $product[0]['title']?></h1>
    <p class ="price" ><?php echo $product[0]['price']." €"  ?></p>
    <p class ="publisher" ><?php echo $product[0]['publisher'] ?></p>
    <p class ="desc" ><?php echo $product[0]['description'] ?></p>
</div>
</div>
<div class="send-review" style="float:left;">
<h1>Leave a review of this game!</h1>
<textarea name="review" style="border: 1px solid black; padding: 5%;"></textarea>
</div>

<?php
include_once "pages/footer.php";
?>