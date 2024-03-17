<?php
session_start();
include('templete/db_connect.php');

if (isset($_POST['updateTotal'])) {
    $productId = $_POST['productId'];
    $quantity = $_POST['quantity'][$productId];

    // Update session cart data
    $_SESSION['cart'][$productId] = $quantity;

    // Redirect back to the page
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
}
?>
