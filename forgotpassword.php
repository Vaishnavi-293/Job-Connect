<?php
require_once 'db_connect.php';
?>
<?php
// Include the database connection file

// Define variables and initialize with empty values
$username = $email = $password = $name = $vat = $website = $address = "";
$error= "";

// Process the form data when it is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate username
    if (empty(trim($_POST["username"]))) {
        $error = "Please enter a username.";
    } else {
        $username = trim($_POST["username"]);
    }

  
    // Validate email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter an email.";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $error = "Please enter a valid email address.";
    } else {
        $email = trim($_POST["email"]);
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $error = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $error = "Password must be at least 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

       // Validate password
       if (empty(trim($_POST["retype"]))) {
        $error = "Please re enter password.";
    } elseif (strlen(trim($_POST["retype"])) < 6) {
        $error = "Password must be at least 6 characters.";
    } else {
        $repassword = trim($_POST["retype"]);
    }

    if($password != $repassword){
        $error = "Password not match.";
    }

    


    
    // If no errors, insert data into the database
    if (empty($error)) {

        $result = $conn->query("SELECT * FROM login WHERE username = '$username' AND email = '$email' ");
       echo $result->num_rows;

        if(!empty($result)){
            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();
        
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['password'])) {
                    $param_password = password_hash($password, PASSWORD_DEFAULT); // Hash the password

        
                    // Update password and clear token
                    $conn->query("UPDATE login SET password = '$param_password' WHERE id = '" . $user['id'] . "'");
                    
                    echo "<h3 class='text-success'>Password has been reset successfully!</h3>";
                    exit;
                }
            } else {
                echo "<h3 class='text-danger'>Invalid user error.....</h3>";
                exit;
            }
        }else{
           
            echo "<h3 class='text-danger'>Invalid user error.</h3>";
        }       


        // Prepare an INSERT statement
    }
    

    // Close the database connection
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
                    <h1 class="center">Forgot password</h1>
                </div><!-- /.container -->
            </div><!-- /.document-title -->

            <div class="container">
	<div class="row">
		<div class="col-sm-12">
		


            <form id="registration-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
               
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="personal">
					<div class="row">

						<div class="col-sm-12">
							<div class="form-group">
								<label for="form-register-username">Username</label>
								<input type="text" class="form-control" id="username" name="username">
							</div><!-- /.form-group -->

							<div class="form-group">
								<label for="form-register-email">E-mail</label>
								<input type="email" class="form-control" id="email" name="email">
							</div><!-- /.form-group -->
                        

							<div class="form-group">
								<label for="form-register-password">Password</label>
								<input type="password" class="form-control" id="password" name="password">
							</div><!-- /.form-group -->

							<div class="form-group">
								<label for="form-register-retype">Retype</label>
								<input type="password" class="form-control" id="retype" name="retype">
							</div><!-- /.form-group -->
						</div><!-- /.col-* -->	
					</div><!-- /.row -->

					<div class="center">
						

						<button type="submit" class="btn btn-secondary">Reset password</button>
					</div><!-- /.center -->
                    <h2 class="bg-warning"><?php echo $error; ?> </h2>
				</div><!-- /.tab-pane -->                
				
        </form>
		</div><!-- /.col-* -->
	</div><!-- /.row -->
</div><!-- /.container -->

        </div><!-- /.main -->
    </div><!-- /.main-wrapper -->
</div><!-- /.page-wrapper -->

<div class="action-bar">
    <div class="action-bar-content">
        <div class="action-bar-chapter">
            <strong>Choose Page Layout</strong>

            <ul>
                <li><a href="#" data-action="layout-wide" class="active">Wide</a></li><li><a href="#" data-action="layout-boxed">Boxed</a></li>
            </ul>
        </div><!-- /.action-bar-chapter -->

        <div class="action-bar-chapter">
            <strong>Header Style</strong>

            <ul>
                <li><a href="#" class="active" data-action="header-light">Light</a></li><li><a href="#" data-action="header-dark">Dark</a></li>
            </ul>
        </div><!-- /.action-bar-chapter -->

        <div class="action-bar-chapter">
            <strong>Navigation Style</strong>

            <ul>
                <li><a href="#" data-action="navigation-light">Light</a></li><li><a href="#" class="active" data-action="navigation-dark">Dark</a></li>
            </ul>
        </div><!-- /.action-bar-chapter -->

        <div class="action-bar-chapter">
            <strong>Hero Content Style</strong>

            <ul>
                <li><a href="#" data-action="hero-content-light">Light</a></li><li><a href="#" class="active" data-action="hero-content-dark">Dark</a></li>
            </ul>
        </div><!-- /.action-bar-chapter -->

        <div class="action-bar-chapter">
            <strong>Footer Style</strong>

            <ul>
                <li><a href="#" data-action="footer-light">Light</a></li><li><a href="#"  class="active" data-action="footer-dark">Dark</a></li>
            </ul>
        </div><!-- /.action-bar-chapter -->

        <div class="action-bar-chapter">
            <strong>Color Combination</strong>

            <table>
                <tr>
                    <td><a href="assets/css/profession-purple-red.css">Purple / Red</a></td>
                    <td><a href="assets/css/profession-blue-cyan.css">Blue / Cyan</a></td>
                </tr>

                <tr>
                    <td><a href="assets/css/profession-gray-orange.css">Gray / Orange</a></td>
                    <td><a href="assets/css/profession-black-green.css" class="active">Black / Green</a></td>
                </tr>

                <tr>
                    <td><a href="assets/css/profession-blue-navy.css">Blue / Navy</a></td>
                    <td></td>
                </tr>
            </table>
        </div><!-- /.action-bar-chapter -->
    </div><!-- /.action-bar-content -->


</div><!-- /.action-bar -->


<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/js/jquery.ezmark.js"></script>

<script type="text/javascript" src="assets/libraries/bootstrap-sass/javascripts/bootstrap/collapse.js"></script>
<script type="text/javascript" src="assets/libraries/bootstrap-sass/javascripts/bootstrap/dropdown.js"></script>
<script type="text/javascript" src="assets/libraries/bootstrap-sass/javascripts/bootstrap/tab.js"></script>
<script type="text/javascript" src="assets/libraries/bootstrap-sass/javascripts/bootstrap/transition.js"></script>
<script type="text/javascript" src="assets/libraries/bootstrap-fileinput/js/fileinput.min.js"></script>
<script type="text/javascript" src="assets/libraries/bootstrap-select/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="assets/libraries/bootstrap-wysiwyg/bootstrap-wysiwyg.min.js"></script>

<script type="text/javascript" src="assets/libraries/cycle2/jquery.cycle2.min.js"></script>
<script type="text/javascript" src="assets/libraries/cycle2/jquery.cycle2.carousel.min.js"></script>

<script type="text/javascript" src="assets/libraries/countup/countup.min.js"></script>

<script type="text/javascript" src="assets/js/profession.js"></script>
<script type="text/javascript" src="assets/js/myJavaScript.js"></script>


</body>

<!-- Mirrored from preview.byaviators.com/template/profession/registration.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Aug 2018 11:09:11 GMT -->
</html>
