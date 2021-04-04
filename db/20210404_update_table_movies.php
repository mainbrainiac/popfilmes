<?php

require 'db/connection.php';

$sql = "ALTER TABLE movies ADD favorites INT DEFAULT 0";


$db = Database::connection();
$db->exec($sql);
