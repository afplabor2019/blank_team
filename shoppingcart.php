<?php require_once "pages/head.php";?>
<?php 
$total =0;
$row = 0;
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
if($orders_array != '()')
$order_item = $sql->execute("SELECT * FROM `order_item` WHERE `order_id` IN $orders_array");


if(is_post()){
    //update quantity change in database
    if(isset($order_item))
    foreach ($order_item as $key => $value) {
        $sql->execute("UPDATE `order_item` SET `quantity` = ? WHERE `item_id` = ?",$_POST['quantity'.$value['item_id']],$value['item_id']);    
    }
    if(isset($_POST['buy'])){
        header("Location:".url('buy'));
    } 
    if(isset($_POST['button'])){
        $result = $sql->execute("SELECT `order_id` FROM `order_item` WHERE `item_id` = ?",$_POST['button']);
        $sql->execute("DELETE FROM `order_item` WHERE `item_id` = ?",$_POST['button']);
        $sql->execute("DELETE FROM `orders` WHERE `id` = ?",$result[0]['order_id']);
       
        header("Location:".url('shoppingcart')."#loaded");
    }
    

    
}

//displaying orders
?>

<?php

//if there are items in the shopping cart
if($orders_array != '()'){
    ?><div class ="shopping-cart-container">
    <h1 class="login-h">SHOPPING CART</h1>  

    <form action="<?php echo url('shoppingcart')."#loaded";?>" method="POST">
    <div class="cart-border">
    <?php foreach ($order_item as $key => $value) : ?>
    <?php 
        $item = $sql->execute("SELECT * FROM `products` WHERE id = ?",$value['item_id']);
        $quantity = $sql->execute("SELECT quantity FROM order_item WHERE item_id = ?", $value['item_id']);
        $row += 1;  
        $multiplier = 1;
    ?> 
         
        <div class ="shopping-cart-row" style="background-color:<?php echo $row % 2 == 0 ? 'white' : '' ?>">
           <button name="button" type="submit" value="<?php echo $value['item_id'] ?>">&#10060</button>
            <span class ="shopping-cart-delete-cross"> </span>
            <span class ="shopping-cart-gametitle" title="<?php echo $item[0]['title'] ?>"><?php echo $item[0]['title'] ?></span>
            <span class ="shopping-cart-platform"><?php echo $item[0]['platform'] ?></span>
            <span class ="shopping-cart-unitprice" title="Unit price">U.p. : <?php echo $item[0]['price'] ?> €</span>
            <span  class ="shopping-cart-quantity-text">quantity:</span>
           
            <input type="number" class="shopping-cart-quantity" id="input" name ="<?php echo "quantity".$item[0]['id'] ?>" min ="1" max = "<?php echo $item[0]['stored'] ?>"
                value="<?php echo $quantity[0]['quantity']?>">
            <span class ="shopping-cart-total">Total : <?php echo isset($_POST['quantity'.$item[0]['id']]) ? $_POST['quantity'.$item[0]['id']] * $item[0]['price'] : $item[0]['price']?> €</span><br>
         <?php if (isset($_POST['quantity'.$item[0]['id']])) $total += $_POST['quantity'.$item[0]['id']] * $item[0]['price'];  ?>
        </div>
  
    <?php endforeach; ?>  
    </div>
    <span class ="sp-total">Total : <?php echo $total ?> €</span><br>
    <input  class ="shopping-cart-btn" type="submit" name="buy" id="buy" value="Buy">
    <input type="submit" id ="hidden" style="display:none">
    </form>

   
</div>
<?php }
//if there are no items in the shopping cart.
else {
    echo "<h1> Your shopping cart is empty! </h1>";
}  ?>
<?php require_once "pages/footer.php"; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(document).ready(function() {
        $("input").change(function() {
            var tempInput = this.value;
            var inputName = this.name;
            $.post(window.location ,{
                name: inputName,
                multi: tempInput
            }, function(data,status){
               $("#hidden").click();

            });
        });
    });

    $(document).ready(function() {
        $("button").click(function() {
            var tempInput = this.value;
            var inputName = this.name;
            $.post(window.location ,{
                name: inputName,
                multi: tempInput
            }, function(data,status){
               $("#hidden").click();

            });
        });
    });

    $(document).ready(function() {
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
});
    
    window.onload = function() {
    if(!window.location.hash) {
        window.location = window.location + '#loaded';
        $("#hidden").click();
    }
    };

</script>
