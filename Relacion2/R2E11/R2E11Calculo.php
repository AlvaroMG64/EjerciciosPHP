<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Relación 2 - Ejercicio 11</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="playamar.png" type="image/x-icon">
</head>
<body class="bg-light">
    <div class="container py-5">

        <?php
            // Determinar el método usado
            $metodo = $_SERVER["REQUEST_METHOD"];
            $errores = [];
            $resultado = "";
            $simbolo = "";

            // Obtener datos en función del método
            if ($metodo === "GET") {
                $num1 = $_GET['numero1'] ?? null;
                $num2 = $_GET['numero2'] ?? null;
                $operador = $_GET['operador'] ?? null;
            } elseif ($metodo === "POST") {
                $num1 = $_POST['numero1'] ?? null;
                $num2 = $_POST['numero2'] ?? null;
                $operador = $_POST['operador'] ?? null;
            } else {
                $errores[] = "Método de envío no reconocido.";
            }

            // --- VALIDACIONES DEL LADO DEL SERVIDOR --- //
            if ($num1 === null || $num2 === null || $operador === null) {
                $errores[] = "Faltan datos en el formulario.";
            } else {
                // Validar que sean numéricos
                if (!is_numeric($num1)) {
                    $errores[] = "El primer número no es válido.";
                }
                if (!is_numeric($num2)) {
                    $errores[] = "El segundo número no es válido.";
                }

                // Convertir a float para los cálculos
                $num1 = floatval($num1);
                $num2 = floatval($num2);

                // Validar rango permitido
                if ($num1 < -9999 || $num1 > 9999) {
                    $errores[] = "El primer número debe estar entre -9999 y 9999.";
                }
                if ($num2 < -9999 || $num2 > 9999) {
                    $errores[] = "El segundo número debe estar entre -9999 y 9999.";
                }

                // Validar operador
                $operadores_validos = ["suma", "resta", "multiplicacion", "division", "modulo"];
                if (!in_array($operador, $operadores_validos)) {
                    $errores[] = "Operador no válido.";
                }

                // Validar división o módulo por cero
                if (($operador === "division" || $operador === "modulo") && $num2 == 0) {
                    $errores[] = "Error: no se puede dividir entre cero.";
                }
            }

            // --- CÁLCULO SI NO HAY ERRORES --- //
            if (empty($errores)) {
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
                        $simbolo = "×";
                        break;
                    case "division":
                        $resultado = $num1 / $num2;
                        $simbolo = "÷";
                        break;
                    case "modulo":
                        $resultado = fmod($num1, $num2);
                        $simbolo = "%";
                        break;
                }

                echo "<div class='alert alert-info mt-4 w-50 m-auto text-center'>
                        <h5>Resultado mediante <strong>$metodo</strong>:</h5>
                        <p class='fs-5'>
                            <strong>$num1</strong> $simbolo <strong>$num2</strong> = 
                            <strong>$resultado</strong>
                        </p>
                    </div>";
            } else {
                // Mostrar errores detectados
                echo "<div class='alert alert-danger mt-4 w-50 m-auto'>
                        <h5>Se encontraron los siguientes errores:</h5>
                        <ul class='text-start'>";
                foreach ($errores as $error) {
                    echo "<li>$error</li>";
                }
                echo "</ul>
                    </div>";
            }
        ?>

        <div class="text-center mt-4">
            <a href="R2E10Formulario.html" class="btn btn-secondary">Volver</a>
        </div>

    </div>
</body>
</html>
