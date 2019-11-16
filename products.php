<?php require_once "pages/head.php"; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(document).ready(function(){
        $.post("products_ajax.php",{
        }, function(data,status){
            $("#product-list").html(data);
        });
    });

    var aminprice = 0;
    var amaxprice = 200;
    //price
    $( function() {
        $( "#slider-range" ).slider({
        range: true,
        min: 0,
        max: 200,
        values: [0, 200],
        slide: function( event, ui ) {  
            aminprice = ui.values[0];
            amaxprice = ui.values[1];  
            var publisher = $("#publisher").val();
        var title = $("#title").val();   
        var releaseyear = $("#year").val();
        var gametype;
        if(document.getElementById("type").value != "Select Type") gametype =document.getElementById("type").value;
        var pc;
        if(document.getElementById("p-pc").checked) pc= $("#p-pc").val(); 
        var x360;
        if(document.getElementById("p-360").checked) x360= $("#p-360").val();
        var xone;
        if(document.getElementById("p-one").checked) xone= $("#p-one").val();
        var ps2;
        if(document.getElementById("p-ps2").checked) ps2= $("#p-ps2").val();
        var ps3;
        if(document.getElementById("p-ps3").checked) ps3= $("#p-ps3").val();
        var ps4;
        if(document.getElementById("p-ps4").checked) ps4= $("#p-ps4").val();
        var nswitch;
        if(document.getElementById("p-switch").checked) nswitch= $("#p-switch").val();
        var others;
        if(document.getElementById("p-others").checked) others= $("#p-others").val();        
            $.post("products_ajax.php", {
                minprice: ui.values[0],
                maxprice: ui.values[1],
                name: title,
                publish: publisher,
                year: releaseyear,
                type: gametype,
                platformpc: pc,
                platformxbox360: x360,
                platformxboxone: xone,
                platformps2: ps2,
                platformps3: ps3,
                platformps4: ps4,
                platformswitch: nswitch,
                platformothers: others
               
            }, function(data,status){
                $("#product-list").html(data);
            });
            $( "#amount" ).val( "€" + ui.values[ 0 ] + " - €" + ui.values[ 1 ] );
        }
        });
        $( "#amount" ).val( "€" + $( "#slider-range" ).slider( "values", 0 ) +
        " - €" + $( "#slider-range" ).slider( "values", 1 ) );
    } );

    //title
    $(document).ready(function() {
      $("#title").keyup(function() {
        var publisher = $("#publisher").val();
        var title = $("#title").val();   
        var releaseyear = $("#year").val();
        var gametype;
        if(document.getElementById("type").value != "Select Type") gametype =document.getElementById("type").value;
        var pc;
        if(document.getElementById("p-pc").checked) pc= $("#p-pc").val(); 
        var x360;
        if(document.getElementById("p-360").checked) x360= $("#p-360").val();
        var xone;
        if(document.getElementById("p-one").checked) xone= $("#p-one").val();
        var ps2;
        if(document.getElementById("p-ps2").checked) ps2= $("#p-ps2").val();
        var ps3;
        if(document.getElementById("p-ps3").checked) ps3= $("#p-ps3").val();
        var ps4;
        if(document.getElementById("p-ps4").checked) ps4= $("#p-ps4").val();
        var nswitch;
        if(document.getElementById("p-switch").checked) nswitch= $("#p-switch").val();
        var others;
        if(document.getElementById("p-others").checked) others= $("#p-others").val();

        $.post("products_ajax.php",{
                minprice: aminprice,
                maxprice: amaxprice,
                name: title,
                publish: publisher,
                year: releaseyear,
                type: gametype,
                platformpc: pc,
                platformxbox360: x360,
                platformxboxone: xone,
                platformps2: ps2,
                platformps3: ps3,
                platformps4: ps4,
                platformswitch: nswitch,
                platformothers: others
        }, function(data,status){
            $("#product-list").html(data);
        });
    });
    });    

    //publisher
    $(document).ready(function() {
      $("#publisher").keyup(function() {
        var publisher = $("#publisher").val();
        var title = $("#title").val();   
        var releaseyear = $("#year").val();
        var gametype;
        if(document.getElementById("type").value != "Select Type") gametype =document.getElementById("type").value;
        var pc;
        if(document.getElementById("p-pc").checked) pc= $("#p-pc").val(); 
        var x360;
        if(document.getElementById("p-360").checked) x360= $("#p-360").val();
        var xone;
        if(document.getElementById("p-one").checked) xone= $("#p-one").val();
        var ps2;
        if(document.getElementById("p-ps2").checked) ps2= $("#p-ps2").val();
        var ps3;
        if(document.getElementById("p-ps3").checked) ps3= $("#p-ps3").val();
        var ps4;
        if(document.getElementById("p-ps4").checked) ps4= $("#p-ps4").val();
        var nswitch;
        if(document.getElementById("p-switch").checked) nswitch= $("#p-switch").val();
        var others;
        if(document.getElementById("p-others").checked) others= $("#p-others").val();

        $.post("products_ajax.php",{
                minprice: aminprice,
                maxprice: amaxprice,
                name: title,
                publish: publisher,
                year: releaseyear,
                type: gametype,
                platformpc: pc,
                platformxbox360: x360,
                platformxboxone: xone,
                platformps2: ps2,
                platformps3: ps3,
                platformps4: ps4,
                platformswitch: nswitch,
                platformothers: others
        }, function(data,status){
            $("#product-list").html(data);
        });
    });
    });    

    //type
    $(document).ready(function() {
      $("#type").on('change' ,function() {
        var publisher = $("#publisher").val();
        var title = $("#title").val();   
        var releaseyear = $("#year").val();
        var gametype;
        if(document.getElementById("type").value != "Select Type") gametype =document.getElementById("type").value;
        var pc;
        if(document.getElementById("p-pc").checked) pc= $("#p-pc").val(); 
        var x360;
        if(document.getElementById("p-360").checked) x360= $("#p-360").val();
        var xone;
        if(document.getElementById("p-one").checked) xone= $("#p-one").val();
        var ps2;
        if(document.getElementById("p-ps2").checked) ps2= $("#p-ps2").val();
        var ps3;
        if(document.getElementById("p-ps3").checked) ps3= $("#p-ps3").val();
        var ps4;
        if(document.getElementById("p-ps4").checked) ps4= $("#p-ps4").val();
        var nswitch;
        if(document.getElementById("p-switch").checked) nswitch= $("#p-switch").val();
        var others;
        if(document.getElementById("p-others").checked) others= $("#p-others").val();

        $.post("products_ajax.php",{
                minprice: aminprice,
                maxprice: amaxprice,
                name: title,
                publish: publisher,
                year: releaseyear,
                type: gametype,
                platformpc: pc,
                platformxbox360: x360,
                platformxboxone: xone,
                platformps2: ps2,
                platformps3: ps3,
                platformps4: ps4,
                platformswitch: nswitch,
                platformothers: others
        }, function(data,status){
            $("#product-list").html(data);
        });
    });
    });    

    //release year
    $(document).ready(function() {
      $("#year").keyup(function() {
        var publisher = $("#publisher").val();
        var title = $("#title").val();   
        var releaseyear = $("#year").val();
        var gametype;
        if(document.getElementById("type").value != "Select Type") gametype =document.getElementById("type").value;
        var pc;
        if(document.getElementById("p-pc").checked) pc= $("#p-pc").val(); 
        var x360;
        if(document.getElementById("p-360").checked) x360= $("#p-360").val();
        var xone;
        if(document.getElementById("p-one").checked) xone= $("#p-one").val();
        var ps2;
        if(document.getElementById("p-ps2").checked) ps2= $("#p-ps2").val();
        var ps3;
        if(document.getElementById("p-ps3").checked) ps3= $("#p-ps3").val();
        var ps4;
        if(document.getElementById("p-ps4").checked) ps4= $("#p-ps4").val();
        var nswitch;
        if(document.getElementById("p-switch").checked) nswitch= $("#p-switch").val();
        var others;
        if(document.getElementById("p-others").checked) others= $("#p-others").val();

        $.post("products_ajax.php",{
                minprice: aminprice,
                maxprice: amaxprice,
                name: title,
                publish: publisher,
                year: releaseyear,
                type: gametype,
                platformpc: pc,
                platformxbox360: x360,
                platformxboxone: xone,
                platformps2: ps2,
                platformps3: ps3,
                platformps4: ps4,
                platformswitch: nswitch,
                platformothers: others
        }, function(data,status){
            $("#product-list").html(data);
        });
    });
    });    

    //platform-pc
    $(document).ready(function() {
      $("#p-pc").on('change',function() {
        var publisher = $("#publisher").val();
        var title = $("#title").val();   
        var releaseyear = $("#year").val();
        var gametype;
        if(document.getElementById("type").value != "Select Type") gametype =document.getElementById("type").value;
        var pc;
        if(document.getElementById("p-pc").checked) pc= $("#p-pc").val(); 
        var x360;
        if(document.getElementById("p-360").checked) x360= $("#p-360").val();
        var xone;
        if(document.getElementById("p-one").checked) xone= $("#p-one").val();
        var ps2;
        if(document.getElementById("p-ps2").checked) ps2= $("#p-ps2").val();
        var ps3;
        if(document.getElementById("p-ps3").checked) ps3= $("#p-ps3").val();
        var ps4;
        if(document.getElementById("p-ps4").checked) ps4= $("#p-ps4").val();
        var nswitch;
        if(document.getElementById("p-switch").checked) nswitch= $("#p-switch").val();
        var others;
        if(document.getElementById("p-others").checked) others= $("#p-others").val();

        $.post("products_ajax.php",{
                minprice: aminprice,
                maxprice: amaxprice,
                name: title,
                publish: publisher,
                year: releaseyear,
                type: gametype,
                platformpc: pc,
                platformxbox360: x360,
                platformxboxone: xone,
                platformps2: ps2,
                platformps3: ps3,
                platformps4: ps4,
                platformswitch: nswitch,
                platformothers: others
        }, function(data,status){
            $("#product-list").html(data);
        });
    });
    });    

    //platform-xbox360
    $(document).ready(function() {
      $("#p-360").on('change',function() {
        var publisher = $("#publisher").val();
        var title = $("#title").val();   
        var releaseyear = $("#year").val();
        var gametype;
        if(document.getElementById("type").value != "Select Type") gametype =document.getElementById("type").value;
        var pc;
        if(document.getElementById("p-pc").checked) pc= $("#p-pc").val(); 
        var x360;
        if(document.getElementById("p-360").checked) x360= $("#p-360").val();
        var xone;
        if(document.getElementById("p-one").checked) xone= $("#p-one").val();
        var ps2;
        if(document.getElementById("p-ps2").checked) ps2= $("#p-ps2").val();
        var ps3;
        if(document.getElementById("p-ps3").checked) ps3= $("#p-ps3").val();
        var ps4;
        if(document.getElementById("p-ps4").checked) ps4= $("#p-ps4").val();
        var nswitch;
        if(document.getElementById("p-switch").checked) nswitch= $("#p-switch").val();
        var others;
        if(document.getElementById("p-others").checked) others= $("#p-others").val();

        $.post("products_ajax.php",{
                minprice: aminprice,
                maxprice: amaxprice,
                name: title,
                publish: publisher,
                year: releaseyear,
                type: gametype,
                platformpc: pc,
                platformxbox360: x360,
                platformxboxone: xone,
                platformps2: ps2,
                platformps3: ps3,
                platformps4: ps4,
                platformswitch: nswitch,
                platformothers: others
        }, function(data,status){
            $("#product-list").html(data);
        });
    });
    });    

    //platform-xboxone
    $(document).ready(function() {
      $("#p-one").on('change',function() {
        var publisher = $("#publisher").val();
        var title = $("#title").val();   
        var releaseyear = $("#year").val();
        var gametype;
        if(document.getElementById("type").value != "Select Type") gametype =document.getElementById("type").value;
        var pc;
        if(document.getElementById("p-pc").checked) pc= $("#p-pc").val(); 
        var x360;
        if(document.getElementById("p-360").checked) x360= $("#p-360").val();
        var xone;
        if(document.getElementById("p-one").checked) xone= $("#p-one").val();
        var ps2;
        if(document.getElementById("p-ps2").checked) ps2= $("#p-ps2").val();
        var ps3;
        if(document.getElementById("p-ps3").checked) ps3= $("#p-ps3").val();
        var ps4;
        if(document.getElementById("p-ps4").checked) ps4= $("#p-ps4").val();
        var nswitch;
        if(document.getElementById("p-switch").checked) nswitch= $("#p-switch").val();
        var others;
        if(document.getElementById("p-others").checked) others= $("#p-others").val();

        $.post("products_ajax.php",{
                minprice: aminprice,
                maxprice: amaxprice,
                name: title,
                publish: publisher,
                year: releaseyear,
                type: gametype,
                platformpc: pc,
                platformxbox360: x360,
                platformxboxone: xone,
                platformps2: ps2,
                platformps3: ps3,
                platformps4: ps4,
                platformswitch: nswitch,
                platformothers: others
        }, function(data,status){
            $("#product-list").html(data);
        });
    });
    });    

    //platform-ps2
    $(document).ready(function() {
      $("#p-ps2").on('change',function() {
        var publisher = $("#publisher").val();
        var title = $("#title").val();   
        var releaseyear = $("#year").val();
        var gametype;
        if(document.getElementById("type").value != "Select Type") gametype =document.getElementById("type").value;
        var pc;
        if(document.getElementById("p-pc").checked) pc= $("#p-pc").val(); 
        var x360;
        if(document.getElementById("p-360").checked) x360= $("#p-360").val();
        var xone;
        if(document.getElementById("p-one").checked) xone= $("#p-one").val();
        var ps2;
        if(document.getElementById("p-ps2").checked) ps2= $("#p-ps2").val();
        var ps3;
        if(document.getElementById("p-ps3").checked) ps3= $("#p-ps3").val();
        var ps4;
        if(document.getElementById("p-ps4").checked) ps4= $("#p-ps4").val();
        var nswitch;
        if(document.getElementById("p-switch").checked) nswitch= $("#p-switch").val();
        var others;
        if(document.getElementById("p-others").checked) others= $("#p-others").val();

        $.post("products_ajax.php",{
                minprice: aminprice,
                maxprice: amaxprice,
                name: title,
                publish: publisher,
                year: releaseyear,
                type: gametype,
                platformpc: pc,
                platformxbox360: x360,
                platformxboxone: xone,
                platformps2: ps2,
                platformps3: ps3,
                platformps4: ps4,
                platformswitch: nswitch,
                platformothers: others
        }, function(data,status){
            $("#product-list").html(data);
        });
    });
    });    

     //platform-ps3
     $(document).ready(function() {
      $("#p-ps3").on('change',function() {
        var publisher = $("#publisher").val();
        var title = $("#title").val();   
        var releaseyear = $("#year").val();
        var gametype;
        if(document.getElementById("type").value != "Select Type") gametype =document.getElementById("type").value;
        var pc;
        if(document.getElementById("p-pc").checked) pc= $("#p-pc").val(); 
        var x360;
        if(document.getElementById("p-360").checked) x360= $("#p-360").val();
        var xone;
        if(document.getElementById("p-one").checked) xone= $("#p-one").val();
        var ps2;
        if(document.getElementById("p-ps2").checked) ps2= $("#p-ps2").val();
        var ps3;
        if(document.getElementById("p-ps3").checked) ps3= $("#p-ps3").val();
        var ps4;
        if(document.getElementById("p-ps4").checked) ps4= $("#p-ps4").val();
        var nswitch;
        if(document.getElementById("p-switch").checked) nswitch= $("#p-switch").val();
        var others;
        if(document.getElementById("p-others").checked) others= $("#p-others").val();

        $.post("products_ajax.php",{
                minprice: aminprice,
                maxprice: amaxprice,
                name: title,
                publish: publisher,
                year: releaseyear,
                type: gametype,
                platformpc: pc,
                platformxbox360: x360,
                platformxboxone: xone,
                platformps2: ps2,
                platformps3: ps3,
                platformps4: ps4,
                platformswitch: nswitch,
                platformothers: others
        }, function(data,status){
            $("#product-list").html(data);
        });
    });
    });    

    //platform-ps4
    $(document).ready(function() {
      $("#p-ps4").on('change',function() {
        var publisher = $("#publisher").val();
        var title = $("#title").val();   
        var releaseyear = $("#year").val();
        var gametype;
        if(document.getElementById("type").value != "Select Type") gametype =document.getElementById("type").value;
        var pc;
        if(document.getElementById("p-pc").checked) pc= $("#p-pc").val(); 
        var x360;
        if(document.getElementById("p-360").checked) x360= $("#p-360").val();
        var xone;
        if(document.getElementById("p-one").checked) xone= $("#p-one").val();
        var ps2;
        if(document.getElementById("p-ps2").checked) ps2= $("#p-ps2").val();
        var ps3;
        if(document.getElementById("p-ps3").checked) ps3= $("#p-ps3").val();
        var ps4;
        if(document.getElementById("p-ps4").checked) ps4= $("#p-ps4").val();
        var nswitch;
        if(document.getElementById("p-switch").checked) nswitch= $("#p-switch").val();
        var others;
        if(document.getElementById("p-others").checked) others= $("#p-others").val();

        $.post("products_ajax.php",{
                minprice: aminprice,
                maxprice: amaxprice,
                name: title,
                publish: publisher,
                year: releaseyear,
                type: gametype,
                platformpc: pc,
                platformxbox360: x360,
                platformxboxone: xone,
                platformps2: ps2,
                platformps3: ps3,
                platformps4: ps4,
                platformswitch: nswitch,
                platformothers: others
        }, function(data,status){
            $("#product-list").html(data);
        });
    });
    });      

    //platform-switch
    $(document).ready(function() {
      $("#p-switch").on('change',function() {
        var publisher = $("#publisher").val();
        var title = $("#title").val();   
        var releaseyear = $("#year").val();
        var gametype;
        if(document.getElementById("type").value != "Select Type") gametype =document.getElementById("type").value;
        var pc;
        if(document.getElementById("p-pc").checked) pc= $("#p-pc").val(); 
        var x360;
        if(document.getElementById("p-360").checked) x360= $("#p-360").val();
        var xone;
        if(document.getElementById("p-one").checked) xone= $("#p-one").val();
        var ps2;
        if(document.getElementById("p-ps2").checked) ps2= $("#p-ps2").val();
        var ps3;
        if(document.getElementById("p-ps3").checked) ps3= $("#p-ps3").val();
        var ps4;
        if(document.getElementById("p-ps4").checked) ps4= $("#p-ps4").val();
        var nswitch;
        if(document.getElementById("p-switch").checked) nswitch= $("#p-switch").val();
        var others;
        if(document.getElementById("p-others").checked) others= $("#p-others").val();

        $.post("products_ajax.php",{
                minprice: aminprice,
                maxprice: amaxprice,
                name: title,
                publish: publisher,
                year: releaseyear,
                type: gametype,
                platformpc: pc,
                platformxbox360: x360,
                platformxboxone: xone,
                platformps2: ps2,
                platformps3: ps3,
                platformps4: ps4,
                platformswitch: nswitch,
                platformothers: others
        }, function(data,status){
            $("#product-list").html(data);
        });
    });
    });    

    //platform-others
    $(document).ready(function() {
      $("#p-others").on('change',function() {
        var publisher = $("#publisher").val();
        var title = $("#title").val();   
        var releaseyear = $("#year").val();
        var gametype;
        if(document.getElementById("type").value != "Select Type") gametype =document.getElementById("type").value;
        var pc;
        if(document.getElementById("p-pc").checked) pc= $("#p-pc").val(); 
        var x360;
        if(document.getElementById("p-360").checked) x360= $("#p-360").val();
        var xone;
        if(document.getElementById("p-one").checked) xone= $("#p-one").val();
        var ps2;
        if(document.getElementById("p-ps2").checked) ps2= $("#p-ps2").val();
        var ps3;
        if(document.getElementById("p-ps3").checked) ps3= $("#p-ps3").val();
        var ps4;
        if(document.getElementById("p-ps4").checked) ps4= $("#p-ps4").val();
        var nswitch;
        if(document.getElementById("p-switch").checked) nswitch= $("#p-switch").val();
        var others;
        if(document.getElementById("p-others").checked) others= $("#p-others").val();

        $.post("products_ajax.php",{
                minprice: aminprice,
                maxprice: amaxprice,
                name: title,
                publish: publisher,
                year: releaseyear,
                type: gametype,
                platformpc: pc,
                platformxbox360: x360,
                platformxboxone: xone,
                platformps2: ps2,
                platformps3: ps3,
                platformps4: ps4,
                platformswitch: nswitch,
                platformothers: others
        }, function(data,status){
            $("#product-list").html(data);
        });
    });
    });    

    //next button
    $(document).ready(function() {
      $("#nextbtn").click(function() {         
        $.post("products_ajax.php",{

        }, function(data,status){
            $("#product-list").html(data);
        });
    });
    });    

    //prev button
    $(document).ready(function() {
      $("#prevbtn").click(function() {         
        $.post("products_ajax.php",{

        }, function(data,status){
            $("#product-list").html(data);
        });
    });
    });    
