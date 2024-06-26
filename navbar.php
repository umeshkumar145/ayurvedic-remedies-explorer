
    <!--Navbar Start-->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="text-primary m-0"><img src="img/logo.png" width="85px" height="85px"> &nbsp;Ayurveda</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="index.php" class="nav-item nav-link">Home</a>
                        <a href="about.php" class="nav-item nav-link">About</a>
                        <a href="products.php" class="nav-item nav-link">Products</a>
                        <a href="herbs.php" class="nav-item nav-link">Herbs</a>
                        <a href="contact.php" class="nav-item nav-link">Contact</a>
                        <div class="nav-item dropdown">
                         <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Stores</a>
                            <div class="dropdown-menu m-0">
                                <a href="store.php"><button class="dropdown-item">Store</button></a>
                                <?php
                                if(isset($_SESSION['username']))
                                { 
                                ?>
                                    <a href="add_store.php"><button class="dropdown-item">Add Store</button></a>
                                <?php
                                }
                                else
                                {
                                    ?>
                                    <button class="dropdown-item" data-target="#log_modal_store" data-toggle="modal">Add Store</button>
                                <?php 
                                }
                                   
                                ?>           
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                         <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">ACCOUNT</a>
                        <div class="dropdown-menu m-0">
                            <?php
                               // session_start();
                                if(isset($_SESSION['username']))
                                {
                                   
                            ?>
                            <a href="logout.php"><button class="dropdown-item"  data-target="#lgout_modal" data-toggle="modal">Logout</button></a>
                            <?php 
                            }
                            else
                            {
                                ?>
                           <button class="dropdown-item" data-target="#log_modal" data-toggle="modal" name="login1">Login</button>
                            <button class="dropdown-item" data-target="#reg_modal" data-toggle="modal">Register</button>
                            <?php
                        }
                        ?>
                        </div>
                        </div>
                    </div>
                </div>
            </nav>
    <!--Navbar END-->