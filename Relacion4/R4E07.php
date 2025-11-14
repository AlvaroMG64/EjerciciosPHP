<?php
    class Restaurante {
        private string $nombre;
        private string $tipoCocina;
        private array $ratings;

        // Atributo estático solicitado
        private static int $numeroRest = 0;

        // Constructor
        public function __construct(string $nombre, string $tipoCocina) {
            $this->nombre = $nombre;
            $this->tipoCocina = $tipoCocina;
            $this->ratings = [];

            // Incrementamos el contador estático
            self::$numeroRest++;
        }

        // Destructor
        public function __destruct() {
            // Nada especial que limpiar
        }

        // toString
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

        // Número de ratings
        public function numeroRatings(): int {
            return count($this->ratings);
        }

        // Añadir rating
        public function anadirRating(int $rating): void {
            if ($rating >= 1 && $rating <= 5) {
                $this->ratings[] = $rating;
            }
        }

        // Añadir varios ratings
        public function anadirRatings(array $ratings): void {
            foreach ($ratings as $r) {
                $this->anadirRating($r);
            }
        }

        // Rating medio
        public function ratingMedio(): float {
            if ($this->numeroRatings() === 0) return 0;
            return round(array_sum($this->ratings) / $this->numeroRatings(), 2);
        }

        // Getters y setters
        public function setNombre(string $nombre) {
            $this->nombre = $nombre;
        }

        public function setTipoCocina(string $tipoCocina) {
            $this->tipoCocina = $tipoCocina;
        }

        public function setRatings(array $ratings) {
            $this->ratings = [];
            $this->anadirRatings($ratings);
        }

        public function getNombre(): string {
            return $this->nombre;
        }

        public function getTipoCocina(): string {
            return $this->tipoCocina;
        }

        public function getRatings(): array {
            return $this->ratings;
        }

        // Método estático solicitado
        public static function totalRests(): int {
            return self::$numeroRest;
        }
    }

    // Ejemplo de uso
    $restaurante = new Restaurante("La Bella Italia", "Italiana");
    $restaurante->anadirRatings([5, 4, 3, 5, 4]);
?>