<?php

$pid=$_GET['pid'];
echo "pid : $pid";

include '../shared/connection.php';

mysqli_query($conn,"delete from product where pid=$pid");

header("location:view.php"); 

?>