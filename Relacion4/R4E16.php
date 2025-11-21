<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Relación 4 - Ejercicio 16</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5 bg-light">
    <div class="container">

        <h1 class="mb-4">Namespaces y require</h1>

        <?php
            require_once 'Clases/ClaseA.php';

            use App\Clases\ClaseA;

            $obj = new ClaseA();
            echo "<div class='alert alert-success'>".$obj->saludo()."</div>";
        ?>

    </div>
</body>
</html>