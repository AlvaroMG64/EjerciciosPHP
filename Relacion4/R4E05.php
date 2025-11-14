<?php
session_start();

class Restaurante {
    private string $nombre;
    private string $tipoCocina;
    private array $ratings;

    public function __construct(string $nombre, string $tipoCocina) {
        $this->nombre = $nombre;
        $this->tipoCocina = $tipoCocina;
        $this->ratings = [];
    }

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
            $this->ratings[] = $rating;
        }
    }

    public function ratingMedio(): float {
        if ($this->numeroRatings() === 0) return 0;
        return round(array_sum($this->ratings) / $this->numeroRatings(), 2);
    }
}

// Crear o reiniciar restaurante
if (!isset($_SESSION['restaurante'])) {
    $_SESSION['restaurante'] = null;
}

if (isset($_POST['crear'])) {
    $_SESSION['restaurante'] = new Restaurante($_POST['nombre'], $_POST['tipo']);
}

if (isset($_POST['rating']) && $_SESSION['restaurante']) {
    $_SESSION['restaurante']->anadirRating((int)$_POST['rating']);
}

if (isset($_POST['reiniciar'])) {
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
<div class="container">

    <h1 class="mb-4">Clase Restaurante</h1>

    <?php if (!$_SESSION['restaurante']): ?>

        <form method="post" class="card p-4 mb-3">
            <h4>Crear Restaurante</h4>
            <div class="mb-3">
                <label class="form-label">Nombre:</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Tipo de Cocina:</label>
                <input type="text" name="tipo" class="form-control" required>
            </div>
            <button name="crear" class="btn btn-primary">Crear Restaurante</button>
        </form>

    <?php else: ?>

        <?php echo $_SESSION['restaurante']; ?>

        <form method="post" class="card p-4 mb-3">
            <h5>Añadir Rating (1-5)</h5>
            <input type="number" name="rating" min="1" max="5" class="form-control mb-3" required>
            <button class="btn btn-success">Añadir</button>
        </form>

        <form method="post">
            <button name="reiniciar" class="btn btn-danger">Reiniciar</button>
        </form>

    <?php endif; ?>

</div>
</body>
</html>