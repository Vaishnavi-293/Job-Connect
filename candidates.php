<?php
session_start();
require_once 'db_connect.php';

include 'config.php';

include('header.php');
?>
    <div class="main-wrapper">
        <div class="main">
            <div class="document-title">
                <div class="container">
                    <h1>Candidates</h1>
                </div><!-- /.container -->
            </div><!-- /.document-title -->

            <div class="document-breadcrumb">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Pages</a></li>
                        <li><a href="#">Custom page</a></li>
                    </ul>
                </div><!-- /.container -->
            </div><!-- /.document-title -->

<?php
$nos=0;
$sql = "SELECT * FROM login WHERE status = 2 "; // Modify this query as needed
$result = $conn->query($sql);
$nos=$result->num_rows;
?>

            <div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h2 class="page-header"><strong><?php echo $nos ?></strong> candidates matching your query</h2>

			<div class="candidates-list">
            <div class="form-group col-sm-12">
    <input type="text" id="searchInput" class="form-control" placeholder="Search for content..." onkeyup="searchTable()">
    </div>

            <table id="myTable" class="table">
        <thead>
        <tr class="text-center" >
                <th scope="col">Photo</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Qualification</th>
                <th scope="col">Experiance </th>
                <th scope="col">Position</th>
                <th scope="col">Address</th>
            </tr>
            
        </thead>
        <tbody>     
            <?php

   
if ($result->num_rows > 0) {    
while ($row = $result->fetch_assoc()) {
    
?>
       <tr>     
                <td class=""><img src="<?php echo BASE_URL . '/uploads/' . $row['photo']; ?>" alt="User Image" width="100"></td>
                <td class=""><?php echo $row["firstname"]; ?></td>
                <td class=""><?php echo $row["email"]; ?></td>
                <td class=""><?php echo $row["phone"]; ?></td>
                <td class=""><?php echo $row["qualification"];  ?></td>
                <td class=""><?php echo $row["experience"]; ?></td>
                <td class=""><?php echo $row["position"]; ?></td>
                <td class=""><?php echo $row["address"]; ?></td>
             
               

            </tr>
           
       
        <?php
    }
}
$conn->close();

?>

</tbody>
    </table>






</div><!-- /.candidates-list -->

	    </div><!-- /.col-* -->

    </div><!-- /.row -->
</div><!-- /.container -->
        </div><!-- /.main -->
    </div><!-- /.main-wrapper -->

   

<?php
   include "footer_user.php";
?>