<?php
require_once '../includes/init.php';

class Product {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllProducts() {
        $stmt = $this->db->prepare("SELECT * FROM products");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getProductById($productId) {
        $stmt = $this->db->prepare("SELECT * FROM products WHERE product_id = ?");
        $stmt->execute([$productId]);
        return $stmt->fetch();
    }
    public function getAdditionalProducts($currentProductId, $limit = 4) {
    $stmt = $this->db->prepare("SELECT * FROM products WHERE product_id != :product_id ORDER BY RAND() LIMIT :limit");
    $stmt->bindParam(':product_id', $currentProductId, PDO::PARAM_INT);
    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
}
?>