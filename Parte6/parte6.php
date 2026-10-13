<?php
// Frase original dada en el ejercicio
$fraseOriginal = "Hace frío mucho frío tiempo frío que frío me frío estoy frío quedando frío contigo frío";

// Convertimos la frase en un array de palabras usando explode
$palabras = explode(" ", $fraseOriginal);

// Opción A: Eliminar las palabras en posición par (2ª, 4ª, 6ª...)
$palabrasImpares = [];
for ($i = 0; $i < count($palabras); $i++) {
    if ($i % 2 == 0) {
        $palabrasImpares[] = $palabras[$i];
    }
}
$fraseResultadoA = implode(" ", $palabrasImpares);

// Opción B: Eliminar cada vez que aparece la palabra "frío"
$palabrasSinFrio = [];
for ($i = 0; $i < count($palabras); $i++) {
    if ($palabras[$i] != "frío") {
        $palabrasSinFrio[] = $palabras[$i];
    }
}
$fraseResultadoB = implode(" ", $palabrasSinFrio);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parte 6 - Strings</title>
    <link rel="stylesheet" href="../Navbar/navbar.css">
    <link rel="stylesheet" href="parte6.css">
</head>
<body>
    <?php include __DIR__ . '/../Navbar/navbar.php'; ?>
    <main class="contenedor">
        <h1>Strings "Cachondas"</h1>

        <!-- Frase original -->
        <section class="seccion-bloque">
            <h2>Frase original</h2>
            <div class="caja-frase">
                <p>"<?= htmlspecialchars($fraseOriginal) ?>"</p>
            </div>
        </section>

        <!-- Resultados -->
        <section class="seccion-bloque">
            <h2>Resultado con implode</h2>

            <div class="tarjeta-resultado">
                <span class="badge badge-opcion">Opción A &bull; Sin posiciones pares</span>
                <p class="frase-resultado">"<?= htmlspecialchars($fraseResultadoA) ?>"</p>
            </div>

            <div class="tarjeta-resultado">
                <span class="badge badge-extra">Opción B &bull; Sin la palabra "frío"</span>
                <p class="frase-resultado">"<?= htmlspecialchars($fraseResultadoB) ?>"</p>
            </div>
        </section>
    </main>
</body>
</html>
