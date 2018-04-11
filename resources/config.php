<?php

    $url = getenv('JAWSDB_URL');
    $dbparts = parse_url($url);

    $host = $dbparts['host'];
    $username = $dbparts['user'];
    $password = $dbparts['pass'];
    $dbname = ltrim($dbparts['path'],'/');

    $dsn = "mysql:host=$host; dbname=$dbname";
    $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );

?>