<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Relación 3 - Ejercicio 13</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">

    <div class="container">
        <h1 class="mb-4">Manipulación de cadenas en PHP</h1>
        <form method="post" class="mb-4">
            <div class="mb-3">
                <label for="cadena" class="form-label">Introduce una cadena de texto:</label>
                <input type="text" name="cadena" id="cadena" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Procesar</button>
        </form>

        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $cadena = $_POST['cadena'];

                // Cadena del revés y comprobación palíndroma
                $reves = strrev($cadena);
                $esPalindroma = (strtolower(str_replace(' ', '', $cadena)) == strtolower(str_replace(' ', '', $reves)));

                echo "<div class='alert alert-info'><strong>Del revés:</strong> $reves<br>";
                echo $esPalindroma ? "Es palíndroma" : "No es palíndroma";
                echo "</div>";

                // Palabras del revés (no los caracteres)
                $palabras = explode(" ", $cadena);
                $palabrasReves = implode(" ", array_reverse($palabras));
                echo "<div class='alert alert-secondary'><strong>Palabras del revés:</strong> $palabrasReves</div>";

                // En mayúsculas y minúsculas
                echo "<div class='alert alert-success'><strong>Mayúsculas:</strong> " . strtoupper($cadena) . "<br>";
                echo "<strong>Minúsculas:</strong> " . strtolower($cadena) . "</div>";

                // Recuento de caracteres y palabras
                $numCaracteres = strlen($cadena);
                $numPalabras = str_word_count($cadena);
                echo "<div class='alert alert-warning'><strong>Recuento:</strong><br>";
                echo "Caracteres (incluyendo espacios): $numCaracteres<br>";
                echo "Palabras: $numPalabras</div>";

                // crypt, md5 y sha1
                echo "<div class='alert alert-dark'><strong>Encriptaciones:</strong><br>";
                echo "crypt(): " . crypt($cadena, 'xx') . "<br>";
                echo "md5(): " . md5($cadena) . "<br>";
                echo "sha1(): " . sha1($cadena) . "</div>";
            }
        ?>
    </div>
</body>
</html>