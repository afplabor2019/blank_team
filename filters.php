<div class="product-filters">
    <div class="products-filter-title"><p>FILTERS</p></div>
        <div class="filter-price">
            <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
            <link rel="stylesheet" href="/resources/demos/style.css">
            
            <p>
                <label for="amount">Price range:</label>
                <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
            </p>
            <div id="slider-range" name="slider-range"></div>
        </div>
        <div class ="filter-title">
            <label for="title">Title</label>
            <input type="text" name ="title" id="title" <?php if(isset($title) && $title != null) echo "value=$title"; ?>>
        </div>
        <div class="filter-platform">
            <p>Platforms</p>
            <input type="checkbox" id="p-pc" name="platform-pc" onclick="OthersOff()" value="PC" <?php echo (isset($platform) && $platform == "PC") ? "checked" : "" ?>>PC<br>
            <input type="checkbox" id="p-360" name="platform-xbox360" onclick="OthersOff()" value="XBOX 360"  <?php echo (isset($platform) && $platform == "XBOX 360") ? "checked" : "" ?>>XBOX 360<br>
            <input type="checkbox" id="p-one" name="platform-xboxone" onclick="OthersOff()" value="XBOX One"  <?php echo (isset($platform) && $platform == "XBOX One") ? "checked" : "" ?>>XBOX One<br>
            <input type="checkbox" id="p-ps2" name="platform-ps2" onclick="OthersOff()" value="PS2" <?php echo (isset($platform) && $platform == "PS2") ? "checked" : "" ?>>PS2<br>
            <input type="checkbox" id="p-ps3" name="platform-ps3" onclick="OthersOff()" value="PS3" <?php echo (isset($platform) && $platform == "PS3") ? "checked" : "" ?>>PS3<br>
            <input type="checkbox" id="p-ps4" name="platform-ps4" onclick="OthersOff()" value="PS4"  <?php echo (isset($platform) && $platform == "PS4") ? "checked" : "" ?>>PS4<br>
            <input type="checkbox" id="p-switch" name="platform-switch" onclick="OthersOff()" value="Nintendo Switch"  <?php echo (isset($platform) && $platform == "Nintendo Switch") ? "checked" : "" ?>>Nintendo Switch<br>
            <input type="checkbox" id="p-others" name="platform-others" onclick="OthersChecked()" value="Others"  <?php echo (isset($platform) && $platform == "Others") ? "checked" : "" ?>>Others<br>
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
            function OthersOff(){document.getElementById("p-others").checked = false;}
        </script>
        <div class="filter-type">
            <p><label for="type"> Type </label></p> <br>
            <select name ="type" id ="type">
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
            <input name="release-year" type="number" id="year" min="1990" max="<?php echo date('Y') ?>" <?php if(isset($releaseyear) && $releaseyear != null) echo "value=$releaseyear"; ?>>
        </div>
        <div class="filter-publisher">
            <p><label>Publisher</label></p>
            <input name="publisher" type="text-p" id="publisher" <?php if(isset($publisher) && $publisher != null) echo "value=$publisher"; ?>>
        </div>
        <div class="filter-btn-div"><button class="filter-btn" type="submit-btn"><span>Search</span></button></div>
        <input type="text" name ="slidermin" id="slidermin" value = 0 style = "display: none">
        <input type="text" name ="slidermax" id="slidermax" value = 200 style = "display: none">
</div>