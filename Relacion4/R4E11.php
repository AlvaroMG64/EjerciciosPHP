<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Relación 4 - Ejercicio 11</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5 bg-light">

    <div class="container">
        <h1 class="mb-4 text-center">Uso de <code>stdClass</code></h1>

        <?php
            // Creo un objeto de clase "Comodín" STD Class
            $miModulo = new stdClass();
            ob_start();
            var_dump($miModulo);
            $dumpInicial = ob_get_clean();

            $miModulo->nombre = "Desarrollo Web en Entorno Servidor";
            $miModulo->acronimo = "DWES";
            $miModulo->curso = 2;

            ob_start();
            var_dump($miModulo);
            $dumpObjeto = ob_get_clean();

            // Convertir explícitamente en array
            $miModuloArray = (array) $miModulo;
            ob_start();
            var_dump($miModuloArray);
            $dumpArray = ob_get_clean();

            // Serializar el array
            $miModuloArraySerializado = serialize($miModuloArray);
            ob_start();
            var_dump($miModuloArraySerializado);
            $dumpSerial = ob_get_clean();

            // Convertir explícitamente en array otra vez
            $miModuloOtraVezObjeto = (array) $miModuloArray;
            ob_start();
            var_dump($miModuloOtraVezObjeto);
            $dumpObjeto2 = ob_get_clean();
        ?>

        <!-- Bloque 1 -->
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <h4 class="card-title">Objeto recién creado</h4>
                <span class="badge bg-secondary mb-2">stdClass vacío</span>
                <pre class="bg-dark text-light p-3 rounded"><?= htmlspecialchars($dumpInicial) ?></pre>
            </div>
        </div>

        <!-- Bloque 2 -->
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <h4 class="card-title">Objeto después de añadir propiedades</h4>
                <span class="badge bg-primary mb-2">stdClass con datos</span>
                <pre class="bg-dark text-light p-3 rounded"><?= htmlspecialchars($dumpObjeto) ?></pre>
            </div>
        </div>

        <!-- Bloque 3 -->
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <h4 class="card-title">Convertido en array</h4>
                <span class="badge bg-warning text-dark mb-2">(array) stdClass</span>
                <pre class="bg-dark text-light p-3 rounded"><?= htmlspecialchars($dumpArray) ?></pre>
            </div>
        </div>

        <!-- Bloque 4 -->
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <h4 class="card-title">Array serializado</h4>
                <span class="badge bg-success mb-2">serialize()</span>
                <pre class="bg-dark text-light p-3 rounded"><?= htmlspecialchars($dumpSerial) ?></pre>
            </div>
        </div>

        <!-- Bloque 5 -->
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <h4 class="card-title">Convertido en array otra vez</h4>
                <span class="badge bg-info text-dark mb-2">(array) array</span>
                <pre class="bg-dark text-light p-3 rounded"><?= htmlspecialchars($dumpObjeto2) ?></pre>
            </div>
        </div>

    </div>

</body>
</html>