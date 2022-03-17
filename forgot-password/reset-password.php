<?php

require_once ".env.users.php";

// create a DB connection 
// start connection
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);
if(!$con)
	exit("<p>Connection Error: " . mysqli_connect_error() . "</p>");

//if the user clicks on the reset password link sent to their email
if (isset($_GET["email"]) && isset($_GET["action"]) 
&& ($_GET["action"]=="reset") && !isset($_POST["action"])){
$email = $_GET["email"];
?>
  <br />
  <form method="post" action="" name="update">
  <input type="hidden" name="action" value="update" />
  <br /><br />
  <label><strong>Enter New Password:</strong></label><br />
  <input type="password" name="pass1" maxlength="15" required />
  <br /><br />
  <label><strong>Re-Enter New Password:</strong></label><br />
  <input type="password" name="pass2" maxlength="15" required/>
  <br /><br />
  <input type="hidden" name="email" value="<?php echo $email;?>"/>
  <input type="submit" value="Reset Password" />
  </form>
<?php
}
if(isset($_POST["email"]) && isset($_POST["action"]) &&
 ($_POST["action"]=="update")){
$error="";
$pass1 = mysqli_real_escape_string($con,$_POST["pass1"]);
$pass2 = mysqli_real_escape_string($con,$_POST["pass2"]);
$email = $_POST["email"];
if ($pass1!=$pass2){
$error.= "<p>Password do not match, both password should be same.<br /><br /></p>";
  }
else{
$pass1 = md5($pass1);
mysqli_query($con, "UPDATE `users` SET `password`='".$pass1."' WHERE `email`='".$email."';"
);

echo '<div class="error"><p>Congratulations! Your password has been updated successfully.</p>
<p><a href="http://ec2-54-172-16-142.compute-1.amazonaws.com/login.php">
Click here</a> to Login.</p></div><br />';
	  }
}
mysqli_close($con);
?>
