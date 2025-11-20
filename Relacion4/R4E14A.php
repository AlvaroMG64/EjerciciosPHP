<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Relación 4 - Ejercicio 14</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4 bg-light">
    <div class="container">

    <h1 class="mb-4">Carrito con JSON y Cookie</h1>

    <?php

        $carrito = [
            "A12" => ["nombre" => "Teclado mecánico", "unidades" => 1],
            "B55" => ["nombre" => "Ratón inalámbrico", "unidades" => 2],
            "C99" => ["nombre" => "Pantalla 27 pulgadas", "unidades" => 1],
        ];

        $json = json_encode($carrito);

        setcookie("carrito", $json);

    ?>

    <h3>Carrito original:</h3>
    <pre><?php print_r($carrito); ?></pre>

    <h3>Carrito convertido a JSON (almacenado en cookie):</h3>
    <pre><?= $json ?></pre>

    <a class="btn btn-primary mt-3" href="verCarrito.php">Ir a la segunda página</a>

    </div>
</body>
</html>