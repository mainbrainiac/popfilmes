<?php

session_start();

require "./repository/MoviesRepositoryPDO.php";
require "./Models/Movie.php";

class MoviesController{
    public function index(){
        $moviesRepository = new MoviesRepositoryPDO();
        return $moviesRepository -> listAll();
    }

    public function save($request){
        $moviesRepository = new MoviesRepositoryPDO();
        $movie = new Movie();

        $movie -> title    = $request["title"];
        $movie -> synopsis = $request["synopsis"];
        $movie -> note     = $request["note"];
        $movie -> poster   = $request["poster"];

        if($moviesRepository->save($movie)) {
            $_SESSION["msg"] = "Filme inserido com sucesso!";
        } else {
            $_SESSION["msg"] = "Falha ao inserir o filme.";
        };

        header("Location: /");
    } 
}



?>  