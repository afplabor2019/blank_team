<?php require_once "pages/head.php";?>
<!--
<style>
.feature_slider {display:none}
.w3-left, .w3-right, .w3-badge {cursor:pointer}
.w3-badge {height:13px;width:13px;padding:0}
</style>-->

<?php 
$sql = new SQL();

//newest products
$newest = $sql->execute("SELECT * FROM `products` WHERE (`adpic` <> \"none\") AND (`adpic` IS NOT NULL) ORDER BY `id` DESC LIMIT 6");

//best products
$best_scored1 = $sql->execute("SELECT * FROM `products` WHERE (`cover` <> \"none\") AND (`cover` IS NOT NULL) ORDER BY `score` DESC LIMIT 4 ");
$best_scored2 = $sql->execute("SELECT * FROM `products` WHERE (`cover` <> \"none\") AND (`cover` IS NOT NULL) ORDER BY `score` DESC LIMIT 4,4 ");

?>
<div class="page-home">
    <div class="main-column">
        <!--<img src="menogif.gif" alt="So 2004">-->
        <section class="home-big-ad">
        <div class="home-title">
        <h1 class="home-titles">TOP TRENDING</h1>  
        </div>
       
        <div class="slideshow-container">
            <?php
            for ($i=0; $i < sizeof($newest); $i++):
            ?>
                <div class="feature_slider fadeanim">
                    <a href="<?=url('product')?>&id=<?=$newest[$i]['id']?>">
                        <div class="box-hover">
                            <div class="home-coverimg" style="float: left;">
                                <img src="<?=$newest[$i]['cover']?>" style="width: 100%;">
                            </div>
                            <div>
                                <div style="font-size: 20pt">
                                    <?=$newest[$i]['title']?>
                                </div>
                                <div style="max-height: 275px; padding: 4%; line-height:22px !important; text-align: justify;">
                                    <?=$newest[$i]['description']?>
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="numbertext">1 / <?=sizeof($newest)?></div>
                    <img src="<?=$newest[$i]['adpic']?>" style="width:100%; height: 600px">
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
            <h1 class="home-titles">BEST REVIEWED</h1>  
            <!-- SLIDER -->
            <div>
                <div class="row">
                    <div class="row">
                        <div class="col-md-9">
                        </div>
                        <div class="col-md-3">
                            <!-- Controls -->
                            <div class="controls pull-right hidden-xs">
                                <a class="left fa fa-chevron-left btn btn-danger" href="#carousel-s"
                                    data-slide="prev"></a><a class="right fa fa-chevron-right btn btn-danger" href="#carousel-s"
                                        data-slide="next"></a>
                            </div>
                        </div>
                    </div>
                    <div id="carousel-s" class="carousel slide hidden-xs" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active" style="background-color: unset !important;">
                                <div class="row">
                                    <?php
                                    for ($j=0; $j < sizeof($best_scored1); $j++):
                                    ?>
                                        <div class="col-sm-3">
                                            <div class="col-item">
                                                <div class="photo">
                                                    <img src="<?=$best_scored1[$j]['cover']?>" class="img-responsive" />
                                                </div>
                                                <div class="info">
                                                    <div class="col-md-6">
                                                        <div class="price row">
                                                            <h4 style="color: black;"><?=$best_scored1[$j]['title']?></h4>
                                                            <h5 class="price-text-color"><?=$best_scored1[$j]['price']?>€</h5>
                                                        </div>
                                                        <br><br>
                                                        <div class="rating row">
                                                            <?php
                                                            for ($s=1; $s < 6; $s++) {
                                                                if($best_scored1[$j]['review_count'] != 0)
                                                                    $score = $best_scored1[$j]['score'] / $best_scored1[$j]['review_count'];
                                                                else
                                                                    $score = 0;
                                                                //var_dump($score);
                                                                if($s <= $score){
                                                                    
                                                                    echo('<i class="price-text-color fa fa-star"></i>');
                                                                }
                                                                else{
                                                                    echo('<i class="fa fa-star"></i>');
                                                                }
                                                            }
                                                            ?>
                                                            <!--i class="price-text-color fa fa-star"></i>
                                                            <i class="price-text-color fa fa-star"></i>
                                                            <i class="price-text-color fa fa-star"></i>
                                                            <i class="price-text-color fa fa-star"></i>
                                                            <i class="fa fa-star"></i-->
                                                        </div>
                                                    </div>
                                                    <div class="separator clear-left">
                                                        <p class="btn-details">
                                                            <a href="<?=url('product')."&id=".$best_scored1[$j]['id']?>" class="hidden-sm">More details</a></p>
                                                    </div>
                                                    <div class="clearfix">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    endfor;
                                    ?>
                                </div>
                            </div>
                            <div class="item" style="background-color: unset !important;">
                                <div class="row">
                                    <?php
                                    for ($j=0; $j < sizeof($best_scored2); $j++):
                                    ?>
                                        <div class="col-sm-3">
                                            <div class="col-item">
                                                <div class="photo">
                                                    <img src="<?=$best_scored2[$j]['cover']?>" class="img-responsive" />
                                                </div>
                                                <div class="info">
                                                    <div class="col-md-6">
                                                        <div class="price row">
                                                            <h4 style="color: black;"><?=$best_scored2[$j]['title']?></h4>
                                                            <h5 class="price-text-color"><?=$best_scored2[$j]['price']?>€</h5>
                                                        </div>
                                                        <br><br>
                                                        <div class="rating row">
                                                            <?php
                                                            for ($s=1; $s < 6; $s++) {
                                                                if($best_scored2[$j]['review_count'] != 0)
                                                                    $score = $best_scored2[$j]['score'] / $best_scored2[$j]['review_count'];
                                                                else
                                                                    $score = 0;
                                                                //var_dump($score);
                                                                if($s <= $score){
                                                                    
                                                                    echo('<i class="price-text-color fa fa-star"></i>');
                                                                }
                                                                else{
                                                                    echo('<i class="fa fa-star"></i>');
                                                                }
                                                            }
                                                            ?>
                                                            <!--i class="price-text-color fa fa-star"></i>
                                                            <i class="price-text-color fa fa-star"></i>
                                                            <i class="price-text-color fa fa-star"></i>
                                                            <i class="price-text-color fa fa-star"></i>
                                                            <i class="fa fa-star"></i-->
                                                        </div>
                                                    </div>
                                                    <div class="separator clear-left">
                                                        <p class="btn-details">
                                                            <a href="<?=url('product')."&id=".$best_scored2[$j]['id']?>" class="hidden-sm">More details</a></p>
                                                    </div>
                                                    <div class="clearfix">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    endfor;
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/SLIDER -->
        </div>
        <div class="home-title">
            <h1 class="home-titles">coming soon...</h1>  
        </div>
        <div class="com-soon-img"> 
            <img src="images/comingsoonad.jpg" alt="Coming soon..." class="home-cs-image"> 
            <div class="h-csimg-middle">
                <div class="h-csimg-text">Coming soon...</div>
            </div>
        </div>
        <div class="home-title">
        <h1 class="home-titles">People said about us:</h1>  
        </div>
        <p style="text-align: justify"></p><br>
        <div class="home-opinion-box">
        <?php 
        $reviews = $sql->execute("SELECT * FROM `reviews` WHERE `product_id` = 1 AND `score` >4");
        $count = $sql->execute("SELECT Count(*) as `count` FROM `reviews` WHERE `product_id` = ? ",1);
        foreach ($reviews as $key => $value) {
            $profilepic = $sql->execute("SELECT `profile_pic` FROM `users` WHERE id = ?",$value['user_id']);
            $username = $sql->execute("SELECT `user_name` FROM `users` WHERE id = ?",$value['user_id']);
            $message = $value['msg'];
            $score = $value['score'];
            $generatedid=GenerateID(4);    
            echo "<div class='h-o-box-peruser'><div class='h-opinion-left-side'><img src=".$profilepic[0]['profile_pic']." class=p-review-profile-pic>";
            echo "<p>".$username[0]['user_name']."</p></div>";
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
            echo "</span><br><br><br>";
            echo "<div class='message-box'><p>$message</p></div></div>";  
        }
        ?>
        </div>

</div>
    </div>
</div> 
<?php require_once "pages/footer.php"; ?>
<script>
    var intervalID = setInterval(function(){plusSlides(1)}, 10000);
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
        var slides = document.getElementsByClassName("feature_slider");
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