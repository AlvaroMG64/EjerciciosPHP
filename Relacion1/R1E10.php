<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 1 - Ejercicio 10</title>
    <link rel="shortcut icon" href="playamar.png" type="image/x-icon">
</head>
<body>
    <h1>Resolución de una ecuación de segundo grado</h1>

    <?php
        $a = 1;
        $b = -3;
        $c = 2;

        echo "a: $a <br>";
        echo "b: $b <br>";
        echo "c: $c <br><br>";

        $radicando = $b * $b - 4 * $a * $c;

        if ($radicando < 0) {
            echo "No hay soluciones reales";
        } else {
            $x1 = (-$b + sqrt($radicando)) / (2*$a);
            $x2 = (-$b - sqrt($radicando)) / (2*$a);
            echo "Primera solución: $x1<br>";
            echo "Segunda solución: $x2<br>";
        }
    ?>

</body>
</html>