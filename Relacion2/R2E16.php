<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Relación 2 - Ejercicio 16</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
<div class="container">
<h1>Cálculo de un número primo y divisores</h1>
<form method="post">
    <label>Número: <input type="number" name="num" required></label><br>
    <label><input type="radio" name="accion" value="primo" required> Verificar si es primo</label>
    <label><input type="radio" name="accion" value="divisores"> Mostrar divisores</label><br>
    <button class="btn btn-primary" type="submit">Calcular</button>
</form>

<?php
if($_SERVER['REQUEST_METHOD']==='POST'){
    $num=(int)$_POST['num'];
    $accion=$_POST['accion'];

    if($accion==='primo'){
        $esPrimo=true;
        if($num<2) $esPrimo=false;
        for($i=2;$i<=sqrt($num);$i++) if($num%$i==0){ $esPrimo=false; break; }
        echo "<p>$num ".($esPrimo?"es primo":"no es primo")."</p>";
    } else {
        echo "<p>Divisores de $num: ";
        for($i=1;$i<=$num;$i++) echo $num%$i==0 ? "<span style='color:green'>$i</span> ":"$i ";
        echo "</p>";
    }
}
?>
</div>
</body>
</html>