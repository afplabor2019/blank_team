<?php require_once "pages/head.php";?>
<?php 
$sql = new SQL();

//newest products
$newest = $sql->execute("SELECT * FROM `products` WHERE (`adpic` <> ?) AND (`adpic` IS NOT NULL) ORDER BY `id` DESC LIMIT 6","none");
/*foreach ($newest as $key => $value) {
    echo $value['id']." ";
    echo $value['title']." ";
    echo $value['price']." ";
    echo $value['platform']." ";
}*/

//best products
$best_scored = $sql->execute("SELECT * FROM `products` ORDER BY `score` DESC LIMIT 6 ");
foreach ($best_scored as $key => $value) {
   /* echo $value['id']." ";
    echo $value['title']." ";
    echo $value['score']." "; */
}

?>
<div class="page-home">
    <div class="main-column">
        <!--<img src="menogif.gif" alt="So 2004">-->
        <section class="home-big-ad">
        <div class="home-title">
            <a>
                Legújabb megjelenések
            </a>
        </div>
        <!--div class="home-ad-image">
            <img src="images/ds-home2.jpg" alt="Death Stranding" class="home-image">
                <div class="home-img-button">
                    <div class="home-btn-text">Vásárlás</div>
                    <div class="home-text-button">
                    <div class="home-img-textarea">
                            Éld át Hideo Kojima (a Metal Gear Solid sorozat alkotója) legújabb akciójátékát,
                            amely a közeli jövőben játszódik, és amelyben a szétszakadt társadalmat kell újra
                            egyesítened. Ez egy új, filmszerű kaland, amely megreformálja a műfajt!
                    </div>
                    </div>
                </div>
                
        </div-->
        <div class="slideshow-container">

            <?php
            for ($i=0; $i < sizeof($newest); $i++):
            ?>
                <div class="mySlides fade">
                    <div class="box-hover">
                        <div class="product-item" style="float: left;">
                            <img src="<?=$newest[$i]['cover']?>" style="width: 100%;">
                        </div>
                        <div style="float: right;">

                        </div>
                    </div>
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
                Óriási reklám helye
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
        <div></div>
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