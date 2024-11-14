<!DOCTYPE html>
<html lang="en">
<head>
    <title>herbs</title>
    <?php
        include('headtags.php');
    ?>
    <script>
        $(document).ready(function(){
        $(".btnEdit").click(function(){
        $("#msg_modal").modal('show');
        });
    });
    </script>
    <script>
        $(document).ready(function(){
        $(".btnEdit").click(function(){
        $("#msg2_modal").modal('show');
        });
    });
    </script>
</head>

<body style="margin-top:-20px">
    <!--SEARCH PHP -->
            <?php
                session_start();
                include("connection.php");
                if(isset($_POST['search']))
                {

                    $kw=$_POST['kw'];
                    $sql="select herb_id,herb_image,herb_name,diseases_name,herb_description from herb where herb_name like '%".$kw."%' or diseases_name like '%".$kw."%' or herb_description like '%".$kw."%'";

                }
                else
                {
                    if(isset($_GET['view']))
                    {
                        $sql="select herb_id,herb_image,herb_name,diseases_name,herb_description from herb";
                    }
                    else
                    {
                        $sql="select herb_id,herb_image,herb_name,diseases_name,herb_description from herb limit 8";
                    }
                }
                $res=mysqli_query($con,$sql);
            ?>
    <div class="container-xxl bg-white p-0">
        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <?php
             include('navbar.php');
            ?>
        <!-- LOGIN MODAL Start-->
    <?php
          if(isset($_POST['submit_login']))
          {   
            $con= mysqli_connect('localhost','root','','our_ayurved');
            if (!$con)
            {
              die('Could not connect:'.mysqli_error());
            }
           
          $username=$_POST['username'];
          $password=$_POST['password'];
            $query="select * from register where username='$username' and password='$password'";
            $res=mysqli_query($con, $query);
            $row=mysqli_fetch_assoc($res);
             if ($row>0)
              {
                //session_start();
                $_SESSION['username']=$username;
                //header("location:index.php");
                echo "<script>window.location.href='index.php'</script>";
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
            mysqli_close($con);
        }
        if(isset($_POST['submit_register']))
            {   
                try
                {
                $con= mysqli_connect('localhost','root','','our_ayurved');
                if (!$con)
                {
                    die('Could not connect:'.mysqli_error());
                 }
                $name=$_POST['name'];
                $username=$_POST['username'];
                $password=$_POST['password'];
                $confirm=$_POST['confirm'];
                $query="insert into register values('$name','$username','$password','$confirm')";
                $res=mysqli_query($con, $query);
                 if ($res)
                  {
                  echo "<script>
                      $(document).ready(function(){
                      $('#msg_modal').modal('show');
                      $('.close').click(function(){
                      $('#msg_modal').modal('hide');
                        });
                    });
                    </script>";
                  }
                 else
                  {
                    echo "Registration Failed";
                  }
                mysqli_close($con);
            }
            catch (Exception $e) {
                echo "<script>
                      $(document).ready(function(){
                      $('#msg_modal_reg').modal('show');
                      $('.close').click(function(){
                      $('#msg_modal_reg').modal('hide');
                        });
                    });
                    </script>"; 
                 }  
             }
    ?>
    <!--Msg MODAL -->
        <style>
            .bs-example{
                margin: 20px;
            }
        </style>
    
        <div class="bs-example">
            <div id="msg_modal" class="modal fade" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">This Page Says...</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <p style="color: green;">Registered Successfully!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!---MSG End-->
        <!---MSG -->
        <div class="bs-example">
            <div id="msg_modal_reg" class="modal fade" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">This Page Says...</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <p style="color:red;">This User Already Registered!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!---MSG End-->
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
     <div class="modal fade" id="log_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color:black;">
                    <h3><font color="orange"><b>Ayurveda</b></font></h3>
                    <button type="button" class="close" data-dismiss="modal"> &times;</button>
                </div>
                    <div class="modal-body">
                          <form style="" method="POST" action="herbs.php">
                            <h5 class="fw-bold mb-1 pb-1" style="letter-spacing: 0px;"><font color="orange"><b>Login Here!</b></font></h3>
                            <div class="form-outline mb-4">
                              <label class="form-label" for="form2Example18">UserId</label>
                              <input type="email" name="username" id="form2Example18" class="form-control form-control-lg" />
                            </div>
                            <div class="form-outline mb-4">
                              <label class="form-label" for="form2Example28">Password</label>
                              <input type="password" name="password" id="form2Example28" class="form-control form-control-lg" />
                            </div>
                            <div class="pt-1 mb-4">
                              <button class="btn btn-info btn-lg btn-block" type="submit" name="submit_login" style="background-color: orange;">Login</button>
                            </div>
                           <!--<p class="small mb-5 pb-lg-2"><a class="text-dark" href="forgetpassword.php">Forgot Password?</a></p>
                            <p>Don't have an account? <a href="register.php"><font color="orange">Register Here</font></a></p>-->
                          </form>
                    </div>
            </div>
        </div>
    </div>
    <!-- LOGIN END-->

    <!-- REGISTER START -->
    <div class="modal fade" id="reg_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color:black;">
                    <h3><font color="orange"><b>Ayurveda</b></font></h3>
                    <button type="button" class="close" data-dismiss="modal"> &times;</button>
                </div>
                    <div class="modal-body">  
                      <form style="" method="POST" action="">
                        <h3 class="fw-bold mb-3 pb-3" style="letter-spacing: 0px;"><font color="orange"><b>Register Here!</b></font></h3>
                        <div class="form-outline mb-1">
                          <label class="form-label" for="form2Example18">Name</label>
                          <input type="text" required id="form2Example18" name="name" class="form-control form-control-lg" />
                        </div>
                        <div class="form-outline mb-1">
                          <label class="form-label" for="form2Example18">UserId</label>
                          <input type="email" required id="form2Example18" name="username" class="form-control form-control-lg" />
                        </div>
                        <div class="form-outline mb-1">
                          <label class="form-label" for="form2Example28">Password</label>
                          <input minlength="8" type="password" required id="form2Example28" name="password" class="form-control form-control-lg" />
                        </div>
                        <div class="form-outline mb-1">
                          <label class="form-label" for="form2Example28">Confirm Password</label>
                          <input minlength="8"type="password" required id="form2Example28" name="confirm" class="form-control form-control-lg" />
                        </div>
                        <div class="pt-1 mb-1">
                          <button class="btn btn-info btn-lg btn-block" type="submit" name="submit_register" style="background-color: orange;">Register</button>
                          <br>
                        </div>
                      </form>
                  </div>
            </div>
        </div>
    </div>

    <!-- REGISTER END -->
            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Herbs</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Herbs</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Service Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Useful Herbs</h5>
                    <h1 class="mb-5">Explore Our Herbs</h1>
                </div>

                <!-- SEARCH BOX -->
                <form method="POST">
                    <div class="input-group">
                      <input type="text" name="kw" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                      <button type="submit" name="search" class="btn btn-outline-primary">search</button>
                    </div>
                </form>
                <br>
                <div class="row g-4">
                    <?php
                        while( $row=mysqli_fetch_assoc($res))
                        {
                                 
                        ?>
                  <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item rounded pt-3">
                            <a href="herb_detail.php?id=<?php echo $row['herb_id'];?>">  
                            <div class="p-3">
                              <center>  <img src="img/<?php echo $row['herb_image'];?>" style="border-radius: 10px; ;" width="125px" height=100px class=" text-primary mb-4"></i></center>
                                <h5 align="center"><?php echo $row['herb_name'];?></h5>
                                <p align="center"><?php echo $row['diseases_name'];?></p>
                            </div>
                            </a>
                        </div>
                    </div>
                    <?php
                    }
            
                if(!isset($_GET['view']) && !isset($_POST['search']))
                {
                ?>
                <a href="herbs.php?view=all" style="width: 150px; height: 40px; margin-left: 970px;"  class="btn btn-primary py-2 px-4">View More</a>
                <?php
                 }
                 ?>
                </div>
            </div>
        </div>
        <!-- Service End -->
        
        <?php
            include('footer.php')
        ?>
</body>

</html>