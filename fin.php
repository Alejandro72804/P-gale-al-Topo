<?php
session_start();
$aciertos = $_SESSION['aciertos'] ?? 0;
session_destroy(); // Reiniciar el juego
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Juego terminado</title>
</head>
<body>
    <h1>¡Tiempo agotado!</h1>
    <p>Total de aciertos: <?= $aciertos ?></p>
    <a href="index.php">Volver a jugar</a>
</body>
</html>
