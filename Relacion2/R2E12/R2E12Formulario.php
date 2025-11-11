<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 2 - Ejercicio 12</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="shortcut icon" href="playamar.png" type="image/x-icon">
    <style>
        .form-text {
            visibility: hidden;
        }
    </style><!-- ponemos lo que serán los futuros mensajes de error ocultos de entrada y manipularemos esta
                 visibilidad desde el js, cuando haya un error, mostraremos el mensaje. Hay un mensaje
                 por cada campo de entrada del formulario. El estilo debería ir enlazado en archivo
                 aparte, pero es tan pequeño que lo dejamos aquí para no complicar la comprensión
                 del engranaje html-css-js-php -->
</head>

<body>
    <div class="d-flex justify-content-center align-items-center vh-100 bg-white">
        <!-- enviamos por el método get, pero si hubiera algún campo de valor reservado (password, etc)
             o un campo file, habría que utilizar obligatoriamente, post -->
        <form action="R2E12Calculo.php" method="get" class="p-3 w-50 shadow rounded bg-secondary-subtle"
            id="form1"> <!-- le ponemos id al formulario para poder citarlo desde js -->
            <h3 class="text-danger text-center">Cálculo de notas</h3>
            <div class="mb-3">
                <label for="nota1" class="form-label">Introduce nota 1:<span class="text-danger"> *</span></label>
                <input type="text" placeholder="un número entero entre 1 y 10" class="form-control" name="nota1" id="nota1">
                <div id="nota1Help" class="form-text text-danger">La nota es obligatoria y debe ser entera entre 1 y 10</div>
            </div>
            <div class="mb-3">
                <label for="nota2" class="form-label">Introduce nota 2:<span class="text-danger"> *</span></label>
                <input type="text" placeholder="un número entero entre 1 y 10" class="form-control" name="nota2" id="nota2">
                <div id="nota2Help" class="form-text text-danger">La nota es obligatoria y debe ser entera entre 1 y 10</div>
            </div>
            <div class="mb-3">
                <label for="faltas" class="form-label">Introduce faltas:<span class="text-danger"> *</span></label>
                <input type="text" placeholder="un número entero de 0 en adelante" class="form-control" name="faltas" id="faltas">
                <div id="faltasHelp" class="form-text text-danger">La faltas son obligatorias y deben ser enteras entre 0 y 10</div>
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Introduce nombre:<span class="text-danger"> *</span></label>
                <input type="text" placeholder="requerido" class="form-control" name="nombre" id="nombre">
                <div id="nombreHelp" class="form-text text-danger">El nombre es obligatorio</div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Introduce email:</label>
                <input type="text" placeholder="introduce un correo correcto" class="form-control" name="email" id="email">
                <div id="emailHelp" class="form-text text-danger">El email no tiene formato correcto</div>
            </div>
            <input type="submit" class="btn btn-outline-primary" value="Enviar" id="boton">
        </form>
    </div>
    <!-- toda la lógica de validación, irá en este archivo js -->
    <script src="./validaciones.js"></script>
</body>

</html>