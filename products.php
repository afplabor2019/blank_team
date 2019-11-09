<?php require_once "pages/head.php"; ?>
<?php

    $minID = 0;
    $maxID = 12;
    if(is_post())
    {
        if(isset($_POST['minidtext']) ||isset($_POST['maxidtext'])){ //ha a gombokkal léptettünk.
            if(isset($_POST['minidtext'])){
                $minID = $_POST['minidtext'];
            }
            if(isset($_POST['maxidtext'])){
                $maxID = $_POST['maxidtext'];
            }  
            if(isset($_POST['increase'])){
                $minID += 12;
            } else if(isset($_POST['decrease']) && $minID >1){
                $minID -= 12;
            }
        }
        else{ //ha szűrőt használtunk

        
        $platformString = "(";
        if(isset($_POST['platform-pc']) && $_POST['platform-pc'] == "PC") $platformString .="'PC',";
        if(isset($_POST['platform-xbox360']) && $_POST['platform-xbox360'] == "XBOX 360") $platformString .="'XBOX 360',";
        if(isset($_POST['platform-xboxone']) && $_POST['platform-xboxone'] == "XBOX One") $platformString .="'XBOX One',";
        if(isset($_POST['platform-ps2']) && $_POST['platform-ps2'] == "PS2") $platformString .="'PS2',";
        if(isset($_POST['platform-ps3']) && $_POST['platform-ps3'] == "PS3") $platformString .="'PS3',";
        if(isset($_POST['platform-ps4']) && $_POST['platform-ps4'] == "PS4") $platformString .="'PS4',";
        if(isset($_POST['platform-switch']) && $_POST['platform-switch'] == "Nintendo Switch") $platformString .="'Nintendo Switch',";
        $platformString = rtrim(trim($platformString), ',');
        $platformString .=")";

        $minprice;
        $maxprice;
        if(isset($_POST['title']))
        $title = $_POST['title'];
        if(isset($_POST['type']) && $_POST['type'] != "Select Type")
        $type = $_POST['type'];
        if(isset($_POST['release-year']))
        $releaseyear = $_POST['release-year'];
        if(isset($_POST['publisher']))
        $publisher = $_POST['publisher'];
        } // szűrő vége

    }
    $sql = new SQL();
    $sql_string = "SELECT * FROM `products` WHERE `del` = 0"; //minid, maxid
    $sql_string .= isset($_POST['title']) && $_POST['title'] != null ? " AND `title` LIKE '%$title%'" : ""; //title
    $sql_string .= isset($_POST['type']) && $_POST['type'] != "Select Type" ? " AND `type` ='$type'" : "";  //type
    $sql_string .= isset($_POST['release-year']) && $_POST['release-year'] != null ? " AND `release_year` =$releaseyear" : "";// release year
    $sql_string .= isset($_POST['publisher']) && $_POST['publisher'] != null? " AND `publisher` LIKE '%$publisher%'" : ""; //publisher
    if((isset($_POST['platform-pc']) && $_POST['platform-pc'] == "PC") || (isset($_POST['platform-xbox360']) && $_POST['platform-xbox360'] == "XBOX 360") || (isset($_POST['platform-xboxone']) && $_POST['platform-xboxone'] == "XBOX One") || (isset($_POST['platform-ps2']) && $_POST['platform-ps2'] == "PS2") || (isset($_POST['platform-ps3']) && $_POST['platform-ps3'] == "PS3")|| (isset($_POST['platform-ps4']) && $_POST['platform-ps4'] == "PS4") || (isset($_POST['platform-switch']) && $_POST['platform-switch'] == "Nintendo Switch")){   
    $sql_string .= " AND `platform` IN $platformString";
    } else if(isset($_POST['platform-others']) && $_POST['platform-others'] == "Others"){
    $sql_string .= " AND `platform` NOT IN ('PC','XBOX 360','XBOX One','PS2','PS3','PS4','Nintendo Switch')";
    }
    $sql_string .=(" LIMIT $minID,$maxID");
    //echo $sql_string;
    $product = $sql->execute($sql_string);
    $_SESSION['sql_query'] = $sql_string;


    $sql_string2 = "SELECT COUNT(*) AS `records` FROM `products` WHERE `del` = 0"; //minid, maxid
    $sql_string2 .= isset($_POST['title']) && $_POST['title'] != null ? " AND `title` LIKE '%$title%'" : ""; //title
    $sql_string2 .= isset($_POST['type']) && $_POST['type'] != "Select Type" ? " AND `type` ='$type'" : "";  //type
    $sql_string2 .= isset($_POST['release-year']) && $_POST['release-year'] != null ? " AND `release_year` =$releaseyear" : "";// release year
    $sql_string2 .= isset($_POST['publisher']) && $_POST['publisher'] != null? " AND `publisher` LIKE '%$publisher%'" : ""; //publisher
    if((isset($_POST['platform-pc']) && $_POST['platform-pc'] == "PC") || (isset($_POST['platform-xbox360']) && $_POST['platform-xbox360'] == "XBOX 360") || (isset($_POST['platform-xboxone']) && $_POST['platform-xboxone'] == "XBOX One") || (isset($_POST['platform-ps2']) && $_POST['platform-ps2'] == "PS2") || (isset($_POST['platform-ps3']) && $_POST['platform-ps3'] == "PS3")|| (isset($_POST['platform-ps4']) && $_POST['platform-ps4'] == "PS4") || (isset($_POST['platform-switch']) && $_POST['platform-switch'] == "Nintendo Switch")){   
    $sql_string2 .= " AND `platform` IN $platformString";
    } else if(isset($_POST['platform-others']) && $_POST['platform-others'] == "Others"){
    $sql_string2 .= " AND `platform` NOT IN ('PC','XBOX 360','XBOX One','PS2','PS3','PS4','Nintendo Switch')";
    }

    $recordCount = $sql->execute($sql_string2);
