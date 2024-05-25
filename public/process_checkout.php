<?php
require_once '../includes/init.php';

if (!isset($_SESSION['user_id']) || empty($_SESSION['cart'])) {
    header('Location: login.php'); // Redirect if not logged in or cart is empty
    exit;
}

$database = new Database();
$db = $database->getConnection();
$order = new Order($db);
$orderDetails = [
    'user_id' => $_SESSION['user_id'],
    'total' => array_sum(array_map(function ($item) { return $item['price'] * $item['quantity']; }, $_SESSION['cart'])),
    'cart' => $_SESSION['cart']
];
$orderId = $order->placeOrder($orderDetails);
try {
    if ($orderId) {
        $_SESSION['recent_order_id'] = $orderId;
        $_SESSION['cart'] = []; // Clear the cart after successful order placement
        header('Location: order_success.php'); // Redirect to a success page
        exit;
    } else {
        throw new Exception("Failed to place the order.");
    }
} catch (Exception $e) {
    error_log("Checkout error: " + $e->getMessage());
    echo "There was a problem processing your order. Please contact support. Detailed Error: " + $e->getMessage();
}
?>