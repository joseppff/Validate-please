<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $nombre = $_POST['user_name'];
    $apellido = $_POST['user_lastname'];
    $edad = $_POST['user_age'];
    $fecha_nacimiento = $_POST['user_date'];
    $correo = $_POST['user_mail'];
    $password = $_POST['user_password'];
    $re_password = $_POST['user_re_password'];

    // Validar que las contraseñas coincidan
    if ($password !== $re_password) {
        echo "Error: Las contraseñas no coinciden.";
        exit;
    }

    // Validar que la contraseña tenga entre 8 y 16 caracteres
    if (strlen($password) < 8 || strlen($password) > 16) {
        echo "Error: La contraseña debe tener entre 8 y 16 caracteres.";
        exit;
    }
    
}
?>
