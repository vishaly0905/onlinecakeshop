
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
			$fname = $_POST['firstname'];
		    $lname = $_POST['lastname'];
			$email = $_POST['Email'];
			$contct = $_POST['Contact'];
			$address = $_POST['Address'];
			
	   include('includes/connection.php');
		
	 			$query = 'UPDATE tblusers set fname ="'.$fname.'",
					lname ="'.$lname.'", email="'.$email.'",
					contact='.$contct.',address="'.$address.'" WHERE
					user_id ="'.$zz.'"';
					$result = mysqli_query($myConnection, $query) or die(mysqli_error($myConnection));
							
?>	
<script type="text/javascript">
			alert("Update Successfull.");
			window.location = "customer.php";
		</script>
