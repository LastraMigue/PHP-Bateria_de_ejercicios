<?php
// Determinamos la página actual para marcar el enlace activo
$paginaActual = basename($_SERVER['PHP_SELF']);
?>
<nav class="navbar">
    <div class="navbar-contenedor">
        <span class="navbar-brand">Batería de ejercicios - PHP</span>
        <div class="navbar-enlaces">
            <a href="../Parte1/parte1.php" class="nav-enlace <?= ($paginaActual === 'parte1.php') ? 'activo' : '' ?>">Parte 1: Dado</a>
            <a href="../Parte2/parte2.php" class="nav-enlace <?= ($paginaActual === 'parte2.php') ? 'activo' : '' ?>">Parte 2: Historial</a>
            <a href="../Parte3/parte3.php" class="nav-enlace <?= ($paginaActual === 'parte3.php') ? 'activo' : '' ?>">Parte 3: Frases</a>
            <a href="../Parte4/parte4.php" class="nav-enlace <?= ($paginaActual === 'parte4.php') ? 'activo' : '' ?>">Parte 4: Frases 2</a>
            <a href="../Parte5/parte5.php" class="nav-enlace <?= ($paginaActual === 'parte5.php') ? 'activo' : '' ?>">Parte 5: Comparador</a>
            <a href="../Parte6/parte6.php" class="nav-enlace <?= ($paginaActual === 'parte6.php') ? 'activo' : '' ?>">Parte 6: Strings</a>
        </div>
    </div>
</nav>
