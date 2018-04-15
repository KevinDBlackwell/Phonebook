<?php

    $host = "localhost";
    $username = "user";
    $password = "password";
    $dbname = "phonebook";

    $dsn = "mysql:host=$host; dbname=$dbname";
    $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );

?>