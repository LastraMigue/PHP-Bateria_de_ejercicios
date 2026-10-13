<?php
$resultado = null;

// Si se pulsa el botón, generamos un número del 1 al 6
if (isset($_GET['accion'])) {
    $resultado = rand(1, 6);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lanzamiento de dados</title>
    <link rel="stylesheet" href="parte1.css">
</head>
<body>
    <div class="contenedor">
        <h1>Lanzamiento de dados</h1>

        <!-- Mostramos el dado si se ha lanzado, o el mensaje inicial si no -->
        <?php if ($resultado != null): ?>
            <div class="resultado">
                <img src="../resources/<?= $resultado ?>.png" alt="Dado <?= $resultado ?>" class="dado">
                <p>Resultado: <strong><?= $resultado ?></strong></p>
            </div>
        <?php else: ?>
            <div class="mensaje-predeterminado">
                <p>Aún no has lanzado el dado. Haz clic en el botón para tirar.</p>
            </div>
        <?php endif; ?>

        <div class="botones">
            <form id="form-dado" action="parte1.php" method="GET">
                <input type="hidden" name="accion" value="lanzar">
                <button type="submit" class="btn btn-lanzar">Lanzar dado</button>
            </form>

            <a href="parte1.php" class="btn btn-reiniciar">Reiniciar</a>
        </div>
    </div>

    <script>
        // Sonido básico de clic/golpe
        function reproducirSonido() {
            const ctx = new (window.AudioContext || window.webkitAudioContext)();
            const osc = ctx.createOscillator();
            osc.connect(ctx.destination);
            osc.frequency.value = 260; // Tono en Hz
            osc.start();
            osc.stop(ctx.currentTime + 0.1); // Dura 0.1 segundos
        }

        // Reproduce el sonido antes de enviar el formulario por GET
        document.getElementById('form-dado').addEventListener('submit', function (e) {
            e.preventDefault();
            reproducirSonido();
            setTimeout(() => this.submit(), 120);
        });
    </script>
</body>
</html>