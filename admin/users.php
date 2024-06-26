<!DOCTYPE html>
<html>
<head>
    <title>admin-users</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <title>Users</title>
</head>
<body>
     <?php
        session_start();
        include("connection.php"); 

        if(!isset($_SESSION['username']))
        {
            header("location:login.php");
        }
          
        $sql="select * from register";
        $res=mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($res);
    ?>
    <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="text-primary m-0"><img src="img/logo.png" width="85px" height="85px"> &nbsp;Ayurveda</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="home.php" class="nav-item nav-link">Home</a>
                        <a href="products.php" class="nav-item nav-link">Products</a>
                        <a href="herbs.php" class="nav-item nav-link">Herbs</a>
                        <a href="stores.php" class="nav-item nav-link">Stores</a>
                        <a href="users.php" class="nav-item nav-link active">Users</a>
                        <div class="nav-item dropdown">
                             <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Account</a>
                             <div class="dropdown-menu m-0">
                                <?php
                                //session_start();
                                if(isset($_SESSION['username']))
                                {
                                   
                            ?>
                            <a href="logout.php"><button class="dropdown-item"  data-target="#lgout_modal" data-toggle="modal">Logout</button></a>
                            <?php 
                            }
                            else
                            {
                                ?>
                            <a href="login.php"><button class="dropdown-item" data-target="#log_modal" data-toggle="modal">Login</button></a>
                            <?php
                        }
                        ?>
                            </div>
                    </div>
                </div>
                 </div>
                </div>
            </nav>
        </div>
        <!-- Navbar & Hero End -->

        <!--Edit Content-->
         <div class="container-xxl position-relative p-0">
           <div class="">
            <div><h3>All Users</h3></div>
            
        </div>

          <table class="table">
          <thead class="table-dark">
          <tr>
          <th scope="col">Name</th>
          <th scope="col">Username</th>
          <th scope="col">Password</th>
          <th scope="col">Delete</th>
          </tr>
          </thead>
          <tbody>
           <?php
               while($row=mysqli_fetch_assoc($res))
               {
            ?>
            <tr>
              <td><?php echo $row['name'];?></td>
              <td><?php echo $row['username'];?></td>
              <td><?php echo $row['password'];?></td>
              <td ><a href='delete_user.php?id=<?php echo $row["username"]; ?>'><i  class="fa fa-trash" aria-hidden="true"></i></a></td>
            </tr>
            <?php 
               }
            ?>
            </tr>
          </tbody>
        </table>
    </div>
    <!--/Edit Content-->

</body>
</html>