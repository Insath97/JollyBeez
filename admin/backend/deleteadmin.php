<?php
include("../dbconnect.php");

if(isset($_GET['deleteId'])){

    $delid = $_GET['deleteId'];

    $qry = "DELETE FROM `admin` WHERE Id='$delid'";
    $result = mysqli_query($conn,$qry);

    if($result){

        header("Location: ../createadmin.php?status=success");
        exit();      
    }
    else{
        header("Location: ../createadmin.php?status=error");
        exit(); 
    }
}
?>