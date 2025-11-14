<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Relación 4 - Ejercicio 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="playamar.png" type="image/x-icon">
</head>
<body class="p-5">
<div class="container w-50">
    <h1 class="mb-4">Adivinar el Número del 1 al 100 con Sesión</h1>

    <?php
    // Inicializar número si no existe
    if (!isset($_SESSION['numero'])) {
        $_SESSION['numero'] = rand(1, 100);
    }

    // Inicializar contador
    if (!isset($_SESSION['intentos'])) {
        $_SESSION['intentos'] = 0;
    }

    $mensaje = '';

    if (isset($_REQUEST['intento'])) {
        $intento = (int)$_REQUEST['intento'];
        $_SESSION['intentos']++;

        if ($intento === $_SESSION['numero']) {
            $mensaje = '<div class="alert alert-success">¡Enhorabuena! Ha acertado el número en ' . $_SESSION['intentos'] . ' intentos.</div>';

            // Reiniciar juego
            $_SESSION['numero'] = rand(1, 100);
            $_SESSION['intentos'] = 0;

        } elseif ($intento < $_SESSION['numero']) {
            $mensaje = '<div class="alert alert-warning">El número a adivinar es mayor</div>';
        } else {
            $mensaje = '<div class="alert alert-warning">El número a adivinar es menor</div>';
        }
    }

    echo $mensaje;
    ?>

    <form method="post">
        <div class="mb-3">
            <label for="intento" class="form-label">Introduzca el número:</label>
            <input type="number" name="intento" id="intento" class="form-control" min="1" max="100" required>
        </div>
        <button type="submit" class="btn btn-primary">Intentar</button>
    </form>

</div>
</body>
</html>