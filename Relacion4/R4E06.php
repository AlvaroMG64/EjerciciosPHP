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

        public function __destruct() {}

        // GETTERS
        public function getNombre(): string { return $this->nombre; }
        public function getTipoCocina(): string { return $this->tipoCocina; }
        public function getRatings(): array { return $this->ratings; }

        // SETTERS
        public function setNombre(string $n): void { $this->nombre = $n; }
        public function setTipoCocina(string $t): void { $this->tipoCocina = $t; }
        public function setRatings(array $r): void { $this->ratings = $r; }

        public function __toString(): string {
            $html = "<div class='card mb-3'>";
            $html .= "<div class='card-body'>";
            $html .= "<h5 class='card-title'>{$this->nombre}</h5>";
            $html .= "<h6 class='card-subtitle mb-2 text-muted'>{$this->tipoCocina}</h6>";
            $html .= "<p class='card-text'>Número de ratings: " . $this->numeroRatings() . "</p>";
            $html .= "<p class='card-text'>Rating medio: " . $this->ratingMedio() . "</p>";
            $html .= "</div></div>";
            return $html;
        }

        public function numeroRatings(): int {
            return count($this->ratings);
        }

        public function anadirRating(int $rating): void {
            if ($rating >= 1 && $rating <= 5) {
                array_push($this->ratings, $rating);
            }
        }

        public function anadirRatings(array $nuevosRatings): void {
            $nuevosRatings = array_filter($nuevosRatings, fn($r)=> $r>=1 && $r<=5);
            $this->ratings = array_merge($this->ratings, $nuevosRatings);
        }

        public function ratingMedio(): float {
            if ($this->numeroRatings()===0) return 0;
            return round(array_sum($this->ratings)/$this->numeroRatings(),2);
        }

        public static function totalRests(): int { return self::$numeroRest; }
    }

    session_start();

    // ===== SESIÓN =====
    if (!isset($_SESSION['restaurantes'])) $_SESSION['restaurantes'] = [];

    // Crear restaurante
    if (isset($_REQUEST['crear'])) {
        $_SESSION['restaurantes'][] = new Restaurante($_REQUEST['nombre'], $_REQUEST['tipo']);
    }

    // Añadir rating individual
    if (isset($_REQUEST['addRating'])) {
        $id = $_REQUEST['id'];
        $rating = (int)$_REQUEST['rating'];
        $_SESSION['restaurantes'][$id]->anadirRating($rating);
    }

    // Añadir varios ratings
    if (isset($_REQUEST['addRatingsMultiples'])) {
        $id = $_REQUEST['id'];
        $valores = array_map('trim', explode(',', $_POST['ratings_multiples']));
        $valores = array_map('intval', $valores);
        $_SESSION['restaurantes'][$id]->anadirRatings($valores);
    }

    // Reiniciar todo
    if (isset($_REQUEST['reiniciar'])) $_SESSION['restaurantes'] = [];
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Relación 4 - Ejercicio 6</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">
    <div class="container w-50">
        <h1 class="mb-4">Control de restaurantes</h1>

        <p class="alert alert-info fs-5">
            Número total de restaurantes creados: <strong><?= Restaurante::totalRests() ?></strong>
        </p>

        <form method="post" class="card p-4 mb-3">
        <h4>Crear Restaurante</h4>
        <input type="text" name="nombre" class="form-control mb-3" placeholder="Nombre" required>
        <input type="text" name="tipo" class="form-control mb-3" placeholder="Tipo de Cocina" required>
        <button name="crear" class="btn btn-primary">Crear</button>
        </form>

        <?php foreach($_SESSION['restaurantes'] as $i => $rest): ?>
            <?= $rest ?>

            <form method="post" class="card p-3 mb-3">
                <h5>Añadir rating (1–5)</h5>
                <input type="hidden" name="id" value="<?= $i ?>">
                <input type="number" name="rating" class="form-control mb-2" min="1" max="5" required>
                <button name="addRating" class="btn btn-success">Añadir</button>
            </form>

            <form method="post" class="card p-3 mb-3">
                <h5>Añadir varios ratings (ej: 5,3,4)</h5>
                <input type="hidden" name="id" value="<?= $i ?>">
                <input type="text" name="ratings_multiples" class="form-control mb-2" required>
                <button name="addRatingsMultiples" class="btn btn-warning">Añadir varios</button>
            </form>
        <?php endforeach; ?>

        <form method="post">
            <button name="reiniciar" class="btn btn-danger">Reiniciar Todos</button>
        </form>

    </div>
</body>
</html>