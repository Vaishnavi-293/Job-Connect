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
      if (empty(trim($_POST["position"]))) {
        $error = "Please enter position looking for.";
    } else {
        $position = trim($_POST["position"]);
    }
    // Validate email
    if (empty(trim($_POST["place"]))) {
        $error = "Please enter place detail.";
    } else {
        $place = trim($_POST["place"]);
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


    $upload_dir = "uploads/";

    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $photo_tmp_name = $_FILES['photo']['tmp_name'];
        $photo_name = basename($_FILES['photo']['name']);
        $photo_size = $_FILES['photo']['size'];
        $photo_ext = strtolower(pathinfo($photo_name, PATHINFO_EXTENSION));

        // Validate file type and size
        $allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($photo_ext, $allowed_ext)) {
            $errors[] = "Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.";
        }
        if ($photo_size > 2 * 1024 * 1024) { // 2 MB limit
            $error = "File size must be less than 2 MB.";
        }

        // Move the uploaded file
        if (empty($errors)) {
            $photo_new_name = uniqid("IMG_", true) . "." . $photo_ext;
            $photo_path = $upload_dir . $photo_new_name;

            if (!move_uploaded_file($photo_tmp_name, $photo_path)) {
                $error = "Failed to upload the photo.";
            }
        }
    } else {
        $errors[] = "Photo upload is required.";
    }

    $phone=$_POST["phone"];
    $exp=$_POST["experience"];
    $qual=$_POST["qualification"];


    
    // If no errors, insert data into the database
    if (empty($error)) {
        // Prepare an INSERT statement
        $sql = "INSERT INTO login (firstname, address, position, username, email, password, status, photo, phone, experience, qualification) VALUES (?,?,?,?, ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement
            mysqli_stmt_bind_param($stmt, "sssssssssss", $name, $place, $position, $param_username, $param_email, $param_password,$status,$photo_new_name, $phone, $exp, $qual);

            // Set the parameters
            $param_username = $username;
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Hash the password
            $status= "2";

            // Execute the statement
            if (mysqli_stmt_execute($stmt)) {
                echo "<h2>Registration successful! You can now log in.</h2>";
                // Redirect to a login page or show success message
                // header("Location: login.php"); // Redirect to login page
               
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
					<a href="#personal" aria-controls="personal" role="tab" data-toggle="tab">
						<strong>Personal Account</strong>
						<span>I'm looking for a job</span>
					</a>
				</li>
			</ul>


            <form id="registration-form" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
               
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="personal">
					<div class="row">

						<div class="col-sm-12">
                        <div class="form-group ">
									<label for="form-register-first-name">Name</label>
									<input type="text" class="form-control" id="name" name="name">
								</div><!-- /.form-group -->

							<div class="form-group">
								<label for="form-register-username">Username</label>
								<input type="text" class="form-control" id="username" name="username">
							</div><!-- /.form-group -->

							<div class="form-group">
								<label for="form-register-email">E-mail</label>
								<input type="email" class="form-control" id="email" name="email">
							</div><!-- /.form-group -->
                            
							<div class="form-group">
								<label for="form-register-email">Place</label>
								<input type="text" class="form-control" id="place" name="place">
							</div><!-- /.form-group -->

                            <div class="form-group">
								<label for="form-register-email">Looking for</label>
								<input type="text" class="form-control" id="position" name="position" placeholder="java developer">
							</div><!-- /.form-group -->

							<div class="form-group">
								<label for="form-register-password">Password</label>
								<input type="password" class="form-control" id="password" name="password">
							</div><!-- /.form-group -->

							<div class="form-group">
								<label for="form-register-retype">Retype</label>
								<input type="password" class="form-control" id="retype" name="retype">
							</div><!-- /.form-group -->
                            <div class="form-group">
								<label for="form-register-email">Photo</label>
                                <input type="file"  class="form-control" name="photo" id="photo" accept="image/*" required>
                            </div><!-- /.form-group -->
                            <div class="form-group">
								<label for="form-register-email">Phone</label>
                                <input type="number" class="form-control" name="phone" id="phone" maxlength="10" placeholder="Enter up to 10 digits"  required>
                            </div><!-- /.form-group -->

                            <div class="form-group">
								<label for="form-register-retype">Qualification</label>
								<input type="text" class="form-control" id="qualification" name="qualification" required>
							</div><!-- /.form-group -->

                            <div class="form-group">
								<label for="form-register-retype">Experiance</label>
								<input type="text" class="form-control" id="experience" name="experience" required>
							</div><!-- /.form-group -->



						</div><!-- /.col-* -->

						
					</div><!-- /.row -->

					<div class="center">
						<div class="checkbox checkbox-info">
							<label><input type="checkbox"> By signing up, you agree with the <a href="#">terms and conditions</a></label>
						</div><!-- /.checkbox -->

						<button type="submit" class="btn btn-secondary">Create an Account</button>
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
