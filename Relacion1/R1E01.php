<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Relación 1 - Ejercicio 1</title>
    </head>
    <body>
        <h1>Hola Mundo</h1>

        <?php
        // 1. Texto plano HTML
            echo "Hello world<br>";

            // 2. Como encabezado de nivel 2
            echo "<h2>Hello world</h2>";

            // 3. Como párrafo con estilo
            echo "<p style='color: blue; font-family: Arial; text-align: center;'>Hello world</p>";

            // 4. Con salto de línea entre hello y world
            echo "Hello<br>World<br>";

            // 5. Información sobre PHP
            echo "<h3>Información del servidor PHP</h3>";
            echo "Versión de PHP: " . phpversion() . "<br><br>";

            // 6. Mostrar la fecha y hora actuales
            echo "<h3>Fecha y hora actuales</h3>";
            echo date("d/m/Y H:i:s") . "<br>";

            // 7. Información completa del entorno PHP
            phpinfo();
        ?>

    </body>
</html>