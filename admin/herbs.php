<!DOCTYPE html>
<html>
<head>
    <title>admin-herbs</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
        $(".btnEdit").click(function(){
            var currentTds = $(this).closest("tr").find("td"); // find all td of selected row
            var cell1= $(currentTds).eq(0).text(); // eq= cell , text = inner text
            var cell2 = $(currentTds).eq(1).text();
            var cell3= $(currentTds).eq(2).text(); 
            var cell4 = $(currentTds).eq(3).text(); 
            
            $("#herb_id").val(cell1);
            $("#herb_name").val(cell2);
            $("#diseases_name").val(cell3);
            $("#herb_description").val(cell4);
            $("#update_modal").modal('show');
        });
    });
    </script>
</head>
<body>
    <?php
        include "connection.php";
        session_start();

        if(!isset($_SESSION['username']))
        {
            header("location:login.php");
        }

    //$id=0;
    if(isset($_POST['add_herb']))
    {
        $herb_name=($_POST['herb_name']);
        $diseases_name=($_POST['diseases_name']);
        //$product_composition=($_POST['product_composition']);
        $herb_description=($_POST['herb_description']);
        $filename=$_FILES['myfile']['name'];
             $size=$_FILES['myfile']['size'];
             $arr=explode('.', $filename);
              $ext=end($arr);
                    
      
        $sql = "SELECT herb_name FROM herb WHERE herb_name = '{$herb_name}'";
        $result = mysqli_query ($con, $sql) or die("Query Failed.");

    if(mysqli_num_rows($result) > 0)
    {
    echo "<p style='color:red;text-align:center;margin: 10px 0; '>Product already Exists.</p>";
    }
  else
    {
      if(($ext=='jpg' || $ext=='png' || $ext=='JPG' || $ext=='PNG') )
      {
         $tmpfile=$_FILES['myfile']['tmp_name'];
         move_uploaded_file($tmpfile, "img/".$filename);
        
        $sql = "INSERT INTO herb (herb_name,herb_image,diseases_name,herb_description)
         VALUES('{$herb_name}','{$filename}','{$diseases_name}','{$herb_description}')";
         if(mysqli_query($con,$sql))
         {
         header("Location:http://localhost/our_ayurved/admin/herbs.php");

         }
     }
     else
       {
        echo "Invalid File Name or Size";
       }

    }
}
    ?>
  <!-- Add HERB MODAL START -->
    <div class="modal fade" id="add_herb_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color:black;">
                    <h3><font color="orange"><b>Ayurveda</b></font></h3>
                    <button type="button" class="close" data-dismiss="modal"> &times;</button>
                </div>
                    <div class="modal-body">  
                      <form style="" method="POST" enctype="multipart/form-data" action="">
                        <h3 class="fw-bold mb-3 pb-3" style="letter-spacing: 0px;"><font color="orange"><b>Add Herbs Here!</b></font></h3>
                        <div class="form-outline mb-1">
                          <label class="form-label" for="form2Example18">Herb Name</label>
                          <input type="text" required id="form2Example18" name="herb_name" class="form-control form-control-lg" />
                        </div>
                        <div class="form-outline mb-1">
                          <label class="form-label" for="form2Example18">Diseases Name</label>
                          <input type="text" required id="form2Example18" name="diseases_name" class="form-control form-control-lg" />
                        </div>
                        <div class="form-outline mb-1">
                            <label class="form-label" for="form2Example28">Herb Image</label><br>
                            <input type="file" name="myfile" id="myfile">             
                        </div>
                        <div class="form-outline mb-1">
                          <label class="form-label" for="form2Example28">Herb Description</label>
                          <input type="text" required id="form2Example28" name="herb_description" class="form-control form-control-lg" />
                        </div>
                        <div class="pt-1 mb-1">
                          <button class="btn btn-info btn-lg btn-block" type="submit" name="add_herb" style="background-color: orange;">Add</button>
                          <br>
                        </div>
                      </form>
                  </div>
            </div>
        </div>
    </div>
    <!-- Add Herb END -->

        <?php
              if(isset($_POST['submit']))
              {
              include('connection.php');
              $herb_id =$_POST['herb_id'];
              $herb_name=$_POST['herb_name'];
              $diseases_name =$_POST['diseases_name'];
              $herb_description =$_POST['herb_description'];
              //$password =mysqli_real_escape_string($conn,md5($_POST['password']));
              $sql = "UPDATE herb SET  herb_name= '$herb_name', diseases_name = '$diseases_name',  herb_description ='$herb_description' WHERE herb_id = $herb_id";
               if(mysqli_query($con,$sql))
               {
                    //header("Location:http://localhost/our_ayurved/admin/products.php");
               }}
        ?>
              
        <!-- EDIT MODAL POPUP START   --->
                  <div class="modal fade" id="update_modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color:black;">
                                <h3><font color="orange"><b>Ayurveda</b></font></h3>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                        <div class="modal-body">
                  
                              <!-- Form Start -->
                              <form style="" action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST" enctype="multipart/form-data">
                                  <div class="form-outline mb-1">
                                      <input type="hidden" id="herb_id" name="herb_id"  class="form-control" value="" placeholder="" >
                                  </div>
                                <div class="form-outline mb-1">
                                      <label class="form-label" for="form2Example18">Herb Name</label>
                                      <input type="text" id="herb_name" name="herb_name" class="form-control" value="" placeholder="" required>
                                  </div>
                                  <div class="form-outline mb-1">
                                      <label class="form-label" for="form2Example18">Diseases Name</label>
                                      <input type="text" id="diseases_name" name="diseases_name" class="form-control" value="<?php echo $row['diseases_name']; ?>" placeholder="" required>
                                  </div>
                                  <div class="form-outline mb-1">
                                      <labe class="form-label" for="form2Example18"l>Herb Description</label>
                                      <input type="text" id="herb_description" name="herb_description" class="form-control" value="<?php echo $row['herb_description']; ?>" placeholder="" required>
                                  </div>
                                  <input type="submit" name="submit" class="btn btn-primary" id="submit" value="Update" required />
                              </form>
                              <!-- /Form -->

                          </div>
                      </div>
                  </div>
              </div>
        <!-- EDIT MODAL POPUP End   --->
     <?php
        include("connection.php");   
        $sql="select * from herb";
        $res=mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($res);
        if(isset($_POST['del']))
        {
            
        }
    ?>

	<!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
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
                        <a href="home.php" class="nav-item nav-link">Home</a>
                        <a href="products.php" class="nav-item nav-link">Products</a>
                        <a href="herbs.php" class="nav-item nav-link active">Herbs</a>
                        <a href="stores.php" class="nav-item nav-link">Stores</a>
                        <a href="users.php" class="nav-item nav-link">Users</a>
                        <div class="nav-item dropdown">
                             <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Account</a>
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
                            <a href="login.php"><button class="dropdown-item" data-target="#log_modal" data-toggle="modal">Login</button></a>
                            <?php
                        }
                        ?>
                        </div>
                    </div>
                 </div>
                </div>
            </nav>
        </div>
        <!-- Navbar & Hero End -->

        <!--Edit Content-->
        <div class="container-xxl position-relative p-0">
            <br>
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col"><div style="float:left;" class="container"><h5><font color="white">All Herbs</font></h5></div></th>
                        <th scope="col"><div style="margin-left: 1000px;"><button class="btn btn-primary" data-target="#add_herb_modal" data-toggle="modal">Add Herb</button></div></th>
                    </tr>
                </thead>
            </table>
          <table class="table">
          <thead class="table-dark">
          <tr>
          <th scope="col">Herb Id</th>
          <th scope="col">Herb Name</th>
          <th scope="col">Diseases Name</th>
          <th scope="col">Herb Description</th>
          <th scope="col">Edit</th>
          <th scope="col">Delete</th>
          </tr>
          </thead>
          <tbody>
           <?php
               while($row=mysqli_fetch_assoc($res))
               {
                $id=$row['herb_id'];
            ?>
            <tr>
                <td><?php echo $row['herb_id'];?></td>
              <td><?php echo $row['herb_name'];?></td>
              <td><?php echo $row['diseases_name'];?></td>
              <td><?php echo $row['herb_description'];?></td>
              <td id="tab"><button id="btnedit" class="btnEdit"><i class="fa fa-edit" aria-hidden="true"></i></button></td>
              <td id="tab"><a href='delete_herb.php?id=<?php echo $row["herb_id"]; ?>'><i class="fa fa-trash" aria-hidden="true"></i></a></td>
            </tr>
            <?php 
               }
            ?>
            </tr>
          </tbody>
        </table>
        </div>
        <!--/Edit Content-->      
</body>
</html>