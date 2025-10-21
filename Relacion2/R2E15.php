<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Relación 2 - Ejercicio 15</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script>
function validarFactorial() {
    const n=parseInt(document.getElementById('numero').value);
    if(isNaN(n) || n<0){ alert("Número entero positivo"); return false; }
    return true;
}
</script>
</head>
<body class="p-4">
<div class="container">
<h1>Factorial de un número</h1>
<form method="post" onsubmit="return validarFactorial()">
    <label>Número: <input type="number" id="numero" name="numero" required></label>
    <button class="btn btn-primary" type="submit">Calcular</button>
</form>

<?php
if($_SERVER['REQUEST_METHOD']==='POST'){
    $n=(int)$_POST['numero'];
    if($n<0) echo "<p class='text-danger'>Número debe ser positivo</p>";
    else{
        $fact=1;
        echo "<p>Factorial de $n: ";
        for($i=$n;$i>=1;$i--){ $fact*=$i; echo $i.($i>1?" * ":" = "); }
        echo $fact."</p>";
    }
}
?>
</div>
</body>
</html>