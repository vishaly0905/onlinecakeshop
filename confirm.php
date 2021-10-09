<?php 
include('includes/connection.php');
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



if (isset($_GET['cancel'])) {
	mysqli_query($myConnection, "UPDATE tbltransacdetail SET status = 'Cancelled', remarks = 'Your order has been cancelled <br>
	 due to lack of communication <br> and incomplete informatio!' WHERE transac_code='".$_GET['cancel']."'")or die(mysqli_error($myConnection));
}
elseif (isset($_GET['confirm'])) {
	mysqli_query($myConnection, "UPDATE tbltransacdetail SET status = 'Confirmed', remarks = 'Your order has been confirmed!' WHERE transac_code='".$_GET['confirm']."'")or die(mysqli_error($myConnection));
}
 ?>
 <script type="text/javascript">
			alert("Transaction Updated.");
			window.location = "detail.php";
		</script>