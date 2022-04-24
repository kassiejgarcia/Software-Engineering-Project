<?php
/* This file is where we view the details of every individual product. It takes in the product url stored in the database which
correlates to the product. If there is a match, then we will showcase all the details of the product */
session_start();

include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");

?>

<?php


$product_id = @$_GET['pro_id'];

$get_product = "select * from products where product_url='$product_id'";

$run_product = mysqli_query($con,$get_product);

$check_product = mysqli_num_rows($run_product);
// if there is no match, redirect user to the homepage
if($check_product == 0){

echo "<script> window.open('index.php','_self') </script>";

}
else{
// if there is a match


$row_product = mysqli_fetch_array($run_product);
// assign the variables of the product from the DB
$p_cat_id = $row_product['p_cat_id']; // this is the product categorie id (tea->!matcha!)

$pro_id = $row_product['product_id'];

$pro_title = $row_product['product_title']; // product title

$pro_price = $row_product['product_price']; //product price

$pro_desc = $row_product['product_desc']; //product description

$pro_quantity = $row_product['product_quantity']; //product quantity
$pro_img1 = $row_product['product_img1']; //product image

$pro_img2 = $row_product['product_img2']; //image if any 

$pro_img3 = $row_product['product_img3']; //image if any

$pro_label = $row_product['product_label']; // is it on Sale?

$pro_psp_price = $row_product['product_psp_price']; // Sale price if given

$status = $row_product['status']; //****** is it a product or a bundle?????

$pro_url = $row_product['product_url']; // this is a product identifier used to access this page

//if the product is on sale
if($pro_label == "Sale" or $pro_label == "sale"){
$product_label = "
<a class='label sale' href='#' style='color:black;'>
<div class='thelabel'>$pro_label</div>
<div class='label-background'> </div>
</a>
";
}

$get_p_cat = "select * from product_categories where p_cat_id='$p_cat_id'";

$run_p_cat = mysqli_query($con,$get_p_cat);

$row_p_cat = mysqli_fetch_array($run_p_cat);

$p_cat_title = $row_p_cat['p_cat_title'];

?>

<div id="content" ><!-- content Starts -->
<div class="container" ><!-- container Starts -->



<div class="col-md-12"><!-- col-md-12 Starts -->

<div class="row" id="productMain"><!-- row Starts -->

<div class="col-sm-6"><!-- col-sm-6 Starts -->

<div id="mainImage"><!-- mainImage Starts -->
 <!-- showcase the carousel of product images -->

<div id="myCarousel" class="carousel slide" data-ride="carousel">

<ol class="carousel-indicators"><!-- carousel-indicators Starts -->

<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
<li data-target="#myCarousel" data-slide-to="1"></li>
<li data-target="#myCarousel" data-slide-to="2"></li>

</ol><!-- carousel-indicators Ends -->

<div class="carousel-inner"><!-- carousel-inner Starts -->

<div class="item active">
<center>
<img src="admin_area/product_images/<?php echo $pro_img1; ?>" class="img-responsive">
</center>
</div>

<div class="item">
<center>
<img src="admin_area/product_images/<?php echo $pro_img2; ?>" class="img-responsive">
</center>
</div>

<div class="item">
<center>
<img src="admin_area/product_images/<?php echo $pro_img3; ?>" class="img-responsive">
</center>
</div>

</div><!-- carousel-inner Ends -->

<a href="#myCarousel" class="left carousel-control" data-slide="prev"><!-- left carousel-control Starts -->

<span class="glyphicon glyphicon-chevron-left"> </span>

<span class="sr-only"> Previous </span>

</a><!-- left carousel-control Ends -->

<a class="right carousel-control" href="#myCarousel" data-slide="next"><!-- right carousel-control Starts -->

<span class="glyphicon glyphicon-chevron-right"> </span>

<span class="sr-only"> Next </span>

</a><!-- right carousel-control Ends -->

</div>

</div><!-- mainImage Ends -->

<?php echo $product_label; ?>

</div><!-- col-sm-6 Ends -->


<div class="col-sm-6" ><!-- col-sm-6 Starts -->

<div class="box" ><!-- box Starts -->

<h1 class="text-center" > <?php echo $pro_title; ?> </h1>

<?php
// add to cart functionality

if(isset($_POST['add_cart'])){

$ip_add = getRealUserIp();

$p_id = $pro_id;

$product_qty = $_POST['product_qty'];

$check_product = "select * from cart where ip_add='$ip_add' AND p_id='$p_id'";

$run_check = mysqli_query($con,$check_product);
// redirect the user back to the page
if(mysqli_num_rows($run_check)>0){

echo "<script>alert('Product already added to cart')</script>";

echo "<script>window.open('http://ec2-54-172-16-142.compute-1.amazonaws.com/details.php?pro_id=$pro_url','_self')</script>";

}
else {

$get_price = "select * from products where product_id='$p_id'";

$run_price = mysqli_query($con,$get_price);

$row_price = mysqli_fetch_array($run_price);

$pro_price = $row_price['product_price'];

$pro_psp_price = $row_price['product_psp_price'];

$pro_label = $row_price['product_label'];

if($pro_label == "Sale" or $pro_label == "sale"){

$product_price = $pro_psp_price;

}
else{

$product_price = $pro_price;

}

$query = "insert into cart (p_id,ip_add,qty,p_price) values ('$p_id','$ip_add','$product_qty','$product_price')";

$run_query = mysqli_query($db,$query);
// refresh the homepage
 echo "<script>alert('Product added to your cart.')</script>";

echo "<script>window.open('http://ec2-54-172-16-142.compute-1.amazonaws.com/details.php?pro_id=$pro_url','_self')</script>";

}

}


?>
<!-- display the product form on the right -->
<form action="" method="post" class="form-horizontal" ><!-- form-horizontal Starts -->


<div class="form-group"><!-- form-group Starts -->
 <label class="col-md-5 control-label"> Product Description </label>
 <div id = "description">
<?php echo "<p>$pro_desc<hr></p>"; ?>
</div>
<label class="col-md-5 control-label" style= "margin-bottom: 0;"> In Stock </label>
<div id = "description">
<?php echo "<p>$pro_quantity<hr></p>"; ?>
</div>
<label class="col-md-5 control-label">Product Quantity </label>

<div class="col-md-7" ><!-- col-md-7 Starts -->
<p>
<select name="product_qty" class="form-control" >

<option>Select quantity</option>
<option>1</option>
<option>2</option>
<option>3</option>


</select>
</p>
</div><!-- col-md-7 Ends -->

</div><!-- form-group Ends -->

<?php

// if the product is labeled as for sale, display the sale price
if($pro_label == "Sale" or $pro_label == "sale"){

echo "
<p class='price'>
Product Price : <del> $$pro_price </del><br>
Product sale Price : $$pro_psp_price
</p>
";

}
else{

echo "
<p class='price'>
Product Price : $$pro_price
</p>
";

}


?>



<p class="text-center buttons" ><!-- text-center buttons Starts -->

<button class="btn btn-danger" type="submit" name="add_cart">

<i class="fa fa-shopping-cart" ></i> Add to Cart

</button>

<button class="btn btn-warning" type="submit" name="add_wishlist">

<i class="fa fa-heart" ></i> Add to Wishlist

</button>


<?php
// if the user wants to add the product to their wish list
if(isset($_POST['add_wishlist'])){
// if the user is not logged in, then they cannot add the product to a list
if(!isset($_SESSION['customer_email'])){

echo "<script>alert('Please Sign in to add product in wishlist')</script>";

echo "<script>window.open('checkout.php','_self')</script>";

}
else{
// add the product to the wishlist
$customer_session = $_SESSION['customer_email'];

$get_customer = "select * from customers where customer_email='$customer_session'";

$run_customer = mysqli_query($con,$get_customer);

$row_customer = mysqli_fetch_array($run_customer);

$customer_id = $row_customer['customer_id'];

$select_wishlist = "select * from wishlist where customer_id='$customer_id' AND product_id='$pro_id'";

$run_wishlist = mysqli_query($con,$select_wishlist);

$check_wishlist = mysqli_num_rows($run_wishlist);
// if the product is already within the wishlist, the user cannot add the product again
if($check_wishlist == 1){

echo "<script>alert('Product is already in wishlist')</script>";

echo "<script>window.open('http://ec2-54-172-16-142.compute-1.amazonaws.com/details.php?pro_id=$pro_url','_self')</script>";

}
else{

$insert_wishlist = "insert into wishlist (customer_id,product_id) values ('$customer_id','$pro_id')";

$run_wishlist = mysqli_query($con,$insert_wishlist);
// insert the product into the wishlist successfully 
if($run_wishlist){

echo "<script> alert('Product is successfully inserted into wishlist') </script>";

echo "<script>window.open('http://ec2-54-172-16-142.compute-1.amazonaws.com/details.php?pro_id=$pro_url','_self')</script>";

}

}

}

}

?>

</p><!-- text-center buttons Ends -->

</form><!-- form-horizontal Ends -->

</div><!-- box Ends -->
<!-- display all the images for the product at the bottom of the product view form -->

<div class="row" id="thumbs" ><!-- row Starts -->

<div class="col-xs-4" ><!-- col-xs-4 Starts -->

<a href="#" class="thumb" >

<img src="admin_area/product_images/<?php echo $pro_img1; ?>" class="img-responsive" >

</a>

</div><!-- col-xs-4 Ends -->

<div class="col-xs-4" ><!-- col-xs-4 Starts -->

<a href="#" class="thumb" >

<img src="admin_area/product_images/<?php echo $pro_img2; ?>" class="img-responsive" >

</a>

</div><!-- col-xs-4 Ends -->

<div class="col-xs-4" ><!-- col-xs-4 Starts -->

<a href="#" class="thumb" >

<img src="admin_area/product_images/<?php echo $pro_img3; ?>" class="img-responsive" >

</a>

</div><!-- col-xs-4 Ends -->


</div><!-- row Ends -->


</div><!-- col-sm-6 Ends -->


</div><!-- row Ends -->
<div class =""> <!-- similar products start -->
<div id="row same-height-row"><!-- row same-height-row Starts -->

<div class="col-md-3 col-sm-6"><!-- col-md-3 col-sm-6 Starts -->

<h3 class="text-center"> Check out these Similar Products: </h3>


</div><!-- col-md-3 col-sm-6 Ends -->

<?php
/* display recommended products at the bottom of the product view details page */
$get_products = "select * from products order by rand() LIMIT 0,3";

$run_products = mysqli_query($con,$get_products);

while($row_products = mysqli_fetch_array($run_products)) {

$pro_id = $row_products['product_id'];

$pro_title = $row_products['product_title'];

$pro_price = $row_products['product_price'];

$pro_img1 = $row_products['product_img1'];

$pro_label = $row_products['product_label'];
/*********** manufacture functionality 
$manufacturer_id = $row_products['manufacturer_id'];

$get_manufacturer = "select * from manufacturers where manufacturer_id='$manufacturer_id'";

$run_manufacturer = mysqli_query($db,$get_manufacturer);

$row_manufacturer = mysqli_fetch_array($run_manufacturer);

$manufacturer_name = $row_manufacturer['manufacturer_title'];
 */
$pro_psp_price = $row_products['product_psp_price'];

$pro_url = $row_products['product_url'];


if($pro_label == "Sale" or $pro_label == "sale"){

$product_price = "<del> $$pro_price </del>";

$product_psp_price = "| $$pro_psp_price";

}
else{

$product_psp_price = "";

$product_price = "$$pro_price";

}


if($pro_label == "NULL"){
}
else{

$product_label = "
<a class='label sale' href='#' style='color:black;'>
<div class='thelabel'>$pro_label</div>
<div class='label-background'> </div>
</a>
";

}


echo "
<div class='col-md-3 col-sm-6 center-responsive' >
<div class='product' >
<a href='details.php?pro_id=$pro_url' >
<img src='admin_area/product_images/$pro_img1' class='similar-product' >
</a>
<div class='text' >
<!-- ************************<center>
<p class='btn btn-warning'> $manufacturer_name </p>
</center> -->
<hr>
<h3><a href='details.php?pro_id=$pro_url' >$pro_title</a></h3>
<p class='price' > $product_price $product_psp_price </p>
<p class='buttons' >
<a href='details.php?pro_id=$pro_url' class='btn btn-default' >View Details</a>
<a href='details.php?pro_id=$pro_url' class='btn btn-danger'>
<i class='fa fa-shopping-cart'></i> Add To Cart
</a>
</p>
</div>";
if($pro_label == 'Sale' or $pro_label == 'sale'){
	echo "$product_label";
}
echo"
</div>
</div>
";


}


?>




</div><!-- row same-height-row Ends -->

</div><!-- col-md-12 Ends -->

</div> <!-- similar-products ends -->
</div><!-- container Ends -->
</div><!-- content Ends -->



<?php

include("includes/footer.php");

?>

<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>

</body>
</html>

<?php } ?>
