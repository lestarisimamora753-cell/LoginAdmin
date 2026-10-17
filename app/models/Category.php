<?php
class Category {
    private $db;
    public function __construct($pdo) {
        $this->db = $pdo;
    }
    public function getAll() {
        return $this->db->query("SELECT * FROM categories")->fetchAll(PDO::FETCH_ASSOC);
    }
}