<?php

    /* ==========================================================
    CLASE CUENTABANCARIA
    ========================================================== */
    class CuentaBancaria {
        private string $numeroCuenta;
        private string $nombreTitular;
        private float $saldo;
        private int $numeroOperaciones;

        public function __construct(string $numeroCuenta, string $nombreTitular) {
            $this->$numeroCuenta = $numeroCuenta;
            $this->nombreTitular = strtoupper($nombreTitular);
        }

        public function __destruct() {}

        // Mostrar bandera con HTML
    }
?>