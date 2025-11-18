<?php

    class Restaurante {
        private string $nombre;
        private string $tipoCocina;
        private array $ratings;

        public function __construct(string $nombre, string $tipoCocina) {
            $this->nombre = $nombre;
            $this->tipoCocina = $tipoCocina;
            $this->ratings = [];
        }

        public function __destruct() {}

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
            $nuevosRatings = array_filter($nuevosRatings, fn($r) => $r >= 1 && $r <= 5);
            $this->ratings = array_merge($this->ratings, $nuevosRatings);
        }

        public function ratingMedio(): float {
            if ($this->numeroRatings() === 0) return 0;
            return round(array_sum($this->ratings) / $this->numeroRatings(), 2);
        }
    }

    session_start();

    // ===== SESIÓN =====
    if (!isset($_SESSION['restaurante'])) {
        $_SESSION['restaurante'] = null;
    }

    if (isset($_REQUEST['crear'])) {
        $_SESSION['restaurante'] = new Restaurante($_REQUEST['nombre'], $_REQUEST['tipo']);
    }

    if (isset($_REQUEST['rating'])) {
        $_SESSION['restaurante']->anadirRating((int)$_REQUEST['rating']);
    }

    if (isset($_REQUEST['ratings_multiples'])) {
        $valores = array_map('trim', explode(',', $_REQUEST['ratings_multiples']));
        $valores = array_map('intval', $valores);
        $_SESSION['restaurante']->anadirRatings($valores);
    }

    if (isset($_REQUEST['reiniciar'])) {
        $_SESSION['restaurante'] = null;
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Relación 4 - Ejercicio 5</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">
    <div class="container w-50">
        <h1 class="mb-4">Clase Restaurante</h1>

        <?php if (!$_SESSION['restaurante']): ?>
            <form method="post" class="card p-4 mb-3">
                <h4>Crear Restaurante</h4>
                <input type="text" name="nombre" class="form-control mb-3" placeholder="Nombre" required>
                <input type="text" name="tipo" class="form-control mb-3" placeholder="Tipo de cocina" required>
                <button name="crear" class="btn btn-primary">Crear Restaurante</button>
            </form>
        <?php else: ?>
            <?= $_SESSION['restaurante'] ?>

            <form method="post" class="card p-4 mb-3">
                <h5>Añadir rating (1–5)</h5>
                <input type="number" name="rating" min="1" max="5" class="form-control mb-3" required>
                <button class="btn btn-success">Añadir</button>
            </form>

            <form method="post" class="card p-4 mb-3">
                <h5>Añadir varios ratings (ej: 5,3,4)</h5>
                <input type="text" name="ratings_multiples" class="form-control mb-3" required>
                <button class="btn btn-warning">Añadir varios</button>
            </form>

            <form method="post">
                <button name="reiniciar" class="btn btn-danger">Reiniciar</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>