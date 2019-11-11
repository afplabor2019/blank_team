<?php require_once "pages/head.php"; ?>
<?php
$minID = 0;
$maxID = 12;
$type;
$minprice;
$maxprice;
$title;
$publisher;
$releaseyear;
$sql = new SQL();

$starterString = "SELECT * FROM `products` WHERE `del` = 0";

if(!is_post()){
    unset ($_SESSION["platform-pc"]);
    unset ($_SESSION["platform-xbox360"]);
    unset ($_SESSION["platform-xboxone"]);
    unset ($_SESSION["platform-ps2"]);
    unset ($_SESSION["platform-ps3"]);
    unset ($_SESSION["platform-ps4"]);
    unset ($_SESSION["platform-switch"]);
    unset ($_SESSION["platform-others"]);
}
    if(is_post())
    {   
        if(!(isset($_POST['minidtext']) || isset($_POST['maxidtext'])))
        {   
            unset ($_SESSION["platform-pc"]);
            unset ($_SESSION["platform-xbox360"]);
            unset ($_SESSION["platform-xboxone"]);
            unset ($_SESSION["platform-ps2"]);
            unset ($_SESSION["platform-ps3"]);
            unset ($_SESSION["platform-ps4"]);
            unset ($_SESSION["platform-switch"]);
            unset ($_SESSION["platform-others"]);
        }
        //creating platform list for query
        $platformString = "(";
        if(isset($_POST['platform-pc']) && $_POST['platform-pc'] == "PC") {$platformString .="'PC',"; $_SESSION['platform-pc'] = $_POST['platform-pc'];}
        if(isset($_POST['platform-xbox360']) && $_POST['platform-xbox360'] == "XBOX 360") {$platformString .="'XBOX 360',"; $_SESSION['platform-xbox360'] = $_POST['platform-xbox360'];}
        if(isset($_POST['platform-xboxone']) && $_POST['platform-xboxone'] == "XBOX One") {$platformString .="'XBOX One',"; $_SESSION['platform-xboxone'] = $_POST['platform-xboxone'];}
        if(isset($_POST['platform-ps2']) && $_POST['platform-ps2'] == "PS2") {$platformString .="'PS2',"; $_SESSION['platform-ps2'] = $_POST['platform-ps2'];}
        if(isset($_POST['platform-ps3']) && $_POST['platform-ps3'] == "PS3") {$platformString .="'PS3',"; $_SESSION['platform-ps3'] = $_POST['platform-ps3'];}
        if(isset($_POST['platform-ps4']) && $_POST['platform-ps4'] == "PS4") {$platformString .="'PS4',"; $_SESSION['platform-ps4'] = $_POST['platform-ps4'];}
        if(isset($_POST['platform-switch']) && $_POST['platform-switch'] == "Nintendo Switch") {$platformString .="'Nintendo Switch',"; $_SESSION['platform-switch'] = $_POST['platform-switch'];}
        if(isset($_POST['platform-others']) && $_POST['platform-others'] == "Others") $_SESSION['platform-others'] = $_POST['platform-others'];
        $platformString = rtrim(trim($platformString), ',');
        $platformString .=")";   

        //setting values for filters
        if(isset($_POST['slidermin'])) $minprice = $_POST['slidermin'];
        if(isset($_POST['slidermax'])) $maxprice = $_POST['slidermax'];
        if(isset($_POST['title'])) $title = $_POST['title'];
        if(isset($_POST['type']) && $_POST['type'] != "Select Type") $type = $_POST['type'];
        if(isset($_POST['release-year'])) $releaseyear = $_POST['release-year'];
        if(isset($_POST['publisher'])) $publisher = $_POST['publisher'];
    } 
        
        //Filter search
        if(!(isset($_POST['minidtext']) || isset($_POST['maxidtext'])))
        { 
            
            if(isset($minprice))$_SESSION['minprice'] = $minprice; 
            if(isset($maxprice))$_SESSION['maxprice'] = $maxprice; 
            if(isset($title))$_SESSION['title'] = $title;
            if(isset($type))$_SESSION['type'] = $type; 
            if(isset($releaseyear))$_SESSION['releaseyear'] = $releaseyear; 
            if(isset($publisher))$_SESSION['publisher'] = $publisher;  
            $sql_string = isset($_POST['slidermin']) || isset($_POST['slidermax']) ? " AND `price` BETWEEN $minprice AND $maxprice" : ""; 
            $sql_string .= isset($_POST['title']) && $_POST['title'] != null ? " AND `title` LIKE '%$title%'" : ""; 
            $sql_string .= isset($_POST['type']) && $_POST['type'] != "Select Type" ? " AND `type` ='$type'" : "";  
            $sql_string .= isset($_POST['release-year']) && $_POST['release-year'] != null ? " AND `release_year` =$releaseyear" : "";
            $sql_string .= isset($_POST['publisher']) && $_POST['publisher'] != null? " AND `publisher` LIKE '%$publisher%'" : "";
            if((isset($_POST['platform-pc']) && $_POST['platform-pc'] == "PC") 
            || (isset($_POST['platform-xbox360']) && $_POST['platform-xbox360'] == "XBOX 360") 
            || (isset($_POST['platform-xboxone']) && $_POST['platform-xboxone'] == "XBOX One") 
            || (isset($_POST['platform-ps2']) && $_POST['platform-ps2'] == "PS2") 
            || (isset($_POST['platform-ps3']) && $_POST['platform-ps3'] == "PS3") 
            || (isset($_POST['platform-ps4']) && $_POST['platform-ps4'] == "PS4") 
            || (isset($_POST['platform-switch']) && $_POST['platform-switch'] == "Nintendo Switch")) 
            {
                $sql_string .= " AND `platform` IN $platformString";
            }
            else if(isset($_POST['platform-others']) && $_POST['platform-others'] == "Others")
                $sql_string .= " AND `platform` NOT IN ('PC','XBOX 360','XBOX One','PS2','PS3','PS4','Nintendo Switch')";
               
            $_SESSION['sql_query'] = $sql_string;
            $product = $sql->execute($starterString.$sql_string." LIMIT $minID,$maxID"); 
            //echo $starterString.$sql_string." LIMIT $minID,$maxID"; //<--- QUERY

        //changing pages via buttons  
        } else {  
            if(isset($_SESSION['minprice']))$minprice = $_SESSION['minprice'];
            if(isset($_SESSION['maxprice']))$maxprice = $_SESSION['maxprice'];
            if(isset($_SESSION['title']))$title = $_SESSION['title'];
            if(isset($_SESSION['type']))$type = $_SESSION['type'];
            if(isset($_SESSION['releaseyear']))$releaseyear = $_SESSION['releaseyear'];
            if(isset($_SESSION['publisher']))$publisher = $_SESSION['publisher']; 

            if(isset($_POST['minidtext'])) $minID = $_POST['minidtext'];
            if(isset($_POST['increase']))$minID += 12;
            else if(isset($_POST['decrease']) && $minID >1) $minID -= 12;

            $sql_string = $_SESSION['sql_query'];
            $product = $sql->execute($starterString.$sql_string." LIMIT $minID,$maxID");

           
        }

    $sql_string2 = "SELECT COUNT(*) AS `records` FROM `products` WHERE `del` = 0";
    $recordCount = $sql->execute($sql_string2.$sql_string); 
