<?php
    class restaurante {
        public $nombre = ' ';
        public $tipoCocina = ' ';
        public $ratings = [];

        public function __construct($nombre, $tipoCocina, $ratings) {
            $this->nombre = $nombre;
            $this->tipoCocina = $tipoCocina;
            $this->ratings = $ratings;
        }

        public function __destruct() {

        }

        public function getRatings() {
            $numeroTotal = count(self::$ratings);
        }
    }
?>