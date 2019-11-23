<?php require_once "pages/head.php";?>
<?php 
$total =0;
$row = 0;
$sql = new SQL();

if(is_post()){
    if(isset($_POST['button'])){
        $result = $sql->execute("SELECT `order_id` FROM `order_item` WHERE `item_id` = ?",$_POST['button']);
        $sql->execute("DELETE FROM `order_item` WHERE `item_id` = ?",$_POST['button']);
        $sql->execute("DELETE FROM `orders` WHERE `id` = ?",$result[0]['order_id']);
        header("Location:".url('shoppingcart'));
    }
}
//Getting the order_ids of the user
$orderid = $sql->execute("SELECT `id` FROM orders WHERE `user_id` = ?", loggedIn() ? $_SESSION['user_id'] : $_SESSION['guest_user_id']);
$orders_array = "(";
foreach ($orderid as $key => $value) {
   $orders_array.= "'".$value['id']."',";
}
$orders_array = rtrim(trim($orders_array), ',');
$orders_array.= ")";

//getting the order_item of the user using order_ids
if($orders_array != '()')
$order_item = $sql->execute("SELECT * FROM `order_item` WHERE `order_id` IN $orders_array");

//displaying orders
?>

<?php

//if there are items in the shopping cart
if($orders_array != '()'){
    ?><div class ="shopping-cart-container">
    <h1 class="login-h">SHOPPING CART</h1>  
    <div class="cart-border">
    <?php foreach ($order_item as $key => $value) : ?>
    <?php 
        $item = $sql->execute("SELECT * FROM `products` WHERE id = ?",$value['item_id']);
        $row += 1;  
    ?> 
        <div class ="shopping-cart-row" style="background-color:<?php echo $row % 2 == 0 ? 'white' : '' ?>">
        <form action="<?php echo url('shoppingcart');?>" method="POST"><button name="button" value="<?php echo $value['item_id'] ?>">&#10060</button></form>
            <span class ="shopping-cart-delete-cross"> </span>
            <span class ="shopping-cart-gametitle" title="<?php echo $item[0]['title'] ?>"><?php echo $item[0]['title'] ?></span>
            <span class ="shopping-cart-platform"><?php echo $item[0]['platform'] ?></span>
            <span class ="shopping-cart-unitprice" title="Unit price">U.p. : <?php echo $item[0]['price'] ?> €</span>
            <span  class ="shopping-cart-quantity-text">quantity:</span>
            <input class="shopping-cart-quantity" type="number" name ="quantity" id = "quantity" value="1">
            <span class ="shopping-cart-total">Total : <?php echo $item[0]['price']?></span><br>
        </div>
    <?php endforeach; ?>


</div>
    <span class ="sp-total">Total :</span><br>
    <button class ="shopping-cart-btn" type="submit"><Span>Buy</span></button>
</div>
<?php }
//if there are no items in the shopping cart.
else {
    echo "<h1> Your shopping cart is empty! </h1>";
}  ?>
<?php require_once "pages/footer.php"; ?>