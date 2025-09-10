<?php 
session_start();
require_once 'db_connect.php';

$user="";

if( isset($_SESSION['id']))
{
$user=$_SESSION['username'];
}

include('header.php');
?>

    <div class="main-wrapper">
        <div class="main">
            <div class="hero-content">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-6">
                <h1>Its never too late to start!</h1>
                <h2>Well trusted and verified companies all around the world are using our job platform to find best employees. Start your change by clicking at "Add Resume".</h2>
            </div><!-- /.col-* -->


        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.hero-content -->


<div class="stats">
    <div class="container">
        <div class="row">
            <div class="stat-item col-sm-4" >
                <strong id="stat-item-1">6,358</strong>
                <span>Jobs Added</span>
            </div><!-- /.col-* -->

            <div class="stat-item col-sm-4" >
                <strong id="stat-item-2">8,678</strong>
                <span>Active Resumes</span>
            </div><!-- /.col-* -->

            <div class="stat-item col-sm-4" >
                <strong id="stat-item-3">4,404</strong>
                <span>Positions Matched</span>
            </div><!-- /.col-* -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.stats -->


<div class="container">

<?php
$sql = "SELECT * FROM login WHERE status = 3 "; // Modify this query as needed
$result = $conn->query($sql);
$nos=$result->num_rows;
?>
<div class="filter">
    <h2>Search for a Job</h2>

    <div class="form-group col-sm-12">
    <input type="text" id="searchInput" class="form-control" placeholder="Search for content..." onkeyup="searchTable()">
    </div>
    <div class="form-group col-sm-12">
    <table id="myTable" class="table">
        <thead>
        <tr class="text-center" >
                <th scope="col">Company</th>
                <th scope="col">Email</th>
                <th scope="col">VAT</th>
                <th scope="col">Website </th>
                <th scope="col">Address</th>
            </tr>
        </thead>
        <tbody>

        <?php

   
if ($result->num_rows > 0) {    
while ($row = $result->fetch_assoc()) {
    
?>
                <tr>     
                <td class=""><?php echo $row["firstname"]; ?></td>
                <td class=""><?php echo $row["email"]; ?></td>
                <td class=""><?php echo $row["vat"]; ?></td>
                <td class=""><?php echo $row["website"];  ?></td>
                <td class=""><?php echo $row["address"]; ?></td>
               
               

            </tr>
           
<?php
    }
}
$conn->close();

?>
</tbody>
    </table>




        </tbody>
    </table>
</div>






        <hr>

        <div class="filter-actions">
            <a href="candidates.php">All Candidates</a> <span class="filter-separator">/</span>
            <a href="companies.php">All Companies</a>
        </div><!-- /.filter -->
    </form>
</div><!-- /.filter -->





	<div class="panels-highlighted">
    <div class="row">
        <div class="panel-highlighted-wrapper col-sm-6">
            <div class="panel-highlighted-inner panel-highlighted-secondary">
                <h2>Hire an employee</h2>



                <a href="registration_company.php" class="btn btn-white">Sign up as company</a>
            </div><!-- /.panel-inner -->
        </div><!-- /.panel-wrapper -->

        <div class="panel-highlighted-wrapper col-sm-6">
            <div class="panel-highlighted-inner panel-highlighted-primary panel">
                <h2>Looking for a job</h2>



                <a href="registration.php" class="btn btn-white">Sign up as employee</a>
            </div><!-- /.panel-inner -->
        </div><!-- /.panel-wrapper -->
    </div><!-- /.row-->
</div><!-- /.panels -->


	<div class="page-title">
    <h2>Step Inside and See yourself! </h2>

    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <p>
              “It's never too late to start over. If you weren't happy with yesterday, try something different today. Don't stay stuck. Do better.”
            </p>
        </div><!-- /.col-* -->
    </div><!-- /.row -->
</div><!-- /.page-title -->

<div class="posts">
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <div class="post-box">
                <div class="post-box-image">
                    <a href="#">
                        <img src="assets/img/tmp/blog-1.jpg" alt="">
                    </a>
                </div><!-- /.post-box-image -->

                <div class="post-box-content">
                    <h2><a href="#">Apply For Multiple Jobs With One Click!</a></h2>

                    <p>
                      A unique feature in Recruitment Agency theme is the one-click application of jobs in the basket. You can add multiple jobs in the basket and providing the candidate has uploaded their CV then they can simply apply for all the jobs in their basket at once.
                    </p>

                    <a href="#" class="post-box-read-more">Read More</a>
                </div><!-- /.post-box-content -->
            </div><!-- /.post-box -->
        </div><!-- /.col-sm-6 -->

        <div class="col-sm-12 col-md-6">
            <div class="post-box post-box-small">
                <div class="post-box-image">
                    <a href="#">
                        <img src="assets/img/tmp/blog-2.jpg" alt="">
                    </a>
                </div><!-- /.post-box-image -->

                <div class="post-box-content">
                    <h2><a href="#">APPLICATION STATUS’
<a></h2>

                    <p>
                        Candidates can view the current status of their application. When a candidate’s application is approved they receive an email notifying them.</
                    </p>
                </div><!-- /.post-box-content -->
            </div><!-- /.post-box -->

            <div class="post-box post-box-small">
                <div class="post-box-image">
                    <a href="#">
                        <img src="assets/img/tmp/blog-3.jpg" alt="">
                    </a>
                </div><!-- /.post-box-image -->

                <div class="post-box-content">
                    <h2><a href="#">JOB FILTERS
