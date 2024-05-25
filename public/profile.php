<?php
require_once '../includes/init.php';

// Check if the user is logged in before accessing the page
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Redirect to login page if not logged in
    exit;
}

// Fetch user data from session
$user_name = $_SESSION['user_name'] ?? 'No Name';  // Default to 'No Name' if not set
$user_email = $_SESSION['email'] ?? 'No Email';  // Default to 'No Email' if not set
include '../templates/header.php';
?>

<body class="bg-gray-100">
    <main class="max-w-lg mx-auto p-8 bg-white rounded-lg shadow-md mt-10">
        <h2 class="text-2xl font-bold text-gray-900">Your Account</h2>
        <div class="mt-4">
            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700">Name</label>
                <p class="mt-1 text-sm text-gray-900"><?= htmlspecialchars($user_name); ?></p>
            </div>
            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <p class="mt-1 text-sm text-gray-900"><?= htmlspecialchars($user_email); ?></p>
            </div>
        </div>
        <div class="mt-6">
            <a href="edit_profile.php" class="text-indigo-600 hover:text-indigo-500">Edit Profile</a>
        </div>
        <div class="mt-4">
            <a href="logout.php" class="text-red-600 hover:text-red-500">Log Out</a>
        </div>
    </main>
</body>
</html>
