<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Relación 2 - Ejercicio 16</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="shortcut icon" href="playamar.png" type="image/x-icon">
</head>
<body class="p-4">
    <div class="container w-50">
        <div class="card mb-5 shadow-sm border-success">
            <div class="card-body">
                <h2 class="text-center text-success mb-4">Primo o Divisores</h2>
                <form method="post">
                    <input type="number" name="num" class="form-control mb-2" placeholder="Introduce un número" required>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="accion" value="primo" required>
                        <label class="form-check-label">Verificar si es primo</label>
                    </div>
                    <div class="form-check mb-3">
                        <input type="radio" class="form-check-input" name="accion" value="divisores">
                        <label class="form-check-label">Mostrar divisores</label>
                    </div>
                    <button class="btn btn-success w-100" type="submit">Calcular</button>
                </form>
                <?php
                    if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['accion'])){
                        $num=(int)$_POST['num'];
                        $accion=$_POST['accion'];

                        if($accion==='primo'){
                            $esPrimo=true;
                            if($num<2) $esPrimo=false;
                            for($i=2;$i<=sqrt($num);$i++) if($num%$i==0){ $esPrimo=false; break; }
                            echo "<p class='mt-3 fs-5'>$num ".($esPrimo?"es primo":"no es primo")."</p>";
                        } else {
                            echo "<p class='mt-3 fs-5'>Divisores de $num:<br>";
                            for($i=1;$i<=$num;$i++) echo $num%$i==0 ? "<span class='text-success'>$i </span>" : "$i ";
                            echo "</p>";
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>