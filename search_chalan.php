<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    <title>SEARCH CHALAN</title>
    <script>
            function validation(){
            var bill_no=document.search_bill.bill_no.value;
            
            
            if(bill_no=="" || bill_no<= "0"){
                alert("Invalid Bill/Chalan Number. ");
                return false;
            }
            else{
                return true;
            }
        }
        </script>
</head>
<body>
        <?php
		session_start();
		if(isset($_SESSION['username'])){
            include 'navbar.php';
        ?>  
        
        
        <div class="container" style="margin-top: 50px;">
            <form method="POST" name="search_bill" onsubmit ="return validation();" action="<?php $_SERVER['PHP_SELF'];?>">
                <div class="class"><h3>SEARCH CHALAN/BILL</h3></div>
                <div class="row mt-5">
                    <div class="col-2">Chalan/Bill No :</div>
                    <div class="col-4"><input type="text" id="bill_no" name="bill_no" class="form-control" placeholder="Enter Chalan/Bill No."></div>
                    <div class="col- text-center mt-4">
                        <input type="submit" value="search" name="search" class="btn btn-success text-center" style="margin-top:20px;">
                    </div>
                </div>
            </form>
        </div>
<?php
    include 'connection.php';
    if(isset($_POST['search']))
    {
        $targetid=mysqli_real_escape_string($abc,$_POST['bill_no']);
   	    $a = mysqli_query($abc,"select * from tbl_chalan where id=$targetid;");
    ?>
    <div class="container" style="margin-top: 50px;">
	<?php
	if (mysqli_num_rows($a)>0) 
    {
	
	?>
	<table class="table table-bordered">
		<tr>
			<td>Chalan No.</td>
			<td>Firm Name</td>
			<td>Broker Name</td>
			<td>Quality</td>
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
				<td><?php echo $row['firm_name']; ?></td>
				<td><?php echo $row['broker_name']; ?></td>
				<td><?php echo $row['quality_name']; ?></td>
				<td><?php echo $row['rate']; ?></td>
				<td><?php echo $row['total_meter']; ?></td>
				<td><?php echo $row['final_amount']; ?></td>

				<!-- <td><?php echo $row['status']; ?></td>  -->
				 <!-- <td>
					<?php 
						if($row['payment_status']==1) 
						{
							 echo "<span class='badge bg-success'>Active</span>";
						}
                        else
						{
							 echo "<span class='badge bg-danger'>Disactive</span>";
						}
					?>
				</td> -->
				<td>
					<a href="chalan_view.php?id=<?php echo $row['id']?>">
						<button class="btn btn-primary">View Chalan</button>
                    </a>
                    <a href="view_bill.php?id=<?php echo $row['id']?>">
						<button class="btn btn-primary">View Bill</button>
                    </a>
					<!-- <a href="edit_firm.php?id=<?php echo $row['id']?>"> -->
						<button class="btn btn-primary">Edit</button>
					<!-- </a> -->
					<!-- <a href="delete_firm.php?id=<?php echo $row['id']?>"> -->
						<button class="btn btn-danger">Delete</button> 
					<!-- </a> -->
				</td> 
			</tr>
			<?php
			$i++;
		}
		?>
	</table>
	<?php
    
    }
    if(mysqli_num_rows($a)<1)
    {
        echo "No Record Found.";
    }
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