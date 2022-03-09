<?php // register a user for the website
require_once ".env.users.php";

// start a session
session_start();

// if there is a session saved for the user
if(!empty($_SESSION['user_id'])){
	// redirect user to the main page
	header("Location: index.php");
	// exit out of this file
	exit();
}
// if the register form was submitted
if (!empty($_POST['submit'])) {
	/* first, error check and make sure there isnt already a user of the same username in our system */

	// open connection
	$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);
	if (!$con)
		exit("<p>Connection Error: " . mysqli_connect_error() . "</p>");

	// initialize the statement
	$stmt = mysqli_stmt_init($con);
	if (!$stmt)
		exit("<p>Failed to initialize statement</p>");

	// prepare the statement 
	$query = "SELECT username FROM users"; // select all usernames from the table
	if (!mysqli_stmt_prepare($stmt, $query))
		exit("<p>Failed to prepare statement</p>");
	// execute the query
	if (!mysqli_stmt_execute($stmt))
		exit("<p>Failed to execute statement</p>");
	// bind the result variables
	mysqli_stmt_bind_result($stmt, $savedusernames);

	// go through all the usernames in the table, if they match the given username, return an error
	while(mysqli_stmt_fetch($stmt) != NULL){
		if($savedusernames == trim($_POST['username'])){
			printReg();
			echo "<p>Error, this username has already been registered. If you already have an account, sign in <a href='login.php'>here</a>.</p>";
		//	echo "<br><p> Or click <a href='register.php'>here</a> to try again.</p>";
			exit();
		}
	}

	/* if no errors, register the user into the database */

	// prepare statement	
	$query = "INSERT INTO users (username, password, first_name, last_name) VALUES (?, ?, ?, ?)";
	if (!mysqli_stmt_prepare($stmt, $query))
		exit("<p>statement failed to prepare</p>");

	// bind the parameters
	$hashed_result = password_hash($_POST['password'], PASSWORD_DEFAULT); // hash the plaintext password given
	mysqli_stmt_bind_param($stmt, "ssss", trim($_POST['username']), $hashed_result, trim($_POST['first_name']), trim($_POST['last_name']));
	// execute query
	if (!mysqli_stmt_execute($stmt))
		exit("<p>Failed to execute statement</p>");
	
	mysqli_stmt_close($stmt);
	mysqli_close($con);

	// redirect after successful registration
	header("Location: login.php");
	exit();
}
?>
<?php
function printReg(){
echo '<!-- Register a User for Our Website -->
	<html>
		<head>
			<title>
				Register an Account
			</title>
		</head>
	<body>';
// print out html for this page
echo '<h1>New to the Page? Register an Account!</h1>
	<br>
	<hr>';
	// print out the register form
echo '
<form method="post" action="register.php">
    <div>
	<label for="username">Enter a Unique Username:</label>
	<input name="username" id="username"/>
    </div>
    <div>
	<label for="password">Enter a Unique Password:</label>
	<input type="password" name="password" id="password"/>
    </div>
	<div>
	<label for="first_name">Enter Your First Name:</label>
	<input type="first_name" name ="first_name" id="first_name"/>
	</div>
	<div>
	<label for="last_name">Enter Your Last Name:</label>
	<input type="last_name" name="last_name" id="last_name"/>
	</div>
    <input type="submit" name="submit" value="Register"/>
</form>';
}
printReg();
echo '</body>
</html>';
?>
