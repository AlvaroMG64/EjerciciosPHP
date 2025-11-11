<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 2 - Ejercicio 12</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="shortcut icon" href="playamar.png" type="image/x-icon">
</head>

<body class="bg-secondary-subtle">
    <div class="container m-auto bg-white vh-100">
        <h1 class="p-5 text-center">Cálculo de notas a partir de calificaciones y faltas</h1>
        <?php
            $nota1 = $_GET['nota1'];
            $nota2 = $_GET['nota2'];
            $faltas = $_GET['faltas'];
            $nombre = $_GET['nombre'];
            $email = $_GET['email'];

            $notaFinal = (int) round(($nota1 + $nota2) / 2 - $faltas * 0.25); // la redondeamos al entero más próximo

            echo "<h3>Nota final de $nombre: ", $notaFinal, "</h3>";
            $barra = $notaFinal * 10; // la escalamos para que esté entre 0 y 100 en la barra que se muestra
            $color = match ($notaFinal) {  // elegimos el color de barra en función de la nota
                1, 2, 3, 4 => "text-bg-danger",
                5, 6 => "text-bg-warning",
                7, 8, 9, 10 => "text-bg-success",
            }
        ?>
        <!-- mostramos el component de bootstrap PROGRESS BAR parametrizando la longitud de la barra con
             el resultado de la nota, y también el color, según el intervalo -->

        <div class="progress w-50 my-5" role="progressbar" aria-label="Success example" aria-valuenow="<?php echo $barra ?>" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar <?php echo $color ?>" style="width: <?php echo $barra; ?>%"><?php echo $barra; ?>%</div>
        </div>
    </div>

</body>

</html>