<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 1 - Ejercicio 2</title>
    <link rel="shortcut icon" href="playamar.png" type="image/x-icon">
</head>
<body>
    <h1>Tipos de datos</h1>

    <?php
        $bool = true;
        $int = 42;
        $float = 3.14159;
        $string = "Hola Mundo";

        // Mostrar con var_dump()
        echo "<h3>Con var_dump()</h3>";
        var_dump($bool);
        echo "<br>";
        var_dump($int);
        echo "<br>";
        var_dump($float);
        echo "<br>";
        var_dump($string);
        echo "<br><br>";

        // Mostrar con printf formateado
        echo "<h3>Con printf()</h3>";
        printf("Booleano: %s<br>", $bool ? "true" : "false");
        printf("Entero: %d<br>", $int);
        printf("Flotante: %.2f<br>", $float);
        printf("Cadena: %s<br>", $string);
    ?>

</body>
</html>