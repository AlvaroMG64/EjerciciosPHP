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
                if ($cantidad > 0) {
                    $this->saldo += $cantidad;
                    $this->numOperaciones++;
                }
            }

            public function extraer(float $cantidad): bool {
                if ($cantidad > 0 && $cantidad <= $this->saldo) {
                    $this->saldo -= $cantidad;
                    $this->numOperaciones++;
                    return true;
                }
                return false;
            }

            public function transferir(float $cantidad, CuentaBancaria $destino): bool {
                if ($this->extraer($cantidad)) {
                    $destino->depositar($cantidad);
                    return true;
                }
                return false;
            }

            // Getters necesarios para manejar operaciones en botones
            public function getNumeroCuenta(): string { return $this->numeroCuenta; }
            public function getTitular(): string { return $this->titular; }
        }

        // Inicializar cuentas
        $cuenta1 = new CuentaBancaria("ES11 2222 3333", "Cuenta de Ana");
        $cuenta2 = new CuentaBancaria("ES99 8888 7777", "Cuenta de Luis");

        // Manejar operaciones enviadas por formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $operacion = $_POST['operacion'] ?? '';
            $cuenta = $_POST['cuenta'] ?? '';

            $cantidad = floatval($_POST['cantidad'] ?? 0);

            if ($cuenta === 'cuenta1') {
                if ($operacion === 'depositar') $cuenta1->depositar($cantidad);
                if ($operacion === 'extraer') $cuenta1->extraer($cantidad);
                if ($operacion === 'transferir') $cuenta1->transferir($cantidad, $cuenta2);
            } elseif ($cuenta === 'cuenta2') {
                if ($operacion === 'depositar') $cuenta2->depositar($cantidad);
                if ($operacion === 'extraer') $cuenta2->extraer($cantidad);
                if ($operacion === 'transferir') $cuenta2->transferir($cantidad, $cuenta1);
            }
        }
        ?>

        <div class="row">
            <div class="col-md-6">
                <h3>Cuenta de Ana</h3>
                <?= $cuenta1 ?>
                <form method="post" class="mb-3">
                    <input type="hidden" name="cuenta" value="cuenta1">
                    <div class="mb-2">
                        <input type="number" step="0.01" name="cantidad" class="form-control" placeholder="Cantidad" required>
                    </div>
                    <button name="operacion" value="depositar" class="btn btn-success mb-1">Depositar</button>
                    <button name="operacion" value="extraer" class="btn btn-warning mb-1">Extraer</button>
                    <button name="operacion" value="transferir" class="btn btn-primary mb-1">Transferir a Luis</button>
                </form>
            </div>

            <div class="col-md-6">
                <h3>Cuenta de Luis</h3>
                <?= $cuenta2 ?>
                <form method="post" class="mb-3">
                    <input type="hidden" name="cuenta" value="cuenta2">
                    <div class="mb-2">
                        <input type="number" step="0.01" name="cantidad" class="form-control" placeholder="Cantidad" required>
                    </div>
                    <button name="operacion" value="depositar" class="btn btn-success mb-1">Depositar</button>
                    <button name="operacion" value="extraer" class="btn btn-warning mb-1">Extraer</button>
                    <button name="operacion" value="transferir" class="btn btn-primary mb-1">Transferir a Ana</button>
                </form>
            </div>
        </div>

    </div>
</body>
</html>