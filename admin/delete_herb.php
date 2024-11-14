<?php
include "connection.php";
$herb_id=$_GET['id'];
$sql="DELETE FROM herb WHERE herb_id=$herb_id";
if(mysqli_query($con, $sql))
{
 header("location:herbs.php");
}else{
 echo "<p style='color:red;margin: 10px 0;'>Can'\t Delete the User Record.</p>";
}
mysqli_close($con);
?>