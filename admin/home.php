<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Admin Home</title>
    
    <!-- Favicon -->
    <link rel="icon" href="img/favicon.ico">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheets -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    
    <!-- Libraries Stylesheet -->
    <link rel="stylesheet" href="lib/animate/animate.min.css">
    <link rel="stylesheet" href="lib/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    
    <!-- jQuery, Popper, Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Navbar Start -->
    <div class="container-xxl position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
            <a href="" class="navbar-brand p-0">
                <h2 class="text-primary m-0">
                    <img src="img/logo.png" width="85" height="85" alt="Logo">&nbsp;Ayurveda
                </h2>
            </a>
            <span><h3 class="text-primary m-0">| Admin |</h3></span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0 pe-4">
                    <a href="home.php" class="nav-item nav-link active">Home</a>
                    <a href="products.php" class="nav-item nav-link">Products</a>
                    <a href="herbs.php" class="nav-item nav-link">Herbs</a>
                    <a href="stores.php" class="nav-item nav-link">Stores</a>
                    <a href="users.php" class="nav-item nav-link">Users</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Account</a>
                        <div class="dropdown-menu m-0">
                            <?php
                                include('connection.php');
                                session_start();
                                if (isset($_SESSION['username'])) {
                                    echo '<a href="logout.php"><button class="dropdown-item">Logout</button></a>';
                                } else {
                                    echo '<a href="login.php"><button class="dropdown-item">Login</button></a>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    <!-- Hero Section Start -->
    <div class="container-xxl py-5 bg-dark hero-header mb-5">
        <div class="container my-5 py-5">
            <div class="row align-items-center g-5">
                <div class="col-lg-7 text-center text-lg-start">
                    <h2 class="display-4 text-white animated slideInLeft">&nbsp;Ayurveda</h2>
                    <h5 class="display-6 text-white animated slideInLeft">&nbsp;The Science of Life</h5>
                </div>
                <div class="col-lg-5 text-center text-lg-end overflow-hidden">
                    <img class="img-fluid" src="img/spinner.png" width="500" height="500" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Section End -->
</body>
</html>
