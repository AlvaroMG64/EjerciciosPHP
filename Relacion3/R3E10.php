<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Relación 3 - Ejercicio 9</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow p-4">
            <div class="card-body">
                <h1 class="text-center text-primary mb-4">Muestra de un texto en orden inverso</h1>
                <form method="post" class="row g-3">
                    <div class="col-md-6 offset-md-3">
                        <label for="texto" class="form-label">Introduzca un texto:</label>
                        <input type="text" class="form-control" id="texto" name="texto" placeholder="Escriba una frase" required>
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-success w-100 mt-3">Invertir orden</button>
                    </div>
                </form>
            </div>

            <?php
                if ($_SERVER["REQUEST_METHOD"] === "POST") {
                    $texto = trim($_POST["texto"]);
                    if ($texto === "") {
                        echo "<div class='alert alert-danger mt-3'>Por favor, introduce un texto.</div>";
                    } else {
                        $palabras = preg_split('/\s+/', $texto);
                        $invertido = implode(' ', array_reverse($palabras));
                        echo "<div class='alert alert-success mt-3'>
                                <strong>Texto invertido:</strong> $invertido
                            </div>";
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>