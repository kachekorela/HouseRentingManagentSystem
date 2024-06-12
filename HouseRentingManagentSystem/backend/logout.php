<?php
session_start();

// Unset all of the session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the homepage or any other page you want
header("location: ../index.php"); // Change 'index.php' to your desired homepage or login page
exit();
?>
