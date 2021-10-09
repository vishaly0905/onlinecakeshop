
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


$query = 'SELECT user_id,concat(fname," ",lname)as name,email,username,position FROM tblusers
              WHERE
              user_id ='.$_GET['id'];
            $result = mysqli_query($myConnection, $query) or die(mysqli_error($myConnection));
              while($row = mysqli_fetch_array($result))
              {   
               $zz = $row['user_id'];
               $i = $row['name'];
               $b = $row['email'];
               $d = $row['username'];
               $c = $row['position'];
      
             
              }
              
              $id = $_GET['id'];
         
?>

               <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Admin Detail</div>
        <div class="card-body">

            <tr>
              <td align="center" width="20%"><b style="font-size: 30px">Admin Name: </b></td>
              <td align="center" width="20%">
                <a style="font-size: 24px"><?php echo $i; ?></a>
              </td>
            </tr>
        <br>
        <br>
         <tr>
              <td align="center" width="20%"><b style="font-size: 30px">Email: </b></td>
              <td align="center" width="20%">
                <a style="font-size: 24px"><?php echo $b; ?></a>
              </td>
            </tr>
        <br>
        <br>
         <tr>
              <td align="center" width="20%"><b style="font-size: 30px">Username: </b></td>
              <td align="center" width="20%">
                <a style="font-size: 24px"><?php echo $d; ?></a>
              </td>
            </tr>
        <br>
        <br>
         <tr>
              <td align="center" width="20%"><b style="font-size: 30px">Position: </b></td>
              <td align="center" width="20%">
                <a style="font-size: 24px"><?php echo $c; ?></a>
              </td>
            </tr>
        <br>
        <br>

                         
                    </div>
                </div>
                </div>
        
       


 ?>



