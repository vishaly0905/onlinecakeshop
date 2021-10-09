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
 
if (isset($_POST['signup-submit'])) {

require 'connection.php';

$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$email = $_POST['mail'];
$con = $_POST['con'];
$address = $_POST['addre'];
$pos = $_POST['pos'];
$username = $_POST['uid'];
$pass = $_POST['pwd'];
$passcon = $_POST['pwdcon'];

if (empty($fname)||empty($lname)||empty($email)||empty($username)||empty($pass)||empty($passcon)) {
	header("Location: ../register.php?error=emptyfields&firstname=".$fname."&lastname=".$lname.
	"&mail=".$email."&uid=".$username);
	exit();
}
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$username)) {
	header("Location: ../register.php?error=invalidmail&uid=");
	exit();
}
else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	header("Location: ../register.php?error=invalidmail&uid=".$username);
	exit();
}
else if (!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
	header("Location: ../register.php?error=invaliduid&mail=".$email);
	exit();
}
else if ($pass !== $passcon) {
	header("Location: ../register.php?error=passwordcheck&firstname=".$fname."&lastname=".$lname.
	"&mail=".$email."&uid=".$username);
	exit();
} 
else{
	$sql = "SELECT * FROM tblusers WHERE username=? or email=?";
	$stmt = mysqli_stmt_init($myConnection);
	if (!mysqli_stmt_prepare($stmt,$sql)) {
	header("Location: ../register.php?error=sqlerror");
	exit();
	} 
	else{
		mysqli_stmt_bind_param($stmt,"ss",$username,$email);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);
		$resultCheck = mysqli_stmt_num_rows($stmt);
		if ($resultCheck > 0) {
			header("Location: ../register.php?error=usertaken&error=emailtaken");
			exit();
		}
		else{
			$sql = "INSERT INTO tblusers(fname,lname,email,contact,address,position,username,pass)VALUES(?,?,?,?,?,?,?,?)";
			mysqli_stmt_execute($stmt);
			if (!mysqli_stmt_prepare($stmt,$sql)) {
			header("Location: ../register.php?error=sqlerror");
			exit();
		}else{
			$hashedPwd =password_hash($pass,PASSWORD_DEFAULT);

			mysqli_stmt_bind_param($stmt,"ssssssss",$fname,$lname,$email,$con,$address,$pos,$username,$hashedPwd);
			mysqli_stmt_execute($stmt);
			
			?>
			<script type="text/javascript">
				alert("register successful");
				window.location = "../login.php";
			</script>
			
			
			<?php
			exit();
			}
		}
	}			
}
mysqli_stmt_close($stmt);
mysqli_close(myConnection);

}
else{
	header("Location: ../register.php");
	exit();
}
?>