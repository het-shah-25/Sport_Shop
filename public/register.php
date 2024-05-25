<?php
require_once '../includes/init.php';

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'] ?? ''; // Assuming you split this into first_name and last_name later
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $password_confirm = $_POST['password_confirm'] ?? '';

    // Basic validation
    if ($password !== $password_confirm) {
        $error_message = "Passwords do not match.";
    } else {
        // Splitting the name into first and last name for simplicity
        $names = explode(' ', $name, 2);
        $first_name = $names[0];
        $last_name = $names[1] ?? '';  // Handle cases where there is no last name

        $database = new Database();
        $db = $database->getConnection();

        $user = new User($db);
        try {
            $user->register([
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'password' => $password
            ]);
            header('Location: login.php'); // Redirect to login page on successful registration
            exit;
        } catch (Exception $e) {
            $error_message = "An error occurred: " . $e->getMessage(); // Handling exceptions like duplicate email
        }
    }
}
include '../templates/header.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body>
    <main class="max-w-lg mx-auto p-8 bg-white rounded-lg shadow-md mt-10">
        <h2 class="text-2xl font-bold text-center text-gray-900">Create Account</h2>
        <?php if (!empty($error_message)): ?>
            <p class="text-red-500 text-center"><?= htmlspecialchars($error_message) ?></p>
        <?php endif; ?>
        <form action="register.php" method="post" class="mt-4">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" name="name" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Your Name">
            </div>
            <div class="mt-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Your Email">
            </div>
            <div class="mt-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Password">
            </div>
            <div class="mt-4">
                <label for="password-confirm" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input type="password" id="password-confirm" name="password_confirm" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Confirm Password">
            </div>
            <div class="mt-6">
                <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Sign Up</button>
            </div>
            <div class="mt-4 text-center">
                <p class="text-sm text-gray-600">Already have an account? <a href="login.php" class="text-indigo-600 hover:text-indigo-500">Login</a></p>
            </div>
        </form>
    </main>
</body>
</html>
