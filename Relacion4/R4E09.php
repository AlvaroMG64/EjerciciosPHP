<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Relación 4 - Ejercicio 9</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5 bg-light">
    <div class="container">

    <h1 class="mb-4">CuentaDébito y CuentaCrédito</h1>

    <?php

    abstract class CuentaBancaria {
        protected string $numeroCuenta;
        protected string $titular;
        protected float $saldo;
        protected int $numOperaciones;

        public function __construct(string $num, string $tit) {
            $this->numeroCuenta = $num;
            $this->titular = $tit;
            $this->saldo = 0;
            $this->numOperaciones = 0;
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

        abstract public function extraer(float $cantidad): bool;

        public function transferir(float $cantidad, CuentaBancaria $destino): bool {
            if ($this->extraer($cantidad)) {
                $destino->depositar($cantidad);
                return true;
            }
            return false;
        }
    }

    class CuentaDebito extends CuentaBancaria {

        public function extraer(float $cantidad): bool {
            if ($cantidad <= 0) return false;

            if ($this->saldo >= $cantidad) {
                $this->saldo -= $cantidad;
                $this->numOperaciones++;
                return true;
            }
            return false;
        }
    }

    class CuentaCredito extends CuentaBancaria {
        private float $limiteCredito;

        public function __construct(string $num, string $tit, float $limite) {
            parent::__construct($num, $tit);
            $this->limiteCredito = $limite;
        }

        public function extraer(float $cantidad): bool {
            if ($cantidad <= 0) return false;

            if (($this->saldo - $cantidad) >= -$this->limiteCredito) {
                $this->saldo -= $cantidad;
                $this->numOperaciones++;
                return true;
            }
            return false;
        }

        public function __toString(): string {
            return parent::__toString() . "
                <p class='ms-2'><b>Límite de crédito:</b> {$this->limiteCredito} €</p>
            ";
        }
    }

    // ======= PRUEBAS =======

    $debito = new CuentaDebito("ES12 3456 7890", "Cuenta Débito – Ana");
    $credito = new CuentaCredito("ES98 7654 3210", "Cuenta Crédito – Luis", 500);

    $debito->depositar(300);
    $debito->extraer(50);
    $debito->extraer(500); // NO (sin saldo)

    $credito->depositar(200);
    $credito->extraer(600); // Sí (queda en -400)

    $credito->transferir(100, $debito); // OK

    ?>

    <h3 class="mt-4">Resultados</h3>

    <?= $debito ?>
    <?= $credito ?>

    </div>
</body>
</html>