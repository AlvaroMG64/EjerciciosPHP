<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 1 - Ejercicio 17</title>
</head>
<body>
    <h1>División de dos números usando el algoritmo de Euclides</h1>

    <?php
        $dividendo = 20;
        $divisor = 6;

        echo "Dividendo: $dividendo <br>Divisor: $divisor<br>";

        $cociente = 0;
        $resto = $dividendo;

        while ($resto >= $divisor) {
            $resto -= $divisor;
            $cociente++;
        }

        echo "Cociente: $cociente<br>";
        echo "Resto: $resto";
    ?>

</body>
</html>