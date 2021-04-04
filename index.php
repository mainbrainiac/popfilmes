<?php

$route = $_SERVER["REQUEST_URI"];
$method = $_SERVER["REQUEST_METHOD"];

require "./Controllers/MoviesController.php";


if ($route == "/") {
    require "Views/gallery.php";
    exit();
}

if ($route == "/novo") {
    if($method == "GET") require "Views/register.php";

    if($method == "POST") {
        $controller = new MoviesController();
        $controller -> save($_REQUEST);
    }

    exit();
}

$favoriteRoute = "/favoritar";
if(substr($route, 0, strlen($favoriteRoute)) === $favoriteRoute) {
    $controller = new MoviesController();
    $controller -> favorite(basename($route));

    exit();
}

require "Views/404.php";
