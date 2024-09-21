<?php
include("../dbconnect.php");

if(isset($_GET['deleteId'])){

    $delid = $_GET['deleteId'];

    $qry = "DELETE FROM `product` WHERE code='$delid'";
    $result = mysqli_query($conn,$qry);

    if($result){

        header("Location: ../createproduct.php?status=success");
        exit();      
    }
    else{
        header("Location: ../createproduct.php?status=error");
        exit(); 
    }
}
?>