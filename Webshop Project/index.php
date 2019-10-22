<?php
session_start();
require_once 'lib/config.php';
$p = 'main';
if(!empty($_GET['p']))
    $p = $_GET['p'];
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title><?=str($p)->StartWithCapital();?></title>
</head>
<body>
<header>
    <?php
    require_once 'pages/head.php';
    ?>
</header>
<nav>
    <?php
    require_once 'pages/nav.php';
    ?>
</nav>
<main>
    <?php
    require_once 'pages/main.php';
    ?>
</main>
<footer>
    <?php
    require_once 'pages/footer.php';
    ?>
</footer>
</body>
</html>
