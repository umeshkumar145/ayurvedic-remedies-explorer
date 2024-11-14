<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact</title>
    <?php include('headtags.php'); ?>
    <script>
        $(document).ready(function(){
            $(".btnEdit").click(function(){
                $("#msg1_modal").modal('show');
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
    <script>
        $(document).ready(function(){
            $(".btnEdit").click(function(){
                $("#msg3_modal").modal('show');
            });
        });
    </script>
</head>

<body style="margin-top:-20px">
    <?php 
        include('log_reg_modal.php');

        // Process form submission
        if(isset($_POST['send_msg'])) {
            try {
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

                // Retrieve form data
                $your_name = $_POST['your_name'];
                $your_email = $_POST['your_email'];
                $subject = $_POST['subject'];
                $message = $_POST["msg"];

                // Insert data into the contact table
                $query = "INSERT INTO contact (your_name, your_email, subject, message) VALUES ('$your_name', '$your_email', '$subject', '$message')";
                $res = pg_query($con, $query);

                // Check if the query was successful
                if ($res) {
                    echo "<script>
                        $(document).ready(function(){
                            $('#msg1_modal').modal('show');
                            $('.close').click(function(){
                                $('#msg1_modal').modal('hide');
                            });
                        });
                    </script>";
                } else {
                    echo "Retry...";
                }

                pg_close($con);
            } catch (Exception $e) {
                echo "<script>
                    $(document).ready(function(){
                        $('#msg3_modal').modal('show');
                        $('.close').click(function(){
                            $('#msg3_modal').modal('hide');
                        });
                    });
                </script>";
            }
        }
    ?>

    <!-- Modal for success -->
    <style>
        .bs-example{
            margin: 20px;
        }
    </style>
    <div class="bs-example">
        <div id="msg1_modal" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">This Page Says...</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p style="color:green;">Thanks for contacting us. Please keep in touch.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Form -->
    <div class="container-xxl bg-white p-0">
        <?php include('navbar.php'); ?>

        <div class="container-xxl py-5 bg-dark hero-header mb-5">
            <div class="container text-center my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Contact Us</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Contact</li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Contact Section -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Contact Us</h5>
                    <h1 class="mb-5">Contact For Any Query</h1>
                </div>
                <div class="row g-4">
                    <div class="col-12">
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <h5 class="section-title ff-secondary fw-normal text-start text-primary">General</h5>
                                <p><i class="fa fa-envelope-open text-primary me-2"></i>umeshanand1452001@gmail.com</p>
                            </div>
                            <div class="col-md-6">
                                <h5 class="section-title ff-secondary fw-normal text-start text-primary">Technical</h5>
                                <p><i class="fa fa-envelope-open text-primary me-2"></i>smartyrohit9119@gmail.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
                        <img src="img/contimg.png" width="600px" height="350px">
                    </div>
                    <div class="col-md-6">
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                            <form method="POST">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" required class="form-control" id="name" name="your_name" placeholder="Your Name">
                                            <label for="name">Your Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input name="your_email" required type="email" class="form-control" id="email" placeholder="Your Email">
                                            <label for="email">Your Email</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input name="subject" required type="text" class="form-control" id="subject" placeholder="Subject">
                                            <label for="subject">Subject</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea name="msg" required class="form-control" id="message" style="height: 150px"></textarea>
                                            <label for="message">Message</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button name="send_msg" class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include('footer.php') ?>
    </div>
</body>
</html>
