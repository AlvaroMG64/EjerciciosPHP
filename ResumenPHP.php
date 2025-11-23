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

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>