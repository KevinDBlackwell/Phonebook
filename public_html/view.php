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
    <h2 class="display-2 text-center">Results</h2>

    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email Address</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Date Added</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($result as $row) { ?>
                <tr>
                    <th scope="row"></th>
                    <td><?php echo escape($row["firstname"]); ?></td>
                    <td><?php echo escape($row["lastname"]); ?></td>
                    <td><?php echo escape($row["email"]); ?></td>
                    <td><?php echo escape($row["phonenumber"]); ?></td>
                    <td><?php echo escape($row["date"]); ?> </td>
                    <td style="letter-spacing: 20px;">
                        <a href="update.php?id=<?php echo escape($row["id"]); ?>'">
                            <i class="fas fa-pencil-alt"></i>
                        </a> 
                        <a href="delete.php?id=<?php echo escape($row["id"]); ?>'">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php } ?> 
        </tbody>
    </table>

    <?php } else { ?>
        <blockquote>No results found.</blockquote>
    <?php } 

?> 
    <a class="btn btn-secondary d-block w-25 mx-auto" href="index.php">Back to home</a>


<?php require "../resources/templates/footer.php"; ?>