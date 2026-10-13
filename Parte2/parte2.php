<?php
// Obtenemos el histórico de la URL si existe
$historico = "";
if (isset($_GET['resultados'])) {
    $historico = $_GET['resultados'];
}

// Si se pulsa "Lanzar dado", generamos el número y actualizamos la URL
if (isset($_GET['accion'])) {
    $nuevoNumero = rand(1, 6);
    $historico = $historico . $nuevoNumero;
    header("Location: parte2.php?resultados=" . $historico);
    exit;
}

// Guardamos los resultados en un array
$historialArray = [];
if ($historico != "") {
    $historialArray = str_split($historico);
}

// Obtenemos el último resultado para mostrarlo en grande
$resultado = null;
if (!empty($historialArray)) {
    $resultado = $historialArray[count($historialArray) - 1];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lanzamiento de dados 2</title>
    <link rel="stylesheet" href="parte2.css">
</head>
<body>
    <main class="pagina">
        <!-- Tarjeta principal de lanzamiento -->
        <div class="card card-principal">
            <h1>Lanzamiento de dados 2</h1>

            <!-- Mostramos el dado actual o el mensaje inicial -->
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

            <!-- Formulario que envía la acción y el histórico por GET -->
            <div class="botones">
                <form id="form-dado" action="parte2.php" method="GET">
                    <input type="hidden" name="accion" value="lanzar">
                    <input type="hidden" name="resultados" value="<?= htmlspecialchars($historico) ?>">
                    <button type="submit" class="btn btn-lanzar">Lanzar dado</button>
                </form>

                <a href="parte2.php" class="btn btn-reiniciar">Reiniciar</a>
            </div>
        </div>

        <!-- Tarjeta aparte para el histórico a todo el ancho -->
        <?php if (!empty($historialArray)): ?>
            <div class="card card-historico">
                <h2>Histórico de tiradas</h2>
                <div class="grid-historial">
                    <?php foreach ($historialArray as $indice => $valor): ?>
                        <div class="cuadradito-dado">
                            <span class="num-tirada">#<?= $indice + 1 ?></span>
                            <img src="../resources/<?= $valor ?>.png" alt="Dado <?= $valor ?>" class="cuadradito-img">
                            <span class="num-valor"><?= $valor ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </main>

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
