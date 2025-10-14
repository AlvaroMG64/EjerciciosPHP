<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 1 - Ejercicio 12</title>
</head>
<body>
    <h1>Calificación según nota numérica</h1>

    <?php
        $nota = 8; // valor entre 1 y 10
        echo "Nota: $nota<br>";

        switch($nota) {
            case 9:
            case 10:
                echo "Calificación: Sobresaliente";
                break;
            case 7:
            case 8:
                echo "Calificación: Notable";
                break;
            case 6:
                echo "Calificación: Bien";
                break;
            case 5:
                echo "Calificación: Suficiente";
                break;
            case 1:
            case 2:
            case 3:
            case 4:
                echo "Calificación: Suspenso";
                break;
            default:
                echo "Entrada no válida";
                break;
        }
    ?>

</body>
</html>