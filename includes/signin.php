<?php 
if (isset($_POST['login-submit'])) {
	require 'connection.php';

 $mailuid = $_POST['mailuid'];
 $pass = $_POST['pwd'];

if (empty($mailuid)||empty($pass)) {
	header("Location: ../login.php?error=emptyfields");
	exit();
}
else{
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


	$sql = "SELECT * FROM tblusers WHERE username=? OR email=?";
	$stmt = mysqli_stmt_init($myConnection);
	if (!mysqli_stmt_prepare($stmt,$sql)) {
	header("Location: ../login.php?error=sqlerror");
	exit();
	}
	else{
		mysqli_stmt_bind_param($stmt,"ss",$mailuid,$mailuid);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		if ($row = mysqli_fetch_assoc($result)) {
			$pwdCheck = password_verify($pass,$row['pass']);
			if ($pwdCheck == false) {
				session_start();
				$_SESSION['userid'] = $row['user_id'];
				$_SESSION['useruid'] = $row['username'];
				$_SESSION['email'] = $row['email'];
				$_SESSION['fname'] = $row['fname'];
				$_SESSION['lname'] = $row['lname'];
				$_SESSION['address'] = $row['address'];
				$_SESSION['contact'] = $row['contact'];
				$_SESSION['position'] = $row['position'];
				header("Location: ../index.php?login=success");
				exit();
			//header("Location: ../login.php?error=wrongpwd");
			//exit();
			}
			elseif ($pwdCheck == true) {
				session_start();
				$_SESSION['userid'] = $row['user_id'];
				$_SESSION['useruid'] = $row['username'];
				$_SESSION['email'] = $row['email'];
				$_SESSION['fname'] = $row['fname'];
				$_SESSION['lname'] = $row['lname'];
				$_SESSION['address'] = $row['address'];
				$_SESSION['contact'] = $row['contact'];
				$_SESSION['position'] = $row['position'];
				header("Location: ../index.php?login=success");
				exit();
			}
			else{
				header("Location: ../login.php?error=wrongpwd");
				exit();
			}
		}
		else{
			header("Location: ../login.php?error=nouser");
			exit();
		}
	}
}

}
else{
	header("Location: ../index.php");
	exit();
	}