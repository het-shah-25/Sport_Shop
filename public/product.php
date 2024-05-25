<?php
require_once '../includes/init.php';  // Ensure session_start() and DB connection are included here

// Get product ID from the query string
$productId = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Create database and product instances
$database = new Database();
$db = $database->getConnection();
$product = new Product($db);

// Fetch product details
$productDetails = $product->getProductById($productId);
if (!$productDetails) {
    echo "<p>Product not found.</p>";
    exit;
}

// Handle add to cart submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_to_cart'])) {
    if (!isset($_SESSION['user_id'])) {
        // Redirect to login page if user is not logged in
        $_SESSION['login_redirect'] = "product.php?id=$productId";
        header('Location: login.php');
        exit;
    }

    $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1; // Default to 1 if not specified
    if (isset($_SESSION['cart'][$productId])) {
        // Update quantity if already in cart
        $_SESSION['cart'][$productId]['quantity'] += $quantity;
    } else {
        // Add new item to the cart
        $_SESSION['cart'][$productId] = [
            'product_id' => $productId,
            'name' => $productDetails['name'],
            'price' => $productDetails['price'],
            'quantity' => $quantity
        ];
    }
    header('Location: cart.php');  // Redirect to cart page
    exit;
}

include '../templates/header.php';
?>

<main class="mx-auto max-w-4xl p-5">
    <div class="flex flex-col rounded-lg bg-white p-4 shadow-md sm:flex-row sm:p-8">
        <!-- Image Gallery for Main Product -->
        <div class="p-4 sm:w-1/2">
            <img src="<?= htmlspecialchars($productDetails['image_url']); ?>" alt="<?= htmlspecialchars($productDetails['name']); ?>" class="w-full rounded-lg" />
        </div>
        <!-- Main Product Info -->
        <div class="p-4 sm:w-1/2">
            <h1 class="text-xl font-bold text-gray-900"><?= htmlspecialchars($productDetails['name']); ?></h1>
            <p class="mt-2 text-gray-500">$<?= number_format($productDetails['price'], 2); ?></p>
            <p class="mt-4 text-gray-600"><?= htmlspecialchars($productDetails['description']); ?></p>
            <!-- Add to Cart Form -->
            <form action="product.php?id=<?= $productId ?>" method="POST">
                <input type="hidden" name="add_to_cart" value="1">
                <div class="mt-6">
                    <button type="submit" class="rounded bg-green-500 px-4 py-2 font-bold text-white hover:bg-green-600">Add to Cart</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Additional Products Section -->
    <div class="mt-8">
        <h2 class="text-lg font-bold text-gray-800">Related Products</h2>
        <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">
            <?php foreach ($product->getAdditionalProducts($productId) as $item): ?>
                <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition duration-300 p-4">
                    <a href="product.php?id=<?= htmlspecialchars($item['product_id']); ?>">
                        <img src="<?= htmlspecialchars($item['image_url']); ?>" alt="<?= htmlspecialchars($item['name']); ?>" class="w-full">
                        <h3 class="mt-2 text-gray-900 text-sm"><?= htmlspecialchars($item['name']); ?></h3>
                        <p class="text-gray-500">$<?= number_format($item['price'], 2); ?></p>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>

<?php include '../templates/footer.php'; ?>
