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
						$product = $_POST['product'];
						$qntty = $_POST['qntty'];
					    $quantity = $_POST['quantity'];
					    $available = $_POST['available'];
					    $price = $_POST['price'];
					    $profit = $_POST['profit'];
					    $sale = $_POST['sale'];
					    $date = $_POST['date'];
					    $cat = $_POST['cat'];
					    $user = $_POST['user'];
					    $nq = $_POST['nq'];
						$supplier = $_POST['supplier'];
						
				
					switch($_GET['action']){
						case 'add':
						
									$query = "INSERT INTO tblproducts
								(product_name,quantity,available,price,profit,selling_price,date_in,category_id,user_id,supplier_id,product_code,status)
								VALUES ('".$product."','".$qntty."','".$qntty."','".$price."','".$profit."','".$sale."','$date','".$cat."','".$user."','".$supplier."','".$nq."','available')";
								$result = mysqli_query($db, $query) or die(mysqli_error($db));
												
								
							
						break;
									
						}
				?>
    	<script type="text/javascript">
			alert("Successfully added.");
			window.location = "product.php";
		</script>
</body>
</html>