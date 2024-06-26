<?php
include "connection.php";
$product_id = $_GET['id'];
$sql = "DELETE FROM product WHERE product_id = {$product_id}";
if(mysqli_query($con, $sql)){
 header("Location:products.php");
}
else
{
 echo "<p style='color:red;margin: 10px 0;'>Can'\t Delete the User Record.</p>";
}
mysqli_close($con);


?>