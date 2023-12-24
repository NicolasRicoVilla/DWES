<?php
session_start();
$productos = json_decode(file_get_contents('productos.json'), true);
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito Compra</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
    <h2>Carrito de Compras</h2>

    <div id="cart">
        <a href="carrito.php">Carrito (<?php echo count($_SESSION['cart']); ?>)</a>
    </div>

    <div id="cart-items">
        <?php
            foreach ($_SESSION['cart'] as $product_id) {

                $producto = $productos[$product_id];
                echo '<div class="cart-item">';
                echo '<h3>' . $producto['nombre'] . '</h3>';
                echo '<p>Precio: $' . $producto['precio'] . '</p>';
                echo '</div>';
            }
        ?>
    </div>

    <a href="despedida.php"><button>TERMINAR COMPRA</button></a>
</body>
</html>
