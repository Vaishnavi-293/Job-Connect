<?php
include('header.php');

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
    if (empty(trim($_POST["name"]))) {
        $error = "Please enter an name.";
    } else {
        $name = trim($_POST["name"]);
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

    //company registration
  
        
         // Validate vat
    if (empty(trim($_POST["vat"]))) {
        $error = "Please enter an vat no.";
    } else {
        $vat = trim($_POST["vat"]);
    }
    
     // Validate website
     if (empty(trim($_POST["website"]))) {
        $error = "Please enter an website adddress .";
    } else {
        $website = trim($_POST["website"]);
    }
    // Validate website
    if (empty(trim($_POST["address"]))) {
        $error = "Please enter address .";
    } else {
        $address = trim($_POST["address"]);
    }




    if (empty($error) ) {
        // Prepare an INSERT statement
        $sql = "INSERT INTO login (firstname, username, email, password, status, website, address, vat) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement
            mysqli_stmt_bind_param($stmt, "ssssssss", $name, $param_username, $param_email, $param_password, $sattus, $website, $address, $vat );

            // Set the parameters
            $param_username = $username;
            $param_email = $email;
            $website = $website;
            $address = $address;
            $vat = $vat;
            $name = $name;
            $sattus= "3";

            $param_password = password_hash($password, PASSWORD_DEFAULT); // Hash the password

            // Execute the statement
            if (mysqli_stmt_execute($stmt)) {
                echo "<h2>Registration successful! You can now log in.</h2>";
                // Redirect to a login page or show success message
                // header("Location: login.php"); // Redirect to login page
                exit();
            } else {
                echo "Something went wrong. Please try again later.";
            }

            // Close the prepared statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close the database connection
    mysqli_close($conn);
}
?>



    <div class="main-wrapper">
        <div class="main">
            <div class="document-title">
                <div class="container">
                    <h1 class="center">Account Registration</h1>
                </div><!-- /.container -->
            </div><!-- /.document-title -->

            <div class="container">
	<div class="row">
		<div class="col-sm-12">
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active">
					<a href="#company" aria-controls="company" role="tab" data-toggle="tab">
						<strong>Company Account</strong>
						<span>We are hiring employees</span>
					</a>
				</li>
			</ul>


            <form id="registration-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                
           
				<div role="tabpanel" class="tab-pane active" id="company">
                <input type="hidden" name="regtype" id="regtype" value="2">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="form-register-company-username">Username</label>
								<input type="text" class="form-control" id="username" name="username">
							</div><!-- /.form-group -->

							<div class="form-group">
								<label for="form-register-company-email">E-mail</label>
								<input type="email" class="form-control" id="email" name="email">
							</div><!-- /.form-group -->

							<div class="form-group">
								<label for="form-register-company-password">Password</label>
								<input type="password" class="form-control" id="password" name="password">
							</div><!-- /.form-group -->

							<div class="form-group">
								<label for="form-register-company-retype">Retype</label>
								<input type="password" class="form-control" id="retype" name="retype">
							</div><!-- /.form-group -->
						</div><!-- /.col-* -->

						<div class="col-sm-6">
							<div class="form-group">
								<label for="form-register-company-name">Company Name</label>
								<input type="text" class="form-control" id="name" name="name">
							</div><!-- /.form-group -->

							<div class="form-group">
								<label for="form-register-company-vat">VAT No.</label>
								<input type="text" class="form-control" id="vat" name="vat">
							</div><!-- /.form-group -->

							<div class="form-group">
								<label for="form-register-company-website">Website</label>
								<input type="text" class="form-control" id="website" name="website">
							</div><!-- /.form-group -->

							<div class="form-group">
								<label for="form-register-company-address-line">Address Line</label>
								<input type="text" class="form-control" id="address" name="address">
							</div><!-- /.form-group -->
						</div><!-- /.col-* -->
					</div><!-- /.row -->

					<div class="center">
						<div class="checkbox checkbox-info">
							<label><input type="checkbox"> By signing up, you agree with the <a href="#">terms and conditions</a></label>
						</div><!-- /.checkbox -->

						<button type="submit" class="btn btn-secondary">Create an Account</button>
					</div><!-- /.center -->
				</div><!-- /.tab-pane -->
                <h2 class="bg-warning"><?php echo $error; ?> </h2>
			</div><!-- /.tab-content -->
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
