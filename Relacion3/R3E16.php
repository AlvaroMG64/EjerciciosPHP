<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Relación 3 - Ejercicio 16</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="playamar.png" type="image/x-icon">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="card shadow border-0">
            <div class="card-header bg-success text-white text-center">
                <h2>Callbacks con Arrays</h2>
            </div>
            <div class="card-body">

                <?php
                    // -----------------------------
                    // ARRAY BASE Y FUNCIONES
                    // -----------------------------
                    $numeros = range(1, 100);

                    // ✅ Función de primos corregida
                    $esPrimo = function($n) {
                        if ($n < 2) return false;
                        for ($i = 2; $i <= sqrt($n); $i++) {
                            if ($n % $i === 0) return false;
                        }
                        return true;
                    };

                    // -----------------------------
                    // OPERACIONES CALLBACK
                    // -----------------------------
                    $todosPositivos = array_reduce($numeros, fn($carry, $n) => $carry && $n > 0, true);
                    $algunoMultiplo5 = array_reduce($numeros, fn($carry, $n) => $carry || $n % 5 === 0, false);
                    $primos = array_filter($numeros, $esPrimo);
                    $dosCifras = array_filter($numeros, fn($n) => $n >= 10 && $n % 11 === 0);
                    $primeroDosCifras = reset($dosCifras);
                    $cuadrados = array_map(fn($n) => $n ** 2, $numeros);
                    $duplicados = $numeros;
                    array_walk($duplicados, fn(&$n) => $n *= 2);
                ?>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped text-center align-middle">
                        <thead class="table-success">
                        <tr>
                            <th>Operación</th>
                            <th>Resultado</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Todos positivos (array_all)</td>
                            <td><?= $todosPositivos ? "Sí" : "No" ?></td>
                        </tr>
                        <tr>
                            <td>Alguno múltiplo de 5 (array_any)</td>
                            <td><?= $algunoMultiplo5 ? "Sí" : "No" ?></td>
                        </tr>
                        <tr>
                            <td>Números primos (array_filter)</td>
                            <td><?= implode(', ', $primos) ?></td>
                        </tr>
                        <tr>
                            <td>Primer número con cifras idénticas (array_find)</td>
                            <td><?= $primeroDosCifras ?: "Ninguno" ?></td>
                        </tr>
                        <tr>
                            <td>Cuadrado de cada número (array_map) - primeros 10</td>
                            <td><?= implode(', ', array_slice($cuadrados, 0, 10)) ?> ...</td>
                        </tr>
                        <tr>
                            <td>Doblados (array_walk) - primeros 10</td>
                            <td><?= implode(', ', array_slice($duplicados, 0, 10)) ?> ...</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>