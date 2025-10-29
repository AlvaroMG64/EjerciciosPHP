<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Relación 3 - Ejercicio 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">

        <h1>Pruebas de funciones de Relacion3.php</h1>
        <?php

            // Incluimos la librería
            include 'Relacion3.php';

            // Pruebas de las funciones

            // --- Primos ---
            $numero = 17;
            echo "¿$numero es primo? " . (esPrimo($numero) ? "Sí" : "No") . "<br>";

            // --- Factorial ---
            $n = 5;
            echo "Factorial iterativo de $n = " . factorialIterativo($n) . "<br>";
            echo "Factorial recursivo de $n = " . factorialRecursivo($n) . "<br>";

            // --- MCD (restas) ---
            $a = 48;
            $b = 18;
            echo "MCD por restas de $a y $b = " . mcdRestas($a, $b) . "<br>";

            // --- MCD (divisiones) ---
            echo "MCD por divisiones de $a y $b = " . mcdDivision($a, $b) . "<br>";

            // --- MCD (restas recursivo) ---
            echo "MCD por restas recursivo de $a y $b = " . mcdRestasRecursivo($a, $b) . "<br>";

            // --- MCD (divisiones recursivo) ---
            echo "MCD por divisiones recursivo de $a y $b = " . mcdDivisionRecursivo($a, $b) . "<br>";
        ?>

    </div>
</body>
</html>