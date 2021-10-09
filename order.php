<?php include('includes/connection.php');?>  

<!--header area-->
<?php include 'includes/header.php'; ?>

<!--sidebar area-->
<?php include 'includes/sidebar.php'; ?>

<!--breadcrumbs area-->
<!--breadcrumbs area-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">List of Orders</li>
          </ol>
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
             <center> <div class="border" style="width: 500px"><h1>List of Order</h1></div></center>
            <div class="card-body">
              <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Order No.#</th>
                                        <th>Order Date</th>
                                        <th>Delivery Date</th>
                                        <th>Total Price</th>
                                        <th>Status</th>
                                        <th width="250">Remarks</th>
                                        <th></th>
                                      <!--   <th>Option</th> -->
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

                
                $query = "SELECT * FROM tbltransacdetail  WHERE customer_id='".$_SESSION['userid']."'";
                    $result = mysqli_query($myConnection, $query) or die (mysqli_error($myConnection));
                  
                        while ($row = mysqli_fetch_assoc($result)) {
                                             
                            echo '<tr>';
                            echo '<td>'. $row['detail_id'].'</td>';
                            echo '<td>'. $row['transac_code'].'</td>';                     
                            echo '<td>'. $row['date'].'</td>';
                            echo '<td>'. $row['delivery_date'].'</td>';
                            echo '<td>&#8377 '. $row['totalprice'].'</td>';
                            echo '<td>'. $row['status'].'</td>';
                            echo '<td>'. $row['remarks'].'</td>';
                            echo '<td>  ';
                            echo '<center> <a class="btn btn-info" title="View list Of Ordered" href="orderdetail.php?id='. $row['transac_code'].'">View detail</a> </center></td>';
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

<?php include 'includes/footer.php'; ?>
<?php include 'addtransac.php'; ?>