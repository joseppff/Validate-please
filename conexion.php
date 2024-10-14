<?php
    $conex = mysqli_connect("localhost", "root", "", "validate_please");

    // Verificar la conexión
    if (!$conex) {
        die("Error de conexión: " . mysqli_connect_error());
    }
?>
