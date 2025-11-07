<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Relación 3 - Ejercicio 18</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5 w-50">

        <!-- TÍTULO -->
        <div class="card shadow border-0 mb-4">
            <div class="card-header bg-primary text-white text-center">
                <h2>Generador de Menús Sugeridos</h2>
            </div>
            <!-- FORMULARIO -->
            <div class="card-body">
                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" 
                    class=" m-5 bg-white border rounded-3 shadow-sm m-auto p-4 w-50" id="form1">

                    <div class="mb-3">
                        <label for="numero" class="form-label">Introduzca el número de menús a generar:</label>
                        <input type="number" id="numero" name="numero" min="1" max="81" step="1"
                            placeholder="Introduzca un número entero entre 1 y 81" class="form-control" required>
                    </div>

                    <div class="d-grid">
                        <input type="submit" value="Generar menús" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>

        <!-- RESULTADOS (MENÚS GENERADOS) -->
        <div class="mt-4">
            <?php
                // ------------------------------------
                // MENÚ BASE
                // ------------------------------------
                $menu = [
                    'entrante' => ['Ensalada César','Hummus','Boquerones al natural'],
                    'primero' => ['Gazpachuelo','Salmorejo','Ajo Blanco'],
                    'segundo' => ['Fritura Malagueña','Conejo al ajillo','Pisto con huevo'],
                    'postre' => ['Helado 3 sabores','Flan','Tarta de Queso']
                ];

                // ------------------------------------
                // FUNCIÓN PARA GENERAR UN MENÚ ALEATORIO
                // ------------------------------------
                function generarMenu($menu) {
                    $sugerencia = [];
                    foreach ($menu as $tipo => $platos) {
                        $sugerencia[$tipo] = $platos[array_rand($platos)];
                    }
                    return $sugerencia;
                }

                // ------------------------------------
                // MOSTRAR LOS MENÚS
                // ------------------------------------
                if (isset($_POST['numero'])) {
                    $numeroMenus = intval($_POST['numero']);

                    echo "<h4 class='text-center my-4 text-primary'>Menús generados</h4>";

                    for ($i = 1; $i <= $numeroMenus; $i++) {
                        $sugerencia = generarMenu($menu);
                        echo "<div class='card my-3 border-0 shadow-sm'>";
                        echo "<div class='card-header bg-secondary text-white text-center'><h5>Menú Sugerencia $i</h5></div>";
                        echo "<div class='card-body'>";
                        foreach ($sugerencia as $tipo => $plato) {
                            echo "<p><strong>" . ucfirst($tipo) . ":</strong> $plato</p>";
                        }
                        echo "</div></div>";
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>