</head>

<body>

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    

  <header class="page-header">
    <!-- topline -->
    <div class="page-header__topline">
      <div class="container clearfix">

	<div class="currency">
	  <a class="currency__change" href="customer/my_account.php?my_orders">
	 
<?php
/*if(!isset($_SESSION['customer_email'])){
	echo "Welcome :Guest"; 
}
else
{ 
	echo "Welcome : " . $_SESSION['customer_email'] . "";
}
*/?>
	  </a>
	</div>
	<div class="basket">
	  <a href="cart.php" class="btn btn--basket">
	    <i class="icon-basket"></i>
	    <?php items(); ?> items
	  </a>
	</div>
 

	<ul class="login">

<li class="login__item">
<?php
// if the customer is not logged in, show them the register page
// if the customer is logged in, show them the account page
if(!isset($_SESSION['customer_email'])){
	echo '<a href="customer_register.php" class="login__link">Register</a>';
} 
else
{ 
	echo '<a href="customer/my_account.php?my_orders" class="login__link">My Account</a>';
}   
?>  
</li>


<li class="login__item">
<?php
// if the customer is not logged in, show then the sign in page
// if the customer is logged in, show them the logout page
if(!isset($_SESSION['customer_email'])){
	echo '<a href="checkout.php" class="login__link">Sign In</a>';
} 
else
{ 
	echo '<a href="./logout.php" class="login__link">Logout</a>';
}   
?>  

</li>
</ul>

      </div>
    </div>
    <!-- bottomline -->
    <div class="page-header__bottomline">
      <div class="container clearfix">

	<div class="logo">
	  <a class="logo__link" href="index.php">
	    <img class="logo__img" src="images/main_page_logo.png" alt="Hug With Mug Coffee Company" width="450" height="23">
	  </a>
	</div>

	<nav class="main-nav">
	  <ul class="categories">

	    <li class="categories__item">
	      <a class="categories__link" href="shop.php?page=1&cat[]=1&"> <!-- LINK THE COFFEE.PHP page here to display it -->
		Coffee

	      </a>
	      </li>

	    <li class="categories__item">
	      <a class="categories__link" href="shop.php?page=1&cat[]=2&"> <!-- LINK THE TEAS.PHP page here to display it -->
		Tea

	      </a>
	    </li>

	    <li class="categories__item">
	      <a class="categories__link" href="shop.php?page=1&cat[]=3&"> <!--LINK THE ACCESSORIES.PHP page here to display it -->
		Merch

	      </a>
	    </li>

	    <li class="categories__item">
	      <a class="categories__link categories__link--active" href="shop.php">
		Shop All
	      </a>
	    </li>

<?php
// if the customer has signed in, allow them to view the my account menu
// if the customer is not signed in, do not show them this menu
if (isset($_SESSION['customer_email'])){
echo '<li class="categories__item">
	      <a class="categories__link" href="customer/my_account.php?my_orders">
		My Account
		<i class="icon-down-open-1"></i>
	      </a>
	      <div class="dropdown dropdown--lookbook">
		<div class="clearfix">
		  <div class="dropdown__half">
		    <div class="dropdown__heading">Account Settings</div>
		    <ul class="dropdown__items">
		      <li class="dropdown__item">
			<a href="customer/my_account.php?my_wishlist" class="dropdown__link">My Wishlist</a>
		      </li>
		      <li class="dropdown__item">
			<a href="customer/my_account.php?my_orders" class="dropdown__link">My Orders</a>
		      </li>
		      <li class="dropdown__item">
			<a href="cart.php" class="dropdown__link">View Shopping Cart</a>
		      </li>
		    </ul>
		  </div>
		  <div class="dropdown__half">
		    <div class="dropdown__heading"></div>
		    <ul class="dropdown__items">
		      <li class="dropdown__item">
			<a href="customer/my_account.php?change_pass" class="dropdown__link">Change Password</a>
		      </li>
		    </ul>
		  </div>
		</div>


	      </div>

	    </li>';
}?>


	  </ul>
	</nav>
      </div>
    </div>
  </header>
