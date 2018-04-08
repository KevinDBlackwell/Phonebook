<?php

    require "../resources/config.php";

    try {
        $connection = new PDO($dsn, $username, $password, $options);

        $id = $_GET['id'];
        $database = 'people';
        $deleted_number = array($id);

        $sql = 'DELETE FROM people WHERE id = ?';

        $statement = $connection->prepare($sql);
        $statement->execute($deleted_number);
        header("Location: view.php");
    }

    catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }

?>