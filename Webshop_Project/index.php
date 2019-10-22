<?php
session_start();

require_once 'lib/config.php';
require_once 'lib/functions.php';

$page = isset($_GET['p']) ? $_GET['p'] : 'login';

if(file_exists("{$page}.php"))
{
    include_once "{$page}.php";
}
else
{
    include_once "404.php";
}


