<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 1 - Ejercicio 7</title>
    <link rel="shortcut icon" href="playamar.png" type="image/x-icon">
</head>
<body>
    <h1>Cálculo de nota final con descuento por faltas sin justificar</h1>

    <?php
        $nota1 = 7.5;
        $nota2 = 8.0;
        $faltas = 3;

        echo "Nota 1: $nota1 <br>";
        echo "Nota 2: $nota2 <br>";
        echo "Faltas: $faltas <br><br>";

        // Nota media
        $media = ($nota1 + $nota2) / 2;

        // Descuento por faltas
        $notaFinal = $media - ($faltas * 0.25);

        // Mostrar resultado
        echo "Nota final: " . $notaFinal . "<br>";

        // Indicar aprobado o suspenso
        if ($notaFinal >= 5) {
            echo "Resultado: Aprobado";
        } else {
            echo "Resultado: Suspenso";
        }
    ?>

</body>
</html>