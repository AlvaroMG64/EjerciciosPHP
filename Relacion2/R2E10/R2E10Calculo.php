<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Relación 2 - Ejercicio 10</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">

        <?php
            $metodo = $_SERVER["REQUEST_METHOD"];
            $num1 = $num2 = $operador = $resultado = $simbolo = "";

            if ($metodo == "GET" && isset($_GET['numero1'], $_GET['numero2'], $_GET['operador'])) {
                $num1 = $_GET['numero1'];
                $num2 = $_GET['numero2'];
                $operador = $_GET['operador'];
            } elseif ($metodo == "POST" && isset($_POST['numero1'], $_POST['numero2'], $_POST['operador'])) {
                $num1 = $_POST['numero1'];
                $num2 = $_POST['numero2'];
                $operador = $_POST['operador'];
            }

            if (isset($num1, $num2, $operador) && $num1 !== "" && $num2 !== "") {
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
            } else {
                echo "<div class='alert alert-warning text-center w-50 m-auto'>
                        <p>No se recibieron datos válidos.</p>
                    </div>";
            }
        ?>

        <div class="text-center mt-4">
            <a href="R2E10Formulario.html" class="btn btn-secondary">Volver</a>
        </div>

</div>
</body>
</html>