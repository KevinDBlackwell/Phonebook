<?php

    if (isset($_POST['submit'])) {
        require "../resources/config.php";
        require "../resources/common.php";

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $phonenumber = $_POST['phonenumber'];

        try {
            $connection = new PDO($dsn, $username, $password, $options);

            $new_number = array($firstname, $lastname, $email, $phonenumber);

            $sql = "INSERT INTO people (firstname, lastname, email, phonenumber) VALUES (?, ?, ?, ?)";

            $statement = $connection->prepare($sql);

            $statement->execute($new_number);

            header("Location: view.php");
        }
        catch(PDOException $error) {
            echo $sql . "<br><br>" . $error->getMessage();
        }
            
    }
?>


<?php include "../resources/templates/header.php" ?>

<h2 class="display-3 text-center mb-5">Add a Phone Number</h2>

<form class="w-50 mx-auto" method="post">
    <div class="form-group">
	    <label for="firstname">First Name</label>
	    <input class="form-control" type="text" name="firstname" id="firstname" placeholder="First Name" required>
    </div>
    <div class="form-group">
	    <label for="lastname">Last Name</label>
	    <input class="form-control" type="text" name="lastname" id="lastname" placeholder="Last Name" required>
    </div>
    <div class="form-group">
	    <label for="email">Email Address</label>
	    <input class="form-control" type="email" name="email" id="email" placeholder="name@example.com" title="Make sure your email includes an '@' and a '.'" required pattern="^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$">
    </div>
    <div class="form-group">
	    <label for="phonenumber">Phone Number</label>
	    <input class="form-control" type="tel" name="phonenumber" id="phonenumber" placeholder="xxx-xxx-xxxx" title="Make sure your phone number has this format: xxx-xxx-xxxx" required pattern="[0-9]{3}[-][0-9]{3}[-][0-9]{4}">
    </div>
    <div class="form-group">
    	<input class="btn btn-dark" type="submit" name="submit" value="Submit">
    </div>
</form>

<a class="btn btn-secondary d-block w-25 mx-auto" href="index.php">Back to home</a>

<?php include "../resources/templates/footer.php" ?>