</a></h2>

                    <p>
                      With a strong filter system rest assured job hunters will find their dream job with ease. Filter by the type of vacancy, job sectors and when the job was posted.
                    </p>
                </div><!-- /.post-box-content -->
            </div><!-- /.post-box -->

            <div class="post-box post-box-small">
                <div class="post-box-image">
                    <a href="#">
                        <img src="assets/img/tmp/blog-4.jpg" alt="">
                    </a>
                </div><!-- /.post-box-image -->

                <div class="post-box-content">
                    <h2><a href="#">Candidate Profile Interface</a></h2>

                    <p>
                      The candidate profile page contains everything a candidate needs to get applying for jobs. From here they can edit account details, view their application history!

                    </p>
                </div><!-- /.post-box-content -->
            </div><!-- /.post-box -->


        </div><!-- /.col-sm-6 -->
    </div><!-- /.row -->
</div><!-- /.posts-->


	<div class="panels">
    <div class="row">
        <div class="panel-wrapper col-sm-4">
            <div class="panel-inner">
                <h2>Why Choose Us?</h2>

                <ul>
                    <li><i class="fa fa-check"></i> Collaboration up with Multi-national company.</li>
                    <li><i class="fa fa-check"></i> Offers jobs to freelancer</li>
                    <li><i class="fa fa-check"></i> Multiple Layout Options</li>
                </ul>
            </div><!-- /.panel-inner -->
        </div><!-- /.panel-wrapper -->

        <div class="panel-wrapper col-sm-4">
            <div class="panel-inner">
                <h2>Main Features</h2>

                <ul>
                    <li><i class="fa fa-check"></i> Temporary staffing</li>
                    <li><i class="fa fa-check"></i> Perks given to The Employee</li>
                    <li><i class="fa fa-check"></i> Recommandation from our company.</li>
                </ul>
            </div><!-- /.panel-inner -->
        </div><!-- /.panel-wrapper -->

        <div class="panel-wrapper col-sm-4">
            <div class="panel-inner">
                <h2>Transparent Pricing</h2>

                <p>There will be a direct contract signed by the company with the Employeee.</p>

            </div><!-- /.panel-inner -->
        </div><!-- /.panel-wrapper -->
    </div><!-- /.row -->
</div><!-- /.panels -->

	<div class="block background-secondary fullwidth candidate-title">
    <div class="page-title">
        <h2>Find Your Best Candidate</h2>

        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">

            </div><!-- /.col-* -->
        </div><!-- /.row -->
    </div><!-- /.page-title -->
</div><!-- /.fullwidth -->

<div class="row mt-60">


    <div class="candidate-boxes">





            <div class="col-sm-3 col-md-2">
                <div class="candidate-box">
                    <div class="candidate-box-image">
                        <a href="resume.html">
                            <img src="assets/img/tmp/resume-2.jpg" alt="">
                        </a>
                    </div><!-- /.candidate-box-image -->

                    <div class="candidate-box-content">
                        <h2></h2>
                        <h3>PR Manager</h3>
                    </div><!-- /.candidate-box-content -->
                </div><!-- /.candidate-box -->
            </div><!-- /.col-* -->



            <div class="col-sm-3 col-md-2">
                <div class="candidate-box">
                    <div class="candidate-box-image">
                        <a href="resume.html">
                            <img src="assets/img/tmp/resume-3.jpg" alt="">
                        </a>
                    </div><!-- /.candidate-box-image -->

                    <div class="candidate-box-content">
                        <h2></h2>
                        <h3>Data Mining</h3>
                    </div><!-- /.candidate-box-content -->
                </div><!-- /.candidate-box -->
            </div><!-- /.col-* -->



            <div class="col-sm-3 col-md-2">
                <div class="candidate-box">
                    <div class="candidate-box-image">
                        <a href="resume.html">
                            <img src="assets/img/tmp/resume-4.jpg" alt="">
                        </a>
                    </div><!-- /.candidate-box-image -->

                    <div class="candidate-box-content">
                        <h2></h2>
                        <h3>Python Developer</h3>
                    </div><!-- /.candidate-box-content -->
                </div><!-- /.candidate-box -->
            </div><!-- /.col-* -->



            <div class="col-sm-3 col-md-2">
                <div class="candidate-box">
                    <div class="candidate-box-image">
                        <a href="resume.html">
                            <img src="assets/img/tmp/resume.jpg" alt="">
                        </a>
                    </div><!-- /.candidate-box-image -->

                    <div class="candidate-box-content">
                        <h2></h2>
                        <h3>Data Analytist</h3>
                    </div><!-- /.candidate-box-content -->
                </div><!-- /.candidate-box -->
            </div><!-- /.col-* -->



            <div class="col-sm-3 col-md-2">
                <div class="candidate-box">
                    <div class="candidate-box-image">
                        <a href="resume.html">
                            <img src="assets/img/tmp/resume-1.jpeg" alt="">
                        </a>
                    </div><!-- /.candidate-box-image -->

                    <div class="candidate-box-content">
                        <h2></h2>
                        <h3>Java Developer</h3>
                    </div><!-- /.candidate-box-content -->
                </div><!-- /.candidate-box -->
            </div><!-- /.col-* -->

    </div><!-- /.candidate-boxes -->
</div><!-- /.row -->




</div><!-- /.container -->

<div class="cta-text">
	<div class="container">
		<div class="cta-text-inner">
			<div class="cta-text-before">I want to</div><!-- /.cta-large-before -->

			<a href="candidates.php" class="btn btn-secondary">Hire Employee</a>
		</div><!-- /.cta-text-inner -->
	</div><!-- /.container -->
</div><!-- /.cta-text -->


        </div><!-- /.main -->
    </div><!-- /.main-wrapper -->

    
    <?php
   include "footer_user.php"
   ?>