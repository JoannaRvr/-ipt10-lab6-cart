<?php
session_start();
require "products.php";

// Add to cart logic
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id'])) {
    $product_id = intval($_POST['product_id']);
    
    // Check if the cart is initialized
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    
    // Check if the product is already in the cart
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]['quantity']++;
    } else {
        // Find product in the products array
        foreach ($products as $product) {
            if ($product['id'] == $product_id) {
                $_SESSION['cart'][$product_id] = $product;
                $_SESSION['cart'][$product_id]['quantity'] = 1;
                break;
            }
        }
    }
}

// Redirect to the cart page
header("Location: cart.php");
exit;

