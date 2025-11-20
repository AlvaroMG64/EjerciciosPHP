<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Relación 4 - Ejercicio 14</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4 bg-light">
    <div class="container">

    <h1 class="mb-4">Recuperación del carrito desde Cookie</h1>

    <?php

        if (!isset($_COOKIE["carrito"])) {
            echo "<div class='alert alert-danger'>No hay cookie disponible.</div>";
        } else {

            $json = $_COOKIE["carrito"];

            $as_array = json_decode($json, true);
            $as_objet = json_decode($json);

            echo "<h3>Contenido JSON recibido:</h3>";
            echo "<pre>$json</pre>";

            echo "<h3>JSON convertido a ARRAY asociativo:</h3>";
            echo "<pre>";
            print_r($as_array);
            echo "</pre>";

            echo "<h3>JSON convertido a OBJETO stdClass:</h3>";
            echo "<pre>";
            print_r($as_objet);
            echo "</pre>";
        }

    ?>

    </div>
</body>
</html>