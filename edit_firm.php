<?php
session_start();
if(isset($_SESSION['username'])){
include 'connection.php';
if(isset($_GET['id']))
{
    $targetid = $_GET['id'];
    $result = mysqli_query($abc,"select * from tbl_firm where id=$targetid");

    if (mysqli_num_rows($result)==1) {
		while ($row=mysqli_fetch_array($result)) 
		{


?>

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
        include 'navbar.php';
        include 'connection.php';
        ?>     
        <div class="container-fluid" style="margin-top: 50px;">
            <form method="POST" name="add_firm" action="<?php $_SERVER['PHP_SELF'];?>">
                <div class="class"><h3>ADD NEW FIRM</h3></div>
                <div class="row mt-5">
                    <div class="col-md-2">Firm Name :</div>
                    <div class="col-md-4"><input type="text" id="firm_name" name="firm_name" value="<?php echo $row['firm_name'];?>" placeholder="Enter Firm Name" class="form-control"></div>
                    <div class="col-md-2">GSTIN :</div>
                    <div class="col-md-4"><input type="text" id="gstin" name="gstin" value="<?php echo $row['gstin'];?>"  placeholder="Enter GST Number" class="form-control"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-2">Mobile Number :</div>
                    <div class="col-md-4"><input type="text" id="contact_number" name="contact_number" value="<?php echo $row['contact_number'];?>"  placeholder="Enter Contact Number" class="form-control"></div>
                    <div class="col-md-2">Address :</div>
                    <div class="col-md-4">
                        <?php $address=$row['address']; ?>
                        <textarea class="form-control" id="address" name="address" value="<?php echo $row['address'];?>" placeholder="<?php echo $row['address'];?>" ></textarea>
                    </div> 
                </div>
                <div class="row">
                    <div class="col-md-12 text-center mt-4">
                        <input type="submit" value="SAVE" name="update" class="btn btn-success text-center" style="margin-top:20px;">
                        <input type="reset" value="CLEAR" name="reset" class="btn btn-danger text-center" style="margin-top:20px;">
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>

<?php 
        }
    }
}
include 'connection.php';
if (isset($_POST['update'])) 
{
	$firm_name = $_POST['firm_name'];
	$gstin = $_POST['gstin'];
	$contact_number = $_POST['contact_number'];
	$new_address = $_POST['address'];
    if($new_address==null)
    {
        $new_address=$address;
    }
    
    $update_qry="UPDATE tbl_firm SET firm_name='$firm_name',gstin='$gstin',contact_number='$contact_number',address='$new_address' where id=$targetid;";
    if(mysqli_query($abc,$update_qry))
    {
        echo "<script>alert('Firm Updated.')</script>";
        echo "<script>window.open('view_firm.php','_self')</script>";
    }
    else{
        echo "<script>alert('Failed')</script>";
    }
    
}
}
else{
	echo "<script>window.open('login.php','_self')</script>";
}
?>