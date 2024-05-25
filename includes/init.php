<?php
require_once 'config.php';  // Assuming config.php sets up database connection settings
session_start();
// Autoloading classes
spl_autoload_register(function ($class) {
    require_once __DIR__ . '/../classes/' . $class . '.php';
});

// Create database connection
try {
    $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}
