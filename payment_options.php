<div class="box"><!-- box Starts -->

<?php

$session_email = $_SESSION['customer_email'];

$select_customer = "select * from customers where customer_email='$session_email'";

$run_customer = mysqli_query($con,$select_customer);

$row_customer = mysqli_fetch_array($run_customer);

$customer_id = $row_customer['customer_id'];


?>


<p class="lead text-center">

<a href="order.php?c_id=<?php echo $customer_id; ?>" style = "font-size: 30px; color: #18236b;">Click Here to Place Order</a>

</p>
<h1 class="text-center" style = "font-size: 21px; ">Payment Options For You</h1>
<center><!-- center Starts -->
<!--
  <form action="" method="post" target="_top">
  <input type="hidden" name="cmd" value="_s-xclick">
  <input type="hidden" name="hosted_button_id" value="9PWJZYVQH8KGU">
-->  
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
 <!-- </form> -->


<?php

$i = 0;


$ip_add = getRealUserIp();

$get_cart = "select * from cart where ip_add='$ip_add'";

$run_cart = mysqli_query($con,$get_cart);

while($row_cart = mysqli_fetch_array($run_cart)){

$pro_id = $row_cart['p_id'];

$pro_qty = $row_cart['qty'];

$pro_price = $row_cart['p_price'];

$get_products = "select * from products where product_id='$pro_id'";

$run_products = mysqli_query($con,$get_products);

$row_products = mysqli_fetch_array($run_products);

$product_title = $row_products['product_title'];

$i++;

?>


<input type="hidden" name="item_name_<?php echo $i; ?>" value="<?php echo $product_title; ?>" >

<input type="hidden" name="item_number_<?php echo $i; ?>" value="<?php echo $i; ?>" >

<input type="hidden" name="amount_<?php echo $i; ?>" value="<?php echo $pro_price; ?>" >

<input type="hidden" name="quantity_<?php echo $i; ?>" value="<?php echo $pro_qty; ?>" >


<?php } ?>

<img width="500" height="270" src="images/paypal.png" >


</form><!-- form Ends -->

</center><!-- center Ends -->

</div><!-- box Ends -->
