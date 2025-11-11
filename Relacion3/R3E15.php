<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Relación 3 - Ejercicio 15</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="playamar.png" type="image/x-icon">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="card shadow border-0">
            <div class="card-header bg-primary text-white text-center">
                <h2>Funciones Arrow y Comparación switch / match</h2>
            </div>
            <div class="card-body">
                <?php
                // ---------------------------------
                // FUNCIONES ARROW
                // ---------------------------------
                echo "<h4 class='text-primary mb-3'>Funciones Arrow en PHP</h4>";

                // Función que comprueba si un número es primo
                $esPrimo = fn($n) => $n > 1 && !array_filter(range(2, sqrt($n)), fn($i) => $n % $i === 0);

                // Función factorial con array_product
                $factorial = fn($n) => array_product(range(1, $n));

                echo "<div class='alert alert-info'>";
                echo "¿17 es primo? <strong>" . ($esPrimo(17) ? "Sí" : "No") . "</strong><br>";
                echo "Factorial de 5 = <strong>" . $factorial(5) . "</strong>";
                echo "</div>";

                // ---------------------------------
                // COMPARACIÓN ENTRE SWITCH Y MATCH
                // ---------------------------------
                echo "<h4 class='text-secondary mt-4 mb-3'>Paralelismo entre switch y match</h4>";

                $dia = 3;

                // switch tradicional
                switch ($dia) {
                    case 1: $nombreDia = "Lunes"; break;
                    case 2: $nombreDia = "Martes"; break;
                    case 3: $nombreDia = "Miércoles"; break;
                    default: $nombreDia = "Desconocido"; break;
                }

                // match moderno (PHP 8+)
                $nombreDiaMatch = match($dia) {
                    1 => "Lunes",
                    2 => "Martes",
                    3 => "Miércoles",
                    default => "Desconocido"
                };

                echo "<div class='alert alert-warning'>";
                echo "<strong>switch:</strong> $nombreDia<br>";
                echo "<strong>match:</strong> $nombreDiaMatch";
                echo "</div>";

                echo "<p class='text-muted'>
                    <strong>switch</strong> evalúa expresiones con comparación flexible (<code>==</code>), 
                    mientras que <strong>match</strong> usa comparación estricta (<code>===</code>) 
                    y devuelve directamente un valor.
                </p>";
                ?>
            </div>
        </div>
    </div>
</body>
</html>
