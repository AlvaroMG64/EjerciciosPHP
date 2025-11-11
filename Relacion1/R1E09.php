<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 1 - Ejercicio 9</title>
    <link rel="shortcut icon" href="playamar.png" type="image/x-icon">
</head>
<body>
    <h1>Clasificación de un triángulo según sus lados</h1>

    <?php
        $lado1 = 5;
        $lado2 = 5;
        $lado3 = 7;

        echo "Lado 1: $lado1 <br>";
        echo "Lado 2: $lado2 <br>";
        echo "Lado 3: $lado3 <br><br>";

        if ($lado1 == $lado2 && $lado2 == $lado3) {
            echo "El triángulo es equilátero";
        } elseif ($lado1 == $lado2 || $lado1 == $lado3 || $lado2 == $lado3) {
            echo "El triángulo es isósceles";
        } else {
            echo "El triángulo es escaleno";
        }
    ?>

</body>
</html>