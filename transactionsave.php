<?php
include "includes/connection.php";
 session_start();
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



          $del = $_POST['del'];             
            $query = 'SELECT current_date FROM tblusers';
            $result = mysqli_query($myConnection, $query) or die(mysqli_error($myConnection));
              while($row = mysqli_fetch_array($result))
              {   
               $date = $row['current_date'];
              }
        $tat=time();
if($_GET["action"]=='adds') {
            foreach($_SESSION['cart'] as $id => $value) {

            //Save Transaction
     $query2 = "INSERT INTO tbltransac(transac_code,date,user_id,product_code,qty,price,total)values('".$tat."','".$date."','".$_SESSION['userid']."','".$value['ids']."','".$value['quantity']."','".$value['price']."','".$value['quantity'] * $value['price']."')"; 
     mysqli_query($myConnection,$query2)or die(mysqli_error($myConnection));

     //Update Product
     $sql = "UPDATE tblproducts SET available = available - '".$value['quantity']."' WHERE product_code='".$value['ids']."'";
     mysqli_query($myConnection,$sql)or die(mysqli_error($myConnection));
  }
  //Save Transaction Detail 
  $query3 = "INSERT INTO tbltransacdetail(transac_code,date,customer_id,deliveryfee,totalprice,status,delivery_date)VALUES('".$tat."','".$date."','".$_SESSION['userid']."',150,'".$_SESSION['mm']."'+150,'Pending','".$del."')";
 mysqli_query($myConnection,$query3)or die(mysqli_error($myConnection)); 


  
}
							
						 unset($_SESSION["cart"]);
             unset($_SESSION['mm']);	
				?>
    	
<script type="text/javascript">
			alert("Successfully added.");
			window.location = "order.php";
		</script>
