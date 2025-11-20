<?php
    class Restaurante {
        private string $nombre;
        private string $tipoCocina;
        private array $ratings;

        public function __construct(string $nombre, string $tipoCocina, array $ratings = []) {
            $this->nombre = $nombre;
            $this->tipoCocina = $tipoCocina;
            $this->ratings = $ratings;
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

        public function anadirRatings(array $nuevosRatings): void {
            $validos = array_filter($nuevosRatings, fn($r)=> $r>=1 && $r<=5);
            $this->ratings = array_merge($this->ratings, $validos);
        }

        public function ratingMedio(): float {
            return count($this->ratings) === 0 
                ? 0 
                : round(array_sum($this->ratings)/count($this->ratings),2);
        }

        public function getRatings(): array {
            return $this->ratings;
        }
    }

    $restaurante = null;

    if (isset($_POST['crear'])) {
        $restaurante = new Restaurante($_POST['nombre'], $_POST['tipo']);
    }

    if ($restaurante && isset($_POST['rating'])) {
        $restaurante->anadirRating((int)$_POST['rating']);
    }

    if ($restaurante && isset($_POST['ratings_multiples'])) {
        $valores = array_map('intval', explode(',', $_POST['ratings_multiples']));
        $restaurante->anadirRatings($valores);
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

        <?php if (!$restaurante): ?>

            <form method="post" class="card p-4 mb-3">
                <h4>Crear Restaurante</h4>
                <input type="text" name="nombre" class="form-control mb-3" required>
                <input type="text" name="tipo" class="form-control mb-3" required>
                <button name="crear" class="btn btn-primary">Crear Restaurante</button>
            </form>

        <?php else: ?>

            <?= $restaurante ?>

            <form method="post" class="card p-4 mb-3">
                <input type="hidden" name="nombre" value="<?= $_POST['nombre'] ?>">
                <input type="hidden" name="tipo" value="<?= $_POST['tipo'] ?>">
                <?php foreach($restaurante->getRatings() as $r): ?>
                    <input type="hidden" name="ratings[]" value="<?= $r ?>">
                <?php endforeach; ?>
                
                <h5>Añadir rating (1–5)</h5>
                <input type="number" name="rating" min="1" max="5" class="form-control mb-3" required>
                <button class="btn btn-success">Añadir</button>
            </form>

            <form method="post" class="card p-4 mb-3">
                <input type="hidden" name="nombre" value="<?= $_POST['nombre'] ?>">
                <input type="hidden" name="tipo" value="<?= $_POST['tipo'] ?>">
                <?php foreach($restaurante->getRatings() as $r): ?>
                    <input type="hidden" name="ratings[]" value="<?= $r ?>">
                <?php endforeach; ?>

                <h5>Añadir varios ratings</h5>
                <input type="text" name="ratings_multiples" class="form-control mb-3" required>
                <button class="btn btn-warning">Añadir varios</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>