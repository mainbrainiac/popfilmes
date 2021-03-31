<?php

session_start();

require "./repository/MoviesRepositoryPDO.php";
require "./model/Movie.php";

$moviesRepository = new MoviesRepositoryPDO();
$movie = new Movie();

$movie -> title    = $_POST["title"];
$movie -> synopsis = $_POST["synopsis"];
$movie -> note     = $_POST["note"];
$movie -> poster   = $_POST["poster"];

if($moviesRepository->save($movie)) {
    $_SESSION["msg"] = "Filme inserido com sucesso!";
} else {
    $_SESSION["msg"] = "Falha ao inserir o filme.";
};

header("Location: /");

?>  