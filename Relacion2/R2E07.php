<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Relación 2 - Ejercicio 7</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">

        <!-- FORMULARIO CON GET -->
        <form action="" method="get" class="bg-white border rounded-3 shadow-sm m-auto p-4 w-50 mb-5">
            <h1 class="text-center mb-4">Calculadora (GET)</h1>

            <div class="mb-3">
                <label for="numero1_get" class="form-label">Introduzca el primer número:</label>
                <input type="number" id="numero1_get" name="numero1" step="0.01" placeholder="Introduzca un número con un máximo de 2 decimales" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="operador_get" class="form-label">Elija el operador:</label>
                <select name="operador" id="operador_get" class="form-select" required>
                    <option value="suma">+</option>
                    <option value="resta">-</option>
                    <option value="multiplicacion">*</option>
                    <option value="division">/</option>
                    <option value="modulo">%</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="numero2_get" class="form-label">Introduzca el segundo número:</label>
                <input type="number" id="numero2_get" name="numero2" step="0.01" placeholder="Introduzca un número con un máximo de 2 decimales" class="form-control" required>
            </div>

            <div class="d-grid">
                <input type="submit" value="Calcular con GET" class="btn btn-primary">
            </div>
        </form>

        <!-- FORMULARIO CON POST -->
        <form action="" method="post" class="bg-white border rounded-3 shadow-sm m-auto p-4 w-50">
            <h1 class="text-center mb-4">Calculadora (POST)</h1>

            <div class="mb-3">
                <label for="numero1_post" class="form-label">Introduzca el primer número:</label>
                <input type="number" id="numero1_post" name="numero1" step="0.01" placeholder="Introduzca un número con un máximo de 2 decimales" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="operador_post" class="form-label">Elija el operador:</label>
                <select name="operador" id="operador_post" step="0.01" placeholder="Introduzca un número con un máximo de 2 decimales" class="form-select" required>
                    <option value="suma">+</option>
                    <option value="resta">-</option>
                    <option value="multiplicacion">*</option>
                    <option value="division">/</option>
                    <option value="modulo">%</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="numero2_post" class="form-label">Introduzca el segundo número:</label>
                <input type="number" id="numero2_post" name="numero2" step="0.01" placeholder="Introduzca un número con un máximo de 2 decimales" class="form-control" required>
            </div>

            <div class="d-grid">
                <input type="submit" value="Calcular con POST" class="btn btn-success">
            </div>
        </form>

        <!-- RESULTADO -->
        <?php
            // Captura datos tanto si vienen por GET como por POST
            $metodo = $_SERVER["REQUEST_METHOD"];
            if ($metodo == "GET" && isset($_GET['numero1'], $_GET['numero2'], $_GET['operador'])) {
                $num1 = $_GET['numero1'];
                $num2 = $_GET['numero2'];
                $operador = $_GET['operador'];
            } elseif ($metodo == "POST" && isset($_POST['numero1'], $_POST['numero2'], $_POST['operador'])) {
                $num1 = $_POST['numero1'];
                $num2 = $_POST['numero2'];
                $operador = $_POST['operador'];
            }

            if (isset($num1, $num2, $operador)) {
                switch ($operador) {
                    case "suma":
                        $resultado = $num1 + $num2;
                        $simbolo = "+";
                        break;
                    case "resta":
                        $resultado = $num1 - $num2;
                        $simbolo = "-";
                        break;
                    case "multiplicacion":
                        $resultado = $num1 * $num2;
                        $simbolo = "*";
                        break;
                    case "division":
                        $resultado = ($num2 != 0) ? $num1 / $num2 : "Error: división por cero";
                        $simbolo = "/";
                        break;
                    case "modulo":
                        $resultado = ($num2 != 0) ? $num1 % $num2 : "Error: división por cero";
                        $simbolo = "%";
                        break;
                    default:
                        $resultado = "Operador no válido";
                        $simbolo = "?";
                }

                echo "<div class='alert alert-info mt-4 w-50 m-auto text-center'>
                        <h5>Resultado mediante <strong>$metodo</strong>:</h5>
                        <p class='fs-5'>
                            <strong>$num1</strong> $simbolo <strong>$num2</strong> = <strong>$resultado</strong>
                        </p>
                    </div>";
            }
        ?>
    </div>
</body>
</html>