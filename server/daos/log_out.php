<?php 
session_start();
    session_destroy();
    header("location :../../root/public/html/index.php");
?>