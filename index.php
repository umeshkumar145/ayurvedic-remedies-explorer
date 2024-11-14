<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
    <?php include('headtags.php'); ?>

    <!-- Consolidated Modal Script -->
    <script>
        $(document).ready(function() {
            $(".btnEdit").click(function() {
                var modalId = $(this).data('modal'); // Get modal ID from data attribute
                $("#" + modalId).modal('show'); // Show the respective modal
            });
        });
    </script>
</head>

<body style="margin-top:-20px">

    <?php include('log_reg_modal.php'); ?>

    <!-- Msg Modal -->
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

    <!-- Msg Modal (User Already Registered) -->
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

    <!-- Msg2 Modal (Wrong Username/Password) -->
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

    <!-- Main Content -->
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <div class="container-xxl position-relative p-0">
            <?php include('navbar.php'); ?>

            <!-- Hero Section -->
            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container my-5 py-5">
                    <div class="row align-items-center g-5">
                        <div class="col-lg-7 text-center text-lg-start">
                            <h2 class="display-4 text-white animated slideInLeft">Ayurveda</h2>
                            <h5 class="display-6 text-white animated slideInLeft">The Science of Life</h5>
                        </div>
                        <div class="col-lg-5 text-center text-lg-end overflow-hidden">
                            <img class="img-fluid" src="img/spinner.png" width="500px" height="500px" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Hero Section End -->

            <!-- About Section -->
            <div class="container-xxl py-5">
                <div class="container">
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-6">
                            <div class="row g-3">
                                <div class="col-6 text-start">
                                    <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="img/about1.jpg">
                                </div>
                                <div class="col-6 text-start">
                                    <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" src="img/about2.jpg" style="margin-top: 25%;">
                                </div>
                                <div class="col-6 text-end">
                                    <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="img/about3.jpg">
                                </div>
                                <div class="col-6 text-end">
                                    <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s" src="img/about4.jpg">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <h5 class="section-title ff-secondary text-start text-primary fw-normal">About Us</h5>
                            <h1 class="mb-4">Ayurveda And Your Life Energy</h1>
                            <p class="mb-4">Students of CAM therapy believe that everything in the universe – dead or alive – is connected...</p>
                            <a class="btn btn-primary py-3 px-5 mt-2" href="about.php">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- About Section End -->

            <!-- Popular Remedies Section -->
            <div class="container-xxl py-5">
                <div class="container">
                    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                        <h1 class="mb-5">Most Popular Remedies</h1>
                    </div>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="row g-4">
                                <!-- Example Remedy Item -->
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/mpr1.jpg" alt="" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Adusa Vasaka</span>
                                                <span class="text-primary">***</span>
                                            </h5>
                                            <small class="fst-italic">Cough, Asthma, Bronchitis</small>
                                        </div>
                                    </div>
                                </div>
                                <!-- Repeat similar items here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Popular Remedies End -->

            <!-- Team Section -->
            <div class="container-xxl pt-5 pb-3">
                <div class="container">
                    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                        <h5 class="section-title ff-secondary text-center text-primary fw-normal">Team Members</h5>
                        <h1 class="mb-5">Great Ayurvedacharya</h1>
                    </div>
                    <div class="row g-4">
                        <!-- Example Team Member -->
                        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="team-item text-center rounded overflow-hidden">
                                <div class="rounded-circle overflow-hidden m-4">
                                    <img class="img-fluid" src="img/gv.jpg" alt="">
                                </div>
                                <h5 class="mb-0">Dhanvantari</h5>
                                <div class="d-flex justify-content-center mt-3">
                                    <small><h6>(Father of Ayurveda)</h6></small>  
                                </div>
                            </div>
                        </div>
                        <!-- Repeat similar items for other team members -->
                    </div>
                </div>
            </div>
            <!-- Team Section End -->

        </div>
    </div>

    <?php include('footer.php'); ?>

</body>

</html>
