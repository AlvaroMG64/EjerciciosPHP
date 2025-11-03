<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Relación 2 - Ejercicio 2</title>
  <!-- Bootstrap 5 CDN -->
  <link 
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
    crossorigin="anonymous"
  >
</head>
<body class="bg-light d-flex flex-column min-vh-100">

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
      <a class="navbar-brand fw-bold" href="#">Relación 1 - PHP</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link active" href="#">Inicio</a></li>
          <li class="nav-item"><a class="nav-link" href="../super-index.html">Super-Index</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Contenido principal -->
  <main class="container my-5 flex-grow-1">
    <h1 class="text-center mb-4 text-primary">Relación 1 de Ejercicios PHP</h1>

    <div class="list-group shadow-sm">
      <a href="./Relacion1/R1E01.php" class="list-group-item list-group-item-action">
        <strong>Ejercicio 1:</strong> Mostrar "Hello world" de varias formas
      </a>
      <a href="./Relacion1/R1E02.php" class="list-group-item list-group-item-action">
        <strong>Ejercicio 2:</strong> Tipos de datos escalares con var_dump y printf
      </a>
      <a href="./Relacion1/R1E03.php" class="list-group-item list-group-item-action">
        <strong>Ejercicio 3:</strong> Superglobal $_SERVER y volcado de datos
      </a>
      <a href="./Relacion1/R1E04.php" class="list-group-item list-group-item-action">
        <strong>Ejercicio 4:</strong> Array de días de la semana
      </a>
      <a href="./Relacion1/R1E05.php" class="list-group-item list-group-item-action">
        <strong>Ejercicio 5:</strong> Array asociativo con temperaturas
      </a>
      <a href="./Relacion1/R1E06.php" class="list-group-item list-group-item-action">
        <strong>Ejercicio 6:</strong> Clase Fruta con atributos y métodos
      </a>
      <a href="./Relacion1/R1E07.php" class="list-group-item list-group-item-action">
        <strong>Ejercicio 7:</strong> Nota final con descuento por faltas
      </a>
      <a href="./Relacion1/R1E08.php" class="list-group-item list-group-item-action">
        <strong>Ejercicio 8:</strong> Nota final ponderada con arrays asociativos
      </a>
      <a href="./Relacion1/R1E09.php" class="list-group-item list-group-item-action">
        <strong>Ejercicio 9:</strong> Clasificación de triángulos
      </a>
      <a href="./Relacion1/R1E10.php" class="list-group-item list-group-item-action">
        <strong>Ejercicio 10:</strong> Resolución de ecuación de segundo grado
      </a>
      <a href="./Relacion1/R1E11.php" class="list-group-item list-group-item-action">
        <strong>Ejercicio 11:</strong> Ecuaciones con coeficientes cero
      </a>
      <a href="./Relacion1/R1E12.php" class="list-group-item list-group-item-action">
        <strong>Ejercicio 12:</strong> Nota numérica a calificación cualitativa
      </a>
      <a href="./Relacion1/R1E13.php" class="list-group-item list-group-item-action">
        <strong>Ejercicio 13:</strong> Factorial de un número natural
      </a>
      <a href="./Relacion1/R1E14.php" class="list-group-item list-group-item-action">
        <strong>Ejercicio 14:</strong> Suma de los primeros números naturales
      </a>
      <a href="./Relacion1/R1E15.php" class="list-group-item list-group-item-action">
        <strong>Ejercicio 15:</strong> Comprobar si un número es primo
      </a>
      <a href="./Relacion1/R1E16.php" class="list-group-item list-group-item-action">
        <strong>Ejercicio 16:</strong> Mostrar todos los divisores de un número
      </a>
      <a href="./Relacion1/R1E17.php" class="list-group-item list-group-item-action">
        <strong>Ejercicio 17:</strong> División con algoritmo de Euclides
      </a>
      <a href="./Relacion1/R1E18.php" class="list-group-item list-group-item-action">
        <strong>Ejercicio 18:</strong> Máximo común divisor con Euclides
      </a>
      <a href="./Relacion1/R1E19.php" class="list-group-item list-group-item-action">
        <strong>Ejercicio 19:</strong> Convertir decimal a binario
      </a>
      <a href="./Relacion1/R1E20.php" class="list-group-item list-group-item-action">
        <strong>Ejercicio 20:</strong> Convertir decimal a base 2, 8 o 16
      </a>
    </div>

    <!-- Ejemplo de componentes extra -->
    <div class="mt-5">
      <h5>Componentes de prueba:</h5>
      <button class="btn btn-success me-2">Botón Éxito</button>
      <button class="btn btn-outline-primary">Botón Primario</button>
      <div class="spinner-border text-primary ms-3" role="status"></div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-dark text-white text-center py-3 mt-auto">
    <p class="mb-0">
      Footer
    </p>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-qo+N8vhO3ZcE5V9T6Oa1xjEhHlp2wo5TbG9p3U+J8E5JtWJpC8+7lRrcloU/TL7S"
          crossorigin="anonymous"></script>
</body>
</html>