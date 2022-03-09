<?php // logging the user in
// basically, we check the credentials the user has given us and we echo basic html form to be filled in
require_once ".env.users.php";

session_start();

// if the user is already logged in, send them back to the index page. From there a user can visit the courses page
if (!empty($_SESSION['user_id'])){
	header("Location: index.php");
	exit();
}

// if the user submitted the log in form
if(!empty($_POST['submit'])){

	//verify that the input given matches a record in the database
	
	// start connection
	$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);
	if(!$con)
    		exit("<p>Connection Error: " . mysqli_connect_error() . "</p>");
	
	// create a statement
	$stmt = mysqli_stmt_init($con);
	if(!$stmt)
    		exit("<p>Failed to initialize statement</p>");

	// prepare statement
	$query = "SELECT user_id, password FROM users WHERE username = ?";
	if(!mysqli_stmt_prepare($stmt, $query))
    		exit("<p>Failed to prepare statement</p>");
	
	// bind the parameter
	mysqli_stmt_bind_param($stmt, "s", trim($_POST['username']));

	// execute statement
	if(!mysqli_stmt_execute($stmt))
		exit("<p>Failed to execute statement: " . mysqli_stmt_error($stmt) . "</p>");

	// bind the result variables
	mysqli_stmt_bind_result($stmt, $id, $password);

	// verify the password matches the one in the record
	if(mysqli_stmt_fetch($stmt) && !empty($password) && password_verify($_POST['password'], $password)){
		$_SESSION['user_id'] = $id;
		header("Location: index.php");
		exit();
	}
	else {
		//echo '<p>Error: Please try logging in again <a href="login.php">here</a>.</p>';
		printForm();
		echo 'ERROR: Please try logging in again.';
		echo '</body></html>';
		exit();
	}
	mysqli_stmt_close($stmt);
	mysqli_close($con);

}
// print out html for this page
function printForm(){
echo '<html>
        <head>
                <title>
                Log Into Your Account
                </title>
        </head>
        <body>
                <h1>Log Into Your Account</h1>
                <br>
                <hr>';

// input form
echo '
<form method="post" action="login.php">
    <div>
        <label for="username">Username:</label>
        <input name="username" id="username"/>
    </div>
    <div>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password"/>
    </div>
	<div>
    <input type="submit" name="submit" value="LogIn"/>
        <p>Don\'t Have an Account Yet?<a href = "register.php">Register Here!</a></p>
	<p>Forgot your Password?<a href = "forgot-password/index.php">Click Here to Recover Password</a></p>
</div>
</form>';
}
printForm();
echo '</body></html>';
