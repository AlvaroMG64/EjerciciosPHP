<?php

    // Función para calcular la distancia Hamming entre dos cadenas:
    function distanciaHamming(string $stringA, string $stringB, $caseSensitive = true): int {
        
        // Eliminamos espaciones al principio y al final
        $stringA = trim($stringA);
        $stringB = trim($stringB);

        // Comprobamos el caseSensitive, si elegimos false convertimos ambas cadenas a mayúsculas
        if ($caseSensitive == false) {
            $stringA = strtoupper($stringA);
            $stringB = strtoupper($stringB);
        }
        
        if (strlen($stringA) != strlen($stringB)) {
            // Si las longitudes son distintas $distancia valdrá -1
            $distancia = -1;
        } else {
            // Comparamos cada posición de ambas cadenas y si sus valores son distintos, sumamos 1 a la distancia
            $distancia = 0;
            for ($i = 0; $i < strlen($stringA); $i++) {
                if ($stringA[$i] != $stringB[$i]) {
                    $distancia++;
                }
            }
        }

        return $distancia;
    }

?>