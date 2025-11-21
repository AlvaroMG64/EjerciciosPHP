<?php
    declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Relación 4 - Ejercicio 15</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5 bg-light">
    <div class="container w-50">
        <h1 class="mb-4">Tipado estricto y Null Safety</h1>

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

                public function __toString(): string {
                    return "<div class='card mb-3'>
                                <div class='card-body'>
                                    <h5 class='card-title'>{$this->nombre}</h5>
                                    <h6 class='card-subtitle mb-2 text-muted'>{$this->tipoCocina}</h6>
                                    <p class='card-text'>Número de ratings: {$this->numeroRatings()}</p>
                                    <p class='card-text'>Rating medio: {$this->ratingMedio()}</p>
                                </div>
                            </div>";
                }

                public function numeroRatings(): int {
                    return count($this->ratings);
                }

                public function anadirRating(int $rating): void {
                    if ($rating >= 1 && $rating <= 5) {
                        $this->ratings[] = $rating;
                    }
                }

                public function anadirRatings(array $nuevosRatings): void {
                    $nuevosRatings = array_filter($nuevosRatings, fn($r): bool => $r >= 1 && $r <= 5);
                    $this->ratings = array_merge($this->ratings, $nuevosRatings);
                }

                public function ratingMedio(): float {
                    return $this->numeroRatings() === 0 ? 0.0 : round(array_sum($this->ratings) / $this->numeroRatings(), 2);
                }
            }

            // Ejemplo
            $restaurante = new Restaurante("La buena mesa", "Mediterránea");
            $restaurante->anadirRatings([5,4,3,5]);
            echo $restaurante;

        ?>
    </div>
</body>
</html>
