<?php
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page or any desired page after logout
header("Location: logoutsuccess.html");
exit;
?>
