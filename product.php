<?php include_once "pages/head.php"; 
    $sql = new SQL();
    $errors = [];
    $productid = $_GET['id'];
    $product = $sql->execute("SELECT * FROM `products` WHERE `id` = ?",$productid);
    $avarageScore = 0;
    $average_data = $sql->execute("SELECT score,review_count FROM `products` WHERE id = ?",$productid);
    if($average_data[0]['review_count'] == 0){
            $avarageScore = $average_data[0]['score'];
    } else
        $avarageScore = $average_data[0]['score'] / $average_data[0]['review_count'];

    if(is_post())
    {
            if(isset($_POST['review']))
            $reviewDescription = $_POST['review'];
            if(isset($_POST['review']) && $reviewDescription  == null) $errors['err'][] = "Message is required!";
            if(!isset($_SESSION['user_id'])) $errors['err'][] = "You have to log in to leave a review!";
            if(!isset($_POST['rating-input'])) $errors['err'][] = "You have to give a rating!";

            if(count($errors) == 0){
                $sql->execute("INSERT INTO `reviews`(`id`, `user_id`, `product_id`, `msg`, `score`) VALUES (?,?,?,?,?)",GenerateID(),$_SESSION['user_id'],$productid,$reviewDescription,$_POST['rating-input']);
                $sql->execute("UPDATE `products` SET `score` = ? WHERE `id` = ?",$average_data[0]['score']+$_POST['rating-input'],$productid);
                $sql->execute("UPDATE `products` SET `review_count` = ? WHERE `id` = ?" ,$average_data[0]['review_count']+1,$productid);
                $average_data[0]['score'] += $_POST['rating-input'];
                $average_data[0]['review_count'] += 1;
                $avarageScore = $average_data[0]['score'] / $average_data[0]['review_count'];    
            }       

        if(isset($_POST['tc']) && $_POST['tc'] != null){
            $orderid = GenerateID();
            if(isset($_SESSION['user_id'])){
                $result =$sql->execute("SELECT shipping_id FROM users WHERE `id` = ?",$_SESSION['user_id']);
                $shipping = $result[0]['shipping_id'];
            }else{
                $shipping = "none";
            }
            $sql->execute("INSERT INTO `orders`(`id`, `user_id`, `shipping_id`) VALUES (?,?,?)",$orderid,isset($_SESSION['user_id']) ? $_SESSION['user_id'] : $_SESSION['guest_user_id'],$shipping == null ? "none" : $shipping);
        
            $sql->execute("INSERT INTO `order_item`(`order_id`, `item_id`, `quantity`, `del`) VALUES (?,?,?,?)",$orderid,$productid,1,0);
            header("Location:". url('product')."&id=$productid");
        }
    }
?>
<div class="product-container">
    <div class = "product-left-side">
        <img class="p-image" src="<?php echo $product[0]['cover'] ?>" alt="cover"><br>
        <span>Reviews: <?php echo round($avarageScore, 2) ==0 ? "No reviews yet!" : round($avarageScore, 2)?><?php if(round($avarageScore, 2) !=0) : ?><p class ="fa fa-star" style="color:orange;padding-left:1%;"></p> <?php endif;?></span> 
        <form action="<?php echo url('product')."&id=$productid" ?>" method = "POST">
        <button class ="product-tc" type="submit" value="asd"><Span>To Cart</span></button>
        <input type="hidden" name="hidden">
        </form>
    </div>
    <div class ="product-right-side">
        <h1 class ="p-title"><?php echo $product[0]['title']?></h1>
        <p class ="p-price" > <?php echo $product[0]['price']." €"  ?></p>
        <p class ="p-publisher" ><span style="font-weight: bold">Publisher:</span><?php echo $product[0]['publisher'] ?></p>
        <p class ="p-platform" ><span style="font-weight: bold">Platform:</span><?php echo $product[0]['platform'] ?></p>
        <p class="span-desc">Description: </p><br>
        <div class="p-box"><p class ="p-desc" ><?php echo $product[0]['description'] ?></p></div>

    </div>
</div>

