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
        <div class="card mb-5 shadow-sm border-primary">
            <div class="card-body">
                <h2 class="text-center text-primary mb-4">Tipo de triángulo</h2>
                <form method="post" onsubmit="return validarTriangulo()">
                    <div class="row g-2 mb-3">
                        <div class="col"><input type="number" id="ladoA" name="ladoA" step="0.01" placeholder="Lado A" class="form-control" required></div>
                        <div class="col"><input type="number" id="ladoB" name="ladoB" step="0.01" placeholder="Lado B" class="form-control" required></div>
                        <div class="col"><input type="number" id="ladoC" name="ladoC" step="0.01" placeholder="Lado C" class="form-control" required></div>
                    </div>
                    <button class="btn btn-primary w-100" type="submit">Evaluar</button>
                </form>
                <?php
                    if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['ladoA'])){
                        $a=(float)$_POST['ladoA'];
                        $b=(float)$_POST['ladoB'];
                        $c=(float)$_POST['ladoC'];

                        if($a<=0 || $b<=0 || $c<=0){
                            echo "<p class='text-danger mt-3'>Lados inválidos</p>";
                        } elseif($a==$b && $b==$c){
                            echo "<p class='mt-3 text-success fs-5'>Triángulo equilátero</p>";
                        } elseif($a==$b || $a==$c || $b==$c){
                            echo "<p class='mt-3 text-success fs-5'>Triángulo isósceles</p>";
                        } else{
                            echo "<p class='mt-3 text-success fs-5'>Triángulo escaleno</p>";
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>