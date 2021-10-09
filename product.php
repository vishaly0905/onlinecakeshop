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
         <li class="breadcrumb-item active">Products</li>
          </ol>


<!-- Product Tables -->
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
              <h2>Products</h2> 
			  <a href="#" data-toggle="modal" data-target="#logoutModal1" type="button" class="btn btn-lg btn-info fas fa-birthday-cake"> Add New</a>
            <div class="card-body">
              <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped"id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Available</th>
                                        <th>Original Price</th>
                                        <th>Markup</th>
                                        <th>Selling Price</th>
                                        <th>Date In</th>
                                        <!--<th>Category</th>
                                        <<th>Supplier</th>
                                        <th>Encoder</th>
                                        <th>Product Code</th>-->
                                        <th>Status</th>
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
mysqli_select_db($myConnection,"cakes") or die ("no database");        

								  
                $query = 'SELECT * FROM tblproducts';
                    $result = mysqli_query($myConnection, $query) or die (mysqli_error($myConnection));
                  
                        while ($row = mysqli_fetch_assoc($result)) {
                                             
                            echo '<tr>';
                            echo '<td>'. $row['product_id'].'</td>';
                            echo '<td>'. $row['product_name'].'</td>';
                            echo '<td>'. $row['quantity'].'</td>';
                            echo '<td>'. $row['available'].'</td>';
                            echo '<td>'. $row['price'].'</td>';
                            echo '<td>'. $row['profit'].'</td>';
                            echo '<td>'. $row['selling_price'].'</td>';
                            echo '<td>'. $row['date_in'].'</td>';
                            /*echo '<td>'. $row['category_id'].'</td>';
                            echo '<td>'. $row['supplier_id'].'</td>';
                            echo '<td>'. $row['user_id'].'</td>';
                            echo '<td>'. $row['product_code'].'</td>';*/
                            echo '<td>'. $row['status'].'</td>';
                            echo '<td>  ';
                            echo ' <a title="Update Product" type="button" class="btn btn-lg btn-warning fas fa-edit" href="updateproduct.php?action=edit & id='.$row['product_code'].'"></a> ';
                            echo ' <a title="Delete Product" type="button" class="btn btn-lg btn-danger fas fa-trash-alt" href="deleteproduct.php?type=product&delete & id=' . $row['product_id'] . '"></a>';
                            echo '</td> ';
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
<?php include 'addproduct.php'; ?>