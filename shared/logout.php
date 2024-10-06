<?php
session_start();
session_destroy();
header("location:../shared/signin.html");
?>