<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Relación 2 - Ejercicio 18</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <div class="container w-50">
        <div class="card mb-5 shadow-sm border-secondary">
            <div class="card-body">
                <h2 class="text-center text-secondary mb-4">Máximo Común Divisor (MCD)</h2>
                <form method="post">
                    <div class="row g-2 mb-3">
                        <div class="col"><input type="number" name="a" class="form-control" placeholder="Número 1" required></div>
                        <div class="col"><input type="number" name="b" class="form-control" placeholder="Número 2" required></div>
                    </div>
                    <button class="btn btn-secondary w-100" type="submit">Calcular MCD</button>
                </form>
                <?php
                    if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['b'])){
                        $a=(int)$_POST['a'];
                        $b=(int)$_POST['b'];
                        if($a<=0 || $b<=0){
                            echo "<p class='text-danger mt-3'>Ambos números deben ser positivos</p>";
                        } else {
                            $x=$a; $y=$b;
                            while($y!=0){ $temp=$y; $y=$x%$y; $x=$temp; }
                            echo "<p class='mt-3 fs-5'>El MCD de $a y $b es <strong>$x</strong></p>";
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
