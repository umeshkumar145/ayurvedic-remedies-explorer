<!DOCTYPE html>
<html lang="en">
<head>
    <title>admin-login</title>
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

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
        $(".btnEdit").click(function(){
        $("#msg2_modal").modal('show');
        });
    });
    </script>
</head>
<body style="margin-top:-20px">
    <?php
        session_start();
        include('connection.php');
        if(isset($_POST['submit_log_in']))
        {              
            $username=$_POST['username'];
            $password=$_POST['password'];
            $query="select * from admin where username='$username' and password='$password'";
            $res=mysqli_query($con, $query);
            $row=mysqli_fetch_assoc($res);
             if ($row>0)
              {
                session_start();
                $_SESSION['username']=$username;
                header("location:home.php");
              }
                else
                    {
                        echo "<script>
                          $(document).ready(function(){
                          $('#msg2_modal').modal('show');
                          $('.close').click(function(){
                          $('#msg2_modal').modal('hide');
                            });
                        });
                        </script>";
                    }
        }
    ?>
    <!--Msg2 MODAL -->
        <style>
            .bs-example{
                margin: 20px;
            }
        </style>
        <div class="bs-example">
            <div id="msg2_modal" class="modal fade" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">This Page Says...</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <p style="color:red;">Wrong Username or Password!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!---MSG End-->

    <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h2 class="text-primary m-0"><img src="img/logo.png" width="85px" height="85px"> &nbsp;Ayurveda</h2>
                </a>
                <span style="margin-left:700px"><h3 class="text-primary m-0">| Admin |</h3></span>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                
                        </div>
                    </div>
                    </div>
                </div>
            </nav>
        </div>


        <div class="container-xxl py-5 bg-dark hero-header mb-5">
            <div class="container my-5 py-5">
                <div class="row align-items-center g-5">
        
            <!-- Login START -->  
                    <div style="height: 370px; width: 600px; margin-left:380px;">
                      <form style="" method="POST" action="">
                        <h3 class="fw-bold mb-3 pb-3" style="letter-spacing: 0px;"><font color="orange"><b>Login Here!</b></font></h3>
                        <div class="form-outline mb-1">
                          <label class="form-label" for="form2Example18"><h4><font color="white">UserId</font></h4></label>
                          <input type="username" required id="form2Example18" name="username" class="form-control form-control-lg" />
                        </div>
                        <div class="form-outline mb-1">
                          <label class="form-label" for="form2Example28"><h4><font color="white">Password</font></h4></label>
                          <input type="password" required minlength="8" id="form2Example28" name="password" class="form-control form-control-lg" />
                        </div>
                        <div class="pt-1 mb-1">
                          <button class="btn btn-info btn-lg btn-block" type="submit" name="submit_log_in" style="background-color: orange;">Login</button>
                          <br>
                        </div>
                      </form>
                    </div>
        <!-- Login END -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->
</body>
</html>

