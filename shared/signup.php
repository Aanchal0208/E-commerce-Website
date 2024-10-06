<?php

$conn = new mysqli("localhost", "root", "", "acme_project_ecommerce", 3306);

mysqli_query($conn, "insert into user(username,password,usertype) values('$_POST[username]','$_POST[password1]','$_POST[usertype]')");

header("location: signin.html");
   
   
?>