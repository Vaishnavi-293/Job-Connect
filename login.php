<?php
session_start();

// Include the database connection file
require_once 'db_connect.php';


// Define variables and initialize with empty values
$username = $password = "";
$error = "";

// Process the form data when it is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate username
    if (empty(trim($_POST["username"]))) {
        $error = "Please enter your username.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $error = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Check if there are no errors before querying the database
    if (empty($error)) {
        // Prepare the SELECT query to check if the username exists
        $sql = "SELECT id, username, password FROM login WHERE username = ?";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind the username parameter to the prepared statement
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set the username parameter
            $param_username = $username;

            // Execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Store the result
                mysqli_stmt_store_result($stmt);

                // Check if the username exists in the database
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username_db, $hashed_password);

                    if (mysqli_stmt_fetch($stmt)) {
                        // Check if the entered password matches the stored hashed password
                        if (password_verify($password, $hashed_password)) {
                            // Password is correct, start a new session

                            
                            if (isset($id)) {
                            $_SESSION['id'] = $id;
                            $_SESSION['username'] = $username_db;

                            header("Location: home.php");
                            exit();
                            }
                            
                        } else {
                            // Password is incorrect
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else {
                    // Username does not exist
                    $login_err = "Invalid username or password.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close the statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close the connection
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html>


<!-- Mirrored from preview.byaviators.com/template/profession/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Aug 2018 11:09:11 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" type="text/css">
    <link href="assets/fonts/profession/style.css" rel="stylesheet" type="text/css">
    <link href="assets/libraries/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="assets/libraries/bootstrap-fileinput/css/fileinput.min.css" rel="stylesheet" type="text/css">
    <link href="assets/libraries/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" type="text/css">
    <link href="assets/libraries/bootstrap-wysiwyg/bootstrap-wysiwyg.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/profession-black-green.css" rel="stylesheet" type="text/css" id="style-primary">

    <link rel="shortcut icon" type="image/x-icon" href="assets/favicon.png">

    <title>Login</title>
</head>


<body class="hero-content-dark footer-dark" align="center">

<div class="page-wrapper">
    <div class="header-wrapper">
    <div class="header">
        <div class="header-top">
            <div class="container">
                <div class="header-brand">
                    <div class="header-logo">
                        <a href="index-2.html">
                            <i class="profession profession-logo"></i>
                            <span class="header-logo-text"><span class="header-logo-highlight">.</span>JobConnect</span>
                        </a>
                    </div><!-- /.header-logo-->

                    <div class="header-slogan">

                    </div><!-- /.header-slogan-->
                </div><!-- /.header-brand -->

                <ul class="header-actions nav nav-pills">
                    <li><a href="login.html"><i class="fa fa-user"></i>&nbsp;

                        <?php
                        if(isset($_SESSION['username'])){
                            echo $_SESSION['username'];
                        }
                       
                        
                        ?>

                    </a></li>
                 
                   
                    <li><?php if(isset($_SESSION['username'])){ ?>
                        <a href='logout.php' class='primary'>Logout</a></li>
                        <?php }else{ ?>
                            <a href='login.php' class='primary'>Login</a></li>
                            <?php } ?>
                </ul>

                <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="header-nav">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div><!-- /.container -->
        </div><!-- /.header-top -->

        <div class="header-bottom">
            <div class="container">
                <ul class="header-nav nav nav-pills collapse">
                    
                <li><a href="login.php">Login</a></li>
                            <li><a href="registration.php">Registration</a></li>
                            <li><a href="registration_company.php">Registration for company</a></li>
                </ul>

                <div class=" hidden-sm">
                    <form method="get" action="">

                    </form>
                </div><!-- /.header-search -->
            </div><!-- /.container -->
        </div><!-- /.header-bottom -->
    </div><!-- /.header -->
</div><!-- /.header-wrapper-->




    <div class="main-wrapper">
        <div class="main">
            <div class="document-title">
                <div class="container">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
				<div class="form-group">
					<label for="form-login-username">Username</label>
					<input type="text" class="form-control" id="username" name="username">
				</div><!-- /.form-group -->

				<div class="form-group">
					<label for="form-login-password">Password</label>
					<input type="password" class="form-control" id="password" name="password">
				</div><!-- /.form-group -->

				<div class="checkbox">
					<label><a href="forgotpassword.php"> forgot password</a></label>
				</div><!-- /.checkbox -->

				<div class="form-group">
					<button type="submit" class="btn btn-secondary btn-block">Sign in</button>
				</div><!-- /.form-group -->

				<hr>

				
			</form>
                </div><!-- /.container -->
            </div><!-- /.document-title -->

        </div><!-- /.main -->
    </div><!-- /.main-wrapper -->

   <?php 
   include('footer_user.php');
   ?>