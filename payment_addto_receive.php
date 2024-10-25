        <?php
        session_start();
        if(isset($_SESSION["username"]))
        {
        include 'navbar.php';
        include 'connection.php';
        if(isset($_GET['id']))
        {
            $targetid = $_GET['id'];
            $a=mysqli_query($abc,"select * from tbl_chalan where id=$targetid;");
            if (mysqli_num_rows($a)>0) 
            {
                $i = 1;
                while ($row=mysqli_fetch_array($a)) 
                {
                    $amt=$row['final_amount'];

        ?>
<!DOCTYPE html>
<html lang="en">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
        <script>
            function validation(){
            var payment_method=document.add_payment.payment_method.value;
            var cheque_number=document.add_payment.cheque_number.value;
            var payment_date=document.payment.add_payment_date.value;
            var received_amount=document.add_payment.received_amount.value;
            // var amt=<?php echo $amt;?>;
            // document.write(amt);
            if(payment_method=="")
            {

                alert("Select Payment Method.");
                return false;
            }
            else if(payment_date=="")
            {

                alert("Select Payment Date.");
                return false;
            }
            else if(payment_method=="Cheque" ){
                if(cheque_number==""){
                    alert("Enter Cheque Number.");
                    return false;
                }    
            }
            else if(received_amount=="")
            {
                alert("Enter Received Amount");
                return false;
            }
            else{
                return true;
            }
        }
        </script>
        <title>PAYMENT RECEIVE FORM</title>
    </head>
    <body>


    <!-- action="insert_payment.php?id=<?php echo $row['id'];?>" -->
        <div class="container" style="margin-top: 50px;">
            <form method="POST" onsubmit="" action="insert_payment.php?id=<?php echo $row['id']?>" name="add_payment" >
                <div class="class"><h3></h3></div>
                <div class="row mt-5">
                    <div class="col-md-2">Bill No.:</div>
                    <div class="col-md-4"><?php echo $targetid;?></div>
                    <div class="col-md-2">Transaction Method :</div>
                    <div class="col-md-4">
                        <select name="payment_method" id="payment_method" class="form-select">
                            <option value="" disabled selected>Select Payment Method</option>
                            <option value="Cheque">Cheque</option>
                            <option value="NEFT">NEFT</option>
                            <option value="RTGS">RTGS</option>
                            <option value="Cash">Cash</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-2">Date :</div>
                    <div class="col-md-4"><input type="date" name="payment_date" id="payment_date" class="form-control"></div> 
                    <div class="col-md-2">Cheque No :</div>
                    <div class="col-md-4"><input type="number" id="cheque_number" name="cheque_number" class="form-control" placeholder="Enter Cheque Number"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-2">Amount :</div>
                    <div class="col-md-4"><input type="number" name="received_amount" id="received_amount" class="form-control"></div> 
                    <div class="col-md-2">Bank Name :</div>
                    <div class="col-md-4"><input type="text" name="bank_name" id="bank_name" class="form-control"></div>     
                </div>
                <div class="row mt-3">
                    <div class="col-md-2">Description :</div>
                    <div class="col-md-4"><textarea name="description" id="description" cols="30" rows="3" class="form-control"></textarea></div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center mt-4">
                        <input type="submit" value="SAVE" name="submit" class="btn btn-success text-center" style="margin-top:20px;">
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
    }
    else{
        echo "<script>window.open('login.php','_self')</script>";
    }
?>