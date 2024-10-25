<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    <title>PENDING PAYMENT</title>
</head>
<body>
<?php

session_start();
        if(isset($_SESSION["username"]))
        {
 
    include 'connection.php';
   	// $a = mysqli_query($abc,"select c.*,p.* from tbl_chalan c LEFT OUTER JOIN tbl_payment p on c.id = p.id where c.payment_status=0 OR p.remaining_amount>0;");
   	// $a = mysqli_query($abc,"select c.id,c.gstin,c.firm_name,c.quality_name,c.genrate,c.due_date,c.final_amount,c.payment_status,p.remaining_amount from tbl_chalan c LEFT OUTER JOIN tbl_payment p on c.id = p.bill_no where c.payment_status=0 OR p.remaining_amount>0;");
   	$a = mysqli_query($abc,"select * from tbl_bill where payment_status=0;");
    
    include 'navbar.php'?>
    <div class="container-fluid" style="margin-top: 50px;">
	<?php
	if (mysqli_num_rows($a)>0) {
        
	?>
	<table class="table table-bordered text-center">
		<tr>
			<th class="1">Bill No.</th>
			<th class="2">Firm Name</th>
			<!-- <th>GSTIN</th> -->
			<th class="2">Quality</th>
			<th class="1">Date</th>
			<!-- <th class="1">Due Date</th> -->
            <th class="3">Bill Amount</th>
            <th class="3">Remaining Amount</th>
			<th class="2">Payment Status</th>
			
		</tr>
		<?php
		$i = 1;
		while ($row=mysqli_fetch_array($a)) 
		{
			?>
			<tr>
				<td><?php echo $row['bill_no']; ?></td>
				<td><?php echo $row['firm_name']."<br>".$row['gstin']; ?></td>
				<td><?php echo $row['quality_name']; ?></td>
				<td><?php echo $row['date']; ?></td>
				<!-- <td><?php echo $row['due_date']; ?></td> -->
				<!-- <td><?php echo date('Y-m-d',strtotime($row['genrate'].'+'.$row['dhara'].' days'));?></td> -->
                <td><?php echo $row['bill_amount'].".00"; ?></td>
                <td>
					<?php
					
					if($row['remaining_amount'] == $row['bill_amount'])
						{
							echo "<span class='badge bg-danger'>".$row['remaining_amount'].".00</span>";
						}
						else
						{
							echo "<span class='badge bg-primary'>".$row['remaining_amount'].".00</span>";
						}
					?>
				</td>
				<!-- <td><?php echo $row['status']; ?></td> -->
				<td>
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
				</td>
				<td>
					<a href="payment_addto_receive.php?id=<?php echo $row['bill_no'];?>">
						<button class="btn btn-primary">Payment Receive</button>
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