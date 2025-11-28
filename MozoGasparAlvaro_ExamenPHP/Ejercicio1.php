<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Examen PHP - Ejercicio 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="playamar.png" type="image/x-icon">
</head>
<body class="bg-light">
    <div class="container py-5">
        <h1>ÁLVARO MOZO GASPAR - EXAMEN PHP</h1>
        <h2>Ejercicio 1 - Distancia Hamming</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post"
         class="bg-white border rounded-3 shadow-sm m-auto p-4"> 
            <h3>Introduzca dos cadenas para calcular la distancia Hamming entre ellas</h3> 
            <div class="mb-3"> 
                <label for="cadena1" class="form-label">Cadena 1:</label> 
                <input type="text" id="cadena1" name="cadena1" class="form-control" required> 
            </div> 
            <div class="mb-3"> 
            <div > 
                <label for="cadena2" class="form-label">Cadena 2:</label> 
                <input type="text" id="cadena2" name="cadena2" class="form-control" required> 
            </div> 
            <div class="mt-3 d-grid"> 
                <input class="btn btn-primary" type="submit" value="Calcular distancia"></button> 
            </div> 
        </form>

        <?php

            include 'libreria_examen.php';

            //Captura de datos
            if (isset($_REQUEST["cadena1"], $_REQUEST["cadena2"])) {
                $stringA = $_REQUEST["cadena1"];
                $stringB = $_REQUEST["cadena2"];
            }

            if (isset($stringA, $stringB)) {
                
                // Cálculo de la distancia con CaseSensitive (CON distinción entre mayúsculas y minúsculas)
                $distanciaCaseSensitive = distanciaHamming($stringA, $stringB);

                // Cálculo de la distancia con CaseInsensitive (SIN distinción entre mayúsculas y minúsculas)
                $distanciaCaseInsensitive = distanciaHamming($stringA, $stringB, false);

                if ($distanciaCaseSensitive == -1 && $distanciaCaseInsensitive == -1) {
                    $cadena = "<p class='fs-5'>
                                Cadena 1: $stringA <br>
                                Cadena 2: $stringB <br>
                            </p>
                            <p class='fs-5'>
                                No se puede calcular la distancia Hamming porque las dos
                                cadenas no son iguales
                            </p>";
                } else {
                    $cadena = "<p class='fs-5'>
                                Cadena 1: $stringA <br>
                                Cadena 2: $stringB <br>
                            </p>
                            <h5>Resultado de la comparación:</h5>
                            <p class='fs-5'>
                                Con CaseSensitive: $distanciaCaseSensitive <br>
                                Sin CaseSensitive: $distanciaCaseInsensitive
                            </p>";
                }
                

                echo "<div class='alert alert-info mt-4 m-auto text-center'>
                        <div class='fs-5'>
                            $cadena
                        </div>
                    </div>";
            }
        ?>

    </div>
</body>
</html>