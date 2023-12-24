<?php
require_once "../../vendor/autoload.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nombre"], $_POST["edad"], $_POST["email"], $_FILES["foto"])) {
    $nombre = $_POST["nombre"];
    $edad = $_POST["edad"];
    $email = $_POST["email"];
    
    // Validar y procesar la imagen
    $foto = $_FILES["foto"];
    if (isset($foto["name"]) && !empty($foto["name"])) {
        $nombreFoto = $foto["name"];
        $rutaFoto = "img/" . $nombreFoto;
        move_uploaded_file($foto["tmp_name"], $rutaFoto);
    } else {
        echo "Error: Debes seleccionar una foto.";
        exit;
    }

    // Guardar datos en el fichero
    $datosUsuario = "$nombre;$edad;$email;$rutaFoto\n";
    file_put_contents("usuarios.txt", $datosUsuario, FILE_APPEND);

    // Mostrar datos insertados
    echo "<h2>Datos Insertados:</h2>";
    echo "<p>Nombre: $nombre</p>";
    echo "<p>Edad: $edad</p>";
    echo "<p>Email: $email</p>";
    echo "<img src='$rutaFoto' alt='Foto de perfil'>";
} else {
    header("Location: formulario2.html");
}
?>

