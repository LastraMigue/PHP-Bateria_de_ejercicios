<?php
// Arrays de opciones para la generación aleatoria
$opcionesIntro = [
    "Yo en tu lugar,",
    "La verdad es que",
    "Tú sabes que",
    "No hay duda de que",
    "Al final,"
];

$opcionesAccion = [
    "siempre hay que invertir en",
    "lo importante es",
    "nunca subestimes",
    "yo siempre digo que",
    "el secreto está en"
];

$opcionesCierre = [
    "la bolsa de valores.",
    "el no tener dinero congelado en el banco.",
    "los chemtrails.",
    "la nube.",
    "las crypto."
];

// Si se pulsa generar aleatoriamente
if (isset($_GET['aleatorio'])) {
    $randIntro = $opcionesIntro[rand(0, 4)];
    $randAccion = $opcionesAccion[rand(0, 4)];
    $randCierre = $opcionesCierre[rand(0, 4)];
    header("Location: parte4.php?intro=" . urlencode($randIntro) . "&accion=" . urlencode($randAccion) . "&cierre=" . urlencode($randCierre));
    exit;
}

$frase = "";
$intro = "";
$accion = "";
$cierre = "";
$customIntro = "";
$customAccion = "";
$customCierre = "";

// Si se reciben las opciones por GET
if (isset($_GET['intro']) && isset($_GET['accion']) && isset($_GET['cierre'])) {
    $intro = $_GET['intro'];
    $accion = $_GET['accion'];
    $cierre = $_GET['cierre'];

    // Si se eligió "personalizado", usamos el valor del input
    $textoIntro = $intro;
    if ($intro === "personalizado" && isset($_GET['custom_intro']) && trim($_GET['custom_intro']) != "") {
        $customIntro = trim($_GET['custom_intro']);
        $textoIntro = $customIntro;
    }

    $textoAccion = $accion;
    if ($accion === "personalizado" && isset($_GET['custom_accion']) && trim($_GET['custom_accion']) != "") {
        $customAccion = trim($_GET['custom_accion']);
        $textoAccion = $customAccion;
    }

    $textoCierre = $cierre;
    if ($cierre === "personalizado" && isset($_GET['custom_cierre']) && trim($_GET['custom_cierre']) != "") {
        $customCierre = trim($_GET['custom_cierre']);
        $textoCierre = $customCierre;
    }

    // Concatenamos las 3 partes
    $frase = $textoIntro . " " . $textoAccion . " " . $textoCierre;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Constructor de frases "cuñado" 2</title>
    <link rel="stylesheet" href="parte4.css">
</head>
<body>
    <div class="contenedor">
        <h1>Constructor de frases "cuñado" 2</h1>

        <!-- Mostramos la frase si se ha generado, o el mensaje inicial -->
        <?php if ($frase != ""): ?>
            <div class="resultado-box">
                <span class="resultado-etiqueta">Frase generada</span>
                <p class="frase-texto">"<?= htmlspecialchars($frase) ?>"</p>
            </div>
        <?php else: ?>
            <div class="mensaje-predeterminado">
                <p>Elige tus opciones o selecciona "Personalizado" para escribir la tuya. También puedes generar una aleatoria.</p>
            </div>
        <?php endif; ?>

        <!-- Formulario con desplegables e inputs personalizados -->
        <form action="parte4.php" method="GET">
            <!-- 1. Introducción -->
            <div class="campo">
                <label for="intro">1. Introducción:</label>
                <select name="intro" id="intro" onchange="alternarCustom('intro', 'custom_intro')">
                    <option value="Yo en tu lugar," <?= ($intro == 'Yo en tu lugar,') ? 'selected' : '' ?>>Yo en tu lugar...</option>
                    <option value="La verdad es que" <?= ($intro == 'La verdad es que') ? 'selected' : '' ?>>La verdad es que...</option>
                    <option value="Tú sabes que" <?= ($intro == 'Tú sabes que') ? 'selected' : '' ?>>Tú sabes que...</option>
                    <option value="No hay duda de que" <?= ($intro == 'No hay duda de que') ? 'selected' : '' ?>>No hay duda de que...</option>
                    <option value="Al final," <?= ($intro == 'Al final,') ? 'selected' : '' ?>>Al final...</option>
                    <option value="personalizado" <?= ($intro == 'personalizado') ? 'selected' : '' ?>>Personalizado</option>
                </select>
                <input type="text" name="custom_intro" id="custom_intro" class="input-custom" 
                       placeholder="Escribe tu propia introducción..." 
                       value="<?= htmlspecialchars($customIntro) ?>" 
                       <?= ($intro == 'personalizado') ? '' : 'disabled' ?>>
            </div>

            <!-- 2. Acción o comentario -->
            <div class="campo">
                <label for="accion">2. Acción o comentario:</label>
                <select name="accion" id="accion" onchange="alternarCustom('accion', 'custom_accion')">
                    <option value="siempre hay que invertir en" <?= ($accion == 'siempre hay que invertir en') ? 'selected' : '' ?>>siempre hay que invertir en...</option>
                    <option value="lo importante es" <?= ($accion == 'lo importante es') ? 'selected' : '' ?>>lo importante es...</option>
                    <option value="nunca subestimes" <?= ($accion == 'nunca subestimes') ? 'selected' : '' ?>>nunca subestimes...</option>
                    <option value="yo siempre digo que" <?= ($accion == 'yo siempre digo que') ? 'selected' : '' ?>>yo siempre digo que...</option>
                    <option value="el secreto está en" <?= ($accion == 'el secreto está en') ? 'selected' : '' ?>>el secreto está en...</option>
                    <option value="personalizado" <?= ($accion == 'personalizado') ? 'selected' : '' ?>>Personalizado</option>
                </select>
                <input type="text" name="custom_accion" id="custom_accion" class="input-custom" 
                       placeholder="Escribe tu propia acción..." 
                       value="<?= htmlspecialchars($customAccion) ?>" 
                       <?= ($accion == 'personalizado') ? '' : 'disabled' ?>>
            </div>

            <!-- 3. Cierre o consejo -->
            <div class="campo">
                <label for="cierre">3. Cierre o consejo:</label>
                <select name="cierre" id="cierre" onchange="alternarCustom('cierre', 'custom_cierre')">
                    <option value="la bolsa de valores." <?= ($cierre == 'la bolsa de valores.') ? 'selected' : '' ?>>la bolsa de valores</option>
                    <option value="el no tener dinero congelado en el banco." <?= ($cierre == 'el no tener dinero congelado en el banco.') ? 'selected' : '' ?>>el no tener dinero congelado en el banco</option>
                    <option value="los chemtrails." <?= ($cierre == 'los chemtrails.') ? 'selected' : '' ?>>los chemtrails</option>
                    <option value="la nube." <?= ($cierre == 'la nube.') ? 'selected' : '' ?>>la nube</option>
                    <option value="las crypto." <?= ($cierre == 'las crypto.') ? 'selected' : '' ?>>las crypto</option>
                    <option value="personalizado" <?= ($cierre == 'personalizado') ? 'selected' : '' ?>>Personalizado</option>
                </select>
                <input type="text" name="custom_cierre" id="custom_cierre" class="input-custom" 
                       placeholder="Escribe tu propio cierre..." 
                       value="<?= htmlspecialchars($customCierre) ?>" 
                       <?= ($cierre == 'personalizado') ? '' : 'disabled' ?>>
            </div>

            <!-- Botones de acción -->
            <div class="botones">
                <button type="submit" class="btn btn-generar">Generar frase</button>
                <button type="submit" name="aleatorio" value="1" class="btn btn-aleatorio">Frase aleatoria</button>
                <a href="parte4.php" class="btn btn-reiniciar">Reiniciar</a>
            </div>
        </form>
    </div>

    <script>
        function alternarCustom(idSelect, idInput) {
            const select = document.getElementById(idSelect);
            const input = document.getElementById(idInput);
            if (select.value === 'personalizado') {
                input.disabled = false;
                input.focus();
            } else {
                input.disabled = true;
                input.value = '';
            }
        }
    </script>
</body>
</html>