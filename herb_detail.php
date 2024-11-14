<!DOCTYPE html>
<html lang="en">
<head>
    <title>Herb Detail</title>
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
    <?php
        include('log_reg_modal.php');

        // Fetch database connection details from environment variables
        $host = getenv("DB_HOST");
        $dbname = getenv("DB_NAME");
        $username = getenv("DB_USER");
        $password = getenv("DB_PASSWORD");

        // Establish PostgreSQL connection
        $con = pg_connect("host=$host dbname=$dbname user=$username password=$password");

        if (!$con) {
            die('Could not connect: ' . pg_last_error());
        }

        $sql="SELECT herb_id, herb_image, herb_name, diseases_name, herb_description FROM herb";
        $res=pg_query($con, $sql);
    ?>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <?php include('navbar.php'); ?>
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

        <!-- Msg MODAL -->
        <style>
            .bs-example {
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
        <!-- Msg End -->

        <div class="bs-example">
            <div id="msg_modal_reg" class="modal fade" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">This Page Says...</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <p style="color: red;">This User Already Registered</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Msg End -->

        <!-- Service Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Useful Herbs</h5>
                    <h1 class="mb-5">Explore Our Herbs</h1>
                </div>
                <?php
                    $sql="SELECT * FROM herb WHERE herb_id = '".$_GET['id']."'";
                    $res = pg_query($con, $sql);
                ?>
                <br>
                <div class="row g-4">
                    <?php
                        $row = pg_fetch_assoc($res);
                    ?>
                    <div class="service-item rounded pt-3">
                        <a href="#<?php echo $row['herb_id'];?>">
                            <div class="p-4">
                                <div align="center">
                                    <h1 style="margin-bottom: 40px;"><?php echo $row['herb_name'];?></h1>
                                </div>
                                <div>
                                    <div style="padding-right:100px; float: left;">
                                        <img src="img/<?php echo $row['herb_image'];?>" style="border-radius: 10px;" width="500px" height="400px" class="text-primary mb-4">
                                    </div>
                                    <div style="float: left; padding-left: 10px; height: 500px; width: 460px;">
                                        <div><font size="30px"><h3>Diseases Name</h3></font></div>
                                        <div style="padding-left: 30px; color: orange; font-family: cursive; font-size: 20px;">
                                            <ul><li><?php echo $row['diseases_name'];?></li></ul>
                                        </div><br>

                                        <div><font size="30px"><h3>Description</h3></font></div>
                                        <div style="padding-left: 30px; color: orange; font-family: cursive; font-size: 20px;">
                                            <ul><li><?php echo $row['herb_description'];?></li></ul>
                                        </div><br>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service End -->
        
        <?php include('footer.php'); ?>
    </div>
</body>
</html>
