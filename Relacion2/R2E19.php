<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Relación 2 - Ejercicio 19</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="shortcut icon" href="playamar.png" type="image/x-icon">
</head>
<body class="p-4">
    <div class="container w-50">
        <div class="card shadow-lg border-dark">
            <div class="card-body">
                <h2 class="text-center text-dark mb-4">Conversión de Bases</h2>

                <form method="post" class="mb-3">
                    <input type="number" name="num" class="form-control mb-3" placeholder="Introduce un número" required>
                    <select name="base" class="form-select mb-3" required>
                        <option value="">Selecciona base</option>
                        <option value="binario">Binario</option>
                        <option value="octal">Octal</option>
                        <option value="hexadecimal">Hexadecimal</option>
                    </select>
                    <button class="btn btn-dark w-100" type="submit">Convertir</button>
                </form>

                <?php
                    if($_SERVER['REQUEST_METHOD']==='POST'){
                        $num = (int)$_POST['num'];
                        $base = $_POST['base'];

                        $resultado = match($base){
                            'binario' => decbin($num),
                            'octal' => decoct($num),
                            'hexadecimal' => strtoupper(dechex($num)), // Hexadecimal en mayúsculas
                            default => "Opción no válida"
                        };

                        echo "<div class='alert alert-secondary text-center fs-5 mt-4'>";
                        echo "<strong>Resultado:</strong> $resultado";
                        echo "</div>";
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
