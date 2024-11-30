
<?php
session_start();

session_unset();

session_destroy();

if (isset($_COOKIE['username'])) {
    setcookie('username', '', time() - 3600, "/"); // Expira la cookie
}

header("Location: ../../root/public/html/index.php");
exit;
?>
