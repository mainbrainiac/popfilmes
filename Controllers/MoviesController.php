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
        $movie = (object) $request;

        $upload = $this -> savePoster($_FILES);

        if(gettype($upload) == "string"){
            $movie -> poster = $upload;
        }

        $_FILES["poster_file"];

        if($moviesRepository->save($movie)) {
            $_SESSION["msg"] = "Filme inserido com sucesso!";
        } else {
            $_SESSION["msg"] = "Falha ao inserir o filme.";
        };

        header("Location: /");
    } 

    private function savePoster($file){
        $posterDir = "Assets/images/posters/";
        $posterPath = $posterDir . basename($file["poster_file"]["name"]);
        $posterTmp = $file["poster_file"]["tmp_name"];

        if (move_uploaded_file($posterTmp, $posterPath)) {
            return $posterPath;
        } else {
            return false;
        };
    }

    public function favorite(int $id) {
        $moviesRepository = new MoviesRepositoryPDO();
        $result = ['success' => $moviesRepository -> favorite($id)];
        header('Content-type: application/json');
        echo json_encode($result);
    }

    public function delete(int $id) {
        $moviesRepository = new MoviesRepositoryPDO();
        $result = ['success' => $moviesRepository -> delete($id)];
        header('Content-type: application/json');
        echo json_encode($result);
    }
}
