<?php
    class Conjunto {
        private array $set;
        private int $maxItems;
        private int $items;

        // MÉTODO A
        public function __construct(int $maxItems, int $items = 0) {
            $this->set = [];
            $this->maxItems = $maxItems;
            $this->items = $items;
        }

        // MÉTODO B
        public function __destruct() {

        }

        // MÉTODO C
        public function toString() {
            echo "<div class='card mb-3'><div class='card-body'>
                        <h5 class='card-title'>Contenido del conjunto:</h5>
                        <p class='card-text'>{" . implode(", ", $this->set) . "}</p>
                        </div></div>";
        }

        // MÉTODO D
        public function incluir(int $numero) {
            if (($this->items) < ($this->maxItems)) {
                array_push($this->set, $numero);
            }
            $this->items = count($this -> set);
        }

        // MÉTODO E
        public function incluido(int $numero): bool {
            if (in_array($numero, $this->set)) {
                $estaIncluido = true;
            } else {
                $estaIncluido = false;
            }
            return $estaIncluido;
        }

        // MÉTODO F
        public function interseccion(array $set2): array {
            $interseccionConjuntos = array_intersect($this->set, $set2);
            return $interseccionConjuntos;
        }

        // MÉTODO G
        public function union(array $set2): array {
            // Con merge se repetirían valores, por lo que con unique eliminamos los elementos duplicados
            $unionConjuntos = array_unique(array_merge($this->set, $set2));
            return $unionConjuntos;
        }

        // MÉTODO H
        public function diferencia(array $set2): array {
            $diferenciaConjuntos = array_diff($this->set, $set2);
            return $diferenciaConjuntos;
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Examen PHP - Ejercicio 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="playamar.png" type="image/x-icon">
</head>
<body class="bg-light">
    <div class="container py-5">
        <h1>ÁLVARO MOZO GASPAR - EXAMEN PHP</h1>
        <h2>Ejercicio 2- Conjuntos</h2>
        <?php
            // Creando conjunto
            $conjunto = new Conjunto(15);

            // Añadiendo elementos
            $conjunto->incluir(7);
            $conjunto->incluir(3);
            $conjunto->incluir(5);
            $conjunto->incluir(6);
            $conjunto->incluir(1);
            $conjunto->incluir(9);
            $conjunto->incluir(8);
            $conjunto->incluir(11);
            $conjunto->incluir(10);

            // Mostrando con toString
            $conjunto->toString();

        ?>
    </div>
</body>
</html>