<?php
// unset the session we created to remember the user that had logged in.
// logging out will then redirect them back to the index page.
session_start();
// unset the session based on the value saved from user id
unset($_SESSION['user_id']);
// redirect user back to index page
header("Location: index.php");
