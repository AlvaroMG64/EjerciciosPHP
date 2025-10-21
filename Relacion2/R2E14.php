<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Relación 2 - Ejercicio 14</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script>
function validarNota() {
    const nota = parseInt(document.getElementById('nota').value);
    if(isNaN(nota) || nota<1 || nota>10){ alert("Introduce un número entre 1 y 10"); return false; }
    return true;
}
</script>
</head>
<body class="p-4">
<div class="container">
<h1>Nota con Progress Bar</h1>
<form method="post" onsubmit="return validarNota()">
    <label>Nota (1-10): <input type="number" id="nota" name="nota" required></label>
    <button class="btn btn-primary" type="submit">Evaluar</button>
</form>

<?php
if($_SERVER['REQUEST_METHOD']==='POST'){
    $nota=(int)$_POST['nota'];
    if($nota<1 || $nota>10){ echo "<p class='text-danger'>Nota inválida</p>"; }
    else{
        $mensaje=match(true){
            $nota>=9=>"Sobresaliente",
            $nota>=7=>"Notable",
            $nota==6=>"Bien",
            $nota==5=>"Suficiente",
            default=>"Suspenso"
        };
        echo "<p>Calificación: $mensaje</p>";
        echo "<progress value='$nota' max='10' class='w-100'></progress>";
    }
}
?>
</div>
</body>
</html>