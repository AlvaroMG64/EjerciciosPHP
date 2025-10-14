<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 1 - Ejercicio 19</title>
</head>
<body>
    <h1>Convertir un número decimal natural a binario</h1>

    <?php
        $numero = 23;
        echo "Número decimal: $numero<br>";

        $decimal = $numero;
        $binario = "";

        if ($decimal == 0) {
            $binario = "0";
        } else {
            while ($decimal > 0) {
                $binario = ($decimal % 2) . $binario;
                $decimal = intdiv($decimal, 2);
            }
        }

        echo "Número binario: $binario";
    ?>

</body>
</html>