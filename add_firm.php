<!DOCTYPE html>
<html lang="en">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
        <script>
            function validation(){
            var firm_name=document.add_firm.firm_name.value;
            var gstin=document.add_firm.gstin.value;
            var address=document.add_firm.address.value;
            var contact_number=document.add_firm.contact_number.value;
            
            if(firm_name=="" || gstin=="" || address=="" || contact_number==""){
                alert("Fill All fields");
                return false;
            }
            else if(contact_number.length!=10){
                alert("CONTACT number must be 10 digits");
                return false;
            }
            else if(gstin.length!=24){
                alert("GST number must be 24 characters.");
                return false;
            }
            else{
                return true;
            }
        }
        </script>
        <title>ADD FIRM</title>
    </head>
    <body>


        <?php
        session_start();
        if(isset($_SESSION["username"]))
        {
            include 'navbar.php';

        ?>  
        
        
        <div class="container-fluid" style="margin-top: 50px;">
            <form method="POST" name="add_firm" onsubmit="return validation();" action="insert_firm.php">
                <div class="class"><h3>ADD NEW FIRM</h3></div>
                <div class="row mt-5">
                    <div class="col-md-2">Firm Name :</div>
                    <div class="col-md-4"><input type="text" id="firm_name" name="firm_name"  placeholder="Enter Firm Name" class="form-control"></div>
                    <div class="col-md-2">GSTIN :</div>
                    <div class="col-md-4"><input type="text" id="gstin" name="gstin"  placeholder="Enter GST Number" class="form-control"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-2">Mobile Number :</div>
                    <div class="col-md-4"><input type="text" id="contact_number"   placeholder="Enter Contact Number" class="form-control"></div>
                    <div class="col-md-2">Address :</div>
                    <div class="col-md-4">
                        <textarea id="address" name="address"  placeholder="Enter Address" class="form-control"></textarea>
                    </div> 
                </div>
                <div class="row">
                    <div class="col-md-12 text-center mt-4">
                        <input type="submit" value="SAVE" name="submit" class="btn btn-success text-center" style="margin-top:20px;">
                        <input type="reset" value="CLEAR" name="reset" class="btn btn-danger text-center" style="margin-top:20px;">
                    </div>
                </div>
            </form>
        </div>

            <?php }
            else{
                echo "<script>window.open('login.php','_self')</script>";
            }
            ?>
    </body>
</html>