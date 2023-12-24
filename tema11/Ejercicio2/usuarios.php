<?php
// Leer datos desde el fichero
$usuarios = file("usuarios.txt", FILE_IGNORE_NEW_LINES);

echo "<h2>Usuarios Insertados:</h2>";
echo "<ul>";
foreach ($usuarios as $usuario) {
    list($nombre, $edad, $email, $foto) = explode(";", $usuario);
    echo "<li>";
    echo "<p>Nombre: $nombre</p>";
    echo "<p>Edad: $edad</p>";
    echo "<p>Email: $email</p>";
    echo "<img src='$foto' alt='Foto de perfil'>";
    echo "</li>";
}
echo "</ul>";
?>
