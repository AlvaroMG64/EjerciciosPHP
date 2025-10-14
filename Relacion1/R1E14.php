<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 1 - Ejercicio 14</title>
</head>
<body>
    <h1>Suma de los n primeros números naturales</h1>

    <?php
        $numero = 10; // número natural
        echo "Número: $numero<br>";

        if ($numero < 1 || !is_int($numero)) {
            echo "El número debe ser entero y positivo";
        } else {
            $suma = 0;
            for ($i = 1; $i <= $numero; $i++) {
                $suma += $i;
            }
            echo "La suma de los $numero primeros números naturales es: $suma";
        }
    ?>

</body>
</html>