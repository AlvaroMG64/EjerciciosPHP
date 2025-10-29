<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Relación 2 - Ejercicio 17</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <div class="container">
        <h1>Cociente y resto de una división</h1>
        <form method="post">
            <label>Dividendo: <input type="number" name="a" required></label>
            <label>Divisor: <input type="number" name="b" required></label><br>
            <label><input type="checkbox" name="opciones[]" value="cociente"> Cociente</label>
            <label><input type="checkbox" name="opciones[]" value="resto"> Resto</label><br>
            <button class="btn btn-primary" type="submit">Calcular</button>
        </form>

        <?php
            if($_SERVER['REQUEST_METHOD']==='POST'){
                $a=(int)$_POST['a']; $b=(int)$_POST['b'];
                if($b==0){ echo "<p class='text-danger'>División por 0</p>"; exit; }
                $c=$a; $quot=0; while($c>=$b){ $c-=$b; $quot++; }
                $resto=$c;
                if(!empty($_POST['opciones'])){
                    foreach($_POST['opciones'] as $op){
                        echo $op=='cociente' ? "<p>Cociente: $quot</p>" : "";
                        echo $op=='resto' ? "<p>Resto: $resto</p>" : "";
                    }
                }
            }
        ?>
    </div>
</body>
</html>
