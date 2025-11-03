<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Relación 3 - Ejercicio 19</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="card shadow border-0">
            <div class="card-header bg-success text-white text-center">
                <h2>Menús con Probabilidad Ponderada e Imagen</h2>
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
                // IMÁGENES ASOCIADAS A LOS PRIMEROS
                // ------------------------------------
                $imagenes = [
                    'Gazpachuelo' => 'img/gazpachuelo.jpg',
                    'Salmorejo' => 'img/salmorejo.jpg',
                    'Ajo Blanco' => 'img/ajoblanco.jpg'
                ];

                // ------------------------------------
                // FUNCIÓN DE ELECCIÓN PONDERADA
                // ------------------------------------
                function elegirPlato($platos) {
                    // Duplica la tercera opción
                    $ponderado = array_merge($platos, [$platos[2]]);
                    return $ponderado[array_rand($ponderado)];
                }

                // ------------------------------------
                // GENERAR Y MOSTRAR MENÚ
                // ------------------------------------
                $n = 3;

                for ($i = 1; $i <= $n; $i++) {
                    $sugerencia = [];
                    foreach ($menu as $tipo => $platos) {
                        $sugerencia[$tipo] = elegirPlato($platos);
                    }

                    $primerPlato = $sugerencia['primero'];
                    $imagen = $imagenes[$primerPlato] ?? 'img/noimage.jpg';

                    echo "<div class='card my-4 border-0 shadow-sm'>";
                    echo "<div class='card-header bg-secondary text-white text-center'><h5>Menú Especial $i</h5></div>";
                    echo "<div class='card-body text-center'>";
                    echo "<img src='$imagen' alt='$primerPlato' class='img-fluid rounded mb-3' style='max-width:300px'>";
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