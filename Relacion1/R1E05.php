<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 1 - Ejercicio 5</title>
    <link rel="shortcut icon" href="playamar.png" type="image/x-icon">
</head>
<body>
    <h1>Arrays asociativos</h1>

    <?php
        const TEMPERATURAS = [
            "Lunes" => 21.5,
            "Martes" => 23.0,
            "Miércoles" => 19.8,
            "Jueves" => 25.2,
            "Viernes" => 22.4,
            "Sábado" => 26.0,
            "Domingo" => 24.7
        ];

        // Temperatura del primer día usando array_keys() en lugar de reset()
        $primerDia = array_keys(TEMPERATURAS)[0];
        echo "<p>Temperatura del primer día ($primerDia): " . TEMPERATURAS[$primerDia] . "°C</p>";

        // Temperaturas secuencialmente
        echo "<h3>Temperaturas de todos los días:</h3>";
        foreach (TEMPERATURAS as $dia => $temp) {
            echo "$dia: $temp °C<br>";
        }

        // En formato de lista numerada
        echo "<h3>Lista numerada:</h3><ol>";
        foreach (TEMPERATURAS as $dia => $temp) {
            echo "<li>$dia: $temp °C</li>";
        }
        echo "</ol>";

        // En forma de tabla
        echo "<h3>Tabla de temperaturas:</h3>";
        echo "<table border='1' cellpadding='5' style='border-collapse: collapse; text-align: center;'>
                <tr><th>Día</th><th>Temperatura (°C)</th></tr>";
        foreach (TEMPERATURAS as $dia => $temp) {
            echo "<tr><td>$dia</td><td>$temp</td></tr>";
        }
        echo "</table>";
    ?>

</body>
</html>