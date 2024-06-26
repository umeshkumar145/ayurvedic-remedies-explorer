<!DOCTYPE html>
<html lang="en">
<head>
    <title>store</title>
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

<body>
    <?php
        include('log_reg_modal.php');
        include("connection.php");
        if(isset($_POST['search']))
        {

            $kw=$_POST['kw'];
            $sql="select shop_name,shop_address,shop_image,city,state,country from stores where shop_address like '%".$kw."%' or shop_name like '%".$kw."%'or city like '%".$kw."%' or state like '%".$kw."%' or country like '%".$kw."%'";

        }
        else
        {
            if(isset($_GET['view']))
            {
                $sql="select id, shop_name, shop_address, mobile_number, shop_image, pincode, city, state, country from stores";
            }
            else
            {
                $sql="select id, shop_name, shop_address, mobile_number, shop_image, pincode, city, state, country from stores limit 8";
            }
        }
        $res=mysqli_query($con,$sql);
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
            <?php
             include('navbar.php');
            ?>
            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Store</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Store</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->

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

        <!-- Service Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Useful Products</h5>
                    <h1 class="mb-5">Explore Our Store</h1>
                </div>
                <!-- SEARCH BOX -->
                <form method="POST">
                    <div class="input-group">
                      <input type="text" name="kw" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                      <button type="submit" class="btn btn-outline-primary" name="search">search</button>
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
                            <a href="storedetail.php?id=<?php echo $row['id'];?>">  
                            <div class="p-4">
                              <center>  <img src="img/<?php echo $row['shop_image'];?>" style="border-radius: 10px; ;" width="125px" height=100px class=" text-primary mb-4"></i></center>
                                <h5 align="center"><?php echo $row['shop_name'];?></h5>
                                <p align="center"><?php echo $row['shop_address'];?></p>
                            </div>
                            </a>
                        </div>
                    </div>
                    <?php
                    }
            
                if(!isset($_GET['view']))
                {
                ?>
                <a href="store.php?view=all" style="width: 150px; height: 40px; margin-left: 970px;"  class="btn btn-primary py-2 px-4">View More</a>
                <?php
                 }
                 ?>
                </div>
            </div>
        </div>
        <!-- Service End -->
        
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
                            <p>Registered Successfully!</p>
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

    <?php
        include('footer.php')
    ?>
</body>

</html>