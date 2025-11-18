<?php

    /* ==========================================================
    CLASE BANDERAFRANJAS
    ========================================================== */
    class BanderaFranjas {
        private string $orientacion;   // horizontal o vertical
        private array $franjas;        // lista de colores
        private string $adscripcion;   // país/organización

        public function __construct(string $orientacion, array $franjas, string $adscripcion = "sin adscripción") {
            $this->orientacion = strtolower($orientacion);
            $this->franjas = $franjas;
            $this->adscripcion = $adscripcion;
        }

        public function __destruct() {}

        // Mostrar bandera con HTML
        public function mostrar(): string {
            $html = "<div class='card mb-3' style='width: 22rem;'>
                        <div class='card-body'>
                            <h5 class='card-title'>{$this->adscripcion}</h5>
                            <p class='card-text'>
                                <strong>Orientación:</strong> {$this->orientacion}
                            </p>
                            <p><strong>Franjas:</strong></p>
                            <ul class='list-group'>";

            foreach ($this->franjas as $color) {
                $html .= "<li class='list-group-item'>{$color}</li>";
            }

            $html .= "   </ul>
                        </div>
                    </div>";

            return $html;
        }

        // Comparar si son idénticas
        public function esIdentica(BanderaFranjas $otra): bool {
            return $this->orientacion === $otra->orientacion &&
                $this->franjas === $otra->franjas &&
                $this->adscripcion === $otra->adscripcion;
        }

        // Comparar si mismas franjas pero orientación distinta
        public function mismasFranjasDistintaOrientacion(BanderaFranjas $otra): bool {
            return $this->franjas === $otra->franjas &&
                $this->orientacion !== $otra->orientacion;
        }

        // Invertir colores
        public function invertirColores(): void {
            $this->franjas = array_reverse($this->franjas);
        }

        // Invertir orientación
        public function invertirOrientacion(): void {
            $this->orientacion = $this->orientacion === "horizontal" ? "vertical" : "horizontal";
        }
    }

    session_start();

    /* ==========================================================
    MANEJO DE SESIÓN Y FORMULARIOS
    ========================================================== */

    if (!isset($_SESSION['banderas'])) {
        $_SESSION['banderas'] = [];
    }

    // Crear bandera
    if (isset($_POST['crear'])) {
        $ads = $_POST['adscripcion'];
        $ori = $_POST['orientacion'];
        $fr = array_map('trim', explode(",", $_POST['franjas']));

        $_SESSION['banderas'][] = new BanderaFranjas($ori, $fr, $ads);
    }

    // Invertir colores
    if (isset($_POST['invertirColores'])) {
        $id = $_POST['id'];
        $_SESSION['banderas'][$id]->invertirColores();
    }

    // Invertir orientación
    if (isset($_POST['invertirOrientacion'])) {
        $id = $_POST['id'];
        $_SESSION['banderas'][$id]->invertirOrientacion();
    }

    // Reiniciar
    if (isset($_POST['reiniciar'])) {
        $_SESSION['banderas'] = [];
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Relación 4 - Ejercicio 7</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">
    <div class="container w-50">

        <h1 class="mb-4">Banderas con Franjas</h1>

        <!-- FORMULARIO PARA CREAR BANDERA -->
        <form method="post" class="card p-4 mb-4">
            <h4>Crear Bandera</h4>

            <input type="text" name="adscripcion" class="form-control mb-2" placeholder="País u organización" required>

            <select name="orientacion" class="form-control mb-2">
                <option value="horizontal">Horizontal</option>
                <option value="vertical">Vertical</option>
            </select>

            <input type="text" name="franjas" class="form-control mb-3"
                placeholder="Colores separados por comas (ej: rojo, blanco, azul)" required>

            <button name="crear" class="btn btn-primary">Crear</button>
        </form>

        <!-- MOSTRAR CADA BANDERA + BOTONES -->
        <?php foreach ($_SESSION['banderas'] as $i => $b): ?>
            <?= $b->mostrar() ?>

            <form method="post" class="mb-4 d-flex gap-2">
                <input type="hidden" name="id" value="<?= $i ?>">

                <button name="invertirColores" class="btn btn-warning">Invertir Colores</button>
                <button name="invertirOrientacion" class="btn btn-secondary">Invertir Orientación</button>
            </form>
        <?php endforeach; ?>

        <!-- BOTÓN REINICIAR -->
        <form method="post">
            <button name="reiniciar" class="btn btn-danger mt-4">Reiniciar Todas</button>
        </form>
    </div>
</body>
</html>