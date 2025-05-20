<?php
include 'db_connect.php';
if(isset($_GET['deleteid'])){
    $accountid=$_GET['deleteid'];
    $sql= "delete from `account` where accountid=$accountid";
    $result=mysqli_query($con, $sql);
    if($result){
        //echo "Deleted succesfuly";
        header('location: accounts.php');

    }else{
        die(mysli_error($con));
    }
    }
?>