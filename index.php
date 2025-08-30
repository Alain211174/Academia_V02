<?php
       session_start();
       if(isset($_SESSION['error'])) {
           echo '<div class="mensaje-error">' . htmlspecialchars($_SESSION['error']) . '</div>';
           unset($_SESSION['error']);
       }
       ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arimo:ital,wght@0,400..700;1,400..700&family=Yarndings+20&display=swap" rel="stylesheet">
</head>

<body>
    <div class="contenedorSesion">
        <img src="img/Logo-STEM-2021.png" class="logo-IS">
        <h1>Iniciar sesión</h1>

        <form action="procesar_login.php" method="POST" class="contenedorSesion">
            <label for="email">Correo electronico:</label>
            <input type="email" name="email" required>

            <label for="password">Contraseña:</label>
            <input type="password" name="password" required>

            <button type="submit" class="login-btn" name="login" value="login">Iniciar Sesión</button>
        </form>
        
        <p>¿No tienes una cuenta? <a href="registro.php">Registrate</a></p>
    </div>
</body>
</html>