<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
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


			$zz = $_POST['id'];
			$productname = $_POST['Productname'];
		    $quantity = $_POST['Quantity'];
			$price = $_POST['Price'];
			$prft = $_POST['Markup'];
			$sale = $_POST['Selling'];
			$code = $_POST['code'];
			
			
	   include('includes/connection.php');
		
	 			$query = 'UPDATE tblproducts set product_name ="'.$productname.'", price="'.$price.'",
					profit ="'.$prft.'",
					selling_price="'.$sale.'" WHERE
					product_code ="'.$code.'"';
					$result = mysqli_query($myConnection, $query) or die(mysqli_error($myConnection));
							
?>	
<script type="text/javascript">
			alert("Update Successfull.");
			window.location = "product.php";
		</script>
</body>
</html>