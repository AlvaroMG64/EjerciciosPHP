<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 1 - Ejercicio 11</title>
</head>
<body>
    <h1>Resolución de ecuaciones considerando coeficientes cero</h1>

    <?php
        $a = 1;
        $b = 0;
        $c = -4;

        echo "a: $a <br>";
        echo "b: $b <br>";
        echo "c: $c <br><br>";

        if ($a != 0) {
            if ($b != 0 && $c != 0) {
                // Ecuación de segundo grado normal
                $d = $b*$b - 4*$a*$c;
                if ($d < 0) {
                    echo "No hay soluciones reales";
                } else {
                    $x1 = (-$b + sqrt($d)) / (2*$a);
                    $x2 = (-$b - sqrt($d)) / (2*$a);
                    echo "Primera solución: $x1<br>Segunda solución: $x2";
                }
            } elseif ($b == 0 && $c != 0) {
                // x^2 = -c/a
                if (-$c/$a < 0) {
                    echo "No hay soluciones reales";
                } else {
                    $x1 = -sqrt(-$c/$a);
                    $x2 = sqrt(-$c/$a);
                    echo "Primera solución: $x1<br>Segunda solución: $x2";
                }
            } elseif ($c == 0) {
                // ax^2 + bx = 0 => x(ax+b)=0
                $x1 = 0;
                $x2 = -$b/$a;
                echo "Primera solución: $x1<br>Segunda solución: $x2";
            }
        } else {
            if ($b != 0) {
                $x = -$c/$b;
                echo "Ecuación lineal<br>";
                echo "Solución única: $x";
            } else {
                echo "No hay solución o infinitas soluciones según los valores de c";
            }
        }
    ?>

</body>
</html>