<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Bootstrap</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5 w-50">
        <h2>Iniciar sesión</h2>
        <form action="#" method="post">
            <!-- Campo hidden -->
            <input type="hidden" name="token" value="abc123">

            <!-- Correo -->
            <div class="mb-3">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="ejemplo@correo.com" required>
            </div>

            <!-- Contraseña -->
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Tu contraseña" required>
            </div>

            <!-- Checkbox -->
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="recordarme" name="recordarme">
                <label class="form-check-label" for="recordarme">Recordarme</label>
            </div>

            <!-- Botón submit -->
            <button type="submit" class="btn btn-primary">Acceder</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>