<?php

function moveFile($tmp_file, $file) {
    if (isset($file) && isset($tmp_file)) {

        // Ruta del directorio donde deseas mover el archivo
        $directorioDestino = 'C:\\xampp\\htdocs\\SistemaCatalogos\\root\\public\\img\\' . $file; // Cambia esto según tu ruta
  
        if( move_uploaded_file( $tmp_file, $directorioDestino) ) {
        } else {
                echo "<p style='border: 2px solid red; color:red;'>FICHERO NO SUBIDO CORRECTAMENTE</p>";
        }
    } else {
        echo "Error en la carga del archivo.";
    }
}