<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Relación 2 - Ejercicio 3</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light d-flex flex-column min-vh-100">

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a class="navbar-brand fw-bold" href="#"><i class="bi bi-terminal-fill me-2"></i>Super-Index PHP</a>
      <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="menu">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link active" href="#">Inicio</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Cards -->
  <main class="container my-5 flex-grow-1">
    <h1 class="text-center mb-5 text-primary">Relaciones de Ejercicios PHP</h1>

    <div class="row g-4">

      <!-- Relación 1 -->
      <div class="col-md-6 col-lg-3">
        <div class="card shadow-sm h-100 border-0">
          <div class="card-body text-center">
            <i class="bi bi-code-square text-primary display-5 mb-3"></i>
            <h5 class="card-title text-primary">Relación 1</h5>
            <p class="card-text">Ejercicios introductorios de PHP: variables, arrays, clases y estructuras básicas.</p>
            <a href="./Relacion1/index.html" class="btn btn-primary w-100">Ir a Relación 1</a>
          </div>
        </div>
      </div>

      <!-- Relación 2 -->
      <div class="col-md-6 col-lg-3">
        <div class="card shadow-sm h-100 border-0">
          <div class="card-body text-center">
            <i class="bi bi-layout-text-sidebar-reverse text-success display-5 mb-3"></i>
            <h5 class="card-title text-success">Relación 2</h5>
            <p class="card-text">Formularios, condicionales, estructuras repetitivas y funciones personalizadas.</p>
            <a href="./Relacion2/index.html" class="btn btn-success w-100">Ir a Relación 2</a>
          </div>
        </div>
      </div>

      <!-- Relación 3 -->
      <div class="col-md-6 col-lg-3">
        <div class="card shadow-sm h-100 border-0">
          <div class="card-body text-center">
            <i class="bi bi-database-check text-danger display-5 mb-3"></i>
            <h5 class="card-title text-danger">Relación 3</h5>
            <p class="card-text">PHP con sesiones, cookies, manejo de formularios y persistencia de datos.</p>
            <a href="./Relacion3/index.html" class="btn btn-danger w-100">Ir a Relación 3</a>
          </div>
        </div>
      </div>

      <!-- Relación 4 -->
      <div class="col-md-6 col-lg-3">
        <div class="card shadow-sm h-100 border-0">
          <div class="card-body text-center">
            <i class="bi bi-table text-secondary display-5 mb-3"></i>
            <h5 class="card-title text-secondary">Relación 4</h5>
            <p class="card-text">Tablas de datos, conexión a bases de datos y visualización dinámica con PHP.</p>
            <a href="./Relacion4/index.html" class="btn btn-secondary w-100 text-white">Ir a Relación 4</a>
          </div>
        </div>
      </div>

    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-dark text-white text-center py-3 mt-auto">
    <p class="mb-0">
      Footer
    </p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>