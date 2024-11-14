<?php
include "connection.php"; // PostgreSQL connection

$product_id = $_GET['id'];

// Prepare the DELETE query for PostgreSQL
$sql = "DELETE FROM product WHERE product_id = $1";

// Use pg_query_params for parameterized queries to avoid SQL injection
$result = pg_query_params($con, $sql, array($product_id));

if ($result) {
    header("Location: products.php");
} else {
    echo "<p style='color:red;margin: 10px 0;'>Can't Delete the Product Record.</p>";
}

// Close the connection
pg_close($con);
?>
