<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Relación 3 - Ejercicio 7</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="card">
            <div class="card-header bg-primary text-white text-center">
                <h1>Funciones de Fecha y Hora</h1>
            </div>

            <div class="card-body">
                <?php
                // ---------------------------------
                // FUNCIONES PERSONALIZADAS
                // ---------------------------------
                function nombreDia($fecha) {
                    $dias = ["domingo", "lunes", "martes", "miércoles", "jueves", "viernes", "sábado"];
                    return $dias[date("w", strtotime($fecha))];
                }

                function nombreMes($fecha) {
                    $meses = [
                        1 => "enero", 2 => "febrero", 3 => "marzo", 4 => "abril",
                        5 => "mayo", 6 => "junio", 7 => "julio", 8 => "agosto",
                        9 => "septiembre", 10 => "octubre", 11 => "noviembre", 12 => "diciembre"
                    ];
                    return $meses[date("n", strtotime($fecha))];
                }

                // ---------------------------------
                // DATOS AUTOMÁTICOS
                // ---------------------------------
                $ahora = date("Y-m-d H:i:s");
                $ayer = date("Y-m-d", strtotime("-1 day"));
                $manana = date("Y-m-d", strtotime("+1 day"));
                $semanaProx = date("Y-m-d", strtotime("+1 week"));
                $navidad = mktime(0, 0, 0, 12, 25, 2025);

                echo "<div class='text-center mb-4'>";
                echo "<h5 class='text-primary'>Fecha y hora actual:</h5>";
                echo "<p class='lead'><strong>$ahora</strong></p>";
                echo "<p>Hoy es <strong>" . ucfirst(nombreDia($ahora)) . "</strong> de <strong>" . ucfirst(nombreMes($ahora)) . "</strong>.</p>";
                echo "</div>";
                ?>

                <div class="table-responsive mb-4">
                    <table class="table table-striped table-bordered align-middle text-center">
                        <thead class="table-primary">
                            <tr>
                                <th>Descripción</th>
                                <th>Fecha</th>
                                <th>Día</th>
                                <th>Mes</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td>Ayer</td><td><?= $ayer ?></td><td><?= nombreDia($ayer) ?></td><td><?= nombreMes($ayer) ?></td></tr>
                            <tr><td>Hoy</td><td><?= date("Y-m-d") ?></td><td><?= nombreDia(date("Y-m-d")) ?></td><td><?= nombreMes(date("Y-m-d")) ?></td></tr>
                            <tr><td>Mañana</td><td><?= $manana ?></td><td><?= nombreDia($manana) ?></td><td><?= nombreMes($manana) ?></td></tr>
                            <tr><td>Dentro de una semana</td><td><?= $semanaProx ?></td><td><?= nombreDia($semanaProx) ?></td><td><?= nombreMes($semanaProx) ?></td></tr>
                            <tr><td>Navidad 2025</td><td><?= date("Y-m-d", $navidad) ?></td><td><?= nombreDia(date("Y-m-d", $navidad)) ?></td><td><?= nombreMes(date("Y-m-d", $navidad)) ?></td></tr>
                        </tbody>
                    </table>
                </div>

                <?php
                // ---------------------------------
                // DIFERENCIA ENTRE DOS FECHAS
                // ---------------------------------
                $inicio = new DateTime("2025-01-01");
                $fin = new DateTime("2025-12-31");
                $intervalo = $inicio->diff($fin);
                ?>
                <div class="alert alert-warning text-center">
                    Entre el <strong><?= $inicio->format("d/m/Y") ?></strong> y el <strong><?= $fin->format("d/m/Y") ?></strong> hay <strong><?= $intervalo->days ?></strong> días.
                </div>

                <!-- FORMULARIO DE FECHA -->
                <div class="card mt-5 border-0 shadow-sm">
                    <div class="card-header bg-secondary text-white text-center">
                        <h5>Consulta de Día y Mes</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" class="row g-3 justify-content-center">
                            <div class="col-md-4">
                                <label for="fecha" class="form-label">Introduce una fecha:</label>
                                <input type="date" name="fecha" id="fecha" class="form-control" required>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-success mt-3">Consultar</button>
                            </div>
                        </form>

                        <?php
                        if (isset($_POST['fecha'])) {
                            $fechaIngresada = $_POST['fecha'];
                            echo "<div class='alert alert-info mt-4 text-center'>";
                            echo "La fecha <strong>$fechaIngresada</strong> corresponde al <strong>" . nombreDia($fechaIngresada) . "</strong> de <strong>" . nombreMes($fechaIngresada) . "</strong>.";
                            echo "</div>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>