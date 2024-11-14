<?php
include "connection.php"; // Including the PostgreSQL connection

$herb_id = $_GET['id'];

// Prepare the DELETE query for PostgreSQL
$sql = "DELETE FROM herb WHERE herb_id = $1";

// Use pg_query_params for parameterized queries to avoid SQL injection
$result = pg_query_params($con, $sql, array($herb_id));

if ($result) {
    header("location:herbs.php");
} else {
    echo "<p style='color:red;margin: 10px 0;'>Can't Delete the Herb Record.</p>";
}

// Close the connection
pg_close($con);
?>
