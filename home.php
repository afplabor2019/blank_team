<?php require_once "pages/head.php";?>
<?php 
$sql = new SQL();

//newest products
$newest = $sql->execute("SELECT * FROM `products` WHERE (`adpic` <> ?) AND (`adpic` IS NOT NULL) ORDER BY `id` DESC LIMIT 6","none");

//best products
$best_scored = $sql->execute("SELECT * FROM `products` ORDER BY `score` DESC LIMIT 6 ");
foreach ($best_scored as $key => $value) {

}

?>
<div class="page-home">
    <div class="main-column">
        <!--<img src="menogif.gif" alt="So 2004">-->
        <section class="home-big-ad">
        <div class="home-title">
            <a>
                Top trending
            </a>
        </div>
       
        <div class="slideshow-container">

            <?php
            for ($i=0; $i < sizeof($newest); $i++):
            ?>
                <div class="mySlides fade">
                    <a href="<?=url('product')?>&id=<?=$newest[$i]['id']?>">
                        <div class="box-hover">
                            <div class="product-item" style="float: left;">
                                <img src="<?=$newest[$i]['cover']?>" style="width: 100%;">
                            </div>
                            <div>
                                <div style="font-size: 26pt">
                                    <?=$newest[$i]['title']?>
                                </div>
                                <div style="max-height: 275px; padding: 5px; line-height:22px !important; text-align: justify;">
                                    <?=$newest[$i]['description']?>
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="numbertext">1 / <?=sizeof($newest)?></div>
                    <img src="<?=$newest[$i]['adpic']?>" style="width:100%">
                    <div class="text"></div>
                </div>
            <?php
            endfor;
            ?>

            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>

        </div>
        <br>

        <div style="text-align:center">
            <?php for ($i=0; $i < sizeof($newest); $i++):?>
                <span class="dot" onclick="currentSlide(<?=($i+1)?>)"></span> 
            <?php endfor; ?>
        </div>
        </section>
        <div></div>
        <div class="home-title">
            <a>
                Best reviewed
            </a>
            <p style="text-align: justify">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptate dolore accusantium fugiat corrupti vitae voluptatem recusandae, deleniti rerum mollitia sapiente incidunt perferendis, aspernatur voluptates! Nostrum nam totam ipsum autem eum.
            Et ipsum non id eligendi tempora cum esse veniam placeat deleniti, natus autem expedita enim a fugit aliquid minus adipisci dicta officiis veritatis cumque. Tempore rem vitae consequatur quaerat officia!
            Illo mollitia amet dolore delectus quia iusto, optio quam eos et fugit at cupiditate, doloribus sapiente eveniet qui corrupti, ipsam corporis a? Tenetur, sunt ad! Minima deserunt temporibus delectus id.
            Repellat dolores exercitationem ipsa corporis eaque corrupti aspernatur quisquam facilis, officiis non possimus nobis voluptatem. Quae iure sequi, dolore deleniti, obcaecati fuga consequatur at earum perferendis placeat, veritatis rem veniam.
            Quaerat odit ipsa accusantium consectetur ullam perferendis enim repellendus quidem obcaecati amet adipisci, corporis animi placeat ipsam suscipit quod, porro atque modi ex delectus! Necessitatibus assumenda saepe quaerat nulla vitae.
            Iste, ducimus repudiandae ipsa enim provident nihil veritatis. Non accusamus quis magni aliquid labore ea sed necessitatibus nobis! Laborum asperiores ad cum doloremque provident alias ipsam quam sunt beatae quidem?
            Eius perspiciatis eum ex porro labore maiores incidunt cumque obcaecati odio quam veniam voluptate at voluptatem inventore quaerat, atque saepe velit reprehenderit molestiae in. Cumque corrupti quam debitis delectus ut?
            Voluptatibus, aut? Officiis nostrum blanditiis corrupti! Nemo quis iste eius ullam suscipit repellendus consectetur, est minus modi? Quos nam, corrupti quia perferendis sed rerum eos, quidem fugiat quaerat quod vitae.
             </p>
        </div>
        <div class="home-title">
            <a>
                Akciós termékek
            </a>
            <p style="text-align: justify">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptate dolore accusantium fugiat corrupti vitae voluptatem recusandae, deleniti rerum mollitia sapiente incidunt perferendis, aspernatur voluptates! Nostrum nam totam ipsum autem eum.
            Et ipsum non id eligendi tempora cum esse veniam placeat deleniti, natus autem expedita enim a fugit aliquid minus adipisci dicta officiis veritatis cumque. Tempore rem vitae consequatur quaerat officia!
            Illo mollitia amet dolore delectus quia iusto, optio quam eos et fugit at cupiditate, doloribus sapiente eveniet qui corrupti, ipsam corporis a? Tenetur, sunt ad! Minima deserunt temporibus delectus id.
            Repellat dolores exercitationem ipsa corporis eaque corrupti aspernatur quisquam facilis, officiis non possimus nobis voluptatem. Quae iure sequi, dolore deleniti, obcaecati fuga consequatur at earum perferendis placeat, veritatis rem veniam.
            Quaerat odit ipsa accusantium consectetur ullam perferendis enim repellendus quidem obcaecati amet adipisci, corporis animi placeat ipsam suscipit quod, porro atque modi ex delectus! Necessitatibus assumenda saepe quaerat nulla vitae.
            Iste, ducimus repudiandae ipsa enim provident nihil veritatis. Non accusamus quis magni aliquid labore ea sed necessitatibus nobis! Laborum asperiores ad cum doloremque provident alias ipsam quam sunt beatae quidem?
            Eius perspiciatis eum ex porro labore maiores incidunt cumque obcaecati odio quam veniam voluptate at voluptatem inventore quaerat, atque saepe velit reprehenderit molestiae in. Cumque corrupti quam debitis delectus ut?
            Voluptatibus, aut? Officiis nostrum blanditiis corrupti! Nemo quis iste eius ullam suscipit repellendus consectetur, est minus modi? Quos nam, corrupti quia perferendis sed rerum eos, quidem fugiat quaerat quod vitae.
             </p>
        </div>
        <div class="home-title">
            <a>
                Még valaminek a helye
            <a>
        </div>
        <p style="text-align: justify">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptate dolore accusantium fugiat corrupti vitae voluptatem recusandae, deleniti rerum mollitia sapiente incidunt perferendis, aspernatur voluptates! Nostrum nam totam ipsum autem eum.
            Et ipsum non id eligendi tempora cum esse veniam placeat deleniti, natus autem expedita enim a fugit aliquid minus adipisci dicta officiis veritatis cumque. Tempore rem vitae consequatur quaerat officia!
            Illo mollitia amet dolore delectus quia iusto, optio quam eos et fugit at cupiditate, doloribus sapiente eveniet qui corrupti, ipsam corporis a? Tenetur, sunt ad! Minima deserunt temporibus delectus id.
            Repellat dolores exercitationem ipsa corporis eaque corrupti aspernatur quisquam facilis, officiis non possimus nobis voluptatem. Quae iure sequi, dolore deleniti, obcaecati fuga consequatur at earum perferendis placeat, veritatis rem veniam.
            Quaerat odit ipsa accusantium consectetur ullam perferendis enim repellendus quidem obcaecati amet adipisci, corporis animi placeat ipsam suscipit quod, porro atque modi ex delectus! Necessitatibus assumenda saepe quaerat nulla vitae.
            Iste, ducimus repudiandae ipsa enim provident nihil veritatis. Non accusamus quis magni aliquid labore ea sed necessitatibus nobis! Laborum asperiores ad cum doloremque provident alias ipsam quam sunt beatae quidem?
            Eius perspiciatis eum ex porro labore maiores incidunt cumque obcaecati odio quam veniam voluptate at voluptatem inventore quaerat, atque saepe velit reprehenderit molestiae in. Cumque corrupti quam debitis delectus ut?
            Voluptatibus, aut? Officiis nostrum blanditiis corrupti! Nemo quis iste eius ullam suscipit repellendus consectetur, est minus modi? Quos nam, corrupti quia perferendis sed rerum eos, quidem fugiat quaerat quod vitae.
             </p>
        <div>People said about us:</div> <br>
        <?php 

    $reviews = $sql->execute("SELECT * FROM `reviews` WHERE `product_id` = 1 AND `score` >4");
    $count = $sql->execute("SELECT Count(*) as `count` FROM `reviews` WHERE `product_id` = ? ",1);
    foreach ($reviews as $key => $value) {
        echo "<div class='recent-reviews'>";
        $profilepic = $sql->execute("SELECT `profile_pic` FROM `users` WHERE id = ?",$value['user_id']);
        $username = $sql->execute("SELECT `user_name` FROM `users` WHERE id = ?",$value['user_id']);
        $message = $value['msg'];
        $score = $value['score'];
        $generatedid=GenerateID(4);
        echo "<div class='recent-r-right'>";     
        echo "<img src=".$profilepic[0]['profile_pic']." class=p-review-profile-pic>";
        echo "<p>".$username[0]['user_name']."</p></div>";
        echo "<div class='recent-r-left'><span class=rating>";
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
        echo "<textarea name=review class=p-review readonly>$message</textarea></div>";  
        echo "</div>";
    }
    ?>

</div>
    </div>
</div> 
<?php require_once "pages/footer.php"; ?>
<script>
    var slideIndex = 1;
        showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {
            slideIndex = 1;
        }    
        if (n < 1) {
            slideIndex = slides.length;
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";  
        dots[slideIndex-1].className += " active";
    }
</script>