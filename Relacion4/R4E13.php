<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Relación 4 - Ejercicio 13</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4 bg-light">
    <div class="container">

    <h1 class="mb-4">JSON encode / decode</h1>

    <?php

    $socios = [
        [
            "nombre" => "Ana",
            "apellidos" => "Pérez López",
            "edad" => 28
        ],
        [
            "nombre" => "Luis",
            "apellidos" => "Martínez Ruiz",
            "edad" => 35
        ],
        [
            "nombre" => "Clara",
            "apellidos" => "Gómez Díaz",
            "edad" => 22
        ],
    ];

    $json = json_encode($socios);
    $asociativo = json_decode($json, true);
    $objeto = json_decode($json);

    ?>

    <h3>Array original:</h3>
    <pre><?php print_r($socios); ?></pre>

    <h3>Convertido a JSON:</h3>
    <pre><?= $json ?></pre>

    <h3>JSON convertido a ARRAY asociativo:</h3>
    <pre><?php print_r($asociativo); ?></pre>

    <h3>JSON convertido a OBJETO stdClass:</h3>
    <pre><?php print_r($objeto); ?></pre>

    </div>
</body>
</html>