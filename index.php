<?php
session_start(); // Asegúrate de iniciar la sesión antes de cualquier salida HTML
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulario de Registro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="procesar.php" method="post">
        <ul>
            <li>
                <label for="user_name">Nombre:</label>
                <input type="text" id="user_name" name="user_name" placeholder="Ingresa tu nombre" required />
            </li>
            <li>
                <label for="user_lastname">Apellido:</label>
                <input type="text" id="user_lastname" name="user_lastname" placeholder="Ingresa tu apellido" required />
            </li>
            <li>
                <label for="user_age">Edad:</label>
                <input type="number" id="user_age" name="user_age" min="1" placeholder="Ingresa tu edad" required />
            </li>
            <li>
                <label for="user_date">Fecha de Nacimiento:</label>
                <input type="date" id="user_date" name="user_date" required />
            </li>
            <li>
                <label for="user_mail">Correo electrónico:</label>
                <input type="email" id="user_mail" name="user_mail" placeholder="correo@ejemplo.com" required />
            </li>
            <li>
                <label for="user_password">Contraseña:</label>
                <input type="password" id="user_password" name="user_password" placeholder="Ingresa tu contraseña" required />
                <!-- Mostrar mensaje de error debajo del campo de contraseña -->
                <?php
                if (isset($_SESSION['password_error'])) {
                    echo '<p style="color: red;">' . $_SESSION['password_error'] . '</p>';
                    unset($_SESSION['password_error']); // Limpiar mensaje después de mostrarlo
                }
                ?>
            </li>
            <li>
                <label for="user_re_password">Repetir Contraseña:</label>
                <input type="password" id="user_re_password" name="user_re_password" placeholder="Repite tu contraseña" required />
            </li>
        </ul>
        <input type="submit" name="enviar" value="Enviar" />
    </form>
</body>
</html>
