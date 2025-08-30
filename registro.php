<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arimo:ital,wght@0,400..700;1,400..700&family=Yarndings+20&display=swap" rel="stylesheet">
</head>
<body>

    <div class="contenedorSesion">
        <img src="img/Logo-STEM-2021.png" class="logo-IS">
        <h1>Registrar cuenta</h1>
        
        <form action="procesar_registro.php" method="POST" class="contenedorSesion">
            <label for="name">Nombre:</label>
            <input type="text" name="name" pattern="[a-zA-Z0-9]+" required>

            <label for="email">Correo electronico:</label>
            <input type="email" name="email" required>

            <label for="password">Contraseña:</label>
            <input type="password" name="password" required>

            <button type="submit" class="login-btn" name="registrar" value="registrar">Registrarse</button>
        </form>

        <p>¿Ya tienes una cuenta? <a href="index.php">Iniciar sesión</a></p>

    </div>
    
</body>
</html>