<?php
include "connection.php"; // PostgreSQL connection

$username = $_GET['id'];

// Prepare the DELETE query for PostgreSQL
$sql = "DELETE FROM register WHERE username = $1";

// Use pg_query_params to prevent SQL injection and execute the query
$result = pg_query_params($con, $sql, array($username));

if ($result) {
    header("Location: users.php");
} else {
    echo "<p style='color:red;margin: 10px 0;'>Can't Delete the User Record.</p>";
}

// Close the PostgreSQL connection
pg_close($con);
?>
