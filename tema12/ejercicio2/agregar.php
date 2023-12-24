<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_POST['id'])) {
    $product_id = $_POST['id'];
    $_SESSION['cart'][] = $product_id;
}


header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
