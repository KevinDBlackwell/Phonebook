<?php

    if (isset($_POST['submit'])) {
        require "../resources/config.php";
        require "../resources/common.php";

        try {
            $connection = new PDO($dsn, $username, $password, $options);
            
            $new_number = array(
                "firstname" => $_POST['firstname'],
                "lastname" => $_POST['lastname'],
                "email" => $_POST['email'],
                "phonenumber" => $_POST['phonenumber'],
            );

            $sql = sprintf(
                "INSERT INTO %s (%s) values (%s)",
                "people",
                implode(", ", array_keys($new_number)),
                ":" . implode(", :", array_keys($new_number))
            );
            
            $statement = $connection->prepare($sql);
            $statement->execute($new_number);
        } 
        
        catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    }
?>


<?php include "../resources/templates/header.php" ?>

<?php if (isset($_POST['submit']) && $statement) { ?>
	<blockquote><?php echo $_POST['firstname']; ?> successfully added.</blockquote>
<?php } ?>

<h2>Add a Phone Number</h2>

<form method="post">
	<label for="firstname">First Name</label>
	    <input type="text" name="firstname" id="firstname">
	<label for="lastname">Last Name</label>
	    <input type="text" name="lastname" id="lastname">
	<label for="email">Email Address</label>
	    <input type="text" name="email" id="email">
	<label for="phonenumber">Phone Number</label>
	    <input type="text" name="phonenumber" id="phonenumber">
	<input type="submit" name="submit" value="Submit">
</form>

<a href="index.php">Back to home</a>

<?php include "../resources/templates/footer.php" ?>