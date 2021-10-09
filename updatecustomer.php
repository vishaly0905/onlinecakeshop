
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

$query = 'SELECT * FROM tblusers
              WHERE
              user_id ='.$_GET['id'];
            $result = mysqli_query($myConnection, $query) or die(mysqli_error($myConnection));
              while($row = mysqli_fetch_array($result))
              {   
               $zz = $row['user_id'];
               $i = $row['fname'];
               $a = $row['lname'];
               $b = $row['email'];
               $d = $row['contact'];
               $c = $row['address'];
      
             
              }
              
              $id = $_GET['id'];
         
?>

               <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Update Customer</div>
        <div class="card-body">

                        <form role="form" method="post" action="updatecustomer1.php">
                            
                            <div class="form-group">
                                <input type="hidden" name="id" value="<?php echo $zz; ?>" />
                            </div>
                            <div class="form-group">
                              <input class="form-control" placeholder="First Name" name="firstname" value="<?php echo $i; ?>">
                            </div>
                            <div class="form-group">
                              <input class="form-control" placeholder="Last Name" name="lastname" value="<?php echo $a; ?>">
                            </div> 
                            <div class="form-group">
                              <input class="form-control" placeholder="Email" name="Email" value="<?php echo $b; ?>">
                            </div>  
                            <div class="form-group">
                              <input class="form-control" placeholder="Contact" name="Contact" value="<?php echo $d; ?>">
                            </div> 
                            <div class="form-group">
                              <input class="form-control" placeholder="Address" name="Address" value="<?php echo $c; ?>">
                            </div>
                           
                            <button type="submit" class="btn btn-default">Update</button>
                         


                      </form>  
                    </div>
                </div>
                </div>
        
       


<?php include 'includes/footer.php'; ?>



