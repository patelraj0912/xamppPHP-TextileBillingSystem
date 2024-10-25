<?php
include 'connection.php';
if(isset($_GET['id']))
{
    $targetid = $_GET['id'];
    // echo "ID";
if (isset($_POST['submit'])) 
{
    // echo "SUBMIT";
    $a = mysqli_query($abc,"select * from tbl_bill where bill_no=$targetid;");
    if (mysqli_num_rows($a)==1) 
    {
        // echo "ROW 0";
		$row=mysqli_fetch_array($a); 
        
        $firm_name = $row['firm_name'];
        $gstin = $row['gstin'];
        $bill_amount = $row['bill_amount'];
        $bill_rec_amount = $row['received_amount'];
        $remaining_amount = $row['remaining_amount'];
        $payment_method = $_POST['payment_method'];
        $cheque_number = $_POST['cheque_number'];
        $bank_name= $_POST['bank_name'];
        $payment_date = $_POST['payment_date'];
        $received_amount = $_POST['received_amount'];
        $description = $_POST['description'];
        if($bill_amount != $received_amount)
        {
            // if($remaining_amount > $received_amount)
            // {
                $remaining_amount=$remaining_amount-$received_amount;
            // }
            // else if($bill_amount < $received_amount)
            // {
            //     $remaining_amount=$remaining_amount-$bill_amount;
            // }
            $bill_rec_amount=$bill_rec_amount+$received_amount;
        }
        else{
            $remaining_amount=0;
        }

        $sql = "INSERT INTO tbl_payment(bill_no,firm_name,gstin,payment_method,cheque_number,bank_name,payment_date,bill_amount,received_amount,remaining_amount,description) 
                                 VALUES($targetid,'$firm_name','$gstin','$payment_method','$cheque_number','$bank_name','$payment_date','$bill_amount','$received_amount','$remaining_amount','$description');";
        // $sql="UPDATE tbl_payment SET firm_name='$firm_name',gst_in='$gstin',payment_method='$payment_method',cheque_number='$cheque_number',bank_number='$bank_name',payment_date='$payment_date' WHERE bill_no=$targetid;";
        if(mysqli_query($abc,$sql)) 
        {
            mysqli_query($abc,"UPDATE tbl_bill set remaining_amount=$remaining_amount,received_amount=$bill_rec_amount where bill_no=$targetid;");
            if($remaining_amount<=0 && $bill_rec_amount>=$bill_amount)
            {
                mysqli_query($abc,"update tbl_bill set payment_status=1 where bill_no=$targetid;");
            }
            echo "<script> alert('Payment Received');</script>";
            echo "<script>window.open('payment_received.php','_self')</script>";
        }
        else
        {
            echo"Error:" .$sql ."
            ". mysqli_error($abc);
        }
    } 

mysqli_close($abc);
}
}

?>