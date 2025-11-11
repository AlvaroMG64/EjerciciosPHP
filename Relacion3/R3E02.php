<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Relación 3 - Ejercicio 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="playamar.png" type="image/x-icon">
</head>
<body class="bg-light">
    <div class="container py-5">

        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" class="bg-white border rounded-3 shadow-sm m-auto p-4 w-50" id="form1">
            <h1 class="text-center mb-4">Factorial de un número natural</h1>

            <div class="mb-3">
                <label for="numero" class="form-label">Introduzca el número:</label>
                <input type="number" id="numero" name="numero" min="0" step="1" placeholder="Introduzca un número natural mayor o igual que 0" class="form-control" required>
            </div>

            <div class="d-grid">
                <input type="submit" value="Calcular" class="btn btn-success">
            </div>
        </form>

        <?php
            // Función factorial con bucle (versión iterativa)
            function factorialIterativo($n) {
                $factorial = 1;
                for ($i = 1; $i <= $n; $i++) {
                    $factorial *= $i;
                }
                return $factorial;
            }

            // Función factorial con recursividad (versión recursiva)
            function factorialRecursivo($n) {
                if ($n <= 1) {
                    $factorial = 1;
                } else {
                    $factorial = $n * factorialRecursivo($n - 1);
                }
                return $factorial;
            }

            // Si el usuario envía el número
            if (isset($_POST['numero'])) {
                $numero = intval($_POST['numero']);

                echo "<h3>Resultados para $numero:</h3>";
                echo "Factorial (iterativo): " . factorialIterativo($numero) . "<br>";
                echo "Factorial (recursivo): " . factorialRecursivo($numero) . "<br>";
            }
        ?>
    </div>
</body>
</html>