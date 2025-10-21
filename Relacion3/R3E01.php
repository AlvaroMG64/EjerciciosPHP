<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Relación 3 - Ejercicio 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">

        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" class="bg-white border rounded-3 shadow-sm m-auto p-4 w-50" id="form1">
            <h1 class="text-center mb-4">Listado de números primos</h1>

            <div class="mb-3">
                <label for="numero" class="form-label">Introduzca el número máximo:</label>
                <input type="number" id="numero" name="numero" min="2" step="1" placeholder="Introduzca un número natural mayor o igual que 2" class="form-control" required>
            </div>

            <div class="d-grid">
                <input type="submit" value="Calcular" class="btn btn-success">
            </div>
        </form>

        <?php
            function esPrimo($numero) {
                $esPrimo = true;

                if ($numero < 2) {
                    $esPrimo = false;
                } else {
                    for ($i = 2; $i <= sqrt($numero); $i++) {
                        if ($numero % $i == 0) {
                            $esPrimo = false;
                        }
                    }
                }

                return $esPrimo;
            }

            // SE ENVÍA EL FORMULARIO
            if (isset($_POST['numero'])) {
                $numero = intval($_POST['numero']);
                echo "<h3 class='mt-5'>Números primos entre 1 y $numero:</h3>";

                $encontrados = [];

                for ($j = 1; $j <= $numero; $j++) {
                    if (esPrimo($j)) {
                        $encontrados[] = $j;
                    }
                }

                if (count($encontrados) > 0) {
                    echo implode(", ", $encontrados);
                } else {
                    echo "No hay números primos en ese rango";
                }
            }
        ?>
    </div>
</body>
</html>