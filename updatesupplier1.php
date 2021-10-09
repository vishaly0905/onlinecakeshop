<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
			$zz = $_POST['id'];
			$supplier = $_POST['suppliername'];
		    $contact = $_POST['contact'];
			$email = $_POST['Email'];
			$address = $_POST['address'];
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
			
	   include('includes/connection.php');
		
	 			$query = 'UPDATE tblsupplier set supplier_name ="'.$supplier.'",
					contact ='.$contact.', email="'.$email.'",
					address ="'.$address.'" WHERE
					supplier_id ="'.$zz.'"';
					$result = mysqli_query($myConnection, $query) or die(mysqli_error($myConnection));
							
?>	
<script type="text/javascript">
			alert("Update Successfull.");
			window.location = "supplier.php";
		</script>
</body>
</html>