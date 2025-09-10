
<?php
define('BASE_PATH', __DIR__);
$base_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . 
            "://" . $_SERVER['HTTP_HOST'] . 
            dirname($_SERVER['PHP_SELF']);
$base_url = rtrim($base_url, '/');

define('BASE_URL', $base_url);

?>