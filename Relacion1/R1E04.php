<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 1 - Ejercicio 4</title>
    <link rel="shortcut icon" href="playamar.png" type="image/x-icon">
</head>
<body>
    <h1>Arrays</h1>

    <?php
        const DIAS_SEMANA = ["Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo"];

        // Primer día
        echo "<p>El primer día de la semana es: <strong>" . DIAS_SEMANA[0] . "</strong></p>";

        // Todos los días secuencialmente
        echo "<h3>Todos los días:</h3>";
        for ($i = 0; $i < count(DIAS_SEMANA); $i++) {
            echo DIAS_SEMANA[$i] . "<br>";
        }

        // En formato de lista numerada
        echo "<h3>Lista numerada de días:</h3><ol>";
        foreach (DIAS_SEMANA as $dia) {
            echo "<li>$dia</li>";
        }
        echo "</ol>";
    ?>

</body>
</html>