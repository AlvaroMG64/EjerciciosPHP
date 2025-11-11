<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 1 - Ejercicio 13</title>
    <link rel="shortcut icon" href="playamar.png" type="image/x-icon">
</head>
<body>
    <h1>Cálculo del factorial de un número natural</h1>

    <?php
        $numero = 5; // número natural
        echo "Número: $numero <br>";

        if ($numero < 0 || !is_int($numero)) {
            echo "El número debe ser entero y positivo";
        } else {
            $factorial = 1;
            for ($i = $numero; $i >= 1; $i--) {
                $factorial *= $i;
            }
            echo "El factorial de $numero es: $factorial";
        }
    ?>

</body>
</html>