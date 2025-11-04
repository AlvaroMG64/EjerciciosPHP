<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 2 - Ejercicio 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5 w-50">
        <h1 class="text-center text-primary mb-4">Días de la semana</h1>

        <?php
            $dias = ["Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo"];
        ?>

        <ol class="list-group list-group-numbered shadow-sm">
            <?php foreach ($dias as $dia): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <?= $dia ?>
                    <span class="badge bg-primary rounded-pill">✔</span>
                </li>
            <?php endforeach; ?>
        </ol>
    </div>
</body>
</html>