<?php
session_start();
require_once 'ModeloCuadrado.php';

// Inicializar valores al iniciar
if (!isset($_SESSION['aciertos'])) $_SESSION['aciertos'] = 0;
if (!isset($_SESSION['inicio'])) $_SESSION['inicio'] = time();

// Verificar si se agotó el tiempo
$tiempoTranscurrido = time() - $_SESSION['inicio'];
$tiempoRestante = 30 - $tiempoTranscurrido;

if ($tiempoRestante <= 0) {
    header("Location: fin.php");
    exit;
}

// Lógica para topos aleatorios
$cuadrados = [];
$topoIndex = rand(0, 8);

for ($i = 0; $i < 9; $i++) {
    $cuadro = new ModeloCuadrado($i);
    if ($i == $topoIndex) {
        $cuadro->setIsShow(true);
    }
    $cuadrados[] = $cuadro;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Pégale al Topo</title>
    <link rel="stylesheet" href="estilos.css">
    <script>
        let tiempo = <?= $tiempoRestante ?>;

        function actualizarTiempo() {
            document.getElementById("tiempo").textContent = tiempo + "s";
            if (tiempo <= 0) {
                window.location.href = "fin.php";
            }
            tiempo--;
        }

        setInterval(() => {
            actualizarTiempo();
        }, 1000);

        // Recargar la página para mostrar nuevo topo
        setInterval(() => {
            window.location.reload();
        }, 1000);
    </script>
</head>

<body>
    <div class="cabecera">
        <h1>¡Pégale al topo!</h1>
        <p>Tiempo restante: <span id="tiempo"><?= $tiempoRestante ?>s</span></p>
        <p>Aciertos: <?= $_SESSION['aciertos'] ?></p>
    </div>
    <div class="Tablero">
        <?php foreach ($cuadrados as $cuadro): ?>
            <form method="post" action="jugar.php">
                <input type="hidden" name="id" value="<?= $cuadro->id ?>">
                <input type="hidden" name="isShow" value="<?= $cuadro->getIsShow() ?>">
                <button class="Cuadrado <?= $cuadro->style ?>" type="submit"></button>
            </form>
        <?php endforeach; ?>
    </div>
</body>

</html>