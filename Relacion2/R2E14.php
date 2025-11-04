<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Relación 2 - Ejercicio 14</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <script>
        function validarNota() {
            const nota = parseInt(document.getElementById('nota').value);
            if (isNaN(nota) || nota < 1 || nota > 10) {
                alert("Introduce un número entre 1 y 10");
                return false;
            }
            return true;
        }
    </script>
    <div class="container w-50">
        <div class="card mb-5 shadow-sm border-success">
            <div class="card-body">
                <h2 class="text-center text-success mb-4">Nota con Progress Bar</h2>
                <form method="post" onsubmit="return validarNota()">
                    <div class="input-group mb-3">
                        <span class="input-group-text">Nota (1-10)</span>
                        <input type="number" id="nota" name="nota" class="form-control" required>
                    </div>
                    <button class="btn btn-success w-100" type="submit">Evaluar</button>
                </form>
                <?php
                    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nota'])) {
                        $nota = (int)$_POST['nota'];
                        if ($nota < 1 || $nota > 10) {
                            echo "<p class='text-danger mt-3'>Nota inválida</p>";
                        } else {
                            // Mensaje según nota
                            $mensaje = match (true) {
                                $nota >= 9 => "Sobresaliente",
                                $nota >= 7 => "Notable",
                                $nota == 6 => "Bien",
                                $nota == 5 => "Suficiente",
                                default => "Suspenso"
                            };

                            // Color según nota
                            $color = match (true) {
                                $nota <= 4 => "bg-danger",     // Rojo
                                $nota == 5 => "bg-warning",    // Amarillo
                                $nota <= 7 => "bg-primary",    // Azul
                                default => "bg-success"        // Verde
                            };

                            echo "<p class='mt-3 fs-5'>Calificación: <strong>$mensaje</strong></p>";
                            echo "<div class='progress mt-2'>
                                    <div class='progress-bar $color' role='progressbar' style='width:" . ($nota * 10) . "%'>
                                        {$nota}/10
                                    </div>
                                  </div>";
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>