<div class="p-send-review">
<div class="leave-review">
    <h1>Leave a review of this game!</h1>
    
    <form action="<?php echo url('product')."&id=$productid" ?>" method = "POST">
    <span class="rating">
        <input type="radio" class="rating-input" id="rating-input-1-5" name="rating-input" value =5>
        <label for="rating-input-1-5" class="rating-star"></label>
        <input type="radio" class="rating-input" id="rating-input-1-4" name="rating-input" value =4>
        <label for="rating-input-1-4" class="rating-star"></label>
        <input type="radio" class="rating-input" id="rating-input-1-3" name="rating-input" value =3>
        <label for="rating-input-1-3" class="rating-star"></label>
        <input type="radio" class="rating-input" id="rating-input-1-2" name="rating-input"value =2>
        <label for="rating-input-1-2" class="rating-star"></label>
        <input type="radio" class="rating-input" id="rating-input-1-1" name="rating-input" value =1>
        <label for="rating-input-1-1" class="rating-star"></label>
    </span><br>
    <textarea name="review" class="p-review"></textarea>
    <img src="images/user.jpg" alt="" class="p-review-profile-pic">
    <?php if(isset($errors['err'])) foreach ($errors['err'] as $key => $value) echo "<p> $value </p>"; ?>
    <input type="submit" value ="SUBMIT">
    </form>
</div>
<div class="recent-reviews">
    <!-- eddigi review-k listázása -->
    <?php 

    $reviews = $sql->execute("SELECT * FROM `reviews` WHERE `product_id` = ? ",$productid);
    $count = $sql->execute("SELECT Count(*) as `count` FROM `reviews` WHERE `product_id` = ? ",$productid);
    foreach ($reviews as $key => $value) {
        $profilepic = $sql->execute("SELECT `profile_pic` FROM `users` WHERE id = ?",$value['user_id']);
        $username = $sql->execute("SELECT `user_name` FROM `users` WHERE id = ?",$value['user_id']);
        $message = $value['msg'];
        $score = $value['score'];
        $generatedid=GenerateID(4);
        echo "<span class=rating>";
        if($score == 5) echo "<input type=radio class=rating-input id=rating-input-1-5 name=rating-input$generatedid value =5 checked>";
        else  echo "<input type=radio class=rating-input id=rating-input-1-5 name=rating-input$generatedid value =5>";
        echo "<label for=rating-input-1-5 class=rating-star></label>";
        if($score ==4) echo "<input type=radio class=rating-input id=rating-input-1-4 name=rating-input$generatedid value =4 checked>";
        else  echo "<input type=radio class=rating-input id=rating-input-1-4 name=rating-input$generatedid value =4>";
        echo "<label for=rating-input-1-4 class=rating-star></label>";
        if($score == 3)echo "<input type=radio class=rating-input id=rating-input-1-3 name=rating-input$generatedid value =3 checked>";
        else echo "<input type=radio class=rating-input id=rating-input-1-3 name=rating-input$generatedid value =3>";
        echo "<label for=rating-input-1-3 class=rating-star></label>";
        if($score ==2)echo "<input type=radio class=rating-input id=rating-input-1-2 name=rating-input$generatedid value =2 checked>";
        else"<input type=radio class=rating-input id=rating-input-1-2 name=rating-input$generatedid value =2>";
        echo "<label for=rating-input-1-2 class=rating-star></label>";
        if($score == 1) echo "<input type=radio class=rating-input id=rating-input-1-1 name=rating-input$generatedid value =1 checked>";
        else echo "<input type=radio class=rating-input id=rating-input-1-1 name=rating-input$generatedid value =1>";
        echo "<label for=rating-input-1-1 class=rating-star></label>";
        echo "</span><br>";
        echo "<textarea name=review class=p-review readonly>$message</textarea>";
        echo "<img src=".$profilepic[0]['profile_pic']." class=p-review-profile-pic>";
        echo "<p>".$username[0]['user_name']."</p>";
    }
    ?>
</div>
</div>



<?php
include_once "pages/footer.php";
?>