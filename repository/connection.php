<?php

class Database {
    public static function connection() {
        $user = 'root';
        $password  = 'root';
        
        return new PDO('mysql:dbname=popfilmeshd;host=127.0.0.1', $user, $password);
    }
}


?>