<?php
require_once '../includes/init.php';
class Database {
    private $db;

    public function __construct() {
        $this->db = new PDO(DSN, DB_USER, DB_PASS, $GLOBALS['options']);
    }

    public function getConnection() {
        return $this->db;
    }
}
?>