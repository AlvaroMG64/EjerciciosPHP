<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Relación 2 - Ejercicio 19</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <div class="container">
        <h1>Conversión de bases</h1>
        <form method="post">
            <label>Número: <input type="number" name="num" required></label><br>
            <label>Convertir a:
                <select name="base" required>
                    <option value="">Selecciona operación</option>
                    <option value="binario">Binario</option>
                    <option value="octal">Octal</option>
                    <option value="hexadecimal">Hexadecimal</option>
                </select>
            </label><br>
            <button class="btn btn-primary" type="submit">Convertir</button>
        </form>

        <?php
            if($_SERVER['REQUEST_METHOD']==='POST'){
                $num=(int)$_POST['num']; $base=$_POST['base'];
                $resultado=match($base){
                    'binario'=>decbin($num),
                    'octal'=>decoct($num),
                    'hexadecimal'=>dechex($num),
                    default=>"Opción no válida"
                };
                echo "<p>Resultado: $resultado</p>";
            }
        ?>
    </div>
</body>
</html>
