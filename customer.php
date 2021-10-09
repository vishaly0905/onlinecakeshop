
<?php include('includes/connection.php');?>  

<!--header area-->
<?php include 'includes/header.php'; ?>

<!--sidebar area-->
<?php include 'includes/sidebar.php'; ?>

<!--breadcrumbs area-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Customers</li>
          </ol>


<!-- CustomerTables -->
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
              <h2>Customers </h2> <!-- <a href="#" data-toggle="modal" data-target="#logoutModal2"  type="button" class="btn btn-lg btn-info fas fa-user-plus"> Add New</a> -->
            <div class="card-body">
              <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped"id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Address</th>
                                        <th>Options</th>
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

								  
                $query = 'SELECT * FROM tblusers WHERE position="Customer"';
                    $result = mysqli_query($myConnection, $query) or die (mysqli_error($myConnections));
                  
                        while ($row = mysqli_fetch_assoc($result)) {
                                             
                            echo '<tr>';
                            echo '<td>'. $row['user_id'].'</td>';
                            echo '<td>'. $row['fname'].'</td>';
                            echo '<td>'. $row['lname'].'</td>';
                            echo '<td>'. $row['email'].'</td>';
                            echo '<td>'. $row['contact'].'</td>';
                            echo '<td>'. $row['address'].'</td>';
                            echo '<td>  ';
                            echo ' <a title="Update Customer" type="button" class="btn btn-lg btn-warning fas fa-user-edit" href="updatecustomer.php?action=edit & id='.$row['user_id'] . '"></a> </td>';
                           /* echo ' <a title="Delete Customer" type="button" class="btn btn-lg btn-danger fas fa-trash-alt" href="deletecustomer.php?type=customer&delete & id=' . $row['customer_id'] . '"></a> ';*/
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

<!--footer area

-->