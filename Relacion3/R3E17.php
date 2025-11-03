<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Relación 3 - Ejercicio 17</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="card shadow border-0">
            <div class="card-header bg-primary text-white text-center">
                <h2>Funciones de Arrays en PHP</h2>
            </div>
            <div class="card-body">

                <?php
                // ----------------------------------------------------------
                // ARRAYS BASE
                // ----------------------------------------------------------
                $pares = range(1, 20, 2); // Números impares entre 1 y 20
                $multiplosDeTres = range(3, 40, 3); // Múltiplos de 3 entre 1 y 40

                // ----------------------------------------------------------
                // FUNCIONES DE APOYO (flecha)
                // ----------------------------------------------------------
                $esPrimo = fn($n) => $n > 1 && array_reduce(range(2, (int)sqrt($n)), fn($carry, $i) => $carry && $n % $i != 0, true);

                // ----------------------------------------------------------
                // FUNCIONES DE ARRAY
                // ----------------------------------------------------------

                // 1️⃣ array_count_values: cuenta cuántas veces aparece cada número
                $conteoPares = array_count_values($pares);

                // 2️⃣ array_any (simulada): ¿algún múltiplo de 5?
                $algunoMultiplo5 = array_reduce($pares, fn($carry, $n) => $carry || $n % 5 === 0, false);

                // 3️⃣ array_filter: filtrar primos
                $primos = array_filter($pares, $esPrimo);

                // 4️⃣ array_find (simulada): primer número con cifras idénticas (11, 22, 33…)
                $dosCifras = array_filter($pares, fn($n) => $n >= 10 && $n % 11 === 0);
                $primeroDosCifras = reset($dosCifras) ?: "Ninguno";

                // 5️⃣ array_map: obtener el cuadrado
                $cuadrados = array_map(fn($n) => $n ** 2, $pares);

                // 6️⃣ array_walk: sustituir por el doble
                $dobles = $pares;
                array_walk($dobles, fn(&$n) => $n *= 2);

                // 7️⃣ array_intersect: qué valores comparten ambos arrays
                $interseccion = array_intersect($pares, $multiplosDeTres);

                // ----------------------------------------------------------
                // OTRAS FUNCIONES CLÁSICAS DE ARRAYS
                // ----------------------------------------------------------

                // array_combine: crea array asociativo combinando claves y valores
                $combinado = array_combine(range(1, count($pares)), $pares);

                // array_flip: intercambia claves y valores
                $volteado = array_flip($combinado);

                // array_reverse: invierte el orden
                $reverso = array_reverse($pares);

                // array_slice: corta una parte
                $segmento = array_slice($multiplosDeTres, 0, 5);

                // array_unique: elimina duplicados
                $unicos = array_unique(array_merge($pares, $multiplosDeTres));

                // array_values: reindexa
                $valores = array_values($unicos);

                // count: total de elementos
                $total = count($pares);

                // current: primer valor
                $primero = current($pares);

                // in_array: ¿contiene el número 7?
                $tiene7 = in_array(7, $pares);

                // array_push / array_pop
                array_push($pares, 99);
                $ultimo = array_pop($pares);

                // array_splice: eliminar y reemplazar
                $reemplazo = $multiplosDeTres;
                array_splice($reemplazo, 2, 3, [100, 101]);

                // shuffle y sort
                $desordenado = $pares;
                shuffle($desordenado);
                $ordenado = $desordenado;
                sort($ordenado);
                ?>

                <!-- -----------------------------
                    TABLA DE RESULTADOS
                ----------------------------- -->
                <div class="table-responsive">
                    <table class="table table-bordered table-striped text-center align-middle">
                        <thead class="table-primary">
                        <tr>
                            <th>Operación</th>
                            <th>Resultado</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr><td><strong>Array base (pares)</strong></td><td><?= implode(', ', range(1, 20, 2)) ?></td></tr>
                        <tr><td><strong>Array base (múltiplos de 3)</strong></td><td><?= implode(', ', range(3, 40, 3)) ?></td></tr>
                        <tr><td>array_count_values</td><td><?= json_encode($conteoPares) ?></td></tr>
                        <tr><td>¿Algún múltiplo de 5? (array_any)</td><td><?= $algunoMultiplo5 ? "Sí" : "No" ?></td></tr>
                        <tr><td>Primos (array_filter)</td><td><?= implode(', ', $primos) ?></td></tr>
                        <tr><td>Primer número con cifras idénticas (array_find)</td><td><?= $primeroDosCifras ?></td></tr>
                        <tr><td>Cuadrados (array_map)</td><td><?= implode(', ', $cuadrados) ?></td></tr>
                        <tr><td>Doblados (array_walk)</td><td><?= implode(', ', $dobles) ?></td></tr>
                        <tr><td>Comunes en ambos (array_intersect)</td><td><?= implode(', ', $interseccion) ?: "Ninguno" ?></td></tr>
                        <tr><td>array_combine</td><td><?= json_encode($combinado) ?></td></tr>
                        <tr><td>array_flip</td><td><?= json_encode($volteado) ?></td></tr>
                        <tr><td>array_reverse</td><td><?= implode(', ', $reverso) ?></td></tr>
                        <tr><td>array_slice (primeros 5 múltiplos de 3)</td><td><?= implode(', ', $segmento) ?></td></tr>
                        <tr><td>array_unique</td><td><?= implode(', ', $unicos) ?></td></tr>
                        <tr><td>array_values (reindexado)</td><td><?= implode(', ', $valores) ?></td></tr>
                        <tr><td>count</td><td><?= $total ?> elementos</td></tr>
                        <tr><td>current</td><td><?= $primero ?></td></tr>
                        <tr><td>in_array (¿7 está?)</td><td><?= $tiene7 ? "Sí" : "No" ?></td></tr>
                        <tr><td>array_push + array_pop</td><td>Se añadió 99, luego se quitó <?= $ultimo ?></td></tr>
                        <tr><td>array_splice (sustituidos 3 elementos)</td><td><?= implode(', ', $reemplazo) ?></td></tr>
                        <tr><td>shuffle + sort</td><td>Desordenado: <?= implode(', ', $desordenado) ?><br>Ordenado: <?= implode(', ', $ordenado) ?></td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>