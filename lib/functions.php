<?php 


function is_post() //újraküldték e az oldalt
{
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function url($page) // visszaadja a paraméter url-jét.
{
    $url = DOMAIN."?p={$page}"; //DOMAIN configban van define-olva.
     return $url;
}

function asset($asset) {
    return DOMAIN . $asset;
}


function GenerateID($digits = 5)
{
    $chars="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMOPQRSTUVWXYZ"; //base64, but '=' and '/' is problematic in URL - kitöröltem a - meg a _ karaktert mert csúnya <3
    $result = "";
    for ($i = 0; $i < $digits; $i++){
        $result .= $chars[rand(0,strlen($chars)-1)];
    }
    return $result; 
}

function GenerateRestorationCode($digits = 8)
{  
    $result = "";
    for ($i = 0; $i < $digits; $i++){
        $result .= rand(0,9);
    }
    return $result; 
}

function db_connect()
{
    $conn = new mysqli(DBH,DBU,DBP,DBN);
    if($conn->connect_error)
    {
        die("Connection failed {$conn->connect_error}");
    }
    return $conn;
}

function db_close()
{
    global $db;
    $db->close();
}

function unsetPlatformFilters(){
    unset ($_SESSION["platform-pc"]);
    unset ($_SESSION["platform-xbox360"]);
    unset ($_SESSION["platform-xboxone"]);
    unset ($_SESSION["platform-ps2"]);
    unset ($_SESSION["platform-ps3"]);
    unset ($_SESSION["platform-ps4"]);
    unset ($_SESSION["platform-switch"]);
    unset ($_SESSION["platform-others"]);
}

function loggedIn(){
    return isset($_SESSION['user_id']);
}

function logOut(){
    unset($_SESSION['user_id']);
    unset($_SESSION['user_user_name']);
    unset($_SESSION['user_email']);
    unset($_SESSION['user_fullname']);
    unset($_SESSION['user_birth_date']);
    unset($_SESSION['user_age']);
    unset($_SESSION['user_role']);
    unset($_SESSION['user_registration_date']);
    unset($_SESSION['user_shippingID']);
    unset($_SESSION['user_del']);

    header("Location: ".url('home'));
}

?>

