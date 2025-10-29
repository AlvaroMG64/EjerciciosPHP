<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Relación 3 - Ejercicio 12</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
                        placeholder="Ejemplo: Pérez, García, López, Márquez, Álvarez, Domínguez, Ruíz, Díaz">
                </div>
                <button type="submit" class="btn btn-primary w-100">Ordenar</button>
            </form>

            <?php
                // -------- FUNCIÓN BURBUJA --------
                function burbuja(&$array) {
                    $n = count($array);
                    for ($i = 0; $i < $n - 1; $i++) {
                        for ($j = 0; $j < $n - $i - 1; $j++) {
                            // strcmp devuelve > 0 si el primer string es mayor (orden alfabético)
                            if (strcmp($array[$j], $array[$j + 1]) > 0) {
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
                        // Convertir texto a array y eliminar espacios
                        $datos = array_map('trim', explode(',', $entrada));

                        // Guardar copia del original
                        $original = $datos;

                        // Ordenar por burbuja (paso por referencia)
                        burbuja($datos);

                        // Mostrar resultados
                        echo "<div class='alert alert-success mt-4'>";
                        echo "<strong>Array original:</strong> [" . implode(', ', $original) . "]<br>";
                        echo "<strong>Array ordenado:</strong> [" . implode(', ', $datos) . "]";
                        echo "</div>";
                    }
                }

                // -------- EJEMPLO AUTOMÁTICO SI NO SE ENVÍA FORMULARIO --------
                if ($_SERVER["REQUEST_METHOD"] !== "POST") {
                    $datos = ['Pérez','García','López','Márquez','Álvarez','Domínguez','Ruíz','Díaz'];
                    $original = $datos;
                    burbuja($datos);
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