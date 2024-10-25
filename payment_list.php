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
   	$a = mysqli_query($abc,"select * from tbl_bill;");
    
    include 'navbar.php'?>
    <div class="container" style="margin-top: 50px;">
	<?php
	if (mysqli_num_rows($a)>0) {
        
	?>
	<table class="table table-bordered text-center">
		<tr>
			<th class="1">Bill No.</th>
			<th class="3">Firm Name</th>
			<th class="3">Quality</th>
            <th class="3">Bill Amount</th>
			<th class="2">Payment Status</th>
		</tr>
		<?php
		$i = 1;
		while ($row=mysqli_fetch_array($a)) 
		{
			?>
			<tr>
				<td class="1"><b><?php echo $row['bill_no']; ?><b></td>
				<td class="3"><?php echo $row['firm_name']."<br>".$row['gstin']; ?></td>
				<td class="3"><?php echo $row['quality_name']; ?></td>
                <td class="3"><?php echo $row['bill_amount']; ?></td>
				<td class="2">
					<?php 
						if($row['payment_status']==1) 
						{
							 echo "<span class='badge bg-success'>Recived</span>";
						}
                        else
						{
							if($row['received_amount']>0)
							{
							 	echo "<span class='badge bg-primary'>Pending</span>";
							}
							else
							{
								echo "<span class='badge bg-danger'>Pending</span>";
							}
						}
					?>
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