<?php require_once "pages/head.php"; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<?php include_once "filters.php"; ?>
<div class="product-list" id="product-list"></div> <!--PRODUCT LIST-->
<?php require_once "pages/footer.php"; ?>
<script>
    function post(){
        var publisher = $("#publisher").val();
        var title = $("#title").val();   
        var releaseyear = $("#year").val();
        var gametype; if(document.getElementById("type").value != "Select Type") gametype =document.getElementById("type").value;
        var pc;if(document.getElementById("p-pc").checked) pc= $("#p-pc").val(); 
        var x360;if(document.getElementById("p-360").checked) x360= $("#p-360").val();
        var xone;if(document.getElementById("p-one").checked) xone= $("#p-one").val();
        var ps2;if(document.getElementById("p-ps2").checked) ps2= $("#p-ps2").val();
        var ps3;if(document.getElementById("p-ps3").checked) ps3= $("#p-ps3").val();
        var ps4;if(document.getElementById("p-ps4").checked) ps4= $("#p-ps4").val();
        var nswitch;if(document.getElementById("p-switch").checked) nswitch= $("#p-switch").val();
        var others;if(document.getElementById("p-others").checked) others= $("#p-others").val();
        $.post("products_ajax.php",{minprice: aminprice,maxprice: amaxprice,name: title,publish: publisher,year: releaseyear,type: gametype,
                platformpc: pc,platformxbox360: x360,platformxboxone: xone,platformps2: ps2,platformps3: ps3,platformps4: ps4,
                platformswitch: nswitch,platformothers: others
        }, function(data,status){$("#product-list").html(data);});
    }
    $(document).ready(post); 
    var offset = 0;
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
        var gametype;if(document.getElementById("type").value != "Select Type") gametype =document.getElementById("type").value;
        var pc;if(document.getElementById("p-pc").checked) pc= $("#p-pc").val(); 
        var x360;if(document.getElementById("p-360").checked) x360= $("#p-360").val();
        var xone;if(document.getElementById("p-one").checked) xone= $("#p-one").val();
        var ps2;if(document.getElementById("p-ps2").checked) ps2= $("#p-ps2").val();
        var ps3;if(document.getElementById("p-ps3").checked) ps3= $("#p-ps3").val();
        var ps4;if(document.getElementById("p-ps4").checked) ps4= $("#p-ps4").val();
        var nswitch;if(document.getElementById("p-switch").checked) nswitch= $("#p-switch").val();
        var others;if(document.getElementById("p-others").checked) others= $("#p-others").val();        
            $.post("products_ajax.php", {minprice: ui.values[0],maxprice: ui.values[1],name: title,publish: publisher,year: releaseyear,
                type: gametype,platformpc: pc,platformxbox360: x360,platformxboxone: xone,platformps2: ps2,platformps3: ps3,platformps4: ps4,
                platformswitch: nswitch,platformothers: others
            }, function(data,status){$("#product-list").html(data);});
        $( "#amount" ).val( "€" + ui.values[ 0 ] + " - €" + ui.values[ 1 ] );}});
        $( "#amount" ).val( "€" + $( "#slider-range" ).slider( "values", 0 ) +" - €" + $( "#slider-range" ).slider( "values", 1 ) );
    } );
    //title
    $(document).ready(function() {$("#title").keyup(post);});    
    //publisher
    $(document).ready(function() {$("#publisher").keyup(post);});    
    //type
    $(document).ready(function() {$("#type").on('change',post);});    
    //release year
    $(document).ready(function() {$("#year").keyup(post);});    
    //platform-pc
    $(document).ready(function() {$("#p-pc").on('change',post);});    
    //platform-xbox360
    $(document).ready(function() {$("#p-360").on('change',post);});    
    //platform-xboxone
    $(document).ready(function() {$("#p-one").on('change',post);});    
    //platform-ps2
    $(document).ready(function() {$("#p-ps2").on('change',post);});    
     //platform-ps3
    $(document).ready(function() {$("#p-ps3").on('change',post);});    
    //platform-ps4
    $(document).ready(function() {$("#p-ps4").on('change',post);});      
    //platform-switch
    $(document).ready(function() {$("#p-switch").on('change',post);});    
    //platform-others
    $(document).ready(function() {$("#p-others").on('change',post);});       
</script>