<?php 
session_start();
include_once "lib/config.php";
include_once "lib/functions.php";
$type;
$minprice;
$maxprice;
$title;
$publisher;
$releaseyear;
$sql = new SQL();
$starterString = "SELECT * FROM `products` WHERE `del` = 0";
$sql_string =" ";

//ha gombokkal léptetünk
if(isset($_POST['next']) || isset($_POST['prev'])){
    if(isset($_POST['next'])){
        $offset = $_SESSION['offset'];
        $offset += 12;
        $_SESSION['offset'] = $offset;
    }
    else if(isset($_POST['prev'])){
        $offset = $_SESSION['offset'];
        $offset -= 12;
        $_SESSION['offset'] = $offset;
    }
    $sql_string = $_SESSION['ajax_query'];
}
else
{   
    $offset = 0;
    $_SESSION['offset'] = $offset;
    $platformString = "(";
    if(isset($_POST['platformpc']) && $_POST['platformpc'] == "PC") {$platformString .="'PC',"; $_SESSION['platformpc'] = $_POST['platformpc'];}
    if(isset($_POST['platformxbox360']) && $_POST['platformxbox360'] == "XBOX 360") {$platformString .="'XBOX 360',"; $_SESSION['platformxbox360'] = $_POST['platformxbox360'];}
    if(isset($_POST['platformxboxone']) && $_POST['platformxboxone'] == "XBOX One") {$platformString .="'XBOX One',"; $_SESSION['platformxboxone'] = $_POST['platformxboxone'];}
    if(isset($_POST['platformps2']) && $_POST['platformps2'] == "PS2") {$platformString .="'PS2',"; $_SESSION['platformps2'] = $_POST['platformps2'];}
    if(isset($_POST['platformps3']) && $_POST['platformps3'] == "PS3") {$platformString .="'PS3',"; $_SESSION['platformps3'] = $_POST['platformps3'];}
    if(isset($_POST['platformps4']) && $_POST['platformps4'] == "PS4") {$platformString .="'PS4',"; $_SESSION['platformps4'] = $_POST['platformps4'];}
    if(isset($_POST['platformswitch']) && $_POST['platformswitch'] == "Nintendo Switch") {$platformString .="'Nintendo Switch',"; $_SESSION['platformswitch'] = $_POST['platformswitch'];}
    if(isset($_POST['platformothers']) && $_POST['platformothers'] == "Others") $_SESSION['platformothers'] = $_POST['platformothers'];
    $platformString = rtrim(trim($platformString), ',');
    $platformString .=")";   
    
    if(isset($_POST['name'])) $title = $_POST['name']; 
    if(isset($_POST['publish'])) $publisher = $_POST['publish'];
    if(isset($_POST['year'])) $year = $_POST['year'];
    if(isset($_POST['type'])) $type = $_POST['type'];
    if(isset($_POST['minprice'])) $minprice = $_POST['minprice'];
    if(isset($_POST['maxprice'])) $maxprice = $_POST['maxprice'];
    
    $sql_string .= isset($_POST['name']) && $_POST['name'] != null ? " AND `title` LIKE '%$title%'" : ""; 
    $sql_string .= isset($_POST['publish']) && $_POST['publish'] != null ? " AND `publisher` LIKE '%$publisher%'" : ""; 
    $sql_string .= isset($_POST['year']) && $_POST['year'] != null ? " AND `release_year` LIKE '%$year%'" : ""; 
    $sql_string .= isset($_POST['type']) && $_POST['type'] != null ? " AND `type` LIKE '%$type%'" : ""; 
    $sql_string .= isset($_POST['minprice']) || isset($_POST['maxprice']) ? " AND `price` BETWEEN $minprice AND $maxprice" : ""; 
    if((isset($_POST['platformpc']) && $_POST['platformpc'] == "PC") 
    || (isset($_POST['platformxbox360']) && $_POST['platformxbox360'] == "XBOX 360") 
    || (isset($_POST['platformxboxone']) && $_POST['platformxboxone'] == "XBOX One") 
    || (isset($_POST['platformps2']) && $_POST['platformps2'] == "PS2") 
    || (isset($_POST['platformps3']) && $_POST['platformps3'] == "PS3") 
    || (isset($_POST['platformps4']) && $_POST['platformps4'] == "PS4") 
    || (isset($_POST['platformswitch']) && $_POST['platformswitch'] == "Nintendo Switch")) 
        $sql_string .= " AND `platform` IN $platformString";
    else if(isset($_POST['platformothers']) && $_POST['platformothers'] == "Others")
        $sql_string .= " AND `platform` NOT IN ('PC','XBOX 360','XBOX One','PS2','PS3','PS4','Nintendo Switch')";
    
    $_SESSION['ajax_query'] = $sql_string;   
}
$product = $sql->execute($starterString.$sql_string." LIMIT $offset,12");
 foreach ($product as $key => $value) { 
    echo "<div class =product-item>"; ?>
        <a href ="<?php echo url('product&id='.$value['id']) ?>"><img class="product-image" src ="<?php echo $value['cover'] ?>" 
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
    } 
    echo "</div>";
    ?>

<?php 
$sql_string2 = "SELECT COUNT(*) AS `records` FROM `products` WHERE `del` = 0";
$recordCount = $sql->execute($sql_string2.$sql_string); 
?>

<!--SLIDE BUTTONS -->
<div class="slide-buttons"><br>
    <input type ="submit" name ="prevbtn" id="prevbtn" value="Previous" style="<?php echo $offset ==0 ? "display:none" : " " ?>"> 
    <input type ="submit" name="nextbtn" id="nextbtn" value="Next" style ="<?php echo $recordCount[0]['records']-$offset <= 12 ? "display:none" : " " ?>"> 
</div>

<a href="#" id ="top"></a>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
 $(document).ready(function() {
      $("#nextbtn").click(function() { 
          document.getElementById("top").click();        
        $.post("products_ajax.php",{
            next: '12'
        }, function(data,status){
            $("#product-list").html(data);
        });
    });
    });    

    $(document).ready(function() {
      $("#prevbtn").click(function() {   
        document.getElementById("top").click();        
        $.post("products_ajax.php",{
            prev: '12'
        }, function(data,status){
            $("#product-list").html(data);
        });
    });
    });  
</script>