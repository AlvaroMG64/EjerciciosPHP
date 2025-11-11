<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Relación 3 - Ejercicio 5</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="playamar.png" type="image/x-icon">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <script>
                // --- Validación del formulario ---
                function validarFormulario() {
                    const email = document.getElementById("email").value.trim();
                    const tipoDoc = document.getElementById("documento_tipo").value;
                    const numDoc = document.getElementById("documento_numero").value.trim().toUpperCase();

                    // Validación de email
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailRegex.test(email)) {
                        alert("Por favor, introduce un correo electrónico válido.");
                        return false;
                    }

                    // Validaciones de documento
                    const dniRegex = /^[0-9]{8}[A-Z]$/;
                    const nieRegex = /^[XYZ][0-9]{7}[A-Z]$/;
                    const tieRegex = /^E\d{8}$/;

                    // --- Validación DNI ---
                    if (tipoDoc === "DNI") {
                        if (!dniRegex.test(numDoc)) {
                            alert("Formato de DNI no válido (Ejemplo: 12345678Z).");
                            return false;
                        }
                        if (!validarDNINIE(numDoc)) {
                            alert("La letra del DNI no es correcta.");
                            return false;
                        }
                    }

                    // --- Validación NIE ---
                    if (tipoDoc === "NIE") {
                        if (!nieRegex.test(numDoc)) {
                            alert("Formato de NIE no válido (Ejemplo: X1234567L).");
                            return false;
                        }
                        if (!validarDNINIE(numDoc)) {
                            alert("La letra del NIE no es correcta.");
                            return false;
                        }
                    }

                    // --- Validación TIE ---
                    if (tipoDoc === "TIE" && !tieRegex.test(numDoc)) {
                        alert("Formato de TIE no válido. Debe ser E seguido de 8 dígitos (Ejemplo: E00235566).");
                        return false;
                    }

                    return true;
                }

                // --- Función para validar letra del DNI/NIE ---
                function validarDNINIE(doc) {
                    let numero;
                    let letraRecibida = doc.slice(-1);
                    let letras = "TRWAGMYFPDXBNJZSQVHLCKE";

                    if (/^[0-9]{8}[A-Z]$/.test(doc)) {
                        numero = parseInt(doc.slice(0, 8));
                    } else if (/^[XYZ][0-9]{7}[A-Z]$/.test(doc)) {
                        let niePrefijo = doc[0].replace("X", "0").replace("Y", "1").replace("Z", "2");
                        numero = parseInt(niePrefijo + doc.slice(1, 8));
                    } else {
                        return false;
                    }

                    let letraCorrecta = letras[numero % 23];
                    return letraRecibida === letraCorrecta;
                }
            </script>

            <?php
                // --- Procesamiento PHP ---
                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    // Rúbrica (pesos)
                    $rubrica = [
                        "inicial" => 0.1,
                        "primera" => 0.2,
                        "segunda" => 0.3,
                        "tercera" => 0.4
                    ];

                    // Notas del formulario
                    $notas = [
                        "inicial" => floatval($_POST["inicial"]),
                        "primera" => floatval($_POST["primera"]),
                        "segunda" => floatval($_POST["segunda"]),
                        "tercera" => floatval($_POST["tercera"])
                    ];

                    // Cálculo nota final
                    $nota_final = 0;
                    foreach ($rubrica as $key => $peso) {
                        $nota_final += $notas[$key] * $peso;
                    }

                    // Datos personales
                    $nombre = htmlspecialchars($_POST["nombre"]);
                    $email = htmlspecialchars($_POST["email"]);
                    $documento_tipo = htmlspecialchars($_POST["documento_tipo"]);
                    $documento_numero = strtoupper(htmlspecialchars($_POST["documento_numero"]));
                }
            ?>

            <?php if (!isset($nota_final)): ?>
                <!-- FORMULARIO -->
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Formulario de Calificación</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" onsubmit="return validarFormulario();" class="needs-validation">

                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Correo electrónico</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>

                            <div class="mb-3">
                                <label for="documento_tipo" class="form-label">Tipo de documento</label>
                                <select id="documento_tipo" name="documento_tipo" class="form-select" required>
                                    <option value="">-- Selecciona --</option>
                                    <option value="DNI">DNI</option>
                                    <option value="NIE">NIE</option>
                                    <option value="TIE">TIE</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="documento_numero" class="form-label">Número de documento</label>
                                <input type="text" class="form-control" id="documento_numero" name="documento_numero" required>
                            </div>

                            <hr class="my-4">
                            <h5 class="mb-3 text-primary">Introduce tus notas</h5>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Inicial</label>
                                    <input type="number" step="0.01" class="form-control" name="inicial" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Primera</label>
                                    <input type="number" step="0.01" class="form-control" name="primera" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Segunda</label>
                                    <input type="number" step="0.01" class="form-control" name="segunda" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Tercera</label>
                                    <input type="number" step="0.01" class="form-control" name="tercera" required>
                                </div>
                            </div>

                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-primary btn-lg">Calcular Nota Final</button>
                            </div>
                        </form>
                    </div>
                </div>

            <?php else: ?>
                <!-- RESULTADO -->
                <div class="card shadow-lg">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0">Resultado Final</h4>
                    </div>
                    <div class="card-body">
                        <p><strong>Nombre:</strong> <?= $nombre ?></p>
                        <p><strong>Email:</strong> <?= $email ?></p>
                        <p><strong>Documento:</strong> <?= $documento_tipo ?> - <?= $documento_numero ?></p>

                        <h5 class="mt-4 text-primary">Notas:</h5>
                        <ul class="list-group mb-3">
                            <?php foreach ($notas as $key => $valor): ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <?= ucfirst($key) ?>
                                    <span class="badge bg-primary rounded-pill"><?= number_format($valor, 2) ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>

                        <div class="alert alert-success text-center fs-5">
                            <strong>Nota Final:</strong> <?= number_format($nota_final, 2) ?>
                        </div>

                        <div class="text-center">
                            <a href="R3E05.php" class="btn btn-outline-primary mt-3">Volver al formulario</a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>