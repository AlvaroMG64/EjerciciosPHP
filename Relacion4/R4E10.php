<?php
    interface Encendible {
        public function encender();
        public function apagar();
    }

    class Bombilla implements Encendible {
        private string $tipo;
        private int $lumens;
        private bool $encendida;

        public function __construct($t, $l, $e=false) {
            $this->tipo = $t;
            $this->lumens = $l;
            $this->encendida = $e;
        }

        public function encender() { $this->encendida = true; }
        public function apagar() { $this->encendida = false; }
        public function getEstado() { return $this->encendida; }

        public function __toString(): string {
            $est = $this->encendida ? "Encendida" : "Apagada";
            return "<div class='card mb-3'><div class='card-body'>
                <h5>Bombilla {$this->tipo}</h5>
                <p>Lumens: {$this->lumens}</p>
                <p>Estado: {$est}</p>
                </div></div>";
        }
    }

    class Motocicleta implements Encendible {
        private float $gasolina;
        private int $bateria;
        private string $matricula;
        private bool $estado;

        public function __construct($mat, $gas=0, $bat=2, $est=false) {
            $this->matricula = $mat;
            $this->gasolina = $gas;
            $this->bateria = $bat;
            $this->estado = $est;
        }

        public function cargarGasolina(float $l): void {
            $this->gasolina += $l;
        }

        public function encender(): void {
            if ($this->bateria > 0 && $this->gasolina > 0) {
                $this->estado = true;
            }
        }

        public function apagar(): void { $this->estado = false; }

        public function __toString(): string {
            $est = $this->estado ? "Encendida" : "Apagada";
            return "<div class='card mb-3'><div class='card-body'>
                <h5>Motocicleta {$this->matricula}</h5>
                <p>Gasolina: {$this->gasolina}</p>
                <p>Batería: {$this->bateria}</p>
                <p>Estado: {$est}</p>
                </div></div>";
        }
    }

    /* ================================================
    SIN SESIONES — RECONSTRUCCIÓN
    ================================================ */

    $bombilla = new Bombilla("LED", 12);
    $moto = new Motocicleta("3873 NXB");

    // Reconstrucción desde POST
    if (isset($_POST['bombilla_serial'])) {
        $bombilla = unserialize($_POST['bombilla_serial']);
    }
    if (isset($_POST['moto_serial'])) {
        $moto = unserialize($_POST['moto_serial']);
    }

    // Acciones
    if (isset($_POST['encender_bombilla'])) $bombilla->encender();
    if (isset($_POST['apagar_bombilla']))   $bombilla->apagar();

    if (isset($_POST['encender_moto']))     $moto->encender();
    if (isset($_POST['apagar_moto']))       $moto->apagar();
    if (isset($_POST['cargar_gasolina']))   $moto->cargarGasolina(floatval($_POST['litros']));

    // Reiniciar → vuelve a valores iniciales
    if (isset($_POST['reiniciar'])) {
        $bombilla = new Bombilla("LED", 12);
        $moto = new Motocicleta("3873 NXB");
    }

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Relación 4 - Ejercicio 10</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">

    <div class="container w-75">
    <h1>Uso de Interfaces</h1>

    <h2>Bombilla</h2>
    <?= $bombilla ?>

    <form method="post" class="mb-4">
        <input type="hidden" name="bombilla_serial" value="<?= htmlspecialchars(serialize($bombilla)) ?>">
        <input type="hidden" name="moto_serial" value="<?= htmlspecialchars(serialize($moto)) ?>">
        <button name="encender_bombilla" class="btn btn-success">Encender</button>
        <button name="apagar_bombilla" class="btn btn-warning">Apagar</button>
    </form>

    <h2>Motocicleta</h2>
    <?= $moto ?>

    <form method="post" class="mb-4">
        <input type="hidden" name="bombilla_serial" value="<?= htmlspecialchars(serialize($bombilla)) ?>">
        <input type="hidden" name="moto_serial" value="<?= htmlspecialchars(serialize($moto)) ?>">

        <input type="number" step="0.1" name="litros" placeholder="Litros" class="form-control mb-2">
        <button name="cargar_gasolina" class="btn btn-secondary mb-2">Cargar Gasolina</button>

        <button name="encender_moto" class="btn btn-success">Encender</button>
        <button name="apagar_moto" class="btn btn-warning">Apagar</button>
    </form>

    <form method="post">
        <button name="reiniciar" class="btn btn-danger">Reiniciar</button>
    </form>

    </div>
</body>
</html>