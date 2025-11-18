<?php

    // ======================
    // INTERFAZ
    // ======================
    interface Encendible {
        public function encender();
        public function apagar();
    }

    // ======================
    // CLASE BOMBILLA
    // ======================
    class Bombilla implements Encendible {
        private string $tipoBombilla;
        private int $lumens;
        private bool $encendida = false;

        public function __construct(string $tipo, int $lumens) {
            $this->tipoBombilla = $tipo;
            $this->lumens = $lumens;
        }

        public function __destruct() {}

        public function encender() {
            $this->encendida = true;
            echo "<div class='alert alert-success'>La bombilla está encendida.</div>";
        }

        public function apagar() {
            $this->encendida = false;
            echo "<div class='alert alert-warning'>La bombilla está apagada.</div>";
        }

        public function getEstado(): bool {
            return $this->encendida;
        }

        public function __toString(): string {
            $estado = $this->encendida ? "Encendida" : "Apagada";
            return "<div class='card mb-3'>
                        <div class='card-body'>
                            <h5 class='card-title'>Bombilla {$this->tipoBombilla}</h5>
                            <p class='card-text'>Lumens: {$this->lumens}</p>
                            <p class='card-text'>Estado: {$estado}</p>
                        </div>
                    </div>";
        }
    }

    // ======================
    // CLASE MOTOCICLETA
    // ======================
    class Motocicleta implements Encendible {
        private float $gasolina;
        private int $bateria;
        private string $matricula;
        private bool $estado;

        public function __construct(string $matricula) {
            $this->matricula = $matricula;
            $this->gasolina = 0;
            $this->bateria = 2;
            $this->estado = false;
        }

        public function __destruct() {}

        public function cargarGasolina(float $litros) {
            $this->gasolina += $litros;
            echo "<div class='alert alert-info'>Se añadieron {$litros} litros de gasolina.</div>";
        }

        public function encender() {
            if ($this->estado) {
                echo "<div class='alert alert-warning'>La moto ya está encendida.</div>";
            } elseif ($this->bateria <= 0) {
                echo "<div class='alert alert-danger'>No hay batería suficiente.</div>";
            } elseif ($this->gasolina <= 0) {
                echo "<div class='alert alert-danger'>No hay gasolina.</div>";
            } else {
                $this->estado = true;
                echo "<div class='alert alert-success'>La motocicleta está encendida.</div>";
            }
        }

        public function apagar() {
            if ($this->estado) {
                $this->estado = false;
                echo "<div class='alert alert-warning'>La motocicleta está apagada.</div>";
            } else {
                echo "<div class='alert alert-info'>La moto ya estaba apagada.</div>";
            }
        }

        public function getEstado(): bool {
            return $this->estado;
        }

        public function getGasolina(): float {
            return $this->gasolina;
        }

        public function __toString(): string {
            $estado = $this->estado ? "Encendida" : "Apagada";
            return "<div class='card mb-3'>
                        <div class='card-body'>
                            <h5 class='card-title'>Motocicleta {$this->matricula}</h5>
                            <p class='card-text'>Gasolina: {$this->gasolina} L</p>
                            <p class='card-text'>Batería: {$this->bateria}</p>
                            <p class='card-text'>Estado: {$estado}</p>
                        </div>
                    </div>";
        }
    }

    session_start();

    // ======================
    // SESIÓN PARA OBJETOS
    // ======================
    if (!isset($_SESSION['bombilla'])) {
        $_SESSION['bombilla'] = new Bombilla("led", 12);
    }
    if (!isset($_SESSION['moto'])) {
        $_SESSION['moto'] = new Motocicleta("3873 NXB");
    }

    // ======================
    // FUNCIONES DE INTERACCIÓN
    // ======================
    function enciende_algo(Encendible $algo) {
        $algo->encender();
    }

    // ======================
    // MANEJO DE FORMULARIOS
    // ======================
    if (isset($_POST['encender_bombilla'])) {
        $_SESSION['bombilla']->encender();
    }
    if (isset($_POST['apagar_bombilla'])) {
        $_SESSION['bombilla']->apagar();
    }

    if (isset($_POST['encender_moto'])) {
        $_SESSION['moto']->encender();
    }
    if (isset($_POST['apagar_moto'])) {
        $_SESSION['moto']->apagar();
    }
    if (isset($_POST['cargar_gasolina'])) {
        $litros = floatval($_POST['litros']);
        $_SESSION['moto']->cargarGasolina($litros);
    }
    if (isset($_REQUEST['reiniciar'])) {
        $_SESSION['bombilla'] = null;
        $_SESSION['moto'] = null;
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Relación 4 - Ejercicio 10</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">
    <div class="container">
        <h1 class="mb-4">Interfaz Encendible: Bombilla y Motocicleta</h1>

        <!-- Mostrar objetos -->
        <h3>Bombilla</h3>
        <?= $_SESSION['bombilla'] ?>
        <form method="post" class="mb-3">
            <button name="encender_bombilla" class="btn btn-success">Encender Bombilla</button>
            <button name="apagar_bombilla" class="btn btn-warning">Apagar Bombilla</button>
        </form>

        <h3>Motocicleta</h3>
        <?= $_SESSION['moto'] ?>
        <form method="post" class="mb-3">
            <input type="number" step="0.1" name="litros" placeholder="Litros de gasolina" class="form-control mb-2" required>
            <button name="cargar_gasolina" class="btn btn-secondary mb-2">Cargar Gasolina</button>
            <br>
            <button name="encender_moto" class="btn btn-success">Encender Motocicleta</button>
            <button name="apagar_moto" class="btn btn-warning">Apagar Motocicleta</button>
        </form>

        <!-- Función de prueba -->
        <h3>Función enciende_algo()</h3>
        <form method="post">
            <button name="probar_funcion" class="btn btn-primary">Encender Bombilla con enciende_algo()</button>
        </form>
        <?php
            if (isset($_POST['probar_funcion'])) {
                enciende_algo($_SESSION['bombilla']);
            }
        ?>

        <form method="post">
            <button name="reiniciar" class="btn btn-danger mt-2">Reiniciar Bombilla y Motocicleta</button>
        </form>
    </div>
</body>
</html>
