<?php
include "connection.php";
$id=$_GET['id'];
$sql="DELETE FROM stores WHERE id='$id'";
if(mysqli_query($con, $sql))
{
 header("location:stores.php");
}else{
 echo "<p style='color:red;margin: 10px 0;'>Can'\t Delete the User Record.</p>";
}
mysqli_close($con);
?>