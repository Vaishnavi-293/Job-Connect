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
                    <li >
                        <a href="home.php">Home</a>
                    </li>
                    <li><a href="companies.php">Company Listing</a></li>
                    <li><a href="candidates.php">Candidates List</a></li>

                    <li class="active">
                        <a href="#">Pages <i class="fa fa-chevron-down"></i></a>
                        <ul class="sub-menu">

                            <li><a href="login.php">Login</a></li>
                            <li><a href="registration.php">Registration</a></li>
                            <li><a href="registration_company.php">Registration for company</a></li>

                        </ul>
                    </li>
                </ul>

                <div class=" hidden-sm">
                </div><!-- /.header-search -->
            </div><!-- /.container -->
        </div><!-- /.header-bottom -->
    </div><!-- /.header -->
</div><!-- /.header-wrapper-->