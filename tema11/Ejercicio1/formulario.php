<?php

require_once '../../vendor/autoload.php';

use FontLib\Table\Type\head;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellidos"];
    $edad = $_POST["edad"];
    $usuario = $_POST["usuario"];
    $pass = $_POST["pass"];
    $cpass = $_POST["cpass"];

    $errores = array();

    if (empty($nombre)) {
        $errores[] = "Error: El campo 'Nombre' no puede estar vacío.";
    }
    if (empty($apellido)) {
        $errores[] = "Error: El campo 'Apellidos' no puede estar vacío.";
    }
    if (empty($edad)) {
        $errores[] = "Error: El campo 'Edad' no puede estar vacío.";
    }
    if (empty($usuario)) {
        $errores[] = "Error: El campo 'Usuario' no puede estar vacío.";
    }
    if (empty($pass)) {
        $errores[] = "Error: El campo 'Contraseña' no puede estar vacío.";
    }
    if (empty($cpass)) {
        $errores[] = "Error: El campo 'Confirmar Contraseña' no puede estar vacío.";
    }

    if($pass !== $cpass){
        echo"<p style=\"color: red;\">Error las contraseñas no coinciden</p>";
        header("refresh:3;url=formulario.html");
        exit();
    }

    if (!empty($errores)) {
        echo '<h2 style="color: red;">Errores encontrados:</h2>';
        foreach ($errores as $error) {
            echo "<p style=\"color: red;\">$error</p>";
        }
        exit();
    }

    

    echo "<h2>Datos recibidos:</h2>";
    echo "<p><strong>Nombre:</strong> $nombre</p>";
    echo "<p><strong>Apellidos:</strong> $apellido</p>";
    echo "<p><strong>Edad:</strong> $edad</p>";
    echo "<p><strong>Usuario:</strong> $usuario</p>";
    echo "<p><strong>Contraseña:</strong> $pass</p>";
    echo "<p><strong>Confirmar Contraseña:</strong> $cpass</p>";
} else {
    header("Location: formulario.php");
    exit();
}
?>