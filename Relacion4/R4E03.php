<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Relación 4 - Ejercicio 3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="playamar.png" type="image/x-icon">
</head>
<body class="p-5">
    <div class="container w-50">
        <h1 class="mb-4">Adivinar el Número del 1-100</h1>

        <?php
        // Recuperamos o inicializamos el número "pensado"
        if (isset($_REQUEST['numero'])) {
            $numero = (int)$_REQUEST['numero'];
        } else {
            $numero = rand(1, 100);
        }

        // Recuperamos el contador o lo inicializamos a 0
        if (isset($_REQUEST['intentos'])) {
            $intentos = (int)$_REQUEST['intentos'];
        } else {
            $intentos = 0;
        }

        $mensaje = '';

        if (isset($_REQUEST['intento'])) {
            $intento = (int)$_REQUEST['intento'];
            $intentos++;

            if ($intento === $numero) {
                $mensaje = '<div class="alert alert-success">¡Enhorabuena! Ha acertado el número en ' . $intentos . ' intentos.</div>';

                // Reiniciar el juego
                $numero = rand(1, 100);
                $intentos = 0;

            } elseif ($intento < $numero) {
                $mensaje = '<div class="alert alert-warning">El número a adivinar es mayor</div>';
            } else {
                $mensaje = '<div class="alert alert-warning">El número a adivinar es menor</div>';
            }
        }

        echo $mensaje;
        ?>

        <form class="mb-3" method="post">
            <div class="mb-3">
                <label for="intento" class="form-label">Introduzca el número:</label>
                <input type="number" name="intento" id="intento" class="form-control" min="1" max="100" required>
            </div>

            <!-- Campos ocultos para mantener número y contador -->
            <input type="hidden" name="numero" value="<?php echo $numero; ?>">
            <input type="hidden" name="intentos" value="<?php echo $intentos; ?>">

            <button type="submit" class="btn btn-primary">Intentar</button>
        </form>

    </div>
</body>
</html>