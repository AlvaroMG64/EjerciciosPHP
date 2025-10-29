<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Relación 3 - Ejercicio 8</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow p-4">
            <script>
                function validarCheckboxes() {
                    const texto = document.getElementById("texto1").value.trim();
                    const mayus = document.getElementById("mayus1").checked;
                    const minus = document.getElementById("minus1").checked;
                    if (texto === "") {
                        alert("Por favor, introduce un texto.");
                        return false;
                    }
                    if (!mayus && !minus) {
                        alert("Debes seleccionar al menos una opción (mayúsculas y/o minúsculas).");
                        return false;
                    }
                    return true;
                }

                function validarRadios() {
                    const texto = document.getElementById("texto2").value.trim();
                    const mayus = document.getElementById("mayus2").checked;
                    const minus = document.getElementById("minus2").checked;
                    if (texto === "") {
                        alert("Por favor, introduce un texto.");
                        return false;
                    }
                    if (!mayus && !minus) {
                        alert("Debes seleccionar una opción (mayúsculas o minúsculas).");
                        return false;
                    }
                    return true;
                }
            </script>
            
            <h1 class="text-center text-primary mb-4">Conversor de Texto</h1>

            <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="checkbox-tab" data-bs-toggle="tab" data-bs-target="#checkbox" type="button" role="tab">Versión 1 (Checkboxes)</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="radio-tab" data-bs-toggle="tab" data-bs-target="#radio" type="button" role="tab">Versión 2 (Radios)</button>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="checkbox" role="tabpanel">
                    <form method="post" onsubmit="return validarCheckboxes()">
                        <input type="hidden" name="formulario" value="checkbox">
                        <div class="mb-3">
                            <label for="texto1" class="form-label">Introduce un texto:</label>
                            <input type="text" class="form-control" id="texto1" name="texto" placeholder="Escribe algo...">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="mayus1" name="opciones[]" value="mayus">
                            <label class="form-check-label" for="mayus1">Mostrar en mayúsculas</label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="minus1" name="opciones[]" value="minus">
                            <label class="form-check-label" for="minus1">Mostrar en minúsculas</label>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Mostrar</button>
                    </form>
                </div>

                <div class="tab-pane fade" id="radio" role="tabpanel">
                    <form method="post" onsubmit="return validarRadios()">
                        <input type="hidden" name="formulario" value="radio">
                        <div class="mb-3">
                            <label for="texto2" class="form-label">Introduce un texto:</label>
                            <input type="text" class="form-control" id="texto2" name="texto" placeholder="Escribe algo...">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="mayus2" name="opcion" value="mayus">
                            <label class="form-check-label" for="mayus2">Mostrar en mayúsculas</label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" id="minus2" name="opcion" value="minus">
                            <label class="form-check-label" for="minus2">Mostrar en minúsculas</label>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Mostrar</button>
                    </form>
                </div>
            </div>

            <?php
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                echo "<div class='mt-4'>";
                echo "<h5 class='text-success'>Resultado:</h5>";
                $texto = trim($_POST["texto"]);
                if ($_POST["formulario"] === "checkbox") {
                    $opciones = $_POST["opciones"] ?? [];
                    if (in_array("mayus", $opciones)) echo "<p><strong>En mayúsculas:</strong> " . strtoupper($texto) . "</p>";
                    if (in_array("minus", $opciones)) echo "<p><strong>En minúsculas:</strong> " . strtolower($texto) . "</p>";
                } elseif ($_POST["formulario"] === "radio") {
                    $opcion = $_POST["opcion"] ?? "";
                    if ($opcion === "mayus") echo "<p><strong>En mayúsculas:</strong> " . strtoupper($texto) . "</p>";
                    if ($opcion === "minus") echo "<p><strong>En minúsculas:</strong> " . strtolower($texto) . "</p>";
                }
                echo "</div>";
            }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>