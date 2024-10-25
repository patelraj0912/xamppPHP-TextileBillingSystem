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
        if(isset($_SESSION["username"]))
        {
    include 'connection.php';
   	$a = mysqli_query($abc,"select sum(bill_amount) as Total_Amount,sum(remaining_amount) as Pending_Amount,firm_name from tbl_bill where payment_status=0 group by(firm_name);");
    
    include 'navbar.php'?>
    <div class="container" style="margin-top: 50px;">
	<?php
	if (mysqli_num_rows($a)>0) {
        
	?>
	<table class="table table-bordered">
		<tr>
			<td>No.</td>
			<td>Firm Name</td>
			<!-- <td>GSTIN</td> -->
			<!-- <td>Quality</td>
			<td>Date</td>
			<td>Due Date</td> -->
            <td>Total Bill Amount</td>
            <td>Pending Amount</td>
			<!-- <td>Payment Status</td> -->
		</tr>
		<?php
		$i = 1;
        $grand_total=0;
		while ($row=mysqli_fetch_array($a)) 
		{
            $total_amount=$grand_total+$row['Total_Amount'];
            $pending_amount=$grand_total+$row['Pending_Amount'];
			?>
			<tr>

				<td><?php echo $i; ?></td>
				<td><?php echo $row['firm_name']; ?></td>
				<!-- <td><?php echo $row['gstin']; ?></td>
				<td><?php echo $row['quality_name']; ?></td>
				<td><?php echo $row['genrate']; ?></td>
				<td><?php echo date('Y-m-d',strtotime($row['genrate'].'+'.$row['dhara'].' days'));?></td> -->
                <td><?php echo $row['Total_Amount']; ?></td>
                <td><?php echo $row['Pending_Amount']; ?></td>
				<!-- <td><?php echo $row['status']; ?></td> -->
				<!-- <td>
					<?php 
						if($row['payment_status']==1) 
						{
							 echo "<span class='badge bg-success'>Recived</span>";
						}
                        else
						{
							 echo "<span class='badge bg-danger'>Pending</span>";
						}
					?>
				</td> -->
				<!-- <td>
					<a href=".php?id=<?php echo $row['id']?>">
						<button class="btn btn-primary">Edit</button>
					</a>
					<a href=".php?id=<?php echo $row['id']?>">
						<button class="btn btn-danger">Delete</button> 
					</a>
				</td>  -->
			</tr>
			<?php
			$i++;
		}
		?>
	<?php
    }
	?>
    <tr>
        <td colspan="2" class="text-end"><b>Total Amount</b></td>
        <td><?php echo $total_amount; ?></td>
        <td><?php echo $pending_amount; ?></td>
    </tr>
    </table>
</div>
<?php
		}
		else{
			echo "<script>window.open('login.php','_self')</script>";
		}
?>
</body>
</html>