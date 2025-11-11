<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Relación 3 - Ejercicio 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="playamar.png" type="image/x-icon">
</head>
<body class="bg-light">
    <div class="container py-5 w-50">
        <h1 class="text-center mb-5 text-primary">Pruebas de funciones de <code>Relacion3.php</code></h1>

        <?php
            include 'Relacion3.php';
            // Datos base
            $numero = 17;
            $n = 5;
            $a = 48;
            $b = 18;
        ?>

        <div class="row g-4">
            <!-- Primos -->
            <div class="col-md-6">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white fw-bold">
                        Números Primos
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            ¿<?= $numero ?> es primo? 
                            <span class="fw-bold text-success"><?= esPrimo($numero) ? "Sí" : "No" ?></span>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Factorial -->
            <div class="col-md-6">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-success text-white fw-bold">
                        Factorial
                    </div>
                    <div class="card-body">
                        <p>Factorial iterativo de <strong><?= $n ?></strong> = <?= factorialIterativo($n) ?></p>
                        <p>Factorial recursivo de <strong><?= $n ?></strong> = <?= factorialRecursivo($n) ?></p>
                    </div>
                </div>
            </div>

            <!-- MCD por restas -->
            <div class="col-md-6">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-warning text-dark fw-bold">
                        Máximo Común Divisor (Restas)
                    </div>
                    <div class="card-body">
                        <p>MCD por restas de <strong><?= "$a y $b" ?></strong> = <?= mcdRestas($a, $b) ?></p>
                        <p>MCD por restas (recursivo) = <?= mcdRestasRecursivo($a, $b) ?></p>
                    </div>
                </div>
            </div>

            <!-- MCD por divisiones -->
            <div class="col-md-6">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-danger text-white fw-bold">
                        Máximo Común Divisor (Divisiones)
                    </div>
                    <div class="card-body">
                        <p>MCD por divisiones de <strong><?= "$a y $b" ?></strong> = <?= mcdDivision($a, $b) ?></p>
                        <p>MCD por divisiones (recursivo) = <?= mcdDivisionRecursivo($a, $b) ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>