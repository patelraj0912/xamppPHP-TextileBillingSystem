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
    session_start();
    if(isset($_SESSION["username"]))
    {
        include 'navbar.php';
        include 'connection.php';
        if(isset($_GET['id']))
        {
            $targetid = $_GET['id'];
            // echo explode("/",$val);
            // $last_amount=explode("/",$val);
            // $targetid=substr($val,0,strrpos($val,"/"));
            // $last_amount=substr($val,strrpos($val,"/")+1); 
            $select_qry = mysqli_query($abc,"select * from tbl_chalan where id=$targetid");

            if (mysqli_num_rows($select_qry)==1) 
            {
                while ($data=mysqli_fetch_array($select_qry)) 
                {
        ?>     




<!-- Edit Chalan Form -->
        <div class="container-fluid" style="margin-top: 50px;">
            <form method="POST" >
                <div class="class text-center"><h3>CHALAN NO : <b><?php echo $targetid;?></b></h3></div>

                <div class="row">
                    <div class="col-md-2">Firm Name :</div>
                    <div class="col-md-4">
                        <select name="firm_name" class="form-select">
                            <option value="<?php echo $data['firm_name'];?>"selected ><?php echo $data['firm_name'];?></option>
                            <?php
                            $data_firm_name = mysqli_query($abc ,"SELECT * FROM tbl_firm where status=1;");
                            while($firm = mysqli_fetch_array($data_firm_name))
                            {
                                echo "<option value=".$firm['firm_name'].">" .$firm['firm_name'] ."</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-2">Broker Name :</div>
                    <div class="col-md-4"><input type="text" id="broker_name" name="broker_name"  class="form-control" placeholder="Enter Broker Name" value="<?php echo $data['broker_name'];?>"></div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-2">Quality Name :</div>
                    <div class="col-md-4"><input type="text" id="quality_name" name="quality_name" class="form-control" placeholder="Enter Quality" value="<?php echo $data['quality_name'];?>" ></div> 
                    <div class="col-md-2">Rate :</div>
                    <div class="col-md-4"><input type="number" id="rate" name="rate" class="form-control" placeholder="Enter Rate per Meter" step="0.01" value="<?php echo $data['rate'];?>"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-2">Dhara :</div>
                    <div class="col-md-4"><input type="text" id="dhara" name="dhara" class="form-control" placeholder="Enter Days" value="<?php echo $data['dhara'];?>"></div> 
                    <div class="col-md-2"></div>
                    <div class="col-md-4"></div>
                </div>
                
                    
                <div class="row mt-3 ">
                <?php
                $count = 1;
                $lot=1;

                for ($row = 0; $row <= 6; $row++) 
                {
                    echo '<div class="row">';
                    for ($col = 1; $col <= 12; $col++) 
                    {
                        if($row==0)
                        {
                          echo '<div class="col-md-1 text-center"><b>'.$col.'</b></div>';
                        }
                        else{
                ?>
                            <div class="col-md-1"><input type="number" class="form-control" step="0.01" name="no_<?php echo $count;?>" id="no_<?php echo $count;?>" placeholder="no_<?php echo $count;?>" value="<?php echo $data['no_'.$count];?>"></div>
                <?php
                            $count++;
                        }
                    }
                    echo '</div>';
                }
                ?>
                    
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <input type="submit" value="SAVE" name="update" class="btn btn-success text-center" style="margin-top:20px;">
                        <input type="reset" value="CLEAR" name="reset" class="btn btn-danger text-center" style="margin-top:20px;">
                    </div>
                </div>
            </form>
        </div>
<!-- Edit Chalan Form -->
    </body>





    <!-- Update chalan -->
    <?php 
                }
            }
        }
        include 'connection.php';
        if (isset($_POST['update'])) 
        {
            $firm_name = $_POST['firm_name'];
            $broker_name = $_POST['broker_name'];
            $quality_name = $_POST['quality_name'];
            $rate = $_POST['rate'];
            $dhara = $_POST['dhara'];

            $no_1= $_POST['no_1'];
            $no_2= $_POST['no_2'];
            $no_3= $_POST['no_3'];
            $no_4= $_POST['no_4'];
            $no_5= $_POST['no_5'];
            $no_6= $_POST['no_6'];
            $no_7= $_POST['no_7'];
            $no_8= $_POST['no_8'];
            $no_9= $_POST['no_9'];
            $no_10= $_POST['no_10'];
            $no_11= $_POST['no_11'];
            $no_12= $_POST['no_12'];
            $lot_1 = floatval($no_1+$no_2+$no_3+$no_4+$no_5+$no_6+$no_7+$no_8+$no_9+$no_10+$no_11+$no_12);
    
            $no_13= $_POST['no_13'];
            $no_14= $_POST['no_14'];
            $no_15= $_POST['no_15'];
            $no_16= $_POST['no_16'];
            $no_17= $_POST['no_17'];
            $no_18= $_POST['no_18'];
            $no_19= $_POST['no_19'];
            $no_20= $_POST['no_20'];
            $no_21= $_POST['no_21'];
            $no_22= $_POST['no_22'];
            $no_23= $_POST['no_23'];
            $no_24= $_POST['no_24'];
            $lot_2 = floatval($no_13+$no_14+$no_15+$no_16+$no_17+$no_18+$no_19+$no_20+$no_21+$no_22+$no_23+$no_24);

            $no_25= $_POST['no_25'];
            $no_26= $_POST['no_26'];
            $no_27= $_POST['no_27'];
            $no_28= $_POST['no_28'];
            $no_29= $_POST['no_29'];
            $no_30= $_POST['no_30'];
            $no_31= $_POST['no_31'];
            $no_32= $_POST['no_32'];
            $no_33= $_POST['no_33'];
            $no_34= $_POST['no_34'];
            $no_35= $_POST['no_35'];
            $no_36= $_POST['no_36'];
            $lot_3 = floatval($no_25+$no_26+$no_27+$no_28+$no_29+$no_30+$no_31+$no_32+$no_33+$no_34+$no_35+$no_36);
            
            $no_37= $_POST['no_37'];
            $no_38= $_POST['no_38'];
            $no_39= $_POST['no_39'];
            $no_40= $_POST['no_40'];
            $no_41= $_POST['no_41'];
            $no_42= $_POST['no_42'];
            $no_43= $_POST['no_43'];
            $no_44= $_POST['no_44'];
            $no_45= $_POST['no_45'];
            $no_46= $_POST['no_46'];
            $no_47= $_POST['no_47'];
            $no_48= $_POST['no_48'];
            $lot_4 = floatval($no_37+$no_38+$no_39+$no_40+$no_41+$no_42+$no_43+$no_44+$no_45+$no_46+$no_47+$no_48);
    
            $no_49= $_POST['no_49'];
            $no_50= $_POST['no_50'];
            $no_51= $_POST['no_51'];
            $no_52= $_POST['no_52'];
            $no_53= $_POST['no_53'];
            $no_54= $_POST['no_54'];
            $no_55= $_POST['no_55'];
            $no_56= $_POST['no_56'];
            $no_57= $_POST['no_57'];
            $no_58= $_POST['no_58'];
            $no_59= $_POST['no_59'];
            $no_60= $_POST['no_60'];
            $lot_5 = floatval($no_49+$no_50+$no_51+$no_52+$no_53+$no_54+$no_55+$no_56+$no_57+$no_58+$no_59+$no_60);
    
            $no_61= $_POST['no_61'];
            $no_62= $_POST['no_62'];
            $no_63= $_POST['no_63'];
            $no_64= $_POST['no_64'];
            $no_65= $_POST['no_65'];
            $no_66= $_POST['no_66'];
            $no_67= $_POST['no_67'];
            $no_68= $_POST['no_68'];
            $no_69= $_POST['no_69'];
            $no_70= $_POST['no_70'];
            $no_71= $_POST['no_71'];
            $no_72= $_POST['no_72'];
            $lot_6 = floatval($no_61+$no_62+$no_63+$no_64+$no_65+$no_66+$no_67+$no_68+$no_69+$no_70+$no_71+$no_72);
    
            $pcs=0;
            for($i=1;$i<=72;$i++)
            {
                if( $_POST['no_'.$i] != 0){
                    $pcs++;
                }
            }

            $total_meter=floatval($lot_1+$lot_2+$lot_3+$lot_4+$lot_5+$lot_6);
            $total_amount=floatval($total_meter*$rate);
            $sgst=($total_amount*2.50)/100;
            $cgst=($total_amount*2.50)/100;
            $final_amount=round($sgst+$cgst+$total_amount);

            $update_qry = "update tbl_chalan set firm_name='$firm_name',broker_name='$broker_name',quality_name='$quality_name',rate='$rate',dhara='$dhara',
            no_1 ='$no_1 ',no_2 ='$no_2 ',no_3 ='$no_3 ',no_4 ='$no_4 ',no_5 ='$no_5',no_6 ='$no_6',no_7 ='$no_7',no_8 ='$no_8',no_9 ='$no_9 ',no_10 ='$no_10 ',no_11 ='$no_11 ',no_12 ='$no_12 ',lot_1='$lot_1',
            no_13 ='$no_13 ',no_14 ='$no_14 ',no_15 ='$no_15 ',no_16 ='$no_16 ',no_17 ='$no_17 ',no_18 ='$no_18 ',no_19 ='$no_19 ',no_20 ='$no_20 ',no_21 ='$no_21',no_22 ='$no_22',no_23 ='$no_23',no_24 ='$no_24',lot_2='$lot_2',
            no_25 ='$no_25 ',no_26 ='$no_26 ',no_27 ='$no_27 ',no_28 ='$no_28 ',no_29 ='$no_29 ',no_30 ='$no_30 ',no_31 ='$no_31' ,no_32 ='$no_32 ',no_33 ='$no_33 ',no_34 ='$no_34 ',no_35 ='$no_35 ',no_36 ='$no_36 ',lot_3='$lot_3',
            no_37 ='$no_37 ',no_38 ='$no_38 ',no_39 ='$no_39 ',no_40 ='$no_40 ',no_41 ='$no_41' ,no_42 ='$no_42 ',no_43 ='$no_43 ',no_44 ='$no_44 ',no_45 ='$no_45 ',no_46 ='$no_46 ',no_47 ='$no_47 ',no_48 ='$no_48 ',lot_4='$lot_4',
            no_49 ='$no_49 ',no_50 ='$no_50 ',no_51 ='$no_51' ,no_52 ='$no_52 ',no_53 ='$no_53 ',no_54 ='$no_54 ',no_55 ='$no_55 ',no_56 ='$no_56 ',no_57 ='$no_57 ',no_58 ='$no_58 ',no_59 ='$no_59 ',no_60 ='$no_60 ',lot_5='$lot_5',
            no_61 ='$no_61 ',no_62 ='$no_62 ',no_63 ='$no_63 ',no_64 ='$no_64 ',no_65 ='$no_65 ',no_66 ='$no_66 ',no_67 ='$no_67 ',no_68 ='$no_68 ',no_69 ='$no_69 ',no_70 ='$no_70 ',no_71 ='$no_71 ',no_72 ='$no_72 ',lot_6='$lot_6',
            pcs='$pcs',total_meter='$total_meter',total_amount='$total_amount',cgst='$cgst',sgst='$sgst',final_amount='$final_amount'
            where id=$targetid;";
            if(mysqli_query($abc,$update_qry))
            {
                $select_bill=mysqli_query($abc,"select * from tbl_bill where bill_no=$targetid;");
                if (mysqli_num_rows($select_bill)==1) 
                {
                    $bill_data=mysqli_fetch_array($select_bill); 

                    $last_rem_amt=$bill_data['remaining_amount'];
                    $last_rev_amt=$bill_data['received_amount'];
                    $last_bill_amt=$bill_data['bill_amount'];
                    if($last_bill_amount == $last_rem_amt)
                    {
                        $remaining_amount=$final_amount;
                        mysqli_query($abc,"UPDATE tbl_bill set payment_status=0 where bill_no=$targetid;");
                    }
                    else if($last_bill_amount != $last_rem_amt)
                    {
                        $temp=$final_amount-$last_rev_amt;
                        if($temp > 0)
                        {
                            $remaining_amount=$temp;
                        }
                        else if($temp < 0)
                        {
                            $remaining_amount=$temp;
                            mysqli_query($abc,"UPDATE tbl_bill set payment_status=1 where bill_no=$targetid;");
                        }
                    }

                    mysqli_query($abc,"UPDATE tbl_payment set bill_amount=$final_amount where bill_no=$targetid;");
                    mysqli_query($abc,"UPDATE tbl_bill set bill_amount=$final_amount,remaining_amount=$remaining_amount where bill_no=$targetid;");
                }
                

                // if(mysqli_query($abc,"UPDATE tbl_payment set bill_amount=$final_amount,remaining_amount=$final_amount where bill_no=$targetid;"))
                echo "<script>alert('Chalan Updated.')</script>";
                echo "<script>window.open('view_chalan.php','_self')</script>";
            }
            else{
                echo "<script>alert('Failed')</script>";
            }
        }
    }
    // Update chalan 


    else{
	      echo "<script>window.open('login.php','_self')</script>";
    }
    ?>
</html>