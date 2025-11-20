<?php
    class BanderaFranjas {
        private string $orientacion;
        private array $franjas;
        private string $adscripcion;

        public function __construct($or, $fr, $ad) {
            $this->orientacion = $or;
            $this->franjas = $fr;
            $this->adscripcion = $ad;
        }

        public function mostrar(): string {
            $html = "<div class='card mb-3' style='width: 22rem;'><div class='card-body'>";
            $html .= "<h5 class='card-title'>{$this->adscripcion}</h5>";
            $html .= "<p><strong>Orientación:</strong> {$this->orientacion}</p>";
            $html .= "<p><strong>Franjas:</strong></p><ul class='list-group'>";
            foreach($this->franjas as $c) {
                $html .= "<li class='list-group-item'>{$c}</li>";
            }
            $html .= "</ul></div></div>";
            return $html;
        }

        public function invertirColores() {
            $this->franjas = array_reverse($this->franjas);
        }

        public function invertirOrientacion() {
            $this->orientacion = $this->orientacion == "horizontal" ? "vertical" : "horizontal";
        }

        public function getFranjas() { return $this->franjas; }
        public function getOrientacion() { return $this->orientacion; }
        public function getAdscripcion() { return $this->adscripcion; }
    }

    $banderas = [];

    if (isset($_POST['banderas_serial'])) {
        $banderas = unserialize($_POST['banderas_serial']);
    }

    if (isset($_POST['crear'])) {
        $ads = $_POST['adscripcion'];
        $ori = $_POST['orientacion'];
        $fr = array_map('trim', explode(",", $_POST['franjas']));
        $banderas[] = new BanderaFranjas($ori, $fr, $ads);
    }

    if (isset($_POST['invertirColores'])) {
        $banderas[$_POST['id']]->invertirColores();
    }

    if (isset($_POST['invertirOrientacion'])) {
        $banderas[$_POST['id']]->invertirOrientacion();
    }

    if (isset($_POST['reiniciar'])) {
        $banderas = [];
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Relación 4 - Ejercicio 7</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">

    <div class="container w-50">

    <h1>Banderas</h1>

    <form method="post" class="card p-4 mb-4">
        <input type="hidden" name="banderas_serial" value="<?= htmlspecialchars(serialize($banderas)) ?>">
        <h4>Crear bandera</h4>

        <input type="text" name="adscripcion" class="form-control mb-2" placeholder="País" required>

        <select name="orientacion" class="form-control mb-2">
            <option value="horizontal">Horizontal</option>
            <option value="vertical">Vertical</option>
        </select>

        <input type="text" name="franjas" class="form-control mb-3" placeholder="Ej: rojo, blanco, azul" required>

        <button name="crear" class="btn btn-primary">Crear</button>
    </form>

    <?php foreach($banderas as $i=>$b): ?>
        <?= $b->mostrar() ?>

        <form method="post" class="mb-4 d-flex gap-2">
            <input type="hidden" name="banderas_serial" value="<?= htmlspecialchars(serialize($banderas)) ?>">
            <input type="hidden" name="id" value="<?= $i ?>">
            <button name="invertirColores" class="btn btn-warning">Invertir Colores</button>
            <button name="invertirOrientacion" class="btn btn-secondary">Invertir Orientación</button>
        </form>
    <?php endforeach; ?>

    <form method="post">
        <button name="reiniciar" class="btn btn-danger mt-4">Reiniciar</button>
    </form>

    </div>
</body>
</html>