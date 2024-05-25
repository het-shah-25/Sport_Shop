<?php include '../templates/header.php';?>
<body class="bg-gray-100">
    <main class="max-w-6xl mx-auto p-8 bg-white rounded-lg shadow-md mt-10">
        <div class="flex flex-col md:flex-row">
            <div class="md:w-2/3 p-4">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Your Cart</h2>
                <?php
                require_once '../includes/init.php';

                $total = 0;
                if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
                    echo "<p>Your cart is empty.</p>";
                } else {
                    echo '<div class="space-y-4">';
                    foreach ($_SESSION['cart'] as $id => $item) {
                        $subtotal = $item['price'] * $item['quantity'];
                        $total += $subtotal;
                        echo "<div class='flex justify-between items-center'>
                            <div class='text-sm font-medium text-gray-700'>" . htmlspecialchars($item['name']) . "</div>
                            <div class='text-sm text-gray-600'>Qty: " . htmlspecialchars($item['quantity']) . "</div>
                            <div class='text-sm font-bold text-gray-900'>\$" . number_format($subtotal, 2) . "</div>
                        </div>";
                    }
                    echo '</div>';
                }
                ?>
                <div class="pt-4 border-t mt-4">
                    <div class="flex justify-between font-bold text-gray-900 text-xl">
                        <span>Total</span>
                        <span>$<?= number_format($total, 2); ?></span>
                    </div>
                </div>
            </div>
            <div class="md:w-1/3 p-4 bg-gray-50 rounded-lg md:ml-4">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Checkout</h2>
                <form action="process_checkout.php" method="post">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                        <input type="text" id="name" name="name" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="John Doe">
                    </div>
                    <div class="mt-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                        <input type="email" id="email" name="email" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="johndoe@example.com">
                    </div>
                    <div class="mt-4">
                        <label for="address" class="block text-sm font-medium text-gray-700">Shipping Address</label>
                        <input type="text" id="address" name="address" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="1234 Street, City, Country">
                    </div>
                    <div class="mt-4">
                        <label for="payment" class="block text-sm font-medium text-gray-700">Payment Method</label>
                        <select id="payment" name="payment" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="credit_card">Credit Card</option>
                            <option value="paypal">PayPal</option>
                            <option value="bank_transfer">Bank Transfer</option>
                        </select>
                    </div>
                    <div class="mt-6">
                        <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Place Order
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
