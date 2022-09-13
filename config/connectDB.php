<?php
    define('hostname', 'localhost');
    define('username', 'Jim');
    define('password', 'Jimuel_092201');
    define('database', 'php_db');

    $connect = new mysqli(hostname, username, password, database);

    if($connect->error){
        die('Connection error' . $connect->error);
    }
?>