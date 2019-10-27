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

?>

