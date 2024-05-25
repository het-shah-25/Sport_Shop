<?php 
require_once '../includes/init.php';

$product = new Product($pdo);
$products = $product->getAllProducts();

include '../templates/header.php';
?>
<section class="mt-12 mb-12">
    <div class="text-center">
        <h2 class="text-2xl font-bold text-gray-800 mb-6" style="font-family: 'Poppins', sans-serif">
            Featured Products
        </h2>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-3 gap-6">
        <?php foreach ($products as $product): ?>
            <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition duration-300">
                <div class="relative overflow-hidden">
                    <img class="w-full transform hover:scale-110 transition duration-500" src="<?= htmlspecialchars($product['image_url']); ?>" alt="<?= htmlspecialchars($product['name']); ?>">
                </div>
                <div class="p-4">
                    <h3 class="font-semibold text-lg leading-tight truncate" style="font-family: 'Poppins', sans-serif">
                        <?= htmlspecialchars($product['name']); ?>
                    </h3>
                    <div class="mt-2">
                        <span class="text-green-600 font-bold">$<?= htmlspecialchars($product['price']); ?></span>
                    </div>
                    <a href="http://localhost/sport/public/product.php?id=<?= htmlspecialchars($product['product_id']);?>" class="mt-4 inline-block bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600 transition duration-300">
                        View Details
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<?php include '../templates/footer.php'; ?>
