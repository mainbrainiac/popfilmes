<?php

require "db/connection.php";

class MoviesRepositoryPDO
{

    private $connection;

    public function __construct()
    {
        $this->connection = Database::connection();
    }

    public function listAll(): array {
        $moviesList = array();
        $sql = "SELECT * FROM movies";
        $movies = $this->connection->query($sql);

        while ($movie = $movies->fetchObject()) {
            array_push($moviesList, $movie);
        }

        return $moviesList;
    }

    public function save($movie): bool {
        $query = "INSERT INTO movies (title, poster, synopsis, note)
        VALUES (:title, :poster, :synopsis, :note)";

        $stmt = $this->connection->prepare($query);

        $stmt->bindValue(':title', $movie->title, PDO::PARAM_STR);
        $stmt->bindValue(':synopsis', $movie->synopsis, PDO::PARAM_STR);
        $stmt->bindValue(':note', $movie->note, PDO::PARAM_STR);
        $stmt->bindValue(':poster', $movie->poster, PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function favorite(int $id) {
        $query = "UPDATE movies SET favorites = NOT favorites WHERE id=:id";

        $stmt = $this->connection->prepare($query);

        $stmt->bindValue(':id', $id, PDO::PARAM_STR);

        if($stmt->execute()) {
            return "ok";
        } else {
            return "err";
        }
    }

    public function delete(int $id) {
        $query = "DELETE FROM movies WHERE id=:id";

        $stmt = $this->connection->prepare($query);

        $stmt->bindValue(':id', $id, PDO::PARAM_STR);

        if($stmt->execute()) {
            return "ok";
        } else {
            return "err";
        }
    }

    
}
