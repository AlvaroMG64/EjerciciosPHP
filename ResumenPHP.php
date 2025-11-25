<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Resumen Completo de PHP</title>
<!-- Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body { padding: 20px; }
pre { background-color: #f8f9fa; padding: 10px; border-radius: 5px; }
code { color: #d63384; }
</style>
</head>
<body>
<div class="container">
<h1 class="mb-4">Resumen Completo de PHP</h1>

<!-- Índice -->
<nav class="mb-4">
<h4>Índice</h4>
<ul>
<li><a href="#superglobals">Superglobals</a></li>
<li><a href="#funciones">Funciones</a></li>
<li><a href="#arrays">Arrays y Funciones de Arrays</a></li>
<li><a href="#recursividad">Recursividad</a></li>
<li><a href="#poo">POO y Clases</a></li>
<li><a href="#formularios">Formularios y Validación</a></li>
</ul>
</nav>
<ul>
<li><a href="#poo-avanzado">POO Avanzada</a></li>
</ul>

<!-- Superglobals -->
<section id="superglobals" class="mb-5">
<h2>Superglobals</h2>
<p>Las superglobals son arrays predefinidos que contienen información global sobre el entorno, el servidor, el usuario y las solicitudes. Se pueden acceder desde cualquier parte del código.</p>
<ul>
<li><code>$_SERVER</code>: información del servidor y ejecución.</li>
<li><code>$_GET</code>: datos enviados por URL.</li>
<li><code>$_POST</code>: datos enviados por formulario POST.</li>
<li><code>$_REQUEST</code>: combinación de GET, POST y COOKIE.</li>
<li><code>$_COOKIE</code>: información de cookies del cliente.</li>
<li><code>$_FILES</code>: información de archivos subidos.</li>
<li><code>$_ENV</code>: variables de entorno.</li>
<li><code>$_GLOBALS</code>: acceso a todas las variables globales.</li>
</ul>
<pre><code>&lt;?php
// Ejemplo de $_SERVER
echo 'Documento raíz: ' . $_SERVER['DOCUMENT_ROOT'] . '&lt;br>';
echo 'Script: ' . $_SERVER['PHP_SELF'] . '&lt;br>';
echo 'Servidor: ' . $_SERVER['SERVER_NAME'] . '&lt;br>';
?&gt;</code></pre>
<p>Útil para depuración, routing y detección de entorno.</p>
</section>

<!-- Funciones -->
<section id="funciones" class="mb-5">
<h2>Funciones</h2>

<h4>Funciones de Strings</h4>
<p><strong>Ejemplos prácticos:</strong></p>
<pre><code>&lt;?php
$texto = " Hola Mundo ";
echo strlen($texto); // 12

echo trim($texto); // "Hola Mundo"

echo substr("Programacion", 0, 7); // "Programac"

echo str_replace("Mundo", "PHP", "Hola PHP"); // "Hola PHP"

echo strpos("Hola PHP", "PHP"); // 5
?&gt;</code></pre>
<ul>
<li><code>strlen($str)</code>: devuelve la longitud de la cadena.</li>
<li><code>strtolower($str)</code>, <code>strtoupper($str)</code>: cambia entre mayúsculas y minúsculas.</li>
<li><code>trim($str)</code>: elimina espacios al inicio y final.</li>
<li><code>substr($str, start, length)</code>: extrae subcadena.</li>
<li><code>str_replace($search, $replace, $subject)</code>: reemplaza texto.</li>
<li><code>strpos($haystack, $needle)</code>: posición de la primera aparición.</li>
<li><code>strcmp($str1, $str2)</code>: compara cadenas.</li>
<li><code>htmlspecialchars($str)</code>: previene inyección de HTML.</li>
<li><code>md5($str)</code>, <code>sha1($str)</code>: hashing simple.</li>
<li><code>nl2br($str)</code>: convierte saltos de línea en &lt;br&gt;.</li>
</ul>

<h4>Funciones Matemáticas</h4>
<p><strong>Ejemplos prácticos:</strong></p>
<pre><code>&lt;?php
echo abs(-10); // 10

echo round(3.14159, 2); // 3.14

echo pow(2, 8); // 256

echo rand(1, 100); // número aleatorio

echo max(1,5,3); // 5
?&gt;</code></pre>
<ul>
<li><code>abs($num)</code>: valor absoluto.</li>
<li><code>pow($x, $y)</code>: potencia.</li>
<li><code>sqrt($num)</code>: raíz cuadrada.</li>
<li><code>round($num, $dec)</code>: redondeo.</li>
<li><code>ceil($num)</code>, <code>floor($num)</code>: redondeo hacia arriba/abajo.</li>
<li><code>rand($min, $max)</code>: número aleatorio.</li>
<li><code>min(...$nums)</code>, <code>max(...$nums)</code>: mínimo y máximo.</li>
<li><code>pi()</code>, <code>sin()</code>, <code>cos()</code>, <code>tan()</code>: funciones trigonométricas.</li>
</ul>

<h4>Funciones de Fecha y Hora</h4>
<ul>
<li><code>date($format)</code>: fecha formateada.</li>
<li><code>time()</code>: timestamp actual.</li>
<li><code>mktime()</code>, <code>strtotime()</code>: crear/manipular fechas.</li>
</ul>

<h4>Funciones Anónimas y Callbacks</h4>
<pre><code>&lt;?php
$nums = [1,2,3,4,5];
$squares = array_map(function($n){ return $n*$n; }, $nums);
print_r($squares);
?&gt;</code></pre>
<p>Las funciones anónimas son útiles como callbacks para arrays y filtros.</p>
</section>

<!-- Arrays -->
<section id="arrays" class="mb-5">
<h2>Arrays y Funciones de Arrays</h2>
<p><strong>Ejemplos prácticos:</strong></p>
<pre><code>&lt;?php
$frutas = ["Manzana", "Pera", "Naranja"];

array_push($frutas, "Kiwi");
print_r($frutas); // Añade Kiwi al final

array_pop($frutas);
print_r($frutas); // Elimina el último elemento

$nums = [10, 20, 30, 40];
$sub = array_slice($nums, 1, 2);
print_r($sub); // [20, 30]

$mezcla = array_merge([1,2], [3,4]);
print_r($mezcla); // [1,2,3,4]

$ordenado = [3,1,4,2];
sort($ordenado);
print_r($ordenado); // [1,2,3,4]
?&gt;</code></pre>
<p>Los arrays pueden ser indexados o asociativos. PHP ofrece muchas funciones útiles:</p>
<ul>
<li><code>count($array)</code>: número de elementos.</li>
<li><code>array_push($array, $value)</code>: añade al final.</li>
<li><code>array_pop($array)</code>: elimina último elemento.</li>
<li><code>array_shift($array)</code>, <code>array_unshift($array, $value)</code>: eliminar o añadir al inicio.</li>
<li><code>array_merge($arr1, $arr2)</code>: fusiona arrays.</li>
<li><code>array_slice($array, start, length)</code>: subarray.</li>
<li><code>array_splice($array, start, length, $replacement)</code>: reemplazo parcial.</li>
<li><code>array_reverse($array)</code>: invierte array.</li>
<li><code>array_unique($array)</code>: elimina duplicados.</li>
<li><code>array_search($value, $array)</code>: posición del valor.</li>
<li><code>array_keys($array)</code>, <code>array_values($array)</code>: claves y valores.</li>
<li><code>array_map($callback, $array)</code>, <code>array_filter($array, $callback)</code>, <code>array_reduce($array, $callback, $initial)</code>: manipulación avanzada.</li>
<li><code>sort($array)</code>, <code>rsort($array)</code>, <code>asort($array)</code>, <code>arsort($array)</code>: ordenar arrays.</li>
</ul>

<h4>Ejemplo avanzado con array_map y array_filter</h4>
<pre><code>&lt;?php
$nums = [1,2,3,4,5,6];
$pares = array_filter($nums, fn($n) =&gt; $n % 2 === 0);
$dobles = array_map(fn($n) =&gt; $n*2, $pares);
print_r($dobles);
?&gt;</code></pre>
</section>

<!-- Recursividad -->
<section id="recursividad" class="mb-5">
<h2>Recursividad</h2>
<p>Una función recursiva se llama a sí misma. Útil para factorial, Fibonacci, búsqueda en estructuras de datos.</p>
<pre><code>&lt;?php
// Factorial
function factorial($n){
    if($n &lt;= 1) return 1;
    return $n * factorial($n-1);
}

// Fibonacci
function fibonacci($n){
    if($n==0) return 0;
    if($n==1) return 1;
    return fibonacci($n-1)+fibonacci($n-2);
}

// Buscar en array multidimensional
function buscar($arr, $valor){
    foreach($arr as $v){
        if(is_array($v)){
            if(buscar($v,$valor)) return true;
        } elseif($v==$valor){
            return true;
        }
    }
    return false;
}
?&gt;</code></pre>
</section>

<!-- POO -->
<section id="poo" class="mb-5">
<h2>Programación Orientada a Objetos (POO)</h2>
<p>Encapsula datos y métodos en clases y objetos.</p>

<h4>Clase básica con métodos</h4>
<pre><code>&lt;?php
class Fruta {
    private string $nombre;
    private string $color;

    public function __construct(string $nombre, string $color){
        $this-&gt;nombre = $nombre;
        $this-&gt;color = $color;
    }

    public function getNombre(): string { return $this-&gt;nombre; }
    public function setNombre(string $nombre){ $this-&gt;nombre = $nombre; }
}

$manzana = new Fruta("Manzana","Roja");
echo $manzana-&gt;getNombre();
?&gt;</code></pre>

<h4>Herencia y Polimorfismo</h4>
<pre><code>&lt;?php
class Animal {
    public function hablar(){ echo "Sonido genérico"; }
}
class Perro extends Animal {
    public function hablar(){ echo "Guau"; }
}
$miPerro = new Perro();
$miPerro-&gt;hablar(); // Guau
?&gt;</code></pre>

<h4>Interfaces y Traits</h4>
<pre><code>&lt;?php
interface Volador {
    public function volar();
}
trait Nombre {
    public $nombre;
    public function mostrarNombre(){ echo $this-&gt;nombre; }
}
class Pajaro implements Volador {
    use Nombre;
    public function volar(){ echo "Estoy volando"; }
}
?&gt;</code></pre>

<h4>Métodos y propiedades estáticas</h4>
<pre><code>&lt;?php
class Contador {
    public static $cuenta = 0;
    public static function incrementar(){ self::$cuenta++; }
}
Contador::incrementar();
echo Contador::$cuenta;
?&gt;</code></pre>
</section>

<!-- Formularios -->
<section id="formularios" class="mb-5">
<h2>Formularios y Validación</h2>
<p>Se usan para recoger datos del usuario. Se reciben con <code>$_GET</code> o <code>$_POST</code>.</p>

<h4>Formulario con validación</h4>
<pre><code>&lt;form method="post"&gt;
    &lt;label&gt;Nombre:&lt;/label&gt;
    &lt;input type="text" name="nombre" required pattern="[A-Za-z ]{2,50}"&gt;
    &lt;input type="submit" value="Enviar"&gt;
&lt;/form&gt;

&lt;?php
if(isset($_POST['nombre'])){
    $nombre = htmlspecialchars($_POST['nombre']);
    if(preg_match("/^[A-Za-z ]{2,50}$/", $nombre)){
        echo "Nombre válido: $nombre";
    } else {
        echo "Nombre inválido";
    }
}
?&gt;</code></pre>
</section>

<!-- Contenidos adicionales: Learn-php.org -->


<section id="variables-tipos" class="mb-5">
<h2>Variables y Tipos</h2>
<p>PHP es débilmente tipado pero permite declarar y usar distintos tipos.</p>
<pre><code>&lt;?php
$entero = 10;
$decimal = 3.14;
$texto = "PHP";
$bool = true;

var_dump($entero, $decimal, $texto, $bool);
?&gt;</code></pre>
</section>

<section id="simple-arrays" class="mb-5">
<h2>Simple Arrays</h2>
<p>Arrays indexados numéricamente.</p>
<pre><code>&lt;?php
$colores = ["Rojo", "Verde", "Azul"];
echo $colores[1]; // Verde
?&gt;</code></pre>
</section>

<section id="arrays-keys" class="mb-5">
<h2>Arrays con claves</h2>
<p>Arrays asociativos con pares clave-&gt;valor.</p>
<pre><code>&lt;?php
$persona = ["nombre" =&gt; "Juan", "edad" =&gt; 25];
echo $persona["edad"]; // 25
?&gt;</code></pre>
</section>

<section id="multidimensional" class="mb-5">
<h2>Arrays Multidimensionales</h2>
<p>Un array que contiene otros arrays.</p>
<pre><code>&lt;?php
$clases = [
    "A" =&gt; ["Ana", "Luis"],
    "B" =&gt; ["Marta", "Pablo"]
];
echo $clases["B"][1]; // Pablo
?&gt;</code></pre>
</section>

<section id="switch-match" class="mb-5">
<h2>Switch y Match</h2>
<p>PHP ofrece dos estructuras de control para comparar un valor contra múltiples casos: <code>switch</code> y <code>match</code>. Aunque se parecen, funcionan de forma distinta.</p>

<h3>Switch</h3>
<p>Evalúa una expresión y ejecuta el bloque del primer <code>case</code> coincidente. Usa <code>break</code> para evitar que continúen los siguientes casos.</p>
<pre><code>&lt;?php
$color = "rojo";

switch($color){
    case "rojo":
        echo "El color es rojo";
        break;
    case "azul":
        echo "El color es azul";
        break;
    default:
        echo "Color desconocido";
}
?&gt;</code></pre>

<h4>Características</h4>
<ul>
<li>Permite ejecutar bloques de código.</li>
<li>No devuelve un valor por sí mismo.</li>
<li>Puede usar comparaciones flexibles (==).</li>
<li>Requiere <code>break</code>.</li>
</ul>

<h3>Match (PHP 8+)</h3>
<p>Es una expresión que <strong>devuelve un valor</strong> y usa comparaciones estrictas (<code>===</code>).</p>
<pre><code>&lt;?php
$color = "rojo";

$resultado = match($color){
    "rojo" =&gt; "El color es rojo",
    "azul" =&gt; "El color es azul",
    default =&gt; "Color desconocido"
};

echo $resultado;
?&gt;</code></pre>

<h4>Características</h4>
<ul>
<li>Devuelve un valor (ideal para asignaciones).</li>
<li>No necesita <code>break</code>.</li>
<li>Comparación estricta (<code>===</code>).</li>
<li>Más seguro y menos propenso a errores.</li>
</ul>

<h3>Diferencias principales</h3>
<table class="table table-bordered table-striped">
<thead>
<tr><th>Switch</th><th>Match</th></tr>
</thead>
<tbody>
<tr><td>Comparación flexible (==)</td><td>Comparación estricta (===)</td></tr>
<tr><td>Ejecuta bloques de código</td><td>Devuelve un valor</td></tr>
<tr><td>Necesita break</td><td>No necesita break</td></tr>
<tr><td>Puede producir errores por caída (fall-through)</td><td>No hay fall-through</td></tr>
</tbody>
</table>

<h3>Cuándo usar cada uno</h3>
<ul>
<li><strong>Usa switch</strong> cuando necesites ejecutar bloques de código (echo, funciones, lógica compleja).</li>
<li><strong>Usa match</strong> cuando necesites devolver un valor limpio, seguro y sin ambigüedades.</li>
</ul>
</section>

<section id="loops" class="mb-5">
<h2>Bucles</h2>

<h4>For</h4>
<pre><code>&lt;?php
for($i = 1; $i &lt;= 5; $i++){
    echo $i . " ";
}
?&gt;</code></pre>

<h4>While</h4>
<pre><code>&lt;?php
$i = 1;
while($i &lt;= 5){
    echo $i . " ";
    $i++;
}
?&gt;</code></pre>

<h4>Foreach (muy importante)</h4>
<pre><code>&lt;?php
$frutas = ["Manzana", "Pera", "Uva"];
foreach($frutas as $f){
    echo $f . " ";
}

$persona = ["nombre" =&gt; "Sara", "edad" =&gt; 20];
foreach($persona as $clave =&gt; $valor){
    echo "$clave: $valor ";
}
?&gt;</code></pre>
</section>

<section id="tabla-bucles" class="mb-5">
<h2>Tabla Comparativa de Bucles</h2>
<p>Comparación rápida entre los distintos tipos de bucles y su uso recomendado.</p>
<table class="table table-bordered table-striped">
<thead>
<tr>
<th>Bucle</th>
<th>Cuándo usarlo</th>
<th>Ventajas</th>
<th>Desventajas</th>
</tr>
</thead>
<tbody>
<tr>
<td><strong>for</strong></td>
<td>Cuando conoces el número exacto de iteraciones.</td>
<td>Control total sobre índice y avance.</td>
<td>Menos intuitivo para arrays asociativos.</td>
</tr>
<tr>
<td><strong>while</strong></td>
<td>Cuando no sabes cuántas iteraciones serán necesarias.</td>
<td>Ideal para bucles dependientes de condiciones dinámicas.</td>
<td>Puedes crear bucles infinitos si olvidas actualizar la condición.</td>
</tr>
<tr>
<td><strong>foreach</strong></td>
<td>Cuando recorres arrays, especialmente asociativos.</td>
<td>Muy fácil de leer, no requiere manejar índices.</td>
<td>No permite modificar directamente el array original salvo con referencias (&amp;).</td>
</tr>
</tbody>
</table>

<h4>Importancia de foreach</h4>
<p><code>foreach</code> es el bucle más importante para trabajar con arrays en PHP, ya que permite leer fácilmente valores y claves sin preocuparse por el índice numérico.</p>

<pre><code>&lt;?php
$persona = ["nombre" =&gt; "Lucía", "edad" =&gt; 22];
foreach($persona as $clave =&gt; $valor){
    echo "$clave: $valor ";
}
?&gt;</code></pre>

<h4>Modificar un array dentro de foreach</h4>
<pre><code>&lt;?php
$nums = [1,2,3];
foreach($nums as &amp;$n){
    $n *= 2;
}
print_r($nums); // [2,4,6]
?&gt;</code></pre>

<h4>Errores comunes con foreach</h4>
<ul>
<li>No usar referencia (&amp;) cuando quieres modificar el array.</li>
<li>Usar foreach en objetos sin implementar Iterator (antes de PHP 8).</li>
<li>Modificar el array dentro del foreach de forma insegura.</li>
</ul>
</section>

<section id="functions-extra" class="mb-5">
<h2>Funciones (aplicación de learn-php.org)</h2>
<pre><code>&lt;?php
function sumar($a, $b){ return $a + $b; }
echo sumar(3,4); // 7

function saludar($nombre="Invitado"){ echo "Hola $nombre"; }
saludar();
?&gt;</code></pre>
</section>

<section id="exceptions" class="mb-5">
<h2>Excepciones</h2>
<p>Permiten manejar errores mediante bloques try/catch.</p>
<pre><code>&lt;?php
try{
    if(!file_exists("archivo.txt")){
        throw new Exception("Archivo no encontrado");
    }
} catch(Exception $e){
    echo "Error: " . $e-&gt;getMessage();
}
?&gt;</code></pre>
</section>

<!-- Bootstrap Componentes Básicos -->
<section id="bootstrap" class="mb-5">
<h2>Componentes Básicos de Bootstrap</h2>
<p>Bootstrap incluye componentes que pueden aparecer en ejercicios o exámenes. Aquí tienes los más comunes:</p>

<h4>Botones</h4>
<pre><code>&lt;button class="btn btn-primary"&gt;Botón Primario&lt;/button&gt;
&lt;button class="btn btn-success"&gt;Botón Éxito&lt;/button&gt;
&lt;button class="btn btn-danger"&gt;Botón Peligro&lt;/button&gt;</code></pre>

<h4>Barras de progreso</h4>
<pre><code>&lt;div class="progress"&gt;
  &lt;div class="progress-bar" role="progressbar" style="width: 50%"&gt;50%&lt;/div&gt;
&lt;/div&gt;</code></pre>

<h4>Spinners</h4>
<pre><code>&lt;div class="spinner-border" role="status"&gt;
  &lt;span class="visually-hidden"&gt;Loading...&lt;/span&gt;
&lt;/div&gt;</code></pre>

<h4>Alerts</h4>
<pre><code>&lt;div class="alert alert-warning"&gt;
  Esto es una alerta de advertencia
&lt;/div&gt;</code></pre>

<h4>Cards</h4>
<pre><code>&lt;div class="card" style="width: 18rem;"&gt;
  &lt;div class="card-body"&gt;
    &lt;h5 class="card-title"&gt;Título de la tarjeta&lt;/h5&gt;
    &lt;p class="card-text"&gt;Texto dentro de la tarjeta&lt;/p&gt;
  &lt;/div&gt;
&lt;/div&gt;</code></pre>

<h4>Accordion</h4>
<pre><code>&lt;div class="accordion" id="acordeon"&gt;
  &lt;div class="accordion-item"&gt;
    &lt;h2 class="accordion-header"&gt;
      &lt;button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#col1"&gt;
        Sección 1
      &lt;/button&gt;
    &lt;/h2&gt;
    &lt;div id="col1" class="accordion-collapse collapse" data-bs-parent="#acordeon"&gt;
      &lt;div class="accordion-body"&gt;Contenido 1&lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;</code></pre>

<h4>Grid básico</h4>
<pre><code>&lt;div class="row"&gt;
  &lt;div class="col-4 bg-light"&gt;Columna 1&lt;/div&gt;
  &lt;div class="col-4 bg-secondary text-white"&gt;Columna 2&lt;/div&gt;
  &lt;div class="col-4 bg-light"&gt;Columna 3&lt;/div&gt;
&lt;/div&gt;</code></pre>
</section>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<section id="regex-js" class="mb-5">
<h2>Expresiones Regulares en JavaScript</h2>
<p>Las RegEx permiten validar y buscar patrones en texto.</p>

<h3>Sintaxis básica</h3>
<pre><code>const regex = /patron/;
regex.test("texto");</code></pre>

<h3>Validar email</h3>
<pre><code>const email = "test@mail.com";
const re = /^[^@\s]+@[^@\s]+\.[^@\s]+$/;
console.log(re.test(email));</code></pre>

<h3>Validar números</h3>
<pre><code>const reNum = /^\d+$/;
console.log(reNum.test("1234"));</code></pre>

<h3>Buscar palabra</h3>
<pre><code>const re = /hola/i;
console.log(re.test("Hola mundo"));</code></pre>

<h3>Errores comunes</h3>
<ul>
<li>No escapar correctamente los caracteres especiales.</li>
<li>No usar flags (g, i, m) cuando son necesarios.</li>
<li>Crear patrones demasiado permisivos.</li>
</ul>
</section>

<section id="poo-avanzado" class="mb-5">
<h2>POO Avanzada: Herencia, Abstracción, Interfaces y Polimorfismo</h2>
<p>PHP permite una programación orientada a objetos completa. Aquí ampliamos los conceptos clave y añadimos patrones y ejemplos inspirados en Aulab Academy: <strong>self, parent, static counter, autoload</strong>, y buenas prácticas.</p>

<h3>Visibilidad (recordatorio)</h3>
<ul>
<li><strong>public</strong>: accesible desde cualquier parte.</li>
<li><strong>protected</strong>: accesible desde la propia clase y clases hijas.</li>
<li><strong>private</strong>: accesible solo dentro de la misma clase.</li>
</ul>

<h3>Constructores y destructores</h3>
<pre><code>&lt;?php
class Recurso {
    public function __construct(){
        // inicialización
        echo "Inicializando
";
    }
    public function __destruct(){
        // limpieza
        echo "Destruyendo
";
    }
}
$r = new Recurso();
?&gt;</code></pre>

<h3>Propiedades y métodos estáticos — <code>self::</code> y contador (self counter)</h3>
<p>Las propiedades <code>static</code> pertenecen a la clase en sí, no a instancias. Aulab explica el patrón de contador estático para llevar el número de instancias creadas.</p>
<pre><code>&lt;?php
class ContadorAulab {
    private static int $instancias = 0; // contador de instancias
    private string $nombre;

    public function __construct(string $nombre){
        $this-&gt;nombre = $nombre;
        self::$instancias++; // aumentar contador
    }

    public static function totalInstancias(): int {
        return self::$instancias;
    }
}
$a = new ContadorAulab('uno');
$b = new ContadorAulab('dos');
echo ContadorAulab::totalInstancias(); // 2
?&gt;</code></pre>
<p>Use <code>self::</code> para acceder a miembros estáticos desde dentro de la clase, y <code>ClassName::</code> desde fuera.</p>

<h3>Clases abstractas</h3>
<p>Una clase abstracta define un contrato parcial: puede declarar métodos abstractos que las subclases deben implementar.</p>
<pre><code>&lt;?php
abstract class Figura {
    abstract public function area(): float;
    public function descripcion(): string { return 'Figura geométrica'; }
}
class Rectangulo extends Figura {
    private float $w, $h;
    public function __construct(float $w, float $h){ $this->w=$w; $this->h=$h; }
    public function area(): float { return $this->w * $this->h; }
}
$r = new Rectangulo(3,4);
echo $r->area(); // 12
?&gt;</code></pre>

<h3>Interfaces</h3>
<p>Una interface es un contrato puro: las clases que la implementan deben definir todos los métodos.</p>
<pre><code>&lt;?php
interface Vehiculo {
    public function arrancar(): void;
    public function detener(): void;
}
class Moto implements Vehiculo {
    public function arrancar(): void { echo "Moto arrancada
"; }
    public function detener(): void { echo "Moto parada
"; }
}
?&gt;</code></pre>

<h3>Polimorfismo</h3>
<p>Se refiere a usar una interfaz o clase base para tratar objetos de diferentes clases de forma uniforme.</p>
<pre><code>&lt;?php
class Animal { public function sonido(){ echo "...
"; }}
class Perro extends Animal { public function sonido(){ echo "Guau
"; }}
class Gato extends Animal { public function sonido(){ echo "Miau
"; }}

function emitirSonido(Animal $a){ $a->sonido(); }
emitirSonido(new Perro());
emitirSonido(new Gato());
?&gt;</code></pre>

<h3>Uso de <code>parent::</code></h3>
<p>Permite invocar la implementación del método en la clase padre.</p>
<pre><code>&lt;?php
class Padre {
    protected function saludar(){ echo "Hola desde padre
"; }
}
class Hijo extends Padre {
    protected function saludar(){
        parent::saludar(); // llama al padre
        echo "y desde hijo
";
    }
    public function trigger(){ $this->saludar(); }
}
$h = new Hijo(); $h->trigger();
?&gt;</code></pre>

<h3>Traits para simular herencia múltiple</h3>
<pre><code>&lt;?php
trait Logger { public function log(string $msg){ echo "Log: $msg
"; }}
trait Tiempo { public function ahora(){ echo date('H:i:s') . "
"; }}
class Sistema { use Logger, Tiempo; }
$s = new Sistema(); $s->log('inicio'); $s->ahora();
?&gt;</code></pre>

<h3>Autoload — carga automática de clases</h3>
<p>Evita requires manuales; útil en proyectos medianos. Ejemplo con <code>spl_autoload_register</code>:</p>
<pre><code>&lt;?php
spl_autoload_register(function($class){
    $file = __DIR__ . '/src/' . $class . '.php';
    if(file_exists($file)) require $file;
});
// Ahora basta con instanciar nuevas clases y PHP las cargará desde src/
?&gt;</code></pre>

<h3>Buenas prácticas y consejos</h3>
<ul>
<li>Usar tipado de parámetros y valores de retorno cuando sea posible.</li>
<li>Preferir composición sobre herencia cuando tenga sentido.</li>
<li>Evitar propiedades públicas; usar getters/setters para validación.</li>
<li>Usar <code>final</code> para métodos que no deben sobreescribirse.</li>
</ul>
</section>

<section id="isset-empty" class="mb-5">
    <h2>isset() y empty()</h2>
    <p>Las funciones <code>isset()</code> y <code>empty()</code> son fundamentales para la validación de variables en PHP.</p>

    <h4>isset()</h4>
    <p><code>isset()</code> determina si una variable está definida y no es <code>null</code>. Si la variable no ha sido inicializada o tiene el valor <code>null</code>, <code>isset()</code> devolverá <code>false</code>.</p>
    <pre><code>&lt;?php
    $a = "Hola";
    if (isset($a)) {
        echo "La variable \$a está definida y no es null.";
    } else {
        echo "La variable \$a no está definida o es null.";
    }
    ?&gt;</code></pre>
    <ul>
        <li><code>isset($variable)</code>: Devuelve <code>true</code> si la variable está definida y no es <code>null</code>.</li>
        <li><code>isset()</code> devuelve <code>false</code> si la variable es <code>null</code> o no está definida.</li>
    </ul>

    <h4>empty()</h4>
    <p><code>empty()</code> verifica si una variable está vacía. Una variable se considera vacía si no está definida, tiene un valor de <code>null</code>, una cadena vacía <code>""</code>, el valor entero <code>0</code>, un array vacío, entre otros.</p>
    <pre><code>&lt;?php
    $b = "";
    if (empty($b)) {
        echo "La variable \$b está vacía.";
    } else {
        echo "La variable \$b tiene un valor.";
    }
    ?&gt;</code></pre>
    <ul>
        <li><code>empty($variable)</code>: Devuelve <code>true</code> si la variable es vacía.</li>
        <li><code>empty()</code> devuelve <code>false</code> si la variable contiene un valor distinto a los valores vacíos mencionados.</li>
    </ul>

    <h4>Diferencias clave entre <code>isset()</code> y <code>empty()</code></h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Función</th>
                <th>Qué verifica</th>
                <th>Valor de retorno cuando la variable es vacía</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><code>isset()</code></td>
                <td>Verifica si la variable está definida y no es <code>null</code>.</td>
                <td><code>false</code> si es <code>null</code> o no está definida.</td>
            </tr>
            <tr>
                <td><code>empty()</code></td>
                <td>Verifica si la variable tiene un valor vacío (null, "", 0, "0", false, array vacío).</td>
                <td><code>true</code> si está vacía (ver lista de valores vacíos).</td>
            </tr>
        </tbody>
    </table>
</section>
</body>
</html>