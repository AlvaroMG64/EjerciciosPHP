<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Relación 3 - Ejercicio 18</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="card shadow border-0">
            <div class="card-header bg-primary text-white text-center">
                <h2>Generador de Menús Sugeridos</h2>
            </div>
            <div class="card-body">

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
                // NÚMERO DE MENÚS A GENERAR
                // ------------------------------------
                $n = 3;

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
                for ($i = 1; $i <= $n; $i++) {
                    $sugerencia = generarMenu($menu);
                    echo "<div class='card my-3 border-0 shadow-sm'>";
                    echo "<div class='card-header bg-secondary text-white text-center'><h5>Menú Sugerencia $i</h5></div>";
                    echo "<div class='card-body'>";
                    foreach ($sugerencia as $tipo => $plato) {
                        echo "<p><strong>" . ucfirst($tipo) . ":</strong> $plato</p>";
                    }
                    echo "</div></div>";
                }
                ?>

            </div>
        </div>
    </div>
</body>
</html>