?>
<!--HTML-->
<!--FILTERS -->
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
                values: [0, 200],
                slide: function( event, ui ) {
                        document.getElementById('slidermin').value = ui.values[0];
                        document.getElementById('slidermax').value = ui.values[1];
                    $( "#amount" ).val( "€" + ui.values[ 0 ] + " - €" + ui.values[ 1 ] );
                }
                });
                $( "#amount" ).val( "€" + $( "#slider-range" ).slider( "values", 0 ) +
                " - €" + $( "#slider-range" ).slider( "values", 1 ) );
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
            <input type="text" name ="title" <?php if(isset($title) && $title != null) echo "value=$title"; ?>>
        </div>
        <div class="filter-platform">
            <p>Platforms</p>
            <input type="checkbox" id="p-pc" name="platform-pc" onclick="OthersOff()" value="PC" <?php if(isset($_SESSION['platform-pc'])) echo "checked"; ?>>PC<br>
            <input type="checkbox" id="p-360" name="platform-xbox360" onclick="OthersOff()" value="XBOX 360" <?php if(isset($_SESSION['platform-xbox360'])) echo "checked"; ?>>XBOX 360<br>
            <input type="checkbox" id="p-one" name="platform-xboxone" onclick="OthersOff()" value="XBOX One" <?php if(isset($_SESSION['platform-xboxone'])) echo "checked"; ?>>XBOX One<br>
            <input type="checkbox" id="p-ps2" name="platform-ps2" onclick="OthersOff()" value="PS2" <?php if(isset($_SESSION['platform-ps2'])) echo "checked"; ?>>PS2<br>
            <input type="checkbox" id="p-ps3" name="platform-ps3" onclick="OthersOff()" value="PS3" <?php if(isset($_SESSION['platform-ps3'])) echo "checked"; ?>>PS3<br>
            <input type="checkbox" id="p-ps4" name="platform-ps4" onclick="OthersOff()" value="PS4" <?php if(isset($_SESSION['platform-ps4'])) echo "checked"; ?>>PS4<br>
            <input type="checkbox" id="p-switch" name="platform-switch" onclick="OthersOff()" value="Nintendo Switch" <?php if(isset($_SESSION['platform-switch'])) echo "checked"; ?>>Nintendo Switch<br>
            <input type="checkbox" id="p-others" name="platform-others" onclick="OthersChecked()" value="Others" <?php if(isset($_SESSION['platform-others'])) echo "checked"; ?>>Others<br>
        </div>
        <script>
            function OthersChecked(){
                document.getElementById("p-pc").checked = false;
                document.getElementById("p-360").checked = false;
                document.getElementById("p-one").checked = false;
                document.getElementById("p-ps2").checked = false;
                document.getElementById("p-ps3").checked = false;
                document.getElementById("p-ps4").checked = false;
                document.getElementById("p-switch").checked = false;
            }

            function OthersOff(){
                document.getElementById("p-others").checked = false;
            }
        </script>
        <div class="filter-type">
            <p><label for="type"> Type </label></p> <br>
            <select name ="type">
                <option value="Select Type" selected>Select Type</option>
                <option value="Strategy"  <?php if(isset($_POST['type']) && $_POST['type'] == "Strategy") echo "selected"; ?>>Strategy</option>
                <option value="Shooter" <?php if(isset($_POST['type']) && $_POST['type'] == "Shooter") echo "selected"; ?>>Shooter</option>
                <option value="Moba" <?php if(isset($_POST['type']) && $_POST['type'] == "Moba") echo "selected"; ?>>Moba</option>
                <option value="Fighter" <?php if(isset($_POST['type']) && $_POST['type'] == "Fighter") echo "selected"; ?>>Fighter</option>
                <option value="Sport" <?php if(isset($_POST['type']) && $_POST['type'] == "Sport") echo "selected"; ?>>Sport</option>
                <option value="Open world" <?php if(isset($_POST['type']) && $_POST['type'] == "Open world") echo "selected"; ?>>Open world</option>
                <option value="Battle Royale" <?php if(isset($_POST['type']) && $_POST['type'] == "Battle Royale") echo "selected"; ?>>Battle Royale</option>
                <option value="MMO" <?php if(isset($_POST['type']) && $_POST['type'] == "MMO") echo "selected"; ?>>MMO</option>
                <option value="RPG" <?php if(isset($_POST['type']) && $_POST['type'] == "RPG") echo "selected"; ?>>RPG</option>
            </select> <br>
        </div>
        <div class="filter-release">
            <p><label>Release year</label></p><br>
            <input name="release-year" type="number" min="1990" max="<?php echo date('Y') ?>" <?php if(isset($releaseyear) && $releaseyear != null) echo "value=$releaseyear"; ?>>
        </div>
        <div class="filter-publisher">
            <p><label>Publisher</label></p>
            <input name="publisher" type="text-p" <?php if(isset($publisher) && $publisher != null) echo "value=$publisher"; ?>>
        </div>
        <div class="filter-btn-div"><button class="filter-btn" type="submit-btn"><span>Search</span></button></div>
        <input type="text" name ="slidermin" id="slidermin" value = 0 style = "display: none">
        <input type="text" name ="slidermax" id="slidermax" value = 200 style = "display: none">
    </form>
