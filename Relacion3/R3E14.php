<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Relación 3 - Ejercicio 14</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">

    <div class="container">
        <h1 class="mb-4">Cálculos con funciones anónimas</h1>
        <form method="post" class="mb-4">
            <div class="mb-3">
                <label for="radio" class="form-label">Introduce el radio (positivo):</label>
                <input type="number" step="any" name="radio" id="radio" class="form-control" required min="0">
            </div>
            <button type="submit" class="btn btn-primary">Calcular</button>
        </form>

        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $r = floatval($_POST['radio']);

                if ($r <= 0) {
                    echo "<div class='alert alert-danger'>❌ El radio debe ser un número positivo.</div>";
                } else {

                    // 🔹 Funciones anónimas
                    $circunferencia = function ($n) {
                        return 2 * M_PI * $n;
                    };

                    $circulo = function ($n) {
                        return M_PI * pow($n, 2);
                    };

                    $esfera = function ($n) {
                        return (4 / 3) * M_PI * pow($n, 3);
                    };

                    // 🔹 Cálculos
                    $longitud = $circunferencia($r);
                    $area = $circulo($r);
                    $volumen = $esfera($r);

                    // 🔹 Resultados
                    echo "<div class='alert alert-success'><strong>Radio introducido:</strong> $r</div>";
                    echo "<div class='alert alert-info'><strong>Longitud de la circunferencia:</strong> " . round($longitud, 3) . "</div>";
                    echo "<div class='alert alert-warning'><strong>Área del círculo:</strong> " . round($area, 3) . "</div>";
                    echo "<div class='alert alert-secondary'><strong>Volumen de la esfera:</strong> " . round($volumen, 3) . "</div>";
                }
            }
        ?>
    </div>

</body>
</html>