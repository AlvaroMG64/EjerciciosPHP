<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Relación 4 - Ejercicio 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="playamar.png" type="image/x-icon">
</head>
<body class="bg-light">
    <div class="container-fluid w-75 py-5">
        <h1 class="text-center mb-4">Formulario de autenticación</h1>
        <form action="<?php echo htmlspecialchars('R4E01B.php');?>" method="post" 
            class=" m-5 bg-white border rounded-3 shadow-sm m-auto p-4 w-50" id="form1">

            <div class="mb-3">
                <label for="numero" class="form-label">Identificador:</label>
                <input type="text" required class="form-control" id="idusuario" name="idusuario">
                <div id="idusuarioHelp" class="form-text">Obligatorio</div>
            </div>

            <div class="mb-3">
                <label for="contrasena" class="form-label">Contraseña:</label>
                <input type="text" required class="form-control" id="contrasena" name="contrasena">
                <div id="contrasenaHelp" class="form-text">Debe contener mayúsculas y minúsculas</div>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>
        <?php
            if (isset($_SESSION['errorLogin'])) {
                echo "<div class='alert alert-danger' role='alert>Usuario o contraseña desconocidos></div>";
            }
        ?>
    </div>
</body>
</html>