<?php
       
       include('includes/connection.php');
       
       
        ?>  
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

						$fname = $_POST['firstname'];
					    $lname = $_POST['lastname'];
					    $email = $_POST['Email'];
						$contct = $_POST['Contact'];
						$address = $_POST['Address'];
				
					switch($_GET['action']){
						case 'add':			
								$query = "INSERT INTO tblcustomer
								(customer_id,fname, lname, email,contact,address)
								VALUES ('Null','".$fname."','".$lname."','".$email."','$contct','".$address."')";
								mysqli_query($myConnection,$query)or die ('Error in updating Database');
							
						break;
									
						}
				?>
    	<script type="text/javascript">
			alert("Successfully added.");
			window.location = "customer.php";
		</script>
</body>
</html>