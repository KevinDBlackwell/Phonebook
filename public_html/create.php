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
            header("Location: view.php");
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

<h2 class="display-3 text-center mb-5">Add a Phone Number</h2>

<form class="w-50 mx-auto" method="post">
    <div class="form-group">
	    <label for="firstname">First Name</label>
	    <input class="form-control" type="text" name="firstname" id="firstname" placeholder="First Name">
    </div>
    <div class="form-group">
	    <label for="lastname">Last Name</label>
	    <input class="form-control" type="text" name="lastname" id="lastname" placeholder="Last Name">
    </div>
    <div class="form-group">
	    <label for="email">Email Address</label>
	    <input class="form-control" type="text" name="email" id="email" placeholder="name@example.com">
    </div>
    <div class="form-group">
	    <label for="phonenumber">Phone Number</label>
	    <input class="form-control" type="text" name="phonenumber" id="phonenumber" placeholder="xxx-xxx-xxxx">
    </div>
    <div class="form-group">
    	<input class="btn btn-dark" type="submit" name="submit" value="Submit">
    </div>
</form>

<a class="btn btn-secondary d-block w-25 mx-auto" href="index.php">Back to home</a>

<?php include "../resources/templates/footer.php" ?>