</div>

<!--PRODUCT LIST-->
<div class="product-list">
<?php foreach ($product as $key => $value) { 
    echo "<div class =product-item>"; ?>
        <a href ="<?php echo url('product') ?>"><img class="product-image" src ="<?php echo $value['cover'] ?>" 
            style="<?php switch ($value['platform']) {
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
                break;} ?>">
        </a>
    <?php
        echo "<p class=product-title>".$value['title'];"</p>";
        echo "<p class=product-title>".$value['price']. " €";"</p><br>";
        echo "<p>".$value['platform'];"</p>";
        echo "<br>";
        echo "</div>";
    } ?>
</div>

<!--SLIDE BUTTONS -->
<div class="slide-buttons"><br>
    <form action = <?php echo url('products') ?> method = "POST">
        <button type ="submit" name ="decrease" style="<?php echo $minID ==0 ? "display:none" : " " ?>">  Previous </button>
        <button type ="submit" name="increase" style ="<?php echo $recordCount[0]['records']-$minID <= $maxID ? "display:none" : " " ?>"> Next </button>
        <input type="text" name ="minidtext" value="<?php echo $minID ?>" style="display:none">
        <input type="text" name ="maxidtext" value="<?php echo $maxID ?>" style="display:none">

    </form>
</div>

<?php require_once "pages/footer.php"; ?>