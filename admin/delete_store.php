<?php
include "connection.php"; // PostgreSQL connection

$id = $_GET['id'];

// Prepare the DELETE query for PostgreSQL
$sql = "DELETE FROM stores WHERE id = $1";

// Use pg_query_params for parameterized queries to prevent SQL injection
$result = pg_query_params($con, $sql, array($id));

if ($result) {
    header("Location: stores.php");
} else {
    echo "<p style='color:red;margin: 10px 0;'>Can't Delete the Store Record.</p>";
}

// Close the connection
pg_close($con);
?>
