<?php

    if(isset($_GET['id'])) {
        require "../resources/config.php";

        try {
            $connection = new PDO($dsn, $username, $password, $options);

            $sql = "SELECT * FROM people WHERE id = ?";

            $id = $_GET['id'];

            $statement = $connection->prepare($sql);
            $statement->execute(array($id));

            $result = $statement->fetch();
        }

        catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    }
?>

<?php

    if (isset($_POST['submit'])) {
        require "../resources/config.php";
        require "../resources/common.php";

            $id = $_GET['id'];

            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $phonenumber = $_POST['phonenumber'];

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            if(preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $phonenumber)) {
                try {
                    $connection = new PDO($dsn, $username, $password, $options);
                
                    $updated_number = array($firstname, $lastname, $email, $phonenumber, $id);
        
                    $sql = 'UPDATE people
                    SET firstname = ?, lastname = ?, email = ?, phonenumber = ? 
                    WHERE id = ?';
                    
                    $statement = $connection->prepare($sql);
                    $statement->execute($updated_number);
                    header("Location: view.php");
                } 
                
                catch(PDOException $error) {
                    echo $sql . "<br>" . $error->getMessage();
                }
            }
            else {
                echo "<script type='text/javascript'>alert('Enter your phone number in the correct format: xxx-xxx-xxxx');</script>";
            }
        }
        else {
            echo "<script type='text/javascript'>alert('Re-enter your email!');</script>";
        }
    }

?>

<?php include "../resources/templates/header.php" ?>

<h2 class="display-3 text-center mb-5">Change a Phone Number</h2>


<form class="w-50 mx-auto" method="post">
    <div class="form-group">
	    <label for="firstname">First Name</label>
	    <input class="form-control" type="text" name="firstname" id="firstname" value="<?php echo ($result['firstname']); ?>" required>
    </div>
    <div class="form-group">
	    <label for="lastname">Last Name</label>
	    <input class="form-control" type="text" name="lastname" id="lastname" value="<?php echo ($result['lastname']); ?>" required>
    </div>
    <div class="form-group">
	    <label for="email">Email Address</label>
	    <input class="form-control" type="email" name="email" id="email" value="<?php echo ($result['email']); ?>" required>
    </div>
    <div class="form-group">
	    <label for="phonenumber">Phone Number</label>
	    <input class="form-control" type="tel" name="phonenumber" id="phonenumber" value="<?php echo ($result['phonenumber']); ?>" required>
    </div>
    <div class="form-group">
    	<input class="btn btn-dark" type="submit" name="submit" value="Submit">
    </div>
</form>

<a class="btn btn-secondary d-block w-25 mx-auto" href="index.php">Back to home</a>

<?php include "../resources/templates/footer.php" ?>