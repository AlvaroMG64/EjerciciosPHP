<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Relación 2 - Ejercicio 13</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <script>
        function validarTriangulo() {
            const a = parseFloat(document.getElementById('ladoA').value);
            const b = parseFloat(document.getElementById('ladoB').value);
            const c = parseFloat(document.getElementById('ladoC').value);
            if(a <=0 || b<=0 || c<=0){ alert("Los lados deben ser mayores que 0"); return false; }
            return true;
        }
    </script>
    <div class="container">
        <h1>Triángulo</h1>
        <form method="post" onsubmit="return validarTriangulo()">
            <label>Lado A: <input type="number" id="ladoA" name="ladoA" step="0.01" placeholder="Introduzca un número con un máximo de 2 decimales" required></label>
            <label>Lado B: <input type="number" id="ladoB" name="ladoB" step="0.01" placeholder="Introduzca un número con un máximo de 2 decimales" required></label>
            <label>Lado C: <input type="number" id="ladoC" name="ladoC" step="0.01" placeholder="Introduzca un número con un máximo de 2 decimales" required></label>
            <button class="btn btn-primary" type="submit">Evaluar</button>
        </form>

        <?php
            if($_SERVER['REQUEST_METHOD']==='POST'){
                $a=(float)$_POST['ladoA'];
                $b=(float)$_POST['ladoB'];
                $c=(float)$_POST['ladoC'];

                if($a<=0 || $b<=0 || $c<=0){
                    echo "<p class='text-danger'>Lados inválidos</p>";
                } elseif($a==$b && $b==$c){
                    echo "<p>Triángulo equilátero</p>";
                } elseif($a==$b || $a==$c || $b==$c){
                    echo "<p>Triángulo isósceles</p>";
                } else{
                    echo "<p>Triángulo escaleno</p>";
                }
            }
        ?>
    </div>
</body>
</html>