<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Relación 4 - Ejercicio 12</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4 bg-light">
    <div class="container">

    <h1 class="mb-4">Serialize / Unserialize</h1>

    <?php
    // ===== ARRAY ===== 
    $frutas = ["manzana", "naranja", "plátano"];

    $serial_array = serialize($frutas);
    $unserial_array = unserialize($serial_array);

    // ===== OBJETO =====
    class Persona {
        public string $nombre;
        public int $edad;

        public function __construct($n, $e) {
            $this->nombre = $n;
            $this->edad = $e;
        }
    }

    $persona = new Persona("Laura", 30);

    $serial_obj = serialize($persona);
    $unserial_obj = unserialize($serial_obj);

    ?>

    <h3>Array original:</h3>
    <pre><?php print_r($frutas); ?></pre>

    <h3>Array SERIALIZADO:</h3>
    <pre><?= $serial_array ?></pre>

    <h3>Array UN-SERIALIZADO:</h3>
    <pre><?php print_r($unserial_array); ?></pre>

    <hr>

    <h3>Objeto original:</h3>
    <pre><?php print_r($persona); ?></pre>

    <h3>Objeto SERIALIZADO:</h3>
    <pre><?= $serial_obj ?></pre>

    <h3>Objeto UN-SERIALIZADO:</h3>
    <pre><?php print_r($unserial_obj); ?></pre>

    </div>
</body>
</html>