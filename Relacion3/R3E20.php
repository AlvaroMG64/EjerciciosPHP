<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Relación 3 - Ejercicio 20</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="card shadow border-0">
        <div class="card-header bg-danger text-white text-center">
            <h2>Seguridad en Formularios PHP</h2>
        </div>
        <div class="card-body">

            <p class="lead text-center mb-4">
                Ejemplo de uso de <code>htmlspecialchars()</code>, <code>filter_var()</code> y <code>preg_match()</code> 
                para proteger los formularios contra ataques XSS y validar datos correctamente.
            </p>

            <!-- FORMULARIO SEGURO -->
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="p-4 bg-white rounded shadow-sm">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre completo:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" 
                           placeholder="Ej: Juan Pérez" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico:</label>
                    <input type="email" name="email" id="email" class="form-control" 
                           placeholder="Ej: usuario@correo.com" required>
                </div>

                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono:</label>
                    <input type="text" name="telefono" id="telefono" class="form-control"
                           placeholder="Ej: +34 600123456" required>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>

<?php
// -------------------------------------------
// PROCESAMIENTO Y VALIDACIÓN SEGURA
// -------------------------------------------
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    echo "<div class='mt-4'>";

    // 1️⃣ SANITIZAR DATOS
    $nombre   = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
    $email    = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $telefono = filter_input(INPUT_POST, 'telefono', FILTER_SANITIZE_STRING);

    // 2️⃣ VALIDACIONES

    // Validar nombre: solo letras y espacios
    if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/", $nombre)) {
        echo "<div class='alert alert-danger'>❌ El nombre solo puede contener letras y espacios.</div>";
    }

    // Validar email con FILTER_VALIDATE_EMAIL
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<div class='alert alert-danger'>❌ El correo electrónico no es válido.</div>";
    }

    // Validar teléfono con expresión regular (acepta +, espacios y números)
    elseif (!preg_match("/^\+?[0-9\s]{6,15}$/", $telefono)) {
        echo "<div class='alert alert-danger'>❌ El número de teléfono no es válido. Usa formato: +34600123456 o 600123456.</div>";
    }

    // Si todo es correcto
    else {
        echo "<div class='alert alert-success'>
                ✅ Datos válidos y seguros:<br>
                <strong>Nombre:</strong> $nombre<br>
                <strong>Correo:</strong> $email<br>
                <strong>Teléfono:</strong> $telefono
              </div>";
    }

    echo "</div>";
}
?>

        </div>
    </div>

    <div class="alert alert-info mt-4">
        <h5>📘 Explicación:</h5>
        <ul>
            <li><code>htmlspecialchars()</code> → evita que el código HTML o JavaScript inyectado se ejecute (protege de <strong>XSS</strong>).</li>
            <li><code>filter_input()</code> y <code>filter_var()</code> → limpian y validan entradas de usuario.</li>
            <li><code>preg_match()</code> → permite validar con expresiones regulares (ideal para nombres o teléfonos).</li>
            <li>Siempre debe usarse <strong>tanto en el cliente como en el servidor</strong>, aunque haya validación en JavaScript.</li>
        </ul>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
