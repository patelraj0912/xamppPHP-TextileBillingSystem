<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    <title>VIEW FIRM</title>
</head>
<body>
<?php

session_start();
if((isset($_SESSION['username']))){
    include 'connection.php';
   	$a = mysqli_query($abc,"select * from tbl_firm where status=1;");
    include 'navbar.php'?>
    <div class="container" style="margin-top: 50px;">
	<?php
	if (mysqli_num_rows($a)>0) {
	
	?>
	<table class="table table-bordered">
		<tr>
			<td>No.</td>
			<td>Firm Name</td>
			<td>GSTIN</td>
			<td>Contact Number</td>
			<td>Address</td>
			<td>Date</td>
			<td>Status</td>
		</tr>
		<?php
		$i = 1;
		while ($row=mysqli_fetch_array($a)) 
		{
			?>
			<tr>
				<td><?php echo $row['id']; ?></td>
				<td><?php echo $row['firm_name']; ?></td>
				<td><?php echo $row['gstin']; ?></td>
				<td><?php echo $row['contact_number']; ?></td>
				<td><?php echo $row['address']; ?></td>
				<td><?php echo $row['genrate']; ?></td>
				<!-- <td><?php echo $row['status']; ?></td> -->
				<td>
					<?php 
						if($row['status']==1) 
						{
							 echo "<span class='badge bg-success'>Active</span>";
						}
                        else
						{
							 echo "<span class='badge bg-danger'>Disactive</span>";
						}
					?>
				</td>
				<td>
					<a href="edit_firm.php?id=<?php echo $row['id']?>">
						<button class="btn btn-primary">Edit</button>
					</a>
					<a href="delete_firm.php?id=<?php echo $row['id']?>">
						<button class="btn btn-danger">Delete</button> 
					</a>
				</td> 
			</tr>
			<?php
			$i++;
		}
		?>
	</table>
	<?php
    }
	?>
</div>
<?php
}
else{
	echo "<script>window.open('login.php','_self')</script>";
}
?>
</body>
</html>