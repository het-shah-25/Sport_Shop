<?php
require_once '../includes/init.php';

class User {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function register($userData) {
        $hashedPassword = password_hash($userData['password'], PASSWORD_DEFAULT);
        // Make sure to use the correct column names here too if they differ
        $stmt = $this->db->prepare("INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)");
        $stmt->execute([$userData['first_name'], $userData['last_name'], $userData['email'], $hashedPassword]);
    }

    public function login($email, $password) {
        // Update column name here as well if necessary
        $stmt = $this->db->prepare("SELECT user_id, first_name, last_name, email, password FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['user_id'];  // Make sure this is consistent with your column name
            $_SESSION['user_name'] = $user['first_name'] . ' ' . $user['last_name'];
            $_SESSION['email'] = $user['email'];
            return true;
        }
        return false;
    }

    public function getUserById($userId) {
        $stmt = $this->db->prepare("SELECT user_id, first_name, last_name, email FROM users WHERE user_id = ?");
        $stmt->execute([$userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateProfile($userId, $userData) {
        // Ensure you use the correct column names here as well
        $stmt = $this->db->prepare("UPDATE users SET first_name = ?, last_name = ?, email = ? WHERE user_id = ?");
        $stmt->execute([$userData['first_name'], $userData['last_name'], $userData['email'], $userId]);
        if (!empty($userData['password'])) {
            $hashedPassword = password_hash($userData['password'], PASSWORD_DEFAULT);
            $stmt = $this->db->prepare("UPDATE users SET password = ? WHERE user_id = ?");
            $stmt->execute([$hashedPassword, $userId]);
        }
    }
}

?>