</script>
<?php


    /*
    if(!is_post()) 
        unsetPlatformFilters();
    else{   

        if(!isset($_POST['minidtext']) && !isset($_POST['maxidtext']))
            unsetPlatformFilters();

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

        //setting values from filters
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
                $sql_string .= " AND `platform` IN $platformString";
            else if(isset($_POST['platform-others']) && $_POST['platform-others'] == "Others")
                $sql_string .= " AND `platform` NOT IN ('PC','XBOX 360','XBOX One','PS2','PS3','PS4','Nintendo Switch')";
               
            $_SESSION['sql_query'] = $sql_string;
            $product = $sql->execute($starterString.$sql_string." LIMIT $minID,$maxID"); 
            //echo $starterString.$sql_string." LIMIT $minID,$maxID"; //<--- QUERY

        //changing pages via buttons  
        } else{  
            if(isset($_SESSION['minprice']))$minprice = $_SESSION['minprice'];
            if(isset($_SESSION['maxprice']))$maxprice = $_SESSION['maxprice'];
            if(isset($_SESSION['title']))$title = $_SESSION['title'];
            if(isset($_SESSION['type']))$type = $_SESSION['type'];
            if(isset($_SESSION['releaseyear']))$releaseyear = $_SESSION['releaseyear'];
            if(isset($_SESSION['publisher']))$publisher = $_SESSION['publisher']; 
            if(is_post()){
                if(isset($_POST['minidtext'])) $minID = $_POST['minidtext'];
                if(isset($_POST['increase']))$minID += 12;
                else if(isset($_POST['decrease']) && $minID >1) $minID -= 12;
            }

            $sql_string = $_SESSION['sql_query'];
            $product = $sql->execute($starterString.$sql_string." LIMIT $minID,$maxID");  
        }

    $sql_string2 = "SELECT COUNT(*) AS `records` FROM `products` WHERE `del` = 0";
    $recordCount = $sql->execute($sql_string2.$sql_string); */


?>

<!--HTML-->
<!--FILTERS -->
<?php include_once "filters.php"; ?>

<!--PRODUCT LIST-->
<div class="product-list" id="product-list">

</div>





<?php require_once "pages/footer.php"; ?>