<?php

if(isset($_POST['login'])){

    include 'connection.php';


    $username = mysqli_real_escape_string($abc,$_POST['username']);
    // $password = sha1($_POST['password']);
    $password=mysqli_real_escape_string($abc,$_POST['password']);

    $sql = "SELECT * FROM tbl_user where username = '{$username}' and password = '{$password}' and role>=1";
    $result = mysqli_query($abc,$sql) or die("Query Failed");

    if(mysqli_num_rows($result)>0) {
        while($row = mysqli_fetch_assoc($result)){
            session_start();
            $_SESSION["username"] = $row['username'];
            $_SESSION["id"] = $row['id'];
            $_SESSION["role"] = $row['role'];
            echo "<script>window.open('index.php','_self')</script>";

        }

    }

    else {
        
        echo '<div class="alert alert-danger">Wrong credentials</div>';
        

    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <style>
        body{
            background-color: #d6852f;
        }
        .a{
            background-color: white;
            border: ;
            border-radius: 10px;
        }
        div{
            text-align: center;
            margin-top: 190px;
        }
        h1{
            margin-top: 80px;
        }
        .btn{
            height: 50px;
            width: 350px;
            font-size: 20px;
        }
        form{
            height: 50px; 
            width: 350px; 
            font-size: 20px;
            
        }
    </style>
    <!-- <script>
        function abc(){
            var email=document.getElementById('email').value;
            var password=document.getElementById('pass1').value;
            var confirmpassword=document.getElementById('pass2').value;
            if(password!=confirmpassword){
                alert("password not match");
            }
            else{
                alert("password match");
            }
        }
        abc()
    </script> -->
</head>
<body>
    <div class="container">
        
            <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data" class="mx-auto ">
                <center><h1 style="margin-top: 80px;">Login</h1><br>
                   <input type="text" class="form-control" id="username" name="username" placeholder="Enter  Username"><br>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password"><br>
                    <input type="submit" name="login" class="btn btn-success" value="LOGIN"  style="height: 50px; width: 350px; font-size: 20px;"><br><br><br>           
                </center>
            </form>
            
</div>
</body>
</html>

