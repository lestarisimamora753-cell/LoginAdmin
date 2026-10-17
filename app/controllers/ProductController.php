<?php
require_once __DIR__ . '/../models/Product.php';

class ProductController {
    private Product $product;
    public function __construct(PDO $db) {
        $this->product = new Product($db);
    }
    public function index() {
        $products = $this->product->all();
        require __DIR__ . '/../../views/pages/products.php';
    }
    public function store() {
        $this->product->create($_POST['name'], $_POST['price'], $_POST['stock']);
        header('Location: /');
    }
    public function update() {
        $this->product->update($_POST['id'], $_POST['name'], $_POST['price'], $_POST['stock']);
        header('Location: /');
    }
    public function delete() {
        $this->product->delete($_GET['id']);
        header('Location: /');
    }
}