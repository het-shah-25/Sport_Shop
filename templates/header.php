<?php
require_once '../includes/init.php'; // Ensure this path is correct

// Check if user is logged in
$userLoggedIn = isset($_SESSION['user_id']); // Check if user ID is set in the session
$profileLink = $userLoggedIn ? "profile.php" : "login.php"; // Determine which page to link to
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports Store</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-50">
<!-- Navigation Bar -->
<nav class="bg-white shadow-lg">
    <div class="max-w-7xl mx-auto px-4 py-6 flex justify-between items-center">
        <!-- Logo and Navigation Centered -->
        <div class="flex justify-start lg:w-0 lg:flex-1">
            <a href="http://localhost/sport/public/index.php">
                <img src="https://logowik.com/content/uploads/images/sports8897.jpg" alt="Logo" class="h-16 w-auto">
            </a>
        </div>
        <div class="hidden md:flex items-center justify-center flex-1 space-x-8">
            <a href="http://localhost/sport/public/index.php" class="text-gray-700 font-semibold hover:text-green-600 transition duration-300" style="font-family: 'Poppins', sans-serif">Home</a>
            <a href="http://localhost/sport/public/shop.php" class="text-gray-700 font-semibold hover:text-green-600 transition duration-300" style="font-family: 'Poppins', sans-serif">Products</a>
            <a href="http://localhost/sport/public/aboutus.php" class="text-gray-700 font-semibold hover:text-green-600 transition duration-300" style="font-family: 'Poppins', sans-serif">About</a>
            <a href="http://localhost/sport/public/contactus.php" class="text-gray-700 font-semibold hover:text-green-600 transition duration-300" style="font-family: 'Poppins', sans-serif">Contact</a>
        </div>
        <!-- Profile and Checkout Icons -->
        <div class="flex items-center justify-end lg:flex-1">
            <a href="<?= $profileLink; ?>" class="p-2 text-gray-400 hover:text-gray-500">
                <!-- Icon from Heroicons (example) -->
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 15c2.5 0 4.847.655 6.879 1.804M15 9a3 3 0 11-6 0 3 3 0 016 0zm6 3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </a>
            <a href="cart.php" class="ml-4 p-2 text-gray-400 hover:text-gray-500">
                <!-- Icon from Heroicons (example) -->
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.344 2.508m0 0L7.154 19H18.846L20.656 5.508M5.344 5.508h15.312M17.658 19a2 2 0 100 4 2 2 0 000-4zM6.342 19 a2 2 0 100 4 2 2 0 000-4zM18.846 19H7.154"/>
                </svg>
            </a>
        </div>
    </div>
</nav>
