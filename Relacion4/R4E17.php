<?php
    declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Relación 4 - Ejercicio 17</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5 bg-light">
    <div class="container">
        <h1 class="mb-4">Traits</h1>
        <?php
            trait Logger {
                public function log(string $mensaje): void {
                    echo "<div class='alert alert-info'>[LOG]: $mensaje</div>";
                }
            }

            trait Saludo {
                public function saludar(string $nombre): void {
                    echo "<div class='alert alert-success'>Hola, $nombre!</div>";
                }
            }

            class Usuario {
                use Logger, Saludo;

                private string $nombre;

                public function __construct(string $nombre) {
                    $this->nombre = $nombre;
                }

                public function mostrarNombre(): void {
                    echo "<p>Usuario: {$this->nombre}</p>";
                    $this->log("Se ha mostrado el nombre");
                    $this->saludar($this->nombre);
                }
            }

            // Prueba
            $u = new Usuario("Ana");
            $u->mostrarNombre();
        ?>
    </div>
</body>
</html>
