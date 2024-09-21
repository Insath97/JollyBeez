<?php

// count 
$adminQuery=mysqli_query($conn,"SELECT * FROM `admin`"); 
$countAdmin = mysqli_num_rows($adminQuery);

?>