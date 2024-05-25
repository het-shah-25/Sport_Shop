<?php
require_once '../includes/init.php';

$error_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $database = new Database();
    $db = $database->getConnection();

    $user = new User($db);
    if ($user->login($email, $password)) {
        header('Location: profile.php'); // Redirect to a welcome page or user dashboard
        exit;
    } else {
        $error_message = 'Invalid email or password. Please try again.';
    }
}

include '../templates/header.php';
?>

<body class="bg-gray-100">
    <main class="max-w-lg mx-auto p-8 bg-white rounded-lg shadow-md mt-10">
        <h2 class="text-2xl font-bold text-center text-gray-900">Login to Your Account</h2>
        <?php if (!empty($error_message)): ?>
            <p class="text-red-500 text-center"><?= htmlspecialchars($error_message); ?></p>
        <?php endif; ?>
        <form action="login.php" method="post" class="mt-4">
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Your Email">
            </div>
            <div class="mt-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Password">
            </div>
            <div class="mt-6">
                <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Log In</button>
            </div>
            <div class="mt-4 text-center">
                <p class="text-sm text-gray-600">Don't have an account? <a href="register.php" class="text-indigo-600 hover:text-indigo-500">Sign up</a></p>
            </div>
        </form>
    </main>
</body>
</html>
