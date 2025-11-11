<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 1 - Ejercicio 15</title>
    <link rel="shortcut icon" href="playamar.png" type="image/x-icon">
</head>
<body>
    <h1>Cálculo de números primos</h1>

    <?php
    $numero = 17; // número a probar
    echo "Número: $numero<br>";

    if ($numero < 2 || !is_int($numero)) {
        echo "La definición de números primos solo se aplica para números mayores o iguales que 2";
    } else {
        $esPrimo = true;
        for ($i = 2; $i <= sqrt($numero); $i++) {
            if ($numero % $i == 0) {
                $esPrimo = false;
                break;
            }
        }
        if ($esPrimo) {
            echo "$numero es primo";
        } else {
            echo "$numero no es primo";
        }
    }
    ?>

</body>
</html>