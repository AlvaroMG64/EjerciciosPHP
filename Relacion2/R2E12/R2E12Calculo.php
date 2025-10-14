<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Cálculo de notas a partir de calificaciones y faltas</h2>
    <?php
    $nota1 = $_GET['nota1'];
    $nota2 = $_GET['nota2'];
    $faltas = $_GET['faltas'];
    $nombre = $_GET['nombre'];
    $email = $_GET['email'];

    $notaFinal = ($nota1 + $nota2) / 2 - $faltas * 0.25;

    echo "Nota final : ", $notaFinal;
    ?>
</body>

</html>