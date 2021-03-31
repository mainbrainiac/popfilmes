<?php

$route = $_SERVER["REQUEST_URI"];
$method = $_SERVER["REQUEST_METHOD"];

require "./Controllers/MoviesController.php";

switch($route) {
    case "/":
        require "Views/gallery.php";
        break;
    case "/novo":
        if($method == "GET") require "Views/register.php";
        if($method == "POST") {
            $controller = new MoviesController();
            $controller -> save($_REQUEST);
        }
        break;
    default:
        require "Views/404.php";
}

?>