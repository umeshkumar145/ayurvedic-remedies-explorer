<!DOCTYPE html>
<html>
<head>
    <title>admin-products</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon and Stylesheets -->
    <link href="img/favicon.ico" rel="icon">
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<?php
include "connection.php";
session_start();

if (!isset($_SESSION['username'])) {
    header("location:login.php");
}

if (isset($_POST['add_prod'])) {
    $product_name = $_POST['product_name'];
    $diseases_name = $_POST['diseases_name'];
    $product_composition = $_POST['product_composition'];
    $product_description = $_POST['product_description'];

    $filename = $_FILES['myfile']['name'];
    $size = $_FILES['myfile']['size'];
    $arr = explode('.', $filename);
    $ext = end($arr);

    $sql = "SELECT product_name FROM product WHERE product_name = $1";
    $result = pg_query_params($con, $sql, array($product_name));

    if (pg_num_rows($result) > 0) {
        echo "<p style='color:red;text-align:center;margin: 10px 0;'>Product already exists.</p>";
    } else {
        if (in_array($ext, ['jpg', 'png', 'JPG', 'PNG'])) {
            $tmpfile = $_FILES['myfile']['tmp_name'];
            move_uploaded_file($tmpfile, "img/" . $filename);

            $sql = "INSERT INTO product (product_name, product_image, diseases_name, product_composition, product_description)
                    VALUES ($1, $2, $3, $4, $5)";
            $result = pg_query_params($con, $sql, array($product_name, $filename, $diseases_name, $product_composition, $product_description));

            if ($result) {
                header("Location:http://localhost/our_ayurved/admin/products.php");
            } else {
                echo "Error: " . pg_last_error($con);
            }
        } else {
            echo "Invalid file type or size";
        }
    }
}

if (isset($_POST['submit'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $diseases_name = $_POST['diseases_name'];
    $product_description = $_POST['product_description'];
    $product_composition = $_POST['product_composition'];

    $sql = "UPDATE product SET product_name = $1, diseases_name = $2, product_description = $3, product_composition = $4 WHERE product_id = $5";
    $result = pg_query_params($con, $sql, array($product_name, $diseases_name, $product_description, $product_composition, $product_id));
}
?>

<div class="modal fade" id="add_prod_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:black;">
                <h3><font color="orange"><b>Ayurveda</b></font></h3>
                <button type="button" class="close" data-dismiss="modal"> &times;</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="" enctype="multipart/form-data">
                    <h3 class="fw-bold mb-3 pb-3"><font color="orange"><b>Add Products Here!</b></font></h3>
                    <div class="form-outline mb-1">
                        <label class="form-label" for="product_name">Product Name</label>
                        <input type="text" required id="product_name" name="product_name" class="form-control form-control-lg" />
                    </div>
                    <div class="form-outline mb-1">
                        <label class="form-label" for="diseases_name">Diseases Name</label>
                        <input type="text" required id="diseases_name" name="diseases_name" class="form-control form-control-lg" />
                    </div>
                    <div class="form-outline mb-1">
                        <label class="form-label" for="myfile">Product Image</label><br>
                        <input type="file" name="myfile" id="myfile">
                    </div>
                    <div class="form-outline mb-1">
                        <label class="form-label" for="product_description">Product Description</label>
                        <input type="text" required id="product_description" name="product_description" class="form-control form-control-lg" />
                    </div>
                    <div class="form-outline mb-1">
                        <label class="form-label" for="product_composition">Product Composition</label>
                        <input type="text" required id="product_composition" name="product_composition" class="form-control form-control-lg" />
                    </div>
                    <div class="pt-1 mb-1">
                        <button class="btn btn-info btn-lg btn-block" type="submit" name="add_prod" style="background-color: orange;">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container-xxl position-relative p-0">
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th scope="col">Product Id</th>
                <th scope="col">Product Name</th>
                <th scope="col">Diseases Name</th>
                <th scope="col">Product Description</th>
                <th scope="col">Product Composition</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT * FROM product";
        $res = pg_query($con, $sql);
        while ($row = pg_fetch_assoc($res)) {
            echo "<tr>";
            echo "<td>{$row['product_id']}</td>";
            echo "<td>{$row['product_name']}</td>";
            echo "<td>{$row['diseases_name']}</td>";
            echo "<td>{$row['product_description']}</td>";
            echo "<td>{$row['product_composition']}</td>";
            echo "<td><button class='btnEdit'><i class='fa fa-edit' aria-hidden='true'></i></button></td>";
            echo "<td><a href='delete_product.php?id={$row['product_id']}'><i class='fa fa-trash' aria-hidden='true'></i></a></td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
