<?php
session_start();
unset($_SESSION['cart']); // Vaciar el carrito

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agradecimiento por la Compra</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
    <h2>¡Gracias por tu compra!</h2>
    <p>Tu pedido ha sido procesado. ¡Esperamos verte pronto!</p>
</body>
</html>
