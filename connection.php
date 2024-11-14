<?php
// Fetch database connection details from environment variables
$host = getenv("DB_HOST");  // Example: dpg-csqdit0gph6c73earqh0-a.oregon-postgres.render.com
$dbname = getenv("DB_NAME");  // Example: our_ayurved_5kfz
$username = getenv("DB_USER");  // Example: our_ayurved_5kfz_user
$password = getenv("DB_PASSWORD");  // Example: your_password

// Establish PostgreSQL connection
$con = pg_connect("host=$host dbname=$dbname user=$username password=$password");

// Check if the connection was successful
if (!$con) {
    die("Connection failed: " . pg_last_error());
} else {
    // Optionally, you can echo this to confirm the connection during development
    echo "Connected successfully to PostgreSQL database";
}
?>
