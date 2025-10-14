<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 1 - Ejercicio 8</title>
</head>
<body>
    <h1>Calculo de nota final usando arrays asociativos paralelos</h1>

    <?php
        // Rúbrica (peso de cada calificación)
        $calificaciones = [
            "inicial" => 2,
            "primera" => 3,
            "segunda" => 4,
            "tercera" => 5
        ];

        // Notas de la persona
        $notas = [
            "inicial" => 7,
            "primera" => 8,
            "segunda" => 6,
            "tercera" => 9
        ];

        // Mostrar valores iniciales
        echo "<h3>Notas y pesos:</h3>";
        foreach ($notas as $clave => $nota) {
            echo "$clave: nota = $nota, peso = " . $calificaciones[$clave] . "<br>";
        }

        // Calcular nota final ponderada
        $sumaPonderada = 0;
        $sumaPesos = 0;
        foreach ($calificaciones as $clave => $peso) {
            $sumaPonderada += $notas[$clave] * $peso;
            $sumaPesos += $peso;
        }

        $nota_final = $sumaPonderada / $sumaPesos;

        echo "<h3>Nota final ponderada: $nota_final</h3>";
    ?>

</body>
</html>