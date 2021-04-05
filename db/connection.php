<?php

class Database {
    public static function connection() {
        $env = parse_ini_file('.env');

        $databaseType = $env["databasetype"];
        $database = $env["database"];
        $server = $env["server"];
        $user = $env["user"];
        $pass = $env["password"];


        if($databaseType == "mysql") {
            $database = "host=$server;dbname=$database";
        }

        return new PDO("$databaseType:$database", $user, $pass);
    }
}
