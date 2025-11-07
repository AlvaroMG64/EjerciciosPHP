<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Relación 3 - Ejercicio 19</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5 w-50">

        <!-- TÍTULO -->
        <div class="card shadow border-0 mb-4">
            <div class="card-header bg-success text-white text-center">
                <h2>Menús con Probabilidad Ponderada e Imagen</h2>
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
                    'Gazpachuelo' => './Imagenes/Gazpachuelo.jpg',
                    'Salmorejo' => './Imagenes/Salmorejo.jpg',
                    'Ajo Blanco' => './Imagenes/Ajoblanco.jpg'
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
                // GENERAR Y MOSTRAR MENÚS
                // ------------------------------------
                if (isset($_POST['numero'])) {
                    $numeroMenus = intval($_POST['numero']);

                    echo "<h4 class='text-center my-4 text-success'>Menús generados</h4>";

                    for ($i = 1; $i <= $numeroMenus; $i++) {
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
                }
            ?>
        </div>
    </div>
</body>
</html>