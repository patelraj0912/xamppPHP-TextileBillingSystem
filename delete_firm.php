<?php
session_start();
if(isset($_SESSION['username'])){
    include 'connection.php';
    if(isset($_GET['id']))
    {
        $targetid = $_GET['id'];
        mysqli_query($abc,"update tbl_firm set status=0 where id=$targetid");
        echo "<script>window.open('view_firm.php','_self')</script>";
        // $result = mysqli_query($abc,"select * from tbl_firm where id=$targetid");
        // $row = mysqli_fetch_array($result);
        // $status = $row['status'];

        // if($status == 1)
        // {
        //     $status=0;
        //     mysqli_query($abc,"update tbl_firm set status='$status' where id=$targetid");
        //     echo "<script>alert('Firm is Deleted')</script>";
        //     echo "<script>window.open('view_firm.php','_self')</script>";
        // }
        // else
        // {
        //     $status=1;
        //     mysqli_query($abc,"update tbl_firm set status='$status' where id=$targetid");
        //     echo "<script>alert('Something wrong.')</script>";
        //     echo "<script>window.open('view_firm.php','_self')</script>";
        // }

    }
}
else{
	echo "<script>window.open('login.php','_self')</script>";
}
?>