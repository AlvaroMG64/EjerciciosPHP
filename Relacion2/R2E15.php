<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Relación 2 - Ejercicio 15</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <script>
        function validarFactorial() {
            const n=parseInt(document.getElementById('numero').value);
            if(isNaN(n) || n<0){ alert("Número entero positivo"); return false; }
            return true;
        }
    </script>
    <div class="container w-50">
        <div class="card mb-5 shadow-sm border-primary">
            <div class="card-body">
                <h2 class="text-center text-primary mb-4">Factorial de un número</h2>
                <form method="post" onsubmit="return validarFactorial()">
                    <input type="number" id="numero" name="numero" class="form-control mb-3" placeholder="Introduce un número" required>
                    <button class="btn btn-primary text-white w-100" type="submit">Calcular</button>
                </form>
                <?php
                    if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['numero'])){
                        $n=(int)$_POST['numero'];
                        if($n<0) echo "<p class='text-danger mt-3'>Número debe ser positivo</p>";
                        else{
                            $fact=1;
                            echo "<p class='mt-3 fs-5'>Factorial de $n: ";
                            for($i=$n;$i>=1;$i--){ $fact*=$i; echo $i.($i>1?" × ":" = "); }
                            echo "<strong>$fact</strong></p>";
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>