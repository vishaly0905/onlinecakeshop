<!DOCTYPE html>

<?php include('includes/connection.php');?>  

<!--header area-->
<?php include 'includes/header.php'; ?>

<!--sidebar area-->
<?php include 'includes/sidebar.php'; ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Contact</title>
</head>
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/sb-new.css">
<div>
<body background="img/straw.jpg"> 

<ul >
        <li class="nav-item" >
          <a class="nav-link" href="">
            <i class="fas fa-fw fa-phone"></i>
            <span>Mobile No.:   817797392</span>
          </a>
        </li>
           <li class="nav-item">
           <a class="nav-link" href="">
           <i class="fas fa-fw fa-envelope"></i>
            <span>Email:   vishaly0905@gmail.com</span></a>
            </li>
		</li>
           <li class="nav-item">
           <a class="nav-link" href="contact.php">
           <i class="fas fa-fw fa-home"></i>
            <span>Address: Pune,Maharashtra</span></a>
            </li>
			
         </ul>
     
<form action="mailto:vishaly9075@hotmail.com" method="post" enctype="text/plain">
    <label>Your name:</label>
    <input type="text" name="YName"><br>
    <label>Your Email:</label>
    <input type="text" name="Email"><br

    <label> Your Message:</label><br>
    <textarea name="message" rows="10" cols="80"></textarea><br>
    <input type="submit" value="submit" >
</form>

</body>
</html>
