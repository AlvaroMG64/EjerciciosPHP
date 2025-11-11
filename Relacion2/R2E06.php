<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 2 - Ejercicio 6</title>
    <link rel="shortcut icon" href="./playamar.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="shortcut icon" href="playamar.png" type="image/x-icon">
</head>
<body class="bg-light">

    <div class="container py-5">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white text-center">
                <h3 class="mb-0">Listado de Personas</h3>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Género</th>
                                <th>Fecha de Nacimiento</th>
                                <th>Teléfono</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // Cargar el archivo XML
                                $xml = simplexml_load_file("dataset.xml") or die("Error al cargar el archivo XML");

                                // Recorrer los registros
                                foreach ($xml->person as $persona) {
                                    $id = $persona->id;
                                    $nombre = $persona->first_name;
                                    $apellido = $persona->last_name;
                                    $genero = $persona->gender;
                                    $fechaNacimiento = $persona->birth_date;
                                    $telefono = $persona->phone_number;
                                    $email = $persona->email;

                                    // Asignar color al género
                                    $color = match (strtolower($genero)) {
                                        'male' => 'bg-primary',
                                        'female' => 'bg-danger',
                                        'non-binary' => 'bg-warning text-dark',
                                        'bigender' => 'bg-success',
                                        default => 'bg-secondary',
                                    };

                                    echo "
                                        <tr>
                                            <td>$id</td>
                                            <td>$nombre</td>
                                            <td>$apellido</td>
                                            <td><span class='badge $color'>$genero</span></td>
                                            <td>$fechaNacimiento</td>
                                            <td>$telefono</td>
                                            <td><a href='mailto:$email'>$email</a></td>
                                        </tr>
                                    ";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous"></script>
</body>
</html>