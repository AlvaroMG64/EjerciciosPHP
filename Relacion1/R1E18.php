<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 1 - Ejercicio 18</title>
    <link rel="shortcut icon" href="playamar.png" type="image/x-icon">
</head>
<body>
    <h1>Cálculo del máximo común divisor usando Euclides</h1>

    <?php
        $a = 36;
        $b = 60;

        echo "Número 1: $a <br>Número 2: $b<br>";

        $x = $a;
        $y = $b;

        while ($y != 0) {
            $temp = $y;
            $y = $x % $y;
            $x = $temp;
        }

        echo "Máximo común divisor: $x";
    ?>

</body>
</html>