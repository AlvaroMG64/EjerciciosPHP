<?php
    session_start();

    // Procesamiento de formulario (antes de cualquier output HTML)
    if (isset($_REQUEST['enviar'])) {
        // Inicializar si no existen (asegura que siempre sean enteros)
        if (!isset($_SESSION['a'])) $_SESSION['a'] = 0;
        if (!isset($_SESSION['b'])) $_SESSION['b'] = 0;

        switch ($_REQUEST['operacion']) {
            case "+a":
                $_SESSION['a']++;
                break;
            case "-a":
                $_SESSION['a']--;
                break;
            case "+b":
                $_SESSION['b']++;
                break;
            case "-b":
                $_SESSION['b']--;
                break;
            case "ra":
                $_SESSION['a'] = 0;
                break;
            case "rb":
                $_SESSION['b'] = 0;
                break;
            case "ds":
                // Vaciar y destruir la sesión correctamente
                session_unset();      // limpia $_SESSION
                session_destroy();    // destruye la sesión en el servidor
                // Redirigir para evitar seguir accediendo a $_SESSION destruida
                header("Location: " . strtok($_SERVER["REQUEST_URI"], '?'));
                exit;
            default:
                // operación desconocida: no hacer nada o manejar error
                break;
        }
    }

    // A partir de aquí ya se puede renderizar HTML con seguridad
    // Aseguramos valores por defecto para evitar notices
    $a = $_SESSION['a'] ?? 0;
    $b = $_SESSION['b'] ?? 0;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Relación 4 - Ejercicio 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="playamar.png" type="image/x-icon">
</head>
<body class="bg-light">
    <div class="container-fluid w-75 py-5">
        <h1 class="text-center mb-4">Control de valores</h1>

        <h2 class="text-center mb-4">A: <?php echo $a; ?></h2>
        <h2 class="text-center mb-4">B: <?php echo $b; ?></h2>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="get"
            class="m-5 bg-white border rounded-3 shadow-sm m-auto p-4 w-50" id="form1">

            <div class="mb-3">
                <select name="operacion" id="operacion" class="form-select">
                    <option value="+a">Incrementar A</option>
                    <option value="-a">Decrementar A</option>
                    <option value="+b">Incrementar B</option>
                    <option value="-b">Decrementar B</option>
                    <option value="ra">Resetear A</option>
                    <option value="rb">Resetear B</option>
                    <option value="ds">Destruir sesión</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="enviar">Enviar</button>
        </form>
    </div>
</body>
</html>