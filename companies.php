<?php
session_start();
require_once 'db_connect.php';


include('header.php');

?>


    <div class="main-wrapper">
        <div class="main">
            <div class="document-title">
                <div class="container">
                    <h1>Companies</h1>
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
$sql = "SELECT * FROM login WHERE status = 3 "; // Modify this query as needed
$result = $conn->query($sql);
$nos=$result->num_rows;
?>
            <div class="container">
    <div class="row">
    <div class="col-sm-12">
        <h2 class="page-header">Displaying <strong><?= $nos; ?></strong> companies matching your query</h2>

        <div class="companies-list">
        <div class="form-group col-sm-12">
    <input type="text" id="searchInput" class="form-control" placeholder="Search for content..." onkeyup="searchTable()">
    </div>

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



        </div><!-- /.companies-list -->

         
    </div><!-- /.col-* -->

    
</div><!-- /.row -->

</div><!-- /.container -->
        </div><!-- /.main -->
    </div><!-- /.main-wrapper -->

   <?php
   include "footer_user.php"
   ?>