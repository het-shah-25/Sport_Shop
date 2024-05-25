<?php
require_once '../includes/init.php';

// Handle both update and remove actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'update') {
        foreach ($_POST['quantity'] as $id => $quantity) {
            $quantity = (int) $quantity;
            if ($quantity > 0) {
                $_SESSION['cart'][$id]['quantity'] = $quantity;
            }
        }
    } elseif (isset($_POST['action']) && $_POST['action'] === 'remove') {
        $id = $_POST['id'];
        unset($_SESSION['cart'][$id]);
    }
    header('Location: cart.php'); // Prevent resubmission
    exit;
}

// Calculate total
$total = 0;
if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $id => $item) {
        $total += $item['price'] * $item['quantity'];
    }
} else {
    $message = "Your cart is empty.";
}

include '../templates/header.php';
?>

<main class="mx-auto max-w-4xl p-5">
    <div class="bg-white rounded-lg shadow-md p-4">
        <h1 class="text-xl font-bold text-gray-900 mb-4">Shopping Cart</h1>
        <?php if (!empty($message)): ?>
            <p class="text-center"><?= $message; ?></p>
        <?php else: ?>
        <form action="cart.php" method="post">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="py-3 px-6">Product</th>
                            <th scope="col" class="py-3 px-6">Price</th>
                            <th scope="col" class="py-3 px-6">Quantity</th>
                            <th scope="col" class="py-3 px-6">Total</th>
                            <th scope="col" class="py-3 px-6">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($_SESSION['cart'] as $id => $item): ?>
                        <tr class="bg-white border-b">
                            <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap"><?= htmlspecialchars($item['name']) ?></td>
                            <td class="py-4 px-6">$<?= number_format($item['price'], 2) ?></td>
                            <td class="py-4 px-6">
                                <input type="number" name="quantity[<?= $id ?>]" value="<?= $item['quantity'] ?>" min="1" class="quantity w-16 text-center bg-gray-100 rounded border" data-price="<?= $item['price'] ?>">
                            </td>
                            <td class="py-4 px-6" id="total-<?= $id ?>">$<?= number_format($item['price'] * $item['quantity'], 2) ?></td>
                            <td class="py-4 px-6 text-center">
                                <button type="submit" name="action" value="remove" formmethod="post">
                                    <input type="hidden" name="id" value="<?= $id ?>">
                                    Remove
                                </button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="mt-6 p-4 border-t border-gray-200">
                <button type="submit" name="action" value="update" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">Update Cart</button>
            </div>
        </form>
        <div class="flex justify-end mt-4">
            <a href="checkout.php" class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600">Proceed to Checkout</a>
        </div>
        <?php endif; ?>
    </div>
</main>
<script>
document.querySelectorAll('.quantity').forEach(input => {
    input.addEventListener('input', function() {
        const price = parseFloat(this.dataset.price);
        const quantity = parseInt(this.value);
        const total = price * quantity;
        document.getElementById('total-' + this.name.match(/\d+/)).textContent = '$' + total.toFixed(2);
        
        // Update the grand total
        let grandTotal = 0;
        document.querySelectorAll('[id^="total-"]').forEach(element => {
            grandTotal += parseFloat(element.textContent.substring(1));
        });
        document.getElementById('grand-total').textContent = '$' + grandTotal.toFixed(2);
    });
});
</script>
