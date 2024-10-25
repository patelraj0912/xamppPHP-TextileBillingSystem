<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    <title>CHALAN</title>
</head>
<body>
<?php

session_start();
if(isset($_SESSION['username'])){
    include 'connection.php';
   	$a = mysqli_query($abc,"select * from tbl_chalan order by id desc;");
    include 'navbar.php'?>
    <div class="container-fluid" style="margin-top: 50px;">
	<?php
	if (mysqli_num_rows($a)>0) {
	
	?>
	<table class="table table-bordered">
		<tr>
			<td>Chalan No.</td>
			<td>Firm Name</td>
			<td>Rate</td>
			<td>Total Meter</td>
            <td>Amount With Tax</td>
			<td>Action</td>
		</tr>
		<?php
		$i = 1;
		while ($row=mysqli_fetch_array($a)) 
		{
			?>
			<tr>
				<td><?php echo $row['id']; ?></td>
				<td><?php echo $row['firm_name']."<br><b>Broker:</b>".$row['broker_name']."<br><b>Quality:</b>".$row['quality_name'] ; ?></td>
				<!-- <td><?php echo $row['broker_name']; ?></td> -->
				<!-- <td><?php echo $row['quality_name']; ?></td> -->
				<td><?php echo $row['rate']; ?></td>
				<td><?php echo $row['total_meter']; ?></td>
				<td><?php echo $row['final_amount']; ?></td>

				<td>
					<a href="chalan_view.php?id=<?php echo $row['id']?>"class="mt-2">
						<button class="btn btn-sm btn-outline-secondary">View Chalan</button>
                    </a>
                    <a href="view_bill.php?id=<?php echo $row['id']?>" class="mt-2">
						<button class="btn btn-sm btn-primary">View Bill</button>
                    </a>
					<a href="edit_chalan.php?id=<?php echo $row['id'];?>"class="mt-2">
						<button class="btn btn-success">Edit</button>
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