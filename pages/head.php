<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>WSNAME</title>
    <link rel="stylesheet" href="<?php echo asset("app.css"); ?>">
</head>
<body>
    <header>
        <div class="header">
                <div class="upper-row">
                    <nav>
                        <ul>
                            <li>
                                <a class="logo" href ="<?php echo url('home') ?>">Nagyon kreatív webshop</a>
                            <li>
                                <div class="search-container">
                                <form action="<?php echo url('products'); ?>" method="POST">
                                <input type="text" placeholder ="Search..." name="search">
                                <button type="submit"><img class="icon" src="images/search.png" alt="Search" height="17" width="17"></button>
                                </form>
                                </div>
                            </li>
                            <li>
                                <a href ="<?php echo url('login') ?>">Login</a>
                            </li>
                            <li>
                                <a href ="<?php echo url('cart') ?>">Shopping cart</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="lower-row">
                    <nav>
                        <ul>
                            <li>
                                <a href ="<?php echo url('home') ?>">Home</a>
                            </li>
                            <li>
                                <a href ="<?php echo url('products') ?>">Products</a>
                            </li>
                            <li>
                                <a href ="<?php echo url('products') ?>">Platforms</a>
                            </li>
                            <li>
                                <a href ="<?php echo url('register') ?>">Register</a>
                            </li>
                        </ul>
                    </nav>
                </div>
        </div>
    </header>
<main class="container">
