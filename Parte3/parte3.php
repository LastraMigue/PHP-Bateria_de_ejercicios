<?php
$frase = "";

// Recogemos las opciones seleccionadas por GET si existen
if (isset($_GET['intro']) && isset($_GET['accion']) && isset($_GET['cierre'])) {
    $intro = $_GET['intro'];
    $accion = $_GET['accion'];
    $cierre = $_GET['cierre'];

    // Concatenamos las partes para generar la frase cuñada
    $frase = $intro . " " . $accion . " " . $cierre;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Constructor de frases "cuñado"</title>
    <link rel="stylesheet" href="parte3.css">
</head>
<body>
    <div class="contenedor">
        <h1>Constructor de frases "cuñado"</h1>

        <!-- Mostramos la frase si se ha generado, o el mensaje inicial -->
        <?php if ($frase != ""): ?>
            <div class="resultado-box">
                <span class="resultado-etiqueta">Frase generada</span>
                <p class="frase-texto">"<?= htmlspecialchars($frase) ?>"</p>
            </div>
        <?php else: ?>
            <div class="mensaje-predeterminado">
                <p>Selecciona una opción en cada desplegable y pulsa el botón para generar la frase.</p>
            </div>
        <?php endif; ?>

        <!-- Formulario con 3 desplegables de 5 opciones cada uno -->
        <form action="parte3.php" method="GET">
            <div class="campo">
                <label for="intro">1. Introducción:</label>
                <select name="intro" id="intro" required>
                    <option value="Yo en tu lugar,">Yo en tu lugar...</option>
                    <option value="La verdad es que">La verdad es que...</option>
                    <option value="Tú sabes que">Tú sabes que...</option>
                    <option value="No hay duda de que">No hay duda de que...</option>
                    <option value="Al final,">Al final...</option>
                </select>
            </div>

            <div class="campo">
                <label for="accion">2. Acción o comentario:</label>
                <select name="accion" id="accion" required>
                    <option value="siempre hay que invertir en">siempre hay que invertir en...</option>
                    <option value="lo importante es">lo importante es...</option>
                    <option value="nunca subestimes">nunca subestimes...</option>
                    <option value="yo siempre digo que">yo siempre digo que...</option>
                    <option value="el secreto está en">el secreto está en...</option>
                </select>
            </div>

            <div class="campo">
                <label for="cierre">3. Cierre o consejo:</label>
                <select name="cierre" id="cierre" required>
                    <option value="la bolsa de valores.">la bolsa de valores</option>
                    <option value="el no tener dinero congelado en el banco.">el no tener dinero congelado en el banco</option>
                    <option value="los chemtrails.">los chemtrails</option>
                    <option value="la nube.">la nube</option>
                    <option value="las crypto.">las crypto</option>
                </select>
            </div>

            <div class="botones">
                <button type="submit" class="btn btn-generar">Generar frase</button>
                <a href="parte3.php" class="btn btn-reiniciar">Reiniciar</a>
            </div>
        </form>
    </div>
</body>
</html>
