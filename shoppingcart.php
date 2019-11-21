<?php require_once "pages/head.php";?>
<?php 
$total =0;
$sql = new SQL();
//Getting the order_ids of the user
$orderid = $sql->execute("SELECT `id` FROM orders WHERE `user_id` = ?", loggedIn() ? $_SESSION['user_id'] : $_SESSION['guest_user_id']);
$orders_array = "(";
foreach ($orderid as $key => $value) {
   $orders_array.= "'".$value['id']."',";
}
$orders_array = rtrim(trim($orders_array), ',');
$orders_array.= ")";

//getting the order_item of the user using order_ids
$order_item = $sql->execute("SELECT * FROM `order_item` WHERE `order_id` IN $orders_array");

//displaying orders

echo"<h1> Shopping cart: </h1>";
foreach ($order_item as $key => $value) : ?>
<?php 
    $item = $sql->execute("SELECT * FROM `products` WHERE id = ?",$value['item_id']);
?> 
<div class ="shopping-cart-container">
    <div class ="shopping-cart-row">
        <p class ="shopping-cart-delete-cross"> &#10060</p>
        <p class ="shopping-cart-gametitle"><?php echo $item[0]['title'] ?></p>
        <p class ="shopping-cart-platform"><?php echo $item[0]['platform'] ?></p>
        <p class ="shopping-cart-unitprice">unit price : <?php echo $item[0]['price'] ?> €</p>
        <p  class ="shopping-cart-quantity-text">quantity:</p>
        <input class="shopping-cart-quantity" type="number" name ="quantity" id = "quantity" value="1">
        <p class ="shopping-cart-total">Total : <?php echo $item[0]['price']?></p>
        
    </div>
</div>

<?php endforeach; ?> 
<?php require_once "pages/footer.php"; ?>