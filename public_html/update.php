<?php

    if (isset($_POST['submit'])) {
        require "../resources/config.php";
        require "../resources/common.php";

        try {
            $connection = new PDO($dsn, $username, $password, $options);
            
            $id = $_GET['id'];

            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $phonenumber = $_POST['phonenumber'];
        
            $updated_number = array($firstname, $lastname, $email, $phonenumber, $id);

            $sql = 'UPDATE people
            SET firstname = ?, lastname = ?, email = ?, phonenumber = ? 
            WHERE id = ?';
            
            $statement = $connection->prepare($sql);
            $statement->execute($updated_number);
            header("Location: index.php");
        } 
        
        catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    }

?>

<?php include "../resources/templates/header.php" ?>

<h2 class="display-3 text-center mb-5">Change a Phone Number</h2>

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