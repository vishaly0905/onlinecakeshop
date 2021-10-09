

<?php 
$db = mysqli_connect('localhost', 'root','Aa@1mysql') or
        die ('Unable to connect. Check your connection parameters.');
        mysqli_select_db($db, 'cakes' ) or die(mysqli_error($db));
		?>  

<body>
<?php

	

			if (!isset($_GET['do']) || $_GET['do'] != 1) {
								
	
			switch ($_GET['type']) {
				case 'product':
					$query = 'DELETE FROM tblproducts
							WHERE
							product_id = ' . $_GET['id'];
						$result = mysqli_query($db, $query) or die(mysqli_error($db));
						
?>
			<script type="text/javascript">
				alert("Successfully Deleted.");
				window.location = "product.php";
			</script>				
				
			<?php
			//break;
				}
			}
			?>

</body>
</html>