?>
<div class="product-filters">
    <div class="products-filter-title"><p>FILTERS</p></div>
    <form action="<?php echo url('products')?>" method="POST" autocomplete="off">
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
                max: 200,
                values: [ 0, 200 ],
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
        <div class ="filter-title">
        <label for="title">Title</label>
        <input type="text" name ="title">
        </div>
        <div class="filter-platform">
        <p>Platforms</p>
        <input type="checkbox" name="platform-pc" value="PC">PC<br>
        <input type="checkbox" name="platform-xbox360" value="XBOX 360">XBOX 360<br>
        <input type="checkbox" name="platform-xboxone" value="XBOX One">XBOX One<br>
        <input type="checkbox" name="platform-ps2" value="PS2">PS2<br>
        <input type="checkbox" name="platform-ps3" value="PS3">PS3<br>
        <input type="checkbox" name="platform-ps4" value="PS4">PS4<br>
        <input type="checkbox" name="platform-switch" value="Nintendo Switch">Nintendo Switch<br>
        <input type="checkbox" name="platform-others" value="Others">Others<br>
        </div>
        
        <div class="filter-type">
        <p><label for="type"> Type </label></p> <br>
        <select name ="type">
            <option value="Select Type" selected>Select Type</option>
            <option value="Strategy">Strategy</option>
            <option value="Shooter">Shooter</option>
            <option value="Moba">Moba</option>
            <option value="Fighter">Fighter</option>
            <option value="Sport">Sport</option>
            <option value="Open world">Open world</option>
        </select> <br>
        </div>
        <div class="filter-release">
        <p><label>Release year</label></p><br>
        <input name="release-year" type="number" min="1990" max="<?php echo date('Y') ?>">
        </div>
        <div class="filter-publisher">
            <p><label>Publisher</label></p>
            <input name="publisher" type="text-p">
        </div>
        <div class="filter-btn-div"><button class="filter-btn" type="submit-btn"><span>Search</span></button></div>
    </form>
    </div>
<div class="product-list">
<?php foreach ($product as $key => $value)
{
?>
<?php
echo "<div class =product-item>";
?><a href ="<?php echo url('product') ?>"><img class="product-image" src ="<?php echo $value['cover'] ?>" style="<?php switch ($value['platform']) {
    case 'XBOX 360':
        echo "background-color: #00ac26";
    break;
    case 'XBOX One':
        echo "background-color: #00ac26";
    break;
    case 'PS2':
        echo "background-color: #006FCD";
    break;
    case 'PS3':
        echo "background-color: #006FCD";
    break;
    case 'PS4':
        echo "background-color: #006FCD";
    break;
    case 'Nintendo Switch':
        echo "background-color: #E30214";
    break;
    case 'PC':
        echo "background-color: #FACA04";
    break;
    
    default:
        echo "background-color: #383838";
        break;
} ?>" ></a>

<?php
echo "<p class=product-title>".$value['title'];"</p>";
echo "<p class=product-title>".$value['price']. " €";"</p><br>";
echo "<p>".$value['platform'];"</p>";
echo "<br>";
echo "</div>";
}
?>
<div class="slide-buttons">
    <br>
<form action = <?php echo url('products') ?> method = "POST">
<button type ="submit" name ="decrease" style="<?php echo $minID ==0 ? "display:none" : " " ?>">  Previous </button>
<button type ="submit" name="increase" style ="<?php echo $recordCount[0]['records'] <= $maxID ? "display:none" : " " ?>"> Next </button>
<input type="text" name ="minidtext" value="<?php echo $minID ?>" style="display:none">
<input type="text" name ="maxidtext" value="<?php echo $maxID ?>" style="display:none">
</form>
</div>
</div>

<?php require_once "pages/footer.php"; ?>