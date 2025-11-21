<?php
    class Restaurante {
        private static int $numeroRest = 0;

        public function __construct(
            private string $nombre,
            private string $tipoCocina,
            private array $ratings = []
        ) {
            self::$numeroRest++;
        }

        public function __toString(): string {
            $html = "<div class='card mb-3'><div class='card-body'>";
            $html .= "<h5 class='card-title'>{$this->nombre}</h5>";
            $html .= "<h6 class='card-subtitle mb-2 text-muted'>{$this->tipoCocina}</h6>";
            $html .= "<p class='card-text'>Número de ratings: " . count($this->ratings) . "</p>";
            $html .= "<p class='card-text'>Rating medio: " . $this->ratingMedio() . "</p>";
            $html .= "</div></div>";
            return $html;
        }

        public function anadirRating(int $rating): void {
            if ($rating >= 1 && $rating <= 5) {
                $this->ratings[] = $rating;
            }
        }

        public function anadirRatings(array $rs): void {
            $validos = array_filter($rs, fn($r)=> $r>=1 && $r<=5);
            $this->ratings = array_merge($this->ratings, $validos);
        }

        public function ratingMedio(): float {
            return count($this->ratings) ? round(array_sum($this->ratings)/count($this->ratings),2) : 0;
        }

        public static function totalRests(): int {
            return self::$numeroRest;
        }

        public function getNombre(): string { return $this->nombre; }
        public function getTipoCocina(): string { return $this->tipoCocina; }
        public function getRatings(): array { return $this->ratings; }
    }

    $restaurantes = [];

    // Reconstrucción desde POST
    if (isset($_POST['restaurantes_serial'])) {
        $restaurantes = unserialize($_POST['restaurantes_serial']);
    }

    // Crear restaurante
    if (isset($_POST['crear'])) {
        $restaurantes[] = new Restaurante($_POST['nombre'], $_POST['tipo']);
    }

    // Añadir rating
    if (isset($_POST['addRating'])) {
        $restaurantes[$_POST['id']]->anadirRating((int)$_POST['rating']);
    }

    // Añadir múltiples ratings
    if (isset($_POST['addRatingsMultiples'])) {
        $vals = array_map('intval', explode(',', $_POST['ratings_multiples']));
        $restaurantes[$_POST['id']]->anadirRatings($vals);
    }

    // Reiniciar
    if (isset($_POST['reiniciar'])) {
        $restaurantes = [];
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Relación 4 - Ejercicio 6</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">
    <div class="container w-50">

    <h1>Control de restaurantes</h1>

    <p class="alert alert-info">
        Restaurantes creados: <strong><?= Restaurante::totalRests() ?></strong>
    </p>

    <form method="post" class="card p-4 mb-3">
        <input type="hidden" name="restaurantes_serial" value="<?= htmlspecialchars(serialize($restaurantes)) ?>">
        <h4>Crear restaurante</h4>
        <input type="text" name="nombre" class="form-control mb-3" required>
        <input type="text" name="tipo" class="form-control mb-3" required>
        <button class="btn btn-primary" name="crear">Crear</button>
    </form>

    <?php foreach($restaurantes as $i=>$r): ?>

        <?= $r ?>

        <form method="post" class="card p-3 mb-3">
            <input type="hidden" name="restaurantes_serial" value="<?= htmlspecialchars(serialize($restaurantes)) ?>">
            <input type="hidden" name="id" value="<?= $i ?>">
            <h5>Añadir rating</h5>
            <input type="number" name="rating" min="1" max="5" class="form-control mb-2">
            <button class="btn btn-success" name="addRating">Añadir</button>
        </form>

        <form method="post" class="card p-3 mb-3">
            <input type="hidden" name="restaurantes_serial" value="<?= htmlspecialchars(serialize($restaurantes)) ?>">
            <input type="hidden" name="id" value="<?= $i ?>">
            <h5>Añadir varios ratings</h5>
            <input type="text" name="ratings_multiples" class="form-control mb-2">
            <button class="btn btn-warning" name="addRatingsMultiples">Añadir varios</button>
        </form>

    <?php endforeach; ?>

    <form method="post">
        <button name="reiniciar" class="btn btn-danger">Reiniciar Todo</button>
    </form>

    </div>
</body>
</html>