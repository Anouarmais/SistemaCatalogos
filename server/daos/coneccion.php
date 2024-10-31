<?php
$conexion = mysqli_connect("localhost","root","","sistemacatalogos");
if($conexion){
    echo 'ta bien';
}else{
    echo'no';
}
?>
