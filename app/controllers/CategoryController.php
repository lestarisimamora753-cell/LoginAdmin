<?php
require_once __DIR__ . '/../models/Category.php';
class CategoryController {
    private $db;
    public function __construct($pdo){ $this->db = $pdo; }
    public function index(){
        $model = new Category($this->db);
        $categories = $model->getAll();
        require __DIR__ . '/../../views/pages/categories/index.php';
    }
}