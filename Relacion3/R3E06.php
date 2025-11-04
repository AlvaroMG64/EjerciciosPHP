<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Relación 3 - Ejercicio 6</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5 w-50">
        <div class="card shadow-lg border-0">
            <div class="card-header bg-primary text-white text-center">
                <h1>Simulación de Dados</h1>
            </div>
            <div class="card-body">
                <form method="post" class="row g-3">
                    <div class="col-md-6 offset-md-3">
                        <label for="tiradas" class="form-label">Número de tiradas:</label>
                        <input type="number" class="form-control" id="tiradas" name="tiradas" min="1" required>
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-success mt-3">Simular</button>
                    </div>
                </form>

                <?php
                if (isset($_POST['tiradas'])) {
                    $tiradas = intval($_POST['tiradas']);
                    $freqNormal = array_fill(1, 6, 0);
                    $freqTrucado = array_fill(1, 6, 0);

                    for ($i = 0; $i < $tiradas; $i++) {
                        $normal = rand(1, 6);
                        $freqNormal[$normal]++;

                        $r = rand(1, 9);
                        $trucado = ($r <= 6) ? $r : 6;
                        $freqTrucado[$trucado]++;
                    }

                    echo "<div class='mt-5'>";
                    echo "<h5 class='text-center'>Resultados para $tiradas tiradas</h5>";
                    echo "<table class='table table-striped table-bordered mt-3 text-center'>";
                    echo "<thead class='table-primary'>
                            <tr>
                                <th>Cara</th>
                                <th>Normal</th>
                                <th>Trucado</th>
                                <th>% Normal</th>
                                <th>% Trucado</th>
                            </tr>
                        </thead><tbody>";
                    for ($i = 1; $i <= 6; $i++) {
                        $porcNormal = round($freqNormal[$i] / $tiradas * 100, 2);
                        $porcTrucado = round($freqTrucado[$i] / $tiradas * 100, 2);
                        echo "<tr>
                                <td>$i</td>
                                <td>{$freqNormal[$i]}</td>
                                <td>{$freqTrucado[$i]}</td>
                                <td>{$porcNormal}%</td>
                                <td>{$porcTrucado}%</td>
                            </tr>";
                    }
                    echo "</tbody></table></div>";
                }
                ?>
            </div>
            <div class="card-footer text-center">
                <a href="R3E06.php" class="btn btn-outline-secondary">Volver al Menú</a>
            </div>
        </div>
    </div>
</body>
</html>