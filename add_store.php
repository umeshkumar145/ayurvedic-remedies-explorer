<!DOCTYPE html>
<html lang="en">
<head>
    <title>add_store</title>
    <?php include('headtags.php'); ?>
    <script>
        $(document).ready(function(){
            $(".btnEdit").click(function(){
                $("#msg2_modal").modal('show');
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $(".btnEdit").click(function(){
                $("#msg_modal").modal('show');
            });
        });
    </script>
</head>

<body style="margin-top:-20px">
    <?php 
        include('log_reg_modal.php');
        if(!isset($_SESSION['username'])) { 
            //header("Location:");
        }
                
        if(isset($_POST['submit'])) {   
            include('connection.php');
            $shop_name = $_POST['shop_name'];
            $shop_address = $_POST['shop_address'];
            $mobile_number = $_POST["mobile_number"];
            $pincode = $_POST["pincode"];
            $city = $_POST["city"];
            $state = $_POST["state"];
            $country = $_POST["country"];

            $filename = $_FILES['shop_image']['name'];
            $size = $_FILES['shop_image']['size'];
            $arr = explode('.', $filename);
            $ext = end($arr);
            if (($ext == 'jpg' || $ext == 'png' || $ext == 'JPG' || $ext == 'PNG')) {
                $tmpfile = $_FILES['shop_image']['tmp_name'];
                move_uploaded_file($tmpfile, "img/".$filename);
                $query = "INSERT INTO stores (id, shop_name, shop_address, mobile_number, shop_image, pincode, city, state, country) 
                          VALUES (DEFAULT, '$shop_name', '$shop_address', '$mobile_number', '$filename', '$pincode', '$city', '$state', '$country')";

                $res = pg_query($con, $query);
                if ($res) {
                    echo "<script>
                            $(document).ready(function(){
                                $('#msg_modal').modal('show');
                                $('.close').click(function(){
                                    $('#msg_modal').modal('hide');
                                });
                            });
                          </script>";
                } else {
                    echo "Retry....";
                }
            } else {
                echo "<script>
                        $(document).ready(function(){
                            $('#msg2_modal').modal('show');
                            $('.close').click(function(){
                                $('#msg2_modal').modal('hide');
                            });
                        });
                      </script>";
            }

            pg_close($con);
        }
    ?>
    <!-- Msg Modal -->
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
                        <p style="color: green;">Your Shop Registered Successfully!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Msg Modal -->

    <style>
        .bs-example {
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
                        <p style="color:red;">Invalid Filename Or Size</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                    <h2 class="display-3 text-white mb-3 animated slideInDown">Reg Stores</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Stores</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->

        <!-- Contact Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Stores</h5>
                    <h1 class="mb-5">Register Your Store</h1>
                </div>
                <div class="row g-4">
                    <div class="col-12">
                    </div>
                    <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
                        <iframe class="position-relative rounded w-100 h-100"
                                src="https://www.google.com/maps/embed?pb=..."
                                frameborder="0" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false"
                                tabindex="0"></iframe>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                            <form method="POST" enctype="multipart/form-data">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input name="shop_name" type="text" class="form-control" id="shop_name" placeholder="Shop Name">
                                            <label for="shop_name">Shop Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input name="mobile_number" type="text" class="form-control" id="mobile_number" placeholder="Mobile Number">
                                            <label for="mobile_number">Mobile Number</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input name="pincode" type="text" class="form-control" id="pincode" placeholder="Pincode">
                                            <label for="pincode">Pincode</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input name="city" type="text" class="form-control" id="city" placeholder="City">
                                            <label for="city">City</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input name="state" type="text" class="form-control" id="state" placeholder="State">
                                            <label for="state">State</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input name="country" type="text" class="form-control" id="country" placeholder="Country">
                                            <label for="country">Country</label>
                                       
