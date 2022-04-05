<?php



if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<?php

if(isset($_GET['edit_user'])){

$edit_id = $_GET['edit_user'];

$get_admin = "select * from customers where customer_id='$edit_id'";

$run_admin = mysqli_query($con,$get_admin);

$row_admin = mysqli_fetch_array($run_admin);

$user_id = $row_admin['customer_id'];

$full_name = $row_admin['full_name'];

$username = $row_admin['username'];

$user_email = $row_admin['customer_email'];

$user_pass = $row_admin['customer_pass'];

$user_address = $row_admin['customer_address'];

$user_contact = $row_admin['customer_contact'];

}



?>


<div class="row" ><!-- 1  row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<ol class="breadcrumb" ><!-- breadcrumb Starts -->

<li class="active" >

<i class="fa fa-dashboard" ></i> Dashboard / Edit Profile

</li>



</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1  row Ends -->

<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" >

<i class="fa fa-money fa-fw" ></i> Edit Profile

</h3>


</div><!-- panel-heading Ends -->


<div class="panel-body"><!-- panel-body Starts -->

<form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">User Full Name: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="text" name="full_name" class="form-control" required value="<?php echo $full_name; ?>">

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">Username: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="text" name="username" class="form-control" required value="<?php echo $username; ?>">

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">User Email: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="text" name="user_email" class="form-control" required value="<?php echo $user_email; ?>">

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">User Address: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="text" name="user_address" class="form-control" required value="<?php echo $user_address; ?>">

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">User Contact: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="text" name="user_contact" class="form-control" required value="<?php echo $user_contact; ?>">

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->




<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label"></label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="submit" name="update" value="Update User" class="btn btn-primary form-control">

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->


</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->


</div><!-- 2 row Ends -->

<?php

if(isset($_POST['update'])){


$full_name = $_POST['full_name'];

$user_email = $_POST['user_email'];

$user_address = $_POST['user_address'];

$username = $_POST['username'];

$user_contact = $_POST['user_contact'];

$user_pass = password_hash($user_pass, PASSWORD_DEFAULT); // hash the plaintext password given

$update_admin = "update customers set full_name = '$full_name', username = '$username', customer_email = '$user_email',customer_address = '$user_address',customer_contact = '$user_contact' where customer_id = '$user_id'";

$run_admin = mysqli_query($con,$update_admin);


if($run_admin){

echo "<script>alert('One User Has Been Updated successfully')</script>";

echo "<script>window.open('index.php?view_users','_self')</script>";

}
}
?>



<?php }  ?>
