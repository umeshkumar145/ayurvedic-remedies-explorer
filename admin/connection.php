<?php
$host = 'localhost';
$port = '5432'; // Default PostgreSQL port
$dbname = 'our_ayurved'; // Your PostgreSQL database name
$user = 'our_ayurved_5kfz_user'; // Your PostgreSQL username
$password = 'QWsqboavUNsSvFRnHNW0h34RtOv2oK2m'; // Your PostgreSQL password

// Create the connection string
$connection_string = "host=$host port=$port dbname=$dbname user=$user password=$password";

// Establish the connection
$con = pg_connect($connection_string);

if (!$con) {
	die('Could not connect: ' . pg_last_error());
}
?>
