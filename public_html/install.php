<?php

    require "../resources/config.php";

    try {
        $connection = new PDO("mysql:host=$host", $username, $password, $options);
        $sql = file_get_contents("../data/init.sql");
        $connection->exec($sql);

        echo 'Success!';
    } 

    catch(PDOException $error) {
        echo $error->getMessage();
    }

?>