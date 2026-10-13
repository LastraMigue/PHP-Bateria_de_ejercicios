<?php
$haCalculado = false;
$resultado = "";
$valor1 = "";
$valor2 = "";
$operador = "and";
$esRojo = false;

// Función para convertir la cadena al tipo correspondiente (booleano o número)
function convertirTipo($valor) {
    $v = strtolower(trim($valor));
    if ($v === "true") {
        return true;
    }
    if ($v === "false") {
        return false;
    }
    if (is_numeric($valor)) {
        return $valor + 0;
    }
    return $valor;
}

// Si se envían los datos por GET
if (isset($_GET['valor1']) && isset($_GET['operador']) && isset($_GET['valor2'])) {
    $valor1 = $_GET['valor1'];
    $operador = $_GET['operador'];
    $valor2 = $_GET['valor2'];
    $haCalculado = true;

    // Convertimos los valores a sus tipos reales
    $v1 = convertirTipo($valor1);
    $v2 = convertirTipo($valor2);

    // Estructura if encadenada según el operador
    if ($operador == "and") {
        $res = ($v1 && $v2);
        $resultado = $res ? "true" : "false";
    } elseif ($operador == "or") {
        $res = ($v1 || $v2);
        $resultado = $res ? "true" : "false";
    } elseif ($operador == "xor") {
        $res = ($v1 xor $v2);
        $resultado = $res ? "true" : "false";
    } elseif ($operador == "+") {
        if (is_numeric($v1) && is_numeric($v2)) {
            $resultado = $v1 + $v2;
        } else {
            $resultado = "Error: se requieren números";
        }
    } elseif ($operador == "-") {
        if (is_numeric($v1) && is_numeric($v2)) {
            $resultado = $v1 - $v2;
        } else {
            $resultado = "Error: se requieren números";
        }
    } else {
        $resultado = "Operador no contemplado";
    }

    // Comprobamos si el resultado es false o un error para pintarlo de rojo
    if ($resultado === "false" || strpos($resultado, "Error") !== false || $resultado === "Operador no contemplado") {
        $esRojo = true;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comparator</title>
    <link rel="stylesheet" href="../Navbar/navbar.css">
    <link rel="stylesheet" href="parte5.css">
</head>
<body>
    <?php include __DIR__ . '/../Navbar/navbar.php'; ?>
    <div class="contenedor">
        <h1>Comparator</h1>

        <!-- Mostramos el resultado de la operación antes del formulario -->
        <?php if ($haCalculado): ?>
            <div class="resultado-box">
                <span class="resultado-etiqueta">Resultado</span>
                <p class="resultado-expresion">
                    <span class="<?= (strtolower(trim($valor1)) === 'false') ? 'texto-rojo' : '' ?>"><?= htmlspecialchars($valor1) ?></span>
                    <strong class="operador-resaltado"><?= htmlspecialchars($operador) ?></strong>
                    <span class="<?= (strtolower(trim($valor2)) === 'false') ? 'texto-rojo' : '' ?>"><?= htmlspecialchars($valor2) ?></span>
                    <span class="flecha">&rarr;</span>
                    <strong class="resultado-final <?= $esRojo ? 'resultado-rojo' : 'resultado-verde' ?>"><?= htmlspecialchars((string)$resultado) ?></strong>
                </p>
            </div>
        <?php else: ?>
            <div class="mensaje-predeterminado">
                <p>Ingresa dos valores y selecciona una operación lógica o aritmética para calcular el resultado.</p>
            </div>
        <?php endif; ?>

        <!-- Formulario que envía los datos vía GET a la misma página -->
        <form action="parte5.php" method="GET">
            <div class="campo">
                <label for="valor1">Primer valor (número, boolean, texto):</label>
                <input type="text" name="valor1" id="valor1" class="input-texto" 
                       placeholder="Ej: 4, true, false..." 
                       value="<?= htmlspecialchars($valor1) ?>" required>
            </div>

            <div class="campo">
                <label for="operador">Operador:</label>
                <select name="operador" id="operador" class="select-operador">
                    <option value="and" <?= ($operador == 'and') ? 'selected' : '' ?>>and (Y lógico)</option>
                    <option value="or" <?= ($operador == 'or') ? 'selected' : '' ?>>or (O lógico)</option>
                    <option value="xor" <?= ($operador == 'xor') ? 'selected' : '' ?>>xor (O exclusivo)</option>
                    <option value="+" <?= ($operador == '+') ? 'selected' : '' ?>>+ (Suma aritmética)</option>
                    <option value="-" <?= ($operador == '-') ? 'selected' : '' ?>>- (Resta aritmética)</option>
                </select>
            </div>

            <div class="campo">
                <label for="valor2">Segundo valor (número, boolean, texto):</label>
                <input type="text" name="valor2" id="valor2" class="input-texto" 
                       placeholder="Ej: false, 5, true..." 
                       value="<?= htmlspecialchars($valor2) ?>" required>
            </div>

            <div class="botones">
                <button type="submit" class="btn btn-calcular">Calcular resultado</button>
                <a href="parte5.php" class="btn btn-reiniciar">Reiniciar</a>
            </div>
        </form>
    </div>
</body>
</html>
