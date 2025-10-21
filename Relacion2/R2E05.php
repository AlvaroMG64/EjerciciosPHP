<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Relación 2 - Ejercicio 5</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <h1 class="text-center text-success mb-4">Temperaturas Semanales</h1>

  <?php
    $temperaturas = [
      "Lunes" => 22,
      "Martes" => 25,
      "Miércoles" => 24,
      "Jueves" => 23,
      "Viernes" => 26,
      "Sábado" => 27,
      "Domingo" => 25
    ];
  ?>

  <table class="table table-striped table-bordered table-hover shadow-sm">
    <thead class="table-success">
      <tr>
        <th>Día</th>
        <th>Temperatura (°C)</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($temperaturas as $dia => $temp): ?>
        <tr>
          <td><?= $dia ?></td>
          <td><?= $temp ?>°C</td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <a href="index.html" class="btn btn-secondary mt-4">Volver al índice</a>

  <!-- Componentes de prueba -->
  <div class="mt-4">
    <button class="btn btn-primary me-2">Ver Gráfico</button>
    <div class="spinner-border text-success" role="status"></div>
  </div>
</div>

</body>
</html>