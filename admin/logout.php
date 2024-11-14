 <?php
  session_start();
  $_SESSION['username']='';
  session_destroy();
  //header('location:login.php');
  echo "<script>window.location.href='login.php'</script>";
  ?>

    