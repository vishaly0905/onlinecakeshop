
<?php include('includes/connection.php');?>  

<!--header area-->
<?php include 'includes/header.php'; ?>

<!--sidebar area-->
<?php include 'includes/sidebar.php'; ?>

<!--breadcrumbs area-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="admin.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Suppliers</li>
          </ol>


<!-- Supplier Tables -->
<?php
if(!isset($_SESSION["userid"])){
 header("Location: index.php");
}
else{
?>
<?php
}
?> 
          <div class="card mb-3">
            <div class="card-header">
              <h2>Suppliers</h2> <a href="#" data-toggle="modal" data-target="#logoutModal3" type="button" class="btn btn-lg btn-info fas fa-user-tie"> Add New</a>
            <div class="card-body">
              <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped"id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Supplier Name</th>
                                        <th>Contact</th>
                                        <th>Email</th>
                                        <th>Address</th> 
                                        <th>Update</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php  
$db_host = "localhost:3306";
// Place the username for the MySQL database here
$db_username = "root"; 
// Place the password for the MySQL database here
$db_pass = "Aa@1mysql"; 
// Place the name for the MySQL database here
$db_name = "cakes";

// Run the actual connection here 
$myConnection= mysqli_connect("$db_host","$db_username","$db_pass","$db_name") or die ("could not connect to mysql");
//mysqli_select_db($myConnection,"cakes") or die ("no database");        

								  
                $query = 'SELECT * FROM tblsupplier';
                    $result = mysqli_query($myConnection, $query) or die (mysqli_error($myConnection));
                  
                        while ($row = mysqli_fetch_assoc($result)) {
                                             
                            echo '<tr>';
                            echo '<td>'. $row['supplier_id'].'</td>';
                            echo '<td>'. $row['supplier_name'].'</td>';                     
                            echo '<td>'. $row['contact'].'</td>';
                            echo '<td>'. $row['email'].'</td>';
                            echo '<td>'. $row['address'].'</td>';
                            echo '<td>  ';
                            echo ' <a title="Update Supplier" type="button" class="btn btn-lg btn-warning fas fa-edit" href="updatesupplier.php?action=edit & id='.$row['supplier_id'] . '"></a> ';
                            
                            echo '</tr> ';
                }
            ?> 
                                    
                                </tbody>
                            </table>
                        </div>
            </div>
           
          </div>

          
        </div>
        <!-- /.container-fluid -->

<!--footer area-->
<?php include 'addsupplier.php'; ?>