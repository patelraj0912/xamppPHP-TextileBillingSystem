<?php
$abc = mysqli_connect("localhost","root","","raj_textile");
if ($abc) {
	//echo "<script>alert('Connected')</script>";
} 
else{
	echo "<script>alert('Fail Database Connection')</script>";
}
?>
