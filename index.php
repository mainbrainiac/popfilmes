<?php

$route = $_SERVER["REQUEST_URI"];
$method = $_SERVER["REQUEST_METHOD"];

switch($route) {
    case "/":
        require "./gallery.php";
        break;
    case "/novo":
        if($method == "GET") require "./register.php";
        if($method == "POST") require "./insertMovies.php";
        break;
    default:
        require "404.php";
}

?>