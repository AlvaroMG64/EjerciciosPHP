<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Relación 4 - Ejercicio 10</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">
    <div class="container">
        <h1 class="mb-4">Uso de stdClass</h1>
        <?php
            // Creo un objeto de clase "Comodín" STD Class 
            $miModulo = new stdClass();
            var_dump($miModulo);

            $miModulo->nombre = "Desarrollo Web en Entorno Servidor";
            $miModulo->acronimo = "DWES";
            $miModulo->curso = 2;

            echo "<p>Esto es lo que tiene ahora miModulo</p>";
            var_dump($miModulo);

            // Convertir explícitamente en array
            $miModuloArray = (array) $miModulo;
            echo "<p>Esto es lo que tiene ahora miModuloArray</p>";
            var_dump($miModuloArray);

            // Serializar miModuloArray
            $miModuloArraySerializado = serialize($miModuloArray);
            echo "<p>Esto es lo que tiene ahora miModuloArraySerializado</p>";
            var_dump($miModuloArraySerializado);

            // Convertir explícitamente en array
            $miModuloOtraVezObjeto = (array) $miModuloArray;
            echo "<p>Esto es lo que tiene ahora miModuloOtraVezObjeto</p>";
            var_dump($miModuloOtraVezObjeto);

        ?>
    </div>
</body>
</html>