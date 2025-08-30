<?php
session_start();


if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: index.php");
    exit;
}

require_once 'conexion.php';


$database = new Conexion();
$conn = $database->getConnection();
$email = $_SESSION['user_email'];

$query = "SELECT * FROM votos WHERE email_usuario = :email";
$stmt = $conn->prepare($query);
$stmt->bindParam(':email', $email);
$stmt->execute();

$ya_voto = $stmt->rowCount() > 0;


$query_votos = "SELECT voto, COUNT(*) as total FROM votos GROUP BY voto";
$stmt_votos = $conn->query($query_votos);
$votos = $stmt_votos->fetchAll(PDO::FETCH_ASSOC);


$conteos = [
    'ITCJ' => 0,
    'TEC' => 0,
    'URN' => 0,
    'UACJ' => 0,
    'UACH' => 0
];


foreach ($votos as $voto) {
    $conteos[$voto['voto']] = $voto['total'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Torneo academia STEM</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arimo:ital,wght@0,400..700;1,400..700&family=Yarndings+20&display=swap" rel="stylesheet">
</head>
<body>
    <div class="user-info">
        Bienvenido: <?php echo htmlspecialchars($_SESSION['user_name']); ?>
        <br>
        <a href="index.php" class="logout-btn">Cerrar Sesión</a>
    </div>

    <h1>Torneo Academia STEM</h1>
    <img class="logo" src="img/logoAcademia.png" alt="">

    <p><b>Votos por proyecto</b></p>
    <p>Categoría IOT</p>

    <?php if($ya_voto): ?>
    <div class="mensaje-votacion mensaje-error">
        ❌ Ya has votado anteriormente. No puedes votar nuevamente.
    </div>
    <?php endif; ?>

    <div class="contadores">
        <p><b>ITCJ: </b></p>
        <p id="conta1"><?php echo $conteos['ITCJ']; ?></p>

        <p><b>TEC: </b></p>
        <p id="conta2"><?php echo $conteos['TEC']; ?></p>

        <p><b>URN: </b></p>
        <p id="conta3"><?php echo $conteos['URN']; ?></p>

        <p><b>UACJ: </b></p>
        <p id="conta4"><?php echo $conteos['UACJ']; ?></p>

        <p><b>UACH: </b></p>
        <p id="conta5"><?php echo $conteos['UACH']; ?></p>
    </div>

    <div class="contadores">
        <?php if(!$ya_voto): ?>
        <div class="uniSec">
            <img src="img/itcj.jpg" alt="" class="uniLogo">
            <button onclick="votar('ITCJ')">Votar</button>
        </div>

        <div class="uniSec">
            <img src="img/tec.png" alt="" class="uniLogo">
            <button onclick="votar('TEC')">Votar</button>
        </div>

        <div class="uniSec">
            <img src="img/urn.jpg" alt="" class="uniLogo">
            <button onclick="votar('URN')">Votar</button>
        </div>

        <div class="uniSec">
            <img src="img/uacj.jpg" alt="" class="uniLogo">
            <button onclick="votar('UACJ')">Votar</button>
        </div>

        <div class="uniSec">
            <img src="img/uach.svg" alt="" class="uniLogo">
            <button onclick="votar('UACH')">Votar</button>
        </div>
        <?php else: ?>
        <div class="mensaje-votacion mensaje-info">
            <h3>Gracias por participar en la votación</h3>
            <p>Tu voto ya ha sido registrado y no puedes votar nuevamente.</p>
        </div>
        <?php endif; ?>
    </div>

    <script>
    function votar(universidad) {
        if(confirm(`¿Estás seguro de votar por ${universidad}?`)) {
        
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'procesar_voto.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            
            xhr.onload = function() {
                if(this.status === 200) {
                    try {
                        const response = JSON.parse(this.responseText);
                        
                        if(response.success) {
                            alert('✅ ' + response.message);
                            location.reload(); // Recargar página para actualizar contadores
                        } else {
                            alert('❌ ' + response.message);
                        }
                    } catch (e) {
                        alert('Error al procesar la respuesta del servidor');
                    }
                }
            };
            
            xhr.onerror = function() {
                alert('Error de conexión');
            };
            
            xhr.send('voto=' + encodeURIComponent(universidad));
        }
    }
    </script>
</body>
</html>