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
        ?>     
        <div class="container-fluid" style="margin-top: 50px;">
            <form method="POST" action="insert_chalan.php">
                <div class="class"><h3>CHALAN</h3></div>

                <div class="row">
                    <div class="col-md-2">Firm Name :</div>
                    <div class="col-md-4">
                        <select name="firm_name" class="form-select">
                            <option selected disabled>select firm name</option>
                            <?php
                            include 'connection.php';
                            $records = mysqli_query($abc ,"SELECT * FROM tbl_firm where status=1;");
                            while($data = mysqli_fetch_array($records))
                            {
                                echo "<option>" .$data['firm_name'] ."</option>";
                            }
                            mysqli_close($abc);
                            ?>
                        </select>
                    </div>
                    <div class="col-md-2">Broker Name :</div>
                    <div class="col-md-4"><input type="text" id="broker_name" name="broker_name" class="form-control" placeholder="Enter Broker Name"></div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-2">Quality Name :</div>
                    <div class="col-md-4"><input type="text" id="quality_name" name="quality_name" class="form-control" placeholder="Enter Quality"></div> 
                    <div class="col-md-2">Rate :</div>
                    <div class="col-md-4"><input type="number" id="rate" name="rate" class="form-control" placeholder="Enter Rate per Meter" step="0.01"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-2">Dhara :</div>
                    <div class="col-md-4"><input type="text" id="dhara" name="dhara" class="form-control" placeholder="Enter Days"></div> 
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
                        // if($count==1 || $count==13 || $count==25 || $count==37 || $count==49 || $count==61 )
                        // {
                        //     echo '<div class="col-md-1 text-center">Lot_'.$lot.'</div>';
                        //     $lot++;
                        //   }
                        // $count++;
                        if($row==0)
                        {
                          echo '<div class="col-md-1 text-center"><b>'.$col.'</b></div>';
                        }
                        else{
                            echo '<div class="col-md-1"><input type="number" class="form-control" step="0.01" name="no_'.$count.'" id="no_'.$count.'" placeholder="'.$count.'"></div>';
                            $count++;
                        }
                    }
                    echo '</div>';
                }
                ?>
                    
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <input type="submit" value="SUBMIT" name="submit" class="btn btn-success text-center" style="margin-top:20px;">
                        <input type="reset" value="CLEAR" name="reset" class="btn btn-danger text-center" style="margin-top:20px;">
                    </div>
                </div>
            </form>
        </div>
    </body>
    <?php 
    }
      else{
	      echo "<script>window.open('login.php','_self')</script>";
      }
    ?>
</html>