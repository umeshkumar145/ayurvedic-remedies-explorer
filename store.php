<!DOCTYPE html>
<html lang="en">
<head>
    <title>Stores</title>
    <?php include('headtags.php'); ?>
</head>
<body style="margin-top:-20px">

    <?php
        include('log_reg_modal.php');
        include("connection.php");

        // Fetch all stores
        $sql = "SELECT id, shop_name, shop_image, shop_address FROM stores";
        $res = pg_query($con, $sql);

        if (!$res) {
            echo "An error occurred while fetching the store data.";
            exit;
        }
    ?>

    <div class="container-xxl bg-white p-0">

        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <?php include('navbar.php'); ?>
            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Stores</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Stores</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->

        <!-- Store List Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Our Stores</h5>
                    <h1 class="mb-5">Find a Store Near You</h1>
                </div>
                <div class="row g-4">
                    <?php while ($row = pg_fetch_assoc($res)) { ?>
                        <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="service-item rounded pt-3">
                                <div class="p-3">
                                    <center>
                                        <img src="img/<?php echo htmlspecialchars($row['shop_image']); ?>" style="border-radius: 10px;" width="125px" height="100px" class="text-primary mb-4">
                                    </center>
                                    <h5 align="center"><?php echo htmlspecialchars($row['shop_name']); ?></h5>
                                    <p align="center"><?php echo htmlspecialchars($row['shop_address']); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- Store List End -->

        <?php include('footer.php'); ?>
    </div>
</body>
</html>
