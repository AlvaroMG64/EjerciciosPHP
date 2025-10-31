<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Relación 3 - Ejercicio 7</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white text-center">
                <h1>Fecha y Hora</h1>
            </div>
            <div class="card-body">
                <?php
                // ---------------------------------
                // FUNCIONES PERSONALIZADAS
                // ---------------------------------
                function nombreDia($fecha) {
                    $dias = ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"];
                    return $dias[date("w", strtotime($fecha))];
                }

                function nombreMes($fecha) {
                    $meses = [
                        1 => "Enero", 2 => "febrero", 3 => "Marzo", 4 => "Abril",
                        5 => "Mayo", 6 => "Junio", 7 => "Julio", 8 => "Agosto",
                        9 => "Septiembre", 10 => "Octubre", 11 => "Noviembre", 12 => "Diciembre"
                    ];
                    return $meses[date("n", strtotime($fecha))];
                }

                // 👉 NUEVA FUNCIÓN PARA FORMATEAR FECHAS EN ESPAÑOL
                function formatearFecha($fecha) {
                    $dia = date("d", strtotime($fecha));
                    $mes = nombreMes($fecha);
                    $anio = date("Y", strtotime($fecha));
                    $nombreDia = nombreDia($fecha);
                    return ucfirst("$nombreDia, $dia de $mes de $anio");
                }

                // ---------------------------------
                // DATOS AUTOMÁTICOS
                // ---------------------------------
                date_default_timezone_set("Europe/Madrid");
                setlocale(LC_TIME, "es_ES.UTF-8");

                $ahora = date("Y-m-d H:i:s");
                $ayer = date("Y-m-d", strtotime("-1 day"));
                $manana = date("Y-m-d", strtotime("+1 day"));
                $semanaProx = date("Y-m-d", strtotime("+1 week"));
                $navidad = mktime(0, 0, 0, 12, 25, 2025);

                echo "<div class='text-center mb-4'>";
                echo "<h4 class='text-primary'>Fecha y hora actual:</h4>";
                echo "<h2 class='fw-bold'>" . formatearFecha($ahora) . "</h2>";
                echo "<h4>Hora actual: <strong>" . date("H:i:s") . "</strong></h4>";
                echo "</div>";
                ?>

                <!-- ================================= -->
                <!-- FUNCIONES UNIX TIME -->
                <!-- ================================= -->
                <div class="card mb-4 shadow-sm border-0">
                    <div class="card-header bg-dark text-white text-center">
                        <h5>Funciones del Tiempo UNIX</h5>
                    </div>
                    <div class="card-body">
                        <?php
                        // Timestamp actual en segundos
                        $timestamp_actual = time();

                        // Timestamp actual en milisegundos
                        $microtime_float = microtime(true);
                        $milisegundos = round($microtime_float * 1000);

                        // Conversiones
                        $minutos = round($timestamp_actual / 60);
                        $horas = round($timestamp_actual / 3600);
                        $dias = round($timestamp_actual / 86400);
                        $anios = round($timestamp_actual / (86400 * 365));

                        // Ejemplo de conversión de fecha a timestamp
                        $fechaEjemplo = "2025-10-31 18:30:00";
                        $timestamp_fecha = strtotime($fechaEjemplo);

                        // Conversión inversa
                        $fecha_legible = date("d/m/Y H:i:s", $timestamp_fecha);

                        // Diferencia de tiempo con otra fecha
                        $inicioUnix = strtotime("2025-01-01");
                        $diferenciaSegundos = $timestamp_actual - $inicioUnix;
                        $diferenciaHoras = round($diferenciaSegundos / 3600, 2);
                        $diferenciaDias = round($diferenciaSegundos / 86400, 2);
                        ?>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <strong>Fecha y hora actuales:</strong> <?= date("d/m/Y H:i:s", $timestamp_actual) ?>
                            </li>
                            <li class="list-group-item">
                                <strong>Timestamp UNIX actual (segundos):</strong> <?= $timestamp_actual ?>
                            </li>
                            <li class="list-group-item">
                                <strong>Timestamp UNIX actual (milisegundos):</strong> <?= $milisegundos ?>
                            </li>
                            <li class="list-group-item">
                                <strong>Equivalencias desde 1970:</strong><br>
                                <?= number_format($minutos, 0, ',', '.') ?> minutos<br>
                                <?= number_format($horas, 0, ',', '.') ?> horas<br>
                                <?= number_format($dias, 0, ',', '.') ?> días<br>
                                <?= number_format($anios, 0, ',', '.') ?> años aproximadamente
                            </li>
                            <li class="list-group-item">
                                <strong>Ejemplo:</strong> La fecha <code><?= $fechaEjemplo ?></code> equivale al timestamp <code><?= $timestamp_fecha ?></code>
                            </li>
                            <li class="list-group-item">
                                <strong>Conversión inversa:</strong> <?= $fecha_legible ?>
                            </li>
                            <li class="list-group-item">
                                <strong>Diferencia desde el 1/1/2025:</strong><br>
                                <?= number_format($diferenciaSegundos, 0, ',', '.') ?> segundos<br>
                                <?= $diferenciaHoras ?> horas<br>
                                <?= $diferenciaDias ?> días
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="table-responsive mb-4">
                    <table class="table table-striped table-bordered align-middle text-center">
                        <thead class="table-primary">
                            <tr>
                                <th>Descripción</th>
                                <th>Fecha completa</th>
                                <th>Día</th>
                                <th>Mes</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td>Ayer</td><td><?= formatearFecha($ayer) ?></td><td><?= nombreDia($ayer) ?></td><td><?= nombreMes($ayer) ?></td></tr>
                            <tr><td>Hoy</td><td><?= formatearFecha(date("Y-m-d")) ?></td><td><?= nombreDia(date("Y-m-d")) ?></td><td><?= nombreMes(date("Y-m-d")) ?></td></tr>
                            <tr><td>Mañana</td><td><?= formatearFecha($manana) ?></td><td><?= nombreDia($manana) ?></td><td><?= nombreMes($manana) ?></td></tr>
                            <tr><td>Dentro de una semana</td><td><?= formatearFecha($semanaProx) ?></td><td><?= nombreDia($semanaProx) ?></td><td><?= nombreMes($semanaProx) ?></td></tr>
                            <tr><td>Navidad 2025</td><td><?= formatearFecha(date("Y-m-d", $navidad)) ?></td><td><?= nombreDia(date("Y-m-d", $navidad)) ?></td><td><?= nombreMes(date("Y-m-d", $navidad)) ?></td></tr>
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
                    Entre el <strong><?= formatearFecha($inicio->format("Y-m-d")) ?></strong> y el <strong><?= formatearFecha($fin->format("Y-m-d")) ?></strong> hay <strong><?= $intervalo->days ?></strong> días.
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
                            echo "La fecha <strong>" . formatearFecha($fechaIngresada) . "</strong> corresponde al <strong>" . nombreDia($fechaIngresada) . "</strong> de <strong>" . nombreMes($fechaIngresada) . "</strong>.";
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