<?php
//session_start();
include('connection.php');

// LOGIN PHP Start
if (isset($_POST['submit_login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare the query using pg_prepare
    $stmt = pg_prepare($con, "login_query", "SELECT * FROM register WHERE username = $1");

    // Execute the query with pg_execute
    $result = pg_execute($con, "login_query", array($username));

    // Check if the query returned any results
    $row = pg_fetch_assoc($result);

    // Check if the username exists and verify the password
    if ($row && password_verify($password, $row['password'])) {
        $_SESSION['username'] = $username;
        echo "<script>window.location.href='Index.php'</script>";
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
}
// LOGIN PHP End


// REGISTRATION PHP Start
if (isset($_POST['submit_register'])) {
    try {
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm = $_POST['confirm'];

        if ($password !== $confirm) {
            throw new Exception('Passwords do not match');
        }

        // Hash the password before storing it
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepare the query using pg_prepare
        $stmt = pg_prepare($con, "register_query", "INSERT INTO register (name, username, password) VALUES ($1, $2, $3)");

        // Execute the query with pg_execute
        $res = pg_execute($con, "register_query", array($name, $username, $hashedPassword));

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
            echo "Registration Failed";
        }

    } catch (Exception $e) {
        echo "<script>
                $(document).ready(function(){
                    $('#msg_modal_reg').modal('show');
                    $('.close').click(function(){
                        $('#msg_modal_reg').modal('hide');
                    });
                });
              </script>";
    }
}
// REGISTRATION PHP End
?>

<!-- LOGIN Form Start -->
<div class="modal fade" id="log_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:black;">
                <h3><font color="orange"><b>Ayurveda</b></font></h3>
                <button type="button" class="close" data-dismiss="modal"> &times;</button>
            </div>
            <div class="modal-body">
                <form style="" method="POST" action="index.php">
                    <h5 class="fw-bold mb-1 pb-1" style="letter-spacing: 0px;"><font color="orange"><b>Login Here!</b></font></h5>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form2Example18">UserId</label>
                        <input type="email" name="username" id="form2Example18" class="form-control form-control-lg" />
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form2Example28">Password</label>
                        <input type="password" name="password" id="form2Example28" class="form-control form-control-lg" />
                    </div>
                    <div class="pt-1 mb-4">
                        <button class="btn btn-info btn-lg btn-block" type="submit" name="submit_login" style="background-color: orange;">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- LOGIN Form END -->

<!-- REGISTER Form START -->
<div class="modal fade" id="reg_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:black;">
                <h3><font color="orange"><b>Ayurveda</b></font></h3>
                <button type="button" class="close" data-dismiss="modal"> &times;</button>
            </div>
            <div class="modal-body">
                <form style="" method="POST" action="">
                    <h3 class="fw-bold mb-3 pb-3" style="letter-spacing: 0px;"><font color="orange"><b>Register Here!</b></font></h3>
                    <div class="form-outline mb-1">
                        <label class="form-label" for="form2Example18">Name</label>
                        <input type="text" required id="form2Example18" name="name" class="form-control form-control-lg" />
                    </div>
                    <div class="form-outline mb-1">
                        <label class="form-label" for="form2Example18">UserId</label>
                        <input type="email" required id="form2Example18" name="username" class="form-control form-control-lg" />
                    </div>
                    <div class="form-outline mb-1">
                        <label class="form-label" for="form2Example28">Password</label>
                        <input minlength="8" type="password" required id="pass" name="password" class="form-control form-control-lg" />
                    </div>
                    <div class="form-outline mb-1">
                        <label class="form-label" for="form2Example28">Confirm Password</label>
                        <input minlength="8" type="password" required id="cpass" name="confirm" class="form-control form-control-lg" onblur="comparepass()" />
                    </div>
                    <div class="form-outline mb-1">
                        <span id="msg"></span>
                    </div>
                    <div class="pt-1 mb-1">
                        <button id="regbtn" class="btn btn-info btn-lg btn-block" type="submit" name="submit_register" style="background-color: orange;">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- REGISTER Form END -->

<script type="text/javascript">
    function comparepass() {
        pass = document.getElementById("pass").value;
        cpass = document.getElementById("cpass").value;
        btn = document.getElementById("regbtn");
        sp = document.getElementById("msg");
        if (pass !== cpass) {
            sp.innerHTML = "<h6>Password & Confirm Password must be same.</h6>";
            btn.disabled = true;
        } else {
            sp.innerHTML = "";
            btn.disabled = false;
        }
    }
</script>
