<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 1 - Ejercicio 20</title>
    <link rel="shortcut icon" href="playamar.png" type="image/x-icon">
</head>
<body>
    <h1>Convertir un número decimal a base 2, 8 o 16</h1>

    <?php
        $numero = 987;
        $base = 16; // opciones: 2 = binario, 8 = octal, 16 = hexadecimal

        echo "Número decimal: $numero<br>";
        echo "Base elegida: $base<br>";

        $decimal = $numero;
        $resultado = "";

        if (!in_array($base, [2, 8, 16])) {
            echo "La base debe ser 2, 8 o 16";
        } elseif ($decimal == 0) {
            $resultado = "0";
            echo "Número convertido: $resultado";
        } else {
            while ($decimal > 0) {
                $resto = $decimal % $base;
                if ($resto < 10) {
                    $digito = $resto;
                } else {
                    // Letras para hex (A-F)
                    $digito = chr(55 + $resto); // 10->A, 11->B, ..., 15->F
                }
                $resultado = $digito . $resultado;
                $decimal = intdiv($decimal, $base);
            }
            echo "Número convertido: $resultado";
        }
    ?>

</body>
</html>