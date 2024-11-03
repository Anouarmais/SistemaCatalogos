<?php
SESSION_START();
include 'coneccion.php';

$username = $_POST['username'];
$password = $_POST['password'];

// Asegúrate de que los datos están correctamente escapados para prevenir SQL Injection
$username = mysqli_real_escape_string($conexion, $username);
$password = mysqli_real_escape_string($conexion, $password);

$validar_login =  mysqli_query($conexion , "Select * FROM usuarios WHERE username= '$username' AND password = '$password'");

if(mysqli_num_rows($validar_login)>0){
    $_SESSION['usuario']=$username;
    header("location: ../../root/public/html/onceregistred.php");
    exit;
}else{
    echo '
    <script>
    alert("Usuario no existe ")
    window.location.href = "../../root/public/html/login.php";
    </script>
    ';
    exit;
}




?>