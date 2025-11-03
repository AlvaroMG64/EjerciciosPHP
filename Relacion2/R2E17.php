<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Relación 2 - Ejercicio 17</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <div class="container">
        <div class="card mb-5 shadow-sm border-success">
            <div class="card-body">
                <h2 class="text-center text-success mb-4">Cociente y Resto</h2>
                <form method="post">
                    <div class="row g-2 mb-3">
                        <div class="col"><input type="number" name="a" class="form-control" placeholder="Dividendo" required></div>
                        <div class="col"><input type="number" name="b" class="form-control" placeholder="Divisor" required></div>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="opciones[]" value="cociente" class="form-check-input" id="chk1">
                        <label for="chk1" class="form-check-label">Cociente</label>
                    </div>
                    <div class="form-check mb-3">
                        <input type="checkbox" name="opciones[]" value="resto" class="form-check-input" id="chk2">
                        <label for="chk2" class="form-check-label">Resto</label>
                    </div>
                    <button class="btn btn-success w-100" type="submit">Calcular</button>
                </form>
                <?php
                    if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['a'])){
                        $a=(int)$_POST['a']; $b=(int)$_POST['b'];
                        if($b==0){ echo "<p class='text-danger mt-3'>División por 0</p>"; }
                        else {
                            $c=$a; $quot=0; while($c>=$b){ $c-=$b; $quot++; }
                            $resto=$c;
                            if(!empty($_POST['opciones'])){
                                foreach($_POST['opciones'] as $op){
                                    if($op=='cociente') echo "<p class='mt-3 fs-5'>Cociente: $quot</p>";
                                    if($op=='resto') echo "<p class='fs-5'>Resto: $resto</p>";
                                }
                            }
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
