<?php
session_start(); // Start the session
session_unset(); // Clear all session variables
session_destroy(); // Destroy the session

// Redirect the user to login.php
header('Location: login.php');
exit;
?>
