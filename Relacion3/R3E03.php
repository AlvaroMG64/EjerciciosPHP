<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Relación 3 - Ejercicio 3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">

        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" class="bg-white border rounded-3 shadow-sm m-auto p-4 w-50" id="formMCD">
            <h1 class="text-center mb-4">Cálculo del MCD de dos números</h1>

            <div class="mb-3">
                <label for="num1" class="form-label">Primer número:</label>
                <input type="number" id="num1" name="num1" min="1" step="1" placeholder="Introduce un número natural" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="num2" class="form-label">Segundo número:</label>
                <input type="number" id="num2" name="num2" min="1" step="1" placeholder="Introduce un número natural" class="form-control" required>
            </div>

            <div class="d-grid">
                <input type="submit" value="Calcular MCD" class="btn btn-success">
            </div>
        </form>

        <?php
        // Algoritmo de Euclides por restas sucesivas (iterativo)
        function mcdRestas($a, $b) {
            while ($a != $b) {
                if ($a > $b) {
                    $a -= $b;
                } else {
                    $b -= $a;
                }
            }
            return $a;
        }

        // Algoritmo de Euclides por divisiones sucesivas (iterativo)
        function mcdDivision($a, $b) {
            while ($b != 0) {
                $resto = $a % $b;
                $a = $b;
                $b = $resto;
            }
            return $a;
        }

        // Versión recursiva por restas
        function mcdRestasRecursivo($a, $b) {
            if ($a == $b) {
                return $a;
            } elseif ($a > $b) {
                return mcdRestasRecursivo($a - $b, $b);
            } else {
                return mcdRestasRecursivo($a, $b - $a);
            }
        }

        // Versión recursiva por divisiones
        function mcdDivisionRecursivo($a, $b) {
            if ($b == 0) {
                return $a;
            } else {
                return mcdDivisionRecursivo($b, $a % $b);
            }
        }

        // Ejecución al enviar el formulario
        if (isset($_POST['num1']) && isset($_POST['num2'])) {
            $num1 = intval($_POST['num1']);
            $num2 = intval($_POST['num2']);

            echo "<div class='bg-white border rounded-3 shadow-sm m-auto p-4 w-50 mt-4'>";
            echo "<h3 class='mb-3'>Resultados para $num1 y $num2:</h3>";
            echo "<p>MCD por restas sucesivas (iterativo): <strong>" . mcdRestas($num1, $num2) . "</strong></p>";
            echo "<p>MCD por divisiones sucesivas (iterativo): <strong>" . mcdDivision($num1, $num2) . "</strong></p>";
            echo "<p>MCD por restas sucesivas (recursivo): <strong>" . mcdRestasRecursivo($num1, $num2) . "</strong></p>";
            echo "<p>MCD por divisiones sucesivas (recursivo): <strong>" . mcdDivisionRecursivo($num1, $num2) . "</strong></p>";
            echo "</div>";
        }
        ?>

    </div>
</body>
</html>