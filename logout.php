<?php
session_start(); // Start the session
$_SESSION['username'] = ''; // Optionally unset the session variable (clear it)
session_destroy(); // Destroy the session
header('Location: index.php'); // Redirect to the homepage or login page
exit(); // Ensure that the script stops after redirection
?>
