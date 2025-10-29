<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Funciones Anónimas en PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">

    <div class="container">
        <h1 class="mb-4 text-center">Cálculos con funciones anónimas</h1>

        <div class="card shadow-sm">
            <div class="card-body">
                <form method="post" class="mb-4">
                    <div class="mb-3">
                        <label for="radio" class="form-label">Introduce el radio (positivo):</label>
                        <input type="number" step="any" name="radio" id="radio" class="form-control" required min="0">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Calcular</button>
                </form>

                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $r = floatval($_POST['radio']);

                        if ($r <= 0) {
                            echo "<div class='alert alert-danger text-center'>❌ El radio debe ser un número positivo.</div>";
                        } else {
                            // Funciones anónimas
                            $circunferencia = function ($n) {
                                return 2 * M_PI * $n;
                            };

                            $circulo = function ($n) {
                                return M_PI * pow($n, 2);
                            };

                            $esfera = function ($n) {
                                return (4 / 3) * M_PI * pow($n, 3);
                            };

                            // Cálculos
                            $longitud = $circunferencia($r);
                            $area = $circulo($r);
                            $volumen = $esfera($r);
                            ?>

                            <h5 class="text-center mb-3">Resultados para radio = <?= htmlspecialchars($r) ?></h5>
                            <table class="table table-bordered table-striped text-center align-middle">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Concepto</th>
                                        <th>Fórmula</th>
                                        <th>Resultado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Longitud de la circunferencia</td>
                                        <td>2 · π · r</td>
                                        <td><?= round($longitud, 3) ?></td>
                                    </tr>
                                    <tr>
                                        <td>Área del círculo</td>
                                        <td>π · r²</td>
                                        <td><?= round($area, 3) ?></td>
                                    </tr>
                                    <tr>
                                        <td>Volumen de la esfera</td>
                                        <td>(4/3) · π · r³</td>
                                        <td><?= round($volumen, 3) ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        <?php
                        }
                    }
                ?>
            </div>
        </div>
    </div>

</body>
</html>
