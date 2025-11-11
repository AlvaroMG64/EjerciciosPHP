<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Relación 4 - Ejercicio 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="playamar.png" type="image/x-icon">
</head>
<body class="bg-light">
    <div class="container-fluid w-75 py-5">
        <h1 class="text-center mb-4">Formulario de autenticación</h1>
        <?php
            function compruebaAcceso($id,$pass) { // Función que comprieba usuario conocido
                define("USUARIO_CORRECTO","Ali Baba");
                define("PASS_CORRECTA","Abrete sesamo");
                return ($id == USUARIO_CORRECTO && $pass == PASS_CORRECTA);
            }

            $idusuario = $_POST['idusuario']; // Descarga de datos de formulario $_POST
            $contrasena = $_POST['contrasena'];

            if (compruebaAcceso($idusuario,$contrasena)) {    // Si el usuario es correcto
                setcookie("usuario",$idusuario);           // se activa una cookie forever
                if (isset($_COOKIE['usuario'])) {                       // solo al recargar, se activa
                    echo "Te llamas" . $_COOKIE["usuario"];             // o al ir a otra de este sitio
                }
                $_SESSION['usuario'] = $idusuario;                                          // Se crea la varaible de sesión y está activa
                echo "Tú eres " . $_SESSION['usuario'] . " según tu variable de sesión";    // Hasta que se destruya
            } else {                                                                        // Y se queda almacenada en el SERVIDOR
                $_SESSION['errorLogin'] = true;
                header("Location: R4E01A.php");
            }
        ?>
    </div>
</body>
</html>