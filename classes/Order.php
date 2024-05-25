<?php
require_once '../includes/init.php';

class Order {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    /**
     * Places a new order by storing order details and items in the database.
     *
     * @param array $orderDetails Contains all necessary data to create an order.
     * @return bool Returns true on success, false on failure.
     */
       public function placeOrder($orderDetails) {
        try {
            $this->db->beginTransaction();

            $stmt = $this->db->prepare("INSERT INTO orders (user_id, order_date, total_amount, payment_status) VALUES (?, NOW(), ?, 'Pending')");
            $stmt->execute([$orderDetails['user_id'], $orderDetails['total']]);
            $orderId = $this->db->lastInsertId();

            if (!$orderId) {
                throw new Exception("Order ID not generated.");
            }

            foreach ($orderDetails['items'] as $item) {
                if (!isset($item['unit_price'])) {
                    throw new Exception("Unit price not set for item with product ID: " . $item['product_id']);
                }

                $stmt = $this->db->prepare("INSERT INTO order_items (order_id, product_id, quantity, unit_price) VALUES (?, ?, ?, ?)");
                $stmt->execute([$orderId, $item['product_id'], $item['quantity'], $item['unit_price']]);
            }

            $this->db->commit();
            return $orderId;
        } catch (PDOException $e) {
            $this->db->rollback();
            error_log("Order placement failed: " . $e->getMessage());
            return 0;
        } catch (Exception $e) {
            $this->db->rollback();
            error_log("Order processing error: " . $e->getMessage());
            return 0;
        }
    }


    /**
     * Retrieves an order by its ID.
     *
     * @param int $orderId The ID of the order to retrieve.
     * @return array|null The order details or null if no order was found.
     */
    public function getOrderById($orderId) {
        $sql = "SELECT order_id, order_date, total_amount, payment_status FROM orders WHERE order_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$orderId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }





}

?>
