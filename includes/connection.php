//vishal yadav<?php
// $db = mysqli_connect('localhost:3306', 'root','Aa@1mysql') or
 //       die ('Unable to connect. Check your connection parameters.');
 //       mysqli_select_db($db, 'cakes' ) or die(mysqli_error($db));
//?>
<?php
function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "Aa@1mysql";
 $db = "cakes";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }
   
?>