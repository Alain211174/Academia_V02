<?php
session_start();
require_once 'conexion.php';


unset($_SESSION['error']);
unset($_SESSION['exito']);

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['registrar'])) {
    
    try {
        
        $nombre = trim($_POST['name']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        
        
        if(empty($nombre) || empty($email) || empty($password)) {
            throw new Exception('Todos los campos son obligatorios.');
        }
        
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception('El formato del email no es válido.');
        }
        
        
        $database = new Conexion();
        $conn = $database->getConnection();
        
        if($conn === null) {
            throw new Exception('Error de conexión con la base de datos.');
        }
        
        
        $query_check = "SELECT id FROM usuarios WHERE email = :email";
        $stmt_check = $conn->prepare($query_check);
        $stmt_check->bindParam(':email', $email);
        $stmt_check->execute();
        
        if($stmt_check->rowCount() > 0) {
            throw new Exception('El email ya está registrado.');
        }
        
        
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        
        
        $query = "INSERT INTO usuarios (nombre, email, password) VALUES (:nombre, :email, :password)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password_hash);
        
        if($stmt->execute()) {
            
            $_SESSION['exito'] = 'Registro exitoso. Ahora puedes iniciar sesión.';
            
            
            echo '<script>
                alert("¡Registro exitoso! Ahora puedes iniciar sesión.");
                window.location.href = "index.php";
            </script>';
            exit;
        } else {
            throw new Exception('Error al registrar el usuario.');
        }
        
    } catch (Exception $e) {
        
        echo '<script>
            alert("Error: ' . addslashes($e->getMessage()) . '");
            window.history.back();
        </script>';
        exit;
    }
} else {
    echo '<script>
        alert("Acceso no permitido.");
        window.location.href = "registro.php";
    </script>';
    exit;
}
?>