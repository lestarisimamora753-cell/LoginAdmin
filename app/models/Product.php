<?php
class Product {
    private PDO $db;
    public function __construct(PDO $db) {
        $this->db = $db;
    }
    public function all() {
        $stmt = $this->db->query("SELECT * FROM products ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function create($name, $price, $stock) {
        $stmt = $this->db->prepare("INSERT INTO products (name, price, stock) VALUES (?, ?, ?)");
        return $stmt->execute([$name, $price, $stock]);
    }
    public function update($id, $name, $price, $stock) {
        $stmt = $this->db->prepare("UPDATE products SET name=?, price=?, stock=? WHERE id=?");
        return $stmt->execute([$name, $price, $stock, $id]);
    }
    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM products WHERE id=?");
        return $stmt->execute([$id]);
    }
}