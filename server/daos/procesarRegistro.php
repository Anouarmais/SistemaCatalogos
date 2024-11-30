<?php
include 'coneccion.php';

$username = mysqli_real_escape_string($conexion, $_POST['username']);
$password = mysqli_real_escape_string($conexion, $_POST['password']);
$fullname = mysqli_real_escape_string($conexion, $_POST['fullname']);
$email = mysqli_real_escape_string($conexion, $_POST['email']);
$ubicacion = mysqli_real_escape_string($conexion, $_POST['ubicacion']);
$phone = mysqli_real_escape_string($conexion, $_POST['phone']);

$check_query = "SELECT * FROM usuarios WHERE username = ?";
$check_stmt = mysqli_prepare($conexion, $check_query);
mysqli_stmt_bind_param($check_stmt, "s", $username);
mysqli_stmt_execute($check_stmt);
$check_result = mysqli_stmt_get_result($check_stmt);

if (mysqli_num_rows($check_result) > 0) {
    echo "<script>
        alert('El nombre de usuario ya está en uso. Por favor, elige otro nombre.');
        window.history.back();
    </script>";
} else {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $admin = 0;

    $query = "
        INSERT INTO usuarios (username, password, admin, email, telefono, ubicacion, nombrecompleto) 
        VALUES (?, ?, ?, ?, ?, ?, ?)
    ";
    $stmt = mysqli_prepare($conexion, $query);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssissss", $username, $hashed_password, $admin, $email, $phone, $ubicacion, $fullname);
        $ejecutar = mysqli_stmt_execute($stmt);

        if ($ejecutar) {
            $cesta_query = "INSERT INTO cesta (username) VALUES (?)";
            $cesta_stmt = mysqli_prepare($conexion, $cesta_query);
            
            if ($cesta_stmt) {
                mysqli_stmt_bind_param($cesta_stmt, "s", $username);
                mysqli_stmt_execute($cesta_stmt);
                mysqli_stmt_close($cesta_stmt);
            } else {
                echo "Error al preparar la consulta para la cesta: " . mysqli_error($conexion);
            }

            echo "<script>
                window.location.href = '../../root/public/html/index.php'; 
            </script>";
        } else {
            echo "Error al insertar el usuario: " . mysqli_error($conexion);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error al preparar la consulta: " . mysqli_error($conexion);
    }
}

mysqli_close($conexion);
?>
