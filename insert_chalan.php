<?php
include 'connection.php';
if (isset($_POST['submit'])) {
	$firm_name = $_POST['firm_name'];
	$broker_name = $_POST['broker_name'];
	$quality_name = $_POST['quality_name'];
	$rate = $_POST['rate'];
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
    $dhara= $_POST['dhara'];
    $date = gmdate('y-m-d');
    $pcs=0;
    for($i=1;$i<=72;$i++)
    {
        if($_POST['no_'.$i] != null){
            $pcs++;
        }
    }
    
    $a = mysqli_query($abc,"select * from tbl_firm where firm_name='$firm_name';");
    $row=mysqli_fetch_array($a);
    $gstin=$row['gstin'];
    $address=$row['address'];
    
	$qry = "INSERT INTO tbl_chalan(firm_name,gstin,address,broker_name,quality_name,rate,dhara,genrate,pcs,no_1,no_2,no_3,no_4,no_5,no_6,no_7,no_8,no_9,no_10,no_11,no_12,no_13,no_14,no_15,no_16,no_17,no_18,no_19,no_20,no_21,no_22,no_23,no_24,no_25,no_26,no_27,no_28,no_29,no_30,no_31,no_32,no_33,no_34,no_35,no_36,no_37,no_38,no_39,no_40,no_41,no_42,no_43,no_44,no_45,no_46,no_47,no_48,no_49,no_50,no_51,no_52,no_53,no_54,no_55,no_56,no_57,no_58,no_59,no_60,no_61,no_62,no_63,no_64,no_65,no_66,no_67,no_68,no_69,no_70,no_71,no_72) VALUES('$firm_name','$gstin','$address','$broker_name','$quality_name','$rate','$dhara','$date','$pcs','$no_1','$no_2','$no_3','$no_4','$no_5','$no_6','$no_7','$no_8','$no_9','$no_10','$no_11','$no_12','$no_13','$no_14','$no_15','$no_16','$no_17','$no_18','$no_19','$no_20','$no_21','$no_22','$no_23','$no_24','$no_25','$no_26','$no_27','$no_28','$no_29','$no_30','$no_31','$no_32','$no_33','$no_34','$no_35','$no_36','$no_37','$no_38','$no_39','$no_40','$no_41','$no_42','$no_43','$no_44','$no_45','$no_46','$no_47','$no_48','$no_49','$no_50','$no_51','$no_52','$no_53','$no_54','$no_55','$no_56','$no_57','$no_58','$no_59','$no_60','$no_61','$no_62','$no_63','$no_64','$no_65','$no_66','$no_67','$no_68','$no_69','$no_70','$no_71','$no_72');";
    if(mysqli_query($abc,$qry)){
        $b = mysqli_query($abc,"select * from tbl_chalan where id=(select max(id) from tbl_chalan);");
        $data=mysqli_fetch_array($b);
        $targetid=$data['id'];
        $due_date=date('Y-m-d',strtotime($data['genrate'].'+'.$data['dhara'].' days'));
        echo $due_date;
        $amt=$data['total_amount'];
        $sgst=($amt*2.50)/100;
        $cgst=($amt*2.50)/100;
        $final_amount=round($sgst+$cgst+$amt);
        

        if(mysqli_query($abc,"update tbl_chalan set sgst=$sgst,cgst=$cgst,final_amount=$final_amount,due_date=$due_date where id =$targetid;"));
        {
            mysqli_query($abc,"INSERT into tbl_bill(bill_no,firm_name,gstin,quality_name,date,bill_amount,remaining_amount)
                                             values($targetid,'$firm_name','$gstin','$quality_name','$date','$final_amount','$final_amount');");
            echo "<script> alert('Chalan Added');</script>";
	        echo "<script>window.open('view_chalan.php','_self')</script>";
        }
    }

	else{
		echo"Error:" .$sql ."
		". mysqli_error($abc);
	}
mysqli_close($abc);
}

?>