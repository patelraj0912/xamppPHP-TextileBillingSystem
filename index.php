
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
</head>
<body>
	<?php
session_start();
if(isset($_SESSION["username"]))
{
  include 'navbar.php';
}
else{
	echo "<script>window.open('login.php','_self')</script>";
}
  ?> 

</body>
</html>
