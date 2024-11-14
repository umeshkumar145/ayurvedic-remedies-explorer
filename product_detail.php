<!DOCTYPE html>
<html lang="en">
<head>
    <title>Product Detail</title>
    <?php include('headtags.php'); ?>
    <script>
        $(document).ready(function(){
            $(".btnEdit").click(function(){
                $("#msg_modal").modal('show');
                $("#msg2_modal").modal('show');
            });
        });
    </script>
</head>

<body style="margin-top:-20px">
    <?php
        include('log_reg_modal.php');
        include("connection.php");

        // Sanitize product ID input to avoid SQL injection
        $stmt = $con->prepare("SELECT product_id, product_image, product_name, diseases_name, product_description, product_composition FROM product WHERE product_id = ?");
        $stmt->bind_param("i", $_GET['id']);
        $stmt->execute();
        $res = $stmt->get_result();
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
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Products</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Products</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->

        <!-- Modal for Messages -->
        <div class="modal fade" id="msg_modal" tabindex="-1" aria-labelledby="msg_modalLabel" aria-hidden="true">
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

        <div class="modal fade" id="msg2_modal" tabindex="-1" aria-labelledby="msg2_modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">This Page Says...</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Wrong Username or Password!</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Service Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Useful Products</h5>
                    <h1 class="mb-5">Explore Our Products</h1>
                </div>

                <?php
                    $row = mysqli_fetch_assoc($res);
                ?>

                <br>
                <div class="row g-4">
                    <div class="service-item rounded pt-3">
                        <a href="#<?php echo $row['product_id']; ?>">  
                            <div class="p-4">
                                <div align="center">
                                    <h1 style="margin-bottom: 40px;"><?php echo $row['product_name']; ?></h1>
                                </div>
                                <div>
                                    <div style="padding-right: 100px; float: left;">
                                        <img src="img/<?php echo $row['product_image']; ?>" alt="Product Image" class="product-image">
                                    </div>
                                    <div style="float: left; padding-left: 10px; height: 500px; width: 460px;">
                                        <div><font size="30px"><h3>Diseases Name</h3></font></div> 
                                        <div style="padding-left: 30px; color: orange; font-family: cursive; font-size: 20px;">
                                            <ul><li><?php echo $row['diseases_name']; ?></li></ul>
                                        </div><br>

                                        <div><font size="30px"><h3>Description</h3></font></div>
                                        <div style="padding-left: 30px; color: orange; font-family: cursive; font-size: 20px;">
                                            <ul><li><?php echo $row['product_description']; ?></li></ul>
                                        </div><br>

                                        <div><font size="30px"><h3>Composition</h3></font></div>
                                        <div style="padding-left: 30px; color: orange; font-family: cursive; font-size: 20px;">
                                            <ul><li> <?php echo $row['product_composition']; ?></li></ul>
                                        </div> 
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
