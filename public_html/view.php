<?php

    try {	
        require "../resources/config.php";
        require "../resources/common.php";

        $connection = new PDO($dsn, $username, $password, $options);

        $sql = "SELECT * FROM people";

        $statement = $connection->prepare($sql);
        $statement->execute();

        $result = $statement->fetchAll();
    } 
    
    catch(PDOException $error) {
        echo $error->getMessage();
    }
    
?>

<?php require "../resources/templates/header.php" ?>
		
<?php if ($result && $statement->rowCount() > 0) { ?>
    <h2>Results</h2>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email Address</th>
                <th>Phone Number</th>
                <th>Date Added</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($result as $row) { ?>
                <tr>
                    <td><?php echo escape($row["id"]); ?></td>
                    <td><?php echo escape($row["firstname"]); ?></td>
                    <td><?php echo escape($row["lastname"]); ?></td>
                    <td><?php echo escape($row["email"]); ?></td>
                    <td><?php echo escape($row["phonenumber"]); ?></td>
                    <td><?php echo escape($row["date"]); ?> </td>
                </tr>
            <?php } ?> 
        </tbody>
    </table>

    <?php } else { ?>
        <blockquote>No results found.</blockquote>
    <?php } 

?> 

<a href="index.php">Back to home</a>

<?php require "../resources/templates/footer.php"; ?>