<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 1 - Ejercicio 6</title>
</head>
<body>
    <h1>Declaración de clases</h1>

    <?php
        class Fruta {
            public $nombre;
            public $color;

            // Setter
            public function set_name($nombre) {
                $this->nombre = $nombre;
            }

            // Getter
            public function get_name() {
                return $this->nombre;
            }
        }

        // Crear instancias
        $apple = new Fruta();
        $banana = new Fruta();

        // Inicializar nombres
        $apple->set_name("Manzana");
        $banana->set_name("Banana");

        // Mostrar nombres
        echo "Fruta 1: " . $apple->get_name() . "<br>";
        echo "Fruta 2: " . $banana->get_name() . "<br>";
    ?>

</body>
</html>