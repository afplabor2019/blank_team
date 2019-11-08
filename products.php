<?php require_once "pages/head.php"; ?>
<?php

    $minID = 1;
    $maxID = 12;
    if(isset($_POST['minidtext'])){
        $minID = $_POST['minidtext'];
    }

    if(isset($_POST['maxidtext'])){
        $maxID = $_POST['maxidtext'];
    }  
    if(isset($_POST['increase'])){
        $maxID += 12;
        $minID += 12;
    } else if(isset($_POST['decrease']) && $minID >1){
        $maxID -= 12;
        $minID -= 12;
    }

    $sql = new SQL();
    $product = $sql->execute("SELECT * FROM `products` WHERE `id` BETWEEN ? AND ?",$minID,$maxID);
    $maxPossibleID = $sql->execute("SELECT `id` FROM `products` WHERE `id` = (SELECT MAX(`id`) FROM `products`)");
    $minvalue;
    $maxvalue;
?>
<div class="product-filters">
    Szűrők
    <form action="<?php echo url('products')?>" method="POST">
        <div class="filter-price">
            <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
            <link rel="stylesheet" href="/resources/demos/style.css">
            <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
            <script>
            $( function() {
                $( "#slider-range" ).slider({
                range: true,
                min: 0,
                max: 500,
                values: [ 75, 300 ],
                slide: function( event, ui ) {
                    $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
                }
                });
                
                $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
                " - $" + $( "#slider-range" ).slider( "values", 1 ) );
            } );
            </script> 
            <p>
                <label for="amount">Price range:</label>
                <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
            </p>
            <div id="slider-range"></div>
        </div>
        
        <p>Platforms</p>
        <input type="checkbox" name="platform-pc" value="PC" checked>PC<br>
        <input type="checkbox" name="platform-xbox" value="XBOX ONE">XBOX ONE<br>
        <input type="checkbox" name="platform-ps4" value="PS4">PS4<br>
        <input type="checkbox" name="platform-switch" value="Nintendo Switch">Nintendo Switch<br>
        <input type="checkbox" name="platform-others" value="Others">Others<br>
    
        
        <label for="type"> Type </label> <br>
        <select name ="type">
            <option value="Select Type" selected>Select Type</option>
            <option value="Strategy">Strategy</option>
            <option value="Shooter">Shooter</option>
            <option value="Moba">Moba</option>
            <option value="Open world">Open world</option>
        </select> <br>
        <label>Release year</label><br>
        <input name="release-year" type="number" min="1990" max="<?php echo date('Y') ?>">
        <label>Publisher</label>
        <input name="publisher" type="text">
        <button type="submit" class="products-btn">Search</button>
    </form>
    </div>
<div class="product-list">
<?php foreach ($product as $key => $value)
{
?>
<?php
echo "<div class =product-item>";
?><a href ="<?php echo url('product') ?>"><img class="product-image" src ="<?php echo $value['cover'] ?>"></a>
<div class="product-color"></div>
<?php
echo "<p class=product-title>".$value['title'];"</p>";
echo "<p class=product-title>".$value['price']. " €";"</p><br>";
echo "<p>".$value['platform'];"</p>";
echo "<br>";
echo "</div>";
}
?>
<form action = <?php echo url('products') ?> method = "POST">
<button type ="submit" name ="decrease" style="<?php echo $minID ==1 ? "display:none" : " " ?>">  Previous </button>
<button type ="submit" name="increase" style ="<?php echo ($maxPossibleID[0]['id']) <= $maxID ? "display:none" : " " ?>"> Next </button>
<input type="text" name ="minidtext" value="<?php echo $minID ?>" style="display:none">
<input type="text" name ="maxidtext" value="<?php echo $maxID ?>" style="display:none">
</form>
</div>

<?php require_once "pages/footer.php"; ?>