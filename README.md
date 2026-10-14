# Batería de ejercicios - PHP

Este repositorio recopila una serie de ejercicios prácticos desarrollados en **PHP** y tecnologías web para el módulo de Desarrollo Web en Entorno Servidor. Abarca conceptos fundamentales como la gestión de formularios vía `GET`, generación aleatoria, manipulación y concatenación de cadenas, lógica condicional y estructuras de datos en arrays, junto con una interfaz cuidada y moderna.

---

## Estructura del proyecto

A continuación se detallan los enlaces a cada una de las partes que componen la batería de ejercicios:

* [**Parte 1: Tirada de dado**](./Parte1)
* [**Parte 2: Historial de dados**](./Parte2)
* [**Parte 3: Constructor de frases "cuñado"**](./Parte3)
* [**Parte 4: Constructor de frases "cuñado" 2**](./Parte4)
* [**Parte 5: Comparador (Comparator)**](./Parte5)
* [**Parte 6: Strings "Cachondas"**](./Parte6)

---

## Resumen de los ejercicios

### [Parte 1 — Tirada de dado](./Parte1)
Simula el lanzamiento de un dado de 6 caras.
* **Lógica**: Genera un número aleatorio del 1 al 6 mediante PHP y lo refleja en la URL vía `GET` (`?numero=X`).
* **Visual**: Muestra la imagen del dado correspondiente junto con su valor numérico y una animación de rotación al rodar.
* **Acciones**: Incluye botones para lanzar nuevamente o reiniciar el estado inicial.

### [Parte 2 — Historial de dados](./Parte2)
Evolución del ejercicio anterior que mantiene la persistencia de las tiradas acumuladas.
* **Persistencia por URL**: Almacena la secuencia de números lanzados como parámetro en la URL (`parte2.php?resultados=...`) mediante una redirección limpia.
* **Visualización en cuadrícula**: Además del dado actual en grande, despliega una tarjeta completa con un histórico de cuadraditos interactivos que detallan el número de tirada (`#1`, `#2`...), la imagen en miniatura y el valor obtenido.

### [Parte 3 — Constructor de frases "cuñado"](./Parte3)
Generador interactivo de frases cómicas utilizando formularios PHP.
* **Estructura**: Formulario con 3 desplegables (`<select>`) de 5 opciones cada uno (introducción, acción/comentario y cierre/consejo).
* **Procesamiento**: Envía los datos vía `GET`, conserva las opciones seleccionadas en el formulario y concatena los textos seleccionados para mostrar la frase final generada.

### [Parte 4 — Constructor de frases "cuñado" 2](./Parte4)
Ampliación avanzada del constructor de frases.
* **Generación aleatoria**: Incorpora un botón para generar automáticamente una frase combinando aleatoriamente elementos predefinidos mediante arrays en PHP.
* **Modalidad Extra Life (Inputs personalizados)**: Añade un campo de texto debajo de cada desplegable. Si el input contiene texto, PHP prioriza y utiliza ese texto personalizado en lugar de la opción del desplegable; si se deja vacío, emplea la opción elegida en el selector.

### [Parte 5 — Comparador (Comparator)](./Parte5)
Calculadora y evaluador de expresiones lógicas y aritméticas.
* **Entradas**: Dos campos de texto abiertos para introducir números, booleanos (`true`/`false`) o cadenas, junto a un selector de operación (`and`, `or`, `xor`, `+`, `-`).
* **Evaluación**: Procesa la operación mediante estructuras condicionales en PHP.
* **Estilo condicional**: Resalta en tiempo real el resultado en color verde para valores verdaderos o numéricos válidos, y en color rojo para evaluaciones `false` o errores de cálculo.

### [Parte 6 — Strings "Cachondas"](./Parte6)
Manipulación y filtrado avanzado de texto sobre una frase predeterminada:
> *"Hace frío mucho frío tiempo frío que frío me frío estoy frío quedando frío contigo frío"*
* **Opción A**: Convierte la frase en array con `explode()`, itera mediante un bucle `for` descartando las posiciones pares y une las palabras restantes con `implode()`.
* **Opción B (+2 pts)**: Recorre el array mediante un bucle `for` filtrando y eliminando cada aparición exacta de la palabra *"frío"*.

---

## Características destacadas

### Barra de navegación modular (`Navbar/`)
Para facilitar la navegación fluida entre todos los ejercicios, se ha creado una carpeta independiente [`Navbar/`](./Navbar) con dos archivos reutilizables:
* **`Navbar/navbar.php`**: Cabecera fija con el título `Batería de ejercicios - PHP` a la izquierda y enlaces directos a cada ejercicio a la derecha. Identifica de manera dinámica mediante PHP la página actual (`basename($_SERVER['PHP_SELF'])`) para iluminar en azul el enlace activo correspondiente.
* **`Navbar/navbar.css`**: Estilos dedicados con posición `sticky` y diseño totalmente responsivo adaptado a dispositivos móviles y escritorios.

### Recursos gráficos para los dados (`resources/`)
Para la representación visual del dado en la **Parte 1** y en la **Parte 2** (tanto el dado actual como las miniaturas del historial), se emplean las imágenes de cada una de las caras del dado (del 1 al 6 en formato `.png`) ubicadas en el directorio `resources/`.

### Efectos de sonido y síntesis de voz
* **Sonido de tirada (Partes 1 y 2)**: Al pulsar sobre *"Lanzar dado"*, se reproduce un efecto de sonido sintetizado en tiempo real utilizando la **Web Audio API** de JavaScript, sin requerir ningún archivo `.mp3` ni librerías pesadas.
* **Locución por voz (Partes 3 y 4)**: Al generar una frase (o al pulsar *"Frase aleatoria"*), la web lee la frase generada en voz alta en español utilizando la **Web Speech API** nativa del navegador (`window.speechSynthesis`). La reproducción se efectúa una sola vez por generación y respeta el silencio al reiniciar.

### Diseño visual y CSS (Asistido con Inteligencia Artificial)
Todo el diseño visual ha sido construido con **CSS puro** apoyado mediante **asistencia de IA** para obtener un acabado estético moderno y atractivo.

---

## Requisitos y ejecución

1. Disponer de un entorno local con soporte para PHP (como **XAMPP**, WAMP o Docker).
2. Clonar o ubicar esta carpeta dentro del directorio raíz del servidor web (por ejemplo `htdocs/Act_servidor/PHP-Bateria_de_ejercicios/`).
3. Iniciar el módulo de Apache en XAMPP.
4. Acceder desde el navegador a:
   ```
   http://localhost/Act_servidor/PHP-Bateria_de_ejercicios/
   ```
   *(La raíz redirige automáticamente a la Parte 1 mediante `index.php`).*