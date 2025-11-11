<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 1 - Ejercicio 16</title>
    <link rel="shortcut icon" href="playamar.png" type="image/x-icon">
</head>
<body>
    <h1>Mostrar todos los divisores de un número entero positivo</h1>

    <?php
        $numero = 12; // número a analizar
        echo "Número: $numero<br>";
        echo "Divisores de $numero<br>";

        for ($i = 1; $i <= $numero; $i++) {
            if ($numero % $i == 0) {
                echo "<span style='color: red;'>$i</span> ";
            } else {
                echo "$i ";
            }
        }
    ?>

</body>
</html>