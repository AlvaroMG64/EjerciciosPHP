<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Relación 3 - Ejercicio 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">

        <h1>Relacion3.php</h1>
        <h1>Librería de funciones matemáticas</h1>
        <?php

            // Función que calcula si un número es primo o no
            function esPrimo($numero) {
                $esPrimo = true;

                if ($numero < 2) {
                    $esPrimo = false;
                } else {
                    for ($i = 2; $i <= sqrt($numero); $i++) {
                        if ($numero % $i == 0) {
                            $esPrimo = false;
                        }
                    }
                }

                return $esPrimo;
            }

            // Función factorial iterativa
            function factorialIterativo($n) {
                $factorial = 1;
                for ($i = 1; $i <= $n; $i++) {
                    $factorial *= $i;
                }
                return $factorial;
            }

            // Función factorial con recursividad
            function factorialRecursivo($n) {
                if ($n <= 1) {
                    $factorial = 1;
                } else {
                    $factorial = $n * factorialRecursivo($n - 1);
                }
                return $factorial;
            }

            // Algoritmo de Euclides por restas sucesivas (iterativo)
            function mcdRestas($a, $b) {
                while ($a != $b) {
                    if ($a > $b) {
                        $a -= $b;
                    } else {
                        $b -= $a;
                    }
                }
                return $a;
            }

            // Algoritmo de Euclides por divisiones sucesivas (iterativo)
            function mcdDivision($a, $b) {
                while ($b != 0) {
                    $resto = $a % $b;
                    $a = $b;
                    $b = $resto;
                }
                return $a;
            }

            // Versión recursiva por restas
            function mcdRestasRecursivo($a, $b) {
                if ($a == $b) {
                    return $a;
                } elseif ($a > $b) {
                    return mcdRestasRecursivo($a - $b, $b);
                } else {
                    return mcdRestasRecursivo($a, $b - $a);
                }
            }

            // Versión recursiva por divisiones
            function mcdDivisionRecursivo($a, $b) {
                if ($b == 0) {
                    return $a;
                } else {
                    return mcdDivisionRecursivo($b, $a % $b);
                }
            }
            ?>

    </div>
</body>
</html>