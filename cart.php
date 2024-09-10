<?php
session_start();
require 'products.php';

// Initialize cart if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shopping Cart</title>
</head>
<body>
    <h1>Your Cart</h1>
    <ul>
        <?php
        // Display cart items
        $total_price = 0;
        foreach ($_SESSION['cart'] as $item) {
            echo '<li>';
            echo $item['name'] . ' - ' . $item['price'] . ' PHP';
            $total_price += $item['price'];
            echo '</li>';
        }
        ?>
    </ul>
    <p><strong>Total Price: <?php echo $total_price; ?> PHP</strong></p>

    <a href="reset-cart.php">Clear my cart</a>
    <a href="place_order.php">Place the order</a>
</body>
</html>