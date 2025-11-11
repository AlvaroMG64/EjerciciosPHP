<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Relación 3 - Ejercicio 12</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="playamar.png" type="image/x-icon">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow p-4">
            <h1 class="text-primary text-center mb-4">Ordenar con algoritmo de burbujas</h1>
            <p>Introduzca una lista de elementos (nombres o números) separados por comas. El programa los ordenará con el algoritmo de <b>ascenso de burbujas</b>.</p>

            <form method="post">
                <div class="mb-3">
                    <label for="datos" class="form-label">Elementos:</label>
                    <input type="text" class="form-control" id="datos" name="datos"
                        placeholder="Ejemplo: Pérez, García, López, Márquez, Álvarez, Domínguez, Ruiz, Díaz">
                </div>
                <button type="submit" class="btn btn-primary w-100">Ordenar</button>
            </form>

            <?php
                // Intenta usar locale español para ordenar con acentos correctamente (opcional)
                // Si el servidor no tiene el locale instalado, esto no producirá error, solo no afectará.
                setlocale(LC_COLLATE, 'es_ES.UTF-8', 'es_ES', 'spanish');

                // Compara dos valores según el modo: numérico o texto
                function comparar($a, $b, $numeric) {
                    if ($numeric) {
                        // comparar numéricamente (float para permitir decimales)
                        $fa = floatval($a);
                        $fb = floatval($b);
                        if ($fa == $fb) return 0;
                        return ($fa < $fb) ? -1 : 1;
                    } else {
                        // intentar strcoll (respeta locale), si falla usar strcasecmp (case-insensitive)
                        $res = strcoll($a, $b);
                        if ($res === 0) return 0;
                        // strcoll puede retornar <0 o >0; normalizamos a -1/1
                        return ($res < 0) ? -1 : 1;
                    }
                }

                // -------- FUNCIÓN BURBUJA --------
                function burbuja(&$array, $numeric = false) {
                    $n = count($array);
                    for ($i = 0; $i < $n - 1; $i++) {
                        for ($j = 0; $j < $n - $i - 1; $j++) {
                            if (comparar($array[$j], $array[$j + 1], $numeric) > 0) {
                                // Intercambio usando variable temporal
                                $temp = $array[$j];
                                $array[$j] = $array[$j + 1];
                                $array[$j + 1] = $temp;
                            }
                        }
                    }
                }

                // -------- PROCESAMIENTO DEL FORMULARIO --------
                if ($_SERVER["REQUEST_METHOD"] === "POST") {
                    $entrada = trim($_POST["datos"]);

                    if ($entrada === "") {
                        echo "<div class='alert alert-danger mt-3'>Por favor, introduce algunos valores separados por comas.</div>";
                    } else {
                        // Convertir texto a array, quitar espacios y eliminar elementos vacíos
                        $raw = array_map('trim', explode(',', $entrada));
                        $datos = array_values(array_filter($raw, function($x) { return $x !== ''; }));

                        if (count($datos) === 0) {
                            echo "<div class='alert alert-danger mt-3'>No se han detectado valores válidos.</div>";
                        } else {
                            // Detectar si todos los elementos son numéricos
                            $allNumeric = true;
                            foreach ($datos as $v) {
                                if (!is_numeric($v)) { $allNumeric = false; break; }
                            }

                            // Guardar copia del original
                            $original = $datos;

                            // Si no numeric, para mejor legibilidad convertimos strings a UTF-8 normalizados (opcional)
                            // Ordenar por burbuja (paso por referencia)
                            burbuja($datos, $allNumeric);

                            // Mostrar resultados
                            echo "<div class='alert alert-success mt-4'>";
                            echo "<strong>Array original:</strong> [" . implode(', ', $original) . "]<br>";
                            if ($allNumeric) {
                                echo "<strong>Array ordenado (numérico):</strong> [" . implode(', ', $datos) . "]";
                            } else {
                                echo "<strong>Array ordenado (texto):</strong> [" . implode(', ', $datos) . "]";
                            }
                            echo "</div>";
                        }
                    }
                }

                // -------- EJEMPLO AUTOMÁTICO SI NO SE ENVÍA FORMULARIO --------
                if ($_SERVER["REQUEST_METHOD"] !== "POST") {
                    $datos = ['Pérez','García','López','Márquez','Álvarez','Domínguez','Ruiz','Díaz'];
                    $original = $datos;
                    // Detectar numérico (en este ejemplo no lo es)
                    $allNumeric = false;
                    burbuja($datos, $allNumeric);
                    echo "<div class='alert alert-info mt-4'>
                            <strong>Ejemplo automático:</strong><br>
                            Array original: [" . implode(', ', $original) . "]<br>
                            Array ordenado: [" . implode(', ', $datos) . "]
                        </div>";
                }
            ?>
        </div>
    </div>
</body>
</html>