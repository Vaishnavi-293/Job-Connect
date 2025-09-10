<?php
// Database configuration
define('DB_SERVER', 'localhost'); // Database server (localhost in most cases)
define('DB_USERNAME', 'root'); // Database username (use your database username)
define('DB_PASSWORD', ''); // Database password (use your database password)
define('DB_NAME', 'job_connect'); // Database name

// Establishing connection
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check if the connection was successful
if ($conn === false) {
    die("ERROR: Could not connect to the database. " . mysqli_connect_error());
}
?>