<?php
require_once '../includes/init.php';

if (!isset($_SESSION['recent_order_id'])) {
    echo "No valid order information found. Please place an order.";
    exit;
}

$orderId = $_SESSION['recent_order_id'];
$database = new Database();
$db = $database->getConnection();
$order = new Order($db);
$orderDetails = $order->getOrderById($orderId);

if (!$orderDetails) {
    echo "Order details could not be retrieved.";
    exit;
}

// Accessing the necessary order details
$total = $orderDetails['total_amount'];
$status = $orderDetails['payment_status'];
include '../templates/header.php';
?>

<body class="bg-gray-100">
    <main class="max-w-4xl mx-auto p-8 bg-white rounded-lg shadow-md mt-10">
        <div class="text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <h1 class="text-2xl font-bold text-gray-900 mt-2">Order Confirmed!</h1>
            <p class="text-gray-600 mt-2">Thank you for your purchase. Your order has been confirmed and will be shipped soon.</p>
            <div class="mt-6">
                <p class="font-medium text-gray-900">Order Number: <span class="text-gray-600"><?= htmlspecialchars($orderId) ?></span></p>
                <p class="font-medium text-gray-900">Total: <span class="text-gray-600">$<?= number_format($total, 2) ?></span></p>
                <p class="font-medium text-gray-900">Status: <span class="text-gray-600"><?= htmlspecialchars($status) ?></span></p>
            </div>
            <div class="mt-6">
                <button onclick="downloadInvoice()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Download Invoice</button>
                <a href="shop.php" class="text-indigo-600 hover:text-indigo-800 font-medium">Continue Shopping</a>
            </div>
        </div>
    </main>

    <script>
        function downloadInvoice() {
            const invoiceText = `Order Number: ${<?= json_encode($orderId) ?>}\nTotal: $${<?= json_encode(number_format($total, 2)) ?>}\nStatus: ${<?= json_encode($status) ?>}`;
            const blob = new Blob([invoiceText], { type: 'text/plain' });
            const href = URL.createObjectURL(blob);
            const link = document.createElement('a');
            link.href = href;
            link.download = "Invoice_Order_<?= $orderId ?>.txt"; // Set the file name
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
            URL.revokeObjectURL(href); // Clean up the URL object
        }
    </script>
</html>
