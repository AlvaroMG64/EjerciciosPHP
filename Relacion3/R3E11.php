<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Relación 3 - Ejercicio 11</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow p-4">
            <h1 class="text-primary text-center mb-4">Invertir array de números</h1>
            <form method="post">
                <div class="mb-3">
                    <label for="numeros" class="form-label">Introduzca números separados por comas:</label>
                    <input type="text" class="form-control" id="numeros" name="numeros" placeholder="Ejemplo: 1, 2, 3, 4, 5">
                </div>
                <button type="submit" class="btn btn-primary w-100">Invertir Array</button>
            </form>

            <?php
                // Función swap: intercambia dos valores por referencia
                function swap(&$n1, &$n2) {
                    $temp = $n1;
                    $n1 = $n2;
                    $n2 = $temp;
                }

                // Función para invertir el array usando swap
                function invertirArray($array) {
                    $inicio = 0;
                    $fin = count($array) - 1;
                    while ($inicio < $fin) {
                        swap($array[$inicio], $array[$fin]);
                        $inicio++;
                        $fin--;
                    }
                    return $array;
                }

                if ($_SERVER["REQUEST_METHOD"] === "POST") {
                    $entrada = trim($_POST["numeros"]);
                    if ($entrada === "") {
                        echo "<div class='alert alert-danger mt-3'>Por favor, introduzca al menos 2 números</div>";
                    } else {
                        $array = array_map('trim', explode(',', $entrada));
                        $invertido = invertirArray($array);

                        echo "<div class='alert alert-success mt-3'>
                                <strong>Array original:</strong> [" . implode(', ', $array) . "]<br>
                                <strong>Array invertido:</strong> [" . implode(', ', $invertido) . "]
                            </div>";
                    }
                }
            ?>
        </div>
    </div>

</body>
</html>