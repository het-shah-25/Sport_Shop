<?php 
require_once '../includes/init.php';

$product = new Product($pdo);
$products = $product->getAllProducts();

include '../templates/header.php';
?>

<!-- Main Feature Section -->
<section class="bg-white py-12">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <img src="https://images.pexels.com/photos/269948/pexels-photo-269948.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Featured Product" class="rounded-lg shadow-lg">
            </div>
            <div class="flex flex-col justify-center">
                <h2 class="text-3xl font-bold text-gray-800 mb-3" style="font-family: 'Poppins', sans-serif">
                    Explore the Outdoors
                </h2>
                <p class="text-gray-600 text-lg" style="font-family: 'Poppins', sans-serif">
                    Discover our wide range of high-quality outdoor equipment designed for every adventure.
                </p>
                <a href="shop.php" class="mt-4 bg-green-500 text-white py-3 px-6 rounded-lg font-semibold hover:bg-green-600 transition duration-300" style="font-family: 'Poppins', sans-serif">Shop Now</a>
            </div>
        </div>
    </div>
</section>

<!-- Featured Products Section -->
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
