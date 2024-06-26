<?php
include "connection.php";
$username=$_GET['id'];
$sql="DELETE FROM register WHERE username='$username'";
if(mysqli_query($con, $sql))
{
 header("location:users.php");
}else{
 echo "<p style='color:red;margin: 10px 0;'>Can'\t Delete the User Record.</p>";
}
mysqli_close($con);
?>