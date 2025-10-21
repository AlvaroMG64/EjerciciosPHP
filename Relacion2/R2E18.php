<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Relación 2 - Ejercicio 18</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
<div class="container">
<h1>Máximo Común Divisor (MCD)</h1>
<form method="post">
    <label>Número 1: <input type="number" name="a" required></label>
    <label>Número 2: <input type="number" name="b" required></label>
    <button class="btn btn-primary" type="submit">Calcular MCD</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD']==='POST'){
    $a=(int)$_POST['a'];
    $b=(int)$_POST['b'];

    if($a<=0 || $b<=0){
        echo "<p class='text-danger'>Ambos números deben ser positivos</p>";
    } else {
        $x=$a; $y=$b;
        while($y!=0){
            $temp=$y;
            $y=$x%$y;
            $x=$temp;
        }
        echo "<p>El MCD de $a y $b es <strong>$x</strong></p>";
    }
}
?>
</div>
</body>
</html>
