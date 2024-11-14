

<?php

$host = getenv("DB_HOST");
$dbname = getenv("DB_NAME");
$username = getenv("DB_USER");
$password = getenv("DB_PASSWORD");

// Example of setting up a PostgreSQL connection with these variables
$con = pg_connect("host=$host dbname=$dbname user=$username password=$password");

if (!$con) {
    die("Connection failed: " . pg_last_error());
}


// PostgreSQL connection details from Render
$host = "dpg-csqdit0gph6c73earqh0-a.oregon-postgres.render.com"; // Render hostname
$dbname = "our_ayurved_5kfz"; // Render database name
$user = "our_ayurved_5kfz_user"; // Render username
$password = "QWsqboavUNsSvFRnHNW0h34RtOv2oK2m"; // Render password

// Create a PostgreSQL connection
$con = pg_connect("host=$host dbname=$dbname user=$user password=$password");

if (!$con) {
    die("Connection failed: " . pg_last_error());
} else {
    echo "Connected successfully to PostgreSQL database";
}
?>
