<?php
include 'db_connect.php';
if(isset($_GET['deleteid'])){
    $serviceid=$_GET['deleteid'];
    $sql= "delete from `services` where serviceid=$serviceid";
    $result=mysqli_query($con, $sql);
    if($result){
        //echo "Deleted succesfuly";
        header('location: clients.php');

    }else{
        die(mysli_error($con));
    }
    }
?>