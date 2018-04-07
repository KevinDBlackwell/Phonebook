<?php include "../resources/templates/header.php" ?>

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