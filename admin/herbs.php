<?php
    include "connection.php";
    session_start();

    if(!isset($_SESSION['username'])) {
        header("location:login.php");
    }

    if (isset($_POST['add_herb'])) {
        $herb_name = $_POST['herb_name'];
        $diseases_name = $_POST['diseases_name'];
        $herb_description = $_POST['herb_description'];
        $filename = $_FILES['myfile']['name'];
        $size = $_FILES['myfile']['size'];
        $arr = explode('.', $filename);
        $ext = end($arr);

        // Check if herb already exists
        $sql = "SELECT herb_name FROM herb WHERE herb_name = $1";
        $result = pg_query_params($con, $sql, array($herb_name));

        if (pg_num_rows($result) > 0) {
            echo "<p style='color:red;text-align:center;margin: 10px 0;'>Herb already exists.</p>";
        } else {
            if (in_array($ext, ['jpg', 'png', 'JPG', 'PNG'])) {
                $tmpfile = $_FILES['myfile']['tmp_name'];
                move_uploaded_file($tmpfile, "img/" . $filename);

                // Insert new herb
                $sql = "INSERT INTO herb (herb_name, herb_image, diseases_name, herb_description) VALUES ($1, $2, $3, $4)";
                $result = pg_query_params($con, $sql, array($herb_name, $filename, $diseases_name, $herb_description));

                if ($result) {
                    header("Location: herbs.php");
                } else {
                    echo "<p style='color:red;text-align:center;'>Failed to add herb.</p>";
                }
            } else {
                echo "Invalid file format.";
            }
        }
    }

    if(isset($_POST['submit'])) {
        $herb_id = $_POST['herb_id'];
        $herb_name = $_POST['herb_name'];
        $diseases_name = $_POST['diseases_name'];
        $herb_description = $_POST['herb_description'];

        // Update herb information
        $sql = "UPDATE herb SET herb_name = $1, diseases_name = $2, herb_description = $3 WHERE herb_id = $4";
        $result = pg_query_params($con, $sql, array($herb_name, $diseases_name, $herb_description, $herb_id));

        if ($result) {
            // Do something if update is successful
        }
    }

    // Retrieve all herbs
    $sql = "SELECT * FROM herb";
    $res = pg_query($con, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Herbs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".btnEdit").click(function() {
                var currentTds = $(this).closest("tr").find("td"); // find all td of selected row
                var cell1 = $(currentTds).eq(0).text(); // eq= cell , text = inner text
                var cell2 = $(currentTds).eq(1).text();
                var cell3 = $(currentTds).eq(2).text(); 
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
    <div class="container">
        <h1>Manage Herbs</h1>

        <!-- Add Herb Modal -->
        <div class="modal fade" id="add_herb_modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color:black;">
                        <h3><font color="orange"><b>Ayurveda</b></font></h3>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">  
                        <form method="POST" enctype="multipart/form-data">
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
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add Herb Modal End -->

        <!-- Edit Herb Modal -->
        <div class="modal fade" id="update_modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color:black;">
                        <h3><font color="orange"><b>Ayurveda</b></font></h3>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                            <input type="hidden" id="herb_id" name="herb_id" class="form-control" />
                            <div class="form-outline mb-1">
                                <label class="form-label" for="form2Example18">Herb Name</label>
                                <input type="text" id="herb_name" name="herb_name" class="form-control" required />
                            </div>
                            <div class="form-outline mb-1">
                                <label class="form-label" for="form2Example18">Diseases Name</label>
                                <input type="text" id="diseases_name" name="diseases_name" class="form-control" required />
                            </div>
                            <div class="form-outline mb-1">
                                <label class="form-label" for="form2Example18">Herb Description</label>
                                <input type="text" id="herb_description" name="herb_description" class="form-control" required />
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Edit Herb Modal End -->

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
                    while($row = pg_fetch_assoc($res)) {
                        echo "<tr>
                                <td>{$row['herb_id']}</td>
                                <td>{$row['herb_name']}</td>
                                <td>{$row['diseases_name']}</td>
                                <td>{$row['herb_description']}</td>
                                <td><button class='btnEdit'><i class='fa fa-edit'></i></button></td>
Here’s the rest of the code:

```php
                                <td><a href='delete_herb.php?id={$row['herb_id']}'><i class='fa fa-trash'></i></a></td>
                            </tr>";
                    }
                ?>
            </tbody>
        </table>
        <button class="btn btn-info" data-toggle="modal" data-target="#add_herb_modal">Add New Herb</button>
    </div>
</body>
</html>
