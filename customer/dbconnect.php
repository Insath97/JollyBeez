<?php
$conn = mysqli_connect("localhost","root","","jollybeez");
if(!$conn){
    echo "Connection Fail".mysqli_connect_error(); 
}
?>