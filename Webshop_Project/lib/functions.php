<?php 

function is_post()
{
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function url($page)
{
    $url = DOMAIN."?p={$page}";
     return $url;
}

?>