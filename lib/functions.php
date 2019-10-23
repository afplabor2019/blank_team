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

?>

