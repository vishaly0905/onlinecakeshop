<?php
       
       $db = mysqli_connect('localhost', 'root','Aa@1mysql') or
        die ('Unable to connect. Check your connection parameters.');
        mysqli_select_db($db, 'cakes' ) or die(mysqli_error($db));
       
       
        ?>  
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
  <?php
						$sm = $_POST['supplier'];
					    $contacts = $_POST['contact'];
					    $emails = $_POST['email'];
						$address = $_POST['address'];
				
					switch($_GET['action']){
						case 'add':			
								$query = "INSERT INTO tblsupplier(supplier_name,contact,email,address)
								VALUES ('".$sm."','".$contacts."','".$emails."','".$address."')";
								$result = mysqli_query($db, $query) or die(mysqli_error($db));
							
						break;
									
						}
				?>
    	<script type="text/javascript">
			alert("Successfully added.");
			window.location = "supplier.php";
		</script>
</body>
</html>