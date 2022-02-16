<!-- index page for SE Project -->
<!-- Kassie Garcia -->

<html lang = "en-US">
        <head>
                <title>
                        Coffee Shop Name goes here
                </title>
                <!-- this is where we will put any css files we are using -->
                <!-- <link rel="stylesheet" type="text/css" href=""> -->
        </head>

<?php // code for the login / logout / signup logic
// start a session 
session_start();
// if a user is not recognized, give the option to register an account or sign in 
if(empty($_SESSION['user_id'])){
        echo '<a href = "register.php">Register an Account</a>';
        echo '<br>';
        echo '<a href = "login.php">Sign Into Your Account</a>';
        $account_settings_page = false;
}
// if a user is recognized, give the option to go to the account settings page or log out
if(!empty($_SESSION['user_id'])){
        echo '<a href = "logout.php">Logout</a>';
        echo '<br>';
        $account_settings_page = true;
        echo '<a href = "account_settings_page.js">Access Account Settings</a>';
}
/* ^^^^ Here, we can change the code a bit to where we can have Logging In / Register as part of a menu, or where we could have an image of a person which references "account" settings such as login logout register */

// use php to determine if the account_settings_ page should be hidden or not
// for security reasons, we would hide any pages from unauthorized users here
?>
<body>
                <!-- Index Page content -->
        </body>
</html>
