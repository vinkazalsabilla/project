<?php
session_start();
include_once "templates/database.php";
include_once "templates/header.php";
?>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login</h3>
                                </div>
                                <div class="card-body">
                                    <form action="" method="POST">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="username" id="inputEmail" type="text"
                                                placeholder="username" />
                                            <label for="inputEmail">Username</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="password" id="inputPassword"
                                                type="password" placeholder="Password" />
                                            <label for="inputPassword">Password</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <input class="btn btn-primary" name="submit" value="login" type="submit" />
                                        </div>
                                        <span>user: admin</span>
                                        <span>password: admin</span>
                                    </form>
                                    <?php
                                    if (isset($_POST['submit'])) {
                                        $user = $_POST['username'];
                                        $password = $_POST['password'];

                                        // Validate and sanitize user input
                                        $user = filter_var($user, FILTER_SANITIZE_STRING);
                                        $password = filter_var($password, FILTER_SANITIZE_STRING);

                                        // Create a prepared statement
                                        $stmt = mysqli_prepare($conn, "SELECT * FROM admin WHERE username = ? AND password = ?");

                                        // Bind parameters to the statement
                                        mysqli_stmt_bind_param($stmt, "ss", $user, $password);

                                        // Execute the statement
                                        mysqli_stmt_execute($stmt);

                                        // Get the result
                                        $result = mysqli_stmt_get_result($stmt);

                                        if (mysqli_num_rows($result) > 0) {
                                            $obj = mysqli_fetch_object($result);
                                            $_SESSION['status_login'] = true;
                                            $_SESSION['a_global'] = $obj;
                                            $_SESSION['id'] = $obj->id; // Corrected the variable name
                                    
                                            echo '<script>window.location="index.php"</script>';
                                        } else {
                                            echo '<script>alert("Username or password is wrong!")</script>';
                                        }
                                    }
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <?php
            include_once 'templates/footer.php';
            ?>
        </div>
    </div>
    <?php
    include_once 'templates/script.php';
    ?>
</body>

</html>