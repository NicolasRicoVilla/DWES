<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
    <div id="cart">
        <a href="carrito.php">Carrito</a>
    </div>

    <div id="product-list">
        <?php
            $productos = json_decode(file_get_contents('productos.json'), true);

            foreach ($productos as $producto) {
                echo '<div class="product">';
                echo '<h3>' . $producto['nombre'] . '</h3>';
                echo '<p>Precio: €' . $producto['precio'] . '</p>';
                echo '<form action="agregar.php" method="post">';
                echo '<input type="hidden" name="id" value="' . $producto['id'] . '">';
                echo '<input type="submit" value="COMPRAR">';
                echo '</form>';
                echo '</div>';
            }
        ?>
    </div>
</body>
</html>