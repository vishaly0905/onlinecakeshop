<?php include('includes/connection.php');?>  
<!--header area-->
<?php include 'includes/header.php'; ?>
<!--sidebar area-->
<?php include 'includes/sidebar.php'; ?>
<?php
if(!isset($_SESSION["userid"])){
 header("Location: login.php");
}
else{
?>

<?php
}
?>

                <!-- Page Heading -->
                
                <!-- /.row -->
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

$query = 'SELECT * FROM tblsupplier
              WHERE
              supplier_id ='.$_GET['id'];
            $result = mysqli_query($myConnection, $query) or die(mysqli_error($myConnection));
              while($row = mysqli_fetch_array($result))
              {   
               $zz = $row['supplier_id'];
               $i = $row['supplier_name'];
               $a = $row['contact'];
               $b = $row['email'];
               $d = $row['address'];
               
      
             
              }
              
              $id = $_GET['id'];
         
?>

         <div class="container">
          <div class="card card-register mx-auto mt-5">
           <div class="card-header">Update Supplier</div>
             <div class="card-body">

                        <form role="form" method="post" action="updatesupplier1.php">
                            
                            <div class="form-group">
                                <input type="hidden" name="id" value="<?php echo $zz; ?>" />
                            </div>
                            <div class="form-group">
                              <input class="form-control" placeholder="Supplier Name" name="suppliername" value="<?php echo $i; ?>">
                            </div>
                            <div class="form-group">
                              <input class="form-control" placeholder="Contact" name="contact" value="<?php echo $a; ?>">
                            </div> 
                            <div class="form-group">
                              <input class="form-control" placeholder="Email" name="Email" value="<?php echo $b; ?>">
                            </div>  
                            <div class="form-group">
                              <input class="form-control" placeholder="Address" name="address" value="<?php echo $d; ?>">
                            </div> 
                           
                            <button type="submit" class="btn btn-default">Update</button>
                         


                      </form>  
                    </div>
                </div>
                
<!--footer area-->
<?php include 'includes/footer.php'; ?>