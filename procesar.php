<?php
session_start(); // Iniciar sesión para almacenar los mensajes

include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Bloque 1: Recolección de datos
    $nombre = $_POST['user_name'];
    $apellido = $_POST['user_lastname'];
    $edad = $_POST['user_age'];
    $fecha_nacimiento = $_POST['user_date'];
    $correo = $_POST['user_mail'];
    $password = $_POST['user_password'];
    $re_password = $_POST['user_re_password'];

    // Bloque 2: Validación de contraseñas
    // Validar que las contraseñas coincidan
    if ($password !== $re_password) {
        $_SESSION['password_error'] = 'Las contraseñas no coinciden.';
        header("Location: index.php");
        exit;
    }

    // Validar que la contraseña tenga entre 8 y 16 caracteres
    if (strlen($password) < 8 || strlen($password) > 16) {
        $_SESSION['password_error'] = 'La contraseña debe tener entre 8 y 16 caracteres.';
        header("Location: index.php");
        exit;
    }

    // Validar que la contraseña contenga al menos 1 mayúscula, 1 minúscula y 1 símbolo
    if (!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\W).*$/', $password)) {
        $_SESSION['password_error'] = 'La contraseña debe contener al menos una letra mayúscula, una letra minúscula y un símbolo.';
        header("Location: index.php");
        exit;
    }

    // Bloque 3: Cifrado de contraseña
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Bloque 4: Inserción en la base de datos
    $sql = "INSERT INTO usuarios (nombre, apellido, edad, fecha_nacimiento, correo_electronico, contraseña) 
            VALUES ('$nombre', '$apellido', '$edad', '$fecha_nacimiento', '$correo', '$password_hash')";

    // Bloque 5: Manejo de resultado de la inserción
    if ($conex->query($sql) === TRUE) {
        header("Location: success.php"); // Redirigir a la página de éxito
        exit;
    } else {
        $_SESSION['password_error'] = 'Error al registrar usuario: ' . $conex->error;
        header("Location: index.php");
        exit;
    }
} else {
    // Redirigir si no es una solicitud POST
    header("Location: index.php");
    exit;
}
