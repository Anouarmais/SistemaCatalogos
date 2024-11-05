<?php 
session_start();
session_destroy();
header("Location: ../../root/public/html/index.php");
exit(); 
?>
