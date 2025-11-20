<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Relación 4 - Ejercicio 8</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5 bg-light">
    <div class="container">

    <h1 class="mb-4">Clase CuentaBancaria</h1>

    <?php

    class CuentaBancaria {
        private string $numeroCuenta;
        private string $titular;
        private float $saldo;
        private int $numOperaciones;

        public function __construct(string $num, string $tit) {
            $this->numeroCuenta = $num;
            $this->titular = $tit;
            $this->saldo = 0;
            $this->numOperaciones = 0;
        }

        public function __destruct() {
            // Destructor requerido pero sin uso real
        }

        public function __toString(): string {
            return "
                <div class='card shadow-sm mb-3'>
                    <div class='card-body'>
                        <h5 class='card-title'>{$this->titular}</h5>
                        <p><b>Número de cuenta:</b> {$this->numeroCuenta}</p>
                        <p><b>Saldo:</b> {$this->saldo} €</p>
                        <span class='badge bg-primary'>Operaciones: {$this->numOperaciones}</span>
                    </div>
                </div>
            ";
        }

        public function depositar(float $cantidad): void {
            if ($cantidad <= 0) return;
            $this->saldo += $cantidad;
            $this->numOperaciones++;
        }

        public function extraer(float $cantidad): bool {
            if ($cantidad <= 0) return false;
            $this->saldo -= $cantidad;
            $this->numOperaciones++;
            return true;
        }

        public function transferir(float $cantidad, CuentaBancaria $destino): bool {
            if ($this->extraer($cantidad)) {
                $destino->depositar($cantidad);
                return true;
            }
            return false;
        }
    }

    // ======= PRUEBAS =======

    $cuenta1 = new CuentaBancaria("ES11 2222 3333", "Cuenta de Ana");
    $cuenta2 = new CuentaBancaria("ES99 8888 7777", "Cuenta de Luis");

    $cuenta1->depositar(200);
    $cuenta1->extraer(50);
    $cuenta1->transferir(100, $cuenta2);

    ?>

    <h3 class="mt-4">Resultados</h3>

    <?= $cuenta1 ?>
    <?= $cuenta2 ?>

    </div>
</body>
</html>