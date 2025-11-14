<?php
session_start();

class Restaurante {
    private string $nombre;
    private string $tipoCocina;
    private array $ratings;

    private static int $numeroRest = 0;

    public function __construct(string $nombre, string $tipoCocina) {
        $this->nombre = $nombre;
        $this->tipoCocina = $tipoCocina;
        $this->ratings = [];
        self::$numeroRest++;
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

    public static function totalRests(): int {
        return self::$numeroRest;
    }
}

// Lista de restaurantes
if (!isset($_SESSION['restaurantes'])) {
    $_SESSION['restaurantes'] = [];
}

// Crear restaurante
if (isset($_POST['crear'])) {
    $nuevo = new Restaurante($_POST['nombre'], $_POST['tipo']);
    $_SESSION['restaurantes'][] = $nuevo;
}

// Añadir rating
if (isset($_POST['addRating'])) {
    $id = $_POST['id'];
    $rating = (int)$_POST['rating'];
    $_SESSION['restaurantes'][$id]->anadirRating($rating);
}

// Reiniciar
if (isset($_POST['reiniciar'])) {
    $_SESSION['restaurantes'] = [];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Relación 4 - Ejercicio 6</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">
<div class="container">

    <h1>Ejercicio 6 – Restaurantes con Contador Estático</h1>
    <p class="alert alert-info fs-5">
        Número total de restaurantes creados: <strong><?= Restaurante::totalRests() ?></strong>
    </p>

    <form method="post" class="card p-4 mb-3">
        <h4>Crear Restaurante</h4>
        <input type="text" name="nombre" class="form-control mb-3" placeholder="Nombre" required>
        <input type="text" name="tipo" class="form-control mb-3" placeholder="Tipo de Cocina" required>
        <button name="crear" class="btn btn-primary">Crear</button>
    </form>

    <?php foreach ($_SESSION['restaurantes'] as $i => $rest): ?>
        <?= $rest ?>

        <form method="post" class="card p-3 mb-4">
            <h5>Añadir rating (1–5)</h5>
            <input type="hidden" name="id" value="<?= $i ?>">
            <input type="number" name="rating" class="form-control mb-2" min="1" max="5" required>
            <button name="addRating" class="btn btn-success">Añadir</button>
        </form>
    <?php endforeach; ?>

    <form method="post">
        <button name="reiniciar" class="btn btn-danger">Reiniciar Todos</button>
    </form>

</div>
</body>
</html>