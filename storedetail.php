<!DOCTYPE html>
<html lang="en">
<head>
    <title>storedetail</title>
    <?php
        include('headtags.php');
    ?>
    <script>
        $(document).ready(function(){
            $(".btnEdit").click(function(){
                var modalId = $(this).data('modal-id');
                $("#" + modalId).modal('show');
            });
        });
    </script>
</head>

<body style="margin-top:-20px">
    <?php
        include('log_reg_modal.php');
        include("connection.php");

        // Use Prepared Statement to prevent SQL Injection
        $stmt = $con->prepare("SELECT id, shop_name, shop_address, mobile_number, shop_image, pincode, city, state, country FROM stores WHERE id = ?");
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

        <!-- Modals Start -->
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

        <div class="bs-example">
            <div id="msg2_modal" class="modal fade" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">This Page Says...</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <p style="color: red;">Wrong Username or Password!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modals End -->

        <!-- Service Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Our stores</h5>
                    <h1 class="mb-5">Store Details</h1>
                </div>

                <?php
                    $row = mysqli_fetch_assoc($res);
                ?>
                <br>
                <div class="row g-4">
                    <div class="service-item rounded pt-3">
                        <a href="#<?php echo $row['id']; ?>">  
                            <div class="p-4">
                                <div align="center">
                                    <h1><?php echo $row['shop_name']; ?></h1>
                                </div>
                                <div>
                                    <div style="padding-right:100px; float: left;">
                                        <img src="img/<?php echo $row['shop_image']; ?>" class="img-fluid" alt="Shop Image">
                                    </div>
                                    <div style="float: left; padding-left: 50px; height: 400px; width: 600px;">
                                        <div><font size="30px"><h3>City Name</h3></font></div>
                                        <div style="padding-left: 30px; color: darkred; font-family: cursive; font-size: 20px;">
                                            <ul><li><?php echo $row['city']; ?></li></ul>
                                        </div><br>

                                        <div><font size="30px"><h3>State Name</h3></font></div>
                                        <div style="padding-left: 30px; color: darkred; font-family: cursive; font-size: 20px;">
                                            <ul><li><?php echo $row['state']; ?></li></ul>
                                        </div><br>

                                        <div><font size="30px"><h3>Address</h3></font></div>
                                        <div style="padding-left: 30px; color: darkred; font-family: cursive; font-size: 20px;">
                                            <ul><li><?php echo $row['shop_address']; ?></li></ul>
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
        
        <?php include('footer.php') ?>
</body>

</html>
