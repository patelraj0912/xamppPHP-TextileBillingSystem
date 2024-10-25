<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>  
    <style>
        .box{
            border: 3px solid black;
            height: auto;
            width: 100%;
        }
        .head{
            text-align: center;
        }
        .mobile_num{
            text-align: end;
        }
        .firm_name{
            font-size: 1cm;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        a{
            text-decoration: none;
        }
    </style>  
    <title>BILL</title>
</head>


<body>
 <?php
    session_start();
    if(isset($_SESSION['username'])){
    $count=1;
    include 'connection.php';
    $targetid = $_GET['id'];
   	$a = mysqli_query($abc,"select * from tbl_chalan where id = $targetid;");
    if (mysqli_num_rows($a)>0) 
    {
        $i = 1;
		while ($row=mysqli_fetch_array($a)) 
        {
            $amt=$row['total_amount'];
    ?> 
    <div class="container-fluid">
        <div class="box mt-5 mb-5">
            <div class="head">
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-4 text-center">શ્રી ગણેશાય નમ:</div>
                    <div class="col-4 mobile_num">Mo.98798 98358<br>92765 04090</div>
                </div>
                <div class="row">
                    <div class="col-12"><b>TAX INVOICE</bb></div>
                </div>
                <div class="row">
                    <div class="col-12 firm_name"><b>RAJ TEXTILE</b></div>
                </div>
                <div class="row">
                    <div class="col-12">A-7/8/9,Ganshayam Ind.,Jolwa.</div>
                </div>
                <div class="row">
                    <div class="col-12">GSTIN : 24CIZPP7265B1ZR</div>
                </div>
            </div>
            <hr>

            <div class="bill_to mb-3">
                <div class="row">
                    <div class="col-8">
                        <div class="row">
                            <div class="col-2 text-end">Name :</div>
                            <div class="col-8"><?php echo $row['firm_name']; ?></div>
                        </div>
                    </div>
                    <div class="col-4">Invoice No. : <?php echo $row['id']; ?></div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="row">
                            <div class="col-2 text-end">Add :</div>
                            <div class="col-8"><?php echo $row['address']; ?></div>
                        </div>
                    </div>
                    <div class="col-4">Invoice Date :<?php echo $row['genrate']; ?></div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="row">
                            <div class="col-2 text-end">GSTIN :</div>
                            <div class="col-8"><?php echo $row['gstin']; ?></div>
                        </div>
                    </div> 
                    <div class="col-4">Challan No : <?php echo $row['id']; ?></div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="row">
                            <div class="col-2 text-end">Broker :</div>
                            <div class="col-8"><?php echo $row['broker_name']; ?></div>
                        </div>
                    </div>
                    <div class="col-4">Due Date : <?php echo date('Y-m-d',strtotime($row['genrate'].'+'.$row['dhara'].' days'));  ?></div>
                </div>
            </div>

            <div class="product  table-bordered mb-3">
                <table class="table table-bordered border-dark">
                    <thead>
                      <tr>
                        <th class="col-1">NO</th>
                        <th class="col-4">Name of Product</th>
                        <th class="col-1">PCS.</th>
                        <th class="col-2">Meters</th>
                        <th class="col-2">Rate</th>
                        <th class="col-2">Amount</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="col-1"><?php echo $count; ?></td>
                        <td class="col-4"><?php echo $row['quality_name']; ?></td>
                        <td class="col-1"><?php echo $row['pcs']; ?></td>
                        <td class="col-2"><?php echo $row['total_meter']; ?></td>
                        <td class="col-2"><?php echo $row['rate']; ?></td>
                        <td class="col-2"><?php echo $row['total_amount']; ?></td>
                      </tr>
                      <tr>
                        <td colspan="5" class="col-10 text-end">TOTAL AMOUNT BEFORE TAX</td>
                        <td class="col-2"><?php echo $row['total_amount']; ?></td>
                      </tr>
                      <tr>
                        <td class="col-2" colspan="3">BANK DETAIL:</td>
                        <td colspan="2" class="col-10 text-end">Add SGST <b>[ 2.50% ]</b></td>
                        <td class="col-2"><?php echo $row['sgst']; ?></td>
                      </tr>
                      <tr>
                        <td class="col-2" colspan="3">Bank: Punjab International Bank</td>
                        <td colspan="2" class="col-10 text-end">Add CGST <b>[ 2.50% ]</b></td>
                        <td class="col-2"><?php echo $row['cgst']; ?></td>
                      </tr>
                      <tr>
                        <td class="col-2" colspan="3">A/C No.: 2450071002907</td>
                        <td colspan="2" class="col-10 text-end">Add IGST <b>[ 5% ]</b></td>
                        <td class="col-2"></td>
                      </tr>
                      <tr>
                        <td class="col-2" colspan="3">IFCS Code :YESB0SMCB07</td>
                        <td colspan="2" class="col-10 text-end">TOTAL AMOUNT</td>
                        <td class="col-2"><b><?php echo $row['final_amount']; ?></b></td>
                      </tr>
                    </tbody>
                </table>
            </div>

            <div class="footer">
                <div class="term_condition">
                    <b>TERMS OF SALE :</b><br>
                    <span>1). Bill to Bill Payment After Due Date 18%Interest</span><br>
                    <span>2). Any Complaints for Goods should be made within 7 days after that no compalain will be entertained.</span>
                </div>
                <div class="row">
                    <div class="col-6">Receiver's Sign._______________</div>
                    <div class="col-6 text-end">Authorised Sign._______________</div>
                </div>
            </div>

        </div>
    </div>
    <?php
        $i++;
        }
    } 

}
else{
	echo "<script>window.open('login.php','_self')</script>";
}
?>
</body>
</html>