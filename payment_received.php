<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    <title>RECEIVED PAYMENT</title>
</head>
<body>
<?php

session_start();
if(isset($_SESSION['username'])){
    include 'connection.php';
   	$a = mysqli_query($abc,"select * from tbl_payment order by bill_no;");
    
    include 'navbar.php'?>
    <div class="container" style="margin-top: 50px;">
	<?php
	if (mysqli_num_rows($a)>0) {
        
	?>
	<table class="table table-bordered">
		<tr>
			<td>Bill No.</td>
			<td>Firm Name</td>
			<td>Payment Method</td>
			<td>Cheque Number</td>
			<td>Bank Name</td>
            <td>Payment Date</td>
			<td>Bill Amount</td>
			<td>Received Amount</td>
			<td>Remaining Amount</td>
			<td>Description</td>
		</tr>
		<?php
		$i = 1;
		while ($row=mysqli_fetch_array($a)) 
		{
			?>
			<tr>
				<td><?php echo $row['bill_no']; ?></td>
				<td><?php echo $row['firm_name']."<br>".$row['gstin']; ?></td>
				<td><?php echo $row['payment_method']; ?></td>
				<td><?php echo $row['cheque_number']; ?></td>
				<td><?php echo $row['bank_name']; ?></td>
                <td><?php echo $row['payment_date']; ?></td>
                <td><?php echo $row['bill_amount']; ?></td>
                <td><?php echo "<span class='badge bg-success'>".$row['received_amount'].".00</span>"; ?></td>
                <td>
					<?php 
					// echo "--"; 
					if($row['remaining_amount'] < 0)
					{
						echo "<span class='badge bg-danger'>".$row['remaining_amount'].".00</span>"; 
					}
					else
					{
						echo "<span class='badge bg-primary'>".$row['remaining_amount'].".00</span>"; 
					}
					?>
				</td>
                <td><?php echo $row['description']; ?></td>
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