<!DOCTYPE html>
<html lang="en">
<head>
    <title>add_store</title>
    <?php include('headtags.php'); ?>
    <script>
        $(document).ready(function(){
            // Click event for the success modal
            $(".btnShowSuccess").click(function(){
                $("#msg_modal").modal('show');
            });
            // Click event for the error modal
            $(".btnShowError").click(function(){
                $("#msg2_modal").modal('show');
            });
        });
    </script>
</head>

<body style="margin-top:-20px">
    <?php 
        include('log_reg_modal.php');
        if(!isset($_SESSION['username'])) { 
            // Uncomment to redirect if user is not logged in
            // header("Location: login.php");
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

            // File upload validation
            $filename = $_FILES['shop_image']['name'];
            $fileError = $_FILES['shop_image']['error'];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);

            if ($fileError == 0 && ($ext == 'jpg' || $ext == 'png' || $ext == 'JPG' || $ext == 'PNG')) {
                $tmpfile = $_FILES['shop_image']['tmp_name'];
                move_uploaded_file($tmpfile, "img/".$filename);

                // Database insert
                $query = "INSERT INTO stores (id, shop_name, shop_address, mobile_number, shop_image, pincode, city, state, country) 
                          VALUES (DEFAULT, '$shop_name', '$shop_address', '$mobile_number', '$filename', '$pincode', '$city', '$state', '$country')";
                
                $res = pg_query($con, $query);
                if ($res) {
                    echo "<script>
                            $(document).ready(function(){
                                $('.btnShowSuccess').click(); // Show success modal
                            });
                          </script>";
                } else {
                    echo "<script>
                            alert('Retry...');
                          </script>";
                }
            } else {
                echo "<script>
                        $(document).ready(function(){
                            $('.btnShowError').click(); // Show error modal
                        });
                      </script>";
            }
            pg_close($con);
        }
    ?>
    
    <!-- Success Modal -->
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

    <!-- Error Modal -->
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
        <div class="container-xxl position-relative p-0">
            <?php include('navbar.php'); ?>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h2 class="display-3 text-white mb-3 animated slideInDown">Register Your Store</h2>
                </div>
            </div>
        </div>

        <!-- Store Registration Form -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Stores</h5>
                    <h1 class="mb-5">Register Your Store</h1>
                </div>
                <div class="row g-4">
                    <div class="col-md-6">
                        <iframe class="position-relative rounded w-100 h-100"
                                src="https://www.google.com/maps/embed?pb=..."
                                frameborder="0" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false"
                                tabindex="0"></iframe>
                    </div>
                    <div class="col-md-6">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input name="shop_name" type="text" class="form-control" id="shop_name" placeholder="Shop Name" required>
                                        <label for="shop_name">Shop Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input name="mobile_number" type="text" class="form-control" id="mobile_number" placeholder="Mobile Number" required>
                                        <label for="mobile_number">Mobile Number</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input name="pincode" type="text" class="form-control" id="pincode" placeholder="Pincode" required>
                                        <label for="pincode">Pincode</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input name="city" type="text" class="form-control" id="city" placeholder="City" required>
                                        <label for="city">City</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input name="state" type="text" class="form-control" id="state" placeholder="State" required>
                                        <label for="state">State</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input name="country" type="text" class="form-control" id="country" placeholder="Country" required>
                                        <label for="country">Country</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="file" name="shop_image" class="form-control" id="shop_image" required>
                                        <label for="shop_image">Shop Image</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" name="submit" class="btn btn-primary">Add Store</button>
                                    <button type="button" class="btn btnShowSuccess" style="display:none;"></button>
                                    <button type="button" class="btn btnShowError" style="display:none;"></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('footer.php'); ?>

</body>
</html>
