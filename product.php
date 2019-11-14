<?php include_once "pages/head.php"; 
    $sql = new SQL();
    $errors = [];
    $productid = $_GET['id'];
    $product = $sql->execute("SELECT * FROM `products` WHERE `id` = ?",$productid);
    if(is_post()){
        //insert into order database?
        $reviewDescription = $_POST['review'];
  
        if(count($errors) == 0)
        $sql->execute("INSERT INTO `reviews`(`id`, `user_id`, `product_id`, `msg`, `score`) VALUES (?,?,?,?,?)",GenerateID(),$_SESSION['user_id'],$productid,$reviewDescription,$_POST['rating-input']);
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
<span class="rating">
    <input type="radio" class="rating-input"
        id="rating-input-1-5" name="rating-input" value =5>
    <label for="rating-input-1-5" class="rating-star"></label>
    <input type="radio" class="rating-input"
        id="rating-input-1-4" name="rating-input" value =4>
    <label for="rating-input-1-4" class="rating-star"></label>
    <input type="radio" class="rating-input"
        id="rating-input-1-3" name="rating-input" value =3>
    <label for="rating-input-1-3" class="rating-star"></label>
    <input type="radio" class="rating-input"
        id="rating-input-1-2" name="rating-input"value =2>
    <label for="rating-input-1-2" class="rating-star"></label>
    <input type="radio" class="rating-input"
        id="rating-input-1-1" name="rating-input" value =1>
    <label for="rating-input-1-1" class="rating-star"></label>
</span><br>
<textarea name="review" class="p-review"></textarea>
<img src="images/user.jpg" alt="" class="p-review-profile-pic">
<input type="submit" value ="SUBMIT">
</form>


<!-- eddigi review-k listázása -->
</div>

<?php
include_once "pages/footer.php";
?>