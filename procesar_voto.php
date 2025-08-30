<?php
session_start();

if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    echo json_encode(['success' => false, 'message' => 'Debes iniciar sesión para votar']);
    exit;
}

require_once 'conexion.php';

$nombre = $_SESSION['user_name'];
$email = $_SESSION['user_email'];
$voto = $_POST['voto'];
$ip = $_SERVER['REMOTE_ADDR'];

$universidades_validas = ['ITCJ', 'TEC', 'URN', 'UACJ', 'UACH'];
if(!in_array($voto, $universidades_validas)) {
    echo json_encode(['success' => false, 'message' => 'Voto no válido']);
    exit;
}

$database = new Conexion();
$conn = $database->getConnection();

$query_check = "SELECT * FROM votos WHERE email_usuario = :email";
$stmt_check = $conn->prepare($query_check);
$stmt_check->bindParam(':email', $email);
$stmt_check->execute();

if($stmt_check->rowCount() > 0) {
    echo json_encode(['success' => false, 'message' => 'Ya has votado anteriormente']);
    exit;
}

try {
    $query = "INSERT INTO votos (nombre_usuario, email_usuario, voto, direccion_ip) 
              VALUES (:nombre, :email, :voto, :ip)";
    
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':voto', $voto);
    $stmt->bindParam(':ip', $ip);
    
    if($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Voto registrado correctamente']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al registrar voto']);
    }
    
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Error en la base de datos']);
}
?>