<?php
include 'connection.php';
if (isset($_POST['submit'])) {
	$firm_name = $_POST['firm_name'];
	$gstin = $_POST['gstin'];
	$contact_number = $_POST['contact_number'];
	$address = $_POST['address'];
	$date = gmdate('y-m-d');
	$sql = "INSERT INTO tbl_firm(firm_name,gstin,contact_number,address,genrate) VALUES('$firm_name','$gstin','$contact_number','$address','$date');";
	if(mysqli_query($abc,$sql)) {
		echo "<script> alert('Firm Added');</script>";
		echo "<script>window.open('view_firm.php','_self')</script>";
	}

	else{
		echo"Error:" .$sql ."
		". mysqli_error($abc);
	}
mysqli_close($abc);
}

?>