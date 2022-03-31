<div class="box" ><!-- box Starts -->

<div class="box-header" ><!-- box-header Starts -->

<center>

<h1>Login</h1>

<p class="lead" >Are you a Hug With Mug Customer?</p>


</center>

<p class="text-muted" >
Sign in down below with your Hug With Mug Username and Password!
</p>




</div><!-- box-header Ends -->

<form action="checkout.php" method="post" ><!--form Starts -->

<div class="form-group" ><!-- form-group Starts -->

<label>Username</label>

<input type="text" class="form-control" name="username" required >

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label>Password</label>

<input type="password" class="form-control" name="password" required >

<h4 align="center">

<a href="forgot_pass.php"> Forgot Password </a>

</h4>

</div><!-- form-group Ends -->

<div class="text-center" ><!-- text-center Starts -->

<button name="login" value="Login" class="btn btn-primary" >

<i class="fa fa-sign-in" ></i> Log in


</button>

</div><!-- text-center Ends -->


</form><!--form Ends -->

<center><!-- center Starts -->

<a href="customer_register.php" >

<h3>Are you a new customer? Register Here!</h3>

</a>


</center><!-- center Ends -->


</div><!-- box Ends -->

<?php
include("includes/db.php");

// if the user submitted the login form
if(!empty($_POST['login'])){

/**/
	// create a statement
	$stmt = mysqli_stmt_init($con);
	if(!$stmt)
    		exit("<p>Failed to initialize statement</p>");

	// prepare statement
	$query = "SELECT customer_email, customer_pass FROM customers WHERE username = ?";
	if(!mysqli_stmt_prepare($stmt, $query))
    		exit("<p>Failed to prepare statement</p>");
	
	// bind the parameter
	mysqli_stmt_bind_param($stmt, "s", trim($_POST['username']));

	// execute statement
	if(!mysqli_stmt_execute($stmt))
		exit("<p>Failed to execute statement: " . mysqli_stmt_error($stmt) . "</p>");

	// bind the result variables
	mysqli_stmt_bind_result($stmt, $email, $password);


	// verify the password matches the one in the record
	mysqli_stmt_fetch($stmt);
        if(password_verify($_POST['password'], $password)){
	// check if the cart is active
        $get_ip = getRealUserIp();
        $select_cart = "select * from cart where ip_add='$get_ip'";

        $run_cart = mysqli_query($con,$select_cart);

	$check_cart = mysqli_num_rows($run_cart);

	if($check_cart==0){

	$_SESSION['customer_email']=$email;

	echo "<script>alert('You are Logged In')</script>";

	echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";

	}
	else {

	$_SESSION['customer_email']=$email;

	echo "<script>alert('You are Logged In')</script>";

	echo "<script>window.open('checkout.php','_self')</script>";
	}
		exit();
	}
	else {
		echo "<script>alert('password or email is wrong')</script>";
		exit();
	} 
	mysqli_stmt_close($stmt);
	mysqli_close($con);
}


/**/


?>
