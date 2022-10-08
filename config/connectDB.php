<?php
    define('hostname', 'sql6.freesqldatabase.com');
    define('username', 'sql6524878');
    define('password', 'CwlIr6bsE7');
    define('database', 'sql6524878');

    $connect = new mysqli(hostname, username, password, database);

    if($connect->error){
        die('Connection error' . $connect->error);
    }
?>