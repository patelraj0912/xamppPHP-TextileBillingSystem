<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>  
    <style>
        .box{
            border: 2px solid black;
            height: auto;
            width:100%;
        }
        .mtr{
            height:0.8cm;
            width:2cm;
            border:1px solid grey;
        }
        .head{
            text-align: center;
        }
        .mobile_num{
            text-align: end;
        }
        .firm_name{
            text-decoration-line: none;
            text-decoration-color: black;
            
            font-size: 1cm;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        .btn_print{
            display :none;
            visibility :none;
        }
    </style>  
    <title>CHALAN</title>
</head>

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

<body>
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
                    <div class="col-12 firm_name"><b><a href="https://rajtextile.netlify.app/">RAJ TEXTILE</a></b></div>
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
                            <div class="col-2 text-end">Name -GSTIN :</div>
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
                    <div class="col-4">Invoice Date : <?php echo $row['genrate']; ?></div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="row">
                            <div class="col-2 text-end">Quality Name :</div>
                            <div class="col-8"><?php echo $row['quality_name']; ?></div>
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
                    <div class="col-4">Rate : <?php echo $row['rate']; ?></div>
                </div>
            </div>

            <div class="row mt-3 mx-auto">
                <?php
                $count = 1;
                echo'<table>';
                for ($i = 0; $i<= 6; $i++) 
                {
                    echo '<tr>';
                    for ($j = 1; $j <= 13; $j++) 
                    {
                        if($i==0)
                        {
                            if($j==13)
                            {
                                echo '<td class="mtr text-center"> TOTAL </td>';
                            }
                            else{
                            echo '<td class="mtr text-center"> '.$j.' </td>';
                            }
                        }
                        else if($j==13)
                        {
                            echo '<td class="mtr text-center">'.$row['lot_'.$i].'</td>';
                        }
                        else{
                            echo '<td class="mtr text-center">'.$row['no_'.$count].'</td>';
                            $count++;
                        }
                        
                    }
                    echo '</tr>';
                }
                echo'</table>';
                ?>
                    
                </div>
                <hr>
                <div class="row">
                    <div class="col-3">Total Meter : <?php echo $row['total_meter']; ?></div>
                    <div class="col-3">Rate : <?php echo $row['rate']; ?></div>
                    <div class="col-3">Pcs. : <?php echo $row['pcs']; ?></div>
                    <div class="col-3">Amount : <?php echo $row['total_amount']; ?></div>
                </div>
                
        </div>
        <?php }
        } 
        ?>
        <div class="text-center">
            <button onclick="window.print()" class="btn btn-success">PRINT</button>
        </div>
    </div>
    <?php
}
else{
	echo "<script>window.open('login.php','_self')</script>";
}
?>
</body>
</html>