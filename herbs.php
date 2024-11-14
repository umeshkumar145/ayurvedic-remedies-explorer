<!DOCTYPE html>
<html lang="en">
<head>
    <title>Herbs</title>
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
</head>

<body style="margin-top:-20px">
    <!--SEARCH PHP -->
    <?php
        include("connection.php");

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

        // Handle search query
        if (isset($_POST['search'])) {
            $kw = $_POST['kw'];
            $sql = "SELECT herb_id, herb_image, herb_name, diseases_name, herb_description FROM herb WHERE herb_name LIKE '%$kw%' OR diseases_name LIKE '%$kw%' OR herb_description LIKE '%$kw%'";
        } else {
            if (isset($_GET['view'])) {
                $sql = "SELECT herb_id, herb_image, herb_name, diseases_name, herb_description FROM herb";
            } else {
                $sql = "SELECT herb_id, herb_image, herb_name, diseases_name, herb_description FROM herb LIMIT 8";
            }
        }

        $res = pg_query($con, $sql);
    ?>
    <div class="container-xxl bg-white p-0">
        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <?php include('navbar.php'); ?>

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
                          <button type="submit" name="search" class="btn btn-outline-primary">Search</button>
                        </div>
                    </form>
                    <br>
                    <div class="row g-4">
                        <?php
                            while ($row = pg_fetch_assoc($res)) {
                        ?>
                        <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="service-item rounded pt-3">
                                <a href="herb_detail.php?id=<?php echo $row['herb_id'];?>">
                                    <div class="p-3">
                                        <center>  
                                            <img src="img/<?php echo $row['herb_image'];?>" style="border-radius: 10px;" width="125px" height="100px" class=" text-primary mb-4">
                                        </center>
                                        <h5 align="center"><?php echo $row['herb_name'];?></h5>
                                        <p align="center"><?php echo $row['diseases_name'];?></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php
                            }
                        ?>

                        <?php
                        if (!isset($_GET['view']) && !isset($_POST['search'])) {
                        ?>
                        <a href="herbs.php?view=all" style="width: 150px; height: 40px; margin-left: 970px;" class="btn btn-primary py-2 px-4">View More</a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service End -->

        <?php include('footer.php'); ?>
    </div>
</body>
</html>
